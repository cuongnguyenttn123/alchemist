<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(!Schema::hasTable('notif'))
        Schema::create('notif', function (Blueprint $table) {
            $table -> increments('id');
            $table -> unsignedInteger('_user')->nullable();
            $table -> unsignedInteger('_profile');
            $table -> string('message');
            $table -> string('link',255);
            $table -> char('type',10)->nullable();
            $table -> boolean('status')->default(1);
            $table ->timestamps();

            $table->foreign('_user')->references('id')->on('users');
            $table->foreign('_profile')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('notif');
        
    }
}
