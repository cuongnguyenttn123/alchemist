<?php
/**
 * Created by PhpStorm.
 * User: khaih
 * Date: 11/13/18
 * Time: 10:53 AM
 */
/*Withdrawal*/
Route::group(['prefix' => 'withdrawal'], function(){
    Route::post('/withdrawal', [
        'as' => 'post_withdrawal',
        'uses' => 'withdrawalController@post_withdrawal'
    ]);
  Route::post('/withdrawal-bank', [
    'as' => 'post_withdrawal_bank',
    'uses' => 'withdrawalController@post_withdrawal_bank'
  ]);
});
/*end Withdrawal*/
//dispute
Route::group(['prefix' => 'dispute'], function(){
    //post + get dispute
  /*  Route::get('/new-dispute', [
        'as' => 'get_new_dispute',
        'uses' => 'disputeController@get_new_dispute'
    ]);*/
    Route::get('/new-dispute', [
        'as' => 'post_new_dispute',
        'uses' => 'disputeController@post_new_dispute'
    ]);
    //get list dispute
    Route::get('/list-dispute', [
        'as' => 'get_list_dispute',
        'uses' => 'disputeController@get_list_dispute'
    ]);

    //post update dispute
    Route::get('/update-dispute', [
        'as' => 'post_update_dispute',
        'uses' => 'disputeController@post_update_dispute'
    ]);
    //find arbiter
    Route::get('/find-arbiter', [
        'as' => 'find_arbiter',
        'uses' => 'disputeController@find_arbiter'
    ]);
     //add arbiter
    Route::get('/add-arbiter', [
        'as' => 'add_arbiter',
        'uses' => 'disputeController@add_arbiter'
    ]);
     //accept arbiter
    Route::get('/accept-arbiter', [
        'as' => 'accept_arbiter',
        'uses' => 'disputeController@accept_arbiter'
    ]);
    // accept cancel
    Route::post('/accept-cancel', [
        'as' => 'acceptcancel',
        'uses' => 'disputeController@acceptcancel'
    ]);
    //arbiter vote
    Route::get('/arbiter-vote', [
        'as' => 'arbiter_vote',
        'uses' => 'disputeController@arbiter_vote'
    ]);
    //arbiter vote
    Route::get('/arbiter-vote-single', [
        'as' => 'arbiter_vote_single',
        'uses' => 'disputeController@arbiter_vote_single'
    ]);
     //accept arbiter
    Route::get('/random-arbiter', [
        'as' => 'random_arbiter',
        'uses' => 'disputeController@random_arbiter'
    ]);
     //check arbiter
    Route::get('/check-arbiter', [
        'as' => 'check_arbiter',
        'uses' => 'disputeController@check_arbiter'
    ]);
    //check arbiter
    Route::get('/check-winner', [
        'as' => 'check_winner',
        'uses' => 'disputeController@check_winner'
    ]);
    //test upload file
    Route::get('/upload-file', [
        'as' => 'get_upload_file',
        'uses' => 'disputeController@get_upload_file'
    ]);
     Route::post('/upload-file', [
        'as' => 'post_upload_file',
        'uses' => 'disputeController@post_upload_file'
    ]);
    // test results_dispute
    Route::get('/results-dispute', [
        'as' => 'results_dispute',
        'uses' => 'disputeController@results_dispute'
    ]);
    //dispute_case_update
    Route::post('/dispute-case-create', [
        'as' => 'dispute_case_create',
        'uses' => 'disputeController@dispute_case_create'
    ]);
     //dispute_case_update
    Route::post('/dispute-case-update', [
        'as' => 'dispute_case_update',
        'uses' => 'disputeController@dispute_case_update'
    ]);
    //dispute_canceled
     // test results_dispute
    Route::get('/dispute-canceled', [
        'as' => 'dispute_canceled',
        'uses' => 'disputeController@dispute_canceled'
    ]);
     Route::get('/dispute-accept', [
        'as' => 'dispute_accept',
        'uses' => 'disputeController@dispute_accept'
    ]);
});
Route::get('/charge-credit', [
        'as' => 'getChargeCredit',
        'uses' => 'CreditController@getChargeCredit'
    ]);
Route::post('/charge-credit', [
        'as' => 'HandlingCredit',
        'uses' => 'CreditController@HandlingCredit'
    ]);
Route::get('/getPaymentStatus', [
        'as' => 'getPaymentStatus',
        'uses' => 'CreditController@getPaymentStatus'
    ]);
//search
Route::get('/test', [
        'as' => 'test',
        'uses' => 'ContestController@test'
    ]);
