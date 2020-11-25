<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('bid')) {
        Schema::table('bid', function(Blueprint $t){
            if(!Schema::hasColumn('bid','title'))
                $t->string('title');
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
        Schema::table('bid', function(Blueprint $t){
          $t->dropColumn('title');
        });
      }
    }
}
