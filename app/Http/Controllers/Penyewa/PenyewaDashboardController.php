<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenyewaDashboardController extends Controller
{
    public function index()
    {
        return view('penyewa.dashboard');
    }
}
