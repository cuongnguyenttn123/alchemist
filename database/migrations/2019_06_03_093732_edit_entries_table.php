<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('entries')) {
            Schema::table('entries', function (Blueprint $table) {
                $table->integer('rank')->unsigned()->default(NULL)->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('entries')) {
            Schema::table('entries', function (Blueprint $table) {
                $table->dropColumn('rank');
            });
        }
    }
}
