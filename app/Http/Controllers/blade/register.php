<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Register extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:15',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'role' => 'user',
        ]);

        return redirect('/')->with('success', 'Registration successful! Please log in.');
    }

    public function create()
    {
        return view('signup');
    }

    public function showLoginForm(Request $request)
    {
        if ($request->user()) {
            return redirect('/');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Login successful!');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
}
