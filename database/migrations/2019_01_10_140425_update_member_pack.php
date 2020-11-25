<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMemberPack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('membership_pack')) {
        Schema::table('membership_pack', function(Blueprint $t){
          $t->integer('duration');
          $t->boolean('type')->default(0);
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
      if (Schema::hasTable('membership_pack')) {
        Schema::table('membership_pack', function(Blueprint $t){
          $t->dropColumn('duration');
          $t->dropColumn('type');
        });
      }
    }
}
