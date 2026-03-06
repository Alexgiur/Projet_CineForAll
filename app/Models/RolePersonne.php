<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePersonne extends Model
{
    protected $table = 'role_personne';
    protected $primaryKey = 'IdRoleper';
    public $timestamps = false;
}
