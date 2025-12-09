<footer class="px-6 py-10 mt-auto text-gray-200 bg-gray-800">
    <div class="max-w-6xl mx-auto text-center">

        <!-- GRID SECTION -->
        <div class="grid grid-cols-1 gap-10 text-sm md:grid-cols-4">

            <div>
                <h3 class="mb-2 text-lg font-semibold text-white">KostQu</h3>
                <p class="text-gray-300">
                    Sistem informasi pengelolaan kos yang memudahkan penyewa dan pengelola kos dalam aktivitas sehari-hari.
                </p>
            </div>

            <div>
                <h3 class="mb-2 text-lg font-semibold text-white">Layanan</h3>
                <ul class="space-y-1 text-gray-300">
                    <li>Pencarian Kamar</li>
                    <li>Pemesanan Online</li>
                    <li>Pembayaran</li>
                </ul>
            </div>

            <div>
                <h3 class="mb-2 text-lg font-semibold text-white">Informasi</h3>
                <ul class="space-y-2 text-gray-300">
                    <li>
                        <a href="{{ route('footer.tentang') }}" class="transition hover:text-blue-400">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('footer.privasi') }}" class="transition hover:text-blue-400">
                            Kebijakan Privasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('footer.syarat') }}" class="transition hover:text-blue-400">
                            Syarat dan Ketentuan
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="mb-2 text-lg font-semibold text-white">Contact</h3>
                <ul class="space-y-1 text-gray-300">
                    <li>📞 +62 21 1234 5678</li>
                    <li>📧 info@kostqu.co.id</li>
                    <li>📍 Lampung, Indonesia</li>
                </ul>
            </div>

        </div>

        <!-- COPYRIGHT + SOCIAL -->
        <div class="pt-6 mt-10 text-sm text-gray-400 border-t border-gray-700">
            <p class="mb-3">© 2025 KostQu. Semua hak dilindungi.</p>

            <div class="flex justify-center space-x-4">
                <a href="#"><x-feathericon-instagram class="w-6 h-6 hover:text-pink-500" /></a>
                <a href="#"><x-si-x class="w-6 h-6 hover:text-gray-200" /></a>
                <a href="#"><x-bi-facebook class="w-6 h-6 hover:text-blue-500" /></a>
            </div>
        </div>

    </div>
</footer>
