@extends('layouts.app')

@section('content')

{{-- 1. HERO SECTION: RULEBOOK --}}
<div class="relative bg-slate-900 py-20 overflow-hidden border-b border-slate-800">
    <div class="absolute inset-0">
        {{-- Pattern Garis-Garis Halus --}}
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 rounded-full bg-blue-500 blur-3xl opacity-10"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-800 border border-slate-700 text-slate-300 text-xs font-semibold uppercase tracking-wide mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
            Terms of Service
        </div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
            Syarat & Ketentuan
        </h1>
        <p class="text-lg text-slate-400 max-w-2xl mx-auto">
            Aturan main penggunaan platform KostQu. Baca dulu biar sama-sama enak, aman, dan nyaman.
        </p>
    </div>
</div>

{{-- 2. HIGHLIGHT RULES (Visual Cards) --}}
<div class="py-16 bg-white relative z-10">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            
            {{-- Card 1: Akun --}}
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-blue-200 transition group">
                <h3 class="font-bold text-slate-900 text-xl mb-3 group-hover:text-blue-600 transition">👤 Akun Asli</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Wajib menggunakan identitas asli (Nama & Foto) saat mendaftar. Akun palsu atau anonim akan kami hapus tanpa peringatan.
                </p>
            </div>

            {{-- Card 2: Pembayaran --}}
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-green-200 transition group">
                <h3 class="font-bold text-slate-900 text-xl mb-3 group-hover:text-green-600 transition">💸 Transaksi</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    DP yang sudah dibayarkan <strong>tidak dapat dikembalikan</strong> (non-refundable) jika pembatalan dilakukan sepihak oleh penyewa.
                </p>
            </div>

            {{-- Card 3: Perilaku --}}
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-red-200 transition group">
                <h3 class="font-bold text-slate-900 text-xl mb-3 group-hover:text-red-600 transition">🚫 Larangan</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    Dilarang keras menggunakan kost untuk aktivitas ilegal, asusila, atau yang melanggar hukum NKRI.
                </p>
            </div>

        </div>

        {{-- 3. DETAILED CONTENT (Legal Text) --}}
        <div class="max-w-4xl mx-auto">
            <div class="prose prose-slate prose-lg max-w-none">
                
                <h3 class="text-2xl font-bold text-slate-900 border-b pb-4 mb-6">Detail Ketentuan Penggunaan</h3>

                <h4 class="font-bold text-slate-800 mt-8">1. Pendahuluan</h4>
                <p class="text-slate-600">
                    Selamat datang di KostQu. Dengan mengakses atau menggunakan aplikasi ini, Anda setuju untuk terikat dengan syarat dan ketentuan ini. Jika Anda tidak setuju, mohon untuk tidak menggunakan layanan kami.
                </p>

                <h4 class="font-bold text-slate-800 mt-8">2. Kewajiban Pengguna</h4>
                <ul class="list-disc pl-5 text-slate-600 space-y-2">
                    <li>Pengguna wajib berusia minimal 17 tahun atau sudah memiliki KTP.</li>
                    <li>Menjaga kerahasiaan password akun masing-masing.</li>
                    <li>Tidak menyalahgunakan fitur chat untuk spam atau pelecehan.</li>
                    <li>Membayar tagihan sewa tepat waktu sesuai kesepakatan dengan pemilik kost.</li>
                </ul>

                <h4 class="font-bold text-slate-800 mt-8">3. Pemesanan & Pembayaran</h4>
                <p class="text-slate-600">
                    KostQu bertindak sebagai perantara platform. Transaksi pembayaran (kecuali DP via Payment Gateway kami) adalah tanggung jawab antara Penyewa dan Pemilik Kost. Bukti transfer palsu akan diproses secara hukum.
                </p>

                <h4 class="font-bold text-slate-800 mt-8">4. Pembatasan Tanggung Jawab</h4>
                <p class="text-slate-600">
                    KostQu tidak bertanggung jawab atas:
                </p>
                <ul class="list-disc pl-5 text-slate-600 space-y-2">
                    <li>Kerusakan fasilitas kost yang disebabkan oleh penyewa.</li>
                    <li>Kehilangan barang pribadi di area kost.</li>
                    <li>Perselisihan pribadi antara penyewa dan pemilik kost.</li>
                </ul>

                <h4 class="font-bold text-slate-800 mt-8">5. Perubahan Syarat</h4>
                <p class="text-slate-600">
                    Kami berhak mengubah syarat dan ketentuan ini sewaktu-waktu. Perubahan akan diberitahukan melalui email atau notifikasi aplikasi.
                </p>

                {{-- Signature/Closing Sederhana --}}
                <div class="mt-12 text-center text-slate-400 italic text-sm">
                    Terima kasih telah menjadi pengguna bijak KostQu.
                </div>

            </div>
        </div>
    </div>
</div>

@endsection