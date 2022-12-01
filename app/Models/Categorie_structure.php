<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_structure extends Model
{
    use HasFactory;

    protected $table = 'categorie_structure';

    protected $primaryKey = 'categorie_id';
    public $timestamps  = false;


    protected $fillable = [
        'libelle ',
    ];

    protected static function newFactory()
    {
        return \Database\Factories\CategorieStructureFactory::new();
    }
}
