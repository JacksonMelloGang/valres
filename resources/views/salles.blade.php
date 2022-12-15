@extends('reservation.layout.layout')
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
                <h1 class="text-center">Salles</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                    <div class="d-flex align-content-center mb-1">
                        <h3 class="flex-grow-1">Liste des salles</h3>
                        @if(Auth::user()->hasRole('Administrateur'))
                            <a href="{{ route('admin.salle.create') }}" class="btn btn-primary">Ajouter une salle</a>
                        @endif
                        <br>
                    </div>

                <table class="table table-striped mt-2">
                    <!-- Table Headings -->
                    <thead>
                        <th scope="col">Numéro Salle</th>
                        <th scope="col">Nom de Salle</th>
                        <th scope="col">Catégorie de la Salle</th>
                        <th scope="col">Actions</th>
                    </thead>
                    <!-- Table Body -->
                    @foreach($salles as $salle)
                        <tr class="col">
                            <td class="table-text col">
                                <div>{{ $salle->salle_id }}</div>
                            </td>
                            <td class="table-text col">
                                <div>{{ $salle->salle_nom }}</div>
                            </td>
                            <td class="table-text col">
                                <div>{{ $salle->categorie->libelle }}</div>
                            </td>

                            @if(Auth::user() != null && Auth::user()->role->libelle == 'Administrateur')
                                <td class="table-text">
                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" id="dropdownMenuButton1" aria-expanded="false">
                                            Actions<span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('salle.show', ['id' => $salle->salle_id])}}">Consulter</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.salle.edit', ['id' => $salle->salle_id])}}">Modifier</a>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <li>
                                                <form action="{{ url('/admin/salle/delete')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{$salle->salle_id}}" name="salle_id">
                                                    <button class="dropdown-item" href="{{ url('admin/salle/delete', ['id' => $salle->salle_id])}}" type="submit">Supprimer</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('salle.show', ['id' => $salle->salle_id])}}" class="btn btn-primary">Consulter</a>

                                </td>
                                <td>
                                    <a href="{{ route('reservation.create')}}" class="btn btn-success">Réserver</a>
                                </td>
                            @endif

                        </tr>

                    @endforeach
                </table>

            </div>
        </div>
    </div>
@endsection
