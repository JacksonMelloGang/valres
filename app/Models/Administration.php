<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $table = 'administration';

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

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function isAdministrateur(){
        return $this->service_id == 1;
    }

    public function isResponsable(){
        return $this->service_id != 2;
    }

    public function isSecretaire(){
        return $this->service_id == 3;
    }
}
