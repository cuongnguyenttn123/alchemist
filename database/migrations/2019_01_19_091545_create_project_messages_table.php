<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('project_messages'))
        Schema::create('project_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_project');
            $table->unsignedInteger('_user');
            $table->string('message');
            $table->unsignedInteger('_parent');
            $table->timestamps();
            $table->foreign('_user')->references('id')->on('users');
            $table->foreign('_project')->references('id')->on('project');
            $table->foreign('_parent')->references('id')->on('project_messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_messages');
    }
}
