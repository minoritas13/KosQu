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
                @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" placeholder="user@example.com"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                       value="{{ old('email') }}">
                @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold text-gray-700">No HP</label>
                <input type="text" name="no_hp" placeholder="08xxxxxxxxxx"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring focus:ring-blue-300"
                       value="{{ old('no_hp') }}">
                @error('no_hp') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <!-- PASSWORD + SHOW/HIDE -->
            <div class="relative">
                <label class="block mb-1 font-semibold text-gray-700">Password</label>
                <input type="password" name="password" id="password" placeholder="Masukkan password"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-12 focus:ring focus:ring-blue-300">
                <button type="button" onclick="togglePassword('password', 'eye1', 'eye1-off')"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 pt-7 text-gray-500 hover:text-gray-700">
                    <svg id="eye1" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg id="eye1-off" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
                @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- KONFIRMASI PASSWORD + SHOW/HIDE -->
            <div class="relative">
                <label class="block mb-1 font-semibold text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi password"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 pr-12 focus:ring focus:ring-blue-300">
                <button type="button" onclick="togglePassword('password_confirmation', 'eye2', 'eye2-off')"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 pt-7 text-gray-500 hover:text-gray-700">
                    <svg id="eye2" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg id="eye2-off" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    </svg>
                </button>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-medium text-lg">
                Daftar
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-700">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">Login di sini</a>
        </p>
    </div>
</div>

{{-- Script Show/Hide Password (bisa handle banyak field) --}}
<script>
    function togglePassword(fieldId, eyeOpenId, eyeClosedId) {
        const field = document.getElementById(fieldId);
        const eyeOpen = document.getElementById(eyeOpenId);
        const eyeClosed = document.getElementById(eyeClosedId);

        if (field.type === 'password') {
            field.type = 'text';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        } else {
            field.type = 'password';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        }
    }
</script>
@endsection