@extends('admin.layout.layout')
@section('content')
    <div class="container">
        <div class="">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id_role }}</th>
                                <td>{{ $role->libelle }}</td>
                                <td>

                                    <div class="dropdown">
                                        <button class="btn btn-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('admin_role_edit', ['id' => $role->id_role]) }}">Modifier</a></li>
                                            <li><a class="dropdown-item" href="{{ route('admin_role_delete', ['id' => $role->id_role]) }}">Supprimer</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
