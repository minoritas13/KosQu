<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KostQu | Beranda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    {{-- HEADER --}}
    @include('components.user-header')

    {{-- HERO SECTION --}}
    <section class="relative h-[80vh] bg-cover bg-center flex items-center mt -1"
        style="background-image: url('{{ asset('images/bg-login.jpg') }}');">
        <div class="bg-white/80 rounded-xl px-8 py-16 mx-8 shadow-lg max-w-lg">
            <h1 class="text-4xl font-bold mb-4">Temukan Kost Impianmu</h1>
            <p class="mb-6 text-gray-700">Pilih kamar sesuai kebutuhan dan kenyamananmu dengan sistem pemesanan modern.</p>
            <a href="#kamar" class="bg-blue-600 text-white px-8 py-3 rounded-full shadow hover:bg-[#5a4cc2] transition"> Cari Kamar Sekarang </a>
        </div>
    </section>

    {{-- DAFTAR KAMAR --}}
    <section id="daftar-kamar" class="py-16 px-6 bg-white">
        <h2 class="text-2xl font-bold text-center mb-10">Daftar Kamar Tersedia</h2>

        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse($kamar as $item)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                <img src="{{ $item->foto ? asset('storage/'.$item->foto) : asset('images/default-room.jpg') }}"
                     class="w-full h-48 object-cover">

                <div class="p-4">
                    <h3 class="font-semibold text-lg">
                        Kamar {{ $item->nomor_kamar }} - {{ $item->tipe_kamar }}
                    </h3>

                    <p class="font-bold text-blue-600 mt-1">
                        Rp {{ number_format($item->harga,0,',','.') }}/Bulan
                    </p>

                    <p class="text-sm text-gray-600 mt-2">
                        {{ $item->deskripsi ?? 'Tidak ada deskripsi' }}
                    </p>

                    <span class="inline-block mt-2 px-3 py-1 text-xs rounded-full
                        {{ $item->status == 'tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ ucfirst($item->status) }}
                    </span>

                    @if($item->status == 'tersedia')
                        <a href="{{ route('kamar.pesan', $item->id) }}"
                           class="block text-center mt-4 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                            Pesan Sekarang
                        </a>
                    @else
                        <button disabled
                           class="block w-full mt-4 bg-gray-300 text-gray-600 py-2 rounded-lg cursor-not-allowed">
                            Tidak Tersedia
                        </button>
                    @endif
                </div>
            </div>
            @empty
                <p class="text-center col-span-3 text-gray-500">
                    Belum ada kamar tersedia.
                </p>
            @endforelse
        </div>
    </section>

    
<!-- CARA KERJA -->
<section class="py-16 bg-[#f2f2f2]">
    <h2 class="text-center text-2xl font-bold">Cara Kerja Sistem</h2>
    <p class="text-center text-sm mb-10">3 langkah mudah menggunakan KostQu</p>

    <div class="max-w-5xl mx-auto grid md:grid-cols-3 text-center gap-10">
        <div>
            <div class="w-20 h-20 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">1</div>
            <h4 class="mt-4 font-semibold">Daftar / Login</h4>
            <p class="text-sm">Masuk ke akun untuk mulai memesan kamar</p>
        </div>

        <div>
            <div class="w-20 h-20 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">2</div>
            <h4 class="mt-4 font-semibold">Pilih Kamar</h4>
            <p class="text-sm">Tentukan kamar sesuai kebutuhanmu</p>
        </div>

        <div>
            <div class="w-20 h-20 mx-auto bg-blue-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">3</div>
            <h4 class="mt-4 font-semibold">Bayar & Konfirmasi</h4>
            <p class="text-sm">Lakukan pembayaran dan tunggu persetujuan</p>
        </div>
    </div>
</section>

    {{-- FOOTER --}}
    @include('components.footer')

</body>
</html>