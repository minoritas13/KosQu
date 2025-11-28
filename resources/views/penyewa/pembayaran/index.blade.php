@extends('layouts.app')

@section('content')
    <div class="container grid grid-cols-1 gap-6 py-6 mx-auto md:grid-cols-3">

        {{-- LEFT SIDE --}}
        <div class="p-6 space-y-4 bg-white shadow-lg md:col-span-2 rounded-xl">

            <h2 class="text-2xl font-semibold">Konfirmasi Pembayaran</h2>
            <p class="text-gray-600">Silahkan pilih metode pembayaran.</p>

            <form action="{{ route('penyewa.pembayaran.store', $booking->id) }}" method="POST" class="space-y-5">
                @csrf

                {{-- JENIS PEMBAYARAN --}}
                <div>
                    <h3 class="mb-2 font-semibold">Jenis Pembayaran</h3>

                    {{-- DP --}}
                    <label class="flex gap-3 p-4 border rounded-lg cursor-pointer">
                        <input type="radio" name="jenis_pembayaran" value="dp" required>
                        <div>
                            <p class="font-medium">DP 30%</p>
                            <p class="text-sm text-gray-600">Bayar 30% dari total harga sekarang.</p>
                        </div>
                    </label>

                    {{-- FULL --}}
                    <label class="flex gap-3 p-4 mt-3 border rounded-lg cursor-pointer">
                        <input type="radio" name="jenis_pembayaran" value="full">
                        <div>
                            <p class="font-medium">Full Payment</p>
                            <p class="text-sm text-gray-600">Bayar 100% sekarang.</p>
                        </div>
                    </label>
                </div>

                {{-- METODE PEMBAYARAN --}}
                <div>
                    <h3 class="mb-2 font-semibold">Metode Pembayaran</h3>

                    {{-- TRANSFER --}}
                    <label class="flex gap-3 p-4 border rounded-lg cursor-pointer">
                        <input type="radio" name="metode_bayar" value="transfer" required>
                        <div>
                            <p class="font-medium">Transfer Bank</p>
                            <p class="text-sm text-gray-600">BCA 1234567890 a.n KosQu</p>
                        </div>
                    </label>

                    {{-- E-WALLET --}}
                    <label class="flex gap-3 p-4 mt-3 border rounded-lg cursor-pointer">
                        <input type="radio" name="metode_bayar" value="e-wallet">
                        <div>
                            <p class="font-medium">E-Wallet</p>
                            <p class="text-sm text-gray-600">0895-xxxx-xxxx</p>
                        </div>
                    </label>

                    {{-- CASH — hanya muncul jika jenis pembayaran = DP --}}
                    <label id="cash-section" class="hidden gap-3 p-4 mt-3 border rounded-lg cursor-pointer">
                        <input type="radio" name="metode_bayar" value="cash">
                        <div>
                            <p class="font-medium">Cash</p>
                            <p class="text-sm text-gray-600">Bayar 30% secara langsung di lokasi.</p>
                        </div>
                    </label>
                </div>

                <button class="w-full py-3 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                    Konfirmasi Pembayaran
                </button>

            </form>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="p-6 space-y-4 bg-white shadow-lg rounded-xl">

            <h3 class="text-xl font-semibold">Ringkasan Pesanan</h3>

            <img src="{{ Storage::url($booking->kamar->foto) }}" class="object-cover w-full rounded-lg h-60">

            <p class="text-lg font-medium">{{ $booking->kamar->tipe_kamar }}</p>
            <p class="text-gray-600">{{ $booking->kamar->nomor_kamar }}</p>

            <div class="pt-3 space-y-2 border-t">

                <p>Harga:
                    <strong>Rp {{ number_format($booking->kamar->harga, 0, ',', '.') }}</strong>
                </p>

                {{-- DP --}}
                <p id="dp-text" class="hidden">
                    DP 30%:
                    <strong class="text-green-600">
                        Rp {{ number_format($booking->kamar->harga * 0.3, 0, ',', '.') }}
                    </strong>
                </p>

                {{-- FULL --}}
                <p id="full-text" class="hidden">
                    Total Bayar:
                    <strong class="text-green-600">
                        Rp {{ number_format($booking->kamar->harga, 0, ',', '.') }}
                    </strong>
                </p>

            </div>

        </div>

    </div>

    {{-- SCRIPT DINAMIS --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const dpText = document.getElementById('dp-text');
            const fullText = document.getElementById('full-text');

            const cashSection = document.getElementById('cash-section');

            const typeRadios = document.querySelectorAll('input[name="jenis_pembayaran"]');

            typeRadios.forEach(radio => {

                radio.addEventListener("change", function() {

                    // Reset ringkasan
                    dpText.classList.add("hidden");
                    fullText.classList.add("hidden");

                    // Reset cash
                    cashSection.classList.add("hidden");

                    // DP dipilih
                    if (this.value === "dp") {
                        dpText.classList.remove("hidden");
                        fullText.classList.add("hidden");

                        cashSection.classList.remove("hidden");
                        cashSection.classList.add("flex"); // tampil sebagai flex
                    }

                    // FULL dipilih
                    if (this.value === "full") {
                        dpText.classList.add("hidden");
                        fullText.classList.remove("hidden");

                        cashSection.classList.add("hidden");
                        cashSection.classList.remove("flex"); // pastikan flex dihapus
                    }

                });
            });

        });
    </script>
@endsection
