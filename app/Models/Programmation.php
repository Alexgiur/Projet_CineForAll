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

    public function placesRestantes($idReservationAExclure = null)
    {
        //prépare la requête pour compter les places réservées pour la séance
        $query = \App\Models\Reservation::where('IdProg', $this->IdProg);

        //zi on est en train de modifier une réservation, on ne compte pas les places
        if ($idReservationAExclure) {
            $query->where('IdRes', '!=', $idReservationAExclure);
        }

        //on fait la somme
        $placesReservees = $query->sum('NbPlaces');

        //on retourne la capacité de la salle - les places réservées
        return $this->salle->Capacite - $placesReservees;
    }
}
