<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePaymentsTable.
 */
class CreatePlanosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('planos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nome_plano');
            $table->char('valor_parcelas');
            $table->char('valor_prof');
            $table->char('valor_escola');
            $table->string('quant_parcelas')->nullable();

            $table->timestamps();
            $table->softDeletes();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('planos');
	}
}
