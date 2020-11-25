<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMediaToPostCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
      {
        Schema::table('post_comment', function (Blueprint $table) {
          //
          $table->string('external_link')->nullable();
          $table->string('list_media')->nullable();
          $table->string('list_file')->nullable();
          $table->unsignedInteger('_video')->nullable();
          $table->foreign('_video')->references('id')->on('videos');
        });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      if(Schema::hasTable('post_comment')){
        Schema::table('post_comment', function (Blueprint $table) {
          $table->dropColumn('external_link');
          $table->dropColumn('list_file');
          $table->dropColumn('_video');
          $table->dropColumn('list_media');
        });
      }
    }
}
