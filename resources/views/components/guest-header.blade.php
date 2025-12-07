{{-- Navbar --}}
<nav class="flex items-center justify-between px-8 py-4 shadow-sm bg-gray-200/70 backdrop-blur-md">
    <h1 class="text-xl font-bold text-gray-800">KostQu</h1>
    <div class="space-x-6 font-medium text-gray-700">
        <a href="{{ route('welcome') }}" class="hover:text-blue-600">Beranda</a>
        <a href="#" class="hover:text-blue-600">Pencarian</a>
    </div>
    <div class="flex items-center space-x-4">
        <button> <x-zondicon-notifications class="w-6 h-6" /> </button>
        <button> <x-css-profile class="w-6 h-6" /> </button>
    </div>
</nav>
