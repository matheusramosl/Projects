<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStudentsTable.
 */
class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function(Blueprint $table){
            $table->increments('id');
            $table->string('name',50);
            $table->string('igreja', 50)->nullable();
            $table->date('birth')->nullable();
            $table->string('responsavel', 50)->nullable();
            $table->char('phone', 11);
            $table->string('endereço', 50)->nullable();
            $table->string('email', 80);
            
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
        Schema::drop('students');
    }
}
