<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('bid')) {
          Schema::table('bid', function (Blueprint $table) {
            if(!Schema::hasColumn('bid','shortlist'))
                $table->tinyInteger('shortlist')->nullable()->defaul(0);
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
        if (Schema::hasTable('bid')) {
          Schema::table('bid', function (Blueprint $table) {
            if(Schema::hasColumn('bid','shortlist'))
                $table->dropColumn('shortlist');
          });
        }
    }
}
