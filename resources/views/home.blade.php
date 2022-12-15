@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body d-flex justify-content-around">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(Auth::user()->role->libelle == 'Administrateur')
                        <div class="card">
                            <div class="card-body">
                                <h1>Administration</h1>
                                <div class="card-body d-flex justify-content-around">
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Accéder</a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <h1>Reservations</h1>
                            <div class="card-body d-flex justify-content-around">
                                <a href="{{ route('reservation.dashboard') }}" class="btn btn-primary">Accéder</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
