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

    <div class="card col-12">
        <div class="card-header text-center">
            <h3>Tableau des réservations</h3>
        </div>
        <div class="card-body text-center d-flex flex-row justify-content-center">
            <a class="btn btn-primary" href="/reservations?datevalue=1&date={{substr($date, 0, 10)}}"> < </a>


            <form action="/reservations" method="GET" class="mx-2">
                <input type="date" name="date" min="{{date('Y-m-d')}}" value="{{$date}}" pattern="\d{4}-\d{2}-\d{2}">
                @csrf
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>

            <a class="btn btn-primary" href="/reservations?datevalue=1&date={{substr($date, 0, 10)}}"> > </a>

            <div class="ms-5">
                <a class="btn btn-primary" href="{{route('reservation.create')}}">Créer une réservation</a>
            </div>
        </div>
    </div>

    <table class="table table-striped table-secondary">
        <thead>
        <tr>
            <th>Heures</th>
            @foreach ($salles as $salle)
                <th>{{ $salle->salle_nom }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach ($periodes as $periode => $heures)
            <tr>
                <td>{{ $heures }}</td>
                {{--
                    Okay so for each salle, we're gonna get all reservations and while we don't check every reservations registered,
                    we're gonna check if the reservation is in the current hour and if it's in the current hour, we're gonna check if the reservation is in the current salle,
                    as well as it's state is "accepted" or "pending" (because we don't want to display the reservation if it's declined)
                --}}
                @foreach ($salles as $salle)

                    @php($reser = false)
                    @php($avinfo = [$salle, $periode, null])
                    @php($i = 0)

                    @while($reser == false && $i < count($reservations))
                        @if($reservations[$i]->salle_id == $salle->salle_id && $reservations[$i]->reservation_periode == $periode && ($reservations[$i]->statut->libelle == 'Confirmée' || $reservations[$i]->statut->libelle == 'En attente') && $reservations[$i]->date_reservation == $date)
                            @php($reser = true)
                        @endif
                        @php($i++)
                    @endwhile

                    @if($reser == true)
                        <td class=""> Non disponible</td>
                    @else
                        @if($avinfo[0]->salle_nom == "Salle de restauration" && $avinfo[1] != 2)
                            <td class=""> Non disponible</td>
                        @else
                            <td class="text-center">
                                Disponible
                                <form action="/reservation/create" method="POST">
                                    @csrf
                                    <input type="hidden" name="utilisateur_id" value="{{ Auth::user()->utilisateur_id }}">
                                    <input type="hidden" name="salle_id" value="{{ $avinfo[0]->salle_id}}">
                                    <input type="hidden" name="reservation_periode" value="{{ $periode }}">
                                    <input type="hidden" name="date_reservation" value="{{ $date }}">
                                    <input type="hidden" name="reservation_commentaire" value="Quick Reservation">
                                    <input type="hidden" name="reservation_statut" value="2">
                                    <input class="btn btn-success" type="submit" value="Réserver">
                                </form>

                                {{--                                <a class="btn btn-primary" href="{{url('/reservation/create?salle=' . $avinfo[0]->salle_id . '&period=' . $avinfo[1])}}">Réserver</a>--}}
                            </td>
                        @endif
                    @endif
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
