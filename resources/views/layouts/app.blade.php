<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'KostQu')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen bg-gray-100 font-sans">

    {{-- Header --}}
    @include('components.guest-header')

    {{-- Konten Utama --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

</body>
</html>
