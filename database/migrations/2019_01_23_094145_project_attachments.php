<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('project_attachments'))
        Schema::create('project_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->unsignedInteger('_project');
            $table->foreign('_project')->references('id')->on('project');
            $table->string('name')->nullable();
            $table->string('ori_name')->nullable();
            $table->string('url');
            $table->string('extension',10)->nullable();
            $table->float("size")->nullable();
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
        Schema::dropIfExists('project_attachments');
    }
}
