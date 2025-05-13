<?php

namespace App\Http\Controllers;

use App\Models\MakeUpArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ArtistController extends Controller
{
    //
    public function artistLoginForm()
    {
        return view('auth.artist-login');
    }

    public function artistLogin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            // Redirect to the intended page or dashboard
            return redirect()->intended('/daftar-mua');
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    public function artistRegisterForm()
    {
        return view('auth.artist-register');
    }

    public function artistRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $artist = MakeUpArtist::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $artist->save();

        // Redirect to the intended page or dashboard
        return redirect()->intended('/daftar-mua');
    }

    public function listMakeUpArtist()
    {
        $user = Auth::user();
        $artist = MakeUpArtist::all();
        return view('list-mua', compact('user', 'artist'));
    }

    public function artistDescription($id)
    {
        $artist = MakeUpArtist::findOrFail($id);
        return view('deskripsi-mua', compact('artist'));
    }
}
