<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_category', function (Blueprint $table) {
            $table->unsignedInteger('contest_id');
            $table->foreign('contest_id')->references('id')->on('contests');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->primary(['contest_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_category');
    }
}
