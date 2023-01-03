@extends('reservation.layout.layout')
@section('content')

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

    <table class="table table-striped table-secondary">
        <thead>
                <th scope="col"></th>
            @foreach($salles as $salle)
                <th scope="col">{{$salle->salle_nom}}</th>
            @endforeach
        </thead>
        <tbody>
        @php($heure = ['8h00', '9h00', '10h00', '11h00', '12h00', '13h00', '14h00', '15h00', '16h00', '17h00', '18h00', '19h00', '20h00', '21h00', '22h00', '23h00'])
        @foreach($heure as $h)
                <tr>
                    <th scope="row">{{$h}}</th>
                    @foreach($salles as $salle)
                        <td>
                            @foreach($reservations as $reservation)
                                @if($reservation->salle_id == $salle->salle_id && $reservation->date_reservation == $date)
                                    @php($i = 0)
                                    @while($i < 25)
                                        @switch($reservation->reservation_periode)

                                                @case(1)
                                                    @if($i >= 8 && $i < 12)
                                                        <div class="bg-danger">
                                                            <a href="" class="alert-link">Occupé</a>
                                                        </div>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                @break
                                                @case(2)
                                                    @if($i >= 8 && $i < 12)
                                                        <div class="bg-danger">
                                                            <a href="" class="alert-link">Occupé</a>
                                                        </div>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                @break
                                                @case(3)
                                                    @if($i >= 8 && $i < 12)
                                                        <div class="bg-danger">
                                                            <a href="" class="alert-link">Occupé</a>
                                                        </div>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                @break
                                            @endswitch

                        </td>
                </tr>
        </tbody>
    </table>
@endsection
