@extends('myprofile.master_pro')
@section('title')
My Feed
@endsection
@section('content')
@include('myprofile.profile_header')
<?php
$login=0;
    if(!Auth::user())
    {
      $login=1;
    }

?>
<link rel="stylesheet" type="text/css" href="css/huystyle.css">

      <!-- ... end Top Header-Profile -->
      <div class="container">
         <div class="row">
            <!-- Main Content -->
            <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

              <ul class="cat-list-bg-style align-center sorting-menu" style="margin: 15px 0px 15px;">


                <li class="cat-list__item active" data-filter="*">
                  <a href="{{route('newsfeed')}}" class="accept-request news-feed-button" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="Public Newsfeed">
                    <span class=" without-text">
                    <svg class="olymp-newsfeed-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-newsfeed-icon"></use></svg>
                    </span>
                  </a>
                </li>

                @if( $login==1)
                <li class="cat-list__item" data-filter=".following">
                  <a href="javascript:" class="accept-request follow-ajax newsfeed-loadbytype" data-type="following"data-toggle="modal" data-target="#registration-login-form-popup" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="Following">
                    <span class=" without-text">
                      <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                    </span>
                  </a>
                </li>

                <li class="cat-list__item" data-filter=".my-posts">
                  <a href="javascript:" data-type="my-posts" class="accept-request newsfeed-loadbytype my-posts-button" data-toggle="modal" data-target="#registration-login-form-popup" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="My Posts">
                    <span class=" without-text">
                      <svg class="olymp-thunder-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>
                    </span>
                  </a>
                </li>
                <li class="cat-list__item" data-filter=".replies">
                  <a href="javascript:" data-type="replies" class="accept-request newsfeed-loadbytype replies-button" data-toggle="modal" data-target="#registration-login-form-popup" data-toggle="tooltip" data-placement="bottom" title="" style="padding: 20px 20px;" data-original-title="My Replies">
                    <span class=" without-text">
                      <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-weather-refresh-icon"></use></svg>
                    </span>
                  </a>
                </li>
                @else
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
                @endif
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
               <div id="newsfeed-items-grid">
                  @if($user && $user->id==$target_user->id)
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
                                   <div id="dropzone">
                                   <label class="control-label">Share what you are thinking here...</label>
                                    <textarea   class="form-control" placeholder="" name="caption"></textarea>
                                   </div>
                                 </div>
                                <div class="ui-block-title ui-block-title-small previewaction d-hidden" style="text-align: center;border-top: 0px solid #e6ecf5;">
                                  <h6 class="title">Preview Action</h6>
                                </div>
                                 <div class="ui-block-content photo-preview d-hidden" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px">
                                    <div class="post-block-photo post-block-photocount"></div>
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
                                   <a id="addfile" href="javascript:;" data-id="0" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD FILE">
                                     <label for="add-file" class="marginbottom-0">
                                       <svg class="olymp-camera-icon" data-toggle="modal" data-target="#add-file">
                                         <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                                       </svg>
                                     </label>
                                   </a>
                                    <a id="add-image" href="javascript:;" data-id="0" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTO">
                                       <label for="add-photo" class="marginbottom-0">
                                          <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                                             <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                          </svg>
                                       </label>
                                    </a>
                                   <a id="addvideo" href="javascript:;" data-id="0" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD VIDEO">
                                     <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-video">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                                     </svg>
                                   </a>
                                    <a id="addlink" href="javascript:;" data-id="0" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD EXTERNAL LINK">
                                       <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-link">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                       </svg>
                                    </a>
                                    <button id="post_status" class="btn btn-primary btn-md-2">Post</button>
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
                    <div id="paramsajax" >
                      <?php $count=0 ?>
                      @foreach($target_user->posts as $post)
                        @include('template_part.content-post', ['post' => $post])
                        <?php
                        $count++;
                        if ($count == 5){
                          break;
                        }
                        ?>
                      @endforeach
                    </div>
                    <div class="modal fade" id="edit-post-popup" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                      <div  class="modal-dialog window-popup2 edit-widget edit-widget-blog-post" style="width: 100%" role="document">
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
                                <div class="add-options-message ">
                                  <input type="hidden" name="list_media" value="">
                                  <input type="hidden" name="list_video" value="">
                                  <input type="hidden" id="get_list_file" data-edit-file='0' name="list_file" value="">
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
                                    <input type="reset" class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color clear_all" value="Clear" >
                                  </div>
                                </div>
                              </form>
                              <input id="add-photo" class="add-photo d-none" type="file" name="photo[]" value="" multiple data-parsley-group="block-0" accept="image/*">

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="poppup-comment" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                      <div class="modal-dialog window-popup2 edit-widget edit-widget-blog-post" role="document">
                        <div class="modal-content">
                          <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                            <svg class="olymp-close-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                            </svg>
                          </a>
                          <div class="modal-body modal-comment-body modal-comment-body-popup ">

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
               </div>
               <a id="load-more" href="javascript:;" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
                  <svg class="olymp-three-dots-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                  </svg>
               </a>
            </div>
            <!-- ... end Main Content -->
            <!-- Left Sidebar -->
            @if(Auth::id())
            <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
               <div class="ui-block">
                  <!-- Friend Item -->
                  <div class="friend-item fav-page">
                     <div class="friend-header-thumb">
                        <img src="{{$target_user->profile_banner == null ? "https://development.alchemunity.com/public/avatars/jamie.seeker.A_profilebanner.jpg" : $target_user->profile_banner}}" alt="friend">
                     </div>
                     <div class="friend-item-content">
                        <div class="more">
                           <svg class="olymp-three-dots-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                           </svg>
                           <ul class="more-dropdown">
                              <li>
                                 <a href="javascript:;">Report Profile</a>
                              </li>
                              <li>
                                 <a href="javascript:;">Block Profile</a>
                              </li>
                              <li>
                                 <a href="javascript:;">Turn Off Notifications</a>
                              </li>
                           </ul>
                        </div>
                        <div class="friend-avatar">
                           <div class="author-thumb">
                              {!!$target_user->getAvatarImgAttribute(92)!!}
                              <div class="label-avatar bg-primary" data-toggle="tooltip" data-placement="left" title="Alchemist Lvl" style="position: sticky; z-index: 4; margin-top: -100px; width: 28px;height: 28px; padding-top: 6px;font-size: 11px">{{$target_user->level}}</div>
                              @auth
                              <div class="label-avatar bg-secondary control-block-button post-control-button " style=" position: sticky; margin-left: 62px;margin-top: 40px;width: 34px;height: 34px; padding-top: 7px;padding-bottom: 7px;padding-left: 2.8px;font-size: 11px;border: 0px solid #fff;line-height: 0px">
                                 <?php
                                    $cl = 'bg-secondary';
                                    $title = "Save";
                                    $s_text = ($target_user->is_saved()) ? 'SAVED' : 'SAVE';
                                    $bg = ($target_user->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
                                 ?>
                                 <span>
                                    <a data-toggle="tooltip" data-placement="right" href="javascript:;" class="btn btn-control saved_user {{$bg}}" data-id="{{$target_user->id}}" title="{{$s_text}} {{$user->followings->count()}}/15" style="margin-left: -3px;margin-top: -7px;">
                                       <img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-like-post-icon" style="border: 0px solid #fff;border-radius: 0%;width: 17px;margin-top: 2px;margin-left: 8px" >
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                       </svg>
                                    </a>
                                 </span>
                              </div>
                              @endif
                           </div>
                           <div class="author-content">
                               <a href="{{$target_user->permalink()}}" class="h5 author-name"><img src="svg-icons/Flags/country-code/{{$target_user->countryflag}}.svg" width="17" hspace="1"
                                                                                                   style="padding-bottom: 3px;vertical-align: reset;
                                                                                     margin-left: 0px; margin-right: 6px;">{{$target_user->full_name}}</a>
                              <div class="country "><strong>{{($target_user->rolename == 'Seeker') ? '' : $target_user->rolename.' |'}}  {{$target_user->user_title}} LVL {{$target_user->level}}</strong></div>
                             <div class="country">{{$target_user->full_location}}</div>
                             <div class="post__date">
                               <div class="skills-item inline-items" style="margin-bottom: 10px">
                                 <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; ">
                                   <div class="units">
                                     <div>
                                       <font color="#71768E " style="font-weight: 400; margin-right: 0px;">{{number_format((float)$target_user->rating, 1, '.', '')}}</font>
                                       <font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font>
                                     </div>
                                   </div>
                                 </div>
                                 <div class="rating-box">
                                   <div class="rating-a" style="width:{{$target_user->rating*20}}%;"></div>
                                 </div>
                               </div>
                             </div>
                           </div>
                           <p class="friend-about" data-swiper-parallax="-500">
                              <span>{{$target_user->get_usermeta('description') ?? 'N/A'}}</span>
                              <br>
                              @if($target_user->rolename == 'Alchemist')
                              ----
                              <br>
                              <em class="skill-dc">{{ $target_user->myskills}}</em>
                              @endif
                           </p>
                           <div class="friend-count">
                              <a href="javascript:;" class="friend-count-item">
                                 <div class="h6">{{$target_user->points}}</div>
                                 <div class="title">{{$target_user->point_name}}</div>
                              </a>
                              <a href="javascript:;" class="friend-count-item">
                                 <div class="h6">LV {{$target_user->level}}</div>
                                 <div class="title" >{{$target_user->user_title}}</div>
                              </a>
                              <a href="javascript:;" class="friend-count-item">
                                 <div class="h6">{{$target_user->RP}}</div>
                                 <div class="title">RP</div>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="your-profile " style="border-top: solid; border-top-width: 1px;border-top-color: #E6ECF5">
                        @include('template_part.information', ['user'=>$target_user])
                     </div>
                  </div>
                  <!-- ... end Friend Item -->
               </div>

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

            </div>
            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
               <div class="">
                  <div class="sidebar__inner">
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">Featured Work</h6>
                        </div>
                        @include('template_part.content-featureimages', ['user' => $target_user])
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">Last Videos</h6>
                        </div>
                        @include('template_part.content-featurevideos', ['user' => $target_user])
                     </div>

                  </div>
               </div>
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
            </div>
            @else
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
                  <div id="count-left">
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar49-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Marina Polson</a> commented on Jason Mark’s <a href="javascript:;" class="notification-link">photo.</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 mins ago</time></span>
                        </div>
                     </li>
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar9-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Jake Parker </a> liked Nicholas Grissom’s <a href="javascript:;" class="notification-link">status update.</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">5 mins ago</time></span>
                        </div>
                     </li>
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar50-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Mary Jane Stark </a> added 20 new photos to her <a href="javascript:;" class="notification-link">gallery album.</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">12 mins ago</time></span>
                        </div>
                     </li>
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar51-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Nicholas Grissom </a> updated his profile <a href="javascript:;" class="notification-link">photo</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                     </li>
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar48-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Marina Valentine </a> commented on Chris Greyson’s <a href="javascript:;" class="notification-link">status update</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                     </li>
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar52-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Green Goo Rock </a> posted a <a href="javascript:;" class="notification-link">status update</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">1 hour ago</time></span>
                        </div>
                     </li>
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Elaine Dreyfuss  </a> liked your <a href="javascript:;" class="notification-link">blog post</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
                        </div>
                     </li>
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar10-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Elaine Dreyfuss  </a> commented on your <a href="javascript:;" class="notification-link">blog post</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 hours ago</time></span>
                        </div>
                     </li>
                     <li>
                        <div class="author-thumb">
                           <img src="img/avatar53-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                           <a href="javascript:;" class="h6 notification-friend">Bruce Peterson </a> changed his <a href="javascript:;" class="notification-link">profile picture</a>.
                           <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">15 hours ago</time></span>
                        </div>
                     </li>
                  </div>
                  </ul>
                  <!-- .. end W-Activity-Feed -->
               </div>
                 
            </div>
            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">
               
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
            </div>
            @endif
            <!-- ... end Left Sidebar -->
            <!-- Right Sidebar -->




            <!-- ... end Right Sidebar -->
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

              <a href="javascript:;" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

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
              <a href="javascript:;" class="upload-photo-item upload-file-status">
                <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>


                <h6>Upload</h6>
                <span>Browse your computer.</span>
              </a>

              <a href="javascript:;" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

                <svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

                <h6>Choose from My Files</h6>
                <span>Choose from your uploaded files</span>
              </a>
            </div>
          </div>
        </div>
      </div>
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


   <input type="hidden" name="delpost" value="{{route('ajax.delpost')}}">
    <input type="hidden" name="getpost" value="{{route('ajax.getpost')}}">
   <input type="hidden" name="reportpost" value="{{route('ajax.reportPost')}}">
   <input type="hidden" name="newvideo-status" value="{{route('ajax.newvideo.status')}}">
   <input type="hidden" name="postcomment" value="{{route('ajax.postcomment')}}">
   <input type="hidden" name="likepost" value="{{route('ajax.likepost')}}">
   <input type="hidden" name="poststatus" value="{{route('ajax.poststatus')}}">
   <input type="hidden" name="previewlink" value="{{route('ajax.previewlink')}}">
   <input type="hidden" name="previewimage" value="{{route('ajax.previewimage')}}">
   <input type="hidden" name="previewfile" value="{{route('ajax.previewfile')}}">
   <input type="hidden" name="load-timeline" value="{{route('ajax.load-timeline')}}">
   <input type="hidden" name="likestatus" value="{{route('ajax.likestatus')}}">
   <input type="hidden" name="target_user" value="{{$target_user->id}}">
   <input type="hidden" name="load-data-left" value="{{route('loadmore.load-data-left')}}">
   <input type="hidden" name="load-data-right" value="{{ route('loadmore.load-data') }}">
   <input type="hidden" name="popup_comment" value="{{route('ajax.popupComment')}}">
    <input type="hidden" name="followAjax" value="{{route('newsfeed', ['type'=>'following'])}}">
    <input type="hidden" name="newfeedparam" value="{{route('newsfeed')}}">
    <input type="hidden" name="param" value="">
  <input type="hidden" name="ajax-likecmt" value="{{route('ajax.likecmt')}}">
  <input type="hidden" name="ajax-heart" value="{{route('ajax.heart')}}">
  <input type="hidden" name="ajax-disLikeCmt" value="{{route('ajax.disLikeCmt')}}">
<input type="hidden" name="editcomment" value="{{route('ajax.editcomment')}}">

  <input type="hidden" name="popup_comment_right" value="{{route('ajax.popupCommentright')}}">
  <input type="hidden" name="popup_comment_cmt" value="{{route('ajax.popupCommentcmt')}}">
<input type="hidden" name="popup_comment_back" value="{{route('ajax.popupCommentback')}}">
<input type="hidden" name="check-login" value="{{(Auth::check()) ? 1: 0 }}">
@endsection
@section('scripts')
   <script type="text/javascript" src="{{asset('public/frontend/js/social.js')}}"></script>
   <script type="text/javascript" src="{{asset('public/frontend/js/timeline.js')}}"></script>
   <script type="text/javascript" src="{{asset('public/frontend/js/base-init.js')}}"></script>
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

     $('#tagInput').focus(function(){
       $(this).closest('#tagDropdown').find('ul').slideToggle();
     });
     $('#tagInput').focusout(function(){
       $(this).closest('#tagDropdown').find('ul').slideToggle();
     });
   </script>
@endsection


