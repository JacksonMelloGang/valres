@extends('admin.layout')
@section('content')

    <table>
        <!-- Table Headings -->
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Role</th>

            <th>Pseudonyme</th>
            <th>Banni</th>

            <th>Actions</th>
        </thead>

        <!-- Table Body -->
        @foreach($utilisateurs as $user)
            <tr>
                <td class="table-text">
                    <div>{{ $user->utilisateur_id }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $user->nom }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $user->prenom }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $user->mail }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $user->role()->first()->libelle }}</div>
                </td>

                <td class="table-text">
                    <div>{{ $user->username }}</div>
                </td>
                <td class="table-text">
                    @if($user->is_banned == 1)
                        <div>Oui</div>
                    @else
                        <div>Non</div>
                    @endif
                </td>
                <td class="table-text">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/utilisateurs/'.$user->utilisateur_id.'/edit') }}">Modifier</a></li>
                            <li><a href="{{ url('admin/utilisateurs/'.$user->utilisateur_id.'/delete') }}">Supprimer</a></li>
                        </ul>
                    </div>
                </td>
            </tr>


        @endforeach
    </table>

@endsection
