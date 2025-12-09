<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\kamar;
use Illuminate\Http\Request;

class PenyewaDashboardController extends Controller
{
    public function index()
    {
        $kamar = Kamar::where('status', 'tersedia')
            ->orderBy('harga', 'asc')
            ->take(3)
            ->get();

        return view('penyewa.dashboard', compact('kamar'));
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

        return view('penyewa.dashboard', compact('kamar'));
    }
}
