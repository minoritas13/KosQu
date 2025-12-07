@extends('layouts.app')

@section('title', 'Riwayat Pembayaran | KostQu')

@section('content')
<div class="min-h-screen py-10 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        {{-- Header Halaman --}}
        <div class="flex items-end justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Pembayaran Kos</h1>
                <p class="mt-2 text-sm text-gray-600">Pantau tagihan dan riwayat transaksimu di sini.</p>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg shadow-lg font-medium transition duration-200 transform hover:-translate-y-1 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Bayar Tagihan Baru
            </button>
        </div>

        {{-- Kartu Ringkasan (Statistik) --}}
        <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-2xl">
                <p class="text-sm font-medium text-gray-500">Tagihan Bulan Ini</p>
                <h3 class="mt-1 text-2xl font-bold text-gray-800">Rp 850.000</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mt-3">
                    Belum Dibayar
                </span>
            </div>
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-2xl">
                <p class="text-sm font-medium text-gray-500">Total Pengeluaran (2025)</p>
                <h3 class="mt-1 text-2xl font-bold text-blue-600">Rp 1.700.000</h3>
            </div>
            <div class="p-6 bg-white border border-gray-100 shadow-sm rounded-2xl">
                <p class="text-sm font-medium text-gray-500">Status Sewa</p>
                <h3 class="mt-1 text-2xl font-bold text-green-600">Aktif</h3>
                <p class="mt-1 text-xs text-gray-400">Sisa 28 hari lagi</p>
            </div>
        </div>

        {{-- Tabel Riwayat --}}
        <div class="overflow-hidden bg-white border border-gray-100 shadow-md rounded-2xl">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="text-lg font-bold text-gray-800">Riwayat Transaksi</h3>
                <span class="px-3 py-1 text-xs text-gray-500 bg-white border rounded-full">3 Bulan Terakhir</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-sm tracking-wider text-gray-600 uppercase bg-gray-50">
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
                        <tr class="transition duration-150 hover:bg-blue-50/50">
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-900">{{ $item['bulan'] }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $item['tanggal'] }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $item['metode'] }}
                            </td>
                            <td class="px-6 py-4">
                                @if($item['status'] == 'Lunas')
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold leading-5 text-green-800 bg-green-100 border border-green-200 rounded-full">
                                        ✅ Lunas
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold leading-5 text-red-800 bg-red-100 border border-red-200 rounded-full">
                                        ⏳ Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-bold text-right text-gray-800">
                                {{ $item['jumlah'] }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-400 transition hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            <div class="px-6 py-3 border-t border-gray-100 bg-gray-50">
                <p class="text-xs text-center text-gray-500">Menampilkan 3 data terbaru</p>
            </div>
        </div>

    </div>
</div>
@endsection
