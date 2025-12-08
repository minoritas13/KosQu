@extends('layouts.app')



@section('content')



{{-- 1. LOGIKA HITUNGAN (Di sini aja biar Controller aman) --}}

@php

    // Kita cek dulu datanya ada gak

    $listBayar = $pembayarans ?? collect([]); 



    // Hitung Total Pengeluaran (Cuma yang Lunas)

    $totalPengeluaran = $listBayar->where('status', 'lunas')->sum('jumlah_bayar');



    // Hitung Tagihan Pending

    $tagihanPending = $listBayar->where('status', 'pending')->count();

@endphp



<div class="min-h-screen bg-gray-50 py-10">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        

        {{-- HEADER SIMPLE --}}

        <div class="text-center mb-10">

            <h1 class="text-3xl font-extrabold text-gray-900">Dompet Saya 💸</h1>

            <p class="text-gray-500 mt-2">Pantau semua pengeluaran nge-kost kamu di sini.</p>

        </div>



        {{-- RINGKASAN DUIT (Card Atas) --}}

        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-xl mb-10 relative overflow-hidden">

            <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-white opacity-10 rounded-full blur-2xl"></div>

            

            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-6">

                <div>

                    <p class="text-blue-100 text-sm font-medium uppercase tracking-wider">Total Pengeluaran</p>

                    <h2 class="text-4xl font-bold mt-1">

                        Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}

                    </h2>

                </div>

                

                <div class="flex gap-4">

                    <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-center">

                        <span class="block text-2xl font-bold text-yellow-300">{{ $tagihanPending }}</span>

                        <span class="text-xs text-blue-100">Tagihan Pending</span>

                    </div>

                    <div class="bg-white/20 backdrop-blur-sm p-4 rounded-xl text-center">

                        <span class="block text-2xl font-bold text-green-300">

                            {{ $listBayar->where('status', 'lunas')->count() }}

                        </span>

                        <span class="text-xs text-blue-100">Berhasil</span>

                    </div>

                </div>

            </div>

        </div>



        {{-- LIST TRANSAKSI --}}

        <div class="space-y-4">

            <h3 class="text-lg font-bold text-gray-900 mb-4">Riwayat Transaksi</h3>



            @forelse($listBayar as $item)

                <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition duration-300 flex flex-col sm:flex-row items-center gap-5">

                    

                    {{-- Ikon Status (Kiri) --}}

                    <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0 text-blue-600">

                        @if($item->status == 'lunas')

                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>

                        @elseif($item->status == 'pending')

                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>

                        @else

                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>

                        @endif

                    </div>



                    {{-- Info Tengah --}}

                    <div class="flex-1 text-center sm:text-left">

                        <h4 class="font-bold text-gray-900 text-lg">

                            {{ $item->booking->kamar->tipe_kamar ?? 'Pembayaran Kost' }}

                        </h4>

                        <p class="text-gray-500 text-sm">

                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }} 

                            <span class="mx-1">•</span> 

                            ID: #{{ substr($item->id, 0, 6) }}

                        </p>

                    </div>



                    {{-- Harga & Badge (Kanan) --}}

                    <div class="text-center sm:text-right">

                        <p class="text-lg font-bold text-gray-900">

                            Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}

                        </p>

                        

                        <div class="mt-1">

                            @if($item->status == 'lunas')

                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">

                                    ✅ Lunas

                                </span>

                            @elseif($item->status == 'pending')

                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">

                                    ⏳ Menunggu Konfirmasi

                                </span>

                            @else

                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">

                                    ❌ Gagal

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                {{-- Tampilan Kosong --}}

                <div class="text-center py-12">

                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">

                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>

                    </div>

                    <p class="text-gray-500 font-medium">Belum ada riwayat transaksi.</p>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection