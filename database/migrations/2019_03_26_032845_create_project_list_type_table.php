<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectListTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_list_type', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project');
            $table->unsignedInteger('list_type_id');
            $table->foreign('list_type_id')->references('id')->on('list_type');
            $table->primary(['project_id', 'list_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_list_type');
    }
}
