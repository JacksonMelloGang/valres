<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie_structure extends Model
{
    use HasFactory;

    protected $table = 'categorie_structure';

    protected $primaryKey = 'cat_id';
    public $timestamps  = false;

    protected $fillable = [
        'libelle ',
    ];

    public function structures(){
        return $this->hasMany(Structure::class, 'cat_id');
    }

    protected static function newFactory()
    {
        return \Database\Factories\CategorieStructureFactory::new();
    }
}
