<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
    @props(['reservations'])

    @if(count($reservations) == 0)
        <div class="card">
            <div class="card-body bg-warning">
                Aucune réservation n'est prévue pour aujourd'hui
            </div>
        </div>
    @else
        <div class="d-flex">
            @foreach($reservations as $reservation)
                <div class="card mx-2 bg-warning text-black">
                    <div class="card-header">
                        <h3 class="card-title">Salle {{ $reservation->salle->salle_nom }}</h3>
                        <h6>Catégorie - {{ $reservation->salle->categorie->libelle }}</h6>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Date: {{ date('d/m/Y', strtotime($reservation->date_reservation)) }}</p>
                        <p class="card-text">Periode: {{$reservation->periode->libelle}}</p>
                    </div>

                    <div class="card-footer">
                        <p class="card-text">Réservé par: {{ $reservation->utilisateur->username }}</p>
                        <p class="card-text">Note: {{ $reservation->reservation_commentaire }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{--


1 => 8h30 - 12h30
2 => 11h30 - 14h30
3 => 14h00 - 18h00
4 => 18h30 - 23h00

--}}
