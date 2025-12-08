<?php

namespace App\Http\Controllers;

use App\Models\kamar;

class DashboardUser extends Controller
{
    public function index()
    {
        $kamar = Kamar::where('status', 'tersedia')
                ->orderBy('harga', 'asc')
                ->take(3)
                ->get();

        return view('user.home', compact('kamar'));
    }

}
