<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_project', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project');
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('language');
            $table->primary(['project_id', 'language_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_project');
    }
}
