<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreFilm extends Model
{
    protected $table = 'genre_film';
    protected $primaryKey = 'IdGenreFilm';

    protected $fillable = ['LibGenreFilm'];
}
