<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_campista')->unsigned();
            $table->integer('id_grupo')->unsigned();

            $table->date('fecha');
            $table->time('hora');
            $table->float('monto') ;

            $table->foreign('id_campista')->references('id')->on('campistas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_grupo')->references('id')->on('grupos')
                ->onDelete('no action')
                ->onUpdate('no action');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletas');
    }
}
