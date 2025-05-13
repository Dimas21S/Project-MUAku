<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\IsCustomer;

//Rute URL untuk admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/data-langganan', 'dataPelanggan');
    Route::get('/verified-admin', 'verifiedMakeUpArtist');
    Route::get('/vip-fitur', 'fiturVip');
});

//Rute URL untuk yang belum login maupun register (User yang sudah login tidak bisa mengakses rute ini)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

//Rute URL untuk makeup artist
Route::controller(ArtistController::class)->group(function () {
    Route::get('/login-mua', 'artistLoginForm')->name('login-mua');
    Route::post('/login-mua', 'artistLogin')->name('login-mua.post');
    Route::get('/register-mua', 'artistRegisterForm')->name('register-mua');
    Route::post('/register-mua', 'artistRegister')->name('register-mua.post');
});

//Rute URL yang hanya bisa diakses oleh role customer
//Rute URL untuk yang sudah login (User yang belum login tidak bisa mengakses rute ini)
Route::middleware(IsCustomer::class)->group(function () {
    Route::get('/daftar-mua', [ArtistController::class, 'listMakeUpArtist'])->name('list-mua');
    Route::get('/deskripsi-mua/{id}', [ArtistController::class, 'artistDescription']);
    Route::get('/map', [AdminController::class, 'map'])->name('map');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profil', [AuthController::class, 'userProfile'])->name('profile');
});

Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'paymentIndex')->name('payment');
});

Route::post('/payment/notification', [PaymentController::class, 'handleNotification'])->withoutMiddleware('web');
