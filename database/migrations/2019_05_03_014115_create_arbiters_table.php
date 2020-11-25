<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arbiters', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_dispute')->unsigned();
            $table->foreign('id_dispute')->references('id')->on('dispute');

            $table->integer('user_arbiter_id')->unsigned();
            $table->foreign('user_arbiter_id')->references('id')->on('users');

            $table->tinyInteger('faction')->unsigned()->nullable();
            $table->tinyInteger('vote')->unsigned()->nullable();
            $table->tinyInteger('status')->unsigned()->nullable();
            $table->text('description')->nullable();


            $table->timestamps();
        });
          Schema::table('dispute', function (Blueprint $table) {
                $table->dropForeign('dispute__category_foreign');
                $table->integer('milestone_id')->unsigned()->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arbiters');
        Schema::table('dispute', function (Blueprint $table) {
            $table->dropColumn('milestone_id');
        });
    }
}
