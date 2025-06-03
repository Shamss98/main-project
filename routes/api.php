<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Product routes
    Route::apiResource('products', ProductController::class)->except(['store', 'update', 'destroy']);
    
    // Order routes
    Route::apiResource('orders', OrderController::class)->except(['update', 'destroy']);

    // Admin routes
    Route::prefix('admin')->middleware('admin')->group(function () {
        Route::apiResource('products', ProductController::class)->except(['index', 'show']);
        Route::post('/products/{product}/promote', [AdminController::class, 'promoteProduct']);
        Route::post('/products/{product}/demote', [AdminController::class, 'demoteProduct']);
        Route::get('/users', [AdminController::class, 'getAllUsers']);
        Route::get('/users/{user}/orders', [AdminController::class, 'getUserOrders']);
    });
});