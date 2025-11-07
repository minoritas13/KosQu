<!DOCTYPE html>
<html>

<head>
    <title>Sistem Kos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<body class="bg-gray-100 font-sans">

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
            {{ session('warning') }}
        </div>
    @endif

    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
            Logout
        </button>
    </form>


    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">🏠 Daftar Kamar Tersedia</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($kamar as $k)
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <h2 class="text-xl font-semibold">{{ $k->tipe_kamar }}</h2>
                    <p class="text-gray-700">Nomor: {{ $k->nomor_kamar }}</p>
                    <p class="text-gray-700">Harga: Rp {{ number_format($k->harga, 0, ',', '.') }}</p>
                    <p class="text-gray-500 mt-2">{{ $k->deskripsi }}</p>
                </div>
            @endforeach
        </div>

        <h2 class="text-2xl font-bold mt-10 mb-4 text-center">📅 Booking Terbaru</h2>
        <table class="min-w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Penyewa</th>
                    <th class="py-3 px-6 text-left">Kamar</th>
                    <th class="py-3 px-6 text-left">Tanggal Mulai</th>
                    <th class="py-3 px-6 text-left">Tanggal Selesai</th>
                    <th class="py-3 px-6 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($booking as $b)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $b->user->name ?? '-' }}</td>
                        <td class="py-3 px-6">{{ $b->kamar->nomor_kamar ?? '-' }}</td>
                        <td class="py-3 px-6">{{ $b->tggl_mulai }}</td>
                        <td class="py-3 px-6">{{ $b->tggl_selesai }}</td>
                        <td class="py-3 px-6">
                            <span
                                class="px-3 py-1 rounded-full text-white
                                {{ $b->status == 'disetujui' ? 'bg-green-500' : ($b->status == 'dibatalkan' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                {{ ucfirst($b->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
