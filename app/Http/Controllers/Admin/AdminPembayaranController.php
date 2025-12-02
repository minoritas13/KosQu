<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kamar;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'status' => 'selesai'
        ]);

        // ambil booking terkait pembayaran ini
        $booking = Booking::findOrFail($pembayaran->booking_id);

        // update status booking
        $booking->update([
            'status' => 'disetujui'
        ]);

        // ambil kamar dari booking
        $kamar = Kamar::findOrFail($booking->kamar_id);

        // update status kamar
        $kamar->update([
            'status' => 'terisi'
        ]);

        return redirect()->route('admin.pembayaran')
            ->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }
}
