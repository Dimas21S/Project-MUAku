<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MakeUpArtist;
use App\Models\Payment;

class AdminController extends Controller
{
    // Tampilan untuk landing page semua user
    public function index()
    {
        return view('landing-page');
    }

    // Tampilan untuk melihat data user yang berlangganan
    public function dataPelanggan()
    {
        // Mengambil data pembayaran dari model Payment dan mengaitkannya dengan model User
        $itemPembayaran = Payment::with('user')->get();
        return view('admin.data-berlangganan', compact('itemPembayaran'));
    }

    // Tampilan untuk melihat data make up artist yang mendaftar
    public function verifiedMakeUpArtist()
    {
        // Menggunakan model MakeUpArtist untuk mengambil semua data dengan method all()
        $artistsItem = MakeUpArtist::all();
        return view('admin.admin-verified', compact('artistsItem'));
    }

    public function fiturVip()
    {
        return view('admin.fitur-vip');
    }
    public function map()
    {
        return view('map');
    }
}
