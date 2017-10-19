<?php

namespace Campamento;

use Illuminate\Database\Eloquent\Model;

class Iglesia extends Model
{
    protected $table = 'iglesias';
    protected $fillable = ['nombre','ci_pastor','pais','departamento','ciudad','direccion'];
    protected $primaryKey = 'cod';

    public function scope_getIglesias($query)
    {
        $iglesias=$query->select('cod','nombre');
        return $iglesias;

    }
    public function scope_getIglesias1($query)
    {
        $iglesias = $query->select('*')->orderBy('nombre','asc');
        return $iglesias;
    }
}
