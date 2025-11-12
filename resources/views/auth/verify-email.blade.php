<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email | KostQu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-xl font-bold text-gray-800">KostQu</h1>

            <div class="flex items-center space-x-6">
                <a href="#" class="text-gray-600 hover:text-gray-800">Beranda</a>
                <a href="#" class="text-gray-600 hover:text-gray-800">Pencarian</a>
            </div>

            <div class="flex space-x-4">
                <button class="text-gray-600 hover:text-gray-800">
                    <x-zondicon-notifications class="w-6 h-6" />
                </button>
                <button class="text-gray-600 hover:text-gray-800">
                    <x-css-profile class="w-6 h-6" />
                </button>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <div class="flex flex-col items-center justify-center min-h-[80vh] px-4">
        <h2 class="text-lg font-semibold text-center mb-2">
            Verifikasi Email Kamu, Sudah Kami Kirim Ke Email, Silahkan Cek Email Kamu
        </h2>

        <div class="bg-white rounded-2xl shadow-md mt-6 w-full max-w-xl overflow-hidden">
            <!-- Header card -->
            <div class="bg-gray-50 border-b p-4 flex justify-end items-center">
                <span class="text-gray-400 text-sm font-medium">✕</span>
            </div>

            <!-- Body -->
            <div class="p-8 text-center">
                <h3 class="font-semibold text-gray-800 mb-1">Email Telah Kami Kirimkan Ke</h3>
                <p class="text-indigo-600 font-semibold">{{ Auth::user()->email }}</p>

                <p class="text-gray-500 mt-4 text-sm">
                    Klik link yang kami kirimkan. Jika tidak ada di inbox, coba cek di folder spam.
                </p>

                <!-- Timer -->
                <p id="timerText" class="text-xs text-gray-400 mt-6">Tersedia dalam 30s</p>

                <!-- Pesan sukses -->
                @if (session('message'))
                    <div class="mt-4 bg-green-100 text-green-700 px-4 py-2 rounded-md text-sm">
                        {{ session('message') }}
                    </div>
                @endif

                <!-- Tombol kirim ulang -->
                <form id="resendForm" method="POST" action="{{ route('verification.send') }}" class="mt-5">
                    @csrf
                    <button id="resendBtn" type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg font-medium transition disabled:opacity-50 disabled:cursor-not-allowed">
                        Kirim Ulang Verifikasi
                    </button>
                </form>

                <!-- Link ke login -->
                <a href="{{ route('login') }}"
                    class="inline-block mt-5 text-gray-600 hover:text-indigo-600 text-sm font-medium">
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

</html>
