<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';

    protected $primaryKey = 'reservation_id';

    protected $fillable = [
        'date_debut',
        'reservation_periode',
        'salle_id',
        'utilisateur_id',
        'reservation_statut' // provisoire, confirmé, annulé
    ];


    public function salle(){
        return $this->belongsTo(Salle::class, 'salle_id');
    }

    public function utilisateur(){
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function reservationstatut(){
        return $this->belongsTo(ReservationStatut::class, 'reservation_statut_id', 'reservation_statut');
    }

    public function isCanceled(){
        // get reservation_statut where libelle = 'annulé'
        $r_statut = ReservationStatut::where('libelle', 'Annulé')->first();

        if($this->reservation_statut == $r_statut->reservation_statut_id){
            return true;
        }

        return false;
    }

    protected static function newFactory()
    {
        return \Database\Factories\ReservationFactory::new();
    }

}
