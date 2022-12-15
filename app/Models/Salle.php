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
}
