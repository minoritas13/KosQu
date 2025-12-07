<div class="h-20"></div>

<nav class="fixed top-0 left-0 w-full flex items-center justify-between
    px-8 py-4 shadow-sm bg-gray-200/70 backdrop-blur-md z-[1000]">

    <h1 class="text-xl font-bold text-gray-800">KostQu</h1>

    <div class="space-x-6 font-medium text-gray-700">
        <a href="{{ route('penyewa.dashboard') }}" class="transition hover:text-[#6a5acd]">Beranda</a>

        <a href="{{ route('pencarian') }}" class="hover:text-[#6a5acd] transition">
            Pencarian
        </a>

        <a href="{{ route('penyewa.riwayat.pembayaran') }}" class="hover:text-[#6a5acd] transition">
            Pembayaran
        </a>
    </div>

    <div class="flex items-center space-x-4">
        {{-- Notifikasi --}}
        <button>
            <x-zondicon-notifications class="w-6 h-6" />
        </button>

        {{-- PROFILE DROPDOWN --}}
        @auth
        <div class="relative">
            <button id="profileBtn">
                <img
                    src="{{ Auth::user()->photo
                        ? asset('storage/profile/' . Auth::user()->photo)
                        : 'https://ui-avatars.com/api/?background=6a5acd&color=fff&name=' . Auth::user()->name }}"
                    class="object-cover w-10 h-10 border border-gray-300 rounded-full cursor-pointer"
                />
            </button>

            {{-- DROPDOWN MENU --}}
            <div id="profileDropdown"
                 class="hidden absolute right-0 bg-white border border-gray-200 rounded-lg shadow-lg mt-3 w-40 py-2 z-[9999]">

                <a href="{{ route('profile') }}"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Profil Saya
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="block w-full px-4 py-2 text-left text-gray-700 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
        @endauth

    </div>
</nav>

<script>
    const btn = document.getElementById('profileBtn');
    const dropdown = document.getElementById('profileDropdown');

    btn.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
        if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
