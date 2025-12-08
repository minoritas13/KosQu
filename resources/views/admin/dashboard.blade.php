@extends('layouts.admin-app')

@section('title', 'Dashboard Admin')

@section('content')

<h1 class="text-3xl font-bold">Dashboard Admin</h1>
<p class="mt-1 text-gray-600">Selamat datang, {{ auth()->user()->name }}</p>

{{-- CARD STATISTIK --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">

    <div class="p-6 bg-white rounded-xl shadow">
        <h2 class="text-lg font-semibold">Total Kamar</h2>
        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalKamar }}</p>
    </div>

    <div class="p-6 bg-white rounded-xl shadow">
        <h2 class="text-lg font-semibold">Total Booking</h2>
        <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalBooking }}</p>
    </div>

    <div class="p-6 bg-white rounded-xl shadow">
        <h2 class="text-lg font-semibold">Total Pembayaran</h2>
        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalPembayaran }}</p>
    </div>

</div>

@endsection
