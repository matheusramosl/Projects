<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');

            //Dados Pessoais
            $table->string('name', 50);
            $table->char('cpf', 11)->unique();
            $table->char('phone', 11);
            $table->integer('profile_id')->nullable()->default(3)->unsigned();

            //Dados de Autenticação
            $table->string('email', 80)->unique();
            $table->string('password', 225);

            $table->timestamps();
            $table->rememberToken();

            $table->foreign('profile_id')->references('id')->on('profiles');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

