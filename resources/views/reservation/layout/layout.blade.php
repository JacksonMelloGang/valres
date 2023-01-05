<!DOCTYPE HTML>
<html>
<head>
    <title>Valres - Reservations</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container-fluid flex-nowrap">
    <div class="row min-vh-100 col-md-12">
        @include('components.reservations.sidebar')

        <div class="col-md-10">
            @include('components.navbar')
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
