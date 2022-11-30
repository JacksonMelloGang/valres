<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $table = 'salle';

    protected $primaryKey = 'salle_id';
    public $timestamp = false;

    protected $fillable = [
        'salle_nom',
    ];

    public function structure(){
        return $this->belongsTo(Structure::class, 'structure_id');
    }
}
