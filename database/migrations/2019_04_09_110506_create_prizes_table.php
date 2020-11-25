<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('prizes')) {
        Schema::create('prizes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('test_id');
            $table->foreign('test_id')->references('id')->on('tests');
            $table->tinyInteger('rank');
            $table->unsignedInteger('sbp')->nullable();
            $table->double('money')->unsigned()->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('prizes');
    }
}
