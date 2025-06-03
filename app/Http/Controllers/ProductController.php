<?php

namespace App\Http\Controllers;
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

public function store(Request $request)
{
    if (!$request->user()->isAdmin()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    
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

public function update(Request $request, Product $product)
{
    if (!$request->user()->isAdmin()) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    $validated = $request->validate([
        'name' => 'sometimes|string|max:255',
        'description' => 'sometimes|string',
        'price' => 'sometimes|numeric|min:0',
        'stock' => 'sometimes|integer|min:0',
        'image' => 'nullable|sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle new image upload
    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
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

        $product->delete();

        return response()->json(null, 204);
    }
}