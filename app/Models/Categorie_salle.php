<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_salle extends Model
{
    use HasFactory;

    protected $table = 'categorie_salle';

    protected $primaryKey = 'cat_id';
    public $timestamps = false;

    protected $fillable = [
        'libelle ',
    ];

    public function salles(){
        return $this->hasMany(Salle::class, 'cat_id');
    }

    protected static function newFactory()
    {
        return \Database\Factories\CategorieSalleFactory::new();
    }
}
