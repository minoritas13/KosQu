@extends('layouts.admin-app')

@section('content')
<h1 class="mb-6 text-3xl font-bold text-black">Tambah Kamar</h1>

<form action="{{ route('admin.kamar.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="p-6 space-y-5 bg-white rounded-lg shadow">

    @csrf

    <div>
        <label class="block mb-1 font-semibold text-black">Nomor Kamar</label>
        <input type="text" name="nomor_kamar"
               class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
               required>
    </div>

    <div>
        <label class="block mb-1 font-semibold text-black">Tipe Kamar</label>
        <input type="text" name="tipe_kamar"
               class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
               required>
    </div>

    <div>
        <label class="block mb-1 font-semibold text-black">Harga</label>
        <input type="number" name="harga"
               class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
               required>
    </div>

    <div>
        <label class="block mb-1 font-semibold text-black">Status</label>
        <select name="status"
                class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
                required>
            <option value="tersedia">Tersedia</option>
            <option value="terisi">Terisi</option>
            <option value="perbaikan">Perbaikan</option>
        </select>
    </div>

    <div>
        <label class="block mb-1 font-semibold text-black">Deskripsi</label>
        <textarea name="deskripsi"
                  class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"></textarea>
    </div>

    <div>
        <label class="block mb-1 font-semibold text-black">Foto Kamar</label>
        <input type="file" name="foto"
               class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
               accept="image/*">
    </div>

    <button class="px-5 py-2 font-semibold text-black transition bg-yellow-400 rounded hover:bg-yellow-500">
        Simpan
    </button>
</form>
@endsection
