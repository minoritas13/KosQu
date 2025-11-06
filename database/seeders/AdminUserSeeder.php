<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Cek dulu apakah admin sudah ada
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'id' => Str::uuid(),
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'no_hp' => '081368087522',
                'alamat' => 'jl hj komarudin',
                'password' => Hash::make('password123'), // ganti sesuai keinginan
                'role' => 'admin', // pastikan field ini ada di tabel users
                'email_verified_at' => now(), // langsung dianggap sudah verifikasi
            ]);
        }
    }
}
