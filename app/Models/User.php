<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilisateur';
    protected $primaryKey = 'IdUtilisateur';

    // CORRECTION : On autorise les vrais noms de colonnes de votre BDD
    protected $fillable = [
        'LoginUti',
        'MdpUti',
        'IdTypeRoleUti',
    ];

    protected $hidden = [
        'MdpUti',
        'remember_token',
    ];

    // Indique à Laravel que la colonne du mot de passe s'appelle "MdpUti" (et non "password")
    public function getAuthPassword()
    {
        return $this->MdpUti;
    }

    // Votre relation qui fonctionne
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'effectuer', 'IdUtilisateur', 'IdRes')
            ->withPivot('IdProg')
            ->withTimestamps();
    }
}
