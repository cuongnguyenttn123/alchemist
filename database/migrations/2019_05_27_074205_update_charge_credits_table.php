<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateChargeCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('charge_credits')) {
            Schema::table('charge_credits', function(Blueprint $table){
                $table->unsignedInteger('exchange_value')->default(0);
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
        Schema::table('charge_credits', function (Blueprint $table) {
            $table->dropColumn('exchange_value');
        });
    }
}
