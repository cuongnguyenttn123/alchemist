<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMilestoneColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('milestone')) {
            Schema::table('milestone', function (Blueprint $table) {
                $table->smallInteger('workday')->change();
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
            Schema::table('milestone', function (Blueprint $table) {
                $table->integer('workday')->change();
            });
        }
    }
}
