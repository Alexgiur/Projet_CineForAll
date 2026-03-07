<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model{
    protected $table = 'personnes';
    protected $primaryKey = 'Idper';
    public $timestamps = false;

    protected $fillable = [
        'PrePer',
        'NomPer',
        'DateNaissancePer',
        'NationalitePer',
        'BiographiePer',
    ];

    public function roles()
    {
        return $this->belongsToMany(
            \App\Models\RolePersonne::class,
            'Travailler',
            'IdPer',
            'IdRolePer'
        );
    }

}
