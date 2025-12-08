@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section class="relative h-[85vh] flex items-center justify-center bg-gray-900 overflow-hidden">
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=2340&q=80" 
             alt="Background Kost" 
             class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-gray-900/50"></div>
    </div>

    {{-- Content Hero --}}
    <div class="relative z-10 max-w-4xl px-4 mx-auto text-center space-y-6">
        <span class="inline-block px-4 py-1.5 rounded-full bg-blue-600/20 border border-blue-500 text-blue-300 text-sm font-medium tracking-wide mb-4 backdrop-blur-sm">
            🚀 Solusi Cari Kost No. 1 di Lampung
        </span>
        
        <h1 class="text-4xl md:text-6xl font-extrabold text-white tracking-tight leading-tight">
            Rebahan Aja, <br> Biar <span class="text-blue-500">KostQu</span> Yang Kerja.
        </h1>
        
        <p class="text-lg text-gray-300 max-w-2xl mx-auto">
            Gak perlu keliling panas-panasan. Cukup login, pilih kamar, dan bayar. Hidup anak kost gak pernah semudah ini.
        </p>

        {{-- BAGIAN TENGAH: TOMBOL LOGIN & DAFTAR --}}
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center items-center">
            
            {{-- Tombol Login Utama --}}
            <a href="{{ route('login') }}" class="px-8 py-4 text-lg font-bold text-white bg-blue-600 rounded-full shadow-lg shadow-blue-600/30 hover:bg-blue-700 transition transform hover:scale-105 flex items-center gap-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                Login Segera
            </a>

            {{-- Tombol Daftar (Secondary) --}}
            <a href="{{ route('register') }}" class="px-8 py-4 text-lg font-bold text-white bg-white/10 backdrop-blur-md border border-white/20 rounded-full hover:bg-white/20 transition flex items-center gap-2">
                Belum Punya Akun?
            </a>

        </div>
    </div>
</section>

{{-- WHY CHOOSE US --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900">Kenapa Harus KostQu?</h2>
            <p class="mt-4 text-gray-500">Kami beda dari yang lain, cek kelebihannya.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition duration-300 text-center group">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Terverifikasi Total</h3>
                <p class="text-gray-600">Semua data kost sudah dicek oleh tim kami. Anti tipu-tipu club.</p>
            </div>
            <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition duration-300 text-center group">
                <div class="w-16 h-16 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Respon Kilat</h3>
                <p class="text-gray-600">Admin dan pemilik kost siap respon chat kamu 24/7 (kalau gak tidur).</p>
            </div>
            <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-xl transition duration-300 text-center group">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Transaksi Aman</h3>
                <p class="text-gray-600">Pembayaran aman, transparan, dan bukti transaksi langsung masuk email.</p>
            </div>
        </div>
    </div>
</section>

{{-- REKOMENDASI KAMAR --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Rekomendasi Sultan</h2>
                <p class="mt-2 text-gray-500">Pilihan kamar terbaik minggu ini.</p>
            </div>
            <a href="{{ route('pencarian') }}" class="hidden md:inline-flex items-center text-blue-600 font-semibold hover:text-blue-700">
                Lihat Semua <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition duration-300 overflow-hidden group border border-gray-100">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1598928506311-c55ded91a20c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide text-gray-800">Putra</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-gray-900">Suite - A167</h3>
                        <span class="flex items-center text-sm text-gray-500">⭐ 4.8</span>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="text-blue-600 font-bold text-lg">Rp 531.800</div>
                        <a href="#" class="px-4 py-2 bg-gray-900 text-white text-sm font-bold rounded-lg hover:bg-gray-800 transition">Pesan</a>
                    </div>
                </div>
            </div>
             <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition duration-300 overflow-hidden group border border-gray-100">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1555854877-bab0e564b8d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide text-gray-800">Campur</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-gray-900">Standard - A182</h3>
                        <span class="flex items-center text-sm text-gray-500">⭐ 4.5</span>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="text-blue-600 font-bold text-lg">Rp 612.752</div>
                        <a href="#" class="px-4 py-2 bg-gray-900 text-white text-sm font-bold rounded-lg hover:bg-gray-800 transition">Pesan</a>
                    </div>
                </div>
            </div>
             <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition duration-300 overflow-hidden group border border-gray-100">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1505691938895-1758d7feb511?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide text-gray-800">Putri</div>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-gray-900">Suite - A176</h3>
                        <span class="flex items-center text-sm text-gray-500">⭐ 5.0</span>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="text-blue-600 font-bold text-lg">Rp 892.159</div>
                        <a href="#" class="px-4 py-2 bg-gray-900 text-white text-sm font-bold rounded-lg hover:bg-gray-800 transition">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-12 text-center md:hidden">
            <a href="{{ route('pencarian') }}" class="inline-block px-6 py-3 bg-white border border-gray-300 text-gray-700 font-bold rounded-lg hover:bg-gray-50 transition">
                Lihat Semua Kamar
            </a>
        </div>
    </div>
</section>

{{-- CARA KERJA SISTEM --}}
<section class="py-20 bg-white border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-12">Cara Kerja Sistem 🛠️</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
            <div class="hidden md:block absolute top-12 left-0 w-full h-1 bg-gray-100 -z-10"></div>
            <div class="bg-white p-6 relative">
                <div class="w-24 h-24 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold border-4 border-white shadow-sm">01</div>
                <h3 class="font-bold text-lg mb-2">Login / Daftar</h3>
                <p class="text-gray-500 text-sm">Masuk dulu bos, biar transaksi aman.</p>
            </div>
            <div class="bg-white p-6 relative">
                 <div class="w-24 h-24 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold border-4 border-white shadow-sm">02</div>
                <h3 class="font-bold text-lg mb-2">Pilih Kamar</h3>
                <p class="text-gray-500 text-sm">Cari yang sesuai selera dan isi dompet.</p>
            </div>
            <div class="bg-white p-6 relative">
                 <div class="w-24 h-24 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold border-4 border-white shadow-sm">03</div>
                <h3 class="font-bold text-lg mb-2">Bayar</h3>
                <p class="text-gray-500 text-sm">Transfer dan siap-siap pindahan.</p>
            </div>
        </div>
    </div>
</section>

@endsection