@extends('reservation.layout.layout')
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row d-flex justify-content-center">
        <table class="col-6 table table-striped table-bordered border-warning">
            <tbody>
                <tr>
                    <td>ID</td>
                    <td>{{ $salle->salle_id }}</td>
                </tr>
                <tr>
                    <td>Nom de la salle</td>
                    <td>{{ $salle->salle_nom }}</td>
                </tr>
                <tr>
                    <td>Catégorie de la salle</td>
                    <td>{{ $salle->categorie->libelle }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @if(Auth::user() != null && Auth::user()->role->libelle == 'Administrateur')
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary" href="{{route('admin.salle.edit', $salle->salle_id)}}">Modifier</a>
                <form action="{{url('/admin/salle/delete')}}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{$salle->salle_id}}">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    @endif

    @if(Auth::user() != null)
        @if(count($reservations) > 0 )
            <div class="row">
                <h3>Reservations</h3>
                <table>
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Date de début</th>
                        <th>Durée</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td><a href='{{url('admin/user/' . $reservation->utilisateur->utilisateur_id )}}'>{{$reservation->utilisateur->nom}} {{$reservation->utilisateur->prenom}}</a></td>
                            <td>{{ $reservation->date_reservation }}</td>
                            <td>{{ $reservation->periode->libelle }}</td>

                            <td>
                                <a href="{{ route('reservation.show', ['id' => $reservation->reservation_id]) }}" class="btn btn-primary">Consulter</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="row mt-2">
                <h3>Réservations</h3>
                Aucune réservation pour cette salle
            </div>
        @endif
    @endif

@endsection
