<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('user_favorite')){
        Schema::create('user_favorite', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->unsignedInteger('_profile')->nullable();
            $table->foreign('_profile')->references('id')->on('users');
            $table->unsignedInteger('_project')->nullable();
            $table->foreign('_project')->references('id')->on('project');
            $table->timestamps();

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
        Schema::dropIfExists("user_favorite");

    }
}
