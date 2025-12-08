@extends('layouts.app')

@section('content')

{{-- 1. HERO SECTION: TRUST CENTER --}}
<div class="relative bg-gray-900 py-20 overflow-hidden">
    {{-- Dekorasi Background --}}
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute -top-24 -left-24 w-96 h-96 rounded-full bg-blue-600 blur-3xl opacity-20"></div>
        <div class="absolute top-1/2 right-0 w-64 h-64 rounded-full bg-purple-600 blur-3xl opacity-20"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-900/50 border border-blue-700 text-blue-300 text-xs font-semibold uppercase tracking-wide mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            Security & Privacy
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
            Data Kamu, <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Prioritas Kami.</span>
        </h1>
        <p class="text-lg text-gray-400 max-w-2xl mx-auto">
            Transparansi adalah kunci. Berikut adalah bagaimana KostQu mengumpulkan, menggunakan, dan melindungi informasi pribadi kamu.
        </p>
    </div>
</div>

{{-- 2. HIGHLIGHT CARDS (Poin Penting) --}}
<div class="py-12 bg-gray-50 -mt-10 relative z-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            {{-- Card 1 --}}
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">Hanya Data Penting</h3>
                <p class="text-gray-500 text-sm">Kami hanya mengumpulkan data yang dibutuhkan untuk proses booking dan verifikasi. Tidak ada data sampah.</p>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">Terenkripsi Aman</h3>
                <p class="text-gray-500 text-sm">Password dan transaksi kamu dilindungi dengan standar keamanan enkripsi terkini.</p>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">Transparansi Penuh</h3>
                <p class="text-gray-500 text-sm">Kamu punya kendali penuh. Kami tidak akan menjual data kamu ke pihak ketiga tanpa izin.</p>
            </div>

        </div>
    </div>
</div>

{{-- 3. DETAIL KONTEN (Structured) --}}
<div class="pb-24 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-gray-100">
            
            <div class="prose prose-lg prose-blue max-w-none text-gray-600">
                <p class="text-sm text-gray-400 uppercase tracking-widest font-bold mb-4">Detail Kebijakan</p>
                
                <h3 class="text-gray-900">1. Informasi yang Kami Kumpulkan</h3>
                <p>Saat kamu mendaftar atau melakukan pemesanan kost, kami meminta informasi seperti:</p>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 list-none pl-0">
                    <li class="flex items-center gap-2"><span class="text-blue-500">✓</span> Nama Lengkap & NPM</li>
                    <li class="flex items-center gap-2"><span class="text-blue-500">✓</span> Alamat Email Resmi</li>
                    <li class="flex items-center gap-2"><span class="text-blue-500">✓</span> Nomor WhatsApp</li>
                    <li class="flex items-center gap-2"><span class="text-blue-500">✓</span> Bukti Pembayaran</li>
                </ul>

                <hr class="border-gray-100 my-8">

                <h3 class="text-gray-900">2. Penggunaan Data</h3>
                <p>Kami menggunakan data kamu semata-mata untuk:</p>
                <ul>
                    <li>Memproses booking kamar agar tidak diambil orang lain.</li>
                    <li>Menghubungkan kamu dengan pemilik kost via WhatsApp.</li>
                    <li>Mengirimkan invoice/bukti bayar digital ke email kamu.</li>
                </ul>

                <hr class="border-gray-100 my-8">

                <h3 class="text-gray-900">3. Keamanan & Cookie</h3>
                <p>
                    Kami menggunakan Cookie sesi untuk memastikan kamu tetap login saat berpindah halaman. Password kamu di-hash menggunakan <strong>Bcrypt</strong> sehingga bahkan admin pun tidak bisa melihat password aslimu.
                </p>

                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mt-8 rounded-r-lg">
                    <p class="text-blue-900 font-medium m-0 text-sm">
                        <strong>Catatan:</strong> Kebijakan ini dapat berubah sewaktu-waktu. Cek halaman ini secara berkala ya!
                    </p>
                </div>

            </div>
        </div>
        
        {{-- Contact Info Kecil di Bawah --}}
        <div class="text-center mt-12">
            <p class="text-gray-500 text-sm">Ada pertanyaan soal data kamu?</p>
            <a href="mailto:privacy@kostqu.com" class="text-gray-900 font-bold hover:underline mt-1 block">Hubungi Tim Privacy Kami</a>
        </div>
    </div>
</div>

@endsection