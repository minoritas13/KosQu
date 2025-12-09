<nav class="fixed top-0 left-0 right-0 z-50 shadow-sm bg-white/70 backdrop-blur-lg">
    <div class="flex items-center justify-between px-8 py-4 mx-auto max-w-7xl">

        <!-- Logo -->
        <h1 class="text-2xl font-extrabold tracking-wide text-gray-800">
            Kost<span class="text-blue-600">Qu</span>
        </h1>

        <!-- Menu -->
        <div class="flex items-center space-x-6 font-medium text-gray-700">

            <a href="{{ route('welcome') }}"
               class="transition duration-200 hover:text-blue-600">
                Beranda
            </a>

            <a href="{{ route('register') }}"
               class="px-4 py-1.5 rounded-full bg-black text-white hover:bg-blue-700 transition shadow-sm">
                Daftar
            </a>

        </div>
    </div>
</nav>

<div class="h-[60px]"></div>
