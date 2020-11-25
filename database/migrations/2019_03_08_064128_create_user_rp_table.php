<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_rp', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->unsignedInteger('_post')->nullable();
            $table->foreign('_post')->references('id')->on('post');
            $table->string('point')->default(1);
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
        Schema::dropIfExists('user_rp');
    }
}
