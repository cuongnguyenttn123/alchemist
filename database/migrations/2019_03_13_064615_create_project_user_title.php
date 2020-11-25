<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserTitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user_title', function (Blueprint $table) {
          $table->unsignedInteger('_project');
          $table->foreign('_project')->references('id')->on('project');
          $table->unsignedInteger('_user_title');
          $table->foreign('_user_title')->references('id')->on('user_title');
          $table->primary(['_project', '_user_title']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user_title');
    }
}
