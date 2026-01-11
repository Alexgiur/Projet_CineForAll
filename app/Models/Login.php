<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'IdUtilisateur';
    public $timestamps = true; // La migration contient timestamps()

    protected $fillable = [
        'LoginUti',
        'MdpUti',
        'IdTypeRoleUti', // Ajouté pour permettre l'inscription
    ];

    protected $hidden = [
        'MdpUti',
    ];

    public function getAuthIdentifierName()
    {
        return 'IdUtilisateur';
    }

    public function getAuthPassword()
    {
        return $this->MdpUti;
    }
}
