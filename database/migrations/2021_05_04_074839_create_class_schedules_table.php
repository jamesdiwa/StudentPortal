<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('gradeLevel')->nullable();
            $table->string('gradeLevelIcon')->nullable();
            $table->string('section')->nullable();
            $table->integer('schoolYearFrom')->nullable();
            $table->integer('schoolYearTo')->nullable();
            $table->string('classAdviser')->nullable();
            $table->string('adviserGender')->nullable();
            $table->text('notes')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_schedules');
    }
}
