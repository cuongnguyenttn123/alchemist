<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('albums'))
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->string('album');
            $table->string('description');
            $table->timestamps();
        });
        if(!Schema::hasTable('album_media'))
        Schema::create('album_media', function (Blueprint $table) {
          $table->unsignedInteger('_album');
          $table->foreign('_album')->references('id')->on('albums');
          $table->unsignedInteger('_media');
          $table->foreign('_media')->references('id')->on('media');
          $table->primary(['_album', '_media']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_media');
        Schema::dropIfExists('albums');
    }
}
