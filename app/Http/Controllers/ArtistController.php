<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtistController extends Controller
{
    //
    public function listMakeUpArtist()
    {
        // Logic to fetch and display artists
        return view('list-mua');
    }

    public function artistDescription()
    {
        // Logic to fetch and display artist description
        return view('deskripsi-mua');
    }

    public function artistSubscription()
    {
        // Logic to fetch and display artist subscription
        return view('admin.data-berlangganan');
    }
}
