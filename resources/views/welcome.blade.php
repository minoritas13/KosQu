@extends('layouts.app')

@section('content')
    {{-- HERO SECTION --}}
    <section class="relative h-[85vh] flex items-center justify-center bg-gray-900 overflow-hidden">
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=2340&q=80"
                alt="Background Kost" class="object-cover w-full h-full opacity-40">
            <div class="absolute inset-0"></div>
        </div>

        {{-- Content Hero --}}
        <div class="relative z-10 max-w-4xl px-4 mx-auto space-y-6 text-center">
            <span
                class="inline-block px-4 py-1.5 rounded-full bg-blue-600/20 border border-blue-500 text-white text-sm font-medium tracking-wide mb-4 backdrop-blur-sm">
                Solusi Cari Kost No. 1 di Lampung
            </span>

            <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-white md:text-6xl">
                Rebahan Aja, <br> Biar <span class="text-blue-500">KostQu</span> Yang Kerja.
            </h1>

            <p class="max-w-2xl mx-auto text-lg text-gray-300">
                Gak perlu keliling panas-panasan. Cukup login, pilih kamar, dan bayar. Hidup anak kost gak pernah semudah
                ini.
            </p>

            {{-- BAGIAN TENGAH: TOMBOL LOGIN & DAFTAR --}}
            <div class="flex flex-col items-center justify-center gap-4 mt-10 sm:flex-row">

                {{-- Tombol Login Utama --}}
                <a href="{{ route('login') }}"
                    class="flex items-center gap-3 px-8 py-4 text-lg font-bold text-white transition transform bg-black rounded-full hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Login Segera
                </a>

                {{-- Tombol Daftar (Secondary) --}}
                <a href="{{ route('register') }}"
                    class="flex items-center gap-2 px-8 py-4 text-lg font-bold text-white transition border rounded-full bg-white/10 backdrop-blur-md border-white/20 hover:scale-105">
                    Belum Punya Akun?
                </a>

            </div>
        </div>
    </section>

    {{-- WHY CHOOSE US --}}
    <section class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <h2 class="text-3xl font-bold text-gray-900">Kenapa Harus KostQu?</h2>
                <p class="mt-4 text-gray-500">Kami beda dari yang lain, cek kelebihannya.</p>
            </div>

            <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                <div
                    class="p-8 text-center transition duration-300 border border-gray-100 bg-gray-50 rounded-2xl hover:shadow-xl group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-6 text-blue-600 transition bg-blue-100 rounded-2xl group-hover:scale-110">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Terverifikasi Total</h3>
                    <p class="text-gray-600">Semua data kost sudah dicek oleh tim kami. Anti tipu-tipu club.</p>
                </div>
                <div
                    class="p-8 text-center transition duration-300 border border-gray-100 bg-gray-50 rounded-2xl hover:shadow-xl group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-6 text-orange-600 transition bg-orange-100 rounded-2xl group-hover:scale-110">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Respon Kilat</h3>
                    <p class="text-gray-600">Admin dan pemilik kost siap respon chat kamu 24/7 (kalau gak tidur).</p>
                </div>
                <div
                    class="p-8 text-center transition duration-300 border border-gray-100 bg-gray-50 rounded-2xl hover:shadow-xl group">
                    <div
                        class="flex items-center justify-center w-16 h-16 mx-auto mb-6 text-green-600 transition bg-green-100 rounded-2xl group-hover:scale-110">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Transaksi Aman</h3>
                    <p class="text-gray-600">Pembayaran aman, transparan, dan bukti transaksi langsung masuk email.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CARA KERJA SISTEM --}}
    <section class="py-20 bg-white border-t border-gray-100">
        <div class="max-w-4xl px-4 mx-auto text-center">
            <h2 class="mb-12 text-3xl font-bold text-gray-900">Cara Kerja Sistem 🛠️</h2>

            <div class="relative grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="absolute left-0 hidden w-full h-1 bg-gray-100 md:block top-12 -z-10"></div>
                <div class="relative p-6 bg-white">
                    <div
                        class="flex items-center justify-center w-24 h-24 mx-auto mb-6 text-2xl font-bold text-blue-600 border-4 border-white rounded-full shadow-sm bg-blue-50">
                        01</div>
                    <h3 class="mb-2 text-lg font-bold">Login / Daftar</h3>
                    <p class="text-sm text-gray-500">Masuk dulu bos, biar transaksi aman.</p>
                </div>
                <div class="relative p-6 bg-white">
                    <div
                        class="flex items-center justify-center w-24 h-24 mx-auto mb-6 text-2xl font-bold text-blue-600 border-4 border-white rounded-full shadow-sm bg-blue-50">
                        02</div>
                    <h3 class="mb-2 text-lg font-bold">Pilih Kamar</h3>
                    <p class="text-sm text-gray-500">Cari yang sesuai selera dan isi dompet.</p>
                </div>
                <div class="relative p-6 bg-white">
                    <div
                        class="flex items-center justify-center w-24 h-24 mx-auto mb-6 text-2xl font-bold text-blue-600 border-4 border-white rounded-full shadow-sm bg-blue-50">
                        03</div>
                    <h3 class="mb-2 text-lg font-bold">Bayar</h3>
                    <p class="text-sm text-gray-500">Transfer dan siap-siap pindahan.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
