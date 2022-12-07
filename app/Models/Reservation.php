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
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    public function reservation_statut(){
        return $this->belongsTo(Reservation_statut::class, 'reservation_statut');
    }

    protected static function newFactory()
    {
        return \Database\Factories\ReservationFactory::new();
    }

}
