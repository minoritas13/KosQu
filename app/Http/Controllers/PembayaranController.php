<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        // Data Palsu (Dummy) buat Pamer Tampilan Dulu
        $pembayarans = [
            [
                'bulan' => 'November 2025',
                'tanggal' => '25 Nov 2025',
                'jumlah' => 'Rp 850.000',
                'status' => 'Lunas',
                'metode' => 'Transfer BCA'
            ],
            [
                'bulan' => 'Oktober 2025',
                'tanggal' => '25 Okt 2025',
                'jumlah' => 'Rp 850.000',
                'status' => 'Lunas',
                'metode' => 'QRIS (Gopay)'
            ],
            [
                'bulan' => 'Desember 2025',
                'tanggal' => '-',
                'jumlah' => 'Rp 850.000',
                'status' => 'Belum Bayar',
                'metode' => '-'
            ],
        ];

        return view('penyewa.pembayaran.index', compact('pembayarans'));
    }
}