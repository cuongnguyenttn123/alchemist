<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMilestoneChangeStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('milestone', function (Blueprint $table) {
          $table->unsignedInteger('_status')->nullable()->change();          
          $table->unsignedInteger('_project')->nullable()->change();          
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
            //
        });
    }
}
