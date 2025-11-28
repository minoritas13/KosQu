<?php

namespace App\Http\Controllers\pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Tampil halaman pembayaran
    public function index($id)
    {
        $booking = Booking::with('kamar')->findOrFail($id);

        return view('penyewa.pembayaran.index', compact('booking'));
    }

    // Proses pembayaran
    public function store(Request $request, $id)
    {
        $request->validate([
            'jenis_pembayaran' => 'required|in:dp,full',
            'metode_bayar' => 'required|in:transfer,e-wallet,cash',
        ]);

        $booking = Booking::findOrFail($id);
        $harga = $booking->kamar->harga;

        // Hitung jumlah bayar
        $jumlah_bayar = $request->jenis_pembayaran === 'dp'
            ? $harga * 0.3
            : $harga;

        // Simpan pembayaran
        $pembayaran = Pembayaran::create([
            'booking_id' => $booking->id,
            'tggl_bayar' => now(),
            'jumlah_bayar' => $jumlah_bayar,
            'metode_bayar' => $request->metode_bayar,
            'status' => 'pending',
        ]);

        // Jika full dan metode transfer → booking bisa dianggap selesai
        if ($request->jenis_pembayaran === 'full') {
            $booking->update([
                'status' => 'selesai',
            ]);
        }

        return redirect()
            ->route('penyewa.pembayaran.success', $booking->id)
            ->with('success', 'Pembayaran berhasil dicatat!');
    }

    public function success($id)
    {

        $booking = Booking::with(['kamar', 'pembayaran'])->findOrFail($id);

        return view('penyewa.pembayaran.success', compact('booking'));
    }
}
