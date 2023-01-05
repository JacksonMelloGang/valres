<!DOCTYPE HTML>
<html>
<head>
    <title>Valres - Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid flex-nowrap">
        <div class="row min-vh-100 ">
            @include('components.admin.sidebar')

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
