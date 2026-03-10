<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    protected $table = 'cinema';

    protected $primaryKey = 'IdCinema';

    protected $fillable = [
        'AdresseCine',
        'CodPostCine',
        'VilleCine',
    ];

    //une salle appartiant à un ciné
    public function salles()
    {
        return $this->hasMany(Salle::class, 'IdCinema', 'IdCinema');
    }
}
