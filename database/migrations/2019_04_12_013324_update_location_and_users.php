<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLocationAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //location
        Schema::table('location', function (Blueprint $table) {
            $table->dropColumn(['address', 'latitude', 'city','longitude','state']);
            $table->string('country_code')->nullable();
            $table->unsignedInteger('media_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
