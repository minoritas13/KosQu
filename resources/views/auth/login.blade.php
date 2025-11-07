<div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg mt-10">
    
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-center mb-4">Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required class="w-full border rounded p-2 mb-3">
        @error('email')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <label>Password</label>
        <input type="password" name="password" required class="w-full border rounded p-2 mb-3">

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Login</button>
    </form>
</div>
