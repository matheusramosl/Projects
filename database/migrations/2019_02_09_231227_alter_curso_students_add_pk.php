<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCursoStudentsAddPk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('aluno_plano')->truncate();
        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->dropForeign(['curso_id','student_id']);
            $table->dropColumn(['curso_id', 'student_id']);
        });

        Schema::dropIfExists('curso_students');
        Schema::create('curso_students', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('curso_id')->unsigned();
            $table->integer('student_id')->unsigned();

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('student_id')->references('id')->on('students');

            $table->timeStamps();
        });

        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->unsignedInteger('matricula_id');
            $table->foreign(['matricula_id'])->references(['id'])->on('curso_students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('aluno_plano')->truncate();
        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->dropForeign(['matricula_id']);
            $table->dropColumn('matricula_id');
        });

        Schema::dropIfExists('curso_students');
        Schema::create('curso_students', function (Blueprint $table) {
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('student_id');

            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->foreign('student_id')->references('id')->on('students');

            $table->primary(['curso_id', 'student_id']);
        });

        Schema::table('aluno_plano', function (Blueprint $table) {
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('student_id');
            $table->foreign(['curso_id','student_id'])->references(['curso_id','student_id'])->on('curso_students');
        });
    }
}
