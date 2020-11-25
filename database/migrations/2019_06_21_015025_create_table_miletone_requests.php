<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMiletoneRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestone_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_milestone');
            $table->foreign('_milestone')->references('id')->on('milestone');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->integer('value');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('milestone_requests');
    }
}
