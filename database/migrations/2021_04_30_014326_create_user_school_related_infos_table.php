<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSchoolRelatedInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_school_related_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('userId');
            // $table->string('department')->nullable();
            $table->string('subjects')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_school_related_infos');
    }
}
