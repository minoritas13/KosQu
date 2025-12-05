@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 mt-20">

    <h1 class="text-2xl font-semibold mb-6">Edit Profil</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf

        <div class="flex items-center gap-4 mb-6">
            <img src="{{ $user->photo ? asset('storage/profile/'.$user->photo) : 'https://ui-avatars.com/api/?name='.$user->name }}" 
                 class="w-20 h-20 rounded-full object-cover border">

            <div>
                <label class="block font-medium">Ganti Foto</label>
                <input type="file" name="photo" class="mt-1 block w-full">
            </div>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Nama Lengkap</label>
            <input name="name" value="{{ $user->name }}"
                   class="w-full mt-1 px-3 py-2 border rounded focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Email</label>
            <input value="{{ $user->email }}" disabled
                   class="w-full mt-1 px-3 py-2 bg-gray-100 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Nomor HP</label>
            <input name="no_hp" value="{{ $user->no_hp }}" 
                   class="w-full mt-1 px-3 py-2 bg-gray-100 border rounded">
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>

</div>
@endsection
