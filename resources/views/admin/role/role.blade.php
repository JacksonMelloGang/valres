@extends('admin.layout.layout')
@section('content')
    // table with bootstrap, with a button to edit the role or delete it below the table
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Libelle</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->libelle }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    <a href="{{ route('admin_roles_edit', $role->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin_roles_delete', $role->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>

@endsection
