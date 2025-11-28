<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminPembayaranController extends Controller
{
    public function index()
    {
        // Ambil data pembayaran beserta data booking
        $pembayaran = Pembayaran::with('booking')->orderBy('created_at', 'desc')->get();
        return view('admin.pembayaran.index', compact('pembayaran'));
    }

    public function konfirmasi($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        
        // Update status pembayaran
        $pembayaran->update([
            'status' => 'selesai'
        ]);

        // Opsional: Update status booking juga jika perlu
        // $pembayaran->booking->update(['status' => 'lunas']);

        return redirect()->back()->with('success', 'Pembayaran berhasil dikonfirmasi');
    }
}
