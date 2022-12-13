@extends('admin.layout.layout')
@section('content')
    <div class="container d-flex justify-content-center mt-5 ">

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
                    <td>{{ $role->id_role }}</td>
                    <td>{{ $role->libelle }}</td>
                    <td><a href="{{route('admin_role_show', ['id' => $role->id_role])}}" class="btn btn-warning">Consulter</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
