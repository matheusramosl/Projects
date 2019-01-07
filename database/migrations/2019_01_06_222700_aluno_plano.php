<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlunoPlano extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_plano', function(Blueprint $table) {
            $table->increments('id');
            $table->boolean('pago');
            $table->date('data_vencimento');
            $table->date('data_pagamento');
            $table->double('valor_pago');
            $table->integer('plano_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('plano_id')->references('id')->on('planos');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
