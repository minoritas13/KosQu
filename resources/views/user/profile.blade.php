{{-- resources/views/profile/edit.blade.php --}}

@extends('layouts.app')
@section('title', 'Profil Saya')

@section('content')

<div class="min-h-screen bg-blue-50 py-12 px-4">
    <div class="container mx-auto max-w-5xl">

```
    <!-- HEADER PROFIL -->
    <div class="text-center mb-12 mt-20">
        <h1 class="text-5xl font-black text-blue-600 mb-3">Profil Saya</h1>
        <p class="text-blue-700 text-lg">Kelola informasi akun dan foto profil Anda</p>
    </div>

    <!-- CARD PROFIL -->
    <div class="bg-white rounded-2xl shadow-lg border border-blue-100 mt-70 overflow-hidden">

        <!-- HEADER BIRU DAN AVATAR -->
        <div class="h-44 bg-blue-600 relative">
            <div class="absolute left-1/2 -bottom-20 transform -translate-x-1/2">
                <img id="preview"
                     src="{{ Auth::user()->photo 
                         ? asset('storage/profile/' . Auth::user()->photo)
                         : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=2563eb&color=fff&size=300&rounded=true&bold=true' }}"
                     alt="Foto Profil"
                     class="w-36 h-36 rounded-full border-8 border-white shadow-xl object-cover">
            </div>
        </div>

        <!-- ISI CARD -->
        <div class="px-10 pt-24 pb-16">
            <h2 class="text-center text-4xl font-bold text-gray-800 mb-12">
                {{ Auth::user()->name }}
            </h2>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- INFORMASI AKUN -->
                <div class="mb-14">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 border-b-4 border-blue-600 inline-block">Informasi Akun</h3>

                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                   class="w-full px-6 py-4 rounded-2xl border-2 border-blue-200 focus:border-blue-600 focus:ring-4 focus:ring-blue-100 transition"
                                   required>
                            @error('name') <span class="text-red-500 text-sm block mt-2">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Email</label>
                            <input type="email" value="{{ Auth::user()->email }}"
                                   class="w-full px-6 py-4 rounded-2xl bg-blue-50 border-2 border-blue-100 text-gray-600"
                                   disabled>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Foto Profil</label>
                        <input type="file" name="photo" accept="image/jpeg,image/png"
                               class="w-full px-6 py-5 rounded-2xl border-2 border-dashed border-blue-400 bg-blue-50 file:mr-5 file:py-3 file:px-8 file:rounded-xl file:bg-blue-600 file:text-white file:border-0 hover:file:bg-blue-700 cursor-pointer"
                               onchange="previewImage(event)">
                        <p class="text-sm text-blue-600 mt-3">JPG/PNG • Maksimal 2MB</p>
                        @error('photo') <span class="text-red-500 text-sm block mt-2">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- UBAH PASSWORD -->
                <div class="mb-14">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 border-b-4 border-blue-600 inline-block">Ubah Password (Opsional)</h3>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Password Baru</label>
                            <input type="password" name="password"
                                   class="w-full px-6 py-4 rounded-2xl border-2 border-blue-200 focus:border-blue-600 focus:ring-4 focus:ring-blue-100"
                                   placeholder="Kosongkan jika tidak ingin mengubah">
                            @error('password') <span class="text-red-500 text-sm block mt-2">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-3">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                   class="w-full px-6 py-4 rounded-2xl border-2 border-blue-200 focus:border-blue-600 focus:ring-4 focus:ring-blue-100">
                        </div>
                    </div>
                </div>

                <!-- BUTTON SIMPAN -->
                <div class="text-center">
                    <button type="submit" class="bg-blue-600 text-white font-semibold px-10 py-3 rounded-2xl shadow hover:bg-blue-700 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- TERAKHIR DIPERBARUI -->
    <p class="text-center text-blue-600 font-medium mt-10">
        Terakhir diperbarui: {{ Auth::user()->updated_at->format('d F Y, H:i') }}
    </p>
</div>
```

</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => document.getElementById('preview').src = e.target.result;
        reader.readAsDataURL(file);
    }
}
</script>

@endsection
