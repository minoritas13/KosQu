@extends('layouts.admin-app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="mb-4 text-2xl font-bold">Edit Penyewa</h1>

    <form action="{{ route('admin.penyewa.update', $penyewa->id) }}" method="POST" class="p-6 space-y-4 bg-white rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label>Nama</label>
            <input type="text" name="name" value="{{ $penyewa->name }}" class="w-full p-2 border" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ $penyewa->email }}" class="w-full p-2 border" required>
        </div>

        <div>
            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $penyewa->no_hp }}" class="w-full p-2 border" required>
        </div>

        <button class="px-4 py-2 text-white bg-blue-600 rounded">Update</button>
    </form>
</div>
@endsection
