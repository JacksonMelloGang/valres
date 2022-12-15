<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    @props(['reservation'])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Salle {{ $reservation->salle->name }}</h3>
        </div>
        <div class="card-body">
            <p class="card-text">Date: {{ $reservation->date }}</p>
            <p class="card-text">Heure de début: {{ $reservation->start_time }}</p>
            <p class="card-text">Heure de fin: {{ $reservation->end_time }}</p>

            <div class="card-footer">
                <p class="card-text">Réservé par: {{ $reservation->utilisateur->username }}</p>
                <p class="card-text">Description: {{ $reservation->reservation_commentaire }}</p>
            </div>
        </div>
    </div>
</div>
