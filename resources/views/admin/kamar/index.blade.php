@extends('layouts.app')

@section('content')
<div class="p-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Kamar</h1>

        <a href="{{ route('admin.kamar.create') }}"
            class="px-4 py-2 text-white transition bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
            + Tambah Kamar
        </a>
    </div>

    <!-- CARD WRAPPER -->
    <div class="p-4 bg-white rounded-lg shadow-md">

        <table class="w-full border-collapse table-auto">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-3 font-semibold text-left text-gray-700">No Kamar</th>
                    <th class="p-3 font-semibold text-left text-gray-700">Tipe</th>
                    <th class="p-3 font-semibold text-left text-gray-700">Harga</th>
                    <th class="p-3 font-semibold text-center">Status</th>
                    <th class="p-3 font-semibold text-center text-gray-700">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($kamars as $kamar)
                <tr class="transition border-b hover:bg-gray-50">
                    <td class="p-3">{{ $kamar->nomor_kamar }}</td>
                    <td class="p-3">{{ $kamar->tipe_kamar }}</td>
                    <td class="p-3">Rp{{ number_format($kamar->harga) }}</td>

                    <td class="p-3 text-center">
                        @if ($kamar->status == 'tersedia')
                            <span class="px-3 py-1 text-sm text-green-700 bg-green-100 rounded-full">
                                Tersedia
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm text-red-700 bg-red-100 rounded-full">
                                Terisi
                            </span>
                        @endif
                    </td>

                    <td class="flex justify-center gap-3 p-3">

                        <!-- Edit -->
                        <a href="{{ route('admin.kamar.edit', $kamar->id) }}"
                            class="px-3 py-1 text-white bg-yellow-500 rounded shadow hover:bg-yellow-600">
                            Edit
                        </a>

                        <!-- Hapus -->
                        <form action="{{ route('admin.kamar.destroy', $kamar->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus kamar ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 text-white bg-red-600 rounded shadow hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if($kamars->count() == 0)
                <tr>
                    <td colspan="5" class="p-4 text-center text-gray-500">
                        Tidak ada data kamar.
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

    </div>

</div>
@endsection
