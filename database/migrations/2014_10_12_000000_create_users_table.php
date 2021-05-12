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
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('accountType')->nullable();

            //user basic info
            $table->string('firstName')->nullable();
            $table->string('middleName')->nullable();
            $table->string('lastName')->nullable();

            //birthdate
            $table->string('month')->nullable();
            $table->integer('day')->nullable();
            $table->integer('year')->nullable();

            $table->string('gender')->nullable();
            $table->text('permanentAddress')->nullable();
            $table->text('presentAddress')->nullable();
            $table->string('email')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('photoPath')->nullable();
            $table->string('status')->nullable();
            $table->integer('isActivated')->default(0);
            $table->string('department')->nullable();
            $table->string('gradeLevel')->nullable();


            //gradeLevelStatus
            $table->string('grade1')->default('Not yet enrolled');
            $table->string('grade2')->default('Not yet enrolled');
            $table->string('grade3')->default('Not yet enrolled');
            $table->string('grade4')->default('Not yet enrolled');
            $table->string('grade5')->default('Not yet enrolled');
            $table->string('grade6')->default('Not yet enrolled');
            $table->string('grade7')->default('Not yet enrolled');
            $table->string('grade8')->default('Not yet enrolled');
            $table->string('grade9')->default('Not yet enrolled');
            $table->string('grade10')->default('Not yet enrolled');

          
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
