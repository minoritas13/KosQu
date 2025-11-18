@extends('layouts.app')

@section('title', 'Daftar Akun | KostQu')

@section('content')
<div class="flex items-center justify-center min-h-[80vh] bg-cover bg-center"
     style="background-image: url('{{ asset('images/bg-login.jpg') }}');">

    <div class="bg-white/40 backdrop-blur-md rounded-2xl shadow-xl w-full max-w-md p-8 border border-gray-300">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Daftar Akun Baru</h2>

        {{-- Notifikasi --}}
        @foreach (['error' => 'red', 'success' => 'green', 'warning' => 'yellow'] as $type => $color)
            @if (session($type))
                <div class="mb-4 p-3 bg-{{ $color }}-100 text-{{ $color }}-700 rounded">
                    {{ session($type) }}
                </div>
            @endif
        @endforeach

        {{-- Form Register --}}
        <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" placeholder="Nama lengkap anda"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" placeholder="user@example.com"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">No HP</label>
                <input type="text" name="no_hp" placeholder="08xxxxxxxxxx"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                    value="{{ old('no_hp') }}">
                @error('no_hp')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Password</label>
                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
                @error('password')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Daftar
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-700">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login di sini</a>
        </p>
    </div>
</div>
@endsection
