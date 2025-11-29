@extends('layouts.app')

@section('content')

<div class="container px-4 py-10 mx-auto">

    <h1 class="mb-2 text-3xl font-bold">Pencarian Kamar</h1>
    <p class="mb-6 text-gray-600">Gunakan filter berikut untuk menemukan kamar sesuai kebutuhan Anda.</p>

    {{-- FORM FILTER --}}
    <form method="GET" action="{{ route('pencarian') }}">
        <div class="flex flex-col gap-4 mb-10 md:flex-row md:items-center">

            {{-- KEYWORD SEARCH --}}
            <input type="text"
                name="keyword"
                value="{{ request('keyword') }}"
                placeholder="Cari nomor kamar / kata kunci..."
                class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-400 outline-none">

            {{-- FILTER HARGA --}}
            <select name="harga"
                class="px-4 py-3 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-purple-400 outline-none">
                <option value="">Harga</option>
                <option value="asc"  {{ request('harga')=='asc' ? 'selected':'' }}>Termurah</option>
                <option value="desc" {{ request('harga')=='desc' ? 'selected':'' }}>Termahal</option>
            </select>

            {{-- FILTER FASILITAS --}}
            <select name="fasilitas"
                class="px-4 py-3 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-purple-400 outline-none">
                <option value="">Fasilitas</option>
                <option value="AC"  {{ request('fasilitas')=='AC' ? 'selected':'' }}>AC</option>
                <option value="Kamar Mandi Dalam" {{ request('fasilitas')=='Kamar Mandi Dalam' ? 'selected':'' }}>Kamar Mandi Dalam</option>
                <option value="Wifi" {{ request('fasilitas')=='Wifi' ? 'selected':'' }}>Wifi</option>
            </select>

            {{-- URUTKAN --}}
            <select name="urutkan"
                class="px-4 py-3 border border-gray-300 rounded-xl bg-white focus:ring-2 focus:ring-purple-400 outline-none">
                <option value="">Urutkan</option>
                <option value="newest" {{ request('urutkan')=='newest' ? 'selected':'' }}>Terbaru</option>
                <option value="oldest" {{ request('urutkan')=='oldest' ? 'selected':'' }}>Terlama</option>
            </select>

            <button class="px-6 py-3 text-white bg-purple-600 rounded-xl">
                Filter
            </button>
        </div>
    </form>

    {{-- JIKA DATA KOSONG --}}
    @if($kamar->count() == 0)
        <div class="p-6 text-center bg-red-50 rounded-xl">
            <p class="text-red-600 font-semibold">Tidak ada kamar ditemukan dengan filter tersebut.</p>
        </div>
    @endif

    {{-- GRID LIST KAMAR --}}
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3">

        @foreach($kamar as $item)
            <div class="overflow-hidden bg-white border shadow rounded-xl">

                <div class="relative">
                    <img
                        src="{{ $item->foto ? asset('storage/' . $item->foto) : 'https://via.placeholder.com/600x400?text=Picture' }}"
                        class="object-cover w-full h-48">

                    <span class="absolute px-3 py-1 text-xs text-white 
                        {{ $item->status == 'tersedia' ? 'bg-green-500' : 'bg-red-500' }}
                        rounded-full top-3 right-3">
                        {{ ucfirst($item->status) }}
                    </span>
                </div>

                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $item->nomor_kamar }}</h3>

                    <p class="font-bold text-gray-800">
                        Rp {{ number_format($item->harga, 0, ',', '.') }}/Bulan
                    </p>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ $item->deskripsi ?? 'Fasilitas tidak tersedia.' }}
                    </p>

                    <div class="flex justify-between gap-3 mt-4">
                        <a href="#"
                           class="w-1/2 px-4 py-2 text-center border border-gray-300 rounded-lg">
                            Lihat Detail
                        </a>

                        <a href="#"
                           class="w-1/2 px-4 py-2 text-center text-white bg-blue-600 rounded-lg">
                            Pesan
                        </a>
                    </div>
                </div>

            </div>
        @endforeach

    </div>

</div>

@endsection
