@extends('layouts.app')

@section('title', 'Masuk | KostQu')

@section('content')

<div class="flex items-center justify-center min-h-[65vh] bg-cover bg-center"
     style="background-image: url('{{ asset('images/bg-login.jpg') }}');">

    <div class="bg-white/40 backdrop-blur-md rounded-2xl shadow-xl w-full max-w-md p-8 border border-gray-300">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Masuk ke Akun</h2>

        {{-- Notifikasi --}}
        @foreach (['error' => 'red', 'success' => 'green', 'warning' => 'yellow'] as $type => $color)
            @if (session($type))
                <div class="mb-4 p-3 bg-{{ $color }}-100 text-{{ $color }}-700 rounded">
                    {{ session($type) }}
                </div>
            @endif
        @endforeach

        {{-- Form Login --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

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
                <label class="block mb-1 font-semibold text-gray-700">Password</label>
                <input type="password" name="password" placeholder="Masukkan password anda"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
                @error('password')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Masuk
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-700">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Daftar di sini</a>
        </p>
    </div>
</div>
@endsection
