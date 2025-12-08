<?php

namespace App\Http\Controllers\Penyewa;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenyewaProfileController extends Controller
{
    // Tampilkan Halaman Edit Profile
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Proses Simpan Perubahan
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:15',
            'password' => 'nullable|min:8|confirmed', // Password opsional
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;

        // Kalau password diisi, baru kita ubah
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Save manual karena user modelnya mungkin beda property

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
