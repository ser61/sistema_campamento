<?php

namespace Campamento;

use Illuminate\Database\Eloquent\Model;
use campamento\Grupo;
use Illuminate\Support\Facades\DB;

class ColorMujer extends Model
{
    protected $table = 'color_mujers';
    protected $fillable = ['color','codigo'];

    public function scope_reset($query,$id_gestion)
    {
        $colores = Grupo::_getColores($id_gestion)->get();
        DB::statement('alter table color_mujers auto_increment=1');
        foreach($colores as $color){
            DB::table('color_mujers')->insert([
                'color'=>$color['color'],
                'codigo'=>$color['codigo']
            ]);
        }

        return 0;
    }

    public function scope_getColor($query)
    {
        $colores = $query->select('id','color','codigo')->inRandomOrder();
        return $colores;
    }
}