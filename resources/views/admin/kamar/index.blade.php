<h1 class="text-2xl font-bold">Daftar Kamar</h1>

<a href="{{ route('admin.kamar.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
    Tambah Kamar
</a>

<table class="w-full mt-4 border">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2">No Kamar</th>
            <th class="p-2">Tipe</th>
            <th class="p-2">Harga</th>
            <th class="p-2">Status</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($kamars as $kamar)
        <tr class="border">
            <td class="p-2">{{ $kamar->nomor_kamar }}</td>
            <td class="p-2">{{ $kamar->tipe_kamar }}</td>
            <td class="p-2">Rp{{ number_format($kamar->harga) }}</td>
            <td class="p-2">{{ ucfirst($kamar->status) }}</td>
            <td class="p-2 flex gap-2">
                <a href="{{ route('admin.kamar.edit', $kamar->id) }}" class="bg-yellow-500 px-3 py-1 rounded text-white">Edit</a>

                <form action="{{ route('admin.kamar.destroy', $kamar->id) }}" method="POST" onsubmit="return confirm('Yakin?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 px-3 py-1 rounded text-white">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
