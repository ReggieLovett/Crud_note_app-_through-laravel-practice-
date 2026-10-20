<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facade\Auth;
use Illuminate\Support\Facade\Hash;

class AuthController extends Controller
{
    // LOGIN - show login page
    public function showLogin()
    {
        return view('auth.login');   
    }
    
    // REGISTER - show register page
    public function showRegister()
    {
        return view('auth.register');   
    }

    // REGISTER - create the account, then logs the user in 
    public function register(Request $request)
    {
     
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        
        Auth::login($user);
        $request->session()->regenerate();
        
        return redirect()->route('notes.index')->with(success, 'Welcome, '. $user->name . '!');
    }
    
}