<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_skill', function (Blueprint $table) {
            $table->unsignedInteger('contest_id');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->unsignedInteger('skill_id');
            $table->foreign('skill_id')->references('id')->on('skill');
            $table->primary(['contest_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_skill');
    }
}
