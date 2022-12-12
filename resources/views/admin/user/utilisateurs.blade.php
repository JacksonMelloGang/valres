@extends('admin.layout.layout')
@section('content')

    <div class="container d-flex justify-content-center flex-column">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex align-content-center">
                <h3 class="card-title flex-grow-1">Liste des utilisateurs</h3>

                <a class="btn btn-primary align-self-end" href="{{route('admin_user_create')}}">Créer un utilisateur</a>
                <br>
            </div>
            <div class="card-body">
                <table class="table">
                    <!-- Table Headings -->
                    <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>

                    <th scope="col">Pseudonyme</th>
                    <th scope="col">Banni</th>

                    <th scope="col">Actions</th>
                    </thead>
                    <!-- Table Body -->
                    @foreach($utilisateurs as $user)
                        <tr class="col">
                            <td class="table-text col">
                                <div>{{ $user->utilisateur_id }}</div>
                            </td>
                            <td class="table-text col">
                                <div>{{ $user->nom }}</div>
                            </td>
                            <td class="table-text col">
                                <div>{{ $user->prenom }}</div>
                            </td>
                            <td class="table-text col">
                                <div>{{ $user->mail }}</div>
                            </td>
                            <td class="table-text col">
                                <div>{{ $user->role()->first()->libelle }}</div>
                            </td>

                            <td class="table-text col">
                                <div>{{ $user->username }}</div>
                            </td>
                            <td class="table-text col">
                                @if($user->is_banned == 1)
                                    <div>Oui</div>
                                @else
                                    <div>Non</div>
                                @endif
                            </td>
                            <td class="table-text">
                                <div class="dropdown">
                                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" id="dropdownMenuButton1" aria-expanded="false">
                                        Actions<span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin_user_edit', ['id' => $user->utilisateur_id])}}">Modifier</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin_user_delete', ['id' => $user->utilisateur_id])}}">Supprimer</a>
                                        </li>
                                        @if($user->is_banned == 1)
                                            <hr class="dropdown-divider">
                                            <li>
                                                <a class="dropdown-item bg-danger" href="{{ route('admin_user_delete', ['id' => $user->utilisateur_id])}}">Débannir</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
