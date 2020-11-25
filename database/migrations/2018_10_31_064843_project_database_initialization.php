<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectDatabaseInitialization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #region point
        if(!Schema::hasTable('point')){
            Schema::create('point', function(Blueprint $t){
                $t->increments('id');
                $t->double('SBP');
                $t->double('RP');
                $t->double('SP');
                $t->timestamps();
            });
        }
        #endregion
        #region user_meta
        if(!Schema::hasTable('user_meta')){
            Schema::create('user_meta',function(Blueprint $t){
                $t->increments('id');
                $t->string('meta_key');
                $t->string('meta_value');
                $t->integer('_user');
                $t->timestamps();
            });
        }
        #endregion
        #region status_user
        if(!Schema::hasTable('user_status')){
            Schema::create('user_status',function(Blueprint $t){
                $t->increments('id');
                $t->string('status');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region location
        if(!Schema::hasTable('location')){
            Schema::create('location',function(Blueprint $t){
                $t->increments('id');
                $t->string('address')->nullable();
                $t->double('latitude')->nullable();
                $t->string('city')->nullable();
                $t->double('longitude')->nullable();
                $t->string('state')->nullable();
                $t->string('country')->nullable();
                $t->timestamps();
            });
        }
        #endregion
        #region user
        if(!Schema::hasTable('user')){
            Schema::create('user',function(Blueprint $t){
                $t->increments('id');
                $t->string('username');
                $t->string('remember_token')->nullable();
                $t->string('first_name')->nullable();
                $t->string('last_name')->nullable();
                $t->string('phone')->nullable();
                $t->boolean('sex')->nullable();
                $t->string('email');
                $t->timestamp('email_verified_at')->nullable();
                $t->string('password');
                $t->unsignedInteger('_avatar')->nullable();
                $t->string('avatar')->default("");
                $t->string('profile_banner')->default("");
                $t->double('wallet')->nullable();
                $t->double('wallet_lock')->nullable();
                $t->unsignedInteger('level')->nullable();
                $t->unsignedInteger('_location')->nullable();
                $t->foreign('_location')->references('id')->on('location');
                $t->string('invite_code')->nullable();
                $t->unsignedInteger('_status')->nullable();
                $t->foreign('_status')->references('id')->on('user_status');
                $t->unsignedInteger('_point')->nullable();
                $t->foreign('_point')->references('id')->on('point');
                $t->double('total_token')->nullable();
                $t->timestamps();
            });
        }
        #endregion
        #region media
        if (!Schema::hasTable('media')) {
            Schema::create("media", function(Blueprint $t){
                $t->increments('id');
                $t->string('url');
                $t->string('name')->nullable();
                $t->string('ori_name')->nullable();
                $t->string('_user');
                $t->string('extension',10)->nullable();
                $t->float("size")->nullable();
                $t->float("date",20)->nullable();
                $t->timestamps();
            });
        }
        #endregion
        #region order_status
        if(!Schema::hasTable('order_status')){
            Schema::create('order_status',function(Blueprint $t){
                $t->increments('id');
                $t->string('status');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region order_type
        if(!Schema::hasTable('order_type')){
            Schema::create('order_type',function(Blueprint $t){
                $t->increments('id');
                $t->string('type');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region order
        if(!Schema::hasTable('order')){
            Schema::create('order',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_transaction')->nullable();
                $t->string('transaction_code')->nullable();
                $t->string('payment_method')->nullable();
                $t->string('state');
                $t->unsignedInteger('_user');
                $t->foreign('_user')->references('id')->on('user');
                $t->double('amount');
                $t->string('currency');
                $t->dateTime('date');
                $t->unsignedInteger('_status');
                $t->foreign('_status')->references('id')->on('order_status');
                $t->unsignedInteger('_type');
                $t->foreign('_type')->references('id')->on('order_type');
                $t->timestamps();
            });
        }
        #endregion
        #region order_meta
        if(!Schema::hasTable('order_meta')){
            Schema::create('order_meta',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_order');
                $t->foreign('_order')->references('id')->on('order');
                $t->string('meta_key');
                $t->string('meta_value');
                $t->timestamps();
            });
        }
        #endregion
        #region category
        if(!Schema::hasTable('category')){
            Schema::create('category',function(Blueprint $t){
                $t->increments('id');
                $t->string('name');
                $t->unsignedInteger('_parent');
                $t->timestamps();
            });
        }
        #endregion
        #region skill
        if(!Schema::hasTable('skill')){
            Schema::create('skill',function(Blueprint $t){
                $t->increments('id');
                $t->string('name');
                $t->string('slug'); // 07/12
                $t->unsignedInteger('_category');
                $t->foreign('_category')->references('id')->on('category');
                $t->timestamps();
            });
        }
        #endregion
        #region skill_user
        if(!Schema::hasTable('skill_user')){
            Schema::create('skill_user',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_user');
                $t->foreign('_user')->references('id')->on('user');
                $t->unsignedInteger('_skill');
                $t->foreign('_skill')->references('id')->on('skill');
                $t->timestamps();
            });
        }
        #endregion
        #region project_status
        if(!Schema::hasTable('project_status')){
            Schema::create('project_status',function(Blueprint $t){
                $t->increments('id');
                $t->string('status');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region project
        if(!Schema::hasTable('project')){
            Schema::create('project',function(Blueprint $t){
                $t->increments('id');
                $t->string('name');
                $t->string('slug'); //add 07/12
                $t->string('short_description');
                $t->string('detail_description');
                $t->double('budget');
                $t->integer('bid_start'); // date -> int
                $t->integer('bid_end'); // date -> int
                $t->integer('deadline');
                $t->string('medias')->nullable();
                $t->unsignedInteger('_status')->nullable();
                $t->foreign('_status')->references('id')->on('project_status');
                $t->unsignedInteger('_employer')->nullable();
                $t->foreign('_employer')->references('id')->on('user');
                $t->unsignedInteger('_location')->nullable();
                $t->foreign('_location')->references('id')->on('location');
                $t->timestamps();
            });
        }
        #endregion
        #region review
                if(!Schema::hasTable('review')){
                    Schema::create('review',function(Blueprint $t){
                        $t->increments('id');
                        $t->unsignedInteger('_user');
                        $t->foreign('_user')->references('id')->on('user')->onDelete('cascade');
                        $t->unsignedInteger('_project');
                        $t->foreign('_project')->references('id')->on('project')->onDelete('cascade');
                        $t->string('content');
                        $t->timestamps();
                    });
                }
                #endregion
        #region project_category
        if(!Schema::hasTable('project_category')){
            Schema::create('project_category',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_project');
                $t->foreign('_project')->references('id')->on('project');
                $t->unsignedInteger('_category');
                $t->foreign('_category')->references('id')->on('category');
                $t->timestamps();
            });
        }
        #endregion
        #region bid_status
        if(!Schema::hasTable('bid_status')){
            Schema::create('bid_status',function(Blueprint $t){
                $t->increments('id');
                $t->string('status');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region bid_meta
        if(!Schema::hasTable('bid_meta')){
            Schema::create('bid_meta',function(Blueprint $t){
                $t->increments('id');
                $t->string('meta_key');
                $t->string('meta_value');
                $t->timestamps();
            });
        }
        #endregion
        #region bid
        if(!Schema::hasTable('bid')){
            Schema::create('bid',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_project');
                $t->foreign('_project')->references('id')->on('project');
                $t->unsignedInteger('_freelancer');
                $t->foreign('_freelancer')->references('id')->on('user');
                $t->string('description');
                $t->string('medias')->nullable(); // 03/01/2019
                $t->float('price'); // string -> float
                $t->integer('work_time'); //double->int
                $t->unsignedInteger('_status');
                $t->foreign('_status')->references('id')->on('bid_status');
                $t->timestamps();
            });
        }
        #endregion
        #region rate_type
        if(!Schema::hasTable('rate_type')){
            Schema::create('rate_type',function(Blueprint $t){
                $t->increments('id');
                $t->string('type');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region rating
        if(!Schema::hasTable('rating')){
            Schema::create('rating',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_user');
                $t->foreign('_user')->references('id')->on('user')->onDelete('cascade');
                $t->unsignedInteger('_project');
                $t->foreign('_project')->references('id')->on('project');
                $t->integer('value');
                $t->timestamps();
            });
        }
        #endregion
        #region tag
        if(!Schema::hasTable('tag')){
            Schema::create('tag',function(Blueprint $t){
                $t->increments('id');
                $t->string('name');
                $t->string('slug');
                $t->unsignedInteger('_project');
                $t->foreign('_project')->references('id')->on('project')->onDelete('cascade');
                $t->timestamps();
            });
        }
        #endregion
        #region project_meta
        if(!Schema::hasTable('project_meta')){
            Schema::create('project_meta',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_project');
                $t->foreign('_project')->references('id')->on('project')->onDelete('cascade');
                $t->string('meta_key');
                $t->string('meta_value');
                $t->timestamps();
            });
        }
        #endregion
        #region milestone_status
        if(!Schema::hasTable('milestone_status')){
            Schema::create('milestone_status',function(Blueprint $t){
                $t->increments('id');
                $t->string('status');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region payment_status
        if(!Schema::hasTable('payment_status')){
            Schema::create('payment_status',function(Blueprint $t){
                $t->increments('id');
                $t->string('status');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region milestone
        if(!Schema::hasTable('milestone')){
            Schema::create('milestone',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_project');
                $t->foreign('_project')->references('id')->on('project')->onDelete('cascade');
                $t->string('title');
                $t->string('description');
                $t->integer('time_start');
                $t->integer('time_end');
                $t->unsignedInteger('percent_payment');
                $t->unsignedInteger('_status');
                $t->foreign('_status')->references('id')->on('milestone_status');
                $t->string('content');
                $t->timestamps();
            });
        }
        #endregion
        #region payment
        if(!Schema::hasTable('payment')){
            Schema::create('payment',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_milestone');
                $t->foreign('_milestone')->references('id')->on('milestone')->onDelete('cascade');
                $t->unsignedInteger('_status');
                $t->foreign('_status')->references('id')->on('payment_status')->onDelete('cascade');
                $t->double('money');
                $t->timestamps();
            });
        }
        #endregion
        #region question_pack
        if(!Schema::hasTable('question_pack')){
            Schema::create('question_pack',function(Blueprint $t){
                $t->increments('id');
                $t->integer('min_mark');
                $t->unsignedInteger('_project');
                $t->foreign('_project')->references('id')->on('project')->onDelete('cascade');
                $t->string('description');
                $t->string('title');
                $t->timestamps();
            });
        }
        #endregion
        #region question
        if(!Schema::hasTable('question')){
            Schema::create('question',function(Blueprint $t){
                $t->increments('id');
                $t->string('question');
                $t->string('option_a');
                $t->string('option_b');
                $t->string('option_c');
                $t->string('option_d');
                $t->char('correct_option');
                $t->unsignedInteger('_pack');
                $t->foreign('_pack')->references('id')->on('question_pack')->onDelete('cascade');
                $t->timestamps();
            });
        }
        #endregion
        #region membership_pack
        if(!Schema::hasTable('membership_pack')){
            Schema::create('membership_pack',function(Blueprint $t){
                $t->increments('id');
                $t->string('title');
                $t->double('price');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region membership_package_meta
        if(!Schema::hasTable('membership_package_meta')){
            Schema::create('membership_package_meta',function(Blueprint $t){
                $t->increments('id');
                $t->string('meta_key');
                $t->string('meta_value');
                $t->unsignedInteger('_packet');
                $t->foreign('_packet')->references('id')->on('membership_pack')->onDelete('cascade');
                $t->timestamps();
            });
        }
        #endregion
        #region dispute_status
        if(!Schema::hasTable('dispute_status')) {
            Schema::create('dispute_status', function (Blueprint $t) {
                $t->increments('id');
                $t->string('status');
                $t->string('description');
                $t->timestamps();
            });
        }
        #endregion
        #region dispute_category
        if(!Schema::hasTable('dispute_category')){
            Schema::create('dispute_category',function(Blueprint $t){
                $t->increments('id');
                $t->string('name');
                $t->timestamps();
            });
        }
        #endregion    
        #region dispute
        if(!Schema::hasTable('dispute')){
            Schema::create('dispute',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_user_from');
                $t->foreign('_user_from')->references('id')->on('user')->onDelete('cascade');
                $t->unsignedInteger('_user_to');
                $t->foreign('_user_to')->references('id')->on('user')->onDelete('cascade');
                $t->unsignedInteger('_project');
                $t->foreign('_project')->references('id')->on('project')->onDelete('cascade');
                $t->string('description');
                $t->unsignedInteger('_status');
                $t->foreign('_status')->references('id')->on('dispute_status');
                $t->unsignedInteger('_category');
                $t->foreign('_category')->references('id')->on('dispute_category');
                $t->string('title');
                $t->timestamps();
            });
        }
        #endregion
        #region media_matching
        if(!Schema::hasTable('media_matching')){
            Schema::create('media_matching',function(Blueprint $t){
                $t->increments('id');
                $t->unsignedInteger('_user')->default('0');
                $t->foreign('_user')->references('id')->on('user')->onDelete('cascade');
                $t->unsignedInteger('_project')->default('0');
                $t->foreign('_project')->references('id')->on('project')->onDelete('cascade');
                $t->unsignedInteger('_media')->default('0');
                $t->foreign('_media')->references('id')->on('media')->onDelete('cascade');
                $t->timestamps();
            });
        }
        #endregion
        #region optional
        if(!Schema::hasTable('optional')){
            Schema::create('optional',function(Blueprint $t){
                $t->increments('id');
                $t->string('meta_key');
                $t->string('meta_value');
                $t->string('meta_name');
                $t->string('meta_description')->nullable();
                $t->timestamps();
            });
        }
        #endregion
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        #region table dropping
        Schema::dropIfExists('optional');
        Schema::dropIfExists('media_matching');
        Schema::dropIfExists('dispute');
        Schema::dropIfExists('dispute_category');
        Schema::dropIfExists('dispute_status');
        Schema::dropIfExists('membership_package_meta');
        Schema::dropIfExists('membership_pack');
        Schema::dropIfExists('question');
        Schema::dropIfExists('question_pack');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('milestone');
        Schema::dropIfExists('payment_status');
        Schema::dropIfExists('milestone_status');
        Schema::dropIfExists('project_meta');
        Schema::dropIfExists('tag');
        Schema::dropIfExists('rating');
        Schema::dropIfExists('rate_type');
        Schema::dropIfExists('bid');
        Schema::dropIfExists('bid_meta');
        Schema::dropIfExists('bid_status');
        Schema::dropIfExists('project_category');
        Schema::dropIfExists('review');
        Schema::dropIfExists('project');
        Schema::dropIfExists('project_status');
        Schema::dropIfExists('skill_user');
        Schema::dropIfExists('skill');
        Schema::dropIfExists('category');
        Schema::dropIfExists('order_meta');
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_type');
        Schema::dropIfExists('order_status');
        Schema::dropIfExists('user');
        Schema::dropIfExists('location');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('role');
        Schema::dropIfExists('permission');
        Schema::dropIfExists('user_status');
        Schema::dropIfExists('user_meta');
        Schema::dropIfExists('point');
        Schema::dropIfExists('media');
        DB::unprepared("DROP function IF EXISTS get_name_cate");
        #endregion table dropping
    }
}
