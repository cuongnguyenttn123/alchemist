<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMilestoneAddWorkDayRemoveStartEndBid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('milestone', function (Blueprint $table) {
            $table->dropColumn('time_start');
            $table->dropColumn('time_end');
            $table->tinyInteger('workday')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('milestone', function (Blueprint $table) {
          $table->integer('time_start');
          $table->integer('time_end');
          $table->dropColumn('workday');
        });
    }
}
