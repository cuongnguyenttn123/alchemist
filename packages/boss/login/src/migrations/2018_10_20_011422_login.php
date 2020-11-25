<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Login extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable("roles"))
            Schema::create("roles", function(Blueprint $t){
                $t->increments('id');
                $t->string("name");
                $t->string("slug");
                $t->timestamps();
            });

        if(!Schema::hasTable("permissions"))
            Schema::create("permissions", function(Blueprint $t){
                $t->increments('id');
                $t->string("name");
                $t->string("description")->nullable();
                $t->string("slug");
                $t->timestamps();
            });

        if(!Schema::hasTable("users"))
            Schema::create('users', function (Blueprint $t) {
                $t->increments('id');
                $t->string('email')->unique();
                $t->string('password');
                $t->unsignedInteger('_role')->nullable();
                $t->rememberToken();
                $t->timestamps();

                $t->foreign('_role')->references('id')->on('roles')->onDelete('cascade');
            });

        if(!Schema::hasTable("role_permission"))
            Schema::create("role_permission", function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger("_role");
                $t->foreign('_role')->references('id')->on('roles')->onDelete('cascade');
                $t->unsignedInteger("_permission");
                $t->foreign('_permission')->references('id')->on('permissions')->onDelete('cascade');
                $t->timestamps();
            });

        // Schema::create('sessions', function (Blueprint $table) {
        //     $table->string('id')->unique();
        //     $table->unsignedInteger('user_id')->nullable();
        //     $table->string('ip_address', 45)->nullable();
        //     $table->text('user_agent')->nullable();
        //     $table->text('payload');
        //     $table->integer('last_activity');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permission');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        // Schema::dropIfExists('sessions');
    }
}
