<?php

namespace App\Http\Controllers\Pembayaran;

use App\Models\Kamar;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function index($id)
    {

        $booking = Booking::findorfail($id);

        return view('penyewa.pembayaran.index', compact('booking'));
    }

    public function store(Request $request, $booking_id)
    {

        $request->validate([
            'tggl_bayar'     => 'required|date',
            'jumlah_bayar'   => 'required|numeric|min:0',
            'metode_bayar'   => 'required|in:transfer,cash,e-wallet',
        ]);

        $booking = Booking::findOrFail($booking_id);

        // simpan pembayaran
        $pembayaran = Pembayaran::create([
            'booking_id'   => $booking->id,
            'tggl_bayar'   => $request->tggl_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'metode_bayar' => $request->metode_bayar,
            'status'       => 'pending',
        ]);

        // update status booking
        $booking->update([
            'status' => 'menunggu_verifikasi'
        ]);

        return redirect()->route('penyewa.dashboard')
            ->with('success', 'Pembayaran berhasil dikirim, menunggu verifikasi admin.');
    }
}
