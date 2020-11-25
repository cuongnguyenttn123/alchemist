<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReviewRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('review')) {
        Schema::table('review', function(Blueprint $table){
            $table->string('title');
            $table->renameColumn('_user', '_from');
            $table->unsignedInteger('_to');
            $table->foreign('_to')->references('id')->on('users');
        });
      }
      if (Schema::hasTable('rating')) {
        Schema::table('rating', function(Blueprint $table){
            $table->renameColumn('_user', '_from');
            $table->unsignedInteger('_to');
            $table->foreign('_to')->references('id')->on('users');
            $table->string('rating_type');
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
      if (Schema::hasTable('review')) {
        Schema::table('review', function(Blueprint $table){
            $table->dropColumn('_from');
            $table->dropColumn('_to');
        });
      }
      if (Schema::hasTable('rating')) {
        Schema::table('rating', function(Blueprint $table){
            $table->dropColumn('_from');
            $table->dropColumn('_to');
        });
      }
    }
}
