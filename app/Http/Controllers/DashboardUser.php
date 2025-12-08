<?php

namespace App\Http\Controllers;

use App\Models\kamar;

class DashboardUser extends Controller
{
public function index()
{
    // Ambil 3 kamar buat teaser
    $kamar = Kamar::where('status', 'tersedia')
                   ->orderBy('harga', 'asc')
                   ->take(3)
                   ->get();

    // PENTING: Arahkan ke 'welcome', bukan 'user.home'
    // Kirim variabel dengan nama 'kamar'
    return view('welcome', compact('kamar'));
}

}
