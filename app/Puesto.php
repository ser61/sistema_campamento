<?php

namespace Campamento;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'puestos';
    protected $fillable = ['ci_directivo','id_area','id_gestion'];

}