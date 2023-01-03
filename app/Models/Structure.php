<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $table = 'structure';

    protected $primaryKey = 'structure_id';
    public $timestamps = false;

    protected $fillable = [
        'structure_nom',
        'structure_adresse',
    ];

    public function categorie(){
        return $this->belongsTo(Categorie_structure::class, 'cat_id');
    }
}
