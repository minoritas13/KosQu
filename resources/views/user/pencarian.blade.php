@extends('layouts.app')

@section('content')

<div class="container px-4 py-10 mx-auto">

    {{-- Judul Halaman --}}
    <h1 class="mb-2 text-3xl font-bold">Temukan Kamar Impian Anda</h1>
    <p class="mb-6 text-gray-600">Jelajahi kamar yang tersedia dan pilih yang paling cocok untuk Anda</p>

    {{-- Search & Filter --}}
<div class="flex flex-col gap-4 mb-10 md:flex-row md:items-center">

    <input type="text"
        placeholder="Cari nomor kamar atau kata kunci..."
        class="w-full md:flex-1 p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-400 outline-none">

    <select class="px-4 py-3 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-purple-400 outline-none">
        <option>Harga</option>
        <option value="asc">Termurah</option>
        <option value="desc">Termahal</option>
    </select>

    <select class="px-4 py-3 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-purple-400 outline-none">
        <option>Fasilitas</option>
        <option>AC</option>
        <option>Kamar Mandi Dalam</option>
        <option>Wifi</option>
    </select>

    <select class="px-4 py-3 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-purple-400 outline-none">
        <option>Urutkan</option>
        <option>Terbaru</option>
        <option>Terlama</option>
    </select>

</div>


    {{-- Grid Kamar --}}
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

        @foreach($kamar as $item)
            <div class="overflow-hidden bg-white border shadow rounded-xl">

                {{-- Gambar --}}
                <div class="relative">
                    <img
                        src="{{ $item->foto ? asset('storage/' . $item->foto) : 'https://via.placeholder.com/600x400?text=Picture' }}"
                        class="object-cover w-full h-48"
                    >

                    @if ($item->status === 'tersedia')
                        <span class="absolute px-3 py-1 text-xs text-white bg-green-500 rounded-full top-3 right-3">
                            Tersedia
                        </span>
                    @else
                        <span class="absolute px-3 py-1 text-xs text-white bg-red-500 rounded-full top-3 right-3">
                            {{ ucfirst($item->status) }}
                        </span>
                    @endif
                </div>

                {{-- Konten --}}
                <div class="p-4">

                    {{-- Nomor Kamar --}}
                    <h3 class="text-lg font-semibold">{{ $item->nomor_kamar }}</h3>

                    {{-- Harga --}}
                    <p class="font-bold text-gray-800">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}/Bulan
                    </p>

                    {{-- Fasilitas / Deskripsi --}}
                    <p class="mt-1 text-sm text-gray-600">
                        {{ $item->deskripsi ?? 'Fasilitas tidak tersedia.' }}
                    </p>

                    {{-- Tombol --}}
                    <div class="flex justify-between gap-3 mt-4">

                        <a href="#"
                           class="w-1/2 px-4 py-2 text-center border border-gray-300 rounded-lg">
                            Lihat Detail
                        </a>

                        <a href="#"
                           class="w-1/2 px-4 py-2 text-center text-white bg-blue-600 rounded-lg">
                            Pesan Sekarang
                        </a>

                    </div>

                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
