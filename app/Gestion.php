<?php

namespace Campamento;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'gestions';
    protected $fillable = ['fecha'];

    public function scope_getGestiones($query)
    {
        $gestiones = $query-> select('id','fecha')->orderBy('fecha','desc');
        return $gestiones;
    }

  public function scope_getTodos($query, $id_gestion)
  {
    $campistas = $query->join('grupos as g','g.id_gestion','gestions.id')
                      ->join('boletas as b','b.id_grupo','g.id')
                      ->join('campistas as c','c.id','b.id_campista')
                      ->where('gestions.id',$id_gestion)
                      ->select(
                        'c.nombre as nombre',
                        'c.apellido as apellido',
                        'c.ci as ci',
                        'c.sexo as sexo',
                        'g.color as color',
                        'b.monto as monto',
                        'gestions.fecha as fecha',
                        'g.id as grupo',
                        'gestions.id as gestion',
                        'g.codigo as codigo'
                      );
    return $campistas;
  }
}
