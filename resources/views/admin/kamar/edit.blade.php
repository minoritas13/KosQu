@extends('layouts.admin-app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Kamar</h1>

<form action="{{ route('admin.kamar.update', $kamar->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block">Nomor Kamar</label>
        <input type="text" name="nomor_kamar" 
               value="{{ $kamar->nomor_kamar }}" 
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Tipe Kamar</label>
        <input type="text" name="tipe_kamar" 
               value="{{ $kamar->tipe_kamar }}" 
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Harga</label>
        <input type="number" name="harga" 
               value="{{ $kamar->harga }}" 
               class="border p-2 w-full" required>
    </div>

    <div>
        <label class="block">Status</label>
        <select name="status" class="border p-2 w-full">
            <option value="tersedia" {{ $kamar->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="terisi" {{ $kamar->status == 'terisi' ? 'selected' : '' }}>Terisi</option>
            <option value="perbaikan" {{ $kamar->status == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
        </select>
    </div>

    <div>
        <label class="block">Deskripsi</label>
        <textarea name="deskripsi" class="border p-2 w-full">{{ $kamar->deskripsi }}</textarea>
    </div>

    <button class="bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
</form>

@endsection
