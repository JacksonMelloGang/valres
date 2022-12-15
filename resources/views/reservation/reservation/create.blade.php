@extends('reservation.layout.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modification de la réservation</h3>
        </div>
        <div class="card-body">
            <form action="{{url('/reservation/create')}}" method="POST">
                @csrf



                <input type="hidden" name="id" value="{{$reservation->reservation_id}}">
            </form>
        </div>
    </div>
@endsection
