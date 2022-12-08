<!DOCTYPE HTML>
<html>
<head>
    <title>Valres - Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
