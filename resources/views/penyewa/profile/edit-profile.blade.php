@extends('layouts.app')

@section('content')
<div class="max-w-3xl py-10 mx-auto">

    <h1 class="mb-6 text-2xl font-semibold">Edit Profil</h1>

    @if(session('success'))
        <div class="p-3 mb-4 text-green-800 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-6 bg-white rounded-lg shadow">
        @csrf

        <div class="flex items-center gap-4 mb-6">
            <img src="{{ $user->photo ? asset('storage/profile/'.$user->photo) : 'https://ui-avatars.com/api/?name='.$user->name }}"
                 class="object-cover w-20 h-20 border rounded-full">

            <div>
                <label class="block font-medium">Ganti Foto</label>
                <input type="file" name="photo" class="block w-full mt-1">
            </div>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Nama Lengkap</label>
            <input name="name" value="{{ $user->name }}"
                   class="w-full px-3 py-2 mt-1 border rounded focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Email</label>
            <input value="{{ $user->email }}" disabled
                   class="w-full px-3 py-2 mt-1 bg-gray-100 border rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Nomor HP</label>
            <input name="no_hp" value="{{ $user->no_hp }}"
                   class="w-full px-3 py-2 mt-1 bg-gray-100 border rounded">
        </div>

        <button class="px-5 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>
    </form>

</div>
@endsection
