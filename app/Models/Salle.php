<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $table = 'salle';
    // Indispensable : NumSalle est votre clé primaire
    protected $primaryKey = 'NumSalle';
    public $timestamps = true;

    protected $fillable = ['NumSalle', 'Capacite', 'IdProg', 'IdCinema'];
}
