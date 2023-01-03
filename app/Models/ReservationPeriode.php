<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationPeriode extends Model
{
    use HasFactory;

    protected $table = 'reservation_periode';

    protected $primaryKey = 'id_rsperiode';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'libelle',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    public function reservations(){
        return $this->hasMany(Reservation::class, 'reservation_id');
    }
}
