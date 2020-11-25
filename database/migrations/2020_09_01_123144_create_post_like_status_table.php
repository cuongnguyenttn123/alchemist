<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostLikeStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_like_status', function (Blueprint $table) {
          $table->unsignedInteger('_post');
          $table->foreign('_post')->references('id')->on('posts');
          $table->unsignedInteger('_user');
          $table->foreign('_user')->references('id')->on('users');
          $table->boolean('like')->default('1');
          $table->primary(['_post', '_user']);
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
        Schema::dropIfExists('post_like_status');
    }
}
