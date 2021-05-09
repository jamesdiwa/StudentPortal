<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolledsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolleds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('userId');
            $table->integer('classSchedId');
            $table->string('status')->default('Ongoing');
            //payment details
            $table->string('typeOfPayment')->nullable();
            $table->integer('tuitionFee')->nullable();
            $table->integer('monthlyPayment')->nullable();
            $table->string('gradeLevel')->nullable();

            $table->string('paymentStatus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolleds');
    }
}
