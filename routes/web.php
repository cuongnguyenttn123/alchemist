<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
  return view('welcome');
});


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('testmail', function () {
  \Mail::raw('plain text message \n alooo', function ($message) {
    $message->to('vukhanhthien197@gmail.com');
    // $message->cc('vukhanhthien197@gmail.com');
    // $message->bcc('vukhanhthien197@gmail.com');
    $message->subject('Subject zzzzzz');
  });
});

Route::get('/delatt/{id}', 'ProfileController@delatt')->name('delatt');

/*****SOCIAL LOGIN*****/
Route::get('auth/facebook', 'Auth\SocialAuthController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'Auth\SocialAuthController@handleFacebookCallback');
Route::get('auth/twitter', 'Auth\SocialAuthController@redirectToTwitter')->name('auth.twitter');
Route::get('auth/twitter/callback', 'Auth\SocialAuthController@handleTwitterCallback');

/********Frontend********/

Route::group(['prefix' => 'ajax'], function () {
  Route::post('/bank-deposit', [
    'as' => 'ajax.postbankdeposit',
    'uses' => 'BankController@postBankDeposit'
  ]);
  Route::post('/login', [
    'as' => 'ajax.login',
    'uses' => 'AjaxController@login'
  ]);
  Route::post('/register', [
    'as' => 'ajax.register',
    'uses' => 'AjaxController@register'
  ]);
  Route::post('/forgot-password', [
    'as' => 'ajax.forgot',
    'uses' => 'AjaxController@forgot'
  ]);
  Route::post('/saveinfo', [
    'as' => 'ajax.saveinfo',
    'uses' => 'AjaxController@saveInfo'
  ]);
  Route::get('/getstate', [
    'as' => 'ajax.getstate',
    'uses' => 'AjaxController@getState'
  ]);
  Route::post('/getskills', [
    'as' => 'ajax.getskills',
    'uses' => 'AjaxController@getskills'
  ]);
  Route::post('/searchskill', [
    'as' => 'ajax.searchskill',
    'uses' => 'AjaxController@searchskill'
  ]);
  Route::post('/saveskill', [
    'as' => 'ajax.saveskill',
    'uses' => 'AjaxController@saveskill'
  ]);
  Route::get('/getallskills', [
    'as' => 'ajax.getallskills',
    'uses' => 'AjaxController@getallskills'
  ]);
  Route::post('/award_bid', [
    'as' => 'ajax.award_bid',
    'uses' => 'AjaxController@award_bid'
  ]);
  Route::post('/cancelawardbid', [
    'as' => 'ajax.cancelawardbid',
    'uses' => 'AjaxController@cancelawardbid'
  ]);
  Route::post('/acceptawardbid', [
    'as' => 'ajax.acceptawardbid',
    'uses' => 'AjaxController@acceptawardbid'
  ]);
  Route::post('/loadmedia', [
    'as' => 'ajax.loadmedia',
    'uses' => 'AjaxController@loadmedia'
  ]);
  Route::post('/loadinfo', [
    'as' => 'ajax.loadinfo',
    'uses' => 'AjaxController@loadinfo'
  ]);
  Route::post('/updateuserphoto', [
    'as' => 'ajax.updateuserphoto',
    'uses' => 'AjaxController@updateUserPhoto'
  ]);
  Route::post('/adduserfavorite', [
    'as' => 'ajax.adduserfavorite',
    'uses' => 'AjaxController@addUserFavorite'
  ]);
  Route::post('/favoritenewsfeed', [
    'as' => 'ajax.favoritenewsfeed',
    'uses' => 'AjaxController@addFavoriteSave'
  ]);

  Route::post('/favoritetimeline', [
    'as' => 'ajax.favoritetimeline',
    'uses' => 'AjaxController@addFavoriteSave'
  ]);

  Route::post('/saveproject', [
    'as' => 'ajax.saveproject',
    'uses' => 'AjaxController@addJobFavorite'
  ]);
  Route::post('/savefavorite', [
    'as' => 'ajax.savefavorite',
    'uses' => 'AjaxController@addRemoveFavorite'
  ]);

  Route::post('/postreview', [
    'as' => 'ajax.postreview',
    'uses' => 'AjaxController@postReview'
  ]);
  Route::post('/bidjob', [
    'as' => 'ajax.bidjob',
    'uses' => 'AjaxController@bidjob'
  ]);
  Route::post('/bidproject', [
    'as' => 'ajax.bidproject',
    'uses' => 'AjaxController@bidProject'
  ]);
  Route::post('/bidedit', [
    'as' => 'ajax.getBidEdit',
    'uses' => 'AjaxController@getBidEdit'
  ]);
  Route::post('/bidinfo', [
    'as' => 'ajax.getBidinfo',
    'uses' => 'AjaxController@getBidinfo'
  ]);
  Route::post('/postAlbum', [
    'as' => 'ajax.newalbum',
    'uses' => 'AjaxController@postAlbum'
  ]);
  Route::post('/delalbum', [
    'as' => 'ajax.delalbum',
    'uses' => 'AjaxController@deleteAlbum'
  ]);
  Route::post('/editalbum', [
    'as' => 'ajax.editalbum',
    'uses' => 'AjaxController@getEditAlbum'
  ]);
  Route::post('/getpostalbum', [
    'as' => 'ajax.getpostalbum',
    'uses' => 'AjaxController@getPostAlbum'
  ]);
  Route::post('/albumtofeed', [
    'as' => 'ajax.albumtofeed',
    'uses' => 'AjaxController@albumToFeed'
  ]);

  Route::get('/testBlockChain', [
    'as' => 'ajax.test.blockchain',
    'uses' => 'AjaxController@testApiBlockChain'
  ]);

  Route::post('/postcomment', [
    'as' => 'ajax.postcomment',
    'uses' => 'AjaxController@postComment'
  ]);
  Route::post('/new-video-status', [
    'as' => 'ajax.newvideo.status',
    'uses' => 'AjaxController@postVideoStatus'
  ]);
  Route::post('/post-album-video', [
    'as' => 'ajax.post-album-video',
    'uses' => 'AjaxController@postAlbumVideo'
  ]);
  Route::post('/newvideo', [
    'as' => 'ajax.newvideo',
    'uses' => 'AjaxController@postVideo'
  ]);
  Route::post('/updatevideo', [
    'as' => 'ajax.updatevideo',
    'uses' => 'AjaxController@updateVideo'
  ]);
  Route::post('/delvideo', [
    'as' => 'ajax.delvideo',
    'uses' => 'AjaxController@deleteVideo'
  ]);
  Route::post('/imagevideo', [
    'as' => 'ajax.imagevideo',
    'uses' => 'AjaxController@updateImageVideo'
  ]);
  Route::post('/likepost', [
    'as' => 'ajax.likepost',
    'uses' => 'AjaxController@likePost'
  ]);

  Route::post('/likestatus', [
    'as' => 'ajax.likestatus',
    'uses' => 'AjaxController@likeStatus'
  ]);

  Route::post('/likecmt', [
    'as' => 'ajax.likecmt',
    'uses' => 'AjaxController@likeCmt'
  ]);
  Route::post('/likecmtchil', [
    'as' => 'ajax.likecmtchil',
    'uses' => 'AjaxController@likeCmtchil'
  ]);
  Route::post('/disLikeCmt', [
    'as' => 'ajax.disLikeCmt',
    'uses' => 'AjaxController@disLikeCmt'
  ]);
  Route::post('/heart', [
    'as' => 'ajax.heart',
    'uses' => 'AjaxController@heart'
  ]);

  Route::post('/poststatus', [
    'as' => 'ajax.poststatus',
    'uses' => 'AjaxController@postStatus'
  ]);Route::post('/posteditcomment', [
    'as' => 'ajax.editcomment',
    'uses' => 'AjaxController@posteditComment'
  ]);
  Route::post('/postvideolink', [
    'as' => 'ajax.postvideolink',
    'uses' => 'AjaxController@postVideoLink'
  ]);

  Route::post('/previewlink', [
    'as' => 'ajax.previewlink',
    'uses' => 'AjaxController@previewLink'
  ]);
  Route::post('/previewlinkcomment', [
    'as' => 'ajax.previewlinkcomment',
    'uses' => 'AjaxController@previewLinkComment'
  ]);
  Route::post('/previewimage', [
    'as' => 'ajax.previewimage',
    'uses' => 'AjaxController@previewImage'
  ]);

  Route::post('/previewfile', [
    'as' => 'ajax.previewfile',
    'uses' => 'AjaxController@previewFile'
  ]);
  Route::post('/load-timeline', [
    'as' => 'ajax.load-timeline',
    'uses' => 'AjaxController@loadTimeline'
  ]);
  Route::post('/delete_post', [
    'as' => 'ajax.delpost',
    'uses' => 'AjaxController@deletePost'
  ]);
  Route::post('/delete_cmt', [
    'as' => 'ajax.delcmt',
    'uses' => 'AjaxController@deleteCmt'
  ]);

  Route::post('/get_post', [
    'as' => 'ajax.getpost',
    'uses' => 'AjaxController@ajaxGetPost'
  ]);  Route::post('/get_cmt', [
    'as' => 'ajax.getcmt',
    'uses' => 'AjaxController@ajaxGetCmt'
  ]);

  Route::post('/edit_post', [
    'as' => 'ajax.editpost',
    'uses' => 'AjaxController@ajaxEditPost'
  ]);

  Route::post('/report_post', [
    'as' => 'ajax.reportPost',
    'uses' => 'AjaxController@reportNewsFeed'
  ]);
  Route::post('/popupcomment', [
    'as' => 'ajax.popupComment',
    'uses' => 'AjaxController@popupComment'
  ]);
  Route::post('/popupcommentcmt', [
    'as' => 'ajax.popupCommentcmt',
    'uses' => 'AjaxController@popupCommentcmt'
  ]);
  Route::post('/popupcommentback', [
    'as' => 'ajax.popupCommentback',
    'uses' => 'AjaxController@popupCommentBack'
  ]);
  Route::post('/popupcommentright', [
    'as' => 'ajax.popupCommentright',
    'uses' => 'AjaxController@popupCommentright'
  ]);


  /*****/
  Route::post('/bidmessages', [
    'as' => 'bid.getmessages',
    'uses' => 'BidController@getMessages'
  ]);
  Route::post('/bidmessage', [
    'as' => 'bid.postmessage',
    'uses' => 'BidController@postMessage'
  ]);
  Route::post('/postfiles', [
    'as' => 'contest.ajaxPostFile',
    'uses' => 'ContestController@ajaxPostFile'
  ]);

  Route::post('/postfiles-job', [
    'as' => 'project.ajaxPostFile',
    'uses' => 'ProfileController@ajaxPostFile'
  ]);

  Route::post('/posttest', [
    'as' => 'contest.ajaxPostTest',
    'uses' => 'ContestController@ajaxPostTest'
  ]);
  Route::post('/ajaxSetWinner', [
    'as' => 'contest.ajaxSetWinner',
    'uses' => 'ContestController@ajaxSetWinner'
  ]);
  Route::post('/lockunlock', [
    'as' => 'contest.lockunlock',
    'uses' => 'ContestController@lockUnlock'
  ]);
  Route::post('/paymentcontest', [
    'as' => 'contest.paymentcontest',
    'uses' => 'ContestController@paymentContest'
  ]);
  Route::post('/project', [
    'as' => 'project.postmessage',
    'uses' => 'ProjectController@postMessage'
  ]);
  Route::post('/loadmore', [
    'as' => 'profile.loadmorejob',
    'uses' => 'ProfileController@loadMoreManage'
  ]);
  Route::post('/deleteNotif', [
    'as' => 'deleteNotif',
    'uses' => 'AjaxController@deleteNotif'
  ]);
});

Route::get('/logout', [
  'as' => 'user.logout',
  'uses' => 'HomeController@logout'
]);
Route::get('/', [
  'as' => 'home',
  'uses' => 'HomeController@index'
]);
Route::get('/register', [
  'as' => 'admin.register',
  'uses' => 'userController@reg'
]);
Route::post('/register', [
  'as' => 'admin.register',
  'uses' => 'userController@postReg'
]);
Route::post('/login', [
  'as' => 'user.login',
  'uses' => 'userController@postLogin'
]);
//test active email
Route::get('/user/activation/{token}', 'AjaxController@userActivation')->name('activation.url');
Route::get('/password/reset/{token}', 'AjaxController@userActivation')->name('password.customReset');
// loadmore right newfeed
Route::get('/loadmorenewfeed/load-data', 'HomeController@loadData')->name('loadmore.load-data');
//load more left newfeed
Route::get('/loadmoreleftnewfeed/load-data-left', 'HomeController@loadDataLeft')->name('loadmore.load-data-left');
//loadmoreCMT
Route::get('/more-cmt', [
  'as' => 'more-cmt',
  'uses' => 'HomeController@loadComment'
]);
//
Route::post('/newsfeed-more', [
  'as' => 'newsfeed-more',
  'uses' => 'HomeController@ajaxNewsfeed'
]);
Route::get('/newsfeed', [
  'as' => 'newsfeed',
  'uses' => 'HomeController@newsfeed'
]);

Route::get('/newsfeed/{id}', [
  'as' => 'newsfeed.detail',
  'uses' => 'HomeController@newsFeedDetail'
]);

Route::get('/search', [
  'as' => 'search',
  'uses' => 'HomeController@search'
]);
Route::get('/search/category/{slug}-{id}', [
  'as' => 'search.cat',
  'uses' => 'HomeController@searchCat'
]);
Route::get('/jobdetail/{id}', [
  'as' => 'jobdetail',
  'uses' => 'HomeController@jobdetail'
]);
Route::post('/jobdetail/{id}', [
  'as' => 'postbid',
  'uses' => 'HomeController@postbid'
]);
Route::get('/upgrade', [
  'as' => 'upgrade',
  'uses' => 'HomeController@upgrade'
]);
Route::get('/find_alchemist', [
  'as' => 'find_alchemist',
  'uses' => 'SearchController@alchemist'
]);
Route::get('/find_seeker', [
  'as' => 'find_seeker',
  //	'uses' => 'HomeController@find_seeker'
  'uses' => 'HomeController@find_seeker'
]);
Route::get('/search', [
  'as' => 'search',
  'uses' => 'SearchController@projects'
]);
Route::get('/search-alchemist', [
  'as' => 'search.alchemist',
  'uses' => 'SearchController@searchAlchemist'
]);
/*Seaches*/
//Route::get('/search/seekers', [
//  'as' => 'search.seekers',
//  'uses' => 'SearchController@seekers'
//]);
/*ENd Seaches*/

Route::get('/deposit', [
  'as' => 'deposit',
  'uses' => 'HomeController@deposit'
]);
Route::post('/deposit', [
  'as' => 'postdeposit',
  'uses' => 'PaypalController@postDeposit'
]);
Route::post('/stripe-deposit', [
  'as' => 'poststripedeposit',
  'uses' => 'StripeController@postStripeDeposit'
]);
Route::post('/stripe-credit', [
  'as' => 'poststripecreditdeposit',
  'uses' => 'CreditController@HandlingCreditStripe'
]);
Route::post('/bank-credit', [
  'as' => 'postbankcreditdeposit',
  'uses' => 'CreditController@HandlingCreditBank'
]);
Route::get('/xulydeposit', [
  'as' => 'xulydeposit',
  'uses' => 'PaypalController@xulyDeposit'
]);
Route::get('/contest-detail/{id}', [
  'as' => 'contest.detail',
  'uses' => 'ContestController@getContestDetail'
]);

// route for view/blade file
Route::get('paywithpaypal', array('as' => 'paywithpaypal', 'uses' => 'PaypalController@payWithPaypal',));
// route for post request
Route::post('paypal', array('as' => 'paypal', 'uses' => 'PaypalController@postPaymentWithpaypal',));
// route for check status responce
Route::get('paypal', array('as' => 'status', 'uses' => 'PaypalController@getPaymentStatus',));

Route::get('getbillingplan', array('as' => 'getbillingplan', 'uses' => 'PaypalController@getbillingplan',));
Route::get('exebillingplan', array('as' => 'exebillingplan', 'uses' => 'PaypalController@exebillingplan',));

//view user
Route::group(['prefix' => 'user'], function () {
  Route::get('/{id}', ['as' => 'user.timeline', 'uses' => 'HomeController@userTimeline']);
  Route::get('/{id}/timeline', ['as' => 'user.timeline', 'uses' => 'HomeController@userTimeline']);
  Route::get('/{id}/portfolio', ['as' => 'user.portfolio', 'uses' => 'HomeController@userPortfolio']);
  Route::get('/{id}/articles', ['as' => 'user.articles', 'uses' => 'HomeController@userArticles']);
  Route::get('/{id}/stats', ['as' => 'user.stats', 'uses' => 'HomeController@userStats']);
  Route::get('/{id}/saveusers', ['as' => 'user.saveusers', 'uses' => 'HomeController@userSave']);
});

//Profile
//Route::prefix("profile")->middleware(['verified'])->group(function(){

Route::group(['prefix' => 'profile'], function () {
  //main profile
  Route::get('/about', ['as' => 'profile.about', 'uses' => 'ProfileController@about']);
  Route::get('/timeline', ['as' => 'profile.timeline', 'uses' => 'ProfileController@timeline']);
  Route::get('/porfolio', ['as' => 'profile.portfolio', 'uses' => 'ProfileController@portfolio']);
  Route::get('/articles', ['as' => 'profile.articles', 'uses' => 'ProfileController@articles']);
  Route::get('/stats', ['as' => 'profile.stats', 'uses' => 'ProfileController@stats']);


  Route::get('/', [
    'as' => 'profile.index',
    'uses' => 'ProfileController@info'
  ]);

  Route::get('/get-total', [
    'as' => 'ajax.get-total',
    'uses' => 'ProjectController@getTotalJob'
  ]);
  Route::get('/info', [
    'as' => 'profile.info',
    'uses' => 'ProfileController@info'
  ]);
  Route::post('info', [
    'as' => 'profile.info',
    'uses' => 'ProfileController@saveInfo'
  ]);
  Route::post('price', [
    'as' => 'profile.price',
    'uses' => 'ProfileController@savePrice'
  ]);
  Route::get('/settings', [
    'as' => 'profile.settings',
    'uses' => 'ProfileController@settings'
  ]);
  Route::post('/settings', [
    'as' => 'profile.settings',
    'uses' => 'ProfileController@saveSettings'
  ]);
  Route::get('/change-password', [
    'as' => 'profile.change_pass',
    'uses' => 'ProfileController@change_pass'
  ]);
  Route::post('/change-password', [
    'as' => 'profile.change_pass',
    'uses' => 'ProfileController@saveChange_pass'
  ]);
  Route::get('/hobbies-and-interests', [
    'as' => 'profile.hnb',
    'uses' => 'ProfileController@hnb'
  ]);
  Route::post('/hobbies-and-interests', [
    'as' => 'profile.hnb',
    'uses' => 'ProfileController@savehnb'
  ]);
  Route::get('/education-and-employement', [
    'as' => 'profile.ene',
    'uses' => 'ProfileController@ene'
  ]);
  Route::post('/education-and-employement', [
    'as' => 'profile.ene',
    'uses' => 'ProfileController@saveene'
  ]);
  Route::get('/mywallet', [
    'as' => 'profile.mywallet',
    'uses' => 'ProfileController@mywallet'
  ]);
  Route::get('/myskills', [
    'as' => 'profile.myskills',
    'uses' => 'ProfileController@myskills'
  ]);
  Route::post('/myskills', [
    'as' => 'profile.myskills',
    'uses' => 'ProfileController@saveMyskills'
  ]);
  Route::get('/myprojects', [
    'as' => 'profile.myprojects',
    'uses' => 'ProfileController@myprojects'
  ]);
  Route::get('/manage-jobcontest', [
    'as' => 'profile.myprojects',
    'uses' => 'ProfileController@manageJobs'
  ]);
  Route::get('/project-bids/{slug}-{id}', [
    'as' => 'profile.projectBids',
    'uses' => 'ProfileController@projectBids'
  ]);
  Route::get('/tracking/{slug}-{id}', [
    'as' => 'profile.tracking',
    'uses' => 'ProfileController@projectTracking'
  ]);
  Route::get('/project/{id}', [
    'as' => 'profile.singleproject',
    'uses' => 'ProfileController@singleproject'
  ]);
  Route::get('/newproject', [
    'as' => 'profile.newproject',
    'uses' => 'ProfileController@newproject'
  ]);
  Route::post('/newproject', [
    'as' => 'profile.postjob',
    'uses' => 'ProfileController@postjob'
  ]);
  Route::get('/editproject/{id}', [
    'as' => 'profile.editproject',
    'uses' => 'ProfileController@editproject'
  ]);
  Route::post('/editproject/{id}', [
    'as' => 'profile.editproject',
    'uses' => 'ProfileController@posteditproject'
  ]);
  Route::get('/deleteproject/{id}', [
    'as' => 'profile.deleteproject',
    'uses' => 'ProfileController@deleteproject'
  ]);
  Route::get('/myjobpostings', [
    'as' => 'profile.myjobpostings',
    'uses' => 'ProfileController@myjobpostings'
  ]);
  Route::get('/notifications', [
    'as' => 'profile.notifications',
    'uses' => 'ProfileController@notifications'
  ]);
  Route::get('/saveusers', [
    'as' => 'profile.saveusers',
    'uses' => 'ProfileController@saveUsers'
  ]);
  Route::get('/savejobs', [
    'as' => 'profile.savejobs',
    'uses' => 'ProfileController@saveJobs'
  ]);
  Route::post('/projectmessage', [
    'as' => 'profile.projectmessage',
    'uses' => 'ProfileController@postProjectMessage'
  ]);
  //project
  Route::post('/getbids', [
    'as' => 'project.getBids',
    'uses' => 'ProjectController@getBids'
  ]);
  Route::post('/changeShortlist', [
    'as' => 'project.changeShortlist',
    'uses' => 'ProjectController@changeShortlist'
  ]);
  Route::post('/upload', [
    'as' => 'project.upload',
    'uses' => 'ProjectController@trackingUpload'
  ]);
  Route::post('/milestone_request', [
    'as' => 'ajax.milestone_request',
    'uses' => 'ProjectController@milestoneRequest'
  ]);
  Route::post('/milestone_start', [
    'as' => 'ajax.milestone_start',
    'uses' => 'ProjectController@milestoneStart'
  ]);

  Route::post('/release_payment', [
    'as' => 'ajax.release_payment',
    'uses' => 'ProjectController@releasePayment'
  ]);
  Route::post('/complete_project', [
    'as' => 'ajax.complete_project',
    'uses' => 'ProjectController@completeProject'
  ]);
  Route::post('/complete_milestone', [
    'as' => 'ajax.complete_milestone',
    'uses' => 'MilestoneController@complete'
  ]);

  Route::get('/thefinancemanager', [
    'as' => 'profile.thefinancemanager',
    'uses' => 'ProfileController@finance'
  ]);
  Route::post('/new-dispute', [
    'as' => 'profile.newdispute',
    'uses' => 'disputeController@newDispute'
  ]);
  Route::get('/dispute/{id}', [
    'as' => 'dispute.single',
    'uses' => 'disputeController@singleDispute'
  ]);
  Route::post('/random', [
    'as' => 'dispute.random',
    'uses' => 'disputeController@random_arbiter'
  ]);
  Route::post('/accept_arbiter', [
    'as' => 'dispute.accept_arbiter',
    'uses' => 'disputeController@accept_arbiter'
  ]);
  Route::post('/arbiter_vote', [
    'as' => 'dispute.arbiter_vote',
    'uses' => 'disputeController@arbiter_vote'
  ]);
  Route::post('/acceptcancel', [
    'as' => 'dispute.acceptcancel',
    'uses' => 'disputeController@acceptcancel'
  ]);
  Route::post('/sendcase', [
    'as' => 'dispute.sendcase',
    'uses' => 'disputeController@sendCase'
  ]);
  Route::post('/disputesave', [
    'as' => 'dispute.arbiter-save',
    'uses' => 'disputeController@arbiterSave'
  ]);
  Route::post('/disputevote', [
    'as' => 'dispute.submit-vote',
    'uses' => 'disputeController@submitVote'
  ]);
  Route::post('/disputeacceptcancel', [
    'as' => 'dispute.goprocess',
    'uses' => 'disputeController@acceptCancelDispute'
  ]);
  Route::post('/dispute-payment', [
    'as' => 'dispute.payment',
    'uses' => 'disputeController@disputePayment'
  ]);
  Route::post('/dispute-continue', [
    'as' => 'dispute.continue',
    'uses' => 'disputeController@disputeContinue'
  ]);

  //post + get contest
  Route::get('/new-contest', [
    'as' => 'profile.newcontest',
    'uses' => 'ContestController@get_new_contest'
  ]);
  Route::post('/new-contest', [
    'as' => 'profile.newcontest',
    'uses' => 'ContestController@post_new_contest'
  ]);
});


/********ADMIN**********/
Route::group(['prefix' => 'admin'], function () {
  //phog test mail
  Route::get('/sendemail', [
    'as' => 'getSendMail',
    'uses' => 'SendEmailController@getSendMail'
  ]);
  Route::post('/sendemail', [
    'as' => 'postSendMail',
    'uses' => 'SendEmailController@postSendMail'
  ]);
  //end test email
  //phong test notification
  Route::get('/send-notification', [
    'as' => 'getSendNotification',
    'uses' => 'NotificationController@getSendNotification'
  ]);
  //all read
  Route::get('/allmarkAsRead', [
    'as' => 'getMarkAsRead',
    'uses' => 'NotificationController@getMarkAsRead'
  ]);
  Route::post('/markAsRead', [
    'as' => 'markAsRead',
    'uses' => 'NotificationController@markAsRead'
  ]);
  //end test notification
  Route::get('/login', [
    'as' => 'adminlogin',
    'uses' => 'adminController@getLogin'
  ]);

  Route::post('/', [
    'as' => 'admin.login',
    'uses' => 'adminController@postLogin'
  ]);
  //logout
  Route::get('logout', [
    'as' => 'logout',
    'uses' => 'adminController@getLogout',
  ]);
});
//
Route::prefix("admin")->middleware(['adminLogin', 'verified'])->group(function () {

  //Route::group(['prefix'=>'admin','middleware' => 'adminLogin','verified'],function(){

  //dashboard
  Route::get('/dashboard', [
    'as' => 'getDashboard',
    'uses' => 'adminController@getDashboard',
  ]);
  //status
  Route::group(['prefix' => 'status'], function () {

    Route::get('/', [
      'as' => 'admin.status',
      'uses' => 'ManageStatusController@getlist',
    ]);
    Route::post('add', [
      'as' => 'admin.status.add',
      'uses' => 'ManageStatusController@create'
    ]);
    Route::get('delete/type/{type}/id/{id}', [
      'as' => 'admin.status.delete',
      'uses' => 'ManageStatusController@delete'
    ]);
  });
  //user
  Route::group(['prefix' => 'users'], function () {
    // lấy list all user
    Route::get('list', [
      'as' => 'getListUser',
      'uses' => 'userController@getListUser',
      // 'middleware' => ['permission:list-user|add-user|edit-user|delete-user']
    ]);
    Route::get('add-new', [
      'as' => 'getCreateUser',
      'uses' => 'userController@getCreateUser',
      // 'middleware' => ['permission:list-user|add-user|edit-user|delete-user']
    ]);
    Route::post('add-new', [
      'as' => 'postCreateUser',
      'uses' => 'userController@postCreateUser',
      // 'middleware' => ['permission:list-user|add-user|edit-user|delete-user']
    ]);

    Route::get('edit-user/{id}', [
      'as' => 'getEditUser',
      'uses' => 'userController@getEditUser',
      // 'middleware' => ['permission:list-user|add-user|edit-user|delete-user']
    ]);
    Route::post('edit-user/{id}', [
      'as' => 'postEditUser',
      'uses' => 'userController@postEditUser',
      // 'middleware' => ['permission:list-user|add-user|edit-user|delete-user']
    ]);
    Route::get('delete-user/{id}', [
      'as' => 'deleteUser',
      'uses' => 'userController@deleteUser',
      // 'middleware' => ['permission:list-user|add-user|edit-user|delete-user']
    ]);
  });
  //membership package
  Route::group(['prefix' => 'mempack'], function () {
    Route::get('/', [
      'as' => 'mempack.list',
      'uses' => 'packageMembershipController@getList',
      // 'middleware' => ['permission:package-list']
    ]);
    Route::get('list', [
      'as' => 'mempack.list',
      'uses' => 'packageMembershipController@getList',
      // 'middleware' => ['permission:package-list']
    ]);

    Route::get('add-new', [
      'as' => 'mempack.add',
      'uses' => 'packageMembershipController@getCreate',
      // 'middleware' => ['permission:package-add']
    ]);
    Route::post('add-new', [
      'as' => 'mempack.add',
      'uses' => 'packageMembershipController@postCreate',
      // 'middleware' => ['permission:package-add']
    ]);

    Route::get('edit/{id}', [
      'as' => 'mempack.edit',
      'uses' => 'packageMembershipController@getEdit',
      // 'middleware' => ['permission:package-edit']
    ]);
    Route::post('edit/{id}', [
      'as' => 'mempack.edit',
      'uses' => 'packageMembershipController@postEdit',
      // 'middleware' => ['permission:package-edit']
    ]);
    Route::get('delete/{id}', [
      'as' => 'mempack.delete',
      'uses' => 'packageMembershipController@getDelete',
      // 'middleware' => ['permission:package-delete']
    ]);
  });
  //role
  Route::group(['prefix' => 'role'], function () {
    Route::get('list', [
      'as' => 'role.list',
      'uses' => 'roleController@getListRole',
      // 'middleware' => ['permission:role-list']
    ]);

    Route::get('add-new', [
      'as' => 'role.add',
      'uses' => 'roleController@getCreateRole',
      // 'middleware' => ['permission:role-add']
    ]);
    Route::post('add-new', [
      'as' => 'role.add',
      'uses' => 'roleController@postCreateRole',
      // 'middleware' => ['permission:role-add']
    ]);

    Route::get('edit/{id}', [
      'as' => 'role.edit',
      'uses' => 'roleController@getEditRole',
      // 'middleware' => ['permission:role-edit']
    ]);
    Route::post('edit/{id}', [
      'as' => 'role.edit',
      'uses' => 'roleController@postEditRole',
      // 'middleware' => ['permission:role-edit']
    ]);
    Route::get('delete/{id}', [
      'as' => 'role.delete',
      'uses' => 'roleController@getDeleteRole',
      // 'middleware' => ['permission:role-delete']
    ]);
  });

  Route::group(['prefix' => 'tags'], function () {
    Route::get('/', 'TagController@index')->name('admin.tags');
    Route::get('/update', 'TagController@update')->name('admin.tags.update');
    Route::get('/delete', 'TagController@delete')->name('admin.tags.delete');
  });
  Route::group(['prefix' => 'optionals'], function () {
    Route::get('/', 'OptionalController@index')->name('admin.optionals');
    Route::post('/update', 'OptionalController@update')->name('admin.optionals.update');
    Route::post('/delete', 'OptionalController@delete')->name('admin.optionals.delete');
  });
});

//route for test
Route::get('/urllink','TestController@testurl');
Route::resource('alo', 'TestController');
Route::get('/testz', 'TestController@test');
Route::get('/query', 'TestController@query');
Route::get('/image', 'TestController@image');
Route::get('/testevent', 'TestController@testevent');
Route::get('/sendmailreg', 'TestController@sendmailreg');
Route::get('/finduser', 'TestController@finduser');
Route::get('/testip', 'TestController@testip');
Route::get('/delreview/{id}', 'TestController@delReview');
Route::get('/delalbum/{id}', 'TestController@delAlbum');
Route::get('/del/project/{id}', 'TestController@delProject');
Route::get('/del/user/{id}', 'TestController@delUser');

use App\Models\Bid;
use App\Models\User;
use App\Models\Entrie;
use App\Models\Review;
use App\Models\Arbiter;
use App\Models\Contest;
use App\Models\Dispute;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Milestone;
use App\Models\Withdrawal;
use App\Models\DisputeCase;
use App\Models\ChargeCredit;
use Illuminate\Http\Request;
use App\Mail\Contest\Alchemist;
use App\Mail\Site\VerifyAccount;
use App\Models\MilestoneRequest;
use App\Mail\Dispute\ArbiterResult;
use App\Mail\Project\Seeker\NewBid;
use App\Mail\Project\ReceivedReview;
use App\Mail\Project\WriteReview;
use Illuminate\Support\Facades\Mail;
use App\Mail\Dispute\ArbiterReviewCase;
use App\Mail\Site\AccountPasswordReset;
use App\Mail\Contest\Seeker\SelectPodium;
use App\Mail\Dispute\AllArbitersAccepted;
use App\Mail\Dispute\SeekerDisputeInvoice;
use App\Mail\Site\FinanceWithdrawlInvoice;
use App\Mail\Contest\Alchemist\ContestsNew;
use App\Mail\Project\Alchemist\ProjectsNew;
use App\Mail\Contest\Seeker\NewContestEntry;
use App\Mail\Site\FinanceDepositMadeReceipt;
use App\Mail\Dispute\AlchemistDisputeInvoice;
use App\Mail\Project\Alchemist\MilestonePaid;
use App\Mail\Dispute\PlaintiffDisputeAccepted;
use App\Mail\Project\Alchemist\BidAwardedAction;
use App\Mail\Site\FinanceCreditPurchasedReceipt;
use App\Mail\Dispute\ArbiterArbitrationInvitation;
use App\Mail\Project\Seeker\MilestonePaymentRequest;
use App\Mail\Contest\Seeker\ContestPaymentAndResults;
use App\Mail\Contest\Alchemist\RunnerUpContestResults;
use App\Mail\Dispute\DefendantPlaintiffRequestedDispute;
use App\Mail\Dispute\DisputeResultsArbiterPlaintiffDefendant;
use App\Mail\Dispute\PlaintiffSentDisputeRequestConfirmation;
use App\Mail\Contest\Alchemist\WinnerContestPaymentAndResults;

Route::name('email.')->prefix('email')->group(function () {

  Route::name('contests.')->prefix('contests')->group(function () {
    Route::get('{contest}/enter', function () {
      return response('contest enter');
    })->name('enter');

    Route::get('{contest}/save', function () {
      return response('contest save');
    })->name('save');

    Route::get('{contest}/results', function () {
      return response('contest results');
    })->name('results');

    Route::get('{contest}/entries', function () {
      return response('contest results');
    })->name('entries');

    Route::get('view-more', function () {
      return response('view-more');
    })->name('view-more');
  });


  Route::name('milestones.')->prefix('milestones')->group(function () {
    Route::get('{milestone}/dashboard', function () {
      return response('milestone.dashboard');
    })->name('dashboard');
  });


  Route::name('bids.')->prefix('bids')->group(function () {
    Route::get('{bid}/view', function () {
      return response('bid.view');
    })->name('view');

    Route::get('{bid}/negotiate', function () {
      return response('bid.negotiate');
    })->name('negotiate');

    Route::get('view-all', function () {
      return response('bid.view-all');
    })->name('view-all');
  });

  Route::name('reviews.')->prefix('reviews')->group(function () {
    Route::get('create', function () {
      return response('review.create');
    })->name('create');
  });


  Route::name('projects.')->prefix('projects')->group(function () {
    Route::get('{project}/dashboard', function (Project $project) {
      return response('project.dashboard');
    })->name('dashboard');

    Route::get('{project}/save', function (Project $project) {
      return response('project.save');
    })->name('save');

    Route::get('{project}/accept', function (Project $project) {
      return response('project.accept');
    })->name('accept');

    Route::get('{project}/reject', function (Project $project) {
      return response('project.reject');
    })->name('reject');

    Route::get('{project}/bid', function (Project $project) {
      return response('project.bid');
    })->name('bid');

    Route::get('{project}/write-arbiter-review', function (Project $project) {
      return response('project.write-arbiter-review');
    })->name('write-arbiter-review');

    Route::get('more', function (Project $project) {
      return response('project.more');
    })->name('more');
  });

  Route::name('disputes.')->prefix('disputes')->group(function () {
    Route::get('', function () {
    })->name('');
  });

  Route::name('site.')->prefix('site')->group(function () {
    Route::get('print-reciept', function () {
      return response('email.site.print-reciept');
    })->name('print-reciept');

    Route::get('login', function () {
      return response('email.site.login');
    })->name('login');

    Route::get('home', function () {
      return response('email.site.home');
    })->name('home');
  });
});
Route::post('/changeShortListEntry', [
  'as' => 'contest.changeShortListEntry',
  'uses' => 'ContestController@changeShortlistEntry'
]);
Route::get('/test-email/{type}/{to}', function ($type, $to) {


  $contest = Contest::orderBy('id', 'desc')->take(1)->first();
  $contests = Contest::take(5)->get();
  $alchemist = User::find(178);
  $seeker = User::find(177);
  $bid = Bid::orderBy('id', 'desc')->take(1)->first();
  $project = Project::orderBy('id', 'desc')->take(1)->first();
  $review = Review::orderBy('id', 'desc')->take(1)->first();
  $projects = Project::orderBy('id', 'desc')->take(5)->get();
  $user = User::orderBy('id', 'desc')->take(1)->first();
  $withdrawal = Withdrawal::orderBy('id', 'desc')->take(1)->first();
  $milestone = Milestone::orderBy('id', 'desc')->take(1)->first();
  $milestoneRequest = MilestoneRequest::find(9);
  $dispute = Dispute::orderBy('id', 'desc')->take(1)->first();
  $disputeCase1 = DisputeCase::find(36);
  $disputeCase2 = DisputeCase::find(38);
  $entrie = Entrie::orderBy('id', 'desc')->take(1)->first();
  $credit = ChargeCredit::find(rand(0, 1) ? 7 : 8);
  $arbiters = Arbiter::where('id_dispute', 47)->get();


  switch ($type) {
    case 1:
      Mail::to($to)->send(new ContestsNew($contests, $user));
      break;
    case 2:
      Mail::to($to)->send(new RunnerUpContestResults($contest, $entrie));
      break;
    case 3:
      Mail::to($to)->send(new WinnerContestPaymentAndResults($contest, $entrie));
      break;
    case 4:
      Mail::to($to)->send(new ContestPaymentAndResults($contest, $seeker, $entrie));
      break;
    case 5:
      Mail::to($to)->send(new NewContestEntry($contest, User::find(142), $entrie));
      break;
    case 6:
      Mail::to($to)->send(new SelectPodium($contest, User::find(142)));
      break;
    case 7:
      Mail::to($to)->send(new BidAwardedAction($alchemist, $seeker, $bid, $project));
      break;
    case 8:
      Mail::to($to)->send(new WriteReview($seeker, $alchemist, $project, now(), false));
      break;
    case 9:
      Mail::to($to)->send(new WriteReview($alchemist, $seeker, $project, now(), true));
      break;
    case 10:
      Mail::to($to)->send(new ReceivedReview($user, $user, $review, $project));
      break;
    case 11:
      Mail::to($to)->send(new ProjectsNew($user, $projects));
      break;
    case 12:
      Mail::to($to)->send(new MilestonePaid($user, $seeker, $project, Milestone::find(Payment::first()->_milestone)));
      break;
    case 13:
      return response('SeekerReceivedReview no longer exists');
      break;
    case 14:
      return response('Email no longer exists');
      break;
    case 15:
      return response('Email no longer exists');
      break;
    case 16:
      Mail::to($to)->send(new MilestonePaymentRequest($alchemist, $seeker, $project, $milestoneRequest));
      break;
    case 17:
      Mail::to($to)->send(new NewBid($seeker, $alchemist, $project, $bid));
      break;
    case 18:
      Mail::to($to)->send(new FinanceWithdrawlInvoice($user, $withdrawal, 23423, 333, 'BGN'));
      break;
    case 19:
      Mail::to($to)->send(new AccountPasswordReset($user, 'test token'));
      break;
    case 20:
      Mail::to($to)->send(new VerifyAccount($user, "code"));
      break;
    case 21:
      Mail::to($user->email)->send(new FinanceCreditPurchasedReceipt($user, $credit, 32, 3254324, 32432));
      break;
    case 22:
      Mail::to($to)->send(new FinanceDepositMadeReceipt($user, [
        'merchant' => 'mechant 1',
        'time' => now(),
        'date' => now(),
        'amount' => 12344
      ], 32, 3254324));
      break;
    case 23:
      Mail::to($to)->send(new AlchemistDisputeInvoice($alchemist, $seeker, $dispute, $project));
      break;
    case 24:
      Mail::to($to)->send(new SeekerDisputeInvoice($alchemist, $seeker, $dispute, $project));
      break;
    case 25:
      Mail::to($to)->send(new ArbiterReviewCase($user, $dispute, $disputeCase1, $disputeCase2));
      break;
    case 26:
      Mail::to($to)->send(new PlaintiffDisputeAccepted($seeker, $alchemist, $dispute, $project, $milestone));
      break;
    case 27:
      Mail::to($to)->send(new ArbiterResult($arbiters->first(), $dispute, $project, $arbiters, (bool) rand(0, 1)));
      break;
    case 28:
      return response('Email doesn\'t exist anymore');
      break;
    case 29:
      return response('Email doesn\'t exist anymore');
      break;
    case 30:
      Mail::to($to)->send(new DefendantPlaintiffRequestedDispute($alchemist, $seeker, $dispute, $project, $milestone));
      break;
    case 31:
      Mail::to($to)->send(new DisputeResultsArbiterPlaintiffDefendant($seeker, $dispute, $arbiters, $disputeCase1, $disputeCase2));
      break;
    case 32:
      Mail::to($to)->send(new PlaintiffSentDisputeRequestConfirmation($alchemist, $seeker, $dispute, $project, $milestone));
      break;
    case 33:
      Mail::to($to)->send(new AllArbitersAccepted($dispute, $project, $milestone, $user));
      break;
    case 34:
      Mail::send(new ArbiterArbitrationInvitation($alchemist, $seeker, $dispute, $project));
      break;
    default:
      return response()->json(['message' => 'Wrong type']);
  }

  return response('ok');
});
