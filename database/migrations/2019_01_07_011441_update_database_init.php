<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDatabaseInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('bid_status')) {
        Schema::table('bid_status', function(Blueprint $t){
          $t->boolean('default')->default(false);
        });
      }
      if (Schema::hasTable('dispute_status')) {
        Schema::table('dispute_status', function(Blueprint $t){
          $t->boolean('default')->default(false);
        });
      }
      if (Schema::hasTable('milestone_status')) {
        Schema::table('milestone_status', function(Blueprint $t){
          $t->boolean('default')->default(false);
        });
      }
      if (Schema::hasTable('payment_status')) {
        Schema::table('payment_status', function(Blueprint $t){
          $t->boolean('default')->default(false);
        });
      }
      if (Schema::hasTable('project_status')) {
        Schema::table('project_status', function(Blueprint $t){
          $t->boolean('default')->default(false);
        });
      }
      if (Schema::hasTable('user_status')) {
        Schema::table('user_status', function(Blueprint $t){
          $t->boolean('default')->default(false);
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
      if (Schema::hasTable('bid_status')) {
        Schema::table('bid_status', function(Blueprint $t){
          $t->dropColumn('default');
        });
      }
      if (Schema::hasTable('dispute_status')) {
        Schema::table('dispute_status', function(Blueprint $t){
          $t->dropColumn('default');
        });
      }
      if (Schema::hasTable('milestone_status')) {
        Schema::table('milestone_status', function(Blueprint $t){
          $t->dropColumn('default');
        });
      }
      if (Schema::hasTable('payment_status')) {
        Schema::table('payment_status', function(Blueprint $t){
          $t->dropColumn('default');
        });
      }
      if (Schema::hasTable('project_status')) {
        Schema::table('project_status', function(Blueprint $t){
          $t->dropColumn('default');
        });
      }
      if (Schema::hasTable('user_status')) {
        Schema::table('user_status', function(Blueprint $t){
          $t->dropColumn('default');
        });
      }
    }
}
