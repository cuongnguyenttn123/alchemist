<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePortfolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('media')) {
            Schema::table('media', function (Blueprint $table) {
                $table->tinyInteger('featured')->nullable();
                $table->dropColumn('date');
                $table->dropColumn('time');
            });
        }
        if (Schema::hasTable('albums')) {
            Schema::table('albums', function (Blueprint $table) {
                $table->string('data')->nullable();
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
        if (Schema::hasTable('media')) {
            Schema::table('media', function (Blueprint $table) {
                $table->dropColumn('featured');
            });
        }
        if (Schema::hasTable('albums')) {
            Schema::table('albums', function (Blueprint $table) {
                $table->dropColumn('data');
            });
        }
    }
}
