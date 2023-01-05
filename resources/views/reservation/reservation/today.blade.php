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

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="row d-flex ">
        <h1 class="col-12 text-center">Réservations du jour</h1>
        <x-reservations.timed :reservations="$reservations" />
    </div>

@endsection
