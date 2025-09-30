<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MakeUpArtist;
use App\Models\Verification;
use App\Models\Package;
use App\Models\Payment;

class AdminController extends Controller
{
    // Tampilan untuk landing page semua user
    public function index()
    {
        return view('landing-page');
    }

    public function aboutUs()
    {
        return view('about-us');
    }

    public function contactPage()
    {
        return view('contact');
    }

    // Tampilan untuk melihat data user yang berlangganan
    public function dataPelanggan()
    {
        // Mengambil data pembayaran dari model Payment dan mengaitkannya dengan model User
        $itemPembayaran = Payment::with('user')->paginate(10);

        return view('admin.data-berlangganan', compact('itemPembayaran'));
    }

    // Tampilan untuk melihat data make up artist yang mendaftar
    public function verifiedMakeUpArtist()
    {
        // Menggunakan model MakeUpArtist untuk mengambil semua data dengan method all()
        $verifications = Verification::with('makeUpArtist.address')->paginate(10);

        return view('admin.admin-verified', compact( 'verifications'));
    }

    public function fiturVip()
    {
        $packages = Package::all();
        return view('admin.fitur-vip', compact('packages'));
    }

    public function updateStatus(Request $request, $verificationId)
    {
        $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $verification = Verification::findOrFail($verificationId);

        if(!$verification) {
            return redirect()->back()->with('error', 'Verification record not found.');
        }

        $verification->status = $request->status;
        $verification->save();

        if($request->status === 'accepted') {
            $artist = $verification->makeUpArtist;
            $artist->status = 'accepted';
            $artist->name            = $verification->name;
            $artist->email           = $verification->email;
            $artist->phone           = $verification->phone;
            $artist->category  = $verification->category;
            $artist->file_certificate = $verification->file_certificate;
            $artist->description     = $verification->description;
            $artist->save();

            // Hapus data verfikasi yang 'rejected' setelah diterima
            Verification::where('id', $verificationId)->where('status', 'rejected')->delete();
        }

        return redirect()->back()->with('success', 'Status artist berhasil diperbarui.');
    }

    public function formEditPackage($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.edit-package', compact('package'));
    }

    public function editPackage(Request $request, $id)
    {
        $request->validate([
            'package_type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $package = Package::findOrFail($id);
        $package->update([
            'package_type' => $request->package_type,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('vip-fitur')->with('success', 'Package updated successfully.');
    }
}
