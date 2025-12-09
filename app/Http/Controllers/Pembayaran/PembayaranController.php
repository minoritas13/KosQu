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
        // Ambil semua pembayaran milik user yang sedang login
        $pembayarans = Pembayaran::whereHas('booking', function ($query) {
            $query->where('user_id', auth()->id());
        })
            ->with(['booking.kamar'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Perhitungan dipindahkan ke Controller
        $totalPengeluaran = $pembayarans->where('status', 'selesai')->sum('jumlah_bayar');
        $tagihanPending = $pembayarans->where('status', 'pending')->count();
        $jumlahSelesai = $pembayarans->where('status', 'selesai')->count();

        // Kirim ke Blade
        return view('penyewa.pembayaran.index', [
            'pembayarans' => $pembayarans,
            'totalPengeluaran' => $totalPengeluaran,
            'tagihanPending' => $tagihanPending,
            'jumlahSelesai' => $jumlahSelesai,
        ]);
    }

    // 2. FUNGSI FORM BAYAR (Butuh $id, ini code lama lu tadi)
    public function create($id)
    {
        // Logic Form (Ambil 1 data booking)
        $booking = Booking::with('kamar')->findOrFail($id);

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
            'booking_id' => $booking->id,
            'tgl_bayar' => now(),
            'jumlah_bayar' => $jumlah_bayar,
            'metode_bayar' => $request->metode_bayar,
            'bukti_bayar' => $buktiPath,
            'status' => 'pending',
        ]);

        // Update status booking
        if ($request->jenis_pembayaran === 'full') {
            $booking->update(['status' => 'disetujui']);
        } else {
            $booking->update(['status' => 'pending']);
        }

        // Update status kamar → terisi
        $booking->kamar->update([
            'status' => 'terisi',
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
