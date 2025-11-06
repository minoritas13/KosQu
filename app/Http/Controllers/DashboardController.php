<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil 5 kamar terbaru yang tersedia
        $kamar = Kamar::where('status', 'tersedia')
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

        // Ambil 5 booking terakhir untuk ditampilkan
        $booking = Booking::with(['user', 'kamar'])
                    ->orderBy('created_at', 'desc')
                    ->take(5)
                    ->get();

        // Kirim data ke view welcome.blade.php
        return view('welcome', compact('kamar', 'booking'));
    }
}
