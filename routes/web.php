<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\KamarController;
use App\Http\Controllers\Admin\PenyewaController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Pembayaran\PembayaranController;
use App\Http\Controllers\Penyewa\BookingPenyewaController;
use App\Http\Controllers\Penyewa\PenyewaProfileController;
use App\Http\Controllers\Penyewa\PenyewaDashboardController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\DashboardUser;

// Ganti namanya jadi 'home'
Route::get('/', [DashboardUser::class, 'index'])->name('home');


// ================= AUTH =================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// --- TAMBAHAN PROFILE (SISIPIN DI SINI) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
// ================ EMAIL VERIFICATION ================
Route::middleware('auth')->group(function () {

    // Halaman "Silakan verifikasi email Anda"
    Route::get('/email/verify', [VerificationController::class, 'notice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/verification-notification', [VerificationController::class, 'send'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

// ---------- DASHBOARD PENYEWA -----------
Route::middleware(['auth', 'verified', 'role:penyewa'])->prefix('penyewa')->group(function () {

    Route::get('/dashboard', [PenyewaDashboardController::class, 'index'])->name('penyewa.dashboard');

    // Ganti 'index' jadi 'create'
    Route::get('kamar/{id}/pesan', [BookingPenyewaController::class, 'create'])->name('penyewa.pesan');

    // Store tetep Store (Udah bener)
    Route::post('kamar/{id}/pesan', [BookingPenyewaController::class, 'store'])->name('kamar.pesan');

    // Rute untuk nampilin Form Bayar (Dipanggil oleh redirect Booking)
Route::get('booking/{id}/pembayaran', [PembayaranController::class, 'create'])
    ->name('penyewa.pembayaran.create'); // <--- INI KUNCI YG HARUS ADA

// Rute untuk memproses Simpan Bukti Bayar (Dipanggil dari Form di create.blade.php)
Route::post('booking/{id}/pembayaran', [PembayaranController::class, 'store'])
    ->name('penyewa.pembayaran.store');

    Route::get('pembayaran/{id}/sukses', [PembayaranController::class, 'success'])
    ->name('penyewa.pembayaran.success');

    // PENCAIRAN KAMAR (Search + Filter)
    Route::get('/pencarian', [PenyewaDashboardController::class, 'pencarian'])->name('pencarian');

    Route::get('/profile', [PenyewaProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [PenyewaProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [PenyewaProfileController::class, 'update'])->name('profile.update');

    // Ubah Password
    Route::get('/profile/password', [PenyewaProfileController::class, 'password'])->name('profile.password');
    Route::post('/profile/password/update', [PenyewaProfileController::class, 'updatePassword'])->name('profile.password.update');

   // 1. Jalur ke Riwayat (Index)
    Route::get('/riwayat-pembayaran', [PembayaranController::class, 'index'])
    ->name('penyewa.riwayat.pembayaran');


});

// --------- DASHBOARD ADMIN -----------
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/pembayaran', [AdminPembayaranController::class, 'index'])->name('pembayaran');
    Route::put('/pembayaran/konfirmasi/{id}', [AdminPembayaranController::class, 'konfirmasi'])
        ->name('pembayaran.konfirmasi');
Route::get('booking/{id}/pembayaran',[PembayaranController::class, 'create'])->name('penyewa.pembayaran.bayar');


    Route::resource('kamar', KamarController::class);

    Route::resource('penyewa', PenyewaController::class);
});

// --- HALAMAN FOOTER (STATIS) ---
// Gak perlu controller, langsung view aja biar cepet
Route::view('/tentang-kami', 'footer.tentang')->name('footer.tentang');
Route::view('/kebijakan-privasi', 'footer.privasi')->name('footer.privasi');
Route::view('/syarat-ketentuan', 'footer.syarat')->name('footer.syarat');