<?php

namespace App\Http\Controllers;

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

    public function pencarian()
    {
        $kamar = \App\Models\Kamar::where('status', 'tersedia')
                ->orderBy('harga', 'asc')
                ->get();

        return view('user.pencarian', compact('kamar'));
    }

}