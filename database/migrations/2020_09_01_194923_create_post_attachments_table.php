<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('post_attachments'))
        Schema::create('post_attachments', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('_user');
          $table->foreign('_user')->references('id')->on('users');
          $table->unsignedInteger('_post');
          $table->foreign('_post')->references('id')->on('posts');
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
        Schema::dropIfExists('post_attachments');
    }
}
