<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarController extends Controller
{

    // =========================
    // DETAIL KAMAR
    // =========================
    public function show($id)
    {
        $kamar = Kamar::findOrFail($id);

        return view('kamar.detail-kamar', compact('kamar'));
    }


    // =========================
    // HALAMAN FORM PESAN (opsional)
    // =========================
    public function pesan($id)
    {
        $kamar = Kamar::findOrFail($id);
        return view('user.kamar.pesan', compact('kamar'));
    }


    // =========================
    // SIMPAN PEMESANAN (opsional)
    // =========================
    public function storePesanan(Request $request)
    {
        // nanti bisa kamu isi sesuai kebutuhan
        return back()->with('success', 'Pesanan berhasil dibuat!');
    }
}
