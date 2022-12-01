<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;

    protected $table = 'administration';

    public $timestamps = false;


    //protected $primaryKey = ['utilisateur_id', 'service_id'];

    protected $fillable = [
    ];

    protected $hidden = [
    ];

    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function isAdministrateur(){
        // get service from service table based on service_id
        $service = Service::find($this->service_id);
        // check if service is Administrateur

        if($service->libelle == 'Administrateur'){
            return true;
        } else {
            return false;
        }
    }

    public function isResponsable(){
        return $this->service_id != 2;
    }

    public function isSecretaire(){
        return $this->service_id == 3;
    }
}
