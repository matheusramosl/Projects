<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProfessorsTable.
 */
class CreateProfessorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('professors', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('email',80);
            $table->char('phone',11);
            $table->char('cpf',11);
            $table->string('igreja',50)->nullable();

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
		Schema::drop('professors');
	}
}
