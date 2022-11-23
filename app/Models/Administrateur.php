<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    protected $table = 'administrateur';

    protected $primaryKey = 'utilisateur_id';

    protected $fillable = [
        'username'
    ];

    protected $hidden = [
        'password'
    ];

    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}
