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
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark col-md-2 sticky-top">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">{{config('app.name', 'Laravel')}}</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{request()->routeIs('home') ? 'active' : ''}} text-white" aria-current="page">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        Accueil
                    </a>
                </li>
                @auth
                    <li>
                        <a href="{{route('salles.show')}}" class="nav-link {{request()->routeIs('salles.show') ? 'active' : ''}} text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                            Salles
                        </a>
                    </li>

                    <li>
                        <a href="{{route('reservation.today')}}" class="nav-link {{request()->routeIs('reservation.today') ? 'active' : ''}} text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                            Réservations du jour
                        </a>
                    </li>
                    @if(Auth::user()->role->id_role == 3 || auth::user()->role->id_role == 1)
                        <li>
                            <a href="{{route('reservation.manage')}}" class="nav-link {{request()->routeIs('reservation.manage') ? 'active' : ''}} text-white">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#calendar3"></use></svg>
                                Gérer les Réservations
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->role->id_role == 1)
                        <hr>
                        <li>
                            <a href="{{route('admin.dashboard')}}" class="nav-link {{request()->routeIs('admin.dashboard') ? 'active' : ''}} text-white">
                                <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                                Section Administration
                            </a>
                        </li
                    @endif
                @endauth
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
