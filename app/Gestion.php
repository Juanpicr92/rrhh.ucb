<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table='gestion';
    public function altasbajas()
    {
        return $this->hasMany('App\altasBajas');
    }

}
