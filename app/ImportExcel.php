<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportExcel extends Model
{
    //
    public $fillable = ['documento','nobre_completo','paterno','materno','ap_casada','nombres','mes','gestion','admn','acad'];
}
