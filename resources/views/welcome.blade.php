<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostQu | Temukan Kost Nyamanmu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 text-gray-800">

    {{-- Navbar --}}
    <nav class="bg-gray-200/70 backdrop-blur-md shadow-sm py-4 px-8 flex justify-between items-center fixed w-full z-50">
        <h1 class="text-xl font-bold text-gray-800">KostQu</h1>
        <div class="space-x-6 text-gray-700 font-medium">
            <a href="#" class="text-blue-600 font-semibold border-b-2 border-blue-600">Beranda</a>
            <a href="#" class="hover:text-blue-600">Pencarian</a>
            <a href="#" class="hover:text-blue-600">Pembayaran</a>
        </div>
        <div class="flex items-center space-x-4">
            <button><x-zondicon-notifications class="w-6 h-6" /></button>
            <button><x-css-profile class="w-6 h-6" /></button>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative h-[80vh] bg-cover bg-center flex items-center"
        style="background-image: url('{{ asset('images/bg-login.jpg') }}');">
        <div class="bg-white/80 rounded-xl px-8 py-20 mx-8 text-center max-w-lg shadow-lg">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Temukan Kost Impianmu</h1>
            <p class="text-gray-700 mb-6">Pilih kost sesuai kebutuhan dan kenyamananmu hanya di KostQu.</p>
            <a href="{{ route('login') }}"
                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                Cari Kamar Sekarang
            </a>
        </div>
    </section>

    {{-- Kamar Populer --}}
    <section class="py-16 px-6 bg-white">
        <h2 class="text-2xl font-bold text-center mb-10">Kamar Populer</h2>
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

            {{-- Card 1 --}}
            <div class="bg-white border rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                <img src="{{ asset('images/room1.jpg') }}" alt="Kamar Delux AC" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Kamar Delux AC</h3>
                    <p class="font-bold text-blue-600">Rp 1.200.000/Bulan</p>
                    <p class="text-sm text-gray-600 mt-1">AC, WiFi, Kamar Mandi Dalam, Lemari</p>
                    <button class="mt-3 w-full bg-gray-200 py-2 rounded-lg hover:bg-gray-300 transition">Lihat Detail</button>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white border rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                <img src="{{ asset('images/room2.jpg') }}" alt="Kamar Standard" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Kamar Standard</h3>
                    <p class="font-bold text-blue-600">Rp 800.000/Bulan</p>
                    <p class="text-sm text-gray-600 mt-1">Kipas Angin, WiFi, Kamar Mandi Luar</p>
                    <button class="mt-3 w-full bg-gray-200 py-2 rounded-lg hover:bg-gray-300 transition">Lihat Detail</button>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white border rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                <img src="{{ asset('images/room3.jpg') }}" alt="Kamar Premium" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold text-lg">Kamar Premium</h3>
                    <p class="font-bold text-blue-600">Rp 1.500.000/Bulan</p>
                    <p class="text-sm text-gray-600 mt-1">AC, WiFi, Kamar Mandi Luar, Balkon</p>
                    <button class="mt-3 w-full bg-gray-200 py-2 rounded-lg hover:bg-gray-300 transition">Lihat Detail</button>
                </div>
            </div>
        </div>

        <div class="text-center mt-10">
            <button class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-300 transition">Lihat Semua
                Kamar</button>
        </div>
    </section>

    {{-- Cara Kerja --}}
    <section class="py-16 bg-gray-100">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6">Cara Kerja Sistem</h2>
            <p class="text-gray-600 mb-10">3 langkah mudah menggunakan KostQu</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-3">1</div>
                    <h3 class="font-semibold mb-2">Daftar/Login</h3>
                    <p class="text-gray-600 text-sm">Buat akun baru atau login untuk mengakses semua fitur yang
                        tersedia.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-3">2</div>
                    <h3 class="font-semibold mb-2">Pilih dan Pesan</h3>
                    <p class="text-gray-600 text-sm">Temukan kamar sesuai kebutuhanmu dan lakukan pemesanan secara
                        online.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-3">3</div>
                    <h3 class="font-semibold mb-2">Bayar dan Konfirmasi</h3>
                    <p class="text-gray-600 text-sm">Lakukan pembayaran dan tunggu konfirmasi dari admin untuk
                        penyelesaian.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-gray-200 py-10 px-6 mt-auto">
        <div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 text-sm">

            <div>
                <h3 class="font-semibold mb-2 text-white">KostQu</h3>
                <p>Sistem informasi pengelolaan kos yang memudahkan penyewa dan pengelola kos dalam menjalankan
                    aktivitas sehari-hari.</p>
            </div>

            <div>
                <h3 class="font-semibold mb-2 text-white">Layanan</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Pencarian Kamar</a></li>
                    <li><a href="#" class="hover:underline">Pemesanan Online</a></li>
                    <li><a href="#" class="hover:underline">Pembayaran</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-2 text-white">Informasi</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:underline">Syarat dan Ketentuan</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-2 text-white">Contact</h3>
                <ul class="space-y-1">
                    <li>📞 +62 21 1234 5678</li>
                    <li>📧 info@kostqu.co.id</li>
                    <li>📍 Lampung, Indonesia</li>
                </ul>
            </div>
        </div>

        <div class="flex items-center justify-between text-gray-400 text-sm mt-8 border-t border-gray-700 pt-4">
            <p>© 2025 KostQu. Semua hak dilindungi.</p>

            <div class="flex space-x-3">
                <a href="#"><x-feathericon-instagram class="w-6 h-6 hover:text-pink-500" /></a>
                <a href="#"><x-si-x class="w-6 h-6 hover:text-gray-200" /></a>
                <a href="#"><x-bi-facebook class="w-6 h-6 hover:text-blue-500" /></a>
            </div>
        </div>
    </footer>

</body>

</html>
