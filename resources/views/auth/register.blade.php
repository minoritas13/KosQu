@extends('layouts.app')

@section('title', 'Daftar Akun | KostQu')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-cover bg-center"
     style="background-image: url('{{ asset('images/bg-login.jpg') }}');">

    <div class="bg-white/40 backdrop-blur-md rounded-2xl shadow-xl w-full max-w-md p-8 border border-white/50">
        
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Daftar Akun Baru</h2>
            <p class="text-gray-600 text-sm mt-2">Gabung komunitas KostQu sekarang</p>
        </div>

        {{-- Form Register --}}
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            {{-- Input Nama --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700 text-sm">Nama Lengkap</label>
                <input type="text" name="name" placeholder="Nama lengkap anda"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white/80"
                    value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-600 text-xs mt-1 font-medium">* {{ $message }}</p>
                @enderror
            </div>

            {{-- Input Email --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700 text-sm">Email</label>
                <input type="email" name="email" placeholder="contoh@email.com"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white/80"
                    value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-600 text-xs mt-1 font-medium">* {{ $message }}</p>
                @enderror
            </div>

            {{-- Input No HP --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700 text-sm">No HP</label>
                <input type="text" name="no_hp" placeholder="08xxxxxxxxxx"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white/80"
                    value="{{ old('no_hp') }}">
                @error('no_hp')
                    <p class="text-red-600 text-xs mt-1 font-medium">* {{ $message }}</p>
                @enderror
            </div>

            {{-- Input Password --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700 text-sm">Password</label>
                <input type="password" name="password" placeholder="Buat password aman"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white/80"
                    required>
                {{-- Helper Text buat ngasih tau syarat password --}}
                <p class="text-xs text-gray-500 mt-1">
                    Minimal 8 karakter, kombinasi huruf besar & angka.
                </p>
                @error('password')
                    <p class="text-red-600 text-xs mt-1 font-medium">* {{ $message }}</p>
                @enderror
            </div>

            {{-- Input Konfirmasi Password --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700 text-sm">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition bg-white/80"
                    required>
            </div>

            {{-- Tombol Daftar --}}
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow-lg transform active:scale-95 transition duration-200">
                Daftar Sekarang
            </button>
        </form>

        {{-- Link Login --}}
        <p class="mt-6 text-center text-sm text-gray-800">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-700 font-bold hover:underline ml-1">
                Login di sini
            </a>
        </p>
    </div>
</div>
@endsection