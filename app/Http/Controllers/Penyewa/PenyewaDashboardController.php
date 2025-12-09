<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PenyewaDashboardController extends Controller
{
    /**
     * Dashboard penyewa — menampilkan 3 kamar termurah
     * dengan cache 5 menit.
     */
    public function index()
    {
        $cacheKey = 'dashboard_kamar_terbaru';

        $kamar = Cache::remember($cacheKey, 300, function () {
            return Kamar::where('status', 'tersedia')
                ->orderBy('harga', 'asc')
                ->take(3)
                ->get();
        });

        return view('penyewa.dashboard', compact('kamar'));
    }

    /**
     * Halaman pencarian kamar (dengan filter)
     * menggunakan cache berdasarkan parameter filter.
     */
    public function pencarian(Request $request)
    {
        // Buat cache key unik berdasarkan parameter pencarian
        $cacheKey = 'search_kamar_'.md5(json_encode($request->all()));

        $kamar = Cache::remember($cacheKey, 300, function () use ($request) {

            $query = Kamar::query()->where('status', 'tersedia');

            // FILTER KEYWORD

            if ($request->filled('keyword')) {
                $keyword = $request->keyword;

                $query->where(function ($q) use ($keyword) {
                    $q->where('nomor_kamar', 'LIKE', "%$keyword%")
                        ->orWhere('tipe_kamar', 'LIKE', "%$keyword%")
                        ->orWhere('deskripsi', 'LIKE', "%$keyword%");
                });
            }

            // FILTER HARGA

            if ($request->harga == 'asc') {
                $query->orderBy('harga', 'asc');
            } elseif ($request->harga == 'desc') {
                $query->orderBy('harga', 'desc');
            }

            // URUTKAN WAKTU

            if ($request->urutkan == 'newest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->urutkan == 'oldest') {
                $query->orderBy('created_at', 'asc');
            }

            return $query->get();
        });

        return view('penyewa.dashboard', compact('kamar'));
    }
}
