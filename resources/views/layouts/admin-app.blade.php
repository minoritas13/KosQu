<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KostQu')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen font-sans bg-gray-100">

    {{-- SIDEBAR --}}
    @auth
        @if(auth()->user()->role === 'admin')
            @include('components.admin-sidebar')
        @endif
    @endauth

    {{-- KONTEN --}}
    <main class="flex-grow ml-64 p-8">
        @yield('content')
    </main>

</body>

</html>
