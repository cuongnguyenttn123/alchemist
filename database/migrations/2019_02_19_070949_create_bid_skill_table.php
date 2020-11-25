<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_skill', function (Blueprint $table) {
          $table->unsignedInteger('_bid');
          $table->foreign('_bid')->references('id')->on('bid');
          $table->unsignedInteger('_skill');
          $table->foreign('_skill')->references('id')->on('skill');
          $table->primary(['_bid', '_skill']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_skill');
    }
}
