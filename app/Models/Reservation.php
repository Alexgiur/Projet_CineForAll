<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // Nom de la table dans la base de données
    protected $table = 'reservation';

    // Clé primaire de la table
    protected $primaryKey = 'IdRes';

    // CORRECTION : On passe à "true" car votre migration contient $table->timestamps();
    public $timestamps = true;

    // Les champs que l'on autorise à remplir
    protected $fillable = [
        'DateDeRes',
        'IdProg',
        'NbPlaces'
    ];
}
