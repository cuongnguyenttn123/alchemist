@extends('layouts.master')
@section('title')
  Newfeed
@endsection
@section('content')
  <link rel="stylesheet" type="text/css" href="css/huystyle.css">
<div class="main-header">
  <div class="content-bg-wrap bg-badges"></div>
  <div class="container">
    <div class="row">
      <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12" style="margin-top: -110px">
        <div class="main-header-content" style="margin-bottom: 25px">

          <h1><i class="fas fa-sort-amount-down" aria-hidden="true" style="margin-left: -4px;margin-right: 20px;"></i>Newsfeed</h1>
          <p>Welcome to the Alchemunity Project Search. Search Projects from all across the globe by skill, level,  price, location and spoken languages. Review comprehensive Seeker details to find your best match!</p>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="container newfeed-page" style="margin-top: -75px">
    <div class="row">
      <!-- Main Content -->
      <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <ul class="cat-list-bg-style align-center sorting-menu" style="margin: 15px 0px 15px;">


          <li class="cat-list__item" data-filter=".showall">
            <a href="javascript:" data-type="showall" class="accept-request newsfeed-loadbytype news-feed-button" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="Public Newsfeed">
                    <span class=" without-text">
                    <svg class="olymp-newsfeed-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
                    </span>
            </a>
          </li>


          <li class="cat-list__item" data-filter=".following">
            <a href="javascript:" class="accept-request follow-ajax newsfeed-loadbytype" data-type="following" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="Following">
                    <span class=" without-text">
                      <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                    </span>
            </a>
          </li>

          <li class="cat-list__item" data-filter=".my-posts">
            <a href="javascript:" data-type="my-posts" class="accept-request newsfeed-loadbytype my-posts-button" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="My Posts">
                    <span class=" without-text">
                      <svg class="olymp-thunder-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>
                    </span>
            </a>
          </li>
          <li class="cat-list__item" data-filter=".replies">
            <a href="javascript:" data-type="replies" class="accept-request newsfeed-loadbytype replies-button" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="My Replies">
                    <span class=" without-text">
                      <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-weather-refresh-icon"></use></svg>
                    </span>
            </a>
          </li>
          <li class="cat-list__item" data-filter=".medias">
            <a href="javascript:" data-type="medias" class="accept-request newsfeed-loadbytype media-button" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="Media">
                    <span class=" without-text">
                      <svg class="olymp-play-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
                    </span>
            </a>
          </li>
          <li class="cat-list__item" data-filter=".portfolio">
            <a href="javascript:" data-type="portfolio" class="accept-request newsfeed-loadbytype portfolio-button" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="Portfolio">
                    <span class=" without-text">
                      <svg class="olymp-albums-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>
                    </span>
            </a>
          </li>

        </ul>
        @if(Auth::id())
          @php
            $user = Auth::user();
          @endphp
          <div class="ui-block">
            <!-- News Feed Form  -->
            <div class="news-feed-form" style="background-color: #fff;padding-bottom: 0;">

              <div class="tab-content">
                <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                  <form id="post_status" class="files-group">
                    <div class="author-thumb">
                      {!!$user->avatar_img ?? ""!!}
                    </div>
                    <div class="form-group with-icon label-floating is-empty">

                      <label class="control-label">Share what you are thinking here...</label>
                      <div id="dropzone">
                      <textarea class="form-control" placeholder="" name="caption"></textarea>
                      <input type="hidden" id="fileselect" name="fileselect" multiple="multiple"/>
                      </div>
                    </div>
                    <div class="ui-block-title ui-block-title-small previewaction d-hidden" style="text-align: center;border-top: 0px solid #e6ecf5;">
                      <h6 class="title">Preview Action</h6>
                    </div>
                    <div class="ui-block-content photo-preview d-hidden" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px">
                      <div class="post-block-photo post-block-photocount "></div>
                      <div>
                        <a href="javascript:;" class="col col-3-width clone d-hidden" style="max-width: 20%;" >
                          <i class="fas fa-times-circle removeimg"></i>
                          <img class="" src="img/1.jpg" alt="photo" style="object-fit: cover;height: 90px;margin-top: 10px;">
                        </a>
                      </div>
                    </div>
                    <div class="ui-block" style="margin-bottom: 0px; border:none !important;">
                      <div class="cart-main">
                        <div>
                          <div class="shop_table cart">
                            <div class="hienthi material-input">
                              <div style="display: flex; justify-content: flex-end;">
                                <a data-toggle="modal" id="clear-all-file" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left"
                                   style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px; margin-top: 5px; display:none;">
                                  CLEAR ALL
                                  <div class="ripple-container"></div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="add-options-message">
                      <input type="hidden" name="list_media" value="">
                      <input type="hidden" name="list_video" value="">
                      <input type="hidden" name="list_file" value="">
                      <a id="addfile" href="javascript:;" data-id="0" data-popup="0" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD FILE" >
                        <label for="add-file" class="marginbottom-0">
                          <svg class="olymp-camera-icon" data-toggle="modal" data-target="#add-file">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                          </svg>
                        </label>
                      </a>
                      <a id="add-image" href="javascript:;" data-id="0" data-popup="0" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTO">
                        <label for="add-photo" class="marginbottom-0">
                          <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                          </svg>
                        </label>
                      </a>
                      <a id="addvideo" href="javascript:;" data-id="0" data-popup="0" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD VIDEO">
                        <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-video">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                      </a>
                      <a id="addlink" href="javascript:;" data-id="0" data-popup="0" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD EXTERNAL LINK">
                        <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-link">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                        </svg>
                      </a>
                      <button class="btn btn-primary btn-md-2">Post</button>
                      <input type="reset" class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color clear_all" value="Clear" style="float: right;margin-right: 12px; width: auto;" >
                    </div>
                  </form>
                  <input id="add-photo" class="add-photo d-none" type="file" name="photo[]" value="" multiple data-parsley-group="block-0" accept="image/*">
                </div>

              </div>
            </div>
            <!-- ... end News Feed Form  -->
          </div>
        @endif
        <div class="newsfeed-items">

          <div id="tagDropdown" class="dropdown-content">
            <form action="{{route('newsfeed')}}" method="Get">
              {{--              @csrf--}}
              <input autocomplete="off" type="text" placeholder="Search hashtag or caption..." name="caption" id="tagInput" onkeyup="filterFunction()">
              <button hidden type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul>
              @foreach($list_hashtag as $h)
                <li>
                  <a class="link-tag" href="{{route('newsfeed')}}?hashtag={{$h}}">{{$h}}</a>
                </li>
              @endforeach
            </ul>
          </div>

          <div id="paramsajax" >
            @foreach($newsfeed as $post)

              @include('template_part.content-post', ['post' => $post])

            @endforeach
          </div>

          <div class="modal fade" id="poppup-comment" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog window-popup2 edit-widget edit-widget-blog-post" style="width: 100%;" role="document">
              <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                  <svg class="olymp-close-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                  </svg>
                </a>
                <div class="modal-body modal-comment-body modal-comment-body-popup">

                  <div class="open-photo-content" id="f">



                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="chatbox" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog window-popup4 edit-widget edit-widget-blog-post" style="width: 100%;" role="document">
              <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                  <svg class="olymp-close-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                  </svg>
                </a>
                <div class="modal-body modal-comment-body modal-comment-body-popup">

                  <div class="open-photo-content" id="f">



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a id="newsfeed-more" href="javascript:;" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
          <svg class="olymp-three-dots-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
          </svg>
        </a>
      </div>
      <!-- ... end Main Content -->

    	<!-- Left Sidebar -->
       <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
          <div class="ui-block">
             <!-- W-Action -->
             <div class="widget w-action">
                <img src="img/Alchem-Logo-Icon-White.png" alt="Sign up">
                <div class="content">
                   <h4 class="title">ALCHEMUNITY</h4>
                   <span>THE FIRST SEMI-DECENTRALISED FREELANCE NETWORK</span>
                   <a href="javascript:;" data-target="#registration-login-form-popup" data-toggle="modal" style="padding: 20px 0;width: 100%;" class="btn btn-bg-secondary btn-md">Register Now!</a>
                </div>
             </div>
             <!-- ... end W-Action -->
          </div>
         @if(Auth::check())
           <div class="ui-block">
             <div class="ui-block-title">
               <h6 class="title">Activity Feed</h6>
               <a href="javascript:;" class="more">
                 <svg class="olymp-three-dots-icon">
                   <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                 </svg>
               </a>
             </div>
             <!-- W-Activity-Feed -->
             <ul class="widget w-activity-feed notification-list">
               {{-- {{ csrf_field() }} --}}
               <div id="count-left">
                 <?php $notifica = $user->notifications_newsfeed()->unread('job');?>
                 @foreach($notifica as $n )
                   @include('template_part.content-left-notification')
                 @endforeach
               </div>
               @if(count($notifica) > 4)
                 <a href="javascript:" id="load_more_button_left" class="more-comments" name="load_more_button_left" data-id="'.$last_id.'" style="  border-top: 1px solid #e6ecf5;background-image: linear-gradient(#fefefe, #f7f6f6);">Load more <span>+</span></a>
               @endif
               <div id="post_data_left"></div>
             </ul>
             <!-- .. end W-Activity-Feed -->
           </div>
         @endif
       </div>
       <!-- ... end Left Sidebar -->

	    <!-- Right Sidebar -->
  		<div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
        <div class="ui-block">
          <div class="ui-block-title">
            <h6 class="title">Higest Ranked Alchemists</h6>
          </div>
          <!-- W-Friend-Pages-Added -->
          <ul class="widget w-friend-pages-added notification-list friend-requests">
          {{-- {{ csrf_field() }} --}}
          <?php $index = 0; ?>
            <div id="post_data">
            @foreach($listTopUser as $us)
               @include('template_part.content-right-ranked')
              <?php
              $index++;
              if ($index == 5){
                break;
              }
              ?>
            @endforeach
            </div>
            @if(count($listTopUser) > 4)
            <a href="javascript:" id="load_more_button" class="more-comments" name="load_more_button" data-id="" style="  border-top: 1px solid #e6ecf5;background-image: linear-gradient(#fefefe, #f7f6f6);">Load more <span>+</span></a>
{{--          <div id="post_data"></div>--}}
              @endif
          </ul>
          <!-- .. end W-Friend-Pages-Added -->
        </div>
			<div class="ui-block">
			 	<div class="ui-block-title">
				    <h6 class="title">Friend Suggestions</h6>
				    <a href="javascript:;" class="more">
				       <svg class="olymp-three-dots-icon">
				          <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
				       </svg>
				    </a>
			 	</div>
			 <!-- W-Action -->
			 <ul class="widget w-friend-pages-added notification-list friend-requests friend-suggestion">
			   @for($i =0 ; $i<5 ; $i++)
           <li class="inline-items">
             <div class="author-thumb">
               <img src="img/avatar38-sm.jpg" alt="author">
             </div>
             <div class="notification-event">
               <a href="javascript:;" class="h6 notification-friend">Francine Smith</a>
               <span class="chat-message-item">8 Friends in Common</span>
             </div>
             <span class="notification-icon margin-top-0">
			          	<a href="javascript:;" class="accept-request">
			             	<span class="icon-add without-text">
				                <svg class="olymp-happy-face-icon">
				                   <use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
				                </svg>
			             	</span>
			          	</a>
			       	</span>
           </li>
           @endfor
			 </ul>
			 <!-- ... end W-Action -->
			</div>
       	</div>
  		<!-- ... end Right Sidebar -->
      @if(Auth::id())
        <div class="menu">
        <div class="profile-settings-responsive">
          <a href="#" class="js-profile-settings-open profile-settings-open">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <i class="fa fa-angle-left" aria-hidden="true"></i>
          </a>
          <div class="mCustomScrollbar" data-mcs-theme="dark">
            @include('myprofile.profile_nav')
          </div>
        </div>


      </div>
      @endif
  	</div>
  </div>


    <div class="modal fade" id="edit-post-popup" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog window-popup2 edit-widget edit-widget-blog-post" role="document" style="width: 100%;">
        <div class="modal-content">
          <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
            </svg>
          </a>
          <div class="modal-body">

            <div class="open-photo-content">
              <form id="edit_status" class="files-group" data-popup="2">
                <div id="edit-post-status-by-modal">
                </div>
                <div class="add-options-message" style="display: inline-block">
                  <input type="hidden" name="list_media" value="">
                  <input type="hidden" name="list_video" value="">
                  <input type="hidden" data-edit-file='0' name="list_file" value="">
                  <div class="post-message-left">
                    <a id="addfile" href="javascript:;" data-id="1" data-edit-file="0" data-popup="2" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD FILE">
                      <label for="add-file" class="marginbottom-0">
                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#add-file">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                        </svg>
                      </label>
                    </a>
                    <a id="add-image" href="javascript:;" data-id="1" data-edit-image="0" data-popup="2" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTO">
                      <label for="add-photo" class="marginbottom-0">
                        <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                        </svg>
                      </label>
                    </a>
                    <a id="addvideo" href="javascript:;" data-id="1" data-edit-video="0" data-popup="2" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD VIDEO">
                      <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-video">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                      </svg>
                    </a>
                    <a id="addlink" href="javascript:;" data-id="1" data-edit-link="0" data-popup="2" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD EXTERNAL LINK">
                      <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-link">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                      </svg>
                    </a>
                  </div>
                  <div class="post-message-right">
                    <button class="btn btn-primary btn-md-2" data-popup="2">Post</button>
                    <input type="reset" class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color clear_all" value="Clear">
                  </div>

                </div>
              </form>
              <input id="add-photo" class="add-photo d-none" type="file" name="photo[]" value="" multiple data-parsley-group="block-0" accept="image/*">

            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="modal fade" id="add-link" tabindex="-1" role="dialog" aria-labelledby="add-link" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
        <div class="modal-content">
          <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
            </svg>
          </a>
          <div class="modal-body">
            <form class="form-inline search-form" method="post">
              <div class="form-group label-floating">
                <label class="control-label">Enter Link Here</label>
                <input class="form-control bg-white" name="url-video" placeholder="" type="text" value="">
              </div>
              <button class="btn btn-purple btn-lg add-link">+ Add Link</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="add-video" tabindex="-1" role="dialog" aria-labelledby="add-video" aria-modal="true">
      <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
        <div class="modal-content">
          <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
          </a>

          <input id="upload_video_status" class="hidden d-none" type="file" name="video_file" accept="video/*" multiple="">
          <div class="modal-header">
            <h6 class="title">+ Add Files</h6>
          </div>

          <div class="modal-body" style="padding: 0px !important;">
            <a href="javascript:;" class="upload-photo-item upload-video-status">
              <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>


              <h6>Upload</h6>
              <span>Browse your computer.</span>
            </a>

            <a href="javascript:;" class="upload-photo-item upload-video-album-status" data-toggle="modal" data-target="#choose-from-my-photo">

              <svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

              <h6>Choose from My Files</h6>
              <span>Choose from your uploaded files</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="add-file" tabindex="-1" role="dialog" aria-labelledby="add-file" aria-modal="true">
      <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
        <div class="modal-content">
          <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
          </a>

          <input id="upload_file_status" class="hidden d-none" type="file" name="file_status" accept="file/*" multiple="">
          <div class="modal-header">
            <h6 class="title">+ Add Files</h6>
          </div>

          <div class="modal-body" style="padding: 0px !important;">
            <a href="javascript:;" class="upload-photo-item upload-file-status upload-file">
              <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>


              <h6>Upload</h6>
              <span>Browse your computer.</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  <div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog window-popup edit-widget edit-widget-blog-post" role="document">
      <div class="modal-content">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
          </svg>
        </a>
        <div class="modal-body">
          <div class="open-photo-content">
            <input id="add-photo" class="add-photo d-none" type="file" name="photo[]" value="" multiple data-parsley-group="block-0" accept="image/*">
          </div>
        </div>
      </div>
    </div>
  </div>

