@extends('layouts.app')

@section('content')
<div class="container grid grid-cols-1 gap-6 py-6 mx-auto md:grid-cols-3">

    {{-- BUTTON BACK / KEMBALI --}}
    <div class="mb-4 md:col-span-3">
        <a href="{{ route('penyewa.dashboard') }}"
            class="inline-flex items-center gap-2 px-4 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
            ← Kembali
        </a>
    </div>

    {{-- LEFT CONTENT --}}
    <div class="space-y-6 md:col-span-2">

        <div class="p-6 bg-white shadow-md rounded-xl">
            <h2 class="mb-4 text-xl font-semibold">Pilih Cara Bayar</h2>

            <label class="flex items-start gap-3 p-4 border rounded-lg cursor-pointer">
                <input type="radio" name="pembayaran" value="bayar_lokasi" checked>
                <div>
                    <p class="font-medium">Bayar di tempat saat check-in</p>
                    <p class="text-sm text-green-600">✔ Tidak perlu bayar sekarang</p>
                </div>
            </label>

            <label class="flex items-start gap-3 p-4 mt-3 border rounded-lg cursor-pointer">
                <input type="radio" name="pembayaran" value="bayar_sekarang">
                <div>
                    <p class="font-medium">Bayar sekarang</p>
                    <p class="text-sm text-gray-500">Tersedia pembayaran melalui e-wallet & transfer bank</p>
                </div>
            </label>
        </div>

        <form action="{{ route('kamar.pesan', $kamar->id) }}" method="POST" class="p-6 space-y-4 bg-white shadow-md rounded-xl">
            @csrf

            <h2 class="text-xl font-semibold">Metode Pembayaran</h2>

            <div>
                <label class="block text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ auth()->user()->name }}"
                    class="w-full p-3 mt-1 border rounded-lg" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Tanggal Masuk</label>
                <input type="date" name="tgl_mulai" class="w-full p-3 mt-1 border rounded-lg"
                    min="{{ now()->format('Y-m-d') }}" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Tanggal Keluar</label>
                <input type="date" name="tgl_selesai" class="w-full p-3 mt-1 border rounded-lg" readonly required>
            </div>

            {{-- TANGGAL BOOKING --}}
            <input type="hidden" name="tgl_booking" value="{{ now()->format('Y-m-d') }}">

            {{-- KAMAR ID --}}
            <input type="hidden" name="kamar_id" value="{{ $kamar->id }}">

            <button class="w-full py-3 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Konfirmasi Pemesanan
            </button>
        </form>
    </div>

    {{-- RIGHT CONTENT --}}
    <div class="p-6 space-y-4 bg-white shadow-md rounded-xl">
        <h3 class="text-lg font-semibold text-gray-800">{{ $kamar->tipe_kamar }}</h3>

        @if ($kamar->foto)
            <img src="{{ asset('storage/' . $kamar->foto) }}" class="rounded-lg">
        @endif

        <div class="pb-2 border-b">
            <p class="font-medium">{{ $kamar->nomor_kamar }}</p>
            <p class="text-sm text-gray-600">{{ $kamar->deskripsi }}</p>
        </div>

        <div class="text-right">
            <p class="text-sm text-gray-500">Harga per malam</p>
            <p class="text-xl font-bold text-green-600">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</p>
        </div>

        <div class="p-3 text-center bg-green-100 rounded-lg">
            <p class="text-sm font-medium text-green-700">✔ tersedia untuk dipesan</p>
        </div>
    </div>
</div>
@endsection

{{-- SCRIPT HITUNG 30 HARI --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const startInput = document.querySelector('input[name="tgl_mulai"]');
        const endInput = document.querySelector('input[name="tgl_selesai"]');

        startInput.addEventListener("change", function() {
            if (this.value) {
                let startDate = new Date(this.value);
                startDate.setDate(startDate.getDate() + 30);
                let formattedDate = startDate.toISOString().split('T')[0];
                endInput.value = formattedDate;
            }
        });
    });
</script>
