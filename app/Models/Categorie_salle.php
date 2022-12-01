<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_salle extends Model
{
    use HasFactory;

    protected $table = 'categorie_salle';

    protected $primaryKey = 'categorie_id';
    public $timestamps = false;

    protected $fillable = [
        'libelle ',
    ];

    protected static function newFactory()
    {
        return \Database\Factories\CategorieSalleFactory::new();
    }
}
