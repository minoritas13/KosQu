@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">

    <!-- Breadcrumb -->
    <nav class="text-sm text-gray-600 mb-4 mt-20">
        <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a> /
        <a href="#" class="hover:text-blue-600">Cari Kamar</a> /
        <span class="font-semibold">{{ $kamar->tipe_kamar }}</span>
    </nav>

    <!-- FOTO UTAMA -->
    <div class="w-full mb-6">
        <img src="{{ asset('storage/' . $kamar->foto) }}"
             class="rounded-xl shadow-md w-full h-[380px] object-cover">
    </div>

    <!-- GRID FOTO (dummy jika belum ada foto lain) -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
        <img src="{{ asset('storage/' . $kamar->foto) }}" class="rounded-lg object-cover h-40 w-full">
        <img src="{{ asset('storage/' . $kamar->foto) }}" class="rounded-lg object-cover h-40 w-full">
        <img src="{{ asset('storage/' . $kamar->foto) }}" class="rounded-lg object-cover h-40 w-full">
        <img src="{{ asset('storage/' . $kamar->foto) }}" class="rounded-lg object-cover h-40 w-full">
    </div>

    <!-- JUDUL -->
    <h1 class="text-3xl font-semibold text-gray-800">
        Kamar {{ $kamar->tipe_kamar }} - No. {{ $kamar->nomor_kamar }}
    </h1>

    <!-- BADGE STATUS -->
    <div class="mt-3 flex flex-wrap gap-2">
        @if($kamar->status == 'tersedia')
            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Tersedia</span>
        @elseif($kamar->status == 'terisi')
            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Terisi</span>
        @else
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-medium">Perbaikan</span>
        @endif
    </div>

    <!-- HARGA -->
    <div class="mt-4 text-xl font-bold text-blue-600">
        Rp {{ number_format($kamar->harga, 0, ',', '.') }} / bulan
    </div>

    <!-- DESKRIPSI -->
    <div class="mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Deskripsi Kamar</h2>

        <p class="text-gray-700 leading-relaxed">
            {{ $kamar->deskripsi ?? 'Belum ada deskripsi kamar.' }}
        </p>
    </div>

    {{-- FASILITAS --}}
    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Fasilitas Kamar</h2>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

            {{-- Ikon Kasur / Tempat Tidur --}}
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 18.75h19.5M4.5 18.75V9.75a2.25 2.25 0 0 1 2.25-2.25h10.5A2.25 2.25 0 0 1 19.5 9.75v9M4.5 12h15"/>
                </svg>
                <span class="text-gray-700">Kasur Queen Size</span>
            </div>

            {{-- Meja Belajar --}}
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 21h18M4 10h16M10 6h4m-8 4v11m12-11v11"/>
                </svg>
                <span class="text-gray-700">Meja Belajar</span>
            </div>

            {{-- AC --}}
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 7.5h16.5m-16.5 0A2.25 2.25 0 0 1 6 5.25h12a2.25 2.25 0 0 1 2.25 2.25m-16.5 0v6.75A2.25 2.25 0 0 0 6 16.5h12a2.25 2.25 0 0 0 2.25-2.25V7.5M6 12h.008v.008H6V12Zm3 0h.008v.008H9V12Zm3 0h.008v.008H12V12Z"/>
                </svg>
                <span class="text-gray-700">Air Conditioner</span>
            </div>

            {{-- Lemari --}}
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 3v18m6-18v18M4 8.5h16M4 15.5h16"/>
                </svg>
                <span class="text-gray-700">Lemari Pakaian</span>
            </div>

            {{-- Wifi --}}
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.288 15.712a4 4 0 0 1 5.424 0M6.1 13.525a7.5 7.5 0 0 1 11.8 0M3.515 11.1a11 11 0 0 1 16.97 0M12 18.75h.008v.008H12V18.75Z"/>
                </svg>
                <span class="text-gray-700">WiFi Gratis</span>
            </div>

            {{-- Kamar Mandi Dalam --}}
            <div class="flex items-center gap-3 bg-white p-4 rounded-xl shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 18V5a3 3 0 1 1 6 0v13m-9 0h12"/>
                </svg>
                <span class="text-gray-700">Kamar Mandi Dalam</span>
            </div>

        </div>
    </div>

    <!-- BUTTON PESAN -->
    <div class="mt-10">
        @if($kamar->status == 'tersedia')
            <a href="{{ route('kamar.pesan', $kamar->id) }}"
               class="block w-full bg-blue-600 text-white py-3 rounded-xl text-center text-lg font-semibold hover:bg-blue-700 transition">
                Pesan Sekarang
            </a>
        @else
            <button class="block w-full bg-gray-400 cursor-not-allowed text-white py-3 rounded-xl text-center text-lg font-semibold">
                Kamar Tidak Tersedia
            </button>
        @endif
    </div>

</div>
@endsection
