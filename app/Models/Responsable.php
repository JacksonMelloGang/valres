<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $table = 'responsable';

    protected $primaryKey = 'utilisateur_id';

    protected $fillable = [
        'username'
    ];

    protected $hidden = [
        'password'
    ];
}
