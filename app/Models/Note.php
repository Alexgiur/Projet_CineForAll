<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'noter';
    // Cette table n'a généralement pas de clé primaire incrémentale unique
    // mais Laravel peut gérer cela si on définit les champs.
    public $timestamps = true;

    protected $fillable = [
        'IdUtilisateur',
        'IdFilm',
        'Note',
        'Commentaire'
    ];

    public function film() {
        return $this->belongsTo(Film::class, 'IdFilm', 'IdFilm');
    }

    public function utilisateur() {
        return $this->belongsTo(Login::class, 'IdUtilisateur', 'IdUtilisateur');
    }
}
