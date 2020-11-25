<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditContestAttachmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('contest_attachments')) {
            Schema::table('contest_attachments', function (Blueprint $table) {
                $table->integer('preview')->unsigned()->default(NULL)->nullable();
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
        if (Schema::hasTable('contest_attachments')) {
            Schema::table('contest_attachments', function (Blueprint $table) {
                $table->dropColumn('preview');
            });
        }
    }
}
