<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCursosTable.
 */
class CreateCursosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cursos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('horarios',50);
            $table->integer('professor_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('professor_id')->references('id')->on('professors');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cursos');
	}
}
