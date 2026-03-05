<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';
    protected $primaryKey = 'IdFilm';

    // Si votre table n'a pas les colonnes created_at et updated_at,
    // passez cette valeur à false.
    public $timestamps = true;

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

    /**
     * Relation vers le genre (Un film appartient à un genre)
     */
    public function genre_film() {
        return $this->belongsTo(GenreFilm::class, 'IdGenreFilm', 'IdGenreFilm');
    }

    /**
     * Relation vers les séances (Un film a plusieurs programmations)
     * C'est cette relation qui permet de faire $film->programmations dans votre vue.
     */
    public function programmations() {
        // On lie l'IdFilm de la table 'films' à l'IdFilm de la table 'programmation'
        return $this->hasMany(Programmation::class, 'IdFilm', 'IdFilm');
    }

    /**
     * Relation vers les notes/avis (Un film a plusieurs notes)
     */
    public function notes() {
        return $this->hasMany(Note::class, 'IdFilm', 'IdFilm');
    }

    /**
     * Helper optionnel : Calcule la note moyenne du film
     */
    public function noteMoyenne() {
        $moyenne = $this->notes()->avg('ValeurNote');
        return $moyenne ? number_format($moyenne, 1) : "N/A";
    }
}
