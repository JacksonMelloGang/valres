<!DOCTYPE HTML>
<html>
<head>
    <title>Valres - Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark col-md-2 sticky-top" style="width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">{{config('app.name', 'Laravel')}}</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link active" aria-current="page">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin_dashboard')}}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                            Admin Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin_roles')}}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                            Rôles
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin_users')}}" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                            Utilisateurs
                        </a>
                    </li>
                </ul>
            </div>

{{--            <div class="col-md-2 sticky-top">
                <div class="sidebar">
                    <div class="sidebar-header">
                        <h3>Valres</h3>
                    </div>
                    <ul class="list-unstyled components">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                        </li>

                    </ul>
                </div>
            </div>--}}
            <div class="col-md-10">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
