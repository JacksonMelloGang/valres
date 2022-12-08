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
                    <div>{{ $user->is_banned }}</div>
                </td>
                <td class="table-text">
                    <div>{{  }}</div>
                </td>
            </tr>


        @endforeach
    </table>

@endsection
