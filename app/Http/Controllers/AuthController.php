<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    // Function to show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Function to handle the login process
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('name', 'password'))) {
            $request->session()->regenerate();
            // Check if the user is an admin
            if (Auth::user()->role == 'admin') {
                // Redirect to the admin dashboard
                return redirect()->intended('/data-langganan');
            }
            // Redirect to the intended page or dashboard
            return redirect()->intended('/daftar-mua');
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    // Function to show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Function to handle the registration process
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        return redirect('login')->with('message', 'Registration successful, please login');
    }

    // Function to handle the logout process
    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Redirect to the login page or home page
        return redirect('/');
    }

    public function userProfile()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Return the user profile view with the user data
        return view('profil-pengguna', compact('user'));
    }
}
