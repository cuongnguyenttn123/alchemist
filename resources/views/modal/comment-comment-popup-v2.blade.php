<head>
  <link rel="stylesheet" type="text/css" href="css/huystyle.css">
</head>
<div class="open-photo-content ui-block-comment-popup{{$post->id}} open-photo-content-2 comment-popup-{{$post->id}}">
  <div class="ui-block-content " style="border-bottom: 1px solid #e6ecf5;">
		  <span class="comment-item">
		    <div class="post__author author vcard inline-items" style="margin-bottom: 10px;">
          <div class="author-thumb" style="position: sticky;margin-right: -5px;margin-top: -2px">
            <a href="{{$post->user->permalink()}}" target="_blank">
              <img src="{{$post->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">
              <div class="label-avatar bg-primary" style="z-index: 4;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;position: absolute;left: -4px;">{{$post->user->level}}</div>
            </a>
          </div>
          <div class="author-date" id="post-{{$post->id}}">
            <a class="h6 post__author-name fn" href="#">{{$post->user->full_name ?? ""}} <span>(Reply)</span></a>
            <div class="post__date">
              <time class="published" datetime="2017-03-24T18:18">
                {{$post->created_at->diffForHumans()}}
              </time>
            </div>
          </div>
          @if($post->is_author)
            <div class="more">
          <svg class="olymp-three-dots-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
          </svg>
          <ul class="more-dropdown">
            <li><a href="javascript:;" class="delete_post">Delete Post</a></li>
            <li><a href="javascript:;">Edit Post</a></li>
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
                  <a href="javascript:;" class="report_post">Report Post</a>
                </li>
              </ul>
        </div>
          @endif
          <?php
          $save_fw = 'add-fw';
          if ($post->user->is_saved_newsFeed()){
            $save_fw = '';
          }
          ?>
          <span class="notification-icon" style="float: right;">
          <span class="notification-icon" style="float: right;margin-right: 10px;">
            <a href="javascript:;" class="accept-request accept-request-save {{$save_fw}}" data-id="{{$post->user->id}}">
            <span class="icon-minus without-text">
                <svg class="olymp-star-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
            </span>
            </a>
          </span>
        </span>
        </div>
			  <p style="word-break: break-all;">{!!$post->content!!}
    </p>
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
          <div class="post-block-photo js-zoom-gallery">
        @foreach($post->album->media as $media)
              <a href="{{$media->url}}" class="half-width">
            <div style="width: 100%;height: 100%;">
              <img class="test" src="{{$media->url}}" alt="photo">
            </div>
          </a>
            @endforeach
      </div>
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
							      <a href="{{$file->url}}" class="accept-request accept-request-save request-del">
							      <span class="">
						          <img src="svg-icons/sprites/download.svg" class="olymp-close-icon" style="height: 15px;width: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
						          </span>
							      </a>

							      </span>

          </li>
            @endforeach
      </ul>
        @endif
    <div class="post-additional-info inline-items">
      <?php
