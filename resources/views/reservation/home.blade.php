@extends('reservation.layout.layout')
@section('content')
    <div class="d-flex justify-content-center flex-column">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif


        <a class="btn btn-success" href="{{route('reservation.create')}}">Enregistrer une réservation</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom et prénom</th>
                <th scope="col">Salle</th>
                <th scope="col">Date de début</th>
                <th scope="col">Reservation période</th>
                <th scope="col">Statut</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <th>{{ $reservation->reservation_id }}</th>
                    <td>{{ $reservation->utilisateur->nom }}  {{$reservation->utilisateur->prenom}}</td>
                    <td>{{ $reservation->salle->salle_nom }}</td>
                    <td>{{ $reservation->date_reservation }}</td>
                    <td>{{$reservation->periode->libelle}}</td>
                    <td>{{ $reservation->statut->libelle }}</td>
                    <td>
                        <div class="d-flex flex-row">
                            @if(Auth::user()->hasRole('Utilisateur'))
                                <a href="{{ route('reservation.show', ['id' => $reservation->reservation_id]) }}" class="btn btn-primary">Consulter</a>
                            @else
                                <a href="{{ route('reservation.edit',[$reservation->reservation_id]) }}" class="btn btn-primary">Modifier</a>
                                <a href="{{ route('reservation.delete',[$reservation->reservation_id]) }}" class="btn btn-danger">Supprimer</a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
