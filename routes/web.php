<?php

use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\KamarController;
use App\Http\Controllers\Admin\PenyewaController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Pembayaran\PembayaranController;
use App\Http\Controllers\Penyewa\BookingPenyewaController;
use App\Http\Controllers\Penyewa\PenyewaDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ---------- AUTH ----------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // Halaman "Silakan verifikasi email Anda"
    Route::get('/email/verify', [VerificationController::class, 'notice'])
        ->name('verification.notice');

    // Link verifikasi yang dikirim ke email
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');

    // Kirim ulang email verifikasi
    Route::post('/email/verification-notification', [VerificationController::class, 'send'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

// ---------- DASHBOARD PENYEWA -----------
Route::middleware(['auth', 'verified', 'role:penyewa'])->prefix('penyewa')->group(function () {

    Route::get('/dashboard', [PenyewaDashboardController::class, 'index'])->name('penyewa.dashboard');

    Route::get('kamar/{id}/pesan' ,[BookingPenyewaController::class, 'index'] )->name('penyewa.pesan');
    Route::post('kamar/{id}/pesan', [BookingPenyewaController::class, 'store'])->name('kamar.pesan');

    Route::get('booking/{id}/pembayaran',[PembayaranController::class, 'index'])->name('penyewa.pembayaran');
    Route::post('booking/{id}/pembayaran',[PembayaranController::class, 'store'])->name('penyewa.pembayaran.store');

    Route::get('pembayaran/{id}/sukses', [PembayaranController::class, 'success'])
    ->name('penyewa.pembayaran.success');

});

// ---------- DASHBOARD ADMIN -----------
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('kamar', KamarController::class);

        Route::resource('penyewa', PenyewaController::class);
    });
