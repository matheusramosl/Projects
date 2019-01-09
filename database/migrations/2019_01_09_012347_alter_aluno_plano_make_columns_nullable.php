<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAlunoPlanoMakeColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->dropColumn('valor_pago');
        });
        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->date('data_pagamento')->nullable()->change();
            $table->double('valor_pago', 8, 2)->nullable();
            $table->boolean('pago')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->dropColumn('valor_pago');
        });

        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->date('data_pagamento')->change();
            $table->double('valor_pago', 8, 2);
            $table->boolean('pago')->change();
        });
    }
}
