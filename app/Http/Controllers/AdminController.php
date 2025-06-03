<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->middleware('admin');
    }

    public function promoteProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->is_promoted = true;
        $product->save();

        return response()->json($product);
    }

    public function demoteProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $product->is_promoted = false;
        $product->save();

        return response()->json($product);
    }

    public function getAllUsers(Request $request)
    {
        return User::all();
    }

    public function getUserOrders(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        return $user->orders()->with('product')->get();
    }
}