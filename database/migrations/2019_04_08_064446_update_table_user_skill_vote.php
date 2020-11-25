<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableUserSkillVote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('user_skill_vote')) {
        Schema::table('user_skill_vote', function(Blueprint $table){
            $table->integer('_project')->unsigned()->nullable();
            $table->foreign('_project')->references('id')->on('project');
            $table->string('value')->nullable();
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
