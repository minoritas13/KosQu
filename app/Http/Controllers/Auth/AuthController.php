<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
                'confirmed',
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

            // Cek verifikasi email
            if (is_null($user->email_verified_at)) {
                Auth::logout();

                return redirect()->route('verification.notice')
                    ->with('warning', 'Silakan verifikasi email terlebih dahulu sebelum login.');
            }

            // === Arahkan sesuai role ===
            switch ($user->role) {

                case 'admin':
                    return redirect()->route('admin.dashboard')
                        ->with('success', 'Selamat datang kembali, Admin '.$user->name.'!');

                case 'penyewa':
                    return redirect()->route('penyewa.dashboard')
                        ->with('success', 'Selamat datang kembali, '.$user->name.'!');

                default:
                    Auth::logout();

                    return back()->with('error', 'Role tidak valid.');
            }
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
