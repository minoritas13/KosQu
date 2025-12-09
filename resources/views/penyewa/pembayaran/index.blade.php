@extends('layouts.app')

@section('content')

<div class="min-h-screen py-10 bg-gray-50">
    <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="mb-10 text-center">
            <h1 class="text-3xl font-extrabold text-gray-900">Dompet Saya 💸</h1>
            <p class="mt-2 text-gray-500">Pantau semua pengeluaran nge-kost kamu di sini.</p>
        </div>

        {{-- CARD RINGKASAN --}}
        <div class="relative p-8 mb-10 overflow-hidden text-white shadow-xl bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl">
            <div class="absolute top-0 right-0 w-40 h-40 -mt-10 -mr-10 bg-white rounded-full opacity-10 blur-2xl"></div>

            <div class="relative z-10 flex flex-col items-center justify-between gap-6 md:flex-row">
                <div>
                    <p class="text-sm font-medium tracking-wider text-blue-100 uppercase">
                        Total Pengeluaran
                    </p>
                    <h2 class="mt-1 text-4xl font-bold">
                        Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                    </h2>
                </div>

                <div class="flex gap-4">
                    <div class="p-4 text-center bg-white/20 backdrop-blur-sm rounded-xl">
                        <span class="block text-2xl font-bold text-yellow-300">{{ $tagihanPending }}</span>
                        <span class="text-xs text-blue-100">Tagihan Pending</span>
                    </div>

                    <div class="p-4 text-center bg-white/20 backdrop-blur-sm rounded-xl">
                        <span class="block text-2xl font-bold text-green-300">{{ $jumlahSelesai }}</span>
                        <span class="text-xs text-blue-100">Berhasil</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- LIST PEMBAYARAN --}}
        <div class="space-y-4">
            <h3 class="mb-4 text-lg font-bold text-gray-900">Riwayat Transaksi</h3>

            @forelse($pembayarans as $item)
                <div class="flex flex-col items-center gap-5 p-5 transition duration-300 bg-white border border-gray-100 shadow-sm rounded-2xl hover:shadow-md sm:flex-row">

                    {{-- Ikon Status --}}
                    <div class="flex items-center justify-center flex-shrink-0 w-16 h-16 text-blue-600 rounded-full bg-blue-50">
                        @if($item->status == 'selesai')
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        @elseif($item->status == 'pending')
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        @else
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        @endif
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 text-center sm:text-left">
                        <h4 class="text-lg font-bold text-gray-900">
                            {{ $item->booking->kamar->tipe_kamar ?? 'Pembayaran Kost' }}
                        </h4>
                    </div>

                    {{-- Harga --}}
                    <div class="text-center sm:text-right">
                        <p class="text-lg font-bold text-gray-900">
                            Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}
                        </p>

                        <div class="mt-1">
                            @if($item->status == 'selesai')
                                <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-bold text-green-700 bg-green-100 rounded-full">
                                    ✅ Lunas
                                </span>
                            @elseif($item->status == 'pending')
                                <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-bold text-yellow-700 bg-yellow-100 rounded-full">
                                    ⏳ Menunggu Konfirmasi
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-bold text-red-700 bg-red-100 rounded-full">
                                    ❌ Gagal
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center">
                    <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-gray-100 rounded-full">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <p class="font-medium text-gray-500">Belum ada riwayat transaksi.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
