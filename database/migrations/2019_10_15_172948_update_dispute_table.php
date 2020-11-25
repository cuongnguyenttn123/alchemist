<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDisputeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('dispute')){
            Schema::table('dispute', function (Blueprint $table) {
                $table->date('deadline_user')->nullable();
                $table->date('deadline_arbiter')->nullable();
                $table->boolean('invite_second')->default(0);
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
        if(Schema::hasTable('dispute')){
            Schema::table('dispute', function (Blueprint $table) {
                $table->dropColumn('deadline_user');
                $table->dropColumn('deadline_arbiter');
                $table->dropColumn('invite_second');
            });
        }
    }
}
