<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostNewfeed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('posts')){
            Schema::table('posts', function (Blueprint $table) {
                $table->string('external_link')->nullable();
                $table->string('list_media')->nullable();
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
        if(Schema::hasTable('posts')){
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('external_link');
                $table->dropColumn('list_media');
            });
        }
    }
}
