<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\kamar;
use Illuminate\Http\Request;

class PenyewaDashboardController extends Controller
{
    public function index()
    {
        $kamar = Kamar::where('status','tersedia')->get();

        return view('penyewa.dashboard', compact('kamar'));
    }
}
