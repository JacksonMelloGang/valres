<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationStatut extends Model
{
    use HasFactory;

    protected $table = 'reservation_statut';

    protected $primaryKey = 'reservation_statut_id';

    public $timestamps = false;

    protected $fillable = [
        'libelle',
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class, 'reservation_statut');
    }

    protected static function newFactory()
    {
        return \Database\Factories\ReservationStatutFactory::new();
    }
}
