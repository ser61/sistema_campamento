<?php

namespace Campamento;

use Illuminate\Database\Eloquent\Model;

class Campista extends Model
{
    protected $table = 'campistas';
    protected $fillable = ['nombre','apellido','ci','fecha_nacimiento','sexo','telefono','cod_iglesia'];

    public function scope_getCampistas($query)
    {
        $campistas = $query-> join('iglesias as i','i.cod','cod_iglesia')
            ->select(
                'id',
                'campistas.nombre',
                'apellido',
                'ci',
                'sexo',
                'telefono',
                'i.nombre as iglesia'
            )->orderBy('nombre','asc');
        return $campistas;
    }

    public function scope_getCampista($query)
    {
        $campista=$query->select(
            'id',
            'nombre',
            'apellido',
            'created_at'
        )->orderBy('created_at','desc');
        return $campista;
    }

  public function scope_buscarCampista($query, $search)
  {
    $campistas = $this->_getCampistas()
      ->where('campistas.nombre','LIKE','%'.$search.'%')
      ->orWhere('apellido','LIKE','%'.$search.'%')
      ->orWhere('ci','LIKE','%'.$search.'%');
    return $campistas;
  }
}