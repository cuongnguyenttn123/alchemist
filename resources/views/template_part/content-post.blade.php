
    <?php
      $userImg = \Illuminate\Support\Facades\Auth::user();
    $index = 0;
    $checkMedia = 0;
    $checkAlbum = 0;
    $save_fw = 'add-fw';
    if ($post->user->is_saved_newsFeed()){
      $save_fw = '';
    }
    $login=0;
    if(!Auth::user())
    {
      $login=1;
    }
    ?>
    @if($post->external_link)
      @php
        $checkMedia = 1;
      @endphp
    @endif
    @if($post->video)
      @php
        $checkMedia = 1;
      @endphp
    @endif
    @if($post->list_media)
      @php
        $checkMedia = 1;
      @endphp
    @endif
    <div class="ui-block ui-block-post ui-block-{{$post->id}}">
      <!-- Post -->
      <article id="post-{{$post->id}}" class="hentry post">
        <div class="post__author author vcard inline-items" style="margin-bottom: -10px;">
          <div class="inline-items">
            <div class="author-thumb" style="position: sticky;margin-right: -5px;margin-top: -2px">
              <a href="{{$post->user->permalink()}}" target="_blank">
                <img src="{{$post->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">
                <div class="label-avatar bg-primary" style="z-index: 4;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;position: absolute;left: -4px;">{{$post->user->level}}</div></a>
            </div>
            <div class="author-date" id="post-{{$post->id}}">
              <a class="h6 post__author-name fn" href="{{$post->user->permalink()}}" target="_blank">{{$post->user->full_name ?? ""}}</a>
              <div class="post__date">
                <time class="published" datetime="2004-07-24T18:18">
                  {{$post->created_at->diffForHumans()}}
                </time>
              </div>
            </div>
          </div>
          @if($post->is_author)
            <div class="more">
              <svg class="olymp-three-dots-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
              </svg>
              <ul class="more-dropdown">
                <li><a href="javascript:;" class="delete_post">Delete Post</a></li>
                <li><a data-toggle="modal" class="edit_post" data-target="#edit-post-popup" data-id="{{$post->id}}" href="javascript:;">Edit Post</a></li>
                <li><a href="javascript:;">Turn Off Notifications</a></li>
                <li><a href="javascript:;">Select as Featured</a></li>
              </ul>
            </div>
          @else
            <div class="more">
              <svg class="olymp-three-dots-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
              </svg>
              <ul class="more-dropdown">
                <li>
                @if( $login==1)
                <a href="javascript:;" class="report_post"  data-toggle="modal" data-target="#registration-login-form-popup" >Report Post</a>
                @else
                <a href="javascript:;" class="report_post">Report Post</a>
                @endif
                  
                </li>
              </ul>
            </div>
          @endif
          <span class="notification-icon" style="float: right;margin-right: 10px;">
          @if( $login==1)
            <a data-toggle="modal" data-target="#registration-login-form-popup" href="javascript:;" class="accept-request accept-request-save {{$save_fw}}" data-id="{{$post->user->id}}" >
            @else
            <a href="javascript:;" class="accept-request accept-request-save {{$save_fw}}" data-id="{{$post->user->id}}">
            @endif
            
            <span class="icon-minus without-text">
                <svg class="olymp-star-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
            </span>
            </a>
          </span>
        </div>
        <div class="friend-avatar" style="margin-top: 0px">
          <p class="friend-about" style="word-break: break-all;margin-right: 15px">
              <span>
                {!!$post->caption!!}
              </span>
          </p>
        </div>
         @if($post->external_link)
            @php
               $data = (object) getInfoUrl($post->external_link);
            @endphp
            @include('template_part.content-external_link', ['data' => $data])
         @endif

        @if($post->video)
          @include('template_part.content-video-status', ['video' => $post->video])
        @endif


         @if($post->album)
           @php
             $checkAlbum = 1;
           @endphp
          @if($post->album->media)
            @php
              $count = count($post->album->media);
              $class = "";

              if($count == 1)
                 $class = "full-width";
              elseif($count == 2)
                 $class = "half-width";
              elseif($count == 3)
                 $class = "col col-3-width";
              elseif($count == 4)
                 $class = "half-width";
              else
                 $class = "col col-3-width max-images";

            @endphp
            <div class="post-block-photo js-zoom-gallery hp_showimg">

              @foreach($post->album->media as $key=>$media)

                <a href="{{$media->url}}" class="{{$class}} {{($key >4)?'d-none':''}}">
                  <img class="test" src="{{$media->url}}" alt="photo" style="object-fit: cover;">
                </a>
              @endforeach
            </div>
          @endif
{{--            <div class="post-block-photo js-zoom-gallery hp_showimg">--}}
{{--               @foreach($post->album->media as $media)--}}
{{--                  <a href="{{$media->url}}" class="half-width">--}}
{{--                     <div style="width: 100%;height: 100%;">--}}
{{--                        <img class="test" src="{{$media->url}}" alt="photo">--}}
{{--                     </div>--}}
{{--                  </a>--}}
{{--               @endforeach--}}
{{--            </div>--}}
         @endif
         @if($post->list_media)
            @php
               $count = count($post->images());
               $class = "";

               if($count == 1)
                  $class = "full-width";
               elseif($count == 2)
                  $class = "half-width";
               elseif($count == 3)
                  $class = "col col-3-width";
               elseif($count == 4)
                  $class = "half-width";
               else
                  $class = "col col-3-width max-images";

            @endphp
            <div class="post-block-photo js-zoom-gallery hp_showimg">

               @foreach($post->images() as $key=>$images)

                  <a href="{{$images->url}}" class="{{$class}} {{($key >4)?'d-none':''}}">
                     <img class="test" src="{{$images->url}}" alt="photo" style="object-fit: cover;">
                  </a>
               @endforeach
            </div>
         @endif


        @if($post->list_file)
          <ul class="notification-list friend-requests">
            @foreach($post->files() as $key=>$file)
              <li style="padding: 15px 0px 15px 0px;">
                <div class="author-thumb">
                  <img src="img/{{$file->extension}}.svg" alt="author" style="width: 38px;border-radius: 0%;">
                </div>
                <div class="notification-event" style=" padding-left: 10px">
                  <div class="content"><a href="javascript:;" class="h6 title" style="font-size: 11px">{{$file->name}}</a>
                    <div class="post__date">
                      <time class="published" datetime="2017-03-24T18:18" style="font-size: 11px"><span class="text-uppercase">{{$file->extension}}</span> File</time>
                    </div>
                  </div>				    </div>
                <span class="notification-icon" style="float: right; display: block;margin-top: 5px;">
                @if( $login==1)
                <a data-toggle="modal" data-target="#registration-login-form-popup" href="javascript:;" class="accept-request accept-request-save request-del" >
                @else
                <a href="{{$file->url}}" class="accept-request accept-request-save request-del">
                @endif
							      <span class="">
						          <img src="svg-icons/sprites/download.svg" class="olymp-close-icon" style="height: 15px;width: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
						          </span>
							      </a>
                </span>
              </li>
            @endforeach
          </ul>
        @endif
         <div class="post-additional-info inline-items" style="padding-bottom: 20px;">
            <?php
               $targeted = $post->is_target() ? 'targeted' : '';
               $targeted_like = $post->is_like() ? 'targeted_like' : '';
               $value_like = $post->is_like() ? 0 : 1;
               $like_svg = 'upvote-inactive.svg';
               $dislike_svg = 'downvote-inactive.svg';
               if($post->user_liked()) $like_svg = 'upvote-active.svg';
               if($post->user_disliked()) $dislike_svg = 'downvote-active.svg';
            ?>
            <a href="javascript:;" class="post-add-icon inline-items {{$targeted}} likepost_btn" data-check_like = "1" data-id="{{$post->id}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Upvote">
               <img src="{{asset("public/frontend/img/$like_svg")}}">
              <img class="votes" hidden src="{{asset("public/frontend/img/upvote-active.svg")}}">
               <span>{{$post->likes()}}</span>
            </a>
            <a href="javascript:;" class="post-add-icon inline-items {{$targeted}} dislikepost_btn" data-check_like = "0" data-id="{{$post->id}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Downvote">
               <img src="{{asset("public/frontend/img/$dislike_svg")}}">
              <img class="votes" hidden src="{{asset("public/frontend/img/downvote-active.svg")}}">
               <span>{{$post->dislikes()}}</span>
            </a>
            <a href="javascript:;" class="post-add-icon inline-items {{$targeted_like}} like_status_btn" data-check_like_status = "{{$value_like}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like" data-id="{{$post->id}}">
              <svg class="olymp-heart-icon" style="height: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
              <span>{{$post->user_like_status()}}</span>
            </a>
            @if( $login==1)
            <a href="javascript:;" class="post-add-icon inline-items {{$targeted_like}} like_status_btn" data-check_like_status = "{{$value_like}}" data-toggle="modal" data-target="#registration-login-form-popup">
              <svg class="olymp-heart-icon" style="height: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
              <span>{{$post->user_like_status()}}</span>
            </a>
            <a data-toggle="modal" data-target="#registration-login-form-popup" href="javascript:;" class="post-add-icon inline-items " >
              <svg class="olymp-speech-balloon-icon" style="height: 16px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
              <span>{{$post->total_comments}}</span>
            </a>
            @else
            <a href="javascript:;" class="post-add-icon inline-items {{$targeted_like}} like_status_btn" data-check_like_status = "{{$value_like}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like" data-id="{{$post->id}}">
              <svg class="olymp-heart-icon" style="height: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
              <span>{{$post->user_like_status()}}</span>
            </a>
            <a data-toggle="modal" data-target="#poppup-comment" href="javascript:;" class="post-add-icon inline-items popup-comment" data-id="{{$post->id}}" data-placement="top" title="Comments">
              <svg class="olymp-speech-balloon-icon" style="height: 16px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
              <span>{{$post->total_comments}}</span>
            </a>
            @endif
            <div class="comments-shared">
               {{--<a href="javascript:;" class="post-add-icon inline-items">
                  <svg class="olymp-speech-balloon-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                  </svg>
                  <span>{{$post->total_comments}}</span>
               </a>
               <a href="javascript:;" class="post-add-icon inline-items">
                  <svg class="olymp-share-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                  </svg>
                  <span>0</span>
               </a>--}}
            </div>
         </div>
        <div class="control-block-button post-control-button">


          @if($post->is_author)
            <a href="javascript:;" class="btn btn-control " data-toggle="tooltip" data-placement="left" title="" style="background-color: #ffb542;" data-original-title="My Post" aria-describedby="tooltip491200">
              <svg class="olymp-thunder-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use>
              </svg>
              <div class="ripple-container">
              </div>
            </a>
          @endif

          @if($post->checkComment())
            <a href="javascript:;" class="btn btn-control " data-toggle="tooltip" data-placement="left" title="" style="background-color: #9874e3;" data-original-title="Feed Replies">
              <svg class="olymp-weather-refresh-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-weather-refresh-icon"></use>
              </svg>
            </a>
          @endif
          @if($checkMedia)
            <a href="javascript:;" class="btn btn-control " data-toggle="tooltip" data-placement="left" title="" style="background-color: #1adb78;" data-original-title="Media">
              <svg class="olymp-play-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
              </svg>
            </a>
          @endif


          @if($checkAlbum)
            <a href="javascript:;" class="btn btn-control " data-toggle="tooltip" data-placement="left" title="" style="background-color: #fa6dbc;" data-original-title="Showcase">
              <svg class="olymp-albums-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
              </svg>
            </a>
          @endif
          @if( $login==1)
          <a href="javascript:;" class="btn btn-control" data-toggle="modal" data-target="#registration-login-form-popup" data-placement="left" title="" data-original-title="Share Post">
        @else
        <a href="javascript:;" class="btn btn-control" data-toggle="tooltip" data-placement="left" title="" data-original-title="Share Post">
        @endif
         
            <svg class="olymp-share-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
            </svg>
          </a>

        </div>
      </article>
      {{-- comment --}}
{{--          @include('template_part.content_post.post-comment')--}}
      <div class="mCustomScrollbar" id="more-cmttt" data-url="{{route('more-cmt')}}" data-mcs-theme="dark">
        <ul class="children" id="childrens-{{$post->id}}" style="margin: 0px;border-top:none;">
          @foreach($post->comments as $comment)
              @include('template_part.content-comment')
{{--          , [$comment]--}}

          <?php
          $index++;
          if ($index == 3){
            break;
          }
          ?>
          @endforeach
        </ul>
        @if(count($post->comments) > 3)
          <a href="javascript:" id="cmtID-{{$post->id }}" data-id="{{$post->id }}" class="more-comments loadmore-cmt-{{$post->id}} loadmore-cmt" style="margin-left: 35px;border-left: 1px solid #e6ecf5; background-image: linear-gradient(#fefefe, #f7f6f6);">Load more thread replies <span>+</span></a>
        @endif
      </div>
      {{-- end comment --}}

      @auth
        <form  class="post-comment" data-check="0" data-id="{{$post->id}}">
          <span >
            <div class="comment-form inline-items" id="post-comment-{{$post->id}}">
              <div class="post__author author vcard inline-items post_comment">
              <img src="{{$userImg->getAvatarImgAttributeDefault()}}" alt="author" style="border: solid;border-width: 3px;border-color: #E9E9E9;">
                <div class="form-group with-icon-right ">
                   <textarea class="form-control" name="content" placeholder="Press Enter to post..."></textarea>
                   <div class="add-options-message">
                      <a href="javascript:;" class="options-message">
                         <label for="add-photo-comment" class="marginbottom-0">
                            <svg class="olymp-camera-icon">
                               <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                            </svg>
                         </label>
                      </a>
                   </div>
                </div>


                <input id="add-photo-comment" class="add-photo-comment d-none" type="file" name="photo[]" value="" multiple data-parsley-group="block-0" accept="image/*">
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="hidden" name="list_media" value="">
                <input type="hidden" name="list_video" value="">
                <input type="hidden" name="list_file" value="">
              </div>
              <div class="ui-block-content photo-preview d-hidden" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px">
                        <div class="post-block-photo "></div>
                        <div>
                          <a href="javascript:;" class="col col-3-width clone d-hidden" style="max-width: 20%;" >
                            <i class="fas fa-times-circle removeimg"></i>
                            <img class="" src="img/1.jpg" alt="photo" style="object-fit: cover;height: 90px;margin-top: 10px;">
                          </a>
                        </div>
                      </div>
              <div class="ui-block-content file-preview d-hidden" style="padding-top: 0px; width: 100%; margin-bottom: 0px; border:none !important;">
                        <div class="cart-main">
                          <div>
                            <div class="shop_table cart">
                              <div class="hienthi material-input"></div>
                            </div>
                          </div>
                        </div>
                      </div>
              <div class="post-comment-cn">

               </div>
            </div>
            <!-- ... end Comments -->
            <div class="add-options-message" style="margin-top: -20px;">

                <a id="addfile" href="javascript:;" data-check="0" data-id="{{$post->id}}" data-popup="0" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD FILE">
                          <label for="add-file" class="marginbottom-0">
                            <svg class="olymp-camera-icon" data-toggle="modal" data-target="#add-file">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                            </svg>
                          </label>
                        </a>
                <a id="add-image" href="javascript:;" data-check="0" data-id="{{$post->id}}" data-popup="0" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTO">
                  <label for="add-photo-comment" class="marginbottom-0">
                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                    </svg>
                  </label>
                </a>
                <a id="addvideo" href="javascript:;" data-check="0" data-id="{{$post->id}}" data-popup="0" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD VIDEO">
                  <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-video">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                  </svg>
                </a>
                <a id="addlink" href="javascript:;" data-check="0" data-id="{{$post->id}}" data-popup="0" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD EXTERNAL LINK">
                          <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-link">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                          </svg>
                        </a>
              <button type="submit" class="btn btn-primary btn-sm float-right submit-comment" data-popup="0" data-check="0"  data-id="{{$post->id}}">Post Comment</button>
          </div>
            <a href="javascript:;" class="more-comments" style="color: #fff;padding: 3px;margin-bottom: -15px;">.</a>
          </span>
        </form>
      @endauth

      <!-- .. end Post -->
   </div>

