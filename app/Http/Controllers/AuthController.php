<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi
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

        // kirim email verifikasi

        return redirect()->route('login.form')->with('success', 'Akun berhasil dibuat! Silakan Login.');
    }

    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            // Ambil user yang baru login
            $user = Auth::user();

            // Jika belum verifikasi email
            if (!$user->hasVerifiedEmail()) {
                // Kirim notifikasi peringatan
                return redirect()->route('dashboard')
                    ->with('warning', 'Anda berhasil login, tapi email belum diverifikasi. Silakan verifikasi sekarang.');
            }

            // Jika sudah verifikasi
            return redirect()->route('dashboard')
                ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        // Jika login gagal
        return back()->with('error', 'Email atau password salah.');
    }


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }
}
