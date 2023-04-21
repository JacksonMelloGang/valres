<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Digicode extends Model
{
    //use HasFactory;

    protected $table = 'digicode';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'code ',
        'salleId',
        'month',
        'year'
    ];

    public function salles(){
        return $this->hasMany(Salle::class, 'cat_id');
    }


}
