@extends('layouts.admin-app')

@section('content')
<div class="m-6">

    <div class="flex justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-700">Daftar Penyewa</h1>
        <a href="{{ route('admin.penyewa.create') }}"
           class="px-4 py-2 text-white bg-purple-700 rounded-lg shadow-lg hover:bg-purple-800">
           Tambah Penyewa
        </a>
    </div>

    <table class="min-w-full overflow-hidden text-gray-300 bg-gray-800 border border-gray-700 shadow-lg rounded-xl">
        <thead class="text-gray-100 bg-gray-700">
            <tr>
                <th class="px-4 py-3 border-b border-gray-700">Nama</th>
                <th class="px-4 py-3 border-b border-gray-700">Email</th>
                <th class="px-4 py-3 border-b border-gray-700">No HP</th>
                <th class="px-4 py-3 border-b border-gray-700">Email Verified</th>
                <th class="px-4 py-3 border-b border-gray-700">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($penyewa as $item)
                <tr class="hover:bg-gray-700/40">
                    <td class="px-4 py-3 border-b border-gray-700">{{ $item->name }}</td>
                    <td class="px-4 py-3 border-b border-gray-700">{{ $item->email }}</td>
                    <td class="px-4 py-3 border-b border-gray-700">{{ $item->no_hp }}</td>
                    <td class="px-4 py-3 border-b border-gray-700">
                        {{ $item->email_verified_at ? \Carbon\Carbon::parse($item->email_verified_at)->format('d-m-Y') : '-' }}
                    </td>

                    <td class="flex gap-3 px-4 py-3 border-b border-gray-700">
                        <a href="{{ route('admin.penyewa.edit', $item->id) }}"
                           class="text-purple-400 hover:text-purple-300">
                           Edit
                        </a>

                        <form method="POST" action="{{ route('admin.penyewa.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus penyewa ini?')"
                                class="text-red-500 hover:text-red-400">
                                Hapus
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
