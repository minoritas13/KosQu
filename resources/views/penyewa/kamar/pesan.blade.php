@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- LEFT CONTENT --}}
    <div class="md:col-span-2 bg-white p-6 rounded-xl shadow-lg space-y-4">

        <h2 class="text-2xl font-semibold">Booking Kamar</h2>

        <form action="{{ route('kamar.pesan', $kamar->id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="text-sm font-medium">Nama Lengkap</label>
                <input type="text" name="nama" class="w-full border p-3 rounded-lg"
                    value="{{ auth()->user()->name }}" readonly>
            </div>


            <div>
                <label class="text-sm font-medium">Tanggal Masuk</label>
                <input type="date" name="tgl_mulai" min="{{ now()->format('Y-m-d') }}"
                    class="w-full border p-3 rounded-lg" required>
                <input type="hidden" name="tgl_booking" value="{{ now()->format('Y-m-d') }}">

            </div>

            <div>
                <label class="text-sm font-medium">Tanggal Keluar</label>
                <input type="date" name="tgl_selesai" class="w-full border p-3 rounded-lg" readonly required>
            </div>

            <input type="hidden" name="kamar_id" value="{{ $kamar->id }}">

            <button class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">
                Lanjut ke Pembayaran
            </button>
        </form>
    </div>

    {{-- RIGHT: INFORMASI KAMAR --}}
    <div class="bg-white p-6 rounded-xl shadow-lg space-y-4">
        <h3 class="text-lg font-semibold">{{ $kamar->tipe_kamar }}</h3>
        <img src="{{ Storage::url($kamar->foto) }}" class="w-full h-60 object-cover rounded-lg">
        <p>{{ $kamar->nomor_kamar }}</p>
        <p class="text-sm text-gray-600">{{ $kamar->deskripsi }}</p>

        <div class="text-right">
            <p class="text-sm text-gray-500">Harga Bulanan</p>
            <p class="text-xl font-medium text-green-600">
                Rp {{ number_format($kamar->harga, 0, ',', '.') }}
            </p>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const start = document.querySelector('input[name="tgl_mulai"]');
        const end = document.querySelector('input[name="tgl_selesai"]');

        start.addEventListener('change', function() {
            let date = new Date(this.value);
            date.setDate(date.getDate() + 30);
            end.value = date.toISOString().split('T')[0];
        });
    });
</script>

@endsection