<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMilestoneTable extends Migration
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
                $table->string('preview')->nullable();
                $table->string('delivery')->nullable();
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
                $table->dropColumn('preview');
                $table->dropColumn('delivery');
            });
        }
    }
}
