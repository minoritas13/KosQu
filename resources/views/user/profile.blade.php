@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 mt-20">

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Profil Saya</h1>

    {{-- CARD PROFIL --}}
    <div class="bg-white rounded-xl shadow p-6 flex flex-col md:flex-row items-center justify-between gap-6">

        <div class="flex items-center gap-6">
            
            {{-- Foto Profil --}}
            <img 
                src="{{ $user->photo ? asset('storage/profile/' . $user->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=200' }}"
                class="w-24 h-24 rounded-full object-cover shadow"
            >

            <div>
                <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

        {{-- INFORMASI PRIBADI --}}
        <div class="md:col-span-2 bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Informasi Pribadi</h2>

                {{-- Tombol Edit --}}
                <a href="{{ route('profile.edit') }}"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                    Edit Profil
                </a>
            </div>

            {{-- DATA STATIC --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">

                <div>
                    <p class="font-medium text-gray-500">Nama Lengkap</p>
                    <p class="text-gray-900">{{ $user->name }}</p>
                </div>

                <div>
                    <p class="font-medium text-gray-500">Alamat Email</p>
                    <p class="text-gray-900">{{ $user->email }}</p>
                </div>

                <div>
                    <p class="font-medium text-gray-500">Nomor Telepon</p>
                    <p class="text-gray-900">{{ $user->no_hp ?? '-' }}</p>
                </div>

            </div>

        </div>

        {{-- KEAMANAN AKUN --}}
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-3">Keamanan Akun</h2>
            <p class="text-gray-600 text-sm mb-4">
                Ubah kata sandi Anda secara berkala untuk menjaga keamanan akun.
            </p>

            <a href="{{ route('profile.password') }}"
                    class="bg-yellow-500 text-white px-5 py-2 rounded-lg hover:bg-yellow-600 transition">
                    Ubah Password
                </a>
 
        </div>

    </div>

    {{-- INFORMASI SEWA (Jika ada relasi) --}}
    @if(isset($sewa))
    <div class="bg-white rounded-xl shadow p-6 mt-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Sewa</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <p class="font-medium text-gray-500">Nomor & Tipe Kamar</p>
                <p class="text-gray-800">{{ $sewa->kamar->nomor_kamar }} - {{ $sewa->kamar->tipe_kamar }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-500">Tanggal Mulai Sewa</p>
                <p class="text-gray-800">{{ $sewa->mulai_sewa }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-500">Jatuh Tempo Berikutnya</p>
                <p class="text-gray-800">{{ $sewa->jatuh_tempo }}</p>
            </div>

            <div>
                <p class="font-medium text-gray-500">Status Sewa</p>
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full">Aktif</span>
            </div>

        </div>
    </div>
    @endif

</div>
@endsection
