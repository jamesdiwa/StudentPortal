<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('userId');
            $table->integer('classSchedId');
            $table->integer('enrolledId');
            $table->string('sy')->nullable();
            $table->string('paymentForTheMonth')->nullable();
            $table->string('paymentAmount')->nullable();
            $table->date('dateOfPayment')->nullable();
            $table->string('remarks')->nullable();
            $table->string('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
