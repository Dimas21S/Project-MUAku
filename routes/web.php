<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('landing-page');
});

Route::get('/paket', function () {
    return view('paket-berlangganan');
});

Route::get('/daftar-mua', function () {
    return view('list-mua');
});
