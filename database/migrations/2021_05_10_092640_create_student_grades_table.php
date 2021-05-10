<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_grades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('userId');
            $table->integer('enrolledId');
            $table->integer('classSchedId');
            $table->string('gradeLevel')->nullable();
            $table->string('subject')->nullable();
            $table->string('firstQuarter')->nullable();
            $table->string('secondQuarter')->nullable();
            $table->string('thirdQuarter')->nullable();
            $table->string('fourthQuarter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_grades');
    }
}
