<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\kamar;
use Illuminate\Http\Request;

class PenyewaDashboardController extends Controller
{
    public function index()
    {
        $kamar = Kamar::with('admin')->get();

        return view('penyewa.dashboard', compact('kamar'));
    }
}
