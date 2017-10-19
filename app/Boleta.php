<?php

namespace Campamento;

use Illuminate\Database\Eloquent\Model;
use campamento\Gestion;
use Illuminate\Support\Facades\DB;

class Boleta extends Model
{
    protected $table = 'boletas';
    protected $fillable = ['id_campista','id_grupo','fecha','hora','monto'];

    public function scope_getSiInscrito($query, $id,$id_gestion)
    {
        $boletas = $query->join('grupos as g','g.id','id_grupo')
            ->join('gestions as ges','id_gestion','ges.id')
            ->where('id_campista',$id )->where('id_gestion',$id_gestion)->select('*');

        return $boletas;
    }

  public function scope_getBoleta($query, $id_boleat){
    $boleta = $query->join('grupos as g','g.id','id_grupo')
                    ->join('campistas as c','c.id','id_campista')
                    ->where('boletas.id',$id_boleat)
                    ->select(
                      'c.nombre as nombre',
                      'c.apellido as apellido',
                      'g.color as color',
                      'boletas.fecha as fecha',
                      DB::raw('date_format(boletas.hora, "%H:%i %p") as hora'),
                      'boletas.monto as monto'
                    );
    return $boleta;
  }
}

