<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // SHOW REGISTER PAGE
    public function showRegister()
    {
        return view('auth.register');
    }

    // HANDLE REGISTRATION
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }

    // SHOW LOGIN PAGE
    public function showLogin()
    {
        return view('auth.login');
    }

    // HANDLE LOGIN
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        return redirect()->route('dashboard')->with('success', 'Logged in successfully.');
    }

    return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
}


    // HANDLE LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }
}
