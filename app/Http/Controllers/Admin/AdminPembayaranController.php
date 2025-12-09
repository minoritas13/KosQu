<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Kamar;
use App\Models\Pembayaran;

class AdminPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('booking')->orderBy('created_at', 'desc')->get();

        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function konfirmasi($id)
    {
        // cari data pembayaran
        $pembayaran = Pembayaran::findOrFail($id);

        // update status pembayaran
        $pembayaran->update([
            'status' => 'selesai',
        ]);

        // ambil booking terkait pembayaran ini
        $booking = Booking::findOrFail($pembayaran->booking_id);

        // update status booking
        $booking->update([
            'status' => 'disetujui',
        ]);

        // ambil kamar dari booking
        $kamar = Kamar::findOrFail($booking->kamar_id);

        // update status kamar
        $kamar->update([
            'status' => 'terisi',
        ]);

        return redirect()->route('admin.pembayaran')
            ->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function batal($id)
    {
        // Ambil data pembayaran
        $pembayaran = Pembayaran::findOrFail($id);

        // Update status pembayaran menjadi dibatalkan
        $pembayaran->update([
            'status' => 'batal',
        ]);

        // Ambil booking terkait
        $booking = Booking::findOrFail($pembayaran->booking_id);

        // Update booking menjadi dibatalkan
        $booking->update([
            'status' => 'batal',
        ]);

        // Ambil kamar dan jadikan tersedia lagi
        $kamar = Kamar::findOrFail($booking->kamar_id);

        $kamar->update([
            'status' => 'tersedia',
        ]);

        return redirect()->route('admin.pembayaran')
            ->with('success', 'Pembayaran berhasil dibatalkan.');
    }
}
