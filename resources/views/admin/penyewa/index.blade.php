@extends('layouts.app')

@section('content')
<div class="container m-6 mx-auto">

    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-bold">Daftar Penyewa</h1>
        <a href="{{ route('admin.penyewa.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded">Tambah Penyewa</a>
    </div>

    <table class="min-w-full bg-white shadow">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 border-b">Nama</th>
                <th class="px-4 py-3 border-b">Email</th>
                <th class="px-4 py-3 border-b">No HP</th>
                <th class="px-4 py-3 border-b">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($penyewa as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 border-b">{{ $item->name }}</td>
                    <td class="px-4 py-3 border-b">{{ $item->email }}</td>
                    <td class="px-4 py-3 border-b">{{ $item->no_hp }}</td>
                    <td class="flex gap-2 px-4 py-3 border-b">

                        <a href="{{ route('admin.penyewa.edit', $item->id) }}" class="text-green-600">Edit</a>

                        <form method="POST" action="{{ route('admin.penyewa.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus penyewa ini?')" class="text-red-600">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
