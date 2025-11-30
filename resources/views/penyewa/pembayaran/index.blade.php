@extends('layouts.app')

@section('title', 'Riwayat Pembayaran | KostQu')

@section('content')
<div class="min-h-screen bg-gray-50 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Halaman --}}
        <div class="flex justify-between items-end mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Pembayaran Kos</h1>
                <p class="mt-2 text-sm text-gray-600">Pantau tagihan dan riwayat transaksimu di sini.</p>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg shadow-lg font-medium transition duration-200 transform hover:-translate-y-1 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Bayar Tagihan Baru
            </button>
        </div>

        {{-- Kartu Ringkasan (Statistik) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-gray-500 text-sm font-medium">Tagihan Bulan Ini</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">Rp 850.000</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mt-3">
                    Belum Dibayar
                </span>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-gray-500 text-sm font-medium">Total Pengeluaran (2025)</p>
                <h3 class="text-2xl font-bold text-blue-600 mt-1">Rp 1.700.000</h3>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <p class="text-gray-500 text-sm font-medium">Status Sewa</p>
                <h3 class="text-2xl font-bold text-green-600 mt-1">Aktif</h3>
                <p class="text-xs text-gray-400 mt-1">Sisa 28 hari lagi</p>
            </div>
        </div>

        {{-- Tabel Riwayat --}}
        <div class="bg-white shadow-md rounded-2xl overflow-hidden border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                <h3 class="font-bold text-gray-800 text-lg">Riwayat Transaksi</h3>
                <span class="text-xs text-gray-500 bg-white border px-3 py-1 rounded-full">3 Bulan Terakhir</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider">
                            <th class="px-6 py-4 font-semibold">Bulan Tagihan</th>
                            <th class="px-6 py-4 font-semibold">Tanggal Bayar</th>
                            <th class="px-6 py-4 font-semibold">Metode</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold text-right">Jumlah</th>
                            <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($pembayarans as $item)
                        <tr class="hover:bg-blue-50/50 transition duration-150">
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-900">{{ $item['bulan'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-sm">
                                {{ $item['tanggal'] }}
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-sm">
                                {{ $item['metode'] }}
                            </td>
                            <td class="px-6 py-4">
                                @if($item['status'] == 'Lunas')
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                        ✅ Lunas
                                    </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">
                                        ⏳ Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-gray-800">
                                {{ $item['jumlah'] }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-400 hover:text-blue-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            {{-- Footer Tabel (Pagination Dummy) --}}
            <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                <p class="text-xs text-gray-500 text-center">Menampilkan 3 data terbaru</p>
            </div>
        </div>

    </div>
</div>
@endsection