<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestUserTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_user_title', function (Blueprint $table) {
            $table->unsignedInteger('contest_id');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->unsignedInteger('user_title_id');
            $table->foreign('user_title_id')->references('id')->on('user_title');
            $table->primary(['contest_id', 'user_title_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_user_title');
    }
}
