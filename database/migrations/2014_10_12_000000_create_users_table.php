<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //account info
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('accountType');

            //user basic info
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();

            //birthdate
            $table->string('month')->nullable();
            $table->integer('day')->nullable();
            $table->integer('year')->nullable();

            $table->string('gender')->nullable();
            $table->text('permanentAddress')->nullable();
            $table->text('presentAddress')->nullable();
            $table->string('email')->unique();
            $table->string('contactNumber')->nullable();
            $table->string('photoPath')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
