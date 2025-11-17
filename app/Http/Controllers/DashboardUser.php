<?php

namespace App\Http\Controllers;

use App\Models\kamar;

class DashboardUser extends Controller
{
    public function index()
    {
        $kamar = Kamar::with('admin')->get();

        return view('user.dashboard', compact('kamar'));
    }
}
