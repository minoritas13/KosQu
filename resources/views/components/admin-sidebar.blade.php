<div class="fixed top-0 left-0 w-64 h-screen p-6 bg-gray-900 border-r border-gray-800 shadow-xl">

    <!-- HEADER -->
    <h2 class="flex items-center gap-3 mb-10 text-2xl font-bold text-white">

        <svg class="text-blue-500 w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 6v6h4m6 6v2H2v-2m20 0a10 10 0 10-20 0" />
        </svg>

        Admin Panel
    </h2>

    <!-- MENU LIST -->
    <ul class="space-y-3">

        {{-- Dashboard --}}
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('admin.dashboard')
                    ? 'bg-blue-700 text-white shadow-lg'
                    : 'text-gray-300 hover:bg-gray-700/50' }}">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7m-9 9V9m0 0l2 2m-2-2l-2 2" />
                </svg>

                Dashboard
            </a>
        </li>

        {{-- Kelola Kamar --}}
        <li>
            <a href="{{ route('admin.kamar.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('admin.kamar.*')
                    ? 'bg-blue-700 text-white shadow-lg'
                    : 'text-gray-300 hover:bg-gray-700/50' }}">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7h18M3 12h18M3 17h18" />
                </svg>

                Kelola Kamar
            </a>
        </li>

        {{-- Kelola Penyewa --}}
        <li>
            <a href="{{ route('admin.penyewa.index') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('admin.penyewa.*')
                    ? 'bg-blue-700 text-white shadow-lg'
                    : 'text-white hover:bg-gray-700/50' }}">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m3-6a4 4 0 110-8 4 4 0 010 8z" />
                </svg>

                Kelola Penyewa
            </a>
        </li>

        {{-- Kelola Pembayaran --}}
        <li>
            <a href="{{ route('admin.pembayaran') }}"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ request()->routeIs('admin.pembayaran')
                    ? 'bg-blue-700 text-white shadow-lg'
                    : 'text-gray-300 hover:bg-gray-700/50' }}">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8c1.657 0 3 1.343 3 3v4H9v-4c0-1.657 1.343-3 3-3z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5 20h14" />
                </svg>

                Kelola Pembayaran
            </a>
        </li>

        {{-- Logout --}}
        <li class="pt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                    class="flex items-center w-full gap-3 px-3 py-2 text-white transition bg-red-700 rounded-lg hover:bg-red-800">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m4-7V7a2 2 0 10-4 0v1" />
                    </svg>

                    Logout
                </button>
            </form>
        </li>

    </ul>
</div>
