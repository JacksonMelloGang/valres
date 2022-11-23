<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $table = 'structure';

    protected $primaryKey = 'structure_id';

    protected $fillable = [
        'structure_nom',
        'structure_adresse',
    ];
}
