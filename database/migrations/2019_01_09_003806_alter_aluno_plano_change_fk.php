<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAlunoPlanoChangeFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->unsignedInteger('curso_id');
            $table->foreign(['curso_id','student_id'])->references(['curso_id','student_id'])->on('curso_students');
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
            $table->dropForeign(['curso_id','student_id']);
            $table->dropColumn('curso_id');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }
}
