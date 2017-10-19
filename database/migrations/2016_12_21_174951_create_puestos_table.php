<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ci_directivo')->unsigned();
            $table->integer('id_area')->unsigned();
            $table->integer('id_gestion')->unsigned();

            $table->foreign('ci_directivo')->references('ci')->on('directivos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_area')->references('id')->on('areas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_gestion')->references('id')->on('gestions')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('puestos');
    }
}