<?php ?>

 <div class="hp_previewfile">

  <div class="cart_item d-none" style="margin-bottom: 10px; border-bottom: 1px solid #e6ecf5;">
    <div class="ui-block" data-mh="pie-chart" style="padding: 15px;margin: 0px;border: none;">
      <div class="forum-item">
        <img src="img/zip.svg" alt="forum" width="40">
        <div class="content">
          <a href="javascript:;" class="h6 title" style="word-break: break-word;"></a>
          <div class="post__date">
            <time class="published" datetime="2017-03-24T18:18"></time>
          </div>
          <span class="notification-icon click-delete-file" data-filedelete style="margin-top: -35px; float: right; display: block;">
                                <a href="javascript:;" data-delete_file = "" class="accept-request request-del">
                                  <span class="delete-file">
                                    <img src="img/trash.svg" class="olymp-close-icon" style="margin: auto; height: 15px; width: 15px;">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                  </span>
                                  </a>
                              </span>
        </div>


      </div>
    </div>
  </div>
</div>

    @include('layouts.modal_register')

    <input type="hidden" name="delpost" value="{{route('ajax.delpost')}}">
    <input type="hidden" name="getpost" value="{{route('ajax.getpost')}}">
    <input type="hidden" name="editpost" value="{{route('ajax.editpost')}}">
    <input type="hidden" name="reportpost" value="{{route('ajax.reportPost')}}">
    <input type="hidden" name="postcomment" value="{{route('ajax.postcomment')}}">
    <input type="hidden" name="likepost" value="{{route('ajax.likepost')}}">
    <input type="hidden" name="previewimage" value="{{route('ajax.previewimage')}}">
    <input type="hidden" name="previewfile" value="{{route('ajax.previewfile')}}">
    <input type="hidden" name="newvideo-status" value="{{route('ajax.newvideo.status')}}">
    <input type="hidden" name="previewlink" value="{{route('ajax.previewlink')}}">
    <input type="hidden" name="likestatus" value="{{route('ajax.likestatus')}}">
    <input type="hidden" name="newsfeed-more" value="{{route('newsfeed-more')}}">
    <input type="hidden" name="poststatus" value="{{route('ajax.poststatus')}}">
    <input type="hidden" name="editcomment" value="{{route('ajax.editcomment')}}">
    <input type="hidden" name="load-data-left" value="{{route('loadmore.load-data-left')}}">
    <input type="hidden" name="load-data-right" value="{{ route('loadmore.load-data') }}">

    <input type="hidden" name="popup_comment" value="{{route('ajax.popupComment')}}">
    <input type="hidden" name="popup_comment_cmt" value="{{route('ajax.popupCommentcmt')}}">
    <input type="hidden" name="popup_comment_back" value="{{route('ajax.popupCommentback')}}">
    <input type="hidden" name="popup_comment_right" value="{{route('ajax.popupCommentright')}}">
    <input type="hidden" name="postalbumvideo" value="{{route('ajax.post-album-video')}}">
    <input type="hidden" name="followAjax" value="{{route('newsfeed', ['type'=>'following'])}}">
    <input type="hidden" name="newfeedparam" value="{{route('newsfeed')}}">
    <input type="hidden" name="param" value="">
    <input type="hidden" name="ajax-likecmt" value="{{route('ajax.likecmt')}}">
    <input type="hidden" name="ajax-likecmtchil" value="{{route('ajax.likecmtchil')}}">
    <input type="hidden" name="ajax-heart" value="{{route('ajax.heart')}}">
    <input type="hidden" name="ajax-disLikeCmt" value="{{route('ajax.disLikeCmt')}}">
    <input type="hidden" name="check-login" value="{{(Auth::check()) ? 1: 0 }}">
