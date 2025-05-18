<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('landing-page');
    }

    public function dataPelanggan()
    {
        $itemPembayaran = Payment::with('user')->get();

        return view('admin.data-berlangganan', compact('itemPembayaran'));
    }

    public function verifiedMakeUpArtist()
    {
        return view('admin.admin-verified');
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
