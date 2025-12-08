@extends('layouts.admin-app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="mb-4 text-2xl font-bold">Tambah Penyewa</h1>

    <form action="{{ route('admin.penyewa.store') }}" method="POST" class="p-6 space-y-4 bg-white rounded shadow">
        @csrf

        <div>
            <label>Nama</label>
            <input type="text" name="name" class="w-full p-2 border" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" class="w-full p-2 border" required>
        </div>

        <div>
            <label>No HP</label>
            <input type="text" name="no_hp" class="w-full p-2 border" required>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" class="w-full p-2 border" required>
        </div>

        <button class="px-4 py-2 text-white bg-blue-600 rounded">Simpan</button>
    </form>
</div>
@endsection
