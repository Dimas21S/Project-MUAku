<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/index', function () {
    return view('landing-page');
});

// Route::get('/paket', function () {
//     return view('paket-berlangganan');
// });

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

// Route::get('/profile', function () {
//     return view('profil-pengguna');
// });


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/profil', 'userProfile')->name('profile');
})->middleware('auth');

Route::controller(ArtistController::class)->group(function () {
    Route::get('/daftar-mua', 'listMakeUpArtist')->name('list-mua');
    Route::get('/deskripsi-mua', 'artistDescription')->name('deskripsi-mua');
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'paymentIndex')->name('payment');
    Route::post('/get-snap-token', 'getSnapToken')->name('get-snap-token');
});
