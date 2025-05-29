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
        $rule_validasi = [
            'username' => 'required|string',
            'password' => 'required|min:8',
        ];

        $pesan_validasi = [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter'
        ];

        $request->validate($rule_validasi, $pesan_validasi);

        // Apabila login berhasil, maka akan menyimpan session
        if (Auth::guard('makeup_artist')->attempt($request->only('username', 'password'))) {

            $mua = Auth::guard('makeup_artist')->user();
            if ($mua->status == 'accepted') {

                // Jika status make up artist diterima, maka akan mengarahkan ke halaman daftar make up artist
                return redirect('/notif-chat');
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
        $rule_validasi = [
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];

        $pesan_validasi = [
            'username.required' => 'Username harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter'
        ];

        $request->validate($rule_validasi, $pesan_validasi);

        $artist = MakeUpArtist::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $artist->save();

        // Redirect to the intended page or dashboard
        return redirect()->intended('login-mua')->with('Registrasi Berhasil');
    }

    // Menampilkan daftar make up artist
    public function listMakeUpArtist()
    {
        $user = Auth::user();

        $query = MakeUpArtist::query();

        if (request()->has('category')) {
            $category = request()->input('category');
            $query->where('category', $category);
        }

        $artist = $query->get();

        return view('list-mua', compact('user', 'artist'));
    }

    // Menampilkan deskripsi make up artist
    public function artistDescription($id)
    {
        // Menggunakan model MakeUpArtist untuk mengambil data berdasarkan id dan menggunakan findOrFail untuk menangani jika data tidak ditemukan
        $artist = MakeUpArtist::findOrFail($id);

        return view('deskripsi-mua', compact('artist'));
    }

    // Menampilkan form pendaftaran make up artist
    public function submitRequest()
    {
        return view('mua.form-pendaftaran');
    }

    // Menangani pengiriman form pendaftaran make up artist
    public function formSubmitRequest(Request $request)
    {
        $rule_validasi = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'category' => 'required|in:Pesta dan Acara,Pengantin,Editorial,Artistik',
            'address' => 'required|in:Jambi',
            'portfolio' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5048',
        ];

        $pesan_validasi = [
            'name.required' =>  'name harus diisi',
            'phone.rquired' => 'Nomor Telepon harus diisi',
            'category.required' => 'Kategori harus dipilih',
            'address.required' => 'Alamat harus dipilih',
            'portfolio.required' => 'Portofolio harus diisi'
        ];

        $request->validate($rule_validasi, $pesan_validasi);

        $artist = auth()->guard('makeup_artist')->user();

        // Menangani upload file portfolio
        // Menggunakan storeAs untuk menyimpan file dengan nama yang ditentukan
        if ($request->hasFile('portfolio')) {
            $file = $request->file('portfolio');

            // Menggunakan time() untuk memberikan nama unik pada file
            $filename = time() . '_' . $file->getClientOriginalName();

            // Menggunakan Storage untuk menyimpan file ke public disk
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

    public function listAddressMakeUpArtist()
    {
        $artistStatus = MakeUpArtist::where('status', 'accepted');

        if ($search = request('search')) {
            $artistStatus->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%')
                    ->orWhereHas('address', function ($query) use ($search) {
                        $query->where('alamat', 'like', '%' . $search . '%');
                    });
            });
        }

        $artist = $artistStatus->get();

        return view('map', compact('artist'));
    }
}
