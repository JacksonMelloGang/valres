@extends('admin.layout.layout')
@section('content')
{{--
    // display a card with content 'are you sure to delete this role ?' and two button 'yes' and 'no'
--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Delete Role') }}</div>
                    <div class="card-body d-flex justify-content-center align-content-center flex-column flex-wrap">
                        <label class="mb-2">Êtes vous sur de supprimer le rôle "{{$role->libelle}}" ?</label>

                        <form method="post" action="{{ url('/admin/role/delete')}}" class="d-flex justify-content-around align-content-center">
                            @csrf
                            @method('post')
                            <input type="hidden" value="{{$role->id_role}}">
                            <input type="submit" class="btn btn-danger" value="Confirmer">
                            <input type="reset" class="btn btn-secondary" value="Annuler">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
