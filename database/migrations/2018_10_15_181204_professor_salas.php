<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfessorSalas extends Migration
{

        public function up()
    {
        Schema::create('professor_salas', function(Blueprint $table) {
            $table->integer('professor_id')->unsigned();
            $table->integer('sala_id')->unsigned();

            $table->foreign('professor_id')->references('id')->on('professors');
            $table->foreign('sala_id')->references('id')->on('salas');
        });
    }

    public function down()
    {
        Schema::drop('professor_salas');
    }


}
