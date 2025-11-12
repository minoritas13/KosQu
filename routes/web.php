<?php

use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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

Route::get('/', function(){
    return view('welcome');
});


// ---------- AUTH ----------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ---------- EMAIL VERIFICATION ----------
Route::get('/email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class,'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [VerificationController::class ,'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// ---------- DASHBOARD (Contoh) ----------
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
