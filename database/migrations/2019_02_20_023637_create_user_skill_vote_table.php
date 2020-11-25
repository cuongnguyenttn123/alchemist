<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSkillVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user_skill_vote');
        Schema::create('user_skill_vote', function (Blueprint $table) {
          $table->unsignedInteger('_user');
          $table->foreign('_user')->references('id')->on('users');
          $table->unsignedInteger('_skill');
          $table->foreign('_skill')->references('id')->on('skill');
          $table->primary(['_user', '_skill']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_skill_vote');
    }
}
