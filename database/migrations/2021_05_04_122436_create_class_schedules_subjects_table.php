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
            $table->integer('monday')->nullable();
            $table->integer('teusday')->nullable();
            $table->integer('wednesday')->nullable();
            $table->integer('thursday')->nullable();
            $table->integer('friday')->nullable();
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
