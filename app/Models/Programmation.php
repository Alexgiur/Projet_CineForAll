<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programmation extends Model
{
    protected $table = 'programmation';
    protected $primaryKey = 'IdProg';
    public $timestamps = true;

    // Assurez-vous d'utiliser NumSalle ici
    protected $fillable = ['IdFilm', 'NumSalle', 'DateProg', 'HeureProg'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'IdFilm', 'IdFilm');
    }

    public function salle()
    {
        // On lie NumSalle (dans programmation) à NumSalle (dans salle)
        return $this->belongsTo(Salle::class, 'NumSalle', 'NumSalle');
    }
}
