<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Tambahkan Tailwind, Bootstrap atau CSS kamu -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        @yield('content')
    </div>

</body>
</html>
