<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $rule_validasi = [
            'name' => 'required|string',
            'password' => 'required|min:8',
        ];

        $pesan_validasi = [
            'name.required' => 'Nama harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter'
        ];

        $request->validate($rule_validasi, $pesan_validasi);

        // Cek apakah pengguna sudah terdaftar
        if (Auth::attempt($request->only('name', 'password'))) {

            $request->session()->regenerate();

            // Simpan cookie auto login 30 hari
            $cookie = cookie('user_id', encrypt(Auth::id()), 60*24*30);

            // Cek apakah pengguna adalah admin
            if (Auth::user()->role == 'admin') {

                session_id(Auth::user()->id);

                // Jika admin maka akan diarahkan ke dasbor admin
                return redirect()->intended('/verified-admin')->withCookie($cookie);
            }

            // jika hanya user biasa atau customer maka akan diarahkan ke halaman
            return redirect()->intended('/daftar-mua')->withCookie($cookie);
        }

        // Jika login gagal, alihkan kembali dengan pesan kesalahan
        return redirect()->back()->with([
            'error' => 'Login gagal, silakan periksa kembali nama pengguna dan password Anda.',
        ]);
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        $rule_validasi = [
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];

        $pesan_validasi = [
            'username.required' => 'Nama harus diisi',
            'email.required' => 'e-Mail harus diisi',
            'email.email' => 'Format e-Mail tidak sesuai',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter'
        ];

        $request->validate($rule_validasi, $pesan_validasi);

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
    public function logout(Request $request)
    {
        // Menggunakan Auth::logout() untuk mengeluarkan pengguna dari sesi
        Auth::logout();

        // Menggunakan redirect untuk mengalihkan pengguna ke halaman login atau halaman lain
        return redirect('/');
    }

    // Menampilkan profil pengguna
    // public function userProfile()
    // {
    //     // Menggunakan Auth::user() untuk mendapatkan data pengguna yang sedang login
    //     $user = Auth::user();

    //     return view('profil-pengguna', compact('user'));
    // }

    // public function userUpdate()
    // {
    //     $user = Auth::user();
    //     return view('update-profile', compact('user'));
    // }

    // public function userUpdateProfile(Request $request)
    // {
    //     $user = Auth::user();

    //     $rules = [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,' . $user->id,
    //         'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'deskripsi' => 'nullable|max:500'
    //     ];

    //     $messages = [
    //         'name.required' => 'Nama wajib diisi',
    //         'email.required' => 'Email wajib diisi',
    //         'email.email' => 'Format email tidak valid',
    //         'email.unique' => 'Email sudah digunakan',
    //         'foto_profil.image' => 'File harus berupa gambar',
    //         'foto_profil.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
    //         'foto_profil.max' => 'Ukuran gambar maksimal 2MB'
    //     ];

    //     $request->validate($rules, $messages);

    //     // Update data user
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->deskripsi = $request->deskripsi;

    //     if ($request->hasFile('foto_profil')) {
    //         $file = $request->file('foto_profil');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $path = $file->storeAs('uploads', $filename, 'public');
    //         $user->foto_profil = $path;
    //     }

    //     $user->save();

    //     return redirect('/profil')->with('success', 'Profil berhasil diperbarui!');
    // }

    // public function updatePassword(Request $request)
    // {
    //     $user = Auth::user();

    //     $rules = [
    //         'currentPassword' => 'required',
    //         'newPassword' => 'required|min:8|confirmed',
    //         'confirmPassword' => 'required_with:newPassword|same:newPassword',
    //     ];

    //     $messages = [
    //         'currentPassword.required' => 'Password saat ini wajib diisi',
    //         'newPassword.required' => 'Password baru wajib diisi',
    //         'newPassword.min' => 'Password baru minimal 8 karakter',
    //         'newPassword.confirmed' => 'Konfirmasi password tidak cocok',
    //         'confirmPassword.required_with' => 'Konfirmasi password wajib diisi jika password baru diisi',
    //         'confirmPassword.same' => 'Konfirmasi password harus sama dengan password baru',
    //     ];

    //     $request->validate($rules, $messages);

    //     // Cek apakah password saat ini benar
    //     if (!Hash::check($request->currentPassword, $user->password)) {
    //         return redirect()->back()->withErrors(['currentPassword' => 'Password saat ini salah']);
    //     }

    //     // Update password baru
    //     $user->password = Hash::make($request->newPassword);
    //     $user->save();

    //     return redirect()->route('profil')->with('password-success', 'Password berhasil diperbarui!');
    // }

    // public function formUpdatePassword()
    // {
    //     return view('user.update-password');
    // }
}
