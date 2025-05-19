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
        // Validasi request data login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:6',
        ]);

        // Apabila login berhasil, maka akan menyimpan session
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            // mengarahkan ke halaman ??
            return redirect()->intended('/daftar-mua');
        }

        // Kalau login gagal, maka akan mengembalikan ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    // Menampilkan form registrasi untuk make up artist
    public function artistRegisterForm()
    {
        return view('auth.artist-register');
    }

    // Menangani proses registrasi make up artist
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

    // Menampilkan daftar make up artist
    public function listMakeUpArtist()
    {
        // Menggunakan Auth::user() untuk mendapatkan data user yang sedang login
        $user = Auth::user();

        // Menggunakan model MakeUpArtist untuk mengambil semua data dengan method all()
        $artist = MakeUpArtist::all();

        return view('list-mua', compact('user', 'artist'));
    }

    // Menampilkan deskripsi make up artist
    // Menggunakan model MakeUpArtist untuk mengambil data berdasarkan id dan menggunakan findOrFail untuk menangani jika data tidak ditemukan
    public function artistDescription($id)
    {
        $artist = MakeUpArtist::findOrFail($id);
        return view('deskripsi-mua', compact('artist'));
    }

    // Menampilkan form pendaftaran make up artist
    public function submitRequest()
    {
        return view('form-pendaftaran');
    }

    // Menangani pengiriman form pendaftaran make up artist
    // Menggunakan model MakeUpArtist untuk menyimpan data ke database
    // Menggunakan Request untuk menangani request data
    public function formSubmitRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'portfolio' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Menangani upload file portfolio
        // Menggunakan Storage untuk menyimpan file ke public disk
        // Menggunakan time() untuk memberikan nama unik pada file
        // Menggunakan storeAs untuk menyimpan file dengan nama yang ditentukan
        if ($request->hasFile('portfolio')) {
            $file = $request->file('portfolio');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
        } else {
            return redirect()->back()->withErrors(['portfolio' => 'Portfolio file is required']);
        }

        $artistRequest = new MakeUpArtist();
        $artistRequest->name = $request->name;
        $artistRequest->email = $request->email;
        $artistRequest->phone = $request->phone;
        $artistRequest->address = $request->address;
        $artistRequest->portfolio = $path;
        $artistRequest->save();

        return redirect()->back()->with('success', 'Request submitted successfully!');
    }
}
