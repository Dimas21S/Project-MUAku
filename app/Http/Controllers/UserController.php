<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\MakeUpArtist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    // Menampilkan profil pengguna
    public function userProfile()
    {
        // Menggunakan Auth::user() untuk mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        return view('user.profil-pengguna', compact('user'));
    }

    public function userUpdate()
    {
        $user = Auth::user();
        return view('user.update-profile', compact('user'));
    }

    public function userUpdateProfile(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|max:500'
        ];

        $messages = [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'foto_profil.image' => 'File harus berupa gambar',
            'foto_profil.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'foto_profil.max' => 'Ukuran gambar maksimal 2MB'
        ];

        $request->validate($rules, $messages);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename, 'public');
            $user->foto_profil = $path;
        }

        $user->save();

        return redirect()->intended('profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
            'confirmPassword' => 'required_with:newPassword|same:newPassword',
        ];

        $messages = [
            'currentPassword.required' => 'Password saat ini wajib diisi',
            'newPassword.required' => 'Password baru wajib diisi',
            'newPassword.min' => 'Password baru minimal 8 karakter',
            'newPassword.confirmed' => 'Konfirmasi password tidak cocok',
            'confirmPassword.required_with' => 'Konfirmasi password wajib diisi jika password baru diisi',
            'confirmPassword.same' => 'Konfirmasi password harus sama dengan password baru',
        ];

        $request->validate($rules, $messages);

        // Cek apakah password saat ini benar
        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'Password saat ini salah']);
        }

        // Update password baru
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return redirect()->intended('profile')->with('password-success', 'Password berhasil diperbarui!');
    }

    public function formUpdatePassword()
    {
        return view('user.update-password');
    }


    public function favouriteUser()
    {
        $artist = MakeUpArtist::all();

        $history = [];

        if (Auth::check()) {
            $history = Auth::user()->histories()
                ->with('makeupartist')
                ->whereHas('makeupartist', function ($query) {
                    $query->where('status', 'accepted');
                })
                ->latest()
                ->take(5)
                ->get();
        }

        // Mengambil make up artist yang telah disukai oleh user
        $likedArtists = Like::where('user_id', Auth::id())
            ->with('makeUpArtist')
            ->get();

        // Mengambil hanya make up artist yang telah disukai
        $likedArtists = $likedArtists->pluck('makeUpArtist');

        return view('user.user-history', compact('artist', 'history', 'likedArtists'));
    }

    public function deleteHistory($id)
    {
        Auth::user()->histories()->delete();
        return redirect()->back()->with('status', 'Riwayat berhasil dihapus.');
    }

    public function locationsMap()
    {
        return view("user.map");
    }
}
