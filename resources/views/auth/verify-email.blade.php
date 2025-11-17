@extends('layouts.app')

@section('title', 'Verifikasi Email | KostQu')

@section('content')

    <body class="font-sans bg-gray-100">


        <!-- Konten utama -->
        <div class="flex flex-col items-center justify-center min-h-[80vh] px-4">
            <h2 class="mb-2 text-lg font-semibold text-center">
                Verifikasi Email Kamu, Sudah Kami Kirim Ke Email, Silahkan Cek Email Kamu
            </h2>

            <div class="w-full max-w-xl mt-6 overflow-hidden bg-white shadow-md rounded-2xl">
                <!-- Header card -->
                <div class="flex items-center justify-end p-4 border-b bg-gray-50">
                    @foreach (['error', 'success', 'warning'] as $type)
                        @if (session($type))
                            @php
                                $classes = match ($type) {
                                    'error' => 'bg-red-100 text-red-700',
                                    'success' => 'bg-green-100 text-green-700',
                                    'warning' => 'bg-yellow-100 text-yellow-700',
                                    default => '',
                                };
                            @endphp

                            <div class="mb-4 p-3 rounded {{ $classes }}">
                                {{ session($type) }}
                            </div>
                        @endif
                    @endforeach
                    <span class="text-sm font-medium text-gray-400">✕</span>
                </div>

                <!-- Body -->
                <div class="p-8 text-center">
                    <h3 class="mb-1 font-semibold text-gray-800">Email Telah Kami Kirimkan Ke</h3>
                    <p class="font-semibold text-indigo-600">{{ Auth::user()->email }}</p>

                    <p class="mt-4 text-sm text-gray-500">
                        Klik link yang kami kirimkan. Jika tidak ada di inbox, coba cek di folder spam.
                    </p>

                    <!-- Timer -->
                    <p id="timerText" class="mt-6 text-xs text-gray-400">Tersedia dalam 30s</p>

                    <!-- Pesan sukses -->
                    @if (session('message'))
                        <div class="px-4 py-2 mt-4 text-sm text-green-700 bg-green-100 rounded-md">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Tombol kirim ulang -->
                    <form id="resendForm" method="POST" action="{{ route('verification.send') }}" class="mt-5">
                        @csrf
                        <button id="resendBtn" type="submit"
                            class="px-5 py-2 font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 disabled:opacity-50 disabled:cursor-not-allowed">
                            Kirim Ulang Verifikasi
                        </button>
                    </form>

                    <!-- Link ke login -->
                    <a href="{{ route('login') }}"
                        class="inline-block mt-5 text-sm font-medium text-gray-600 hover:text-indigo-600">
                        ← Ke Halaman Masuk
                    </a>
                </div>
            </div>
        </div>

        <!-- Script cooldown tombol -->
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const resendBtn = document.getElementById("resendBtn");
                const timerText = document.getElementById("timerText");
                let cooldown = localStorage.getItem("verifyCooldown");

                function startCooldown(seconds) {
                    resendBtn.disabled = true;
                    const interval = setInterval(() => {
                        seconds--;
                        timerText.textContent = `Tersedia dalam ${seconds}s`;

                        if (seconds <= 0) {
                            clearInterval(interval);
                            resendBtn.disabled = false;
                            timerText.textContent = "";
                            localStorage.removeItem("verifyCooldown");
                        } else {
                            localStorage.setItem("verifyCooldown", seconds);
                        }
                    }, 1000);
                }

                // Saat halaman dibuka ulang, ambil sisa waktu dari localStorage
                if (cooldown && cooldown > 0) {
                    startCooldown(parseInt(cooldown));
                }

                // Saat form dikirim, mulai cooldown baru 30 detik
                document.getElementById("resendForm").addEventListener("submit", () => {
                    startCooldown(30);
                });
            });
        </script>

    </body>

@endsection
