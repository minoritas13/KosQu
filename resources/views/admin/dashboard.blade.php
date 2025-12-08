@extends('layouts.app')

@section('content')
<body class="bg-gray-100">

    <div class="p-5">
        <h1 class="text-3xl font-bold">Dashboard Admin</h1>
        <p class="mt-2 text-gray-600">Selamat datang, {{ auth()->user()->name }}</p>

        <div class="grid grid-cols-3 gap-6 mt-6">
            <a href="{{ route('admin.kamar.index') }}" class="p-5 bg-white rounded shadow">
                <h2 class="text-xl font-semibold">Kelola Kamar</h2>
            </a>

            <a href="{{ route('admin.penyewa.index') }}" class="p-5 bg-white rounded shadow">
                <h2 class="text-xl font-semibold">Kelola Penyewa</h2>
            </a>

            <a href="{{ route('admin.pembayaran') }}" class="p-5 bg-white shadow rounded">
                <h2 class="text-xl font-semibold">Kelola Pembayaran</h2>
            </a>


            <a class="p-5 bg-white shadow rounded">
                <h2 class="text-xl font-semibold">Laporan</h2>
            </a>
        </div>
    </div>

</body>
@endsection
