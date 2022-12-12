@extends('reservation.layout.layout')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date de début</th>
            <th scope="col">Date de fin</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <th scope="row">{{ $reservation->id }}</th>
                <td>{{ $reservation->date_debut }}</td>
                <td>{{ $reservation->date_fin }}</td>
                <td>
                    <a href="{{ route('admin_reservations_edit', $reservation->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin_reservations_delete', $reservation->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>

@endsection
