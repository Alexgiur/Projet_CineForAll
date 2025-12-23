<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model{
    protected $table = 'personnes';
    protected $primaryKey = 'Idper';

    protected $fillable = [
        'PrePer',
        'NomPer',
        'DateNaissancePer',
        'NationalitePer',
        'BiographiePer',
    ];

}
