<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programmation extends Model
{
    protected $table = 'programmation';
    protected $primaryKey = 'IdProg';
    public $timestamps = true;

    protected $fillable = ['IdFilm', 'DateProg', 'HeureProg', 'NumSalle'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'IdFilm', 'IdFilm');
    }

    public function salle()
    {
      return $this->belongsTo(Salle::class, 'NumSalle');
    }
}
