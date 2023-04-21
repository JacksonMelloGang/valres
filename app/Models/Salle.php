<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $table = 'salle';

    protected $primaryKey = 'salle_id';
    public $timestamps = false;

    protected $fillable = [
        'salle_nom',
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class, 'salle_id', 'salle_id');
    }

    public function categorie(){
        return $this->belongsTo(Categorie_salle::class, 'cat_id');
    }

    public static function isAvailable($id, $date, $periode){
        $salle = Salle::findOrFail($id);
        $reservations = $salle->reservations;
        $isAvailable = true;

        foreach($reservations as $reservation){
            if($reservation->date_reservation == $date && $reservation->periode_id == $periode){
                $isAvailable = false;
            }
        }
        return $isAvailable;
    }

    public function digicode(){
        return $this->hasMany(Digicode::class, 'salleId', 'salle_id');
    }

    public function salle_code($year, $month){
        $salle = Salle::findOrFail($this->salle_id);

        // get code from digicode where salle_id = $this->salle_id and year = $year and month = $month
        $digicode = $salle->digicode()->where('year', $year)->where('month', $month)->first();

        if(!$digicode == null){
            $digicode = $digicode->code;
        } else {
            $digicode = -1;
        }
        
        return $digicode;
    }
}
