<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->unsignedInteger('_album')->nullable();
            $table->foreign('_album')->references('id')->on('albums');
            $table->string('caption');
            $table->timestamps();
        });
        Schema::create('post_media', function (Blueprint $table) {
            $table->unsignedInteger('_post');
            $table->foreign('_post')->references('id')->on('post');
            $table->unsignedInteger('_media');
            $table->foreign('_media')->references('id')->on('media');
            $table->primary(['_post', '_media']);
        });
        Schema::create('post_liked', function (Blueprint $table) {
            $table->unsignedInteger('_post');
            $table->foreign('_post')->references('id')->on('post');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->boolean('like')->default('1');
            $table->primary(['_post', '_user']);
            $table->timestamps();
        });
        Schema::create('post_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_post');
            $table->foreign('_post')->references('id')->on('post');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->string('content')->nullable();
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
        Schema::dropIfExists('post');
        Schema::dropIfExists('post_media');
        Schema::dropIfExists('post_liked');
        Schema::dropIfExists('post_comment');
    }
}
