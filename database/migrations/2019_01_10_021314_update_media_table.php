<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('media')) {
        Schema::table('media', function(Blueprint $t){
          $t->integer('time');
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
      if (Schema::hasTable('media')) {
        Schema::table('media', function(Blueprint $t){
          $t->dropColumn(['name','ori_name','size','extension','time']);
        });
      }
    }
}
