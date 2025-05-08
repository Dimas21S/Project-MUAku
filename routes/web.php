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

Route::get('/deskripsi', function () {
    return view('deskripsi-mua');
});

Route::get('/data-langganan', function () {
    return view('admin.data-berlangganan');
});

Route::get('/verified-admin', function () {
    return view('admin.admin-verified');
});

Route::get('/vip-fitur', function () {
    return view('admin.fitur-vip');
});

Route::get('/map', function () {
    return view('map');
});

Route::get('/profile', function () {
    return view('profil-pengguna');
});
