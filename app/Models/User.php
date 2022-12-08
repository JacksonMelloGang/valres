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
        'role_id'
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
        $role = Role::where('id_role', $this->role_id)->first();

        if($role == null){
            return false;
        }

        // check if libelle of role is Administrateur
        if($role->libelle == 'Administrateur'){
            return true;
        }

        return false;
    }

    public function isResponsable(){
        // get service from administration table based on utilisateur_id
        $role = Role::where('id_role', $this->role_id)->first();

        if($role == null){
            return false;
        }


        // check if libelle of role is Responsable
        if($role->libelle == 'Responsable'){
            return true;
        }

        return false;
    }

    public function isSecretaire(){
        // get service from administration table based on utilisateur_id
        $role = Role::where('id_role', $this->role_id)->first();

        if($role == null){
            return false;
        }

        // check if role of libelle is Secretaire
        if($role->libelle == 'Secretaire'){
            return true;
        }

        return false;
    }

}
