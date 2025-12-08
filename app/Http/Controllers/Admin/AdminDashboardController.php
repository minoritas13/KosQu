<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kamar;
use App\Models\Booking;
use App\Models\Pembayaran;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalKamar' => Kamar::count(),
            'totalBooking' => Booking::count(),
            'totalPembayaran' => Pembayaran::count(),
        ]);
    }
}
