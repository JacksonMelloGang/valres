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

    <table>
        <thead>
            @foreach($salles as $salle)
                <th scope="col">{{$salle->salle_nom}}</th>
            @endforeach
        </thead>
        <tbody>
            @php($time = 8)
            @foreach($salles as $salle)
                <tr>
                    @while($time != 24)
                            <td>
                                {{-- Pour chaque réservation, si elle concerne la salle et la date de réservation, créer une ligne  --}}
                                @foreach($reservations as $reservation)
                                    @if($reservation->salle_id == $salle->salle_id)

                                    @endif
                                @endforeach
                            </td>
                        @php($time++)
                    @endwhile
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
