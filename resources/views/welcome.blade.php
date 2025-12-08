@extends('layouts.app')

@section('content')

{{-- WRAPPER BACKGROUND (Untuk memberikan depth/kedalaman) --}}
<div class="relative overflow-hidden bg-gradient-to-b from-blue-50 via-white to-white">

    {{-- DECORATION (Blob Abstrak di belakang biar modern) --}}
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100 rounded-full blur-3xl opacity-60 -translate-y-1/2 translate-x-1/4 pointer-events-none"></div>

    {{-- HERO SECTION --}}
    <section class="relative z-10 pt-20 pb-32 container mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center">
            
            {{-- KOLOM KIRI: TEKS (Powerfull Typography) --}}
            <div class="w-full md:w-3/5 mb-12 md:mb-0 relative z-20">
                <div class="inline-block px-4 py-2 mb-6 text-sm font-semibold text-blue-700 bg-blue-100 rounded-full">
                    🚀 Solusi Cari Kost No. 1
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 leading-[1.1] mb-6">
                    Rebahan Aja, <br>
                    Biar <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">KostQu</span> <br>
                    Yang Kerja.
                </h1>
                <p class="text-lg text-gray-600 mb-8 max-w-lg leading-relaxed">
                    Platform pencarian kost modern dengan data terverifikasi. 
                    Pilih hunian impianmu, survei online, dan pindahan hari ini juga.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/login" 
                       class="px-8 py-4 text-white font-bold bg-blue-600 rounded-full shadow-lg hover:bg-blue-700 hover:shadow-blue-500/30 hover:-translate-y-1 transition-all duration-300 text-center">
                        Cari Kamar Sekarang
                    </a>
                    <a href="#cara-kerja" 
                       class="px-8 py-4 text-blue-700 font-bold bg-white border border-blue-200 rounded-full hover:bg-blue-50 transition-all duration-300 text-center">
                        Pelajari Cara Kerja
                    </a>
                </div>
            </div>

            {{-- KOLOM KANAN: GAMBAR (Rotated & Floating Effect) --}}
            <div class="w-full md:w-2/5 relative">
                {{-- Gunakan gambar yang bagus di sini (disarankan rasio Portrait/Kotak) --}}
                <div class="relative z-10 transform rotate-3 hover:rotate-0 transition-all duration-500 ease-out">
                    <img src="{{ asset('images/bg-login.jpg') }}" 
                         alt="Hero Kost" 
                         class="w-full h-[500px] object-cover rounded-[2.5rem] shadow-2xl border-4 border-white">
                    
                    {{-- Floating Badge --}}
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-2xl shadow-xl animate-bounce" style="animation-duration: 3s;">
                        <div class="flex items-center gap-3">
                            <div class="bg-green-100 p-2 rounded-full text-2xl">🔥</div>
                            <div>
                                <p class="font-bold text-gray-800">500+ Unit</p>
                                <p class="text-xs text-gray-500">Siap Huni</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Pattern Dots di belakang gambar --}}
                <div class="absolute -z-10 bottom-0 right-0 translate-x-10 translate-y-10">
                    <svg width="100" height="100" viewBox="0 0 100 100" fill="none">
                        <circle cx="2" cy="2" r="2" fill="#CBD5E1"/>
                        <circle cx="20" cy="2" r="2" fill="#CBD5E1"/>
                        <circle cx="2" cy="20" r="2" fill="#CBD5E1"/>
                        {{-- Anggap aja pattern titik-titik --}}
                    </svg>
                </div>
            </div>

        </div>
    </section>
</div>

