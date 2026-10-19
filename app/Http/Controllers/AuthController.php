<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //LOGIN - shows the login form to our users
    public function showLogin()
    {
        return view('auth.login');
    }
    //REGISTER - shows the register form to our users
    public function showRegister()
    {
        return view('auth.register');
    }
    //REGISTER - create the acocunts, then it would login the users
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::Create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()-route('notes.index')->with('success', 'Welcome, '. $user->name . '!');
    }
}