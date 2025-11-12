<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class AuthController extends Controller
{
    // Form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s]*$/'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:100', 'unique:users,email'],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:64',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).+$/',
                'confirmed'
            ],
            'no_hp' => ['required', 'string', 'min:10'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'role' => 'penyewa',
        ]);

        // kirim email verifikasi otomatis
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice')
            ->with('success', 'Akun berhasil dibuat! Silakan verifikasi email sebelum login.');
    }

    // Form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek apakah email sudah diverifikasi
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return redirect()->route('verification.notice')
                    ->with('warning', 'Silakan verifikasi email terlebih dahulu sebelum login.');
            }

            return redirect()->route('dashboard')->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
