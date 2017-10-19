<?php

namespace campamento;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';
    protected $fillable = ['color','codigo','id_gestion'];

    public function scope_getColores($query,$id_gestion)
    {
        $colores = $query->where('id_gestion',$id_gestion)->select('id','color','codigo');
        return $colores;
    }

    public function scope_getAllGrupos($query)
    {
        $grupos = $query->join('gestions as g','id_gestion','g.id')->select('grupos.id','color','fecha as gestion');
        return $grupos;
    }

    public function scope_getIdColor($query,$id_gestion,$color)
    {
        $colores = $query->where('id_gestion',$id_gestion)->where('color',$color)->select('id');
        return $colores;
    }
}
