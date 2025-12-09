<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\kamar;
use Illuminate\Http\Request;

class BookingPenyewaController extends Controller
{
    public function create($id)
    {
        $kamar = Kamar::findOrFail($id);

        return view('penyewa.kamar.pesan', compact('kamar'));
    }

    public function store(Request $request, $id)
    {
        // Validasi input booking
        $request->validate([
            'tgl_mulai' => 'required|date|after_or_equal:today',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
            'tgl_booking' => 'required|date',
        ]);

        // Ambil kamar berdasarkan ID
        $kamar = Kamar::findOrFail($id);

        // Buat booking baru
        $booking = Booking::create([
            'kamar_id' => $kamar->id,
            'user_id' => auth()->id(),
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'tgl_booking' => $request->tgl_booking,
            'status' => 'pending', // Menunggu pembayaran
        ]);

        // Redirect ke halaman pembayaran berdasarkan ID booking
        return redirect()
            ->route('penyewa.pembayaran.create', ['id' => $booking->id])
            ->with('success', 'Booking Berhasil! Selesaikan pembayaran.');
    }
}
