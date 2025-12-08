<div class="w-64 bg-white shadow h-screen fixed top-0 left-0 p-6">

    <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>

    <ul class="space-y-4">
        <li>
            <a href="{{ route('admin.dashboard') }}"
                class="block px-3 py-2 rounded hover:bg-gray-200 
               {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.kamar.index') }}"
                class="block px-3 py-2 rounded hover:bg-gray-200 
               {{ request()->routeIs('admin.kamar.*') ? 'bg-gray-200 font-semibold' : '' }}">
                Kelola Kamar
            </a>
        </li>

        <li>
            <a href="{{ route('admin.penyewa.index') }}"
                class="block px-3 py-2 rounded hover:bg-gray-200 
               {{ request()->routeIs('admin.penyewa.*') ? 'bg-gray-200 font-semibold' : '' }}">
                Kelola Penyewa
            </a>
        </li>

        <li>
            <a href="{{ route('admin.pembayaran') }}"
                class="block px-3 py-2 rounded hover:bg-gray-200 
               {{ request()->routeIs('admin.pembayaran') ? 'bg-gray-200 font-semibold' : '' }}">
                Kelola Pembayaran
            </a>
        </li>

        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="block w-full px-4 py-2 text-left text-gray-700 bg-red-700">
                    Logout
                </button>
            </form>
        </li>
    </ul>

</div>