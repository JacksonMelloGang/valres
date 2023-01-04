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

    <table class="table">
        <thead>
            <tr>
                <th>Heures</th>
                @foreach ($salles as $salle)
                    <th>{{ $salle->salle_nom }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 4; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    @foreach ($salles as $salle)
                        <td>
                            @foreach ($salle->reservations as $reservation)
                                @if ($reservation->periode->id_rsperiode == $i)
                                    <td class="bg-danger">AAAA</td>
                                @else
                                    <td class="bg-success"></td>
                                @endif
                            @endforeach
                        </td>
                    @endforeach
                </tr>
            @endfor
        </tbody>
    </table>

@endsection
