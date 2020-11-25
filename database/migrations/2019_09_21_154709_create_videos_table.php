<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->unsignedInteger('_media');
            $table->foreign('_media')->references('id')->on('media');
            $table->timestamps();
        });
        if(Schema::hasTable('posts')){
            Schema::table('posts', function (Blueprint $table) {
                $table->unsignedInteger('_video')->nullable();
                $table->foreign('_video')->references('id')->on('videos');
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
        /*Schema::disableForeignKeyConstraints();
        if(Schema::hasTable('videos')){
            Schema::table('videos', function (Blueprint $table) {
                $table->dropForeign('videos__user_foreign');
                $table->dropForeign('videos__media_foreign');
            });
        }
        Schema::dropIfExists('videos');
        if(Schema::hasTable('posts')){
            Schema::table('posts', function (Blueprint $table) {
                $table->dropForeign('posts__video_foreign');
                $table->dropColumn('_video);
            });
        }*/
    }
}
