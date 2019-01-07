<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CursoSalas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_salas', function(Blueprint $table) {
            $table->integer('curso_id')->unsigned();
            $table->integer('sala_id')->unsigned();

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('sala_id')->references('id')->on('salas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('curso_salas');
    }
}
