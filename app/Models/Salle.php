<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $table = 'salle';
    protected $primaryKey = 'NumSalle';
    public $timestamps = true;

    protected $fillable = ['NumSalle', 'Capacite', 'IdProg', 'IdCinema'];

    //une salle appartient à un ciné
    public function cinema()
    {
        return $this->belongsTo(Cinema::class, 'IdCinema', 'IdCinema');
    }
}
