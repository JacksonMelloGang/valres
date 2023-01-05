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

       <div class="row mt-2">
           <h3 class="">Vos 5 dernières réservations</h3>
           <div class="d-flex col-12 text-center justify-content-between">
               @if($user_reservations->count() == 0)
                   <p class="col-12">Vous n'avez aucune réservation</p>
                @else
                   @foreach($user_reservations as $reservation)
                       <div class="card bg-warning">
                           <div class="card-header">
                               <h5>Réservation du {{substr($reservation->date_reservation, 0, 10)}}</h5>
                           </div>
                           <div class="card-body">
                               <p>Periode : {{$reservation->periode->libelle}}</p>
                               <p>Salle : {{$reservation->salle->salle_nom}}</p>
                               <p>État : {{$reservation->statut->libelle}}</p>
                           </div>
                       </div>
                   @endforeach
               @endif
           </div>
       </div>


        @if(Auth::user()->isAdministrateur() || Auth::user()->isSecretaire())
                <div class="card mt-5">
                    <div class="card-header">
                        <h5>Liste des réservations</h5>
                    </div>
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
        @endif
    </div>
@endsection
