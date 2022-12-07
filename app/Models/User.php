<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'utilisateur';

    protected $primaryKey = 'utilisateur_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'mail',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
    ];

    public function isAdministrateur(){
        // get service from administration table based on utilisateur_id
        $administration = Administration::where('utilisateur_id', $this->utilisateur_id)->first();

        if($administration == null){
            return false;
        }

        // check if administration is Administrateur
        if($administration->isAdministrateur()){
            return true;
        } else {
            return false;
        }
    }

    public function isResponsable(){
        // get service from administration table based on utilisateur_id
        $administration = Administration::where('utilisateur_id', $this->utilisateur_id)->first();

        if($administration == null){
            return false;
        }


        // check if administration is Responsable
        if($administration->isResponsable()){
            return true;
        } else {
            return false;
        }
    }

    public function isSecretaire(){
        // get service from administration table based on utilisateur_id
        $administration = Administration::where('utilisateur_id', $this->utilisateur_id)->first();

        if($administration == null){
            return false;
        }

        // check if administration is Secretaire
        if($administration->isSecretaire()){
            return true;
        } else {
            return false;
        }
    }

}