{{-- FEATURE SECTION (FLOATING CARDS) --}}
{{-- Margin Top negatif (-mt-20) membuat section ini "menumpuk" di atas Hero --}}
<section class="relative z-30 container mx-auto px-6 -mt-20 mb-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Card 1 --}}
        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 hover:-translate-y-2 transition-transform duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-3xl mb-4 text-blue-600">🛡️</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Terverifikasi Total</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Data kost divalidasi manual oleh tim lapangan. No tipu-tipu club.</p>
        </div>
        {{-- Card 2 --}}
        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 hover:-translate-y-2 transition-transform duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-3xl mb-4 text-blue-600">⚡</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Respon Kilat</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Hubungi pemilik langsung tanpa perantara. Chat dibalas secepat kilat.</p>
        </div>
        {{-- Card 3 --}}
        <div class="bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 hover:-translate-y-2 transition-transform duration-300 border border-gray-100">
            <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center text-3xl mb-4 text-blue-600">💳</div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Transaksi Aman</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Sistem pembayaran terpusat. Uang aman sampai kunci di tanganmu.</p>
        </div>
    </div>
</section>


{{-- KAMAR POPULER SECTION --}}
{{-- Container Grid (Pastikan ini ada di wrapper lu) --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

    {{-- Pake $kamar (sesuai controller) --}}
    @forelse($kamar as $item)

        <div class="group bg-white rounded-3xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl hover:shadow-blue-500/10 transition-all duration-300 hover:-translate-y-1">
            
            {{-- Gambar (Teaser Visual) --}}
            <div class="relative">
                <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/room-default.jpg') }}" 
                     class="object-cover w-full h-56 group-hover:scale-105 transition duration-500">
                
                {{-- Badge Status --}}
                <span class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm uppercase">
                    {{ $item->tipe_kamar }}
                </span>
            </div>

            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    {{ $item->tipe_kamar }} - {{ $item->nomor_kamar }}
                </h3>
                
                {{-- Deskripsi Terbatas (Teaser) --}}
                <p class="text-sm text-gray-500 mb-4 line-clamp-2">
                    {{ Str::limit($item->deskripsi, 50) }}...
                </p>

                <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                    <div>
                        <span class="text-xs text-gray-400">Mulai dari</span>
                        <p class="text-lg font-bold text-blue-600">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>
                    </div>
                    
                    {{-- LOGIKA JEBAKAN LOGIN --}}
                    @auth
                        {{-- Kalau User Udah Login: Tombol "Pesan" Aktif --}}
                        {{-- Ganti route('booking') sesuai route asli lu nanti --}}
                        <a href="{{ url('/dashboard') }}" class="bg-green-600 text-white px-4 py-2 rounded-xl hover:bg-green-700 transition shadow-lg shadow-green-200">
                            Pesan ✅
                        </a>
                    @else
                        {{-- Kalau Masih Tamu (Guest): Lempar ke Login --}}
                        <a href="{{ route('login') }}" class="bg-gray-900 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition shadow-lg group-hover:shadow-blue-200">
                            Lihat 🔒
                        </a>
                    @endauth

                </div>
            </div>
        </div>

    @empty
        <div class="col-span-3 text-center py-12">
            <p class="text-gray-500">Belum ada kamar yang tersedia.</p>
        </div>
    @endforelse

</div>

{{-- CARA KERJA (Refined) --}}
<section id="cara-kerja" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-extrabold mb-12">Cara Kerja Sistem 🛠️</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-md transition duration-300">
                <div class="text-4xl font-black text-gray-200 mb-4">01</div>
                <h3 class="text-xl font-bold mb-2">Daftar Akun</h3>
                <p class="text-gray-500 text-sm">Buat akun dalam 30 detik. Cuma butuh email.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-md transition duration-300 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-blue-500"></div> {{-- Accent Line --}}
                <div class="text-4xl font-black text-blue-100 mb-4">02</div>
                <h3 class="text-xl font-bold mb-2 text-blue-600">Pilih & Booking</h3>
                <p class="text-gray-500 text-sm">Pilih kamar, ajukan sewa, tunggu konfirmasi pemilik.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-md transition duration-300">
                <div class="text-4xl font-black text-gray-200 mb-4">03</div>
                <h3 class="text-xl font-bold mb-2">Bayar & Masuk</h3>
                <p class="text-gray-500 text-sm">Bayar lewat aplikasi, dan langsung bawa koper.</p>
            </div>
        </div>
    </div>
</section>

@endsection