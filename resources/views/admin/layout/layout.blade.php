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
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark col-md-2 sticky-top" style="">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">{{config('app.name', 'Laravel')}}</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="{{route('admin.dashboard')}}" class="nav-link text-white {{request()->routeIs('admin.dashboard') ? 'active' : ''}}">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                            Menu Admininistrateur
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.users')}}" class="nav-link text-white {{request()->routeIs('admin.users') ? 'active' : ''}}">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                            Utilisateurs
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.roles')}}" class="nav-link text-white {{request()->routeIs('admin.roles') ? 'active' : ''}}">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                            Rôles
                        </a>
                    </li>

                    <li>
                        <a href="{{route('salles.show')}}" class="nav-link text-white {{request()->routeIs('salles.show') ? 'active' : ''}}">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                            Salles
                        </a>
                    </li>


                    <hr>

                    <li>
                        <a href="{{route('reservation.dashboard')}}" class="nav-link text-white ">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                            Section Reservation
                        </a>
                    </li>
                </ul>
            </div>

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
