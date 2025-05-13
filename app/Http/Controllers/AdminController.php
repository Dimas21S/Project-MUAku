<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('landing-page');
    }

    public function dataPelanggan()
    {
        return view('admin.data-berlangganan');
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
