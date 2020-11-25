<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('post_comment')){
            Schema::table('post_comment', function (Blueprint $table) {
                $table->unsignedInteger('comment_id')->nullable();
                $table->foreign('comment_id')->references('id')->on('post_comment');
                $table->unsignedInteger('media_id')->nullable();
                $table->foreign('media_id')->references('id')->on('media');
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
        if(Schema::hasTable('post_comment')){
            Schema::table('post_comment', function (Blueprint $table) {
                $table->dropForeign('post_comment_comment_id_foreign');
                $table->dropColumn('comment_id');
                $table->dropForeign('post_comment_media_id_foreign');
                $table->dropColumn('media_id');
            });
        }
    }
}
