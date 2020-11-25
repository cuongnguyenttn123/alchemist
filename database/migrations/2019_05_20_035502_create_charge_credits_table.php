<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('_user');
            $table->foreign('_user')->references('id')->on('users');
            $table->integer('value');
            $table->string('payment_method');
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('charge_credits');
    }
}
