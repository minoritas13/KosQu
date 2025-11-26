<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\kamar;
use Illuminate\Http\Request;

class KamarPenyewaController extends Controller
{
    public function index($id)
    {
        $kamar = Kamar::findorfail($id);

        return view('penyewa.kamar.pesan', compact('kamar'));
    }

    public function store(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'tgl_booking' => 'required|date',
        ]);

        // Ambil kamar berdasarkan id
        $kamar = Kamar::findOrFail($id);

        // Simpan data booking
        Booking::create([
            'kamar_id' => $kamar->id,
            'user_id' => auth()->id(),
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'tgl_booking' => $request->tgl_booking,
            'status' => 'pending',
        ]);

        // ubah status kamar menjadi terisi
        $kamar->update([
            'status' => 'terisi',
        ]);

        return redirect()->route('penyewa.dashboard')
            ->with('success', 'Pemesanan berhasil!');
    }
}
