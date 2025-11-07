<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-700">Form Registrasi</h2>

        <!-- Alert Error -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-600 rounded">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Alert Success -->
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama Lengkap -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                    placeholder="Masukkan nama lengkap Anda" required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                    placeholder="contoh@email.com" required>
            </div>

            <!-- Nomor HP -->
            <div>
                <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                    class="mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                    placeholder="081234567890" required>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password" id="password" name="password"
                    class="mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                    placeholder="Minimal 8 karakter, 1 huruf besar, 1 angka, dan 1 simbol" required>
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200"
                    placeholder="Ulangi kata sandi" required>
            </div>

            <!-- Tombol Daftar -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition">
                    Daftar Sekarang
                </button>
            </div>

            <!-- Sudah punya akun -->
            <div class="text-center text-sm text-gray-600 mt-3">
                Sudah punya akun?
                <a href="{{ route('login.form') }}" class="text-blue-600 hover:underline">Login di sini</a>
            </div>
        </form>
    </div>

</body>
</html>
