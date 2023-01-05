@extends('admin.layout.layout')
@section('content')

    <div class="container d-flex justify-content-center flex-column">
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
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Utilisateurs</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                    <div class="d-flex align-content-center mb-1">
                        <h3 class="flex-grow-1">Liste des utilisateurs</h3>
                        <a class="btn btn-primary align-self-end" href="{{route('admin.user.create')}}">Créer un utilisateur</a>
                        <br>
                    </div>

                <table class="table table-striped table-secondary mt-2">
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
                            @if($user->utilisateur_id != Auth::user()->utilisateur_id)
                                <td class="table-text">
                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" id="dropdownMenuButton1" aria-expanded="false">
                                            Actions<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.user.show', ['id' => $user->utilisateur_id])}}">Consulter</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.user.edit', ['id' => $user->utilisateur_id])}}">Modifier</a>
                                            </li>
                                            @if($user->is_banned == 1)
                                                <hr class="dropdown-divider">
                                                <li>
                                                    <form method="POST" action="{{url('/admin/user/unban')}}">
                                                        @csrf
                                                        <input type="hidden" value="{{$user->utilisateur_id}}" name="id">
                                                        <button type="submit" class="dropdown-item">Débannir</button>
                                                    </form>
                                                </li>
                                            @else
                                                <hr class="dropdown-divider">
                                                <li>
                                                    <form method="POST" action="{{url('/admin/user/ban')}}">
                                                        @csrf
                                                        <input type="hidden" value="{{$user->utilisateur_id}}" name="id">
                                                        <button type="submit" class="dropdown-item">Bannir</button>
                                                    </form>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            @else
                                <td></td>
                            @endif

                        </tr>

                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
