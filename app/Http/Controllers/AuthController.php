<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi data request
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:6',
        ]);

        // Cek apakah pengguna sudah terdaftar
        if (Auth::attempt($request->only('name', 'password'))) {

            $request->session()->regenerate();

            // Cek apakah pengguna adalah admin
            if (Auth::user()->role == 'admin') {

                // Jika admin maka akan diarahkan ke dasbor admin
                return redirect()->intended('/data-langganan');
            }

            // jika hanya user biasa atau customer maka akan diarahkan ke halaman
            return redirect()->intended('/daftar-mua');
        }

        // Jika login gagal, alihkan kembali dengan pesan kesalahan
        return redirect()->back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Menangani proses registrasi
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
        // Simpan data pengguna ke dalam database
        $user->save();

        return redirect('login')->with('message', 'Registration successful, please login');
    }

    // Menangani proses logout
    // Menggunakan Auth::logout() untuk mengeluarkan pengguna dari sesi
    // Menggunakan redirect untuk mengalihkan pengguna ke halaman login atau halaman lain
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    // Menampilkan profil pengguna
    // Menggunakan Auth::user() untuk mendapatkan data pengguna yang sedang login
    public function userProfile()
    {
        $user = Auth::user();
        return view('profil-pengguna', compact('user'));
    }
}
