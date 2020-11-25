<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateContestAttEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contest_attachments', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('id_contest')->references('id')->on('contests')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        Schema::table('entries', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->foreign('file')->references('id')->on('media'); 
        });
        Schema::table('prizes', function (Blueprint $table) {
            $table->foreign('test_id')->references('id')->on('entries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contest_attachments', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_contest']);
        });
    }
}
