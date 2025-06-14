<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\blade\register;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::post('/register', [Register::class, 'store'])->name('register.store');
Route::get('/register', [Register::class, 'create'])->name('register.create');
Route::get('/login', [Register::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');