@endsection
@section('scripts')
	<script type="text/javascript" src="{{asset('public/frontend/js/social.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/frontend/js/timeline.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/frontend/js/ajax-login_reg.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/frontend/js/edit-post.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/frontend/js/comment-post.js')}}"></script>
	<script type="text/javascript">

    $(document).on('click', '.accept-request-save', function(){
      id = $(this).data('id');
      _this = $(this);
      form_data = 'id='+id+'&type=user';
      url = "{{route('ajax.favoritenewsfeed')}}";
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'POST',
        url: url,
        data: form_data,
        success:function(res){
          if(res.error == false){
            console.log(res.action);
            if(res.action == 'add') {
              _this.removeClass('add-fw')
            }else{
              _this.addClass('add-fw')
            }
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          }else{
            swal(res.message);
          }
        }
      });
    });
		function filterFunction() {
		  var input, filter, ul, li, a, i;
		  input = document.getElementById("tagInput");
		  filter = input.value.toUpperCase();
		  div = document.getElementById("tagDropdown");
		  a = div.getElementsByTagName("a");
		  for (i = 0; i < a.length; i++) {
		    txtValue = a[i].textContent || a[i].innerText;
		    if (txtValue.toUpperCase().indexOf(filter) > -1) {
		      a[i].style.display = "";
		    } else {
		      a[i].style.display = "none";
		    }
		  }
		}

		$('.submit-comment').on('click', function(){
		  $('#bothArrow').show();
    });

		$('#tagInput').focus(function(){
			$(this).closest('#tagDropdown').find('ul').slideToggle();
		});
		$('#tagInput').focusout(function(){
			$(this).closest('#tagDropdown').find('ul').slideToggle();
    });
	</script>


@endsection
