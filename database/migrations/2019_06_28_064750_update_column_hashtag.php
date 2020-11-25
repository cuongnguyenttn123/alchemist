<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnHashtag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('post')) {
            Schema::table('post', function (Blueprint $table) {
                $table->string('hashtag')->nullable();
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
        if (Schema::hasTable('post')) {
            Schema::table('post', function (Blueprint $table) {
                $table->dropColumn('hashtag');
            });
        }
    }
}
