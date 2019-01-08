<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPlanosModifyColumnsTonumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planos', function (Blueprint $table) {
            $table->dropColumn('valor_parcelas');
            $table->dropColumn('valor_prof');
            $table->dropColumn('valor_escola');
            $table->dropColumn('quant_parcelas');

        });
         Schema::table('planos', function (Blueprint $table) {
            $table->double('valor_parcelas',8,2);
            $table->double('valor_prof',8,2);
            $table->double('valor_escola',8,2);
            $table->integer('quant_parcelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('planos', function (Blueprint $table) {
            $table->dropColumn('valor_parcelas');
            $table->dropColumn('valor_prof');
            $table->dropColumn('valor_escola');
            $table->dropColumn('quant_parcelas');

        });
         Schema::table('planos', function (Blueprint $table) {
            $table->char('valor_parcelas');
            $table->char('valor_prof');
            $table->char('valor_escola');
            $table->string('quant_parcelas')->nullable();
        });
    }
}
