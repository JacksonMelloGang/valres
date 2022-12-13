@extends('admin.layout.layout')
@section('content')

    <h3>Rôle {{$role->libelle}}</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Libelle</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $role->id_role }}</td>
                <td>{{ $role->libelle }}</td>
            </tr>
        </tbody>
    </table>

    <h3>Utilisateurs possédant le rôle</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->utilisateur_id }}</td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
