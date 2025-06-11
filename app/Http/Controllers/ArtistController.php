<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\MakeUpArtist;
use App\Models\UserHistory;
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
                return redirect('/notif-chat')->with('status', 'Selamat datang, ' . $mua->username . '! Anda telah berhasil login sebagai Make Up Artist.');
            }

            // Jika status make up artist tidak diterima, maka akan mengembalikan ke halaman submit request
            $request->session()->regenerate();

            // mengarahkan ke halaman pendaftaran sesuai dengan penulisan method name
            return redirect()->route('get.pendaftaran')->with('status', 'Silakan lengkapi pendaftaran Anda terlebih dahulu sebelum melanjutkan.');
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
        return redirect()->route('login-mua')->with('Registrasi Berhasil');
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
        $user = Auth::user();

        // Menggunakan model MakeUpArtist untuk mengambil data berdasarkan id dan menggunakan findOrFail untuk menangani jika data tidak ditemukan
        $artist = MakeUpArtist::findOrFail($id);

        $likedArtistIds = $user->likes()->pluck('make_up_artist_id');

        if (Auth::check()) {
            $user = Auth::user();


            // Cek apakah sudah pernah disimpan
            $exists = UserHistory::where('user_id', $user->id)
                ->where('make_up_artist_id', $artist->id)
                ->first();

            // Simpan hanya jika belum ada
            if (!$exists) {
                UserHistory::create([
                    'user_id' => $user->id,
                    'make_up_artist_id' => $artist->id,
                ]);
            }
        }

        return view('deskripsi-mua', compact('artist', 'likedArtistIds', 'user'));
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'link_map' => 'nullable|url',
            'category' => 'required|in:Pesta dan Acara,Pengantin,Artistik',
            'portfolio' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5048',
            'deskripsi' => 'nullable|string|max:1000'
        ];

        $pesan_validasi = [
            'name.required' =>  'name harus diisi',
            'phone.required' => 'Nomor Telepon harus diisi',
            'category.required' => 'Kategori harus dipilih',
            'city.required' => 'Kota harus dipilih',
            'link_map.required' => 'Link Gmaps harus diisi',
            'portfolio.required' => 'Portofolio harus diisi',
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
            'username' => $request->username,
            'email' => $request->email,
            'category' => $request->category,
            'file_certificate' => $path,
            'status' => 'pending',
            'description' => $request->deskripsi,
        ]);

        $artist->address()->updateOrCreate([], [
            'link_map' => $request->link_map,
        ]);


        return redirect()->route('pendaftaran.berhasil')->with('success', 'Form pendaftaran berhasil dikirim.');
    }

    public function pendaftaranBerhasil()
    {
        return view('mua.pendaftaran-selesai');
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

        return view('user.map', compact('artist'));
    }

    public function artistLogout(Request $request)
    {
        Auth::guard('makeup_artist')->logout();

        // Menghapus session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Anda telah berhasil logout.');
    }

    public function editMakeUpArtist()
    {
        $mua = MakeUpArtist::findOrFail(Auth::guard('makeup_artist')->user()->id);

        // Pastikan hanya makeup artist yang sedang login yang bisa mengedit profilnya
        if (Auth::guard('makeup_artist')->user()->id !== $mua->id) {
            return redirect()->back()->withErrors(['error' => 'Unauthorized action.']);
        }

        $categories = ['Pesta dan Acara', 'Pengantin', 'Editorial'];

        return view('mua.edit-profile', compact('mua', 'categories'));
    }

    public function updateMakeUpArtist(Request $request)
    {
        $mua = Auth::guard('makeup_artist')->user();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'link_map' => 'nullable|url',
            'category' => 'required|in:Pesta dan Acara,Pengantin,Editorial,Artistik',
            'description' => 'nullable|string|max:1000',
            'photos' => 'nullable|array',
            'photos.*' => 'file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Menangani upload foto
        if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            $photoPaths = [];

            foreach ($photos as $photo) {
                // Menggunakan time() untuk memberikan nama unik pada file
                $filename = time() . '_' . $photo->getClientOriginalName();

                // Menggunakan Storage untuk menyimpan file ke public disk
                $path = $photo->storeAs('uploads', $filename, 'public');

                // Menyimpan path foto ke array
                $photoPaths[] = $path;
            }

            // Menyimpan foto ke database
            foreach ($photoPaths as $path) {
                $mua->photos()->create([
                    'image_path' => $path,
                    'make_up_artist_id' => $mua->id
                ]);
            }
        }

        // Update data make up artist
        $mua->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'category' => $request->category,
            'description' => $request->description,
        ]);
        $mua->address()->updateOrCreate([], [
            'link_map' => $request->link_map,
        ]);

        return redirect()->route('index-mua')->with('status', 'Profil berhasil diperbarui.');
    }

    public function artistIndex()
    {
        $artist = Auth::guard('makeup_artist')->user();

        return view('mua.mua-index', compact('artist'));
    }
}
