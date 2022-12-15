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


                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
