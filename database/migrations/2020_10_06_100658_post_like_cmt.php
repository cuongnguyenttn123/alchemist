<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostLikeCmt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('post_like_cmt', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('_user');
        $table->unsignedInteger('_post');
        $table->unsignedInteger('_comment');
        $table->Integer('userlike');
        $table->boolean('likecm');
        $table->boolean('dislikecmt');
        $table->boolean('heart');
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
      Schema::dropIfExists('post_like_cmt');
    }
}
