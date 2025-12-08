@extends('layouts.app')

@section('content')

{{-- 1. HERO SECTION (Banner Atas) --}}
<div class="relative bg-gray-900 py-24 sm:py-32 overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2850&q=80" alt="Team Work" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-gray-900/90"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Tentang KostQu</h1>
        <p class="mt-6 text-lg leading-8 text-gray-300 max-w-2xl mx-auto">
            Mewujudkan pengalaman pencarian hunian mahasiswa yang lebih mudah, transparan, dan terpercaya di era digital.
        </p>
    </div>
</div>

{{-- 2. TENTANG APLIKASI --}}
<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            {{-- Teks Penjelasan --}}
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl mb-6">
                    Solusi Digital untuk <span class="text-blue-600">Anak Kost</span>
                </h2>
                <div class="space-y-6 text-gray-600 text-lg leading-relaxed">
                    <p>
                        KostQu hadir sebagai jawaban atas keresahan mahasiswa dalam mencari tempat tinggal yang layak. Kami menghubungkan pencari kost dengan pemilik properti melalui sistem yang terintegrasi dan transparan.
                    </p>
                    <p>
                        Tidak perlu lagi berkeliling di bawah terik matahari. Dengan KostQu, survei lokasi, cek fasilitas, hingga pembayaran sewa dapat dilakukan hanya dalam genggaman tangan.
                    </p>
                </div>
                
                {{-- Statistik --}}
                <div class="mt-10 grid grid-cols-3 gap-8 border-t border-gray-100 pt-10">
                    <div>
                        <div class="text-4xl font-bold text-blue-600">100+</div>
                        <div class="text-sm font-medium text-gray-500 mt-1">Mitra Kost</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-600">500+</div>
                        <div class="text-sm font-medium text-gray-500 mt-1">Kamar Tersedia</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-600">24/7</div>
                        <div class="text-sm font-medium text-gray-500 mt-1">Support</div>
                    </div>
                </div>
            </div>

            {{-- Gambar Ilustrasi --}}
            <div class="relative pl-4 lg:pl-0">
                <div class="aspect-w-16 aspect-h-9 rounded-3xl bg-gray-100 overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition duration-700 ease-in-out">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1632&q=80" 
                         alt="Aplikasi KostQu" class="object-cover w-full h-full transform hover:scale-105 transition duration-700">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 3. TIM PENGEMBANG (The Squad) --}}
<div class="py-24 bg-gray-50">
    <div class="max-w-[90rem] mx-auto px-6 lg:px-8 text-center"> {{-- Container lebih lebar --}}
        
        <div class="mb-20">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Tim Pengembang</h2>
            <p class="mt-6 text-xl text-gray-600 max-w-2xl mx-auto">
                Di balik setiap baris kode, ada mahasiswa yang lupa cara tidur.
            </p>
        </div>

        {{-- GRID 4 ORANG (Besar & Sorotan) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8 justify-center">

            {{-- 1. ARJUNA --}}
            <div class="bg-white rounded-3xl p-10 shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition duration-300 group">
                <div class="relative mx-auto w-40 h-40 mb-8"> {{-- Foto Gede --}}
                    <img class="rounded-full w-full h-full object-cover border-4 border-white shadow-md group-hover:scale-110 transition duration-300" 
                         src="https://ui-avatars.com/api/?name=Arjuna&background=0D8ABC&color=fff&size=512&bold=true" alt="Arjuna">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Arjuna</h3> {{-- Nama Gede --}}
                
                <div class="space-y-3 text-base text-gray-600 bg-gray-50 p-5 rounded-2xl">
                    <p class="font-medium flex items-center justify-center gap-2">
                        🆔 2317051xxx
                    </p>
                    <p class="text-sm text-gray-500 break-all">
                        arjuna@student.unila.ac.id
                    </p>
                </div>
            </div>

            {{-- 2. NAPIS --}}
            <div class="bg-white rounded-3xl p-10 shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition duration-300 group">
                <div class="relative mx-auto w-40 h-40 mb-8">
                    <img class="rounded-full w-full h-full object-cover border-4 border-white shadow-md group-hover:scale-110 transition duration-300" 
                         src="https://ui-avatars.com/api/?name=Napis&background=10B981&color=fff&size=512&bold=true" alt="Napis">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Napis</h3>
                
                <div class="space-y-3 text-base text-gray-600 bg-gray-50 p-5 rounded-2xl">
                    <p class="font-medium flex items-center justify-center gap-2">
                        🆔 2317051xxx
                    </p>
                    <p class="text-sm text-gray-500 break-all">
                        napis@student.unila.ac.id
                    </p>
                </div>
            </div>

            {{-- 3. CITRA --}}
            <div class="bg-white rounded-3xl p-10 shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition duration-300 group">
                <div class="relative mx-auto w-40 h-40 mb-8">
                    <img class="rounded-full w-full h-full object-cover border-4 border-white shadow-md group-hover:scale-110 transition duration-300" 
                         src="https://ui-avatars.com/api/?name=Citra&background=8B5CF6&color=fff&size=512&bold=true" alt="Citra">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Citra</h3>
                
                <div class="space-y-3 text-base text-gray-600 bg-gray-50 p-5 rounded-2xl">
                    <p class="font-medium flex items-center justify-center gap-2">
                        🆔 2317051xxx
                    </p>
                    <p class="text-sm text-gray-500 break-all">
                        citra@student.unila.ac.id
                    </p>
                </div>
            </div>

            {{-- 4. SULTON --}}
            <div class="bg-white rounded-3xl p-10 shadow-lg border border-gray-100 hover:shadow-2xl hover:-translate-y-3 transition duration-300 group">
                <div class="relative mx-auto w-40 h-40 mb-8">
                    <img class="rounded-full w-full h-full object-cover border-4 border-white shadow-md group-hover:scale-110 transition duration-300" 
                         src="https://ui-avatars.com/api/?name=Sulton&background=F59E0B&color=fff&size=512&bold=true" alt="Sulton">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Sulton</h3>
                
                <div class="space-y-3 text-base text-gray-600 bg-gray-50 p-5 rounded-2xl">
                    <p class="font-medium flex items-center justify-center gap-2">
                        🆔 2317051xxx
                    </p>
                    <p class="text-sm text-gray-500 break-all">
                        sulton@student.unila.ac.id
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection