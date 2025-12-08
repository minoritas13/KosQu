<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostQu | Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    {{-- HEADER --}}
    @include('components.user-header')

    <!-- HERO SECTION TANPA CARD -->
<section class="relative h-[80vh] bg-cover bg-center flex items-center justify-center mt-20"
         style="background-image: url('{{ asset('images/bg-login.jpg') }}');">
    
    <!-- Overlay tipis supaya teks tetap terbaca -->
    <div class="absolute inset-0 bg-black/25"></div>

    <!-- Konten teks dan button -->
    <div class="relative text-center px-6">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-lg mb-4">
            Temukan Kost Impianmu
        </h1>
        <p class="text-lg md:text-xl text-white drop-shadow-md mb-6">
            Pilih kamar sesuai kebutuhan dan kenyamananmu dengan sistem pemesanan modern.
        </p>
        <a href="{{ route('pencarian') }}"
           class="inline-block bg-blue-600 text-white px-8 py-3 rounded-full text-lg font-semibold shadow-lg hover:bg-[#5a4cc2] transition">
            Cari Kamar Sekarang
        </a>
    </div>
</section>

    {{-- GRID KAMAR --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

    {{-- LOOPING DATA DARI CONTROLLER --}}
    {{-- Kita pake $kamar karena itu nama variabel di controller lu --}}
    @forelse($kamar as $item)

        <div class="group bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-1">
            
            {{-- Bagian Gambar --}}
            <div class="relative">
                {{-- Logika Gambar: Cek kalau ada foto di database, kalau null pake default --}}
                {{-- Sesuaikan path 'storage/' kalau lu pake php artisan storage:link --}}
                <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/room-default.jpg') }}" 
                     class="object-cover w-full h-56 group-hover:scale-105 transition duration-500"
                     alt="Foto Kost">
                
                {{-- Badge Tipe Kamar --}}
                <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600 shadow-sm uppercase">
                    {{ $item->tipe_kamar }}
                </span>
            </div>

            {{-- Bagian Info --}}
            <div class="p-6">
                <div class="flex justify-between items-start mb-2">
                    {{-- Judul: Gabungan Tipe & Nomor --}}
                    <h3 class="text-xl font-bold text-gray-900">
                        {{ $item->tipe_kamar }} - {{ $item->nomor_kamar }}
                    </h3>
                    <div class="flex text-yellow-400 text-sm">★ 4.8</div>
                </div>

                {{-- Deskripsi: Dipotong biar gak kepanjangan (limit 40 huruf) --}}
                <p class="text-sm text-gray-500 mb-4 line-clamp-1">
                    {{ Str::limit($item->deskripsi, 40) }}
                </p>
                
                {{-- Fasilitas (Hardcode dlu karena kolomnya nyatu di deskripsi) --}}
                <div class="flex gap-2 mb-4">
                    <span class="px-2 py-1 bg-gray-50 text-xs text-gray-600 rounded-md border border-gray-100">❄️ AC</span>
                    <span class="px-2 py-1 bg-gray-50 text-xs text-gray-600 rounded-md border border-gray-100">📶 WiFi</span>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                    <div>
                        <span class="text-xs text-gray-400">Harga per bulan</span>
                        {{-- Format Rupiah Otomatis --}}
                        <p class="text-lg font-bold text-blue-600">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>
                    </div>
                    
                    {{-- Tombol Detail --}}
                    <a href="#" class="bg-gray-900 text-white p-3 rounded-xl hover:bg-blue-600 transition-colors">
                        👉
                    </a>
                </div>
            </div>
        </div>

    @empty
        {{-- Tampilan kalau Database Kosong/Gak ada yang 'tersedia' --}}
        <div class="col-span-1 md:col-span-3 text-center py-12 bg-gray-50 rounded-3xl border border-dashed border-gray-300">
            <p class="text-gray-500 text-lg mb-2">Yah, belum ada kamar yang tersedia nih.</p>
            <p class="text-sm text-gray-400">Coba cek lagi nanti ya!</p>
        </div>
    @endforelse

</div>

    
<!-- CARA KERJA -->
<section class="py-16 bg-[#f2f2f2]">
    <h2 class="text-center text-2xl font-bold">Cara Kerja Sistem</h2>
    <p class="text-center text-sm mb-10">3 langkah mudah menggunakan KostQu</p>

    <div class="max-w-5xl mx-auto grid md:grid-cols-3 text-center gap-10">
        <div>
            <div class="w-20 h-20 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">1</div>
            <h4 class="mt-4 font-semibold">Daftar / Login</h4>
            <p class="text-sm">Masuk ke akun untuk mulai memesan kamar</p>
        </div>

        <div>
            <div class="w-20 h-20 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">2</div>
            <h4 class="mt-4 font-semibold">Pilih Kamar</h4>
            <p class="text-sm">Tentukan kamar sesuai kebutuhanmu</p>
        </div>

        <div>
            <div class="w-20 h-20 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">3</div>
            <h4 class="mt-4 font-semibold">Bayar & Konfirmasi</h4>
            <p class="text-sm">Lakukan pembayaran dan tunggu persetujuan</p>
        </div>
    </div>
</section>

    {{-- FOOTER --}}
    @include('components.footer')

</body>
</html>