//      $post = $post->post;

      $like_svg = 'upvote-inactive.svg';
      $dislike_svg = 'downvote-inactive.svg';
      $likecmt = \App\Models\PostLikeCmt::where([
        ['_comment', $post->id],
        ['likecm',1],
      ])->get();
      $dislikecmt = \App\Models\PostLikeCmt::where([
        ['_comment', $post->id],
        ['dislikecmt',1],
      ])->get();
      $heart = \App\Models\PostLikeCmt::where([
        ['_comment', $post->id],
        ['heart',1],
      ])->get();
      $totallikecmt = count($likecmt);
      $totaldislikecmt = count($dislikecmt);
      $totalheart = count($heart);
      $targets = $totallikecmt ? 'targeted' : '';
      $target = $totaldislikecmt ? 'targeted' : '';
      $targeted_heart = $totalheart ? 'targeted_like' : '';
      if($totallikecmt) $like_svg = 'upvote-active.svg';
      if($totaldislikecmt) $dislike_svg = 'downvote-active.svg';
      ?>
      <a href="javascript:;" class="post-add-icon inline-items {{$target}} {{$targets}} likecmt_btn likecmt-{{$post->id}}" data-check_like = "1" data-user="{{$post->user->id}}" data-stcmt="{{$post->id}}" data-id="{{$post->post->id}}">
            <img class="mains" src="{{asset("public/frontend/img/$like_svg")}}">
            <img class="upvotes" hidden src="{{asset("public/frontend/img/upvote-active.svg")}}">
            <span class="pending" >{{$totallikecmt}}</span>
          </a>
          <a href="javascript:;" class="post-add-icon inline-items {{$target}} {{$targets}} dislikecmt_btn dislikecmt-{{$post->id}}" data-check_like = "0" data-user="{{$post->user->id}}" data-stcmt="{{$post->id}}" data-id="{{$post->post->id}}">
            <img class="mains" src="{{asset("public/frontend/img/$dislike_svg")}}">
            <img class="downvotes" hidden src="{{asset("public/frontend/img/downvote-active.svg")}}">
            <span class="pending" >{{$totaldislikecmt}}</span>
          </a>
          <a href="javascript:;" class="post-add-icon inline-items {{$targeted_heart}} heart_btn " data-toggle="tooltip" data-placement="top" title="" data-user="{{$post->user->id}}" data-stcmt="{{$post->id}}" data-id="{{$post->post->id}}" data-original-title="Like">
            <svg class="olymp-heart-icon" style="height: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
            <span class="pending">{{$totalheart}}</span>
          </a>
          <a data-toggle="modal" data-target="#poppup-comment" href="javascript:;" class="post-add-icon inline-items count-comment popup-comment-cmt count-comment-popup-{{$post->id}}" data-id="{{$post->id}}" data-placement="top" title="Comments">
            <svg class="olymp-speech-balloon-icon" style="height: 16px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
            <span>{{$post->total_comments}}</span>
          </a>
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
    </span>
  </div>
  <div class="news-feed-form comment-content-newsfeed">
    <!-- Nav tabs -->
    <ul id="bothArrow" class="nav nav-tabs" role="tablist">
      <li id="leftArrow" class="nav-item" style="display: contents;">
        <a class="nav-link inline-items comment-left" data-id="{{$post->id}}" style="padding: 12px 27px;" data-toggle="tab" href="#reply-2" role="tab" aria-expanded="false" aria-selected="false">
          <svg class="olymp-weather-refresh-icon" style="margin-right: 0px;width: 12px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use></svg>
          <div class="ripple-container"></div></a>
      </li>
      <li id="rightArrow" class="nav-item" style="display: contents;">
        <a class="nav-link inline-items comment-right" style="padding: 12px 27px;" data-toggle="tab" href="#reply-3" role="tab" aria-expanded="false" aria-selected="true">
          <svg class="olymp-weather-refresh-icon" style="margin-right: 0px;width: 12px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use></svg>
          <div class="ripple-container"></div></a>
      </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="reply-2" role="tabpanel" aria-expanded="true">
        <div class="chat-field">
          <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" style="max-height: 250px; background: #fafafa;" data-ps-id="274741f7-5c5a-aeff-f2dd-7b4c165a834c">
            <ul class="notification-list chat-message chat-message-field children" style="margin-left: -25px;margin-top: -15px; margin-right: 15px;">
              @foreach($post->comments as $comment)
                @include('template_part.content-comment-popup', ['comment' => $comment])
              @endforeach
            </ul>
            <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px; width: 190px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
            <div class="ps__scrollbar-y-rail" style="top: 0px; height: 250px; right: 0px;">
              <div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 26px;"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="reply-3" role="tabpanel" aria-expanded="true">

      </div>
    </div>
  </div>


  <form  class="post-comment " data-check="1"  data-id="{{$post->id}}">
          <span >
          <div class="comment-form inline-items" id="post-reply-comment-{{$post->id}}">
            <div class="post__author author vcard inline-items post_comment">
              {{-- {!!$user->avatar_img!!} --}}
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
              <input type="hidden" name="comment_id" value="{{$post->id}}">
              <input type="hidden" name="id" value="{{$post->post->id}}">
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
                    </div>
            <div class="post-comment-cn-{{$post->id}}">

               </div>
            </div>
              <!-- ... end Comments -->

            <div class="add-options-message" style="margin-top: -20px;">


              <a id="addfile" href="javascript:;" data-popup="4" data-check="1" data-id="{{$post->id}}" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD FILE">
                        <label for="add-file" class="marginbottom-0">
                          <svg class="olymp-camera-icon" data-toggle="modal" data-target="#add-file">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                          </svg>
                        </label>
                      </a>
              <a id="add-image" href="javascript:;" data-popup="4" data-check="1" data-id="{{$post->id}}" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTO">
                <label for="add-photo-comment" class="marginbottom-0">
                  <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                  </svg>
                </label>
              </a>
              <a id="addvideo" href="javascript:;" data-popup="4" data-check="1" data-id="{{$post->id}}" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD VIDEO">
                <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-video">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                </svg>
              </a>
              <a id="addlink" href="javascript:;" data-popup="4" data-check="1" data-id="{{$post->id}}" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD EXTERNAL LINK">
                        <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-link">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                        </svg>
                      </a>
            <button type="submit" class="btn btn-blue btn-sm float-right submit-comment" data-check="1" data-id="{{$post->id}}">Post Reply</button>
			  </div>
          <a href="javascript:;" class="more-comments" style="color: #fff;padding: 3px;margin-bottom: -15px;">.</a>
        </span>
  </form>
</div>
