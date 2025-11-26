@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<section class="relative h-[80vh] bg-cover bg-center flex items-center"
    style="background-image: url('{{ asset('images/bg-login.jpg') }}');">
    <div class="max-w-lg px-8 py-20 mx-8 text-center shadow-lg bg-white/80 rounded-xl">
        <h1 class="mb-4 text-4xl font-bold text-gray-800">Temukan Kost Impianmu</h1>
        <p class="mb-6 text-gray-700">Pilih kost sesuai kebutuhan dan kenyamananmu hanya di KostQu.</p>
        <a href="{{ route('login') }}"
            class="px-6 py-3 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
            Cari Kamar Sekarang
        </a>
    </div>
</section>

{{-- Kamar Populer --}}
<section class="px-6 py-16 bg-white">
    <h2 class="mb-10 text-2xl font-bold text-center">Kamar Populer</h2>

    <div class="grid max-w-6xl grid-cols-1 gap-8 mx-auto sm:grid-cols-2 md:grid-cols-3">

        {{-- CARD KAMAR EXAMPLE, NANTI BISA DIGANTI LOOP DATABASE --}}
        <div class="overflow-hidden transition bg-white border shadow rounded-xl hover:shadow-lg">
            <img src="{{ asset('images/room1.jpg') }}" class="object-cover w-full h-48">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Kamar Delux AC</h3>
                <p class="font-bold text-blue-600">Rp 1.200.000/Bulan</p>
                <p class="mt-1 text-sm text-gray-600">AC, WiFi, Kamar Mandi Dalam, Lemari</p>
                <a href="#" class="block w-full py-2 mt-3 text-center transition bg-gray-200 rounded-lg hover:bg-gray-300">
                    Lihat Detail
                </a>
            </div>
        </div>

        <div class="overflow-hidden transition bg-white border shadow rounded-xl hover:shadow-lg">
            <img src="{{ asset('images/room2.jpg') }}" class="object-cover w-full h-48">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Kamar Standard</h3>
                <p class="font-bold text-blue-600">Rp 800.000/Bulan</p>
                <p class="mt-1 text-sm text-gray-600">Kipas Angin, WiFi, Kamar Mandi Luar</p>
                <a href="#" class="block w-full py-2 mt-3 text-center transition bg-gray-200 rounded-lg hover:bg-gray-300">
                    Lihat Detail
                </a>
            </div>
        </div>

        <div class="overflow-hidden transition bg-white border shadow rounded-xl hover:shadow-lg">
            <img src="{{ asset('images/room3.jpg') }}" class="object-cover w-full h-48">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Kamar Premium</h3>
                <p class="font-bold text-blue-600">Rp 1.500.000/Bulan</p>
                <p class="mt-1 text-sm text-gray-600">AC, WiFi, Kamar Mandi Luar, Balkon</p>
                <a href="#" class="block w-full py-2 mt-3 text-center transition bg-gray-200 rounded-lg hover:bg-gray-300">
                    Lihat Detail
                </a>
            </div>
        </div>

    </div>

    <div class="mt-10 text-center">
        
        <a href="">
            <button class="px-6 py-2 text-gray-800 transition bg-gray-200 rounded-lg hover:bg-gray-300">
            Lihat Semua Kamar
        </button>
        </a>

    </div>
</section>

{{-- Cara Kerja --}}
<section class="py-16 bg-gray-100">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="mb-6 text-2xl font-bold">Cara Kerja Sistem</h2>
        <p class="mb-10 text-gray-600">3 langkah mudah menggunakan KostQu</p>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <div class="p-6 text-center bg-white shadow rounded-xl">
                <div class="mb-3 text-3xl font-bold text-blue-600">1</div>
                <h3 class="mb-2 font-semibold">Daftar/Login</h3>
                <p class="text-sm text-gray-600">Buat akun baru atau login untuk mengakses semua fitur.</p>
            </div>

            <div class="p-6 text-center bg-white shadow rounded-xl">
                <div class="mb-3 text-3xl font-bold text-blue-600">2</div>
                <h3 class="mb-2 font-semibold">Pilih dan Pesan</h3>
                <p class="text-sm text-gray-600">Pilih kamar dan pesan secara online.</p>
            </div>

            <div class="p-6 text-center bg-white shadow rounded-xl">
                <div class="mb-3 text-3xl font-bold text-blue-600">3</div>
                <h3 class="mb-2 font-semibold">Bayar dan Konfirmasi</h3>
                <p class="text-sm text-gray-600">Lakukan pembayaran dan tunggu konfirmasi admin.</p>
            </div>
        </div>
    </div>
</section>

@endsection
