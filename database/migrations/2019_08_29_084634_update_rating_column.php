<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRatingColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('rating')) {
            Schema::table('rating', function (Blueprint $table) {
                $table->integer('point');
                $table->dropColumn('created_at');
                $table->dropColumn('updated_at');
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
        if (Schema::hasTable('rating')) {
            Schema::table('rating', function (Blueprint $table) {
                $table->dropColumn('point');
            });
        }
    }
}
