<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTestContestAttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('contets_attachments')) {
            Schema::table('contets_attachments', function (Blueprint $table) {
                $table->dropForeign(['id_user']); // Drops index 
                //$table->dropForeign('contets_attachments_id_user_foreign');
                $table->dropForeign(['id_contest']);

            });
        }
        Schema::table('tests', function (Blueprint $table) {
            $table->dropForeign(['id_user']); // Drops index 
            $table->dropForeign(['contest_id']);
            $table->dropForeign(['file']);
        });
        Schema::table('prizes', function (Blueprint $table) {
            $table->dropForeign(['test_id']); // Drops index 
        });
        if(Schema::hasTable('contets_attachments') && !Schema::hasTable('contest_attachments')){
            Schema::rename('contets_attachments', 'contest_attachments');
        }
        if(Schema::hasTable('tests') && !Schema::hasTable('entries')){
            Schema::rename('tests', 'entries');
        }
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
