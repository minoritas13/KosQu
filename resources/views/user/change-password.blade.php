@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10 mt-20">

    <h1 class="text-2xl font-semibold mb-6">Ubah Kata Sandi</h1>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.password.update') }}" class="bg-white p-6 rounded-lg shadow">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Kata Sandi Lama</label>
            <input type="password" name="current_password"
                   class="w-full mt-1 px-3 py-2 border rounded focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Kata Sandi Baru</label>
            <input type="password" name="new_password"
                   class="w-full mt-1 px-3 py-2 border rounded" required>

            <p class="text-sm text-gray-500 mt-1">
                Minimal 6 karakter, disarankan kombinasi huruf & angka.
            </p>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Konfirmasi Kata Sandi Baru</label>
            <input type="password" name="new_password_confirmation"
                   class="w-full mt-1 px-3 py-2 border rounded" required>
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
            Simpan Kata Sandi
        </button>
    </form>

</div>
@endsection