<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class altasBajas extends Model
{
    public function gestion()
    {
        return $this->belongsTo('App\Gestion','mes');
    }
}
