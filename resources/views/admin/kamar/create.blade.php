@extends('layouts.admin-app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Kamar</h1>

<form action="{{ route('admin.kamar.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block">Nomor Kamar</label>
        <input type="text" name="nomor_kamar" class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Tipe Kamar</label>
        <input type="text" name="tipe_kamar" class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Harga</label>
        <input type="number" name="harga" class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Status</label>
        <select name="status" class="border p-2 w-full" required>
            <option value="tersedia">Tersedia</option>
            <option value="terisi">Terisi</option>
            <option value="perbaikan">Perbaikan</option>
        </select>
    </div>

    <div>
        <label class="block">Deskripsi</label>
        <textarea name="deskripsi" class="border p-2 w-full"></textarea>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

@endsection
