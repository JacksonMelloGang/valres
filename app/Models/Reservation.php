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
        'salle_id',
        'utilisateur_id',
        'date_debut',
        'reservation_periode',
        'reservation_statut' // provisoire, confirmé, annulé
    ];

    protected $casts = [
        'date_debut' => 'datetime',
    ];

    public function salle(){
        return $this->belongsTo(Salle::class, 'salle_id');
    }

    public function utilisateur(){
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function statut(){
        return $this->belongsTo(ReservationStatut::class, 'reservation_statut', 'reservation_statut_id');
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
