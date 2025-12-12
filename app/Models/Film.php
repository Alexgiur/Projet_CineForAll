<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';
    protected $primaryKey = 'IdFilm';

    protected $fillable = [
        'TitreFilm',
        'LongueurFilm',
        'DateSortieFilm',
        'ResumeFilm',
        'LangueFilm',
        'TroisDOuNon',
        'AfficheFilm',
        'IdGenreFilm'
    ];
}
