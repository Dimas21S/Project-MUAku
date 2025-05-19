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
    Route::get('/verified-admin', 'verifiedMakeUpArtist')->name('verified-admin');
    Route::get('/vip-fitur', 'fiturVip');
});

//Rute URL untuk yang belum login maupun register (User yang sudah login tidak bisa mengakses rute ini)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

//Rute URL untuk login atau register makeup artist
Route::controller(ArtistController::class)->group(function () {
    Route::get('/login-mua', 'artistLoginForm')->name('login-mua');
    Route::post('/login-mua', 'artistLogin')->name('login-mua.post');
    Route::get('/register-mua', 'artistRegisterForm')->name('register-mua');
    Route::post('/register-mua', 'artistRegister')->name('register-mua.post');
    Route::get('/pendaftaran', 'submitRequest')->name('get.pendaftaran');
    Route::post('/pendaftaran', 'formSubmitRequest')->name('post.pendaftaran');
});

//Rute URL yang hanya bisa diakses oleh role customer (Masih terdapat bug)
//Rute URL untuk yang sudah login (User yang belum login tidak bisa mengakses rute ini)
Route::middleware('auth')->group(function () {
    Route::get('/daftar-mua', [ArtistController::class, 'listMakeUpArtist'])->name('list-mua');
    Route::get('/deskripsi-mua/{id}', [ArtistController::class, 'artistDescription']);
    Route::get('/map', [AdminController::class, 'map'])->name('map');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profil', [AuthController::class, 'userProfile'])->name('profile');
});

// Rute URL pembayaran
Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'paymentIndex')->name('payment');
    Route::post('/get-snap-token', 'getSnapToken')->name('get-snap-token');
});

// Rute URL untuk notifikasi dari Midtrans
// Rute ini tidak memerlukan middleware 'web' karena hanya digunakan untuk menerima notifikasi dari Midtrans
// Pastikan untuk menyesuaikan URL ini dengan URL yang anda daftarkan di Midtrans
Route::get('payment/success', [PaymentController::class, 'paymentSuccess'])->withoutMiddleware('web');
Route::post('/payment/notification', [PaymentController::class, 'handleNotification'])->withoutMiddleware('web');
