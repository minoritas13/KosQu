@extends('layouts.app')

@section('content')
    <div class="container px-4 py-10 mx-auto">

        {{-- Judul Halaman --}}
        <h1 class="mb-2 text-3xl font-bold">Temukan Kamar Impian Anda</h1>
        <p class="mb-6 text-gray-600">Jelajahi kamar yang tersedia dan pilih yang paling cocok untuk Anda</p>

        {{-- Search Bar --}}
        <form method="GET" action="{{ route('pencarian') }}">
            <div class="flex flex-col gap-4 mb-10 md:flex-row md:items-center">

                {{-- KEYWORD SEARCH --}}
                <input type="text" name="keyword" value="{{ request('keyword') }}"
                    placeholder="Cari nomor kamar / kata kunci..."
                    class="w-full p-3 border border-gray-300 outline-none rounded-xl focus:ring-2 focus:ring-purple-400">

                {{-- FILTER HARGA --}}
                <select name="harga"
                    class="px-4 py-3 bg-white border border-gray-300 outline-none rounded-xl focus:ring-2 focus:ring-purple-400">
                    <option value="">Harga</option>
                    <option value="asc" {{ request('harga') == 'asc' ? 'selected' : '' }}>Termurah</option>
                    <option value="desc" {{ request('harga') == 'desc' ? 'selected' : '' }}>Termahal</option>
                </select>

                {{-- FILTER FASILITAS --}}
                <select name="fasilitas"
                    class="px-4 py-3 bg-white border border-gray-300 outline-none rounded-xl focus:ring-2 focus:ring-purple-400">
                    <option value="">Fasilitas</option>
                    <option value="AC" {{ request('fasilitas') == 'AC' ? 'selected' : '' }}>AC</option>
                    <option value="Kamar Mandi Dalam" {{ request('fasilitas') == 'Kamar Mandi Dalam' ? 'selected' : '' }}>Kamar
                        Mandi Dalam</option>
                    <option value="Wifi" {{ request('fasilitas') == 'Wifi' ? 'selected' : '' }}>Wifi</option>
                </select>

                {{-- URUTKAN --}}
                <select name="urutkan"
                    class="px-4 py-3 bg-white border border-gray-300 outline-none rounded-xl focus:ring-2 focus:ring-purple-400">
                    <option value="">Urutkan</option>
                    <option value="newest" {{ request('urutkan') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ request('urutkan') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                </select>

                <button class="px-6 py-3 text-white bg-blue-600 rounded-xl">
                    Filter
                </button>
            </div>
        </form>

        {{-- Grid Kamar --}}
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($kamar as $item)
                <div class="overflow-hidden bg-white border shadow rounded-xl">

                    {{-- Gambar --}}
                    <div class="relative">

                        <a href="#">
                            <img src="{{ $item->foto ? asset('storage/' . $item->foto) : 'https://via.placeholder.com/600x400?text=Picture' }}"
                                class="object-cover w-full h-48">
                        </a>

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

                            <a href="{{ route('penyewa.pesan', $item->id) }}"
                                class="w-1/2 px-4 py-2 text-center text-white bg-gray-900 rounded-lg">
                                Pesan Sekarang
                            </a>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
