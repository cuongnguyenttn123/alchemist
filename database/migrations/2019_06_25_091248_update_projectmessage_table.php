<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProjectmessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('project_messages')) {
            Schema::table('project_messages', function (Blueprint $table) {
                $table->string('files')->nullable();
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
        if (Schema::hasTable('project_messages')) {
            Schema::table('project_messages', function (Blueprint $table) {
                $table->dropColumn('files');
            });
        }
    }
}
