<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMilestone extends Migration
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
                $table->date('start_work')->nullable();
                $table->date('done_work')->nullable();
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
                $table->dropColumn('start_work');
                $table->dropColumn('done_work');
            });
        }
    }
}
