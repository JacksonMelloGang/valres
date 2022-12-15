@extends('admin.layout.layout')
@section('content')

    <div class="row">

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
    </div>

    <div class="row">
        <h3>Utilisateurs possédant le rôle</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Nom d'utilisateur</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a class="text-decoration-none" href="{{route('admin.user.show', $user->utilisateur_id)}}">{{ $user->utilisateur_id }}</a></td>
                    <td><a class="text-decoration-none" href="{{route('admin.user.show', $user->utilisateur_id)}}">{{ $user->nom }}</a></td>
                    <td><a class="text-decoration-none" href="{{route('admin.user.show', $user->utilisateur_id)}}">{{ $user->prenom }}</a></td>
                    <td><a class="text-decoration-none" href="{{route('admin.user.show', $user->utilisateur_id)}}">{{ $user->mail }}</a></td>
                    <td><a class="text-decoration-none" href="{{route('admin.user.show', $user->utilisateur_id)}}">{{ $user->username }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
