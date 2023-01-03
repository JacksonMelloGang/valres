<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'client';

    protected $fillable = [];

    public function user(){
        return $this->belongsTo('App\Models\User', 'utilisateur_id');
    }

    public function structure(){
        return $this->belongsTo('App\Models\Structure', 'structure_id');
    }

}
