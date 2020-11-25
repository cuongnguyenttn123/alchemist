<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBidMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_bid');
            $table->unsignedInteger('_user');
            $table->string('message');
            $table->unsignedInteger('_parent')->nullable();
            $table->timestamps();
            $table->foreign('_user')->references('id')->on('users');
            $table->foreign('_bid')->references('id')->on('bid');
            $table->foreign('_parent')->references('id')->on('bid_messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_bid_messages');
    }
}
