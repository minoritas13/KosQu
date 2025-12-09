@extends('layouts.admin-app')

@section('content')
<div class="container mx-auto mt-6">

    <h1 class="mb-6 text-3xl font-bold text-black">Tambah Penyewa</h1>

    <form action="{{ route('admin.penyewa.store') }}"
          method="POST"
          class="p-6 space-y-4 bg-white rounded-lg shadow">

        @csrf

        <div>
            <label class="block mb-1 font-semibold text-black">Nama</label>
            <input type="text" name="name"
                   class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
                   required>
        </div>

        <div>
            <label class="block mb-1 font-semibold text-black">Email</label>
            <input type="email" name="email"
                   class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
                   required>
        </div>

        <div>
            <label class="block mb-1 font-semibold text-black">No HP</label>
            <input type="text" name="no_hp"
                   class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
                   required>
        </div>

        <div>
            <label class="block mb-1 font-semibold text-black">Password</label>
            <input type="password" name="password"
                   class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-yellow-400"
                   required>
        </div>

        <button class="px-5 py-2 font-semibold text-black transition bg-yellow-400 rounded hover:bg-yellow-500">
            Simpan
        </button>
    </form>
</div>
@endsection
