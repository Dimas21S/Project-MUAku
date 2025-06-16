<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsCustomer;


Route::get('/', [AdminController::class, 'index'])->name('landing-page');


//Rute URL untuk admin
Route::controller(AdminController::class)->group(function () {
    Route::get('/about-us', 'aboutUs')->name('about-us');

    Route::get('/contact', 'contactPage')->name('contact');

    Route::get('/data-langganan', 'dataPelanggan')->name('data-pelanggan');

    Route::get('/verified-admin', 'verifiedMakeUpArtist')->name('verified-admin');

    Route::get('/vip-fitur', 'fiturVip')->name('vip-fitur');

    Route::post('/update-status/{artistId}', 'updateStatus')->name('admin.post.update-status');

    Route::get('/package/{id}/edit', 'formEditPackage')->name('form-edit');

    Route::put('/package/{id}', 'editPackage')->name('update-package');
})->middleware(IsAdmin::class);

//Rute URL untuk yang belum login maupun register (User yang sudah login tidak bisa mengakses rute ini)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');              // Menampilkan form login

    Route::post('/login', [AuthController::class, 'login'])->name('login.post');                // Menangani proses login

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Menampilkan form registrasi

    Route::post('/register', [AuthController::class, 'register'])->name('register.post');       // Menangani proses registrasi
});

//Rute URL untuk login atau register makeup artist
Route::controller(ArtistController::class)->group(function () {
    Route::get('/login-mua', 'artistLoginForm')->name('login-mua');                           // Menampilkan form login untuk makeup artist

    Route::post('/login-mua', 'artistLogin')->name('login-mua.post');                         // Menangani proses login untuk makeup artist

    Route::get('/register-mua', 'artistRegisterForm')->name('register-mua');                  // Menampilkan form registrasi untuk makeup artist

    Route::post('/register-mua', 'artistRegister')->name('register-mua.post');                // Menangani proses registrasi untuk makeup artist

    Route::get('/pendaftaran', 'submitRequest')->name('get.pendaftaran');                     // Menampilkan form pendaftaran makeup artist

    Route::post('/pendaftaran', 'formSubmitRequest')->name('post.pendaftaran');               // Menangani pengiriman form pendaftaran makeup artist

    Route::get('/pendaftaran-berhasil', 'pendaftaranBerhasil')->name('pendaftaran.berhasil'); // Menampilkan halaman pendaftaran berhasil

    Route::get('/daftar-mua', 'listMakeUpArtist')->name('list-mua');                          // Menampilkan daftar makeup artist (Beranda untuk pengguna)

    Route::get('/edit-mua', 'editMakeUpArtist')->name('edit-mua');                            // Menampilkan form edit makeup artist

    Route::patch('/update-mua', 'updateMakeUpArtist')->name('update-mua');                    // Menangani pembaruan data makeup artist

    Route::get('/index-mua', 'artistIndex')->name('index-mua');

    Route::post('/log-out', 'artistLogout')->name('log-out');

    Route::delete('/mua/photo/{id}', 'destroyPhoto')->name('delete-photo');
    // Menangani logout makeup artist
});

//Rute URL yang hanya bisa diakses oleh role customer
//Rute URL untuk yang sudah login (User yang belum login tidak bisa mengakses rute ini)
Route::middleware(IsCustomer::class)->group(function () {
    Route::get('/deskripsi-mua/{id}', [ArtistController::class, 'artistDescription']);

    Route::post('/toggle-like/{artistId}', [LikeController::class, 'toggleLike'])->name('toggle.like');

    Route::get('/map', [ArtistController::class, 'listAddressMakeUpArtist'])->name('map');

    Route::get('/address', [ArtistController::class, 'listAddressMakeUpArtist'])->name('address');

    Route::get('/profil/update', [UserController::class, 'userUpdate'])->name('update');

    Route::patch('/update-profil', [UserController::class, 'userUpdateProfile'])->name('update.profile');

    Route::get('/profil/update-password', [UserController::class, 'formUpdatePassword'])->name('update.password');

    Route::patch('/profil/update-password', [UserController::class, 'updatePassword'])->name('update.password.post');

    Route::get('/favourite', [UserController::class, 'favouriteUser'])->name('favourite');

    Route::post('/hapus-riwayat', [UserController::class, 'deleteHistory'])->name('delete.history');

    Route::get('/chat/mua/{mua_id}', [ChatController::class, 'userToMua'])->name('chat.user.to.mua');

    Route::post('/chat/mua/{mua_id}', [ChatController::class, 'userSendToMua'])->name('chat.user.send.mua');
});

Route::get('/mua/chat/user/{user_id}', [ChatController::class, 'muaToUser'])->name('chat.mua.to.user');

Route::post('/mua/chat/user/{user_id}', [ChatController::class, 'muaSendToUser'])->name('chat.mua.send.user');

// Rute URL pembayaran
Route::controller(PaymentController::class)->group(function () {
    Route::get('/payment', 'paymentIndex')->name('payment');                // Menampilkan halaman pembayaran

    Route::post('/get-snap-token', 'getSnapToken')->name('get-snap-token'); // Mendapatkan token Snap dari Midtrans
});

// Rute URL untuk profil pengguna
Route::get('/profil', [UserController::class, 'userProfile'])->name('profile'); // Menampilkan profil pengguna
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/notif-chat', [ChatController::class, 'receivedMessages'])->name('notif-chat');



// Rute URL untuk notifikasi dari Midtrans
// Rute ini tidak memerlukan middleware 'web' karena hanya digunakan untuk menerima notifikasi dari Midtrans
// Pastikan untuk menyesuaikan URL ini dengan URL yang anda daftarkan di Midtrans
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->withoutMiddleware('web');
Route::post('/payment/notification', [PaymentController::class, 'handleNotification'])->withoutMiddleware('web');
