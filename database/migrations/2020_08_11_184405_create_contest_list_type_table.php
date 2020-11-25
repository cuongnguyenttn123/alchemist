<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestListTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_list_type', function (Blueprint $table) {
          $table->unsignedInteger('contest_id');
          $table->foreign('contest_id')->references('id')->on('contests');
          $table->unsignedInteger('list_type_id');
          $table->foreign('list_type_id')->references('id')->on('list_type');
          $table->primary(['contest_id', 'list_type_id'], 'my_long_table_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_list_type');
    }
}
