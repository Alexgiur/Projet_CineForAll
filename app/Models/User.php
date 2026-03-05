<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nom de la table dans votre base de données
    protected $table = 'utilisateur';

    /**
     * CLÉ PRIMAIRE :
     * D'après vos logs SQL précédents, votre colonne s'appelle 'IdUtilisateur'
     * et non 'IdUti'. Laravel en a besoin pour connecter l'utilisateur connecté
     * à ses réservations.
     */
    protected $primaryKey = 'IdUtilisateur';

    /**
     * Les attributs qui peuvent être remplis massivement.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'IdTypeRoleUti', // Ajouté pour gérer les rôles (Admin/User)
    ];

    /**
     * Les attributs à cacher (pour la sécurité).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast des attributs.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * RELATION : Un utilisateur peut effectuer plusieurs réservations.
     * * On utilise belongsToMany car la relation passe par la table pivot 'effectuer'.
     */
    public function reservations()
    {
        /**
         * Paramètres :
         * 1. Reservation::class : Le modèle lié.
         * 2. 'effectuer' : La table pivot qui fait le lien.
         * 3. 'IdUtilisateur' : La clé étrangère dans 'effectuer' qui pointe vers cet utilisateur.
         * 4. 'IdRes' : La clé étrangère dans 'effectuer' qui pointe vers la réservation.
         */
        return $this->belongsToMany(Reservation::class, 'effectuer', 'IdUtilisateur', 'IdRes')
            ->withPivot('IdProg') // Permet de savoir pour quelle séance (programmation) la réservation a été faite
            ->withTimestamps();   // Pour gérer les dates de création dans la table pivot
    }
}
