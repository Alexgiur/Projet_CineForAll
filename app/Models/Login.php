<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reservation;
use App\Models\Note; // Importation nécessaire pour la nouvelle relation

class Login extends Authenticatable
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'IdUtilisateur';
    public $timestamps = true;

    protected $fillable = [
        'LoginUti',
        'MdpUti',
        'IdTypeRoleUti',
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

    /**
     * Relation vers les réservations via la table pivot 'effectuer'
     */
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class, 'effectuer', 'IdUtilisateur', 'IdRes')
            ->withPivot('IdProg');
    }

    /**
     * NOUVELLE RELATION : permet de récupérer tous les avis écrits par cet utilisateur
     */
    public function notes()
    {
        return $this->hasMany(Note::class, 'IdUtilisateur', 'IdUtilisateur');
    }
}
