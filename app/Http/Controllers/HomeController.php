<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class HomeController extends Controller
{
    public function index()
    {
        $kamar = Kamar::where('status', 'tersedia')
                ->orderBy('harga', 'asc')
                ->take(3)
                ->get();

        return view('user.home', compact('kamar'));
    }

    public function pencarian(Request $request)
{
    $query = Kamar::query();

    // =============================
    // 🔍 FILTER KEYWORD PENCARIAN
    // =============================
    if ($request->filled('keyword')) {
        $keyword = $request->keyword;

        $query->where(function ($q) use ($keyword) {
            $q->where('nomor_kamar', 'LIKE', "%$keyword%")
              ->orWhere('tipe_kamar', 'LIKE', "%$keyword%")
              ->orWhere('deskripsi', 'LIKE', "%$keyword%");
        });
    }

    // =============================
    // 💰 FILTER HARGA (ASC / DESC)
    // =============================
    if ($request->filled('harga')) {
        if ($request->harga == 'asc') {
            $query->orderBy('harga', 'asc');
        } elseif ($request->harga == 'desc') {
            $query->orderBy('harga', 'desc');
        }
    }

    // =============================
    // 🧩 FILTER FASILITAS
    // (dicari dalam deskripsi)
    // =============================
    if ($request->filled('fasilitas')) {
        $query->where('deskripsi', 'LIKE', '%' . $request->fasilitas . '%');
    }

    // =============================
    // 📌 URUTKAN BERDASARKAN WAKTU
    // =============================
    if ($request->filled('urutkan')) {
        if ($request->urutkan == 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($request->urutkan == 'oldest') {
            $query->orderBy('created_at', 'asc');
        }
    }

    // =============================
    // ✔ HANYA KAMAR TERSEDIA
    // =============================
    $query->where('status', 'tersedia');

    // Ambil hasil
    $kamar = $query->get();

    return view('user.pencarian', compact('kamar'));
}

}
