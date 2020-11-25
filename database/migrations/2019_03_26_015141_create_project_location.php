<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_location', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project');
            $table->unsignedInteger('location_id');
            $table->foreign('location_id')->references('id')->on('location');
            $table->primary(['project_id', 'location_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_location');
    }
}
