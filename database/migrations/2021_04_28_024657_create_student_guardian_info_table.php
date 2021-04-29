<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGuardianInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_guardian_info', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //basic info
            $table->integer('userId');
            $table->string('gFirstName')->nullable();
            $table->string('gMiddleName')->nullable();
            $table->string('gLastname')->nullable();
            $table->string('gRelationship')->nullable();
            $table->text('gCompleteAddress')->nullable();
            $table->string('gContactNumber')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_guardian_info');
    }
}
