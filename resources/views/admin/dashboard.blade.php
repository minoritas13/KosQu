@extends('layouts.admin-app')

@section('title', 'Dashboard Admin')

@section('content')

<h1 class="text-3xl font-bold">Dashboard Admin</h1>
<p class="mt-1 text-gray-600">Selamat datang, {{ auth()->user()->name }}</p>

{{-- CARD STATISTIK --}}
<div class="grid grid-cols-1 gap-6 mt-10 md:grid-cols-3">

    <div class="p-6 bg-white shadow rounded-xl">
        <h2 class="text-lg font-semibold">Total Kamar</h2>
        <p class="mt-2 text-3xl font-bold text-blue-600">{{ $totalKamar }}</p>
    </div>

    <div class="p-6 bg-white shadow rounded-xl">
        <h2 class="text-lg font-semibold">Total Booking</h2>
        <p class="mt-2 text-3xl font-bold text-green-600">{{ $totalBooking }}</p>
    </div>

    <div class="p-6 bg-white shadow rounded-xl">
        <h2 class="text-lg font-semibold">Total Pembayaran</h2>
        <p class="mt-2 text-3xl font-bold text-purple-600">{{ $totalPembayaran }}</p>
    </div>

    <div class="p-6 bg-white shadow rounded-xl">
        <h2 class="text-lg font-semibold">Total Penyewa</h2>
        <p class="mt-2 text-3xl font-bold text-purple-600">{{ $totalPenyewa }}</p>
    </div>

</div>

@endsection
