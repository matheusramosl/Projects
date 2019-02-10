<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAlunoPlanoAddPayType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->enum('payment_type', ['', 'crédito', 'débito', 'dinheiro', 'cheque']);
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
            $table->dropColumn('payment_type');
        });
    }
}
