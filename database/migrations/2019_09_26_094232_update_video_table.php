<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('videos')){
            Schema::table('videos', function (Blueprint $table) {
                $table->string('duration')->nullable();
                $table->unsignedInteger('_thumbnail')->nullable();
                $table->foreign('_thumbnail')->references('id')->on('media');
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
        if(Schema::hasTable('videos')){
            Schema::table('videos', function (Blueprint $table) {
                $table->dropForeign('videos__thumbnail_foreign');
                $table->dropColumn('_thumbnail');
                $table->dropColumn('duration');
            });
        }
    }
}
