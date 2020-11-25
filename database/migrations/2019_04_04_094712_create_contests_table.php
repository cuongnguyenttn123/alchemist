<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_contest');
            $table->unsignedInteger('id_user_create');
            $table->foreign('id_user_create')->references('id')->on('users');
            $table->text('rules');
            $table->dateTime('time_start');
            $table->dateTime('time_end');
            $table->unsignedInteger('total_prize');
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
        Schema::dropIfExists('contests');
    }
}
