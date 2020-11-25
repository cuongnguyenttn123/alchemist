<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('users')) {
            Schema::table('users', function(Blueprint $table){
                $table->float('wallet')->unsigned()->change();
                $table->float('wallet_lock')->unsigned()->change();
                $table->float('credit')->unsigned()->change();
                $table->float('credit_lock')->unsigned()->change();
                $table->double('SBP')->default(0)->unsigned();
                $table->double('SP')->default(0)->unsigned();
                $table->double('RP')->default(0)->unsigned();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('SBP');
            $table->dropColumn('SP');
            $table->dropColumn('RP');
        });
    }
}
