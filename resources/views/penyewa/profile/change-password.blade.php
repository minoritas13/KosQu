@extends('layouts.app')

@section('content')
<div class="max-w-2xl py-10 mx-auto">

    <h1 class="mb-6 text-2xl font-semibold">Ubah Kata Sandi</h1>

    @if(session('error'))
        <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.password.update') }}" class="p-6 bg-white rounded-lg shadow">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Kata Sandi Lama</label>
            <input type="password" name="current_password"
                   class="w-full px-3 py-2 mt-1 border rounded focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Kata Sandi Baru</label>
            <input type="password" name="new_password"
                   class="w-full px-3 py-2 mt-1 border rounded focus:ring-blue-200" required>

            <p class="mt-1 text-sm text-gray-500">
                Minimal 6 karakter, disarankan kombinasi huruf & angka.
            </p>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Konfirmasi Kata Sandi Baru</label>
            <input type="password" name="new_password_confirmation"
                   class="w-full px-3 py-2 mt-1 border rounded focus:ring-blue-200" required>
        </div>

        <button class="px-5 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
            Simpan Kata Sandi
        </button>
    </form>

</div>
@endsection
