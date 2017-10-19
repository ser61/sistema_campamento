<?php

namespace Campamento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Directivo extends Model
{
    protected $table = 'directivos';
    protected $fillable = ['ci','nombre','apellido','fecha_nacimiento','telefono'];
    protected $primaryKey = 'ci';

    public function scope_getPastores($query)
    {
        $pastores=$query->select('ci',DB::raw('concat(nombre," ",apellido) as nombre'));
        return $pastores;
    }

    public function scope_getDirectivos($query)
    {
        $directivos = $query->select('*')->orderBy('nombre','asc');
        return $directivos;
    }
}
