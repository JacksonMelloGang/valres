@extends('reservation.layout.layout')
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row d-flex ">
        @if(Route::currentRouteName() == 'reservation.today')
            <h1 class="col-12 text-center">Réservations du jour</h1>
            <x-reservations.timed :reservations="$reservations" />
        @else
            <h1 class="col-12 text-center">Gestion des réservations</h1>
            <x-reservations.table :reservations="$reservations" />
        @endif
    </div>

@endsection
