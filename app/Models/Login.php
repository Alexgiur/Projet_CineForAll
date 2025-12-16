<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    protected $table = 'utilisateur';

    protected $primaryKey = 'IdUtilisateur';

    public $timestamps = false;

    protected $fillable = [
        'LoginUti',
        'MdpUti',
    ];

    protected $hidden = [
        'MdpUti',
    ];

    // Dire à Laravel quel champ utiliser pour le username
    public function getAuthIdentifierName()
    {
        return 'IdUtilisateur';
    }

    // Dire à Laravel quel champ utiliser pour le password
    public function getAuthPassword()
    {
        return $this->MdpUti;
    }

    // IMPORTANT: Laravel cherche par défaut un champ 'email'
    // On crée une méthode pour chercher par 'LoginUti' à la place
}