Route::group(['prefix' => 'profile'], function(){

    //get list contest user
    Route::get('/list-contest', [
        'as' => 'getListContest',
        'uses' => 'ContestController@getListContest'
    ]);
    //end get list
    //post + get edit contest
     Route::get('/edit-contest/{id}', [
        'as' => 'getEditContest',
        'uses' => 'ContestController@getEditContest'
    ]);
    Route::post('/edit-contest/{id}', [
        'as' => 'postEditContest',
        'uses' => 'ContestController@postEditContest'
    ]);
    //end
    //delete contest
    Route::get('/delete-contest/{id}', [
        'as' => 'deleteContest',
        'uses' => 'ContestController@deleteContest'
    ]);
    //
});
//contest detail
    Route::get('/contest_detail/{id}', [
        'as' => 'getContestDetail',
        'uses' => 'ContestController@getContestDetail'
    ]);
    Route::post('/contest-detail/{id}', [
        'as' => 'postContestDetail',
        'uses' => 'ContestController@getContestDetail'
    ]);
//end contest detail
//list All Contest
    Route::get('/list-contests', [
        'as' => 'getListAllContest',
        'uses' => 'ContestController@getListAllContest'
    ]);
Route::prefix("admin")->middleware(['adminLogin','verified'])->group(function(){
//Route::group(['prefix'=>'admin','middleware' => 'adminLogin'],function(){
    Route::get('/', function(){
        return view('admin.index');
    })->name('admin.index');

    Route::group(['prefix'=>'categories'],function(){
        //get list
        Route::get('/',[
            'as' => 'admin.categories',
            'uses' => 'CategoryController@listCategory',
        ]);
        //get post category
        Route::post('/update',[
            'as' => 'admin.categories.update',
            'uses' => 'CategoryController@createCategory',
        ]);
        //delete category
         Route::post('/delete_category',[
            'as' => 'admin.categories.delete_category',
            'uses' => 'CategoryController@delete_category',
        ]);
    });

    Route::group(['prefix'=>'tags'], function(){
        Route::get('/','TagController@index')->name('admin.tags');
        Route::get('/update','TagController@update')->name('admin.tags.update');
        Route::get('/delete','TagController@delete')->name('admin.tags.delete');
    });

    //skill admin
    Route::group(['prefix'=>'skills'], function(){
        //Route::get('/','SkillController@index')->name('admin.skills');
        Route::post('/update','SkillController@update')->name('admin.skills.update');
        Route::post('/delete','SkillController@delete')->name('admin.skills.delete');

         //get list
        Route::get('/',[
            'as' => 'admin.skills',
            'uses' => 'SkillController@listSkill',
        ]);
    });
    Route::group(['prefix'=>'optionals'], function (){
        Route::get('/','OptionalController@index')->name('admin.optionals');
        Route::post('/update','OptionalController@update')->name('admin.optionals.update');
        Route::post('/delete','OptionalController@delete')->name('admin.optionals.delete');
    });
    Route::group(['prefix'=>'project'], function(){
        Route::get('/','ProjectController@index')->name('admin.project');
        Route::get('/create','ProjectController@create')->name('admin.project.create');
        Route::get('/projects','ProjectController@projects')->name('admin.project.projects');
        Route::post('/update','ProjectController@update')->name('admin.project.update');
        Route::get('/modify/{id}','ProjectController@modify')->name('admin.project.modify');
        Route::post('/delete','ProjectController@delete')->name('admin.project.delete');
    });
    Route::group(['prefix'=>'locations'], function (){
        Route::get('/','LocationController@index')->name('admin.locations');
        Route::post('/update','LocationController@update')->name('admin.locations.update');
        Route::get('/delete/{id}','LocationController@delete')->name('admin.locations.delete');
        Route::post('/_states','LocationController@_states')->name("admin.locations._states");
        Route::post('/_cities','LocationController@_cities')->name("admin.locations._cities");
    });

    /*withdraw admin*/
     Route::group(['prefix'=>'withdraw'], function (){
        Route::get('/',[
            'as' => 'admin_list_withdraw',
            'uses' => 'withdrawalController@admin_list_withdraw',
        ]);
        Route::get('/accept_withdraw/{id}',[
            'as' => 'accept_withdraw',
            'uses' => 'withdrawalController@accept_withdraw',
        ]);
        Route::get('/cancel_withdraw/{id}',[
            'as' => 'cancel_withdraw',
            'uses' => 'withdrawalController@cancel_withdraw',
        ]);
    });
});
Route::group(["prefix"=>"file"], function(){
    Route::post("/upload", "FileController@upload")->name("file-upload");
    Route::get("/files", "FileController@files")->name("files");
});

Route::group(["prefix" => "bid"], function(){
  Route::post("/bid-create", "BidController@create")->name("bid.create");
});


// hung
Route::get('contact',function(){
    $user = Auth::user();
    return view('contact', compact('user'));
})->name('contact');


