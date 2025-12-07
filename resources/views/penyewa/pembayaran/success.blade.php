@extends('layouts.app')

@section('content')
<div class="container py-10 mx-auto">

    <div class="max-w-xl p-8 mx-auto text-center bg-white shadow-lg rounded-xl">

        <h1 class="mb-3 text-3xl font-semibold text-green-600">Pembayaran Berhasil!</h1>

        <p class="mb-6 text-gray-700">Terima kasih, pembayaran Anda telah direkam.</p>

        <div class="space-y-2 text-left">
            <p><strong>Kamar:</strong> {{ $booking->kamar->tipe_kamar }}</p>
            <p><strong>Nomor:</strong> {{ $booking->kamar->nomor_kamar }}</p>
            <p><strong>Pembayaran:</strong>
                Rp {{ number_format($booking->pembayaran->jumlah_bayar ?? 0, 0, ',', '.') }}
            </p>
            <p><strong>Metode:</strong> {{ $booking->pembayaran->metode_bayar ?? '-' }}</p>
        </div>

        <a href="{{ route('penyewa.dashboard') }}"
           class="inline-block px-6 py-3 mt-6 text-white bg-blue-600 rounded-lg">
            Kembali ke Dashboard
        </a>

    </div>

</div>
@endsection
