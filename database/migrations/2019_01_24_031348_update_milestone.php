<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMilestone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('milestone')) {
          Schema::table('milestone', function(Blueprint $t){
            $t->unsignedInteger('_project')->nullable()->change();
            $t->unsignedInteger('_bid')->nullable();
            $t->foreign('_bid')->references('id')->on('bid');
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
      if (Schema::hasTable('milestone')) {
        Schema::table('milestone', function(Blueprint $t){
          $t->unsignedInteger('_project')->nullable()->change();
          $t->dropForeign(['_bid']);
          $t->dropColumn('_bid');
        });
      }
    }
}
