<?php

namespace App\Http\Controllers\pembayaran;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // -------------------------------
    //  HALAMAN PEMBAYARAN
    // -------------------------------
    public function index()
{
    $userId = \Illuminate\Support\Facades\Auth::id();

    // Logic Riwayat (Ambil banyak data)
    $pembayarans = \App\Models\Pembayaran::whereHas('booking', function($q) use ($userId) {
                        $q->where('user_id', $userId);
                    })
                    ->with(['booking.kamar'])
                    ->orderBy('created_at', 'desc')
                    ->get();

    // Lempar ke View Dashboard/Riwayat
    return view('penyewa.pembayaran.index', compact('pembayarans'));
}

// 2. FUNGSI FORM BAYAR (Butuh $id, ini code lama lu tadi)
public function create($id)
{
    // Logic Form (Ambil 1 data booking)
    $booking = \App\Models\Booking::with('kamar')->findOrFail($id);

    // Lempar ke View Form Bayar (Nanti kita siapin filenya)
    return view('penyewa.pembayaran.create', compact('booking'));
}

    public function store(Request $request, $id)
    {
        // VALIDASI sesuai form
        $request->validate([
            'jenis_pembayaran' => 'required|in:dp,full',
            'metode_bayar' => 'required|in:transfer,e-wallet,cash',
            'bukti_bayar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $booking = Booking::findOrFail($id);
        $harga = $booking->kamar->harga;

        // Hitung total bayar dari input jenis pembayaran
        $jumlah_bayar = $request->jenis_pembayaran === 'dp'
            ? $harga * 0.3
            : $harga;

        // Upload bukti pembayaran
        $buktiPath = null;
        if ($request->hasFile('bukti_bayar')) {
            $buktiPath = $request->file('bukti_bayar')->store('bukti-pembayaran', 'public');
        }

        // Simpan pembayaran ke DB
        $pembayaran = Pembayaran::create([
            'booking_id'    => $booking->id,
            'tggl_bayar'    => now(),
            'jumlah_bayar'  => $jumlah_bayar,
            'metode_bayar'  => $request->metode_bayar,
            'bukti_bayar'   => $buktiPath,
            'status'        => 'pending',
        ]);

        // Update status booking
        if ($request->jenis_pembayaran === 'full') {
            $booking->update(['status' => 'disetujui']);
        } else {
            $booking->update(['status' => 'pending']);
        }

        // Update status kamar → terisi
        $booking->kamar->update([
            'status' => 'terisi'
        ]);

        return redirect()
            ->route('penyewa.pembayaran.success', $booking->id)
            ->with('success', 'Pembayaran berhasil dicatat!');
    }


    // -------------------------------
    // HALAMAN SUKSES PEMBAYARAN
    // -------------------------------
    public function success($id)
    {
        $booking = Booking::with(['kamar', 'pembayaran'])->findOrFail($id);
        return view('penyewa.pembayaran.success', compact('booking'));
    }
}
