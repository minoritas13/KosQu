@extends('layouts.admin-app')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Daftar Kamar</h1>

        <a href="{{ route('admin.kamar.create') }}"
           class="px-4 py-2 text-white transition bg-purple-700 rounded-lg shadow-lg hover:bg-purple-800">
           Tambah Kamar
        </a>
    </div>

    <!-- CARD WRAPPER -->
    <div class="p-4 bg-gray-800 border border-gray-700 shadow-lg rounded-xl">

        <table class="w-full text-gray-300 table-auto">
            <thead>
                <tr class="text-gray-200 bg-gray-700">
                    <th class="p-3 text-left">No Kamar</th>
                    <th class="p-3 text-left">Tipe</th>
                    <th class="p-3 text-left">Harga</th>
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($kamars as $kamar)
                <tr class="transition border-b border-gray-700 hover:bg-gray-700/40">
                    <td class="p-3">{{ $kamar->nomor_kamar }}</td>
                    <td class="p-3">{{ $kamar->tipe_kamar }}</td>
                    <td class="p-3">Rp{{ number_format($kamar->harga) }}</td>

                    <td class="p-3 text-center">
                        @if ($kamar->status == 'tersedia')
                            <span class="px-3 py-1 text-sm text-white bg-green-700 rounded-full">
                                Tersedia
                            </span>
                        @elseif ($kamar->status == 'perbaikan')
                            <span class="px-3 py-1 text-sm text-white bg-yellow-700 rounded-full">
                                Perbaikan
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm text-white bg-red-700 rounded-full">
                                Terisi
                            </span>
                        @endif
                    </td>

                    <td class="flex justify-center gap-3 p-3">

                        <a href="{{ route('admin.kamar.edit', $kamar->id) }}"
                           class="px-3 py-1 text-purple-400 rounded-lg hover:text-purple-300">
                           Edit
                        </a>

                        <form action="{{ route('admin.kamar.destroy', $kamar->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus kamar ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 text-red-500 hover:text-red-400">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
