<?php

namespace Campamento;

use campamento\Grupo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ColorHombre extends Model
{
    protected $table = 'color_hombres';
    protected $fillable = ['color','codigo'];

    public function scope_reset($query,$id_gestion)
    {
        $colores = Grupo::_getColores($id_gestion)->get();
        DB::statement('alter table color_hombres auto_increment=1');
        foreach($colores as $color){
            DB::table('color_hombres')->insert([
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