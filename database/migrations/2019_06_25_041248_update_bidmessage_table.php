<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBidmessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('bid_messages')) {
            Schema::table('bid_messages', function (Blueprint $table) {
                $table->string('files')->nullable();
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
        if (Schema::hasTable('bid_messages')) {
            Schema::table('bid_messages', function (Blueprint $table) {
                $table->dropColumn('files');
            });
        }
    }
}
