<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    public function index()
    {
        return Product::all();
    }

    public function store(StoreProductRequest $request)
    {
        if (!$request->user()->isAdmin()) { 
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        
        $validated = $request->validated();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            if (!Storage::disk('public')->exists('products')) {
                Storage::disk('public')->makeDirectory('products');
            }
            
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = Storage::url($path); 
        }

        $product = Product::create($validated);

        return response()->json([
            'product' => $product,
            'image_url' => $product->image ? url($product->image) : null
        ], 201);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if (!$request->user()->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        
        $validated = $request->validated();

        // Handle new image upload
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            $oldImage = str_replace('/storage', '', $product->image);
            Storage::disk('public')->delete($oldImage);
            
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = Storage::url($path);
        }

        $product->update($validated);

        return response()->json([
            'product' => $product,
            'image_url' => $product->image ? url($product->image) : null
        ]);
    }

    public function destroy(Request $request, Product $product)
    {
        if (!$request->user()->isAdmin()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

    
        if ($product->image) {
            $imagePath = str_replace('/storage', '', $product->image);
            Storage::disk('public')->delete($imagePath);
        }

        $product->delete();

        return response()->json(null, 204);
    }
}