<?php

namespace App\Http\Controllers;

use App\Models\MakeUpArtist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Termwind\Components\Dd;

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
        if (Auth::guard('makeup_artist')->attempt($request->only('username', 'password'))) {

            $mua = Auth::guard('makeup_artist')->user();
            if ($mua->status == 'accepted') {
                // Jika status make up artist diterima, maka akan mengarahkan ke halaman daftar make up artist
                return redirect()->intended('/daftar-mua');
            }
            // Jika status make up artist tidak diterima, maka akan mengembalikan ke halaman submit request
            $request->session()->regenerate();

            // mengarahkan ke halaman pendaftaran sesuai dengan penulisan method name
            return redirect()->route('get.pendaftaran');
        }

        // Kalau login gagal, maka akan mengembalikan ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['name' => 'Invalid credentials'])->withInput();
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
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $artist->save();

        // Redirect to the intended page or dashboard
        return redirect()->intended('login-mua');
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
            'phone' => 'required|string|max:15',
            'category' => 'required|in:MakeUp BY,Bridal Makeup,Editorial Makeup,Character Makeup,Special Effects Makeup,Fashion Makeup,Beauty Makeup',
            'address' => 'required|in:DKI Jakarta,Jawa Barat,Jawa Tengah,Jawa Timur,Banten,DI Yogyakarta,Bali,Sumatera Utara,Sumatera Barat,Riau,Kepulauan Riau,Jambi,Sumatera Selatan,Bangka Belitung,Bengkulu,Lampung,Kalimantan Barat,Kalimantan Tengah,Kalimantan Selatan,Kalimantan Timur,Kalimantan Utara,Sulawesi Utara,Sulawesi Tengah,Sulawesi Selatan,Sulawesi Tenggara,Gorontalo,Sulawesi Barat,Maluku,Maluku Utara,Papua Barat,Papua,Nusa Tenggara Barat,Nusa Tenggara Timur,Aceh',
            'portfolio' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5048',
        ]);

        $artist = auth()->guard('makeup_artist')->user();

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

        $artist->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'category' => $request->category,
            'file_certificate' => $path,
            'status' => 'pending',
        ]);

        $artist->address()->updateOrCreate([], [
            'alamat' => $request->address,
        ]);


        return redirect()->back()->with('success', 'Form pendaftaran berhasil dikirim.');
    }
}
