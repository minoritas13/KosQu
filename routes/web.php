<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// ================= HOME (LANDING PAGE) =================
Route::get('/', [HomeController::class, 'index'])->name('home');


// ================= AUTH =================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================= EMAIL VERIFICATION =================
Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [VerificationController::class ,'send'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');


// ================= USER AREA =================
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // PENCAIRAN KAMAR (Search + Filter)
    Route::get('/pencarian', [HomeController::class, 'pencarian'])->name('pencarian');

    // PEMESANAN KAMAR
    Route::get('/kamar/{id}/pesan', [KamarController::class, 'pesan'])->name('kamar.pesan');
    Route::post('/kamar/pesan', [KamarController::class, 'storePesanan'])->name('kamar.store');

    // Halaman detail kamar
    Route::get('/kamar/{id}', [KamarController::class, 'show'])->name('kamar.show');

    // HALAMAN PEMBAYARAN PENYEWA
    Route::get('/pembayaran', [PembayaranController::class, 'index'])
        ->name('penyewa.pembayaran')
        ->middleware('auth'); // Wajib login


    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Ubah Password
    Route::get('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::post('/profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});