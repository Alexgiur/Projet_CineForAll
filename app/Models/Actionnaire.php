<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actionnaire extends Model
{
    protected $table = 'actionnaire';
    protected $primaryKey = 'idActionnaire';

    public function cinemas() {
        return $this->belongsToMany(
            Cinema::class,
            'posseder_actionnaire',
            'idActionnaire',
            'cinema_id'
        );
    }
}
