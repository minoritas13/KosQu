@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- BUTTON BACK / KEMBALI --}}
    <div class="mb-4 md:col-span-3">
        <a href="{{ route('penyewa.dashboard') }}"
            class="inline-flex items-center gap-2 px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
            ← Kembali
        </a>
    </div>


    {{-- LEFT: Checkout Info --}}
    <div class="md:col-span-2 space-y-6">

        <div class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-2xl font-semibold">Konfirmasi Pembayaran</h2>
            <p class="text-gray-600">Silahkan lakukan pembayaran DP untuk menyelesaikan pemesanan kamar.</p>
        </div>

        {{-- DETAIL ORDER --}}
        <div class="bg-white shadow-md rounded-xl p-6 space-y-4">

            <h3 class="text-lg font-semibold">Detail Pesanan</h3>

            <div class="border p-4 rounded-lg">
                <p><strong>Kamar:</strong> {{ $booking->kamar->tipe_kamar }}</p>
                <p><strong>Nomor Kamar:</strong> {{ $booking->kamar->nomor_kamar }}</p>
                <p><strong>Deskripsi:</strong> {{ $booking->kamar->deskripsi }}</p>

                <p class="mt-2">
                    <strong>Harga / bulan:</strong>
                    Rp {{ number_format($booking->kamar->harga, 0, ',', '.') }}
                </p>

                <p class="text-green-600 font-semibold mt-2">
                    DP (30%):
                    Rp {{ number_format($booking->kamar->harga * 0.3, 0, ',', '.') }}
                </p>
            </div>
        </div>

        {{-- FORM PEMBAYARAN --}}
        <form method="POST" action="{{ route('penyewa.pembayaran.store', $booking->id) }}"
            class="bg-white shadow-md rounded-xl p-6 space-y-4">

            @csrf

            <h3 class="text-xl font-semibold">Pilih Metode Pembayaran</h3>

            {{-- RADIO PEMBAYARAN --}}
            <div class="space-y-3">

                <label class="flex items-start gap-3 p-4 border rounded-lg cursor-pointer">
                    <input type="radio" name="metode_bayar" value="transfer" required>
                    <div>
                        <p class="font-medium">Transfer Bank</p>
                        <p class="text-sm text-gray-600">BCA: <strong>1234567890</strong> a.n KosQu</p>
                    </div>
                </label>

                <label class="flex items-start gap-3 p-4 border rounded-lg cursor-pointer">
                    <input type="radio" name="metode_bayar" value="e-wallet">
                    <div>
                        <p class="font-medium">E-Wallet (Dana / OVO / Gopay)</p>
                        <p class="text-sm text-gray-600">No: <strong>0895-xxxx-xxxx</strong></p>
                    </div>
                </label>

                <label class="flex items-start gap-3 p-4 border rounded-lg cursor-pointer">
                    <input type="radio" name="metode_bayar" value="cash">
                    <div>
                        <p class="font-medium">Cash</p>
                        <p class="text-sm text-gray-600">Bayar DP saat bertemu admin.</p>
                    </div>
                </label>

            </div>

            {{-- INPUT TANGGAL BAYAR --}}
            <div>
                <label class="block text-sm font-medium">Tanggal Pembayaran</label>
                <input type="date" name="tggl_bayar"
                    class="w-full mt-1 border p-3 rounded-lg"
                    value="{{ now()->format('Y-m-d') }}" required>
            </div>

            {{-- JUMLAH DP --}}
            <input type="hidden" name="jumlah_bayar" value="{{ $booking->kamar->harga * 0.3 }}">

            <button class="w-full py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700">
                Konfirmasi Pembayaran
            </button>

        </form>
    </div>

    {{-- RIGHT: RINGKASAN ORDER --}}
    <div class="bg-white shadow-md rounded-xl p-6 space-y-4">

        <h3 class="text-lg font-semibold text-gray-800">Ringkasan Pesanan</h3>

        <div class="border-b pb-3">
            <p class="font-medium">{{ $booking->kamar->tipe_kamar }}</p>
            <p class="text-gray-600">{{ $booking->kamar->nomor_kamar }}</p>

            <img
                src="{{ Storage::url($booking->kamar->foto) }}"
                class="w-full h-64 object-cover rounded-xl shadow-md">

        </div>

        <div class="flex justify-between text-sm">
            <span>Harga</span>
            <span>Rp {{ number_format($booking->kamar->harga, 0, ',', '.') }}</span>
        </div>

        <div class="flex justify-between text-sm">
            <span>DP 30%</span>
            <span class="text-green-600">Rp {{ number_format($booking->kamar->harga * 0.3, 0, ',', '.') }}</span>
        </div>

        <hr>

        <div class="flex justify-between font-bold text-lg">
            <span>Total DP</span>
            <span>Rp {{ number_format($booking->kamar->harga * 0.3, 0, ',', '.') }}</span>
        </div>

    </div>

</div>
@endsection