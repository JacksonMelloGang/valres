@extends('admin.layout.layout')
@section('content')
    <div class="container">

        <div class="card">
            <div class="card-header">{{ __('Edit Role') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ url('/admin/role/edit')}}">
                    @csrf
                    <div class="form-group">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $role->libelle }}">

                        @error('libelle')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input class="btn btn-danger m-1" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
