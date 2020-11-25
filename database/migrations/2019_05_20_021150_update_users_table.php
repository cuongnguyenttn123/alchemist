<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
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
                $table->float('credit')->default(0);
                $table->float('credit_lock')->default(0);
                $table->tinyInteger('complete_profile')->default(0);
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
            $table->dropColumn('credit');
            $table->dropColumn('credit_lock');
            $table->dropColumn('complete_profile');
        });
    }
}
