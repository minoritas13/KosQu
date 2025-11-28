@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- LEFT: Detail Pesanan --}}
    <div class="md:col-span-2 bg-white p-6 rounded-xl shadow-lg space-y-4">
        <h2 class="text-2xl font-semibold">Konfirmasi Pembayaran</h2>

        <div class="border p-4 rounded-lg space-y-2">
            <p><strong>Kamar:</strong> {{ $kamar->tipe_kamar }}</p>
            <p><strong>Nomor Kamar:</strong> {{ $kamar->nomor_kamar }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($kamar->harga, 0, ',', '.') }}</p>

            <p class="text-green-600 font-semibold mt-2">
                DP 30%: Rp {{ number_format($dp, 0, ',', '.') }}
            </p>
        </div>

        {{-- FORM PEMBAYARAN --}}
        <form method="POST" action="{{ route('pembayaran.store', $booking->id) }}" class="space-y-4 mt-4">
            @csrf

            <h3 class="text-xl font-semibold">Pilih Metode Pembayaran</h3>

            <label class="flex gap-3 p-4 border rounded cursor-pointer">
                <input type="radio" name="opsi" value="dp" required>
                <div>
                    <p class="font-medium">DP 30% – Transfer/E-Wallet</p>
                </div>
            </label>

            <label class="flex gap-3 p-4 border rounded cursor-pointer">
                <input type="radio" name="opsi" value="full">
                <div>
                    <p class="font-medium">Bayar Lunas – Transfer</p>
                </div>
            </label>

            <label class="flex gap-3 p-4 border rounded cursor-pointer">
                <input type="radio" name="opsi" value="cash">
                <div>
                    <p class="font-medium">Cash – DP 30% dibayar ditempat</p>
                </div>
            </label>

            <button class="w-full py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700">
                Konfirmasi Pembayaran
            </button>
        </form>
    </div>

    {{-- RIGHT: Foto kamar --}}
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <img src="{{ Storage::url($kamar->foto) }}" class="w-full h-60 object-cover rounded-lg">
    </div>
</div>
@endsection
