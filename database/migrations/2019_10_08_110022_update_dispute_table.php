<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class zUpdateDisputeTable extends Migration
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
                $table->integer('total_credit');
                $table->boolean('cancel_project')->nullable();
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
                $table->dropColumn('total_credit');
                $table->dropColumn('cancel_project');
            });
        }
    }
}