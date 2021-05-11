<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSchedulesSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('classScheduleId')->nullable();
            $table->time('timeFrom')->nullable();
            $table->time('timeTo')->nullable();
            $table->string('subject')->nullable();
            $table->string('subjectTeacher')->nullable();
            $table->integer('teacherId')->nullable();
            $table->string('day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_schedules_subjects');
    }
}
