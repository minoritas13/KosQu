@extends('layouts.app')

@section('content')
<div class="container grid grid-cols-1 gap-6 py-6 mx-auto md:grid-cols-3">

    {{-- LEFT SIDE --}}
    <div class="p-6 space-y-4 bg-white shadow-lg md:col-span-2 rounded-xl">

        <h2 class="text-2xl font-semibold">Konfirmasi Pembayaran</h2>
        <p class="text-gray-600">Silahkan pilih metode pembayaran.</p>

        <form action="{{ route('penyewa.pembayaran.store', $booking->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- JENIS PEMBAYARAN --}}
            <div>
                <h3 class="mb-3 font-semibold">Jenis Pembayaran</h3>
                <div class="grid grid-cols-1 gap-3">
                    {{-- DP --}}
                    <label class="relative flex items-center gap-4 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                        <input type="radio" name="jenis_pembayaran" value="dp" class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500" required>
                        <div>
                            <p class="font-medium text-gray-900">DP 30%</p>
                            <p class="text-sm text-gray-500">Bayar 30% dari total harga sekarang.</p>
                        </div>
                    </label>

                    {{-- FULL --}}
                    <label class="relative flex items-center gap-4 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                        <input type="radio" name="jenis_pembayaran" value="full" class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <div>
                            <p class="font-medium text-gray-900">Full Payment</p>
                            <p class="text-sm text-gray-500">Bayar 100% sekarang.</p>
                        </div>
                    </label>
                </div>
            </div>

            {{-- METODE PEMBAYARAN --}}
            <div>
                <h3 class="mb-3 font-semibold">Metode Pembayaran</h3>
                <div class="grid grid-cols-1 gap-3">
                    {{-- TRANSFER --}}
                    <label class="relative flex items-center gap-4 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                        <input type="radio" name="metode_bayar" value="transfer" class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500" required>
                        <div>
                            <p class="font-medium text-gray-900">Transfer Bank</p>
                            <p class="text-sm text-gray-500">BCA 1234567890 a.n KosQu</p>
                        </div>
                    </label>

                    {{-- E-WALLET --}}
                    <label class="relative flex items-center gap-4 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                        <input type="radio" name="metode_bayar" value="e-wallet" class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <div>
                            <p class="font-medium text-gray-900">E-Wallet</p>
                            <p class="text-sm text-gray-500">0895-xxxx-xxxx (Dana/Ovo/Gopay)</p>
                        </div>
                    </label>

                    {{-- CASH — hanya muncul jika jenis pembayaran = DP --}}
                    <label id="cash-section" class="hidden relative flex items-center gap-4 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition-all has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                        <input type="radio" name="metode_bayar" value="cash" class="w-5 h-5 text-blue-600 border-gray-300 focus:ring-blue-500">
                        <div>
                            <p class="font-medium text-gray-900">Cash (Bayar di Tempat)</p>
                            <p class="text-sm text-gray-500">Bayar sisa tagihan langsung di lokasi.</p>
                        </div>
                    </label>
                </div>
            </div>

            {{-- UPLOAD BUKTI (Akan di-hide kalau pilih Cash) --}}
            <div id="upload-section" class="mt-4 p-4 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                <label class="block mb-2 font-semibold text-gray-700">Upload Bukti Pembayaran <span class="text-red-500">*</span></label>
                <input type="file" id="bukti_bayar_input" name="bukti_bayar" accept="image/*" required
                    class="w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none">
                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, PDF. Maks 2MB.</p>
            </div>

            <button type="submit" class="w-full py-3 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-md transition duration-300">
                Konfirmasi Pembayaran
            </button>

        </form>
    </div>

    {{-- RIGHT SIDE --}}
    <div class="p-6 space-y-4 bg-white shadow-lg rounded-xl h-fit sticky top-6">

        <h3 class="text-xl font-semibold border-b pb-2">Ringkasan Pesanan</h3>

        <div class="overflow-hidden rounded-lg">
            <img src="{{ Storage::url($booking->kamar->foto) }}" class="object-cover w-full h-48 hover:scale-105 transition duration-300">
        </div>

        <div>
            <p class="text-lg font-bold text-gray-800">{{ $booking->kamar->tipe_kamar }}</p>
            <p class="text-gray-500 text-sm">No. Kamar: {{ $booking->kamar->nomor_kamar }}</p>
        </div>

        <div class="pt-4 space-y-3 border-t">
            <div class="flex justify-between">
                <span class="text-gray-600">Harga Sewa</span>
                <span class="font-semibold">Rp {{ number_format($booking->kamar->harga, 0, ',', '.') }}</span>
            </div>

            {{-- DP SUMMARY --}}
            <div id="dp-text" class="hidden flex justify-between bg-blue-50 p-2 rounded text-blue-800">
                <span>DP (30%)</span>
                <span class="font-bold">Rp {{ number_format($booking->kamar->harga * 0.3, 0, ',', '.') }}</span>
            </div>

            {{-- FULL SUMMARY --}}
            <div id="full-text" class="hidden flex justify-between bg-green-50 p-2 rounded text-green-800">
                <span>Total Bayar</span>
                <span class="font-bold">Rp {{ number_format($booking->kamar->harga, 0, ',', '.') }}</span>
            </div>
        </div>

    </div>

</div>

{{-- SCRIPT DINAMIS --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const dpText = document.getElementById('dp-text');
        const fullText = document.getElementById('full-text');
        const cashSection = document.getElementById('cash-section');
        const uploadSection = document.getElementById('upload-section');
        const buktiInput = document.getElementById('bukti_bayar_input');

        const typeRadios = document.querySelectorAll('input[name="jenis_pembayaran"]');
        const methodRadios = document.querySelectorAll('input[name="metode_bayar"]');

        // Logic Ganti Jenis Pembayaran (DP vs Full)
        typeRadios.forEach(radio => {
            radio.addEventListener("change", function() {
                // Reset tampilan ringkasan
                dpText.classList.add("hidden");
                fullText.classList.add("hidden");
                
                // Reset opsi Cash
                cashSection.classList.add("hidden");
                
                // Kalau pilih DP
                if (this.value === "dp") {
                    dpText.classList.remove("hidden");
                    cashSection.classList.remove("hidden");
                    cashSection.classList.add("flex");
                }

                // Kalau pilih Full
                if (this.value === "full") {
                    fullText.classList.remove("hidden");
                    
                    // Kalau user sebelumnya pilih cash, kita reset radio button metode bayarnya
                    const cashInput = document.querySelector('input[value="cash"]');
                    if(cashInput.checked) {
                        cashInput.checked = false;
                        // Kembalikan wajib upload karena cash ga boleh di full
                        uploadSection.classList.remove("hidden");
                        buktiInput.required = true;
                    }
                }
            });
        });

        // Logic Ganti Metode Bayar (Transfer vs Cash)
        methodRadios.forEach(radio => {
            radio.addEventListener("change", function() {
                if (this.value === 'cash') {
                    // Kalau Cash, sembunyikan upload file & matikan required
                    uploadSection.classList.add("hidden");
                    buktiInput.required = false;
                } else {
                    // Kalau Transfer/E-wallet, wajib upload
                    uploadSection.classList.remove("hidden");
                    buktiInput.required = true;
                }
            });
        });
    });
</script>
@endsection