<?php
  $save_fw = 'add-fw';
  if ($comment->user->is_saved_newsFeed()){
    $save_fw = '';
  }
?>
<li class="comment-item searches-item test-comment-1 content-comment-popup-{{$comment->id}}" id="ui-block-comment-{{$comment->id}}" style="padding: 20px 0px 15px 20px; border-bottom: 1px solid #e6ecf5;">
      <div class="post__author author vcard inline-items">
        <div class="author-thumb" style="position: sticky;margin-right: -5px;margin-top: -2px">
          <a href="{{$comment->user->permalink()}}" target="_blank">
            <img src="{{$comment->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">
            <div class="label-avatar bg-primary" style="z-index: 4;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;position: absolute;left: -4px;">{{$comment->user->level}}</div></a>
        </div>
         <div class="author-date">
            <a class="h6 post__author-name fn" href="{{$post->user->permalink()}}" target="_blank">{{$comment->user->fullname}}</a>
            <div class="post__date">
               <time class="published" datetime="2017-03-24T18:18">
               {{$comment->created_at->diffForHumans()}}
               </time>
            </div>
         </div>


        @if(Auth::user())
          @if($comment->user->id === Auth::user()->id)
        <div class="more">
          <svg class="olymp-three-dots-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
          </svg>
          <ul class="more-dropdown">
            <li><a href="javascript:;" class="delete_cmt" data-url="{{route('ajax.delcmt')}}" data-id="{{$comment->id}}">Delete Comment</a></li>
            <li><a data-toggle="modal" class="edit_cmt" data-target="#edit-cmt-popup" data-url="{{route('ajax.getcmt')}}" data-id="{{$comment->id}}" href="javascript:;">Edit Comment</a></li>
          </ul>
        </div>
        <span class="notification-icon" style="float: right;margin-right: 10px;">
          <a href="javascript:;" class="accept-request accept-request-save {{$save_fw}}" data-id="{{$comment->user->id}}">
          <span class="icon-minus without-text">
              <svg class="olymp-star-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
          </span>
          </a>
        </span>

          @else

            <div class="more">
              <svg class="olymp-three-dots-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
              </svg>
              <ul class="more-dropdown">
                <li><a href="javascript:;" class="report_comment" data-id="{{$comment->id}}">Report Comment</a></li>
            </div>
            <span class="notification-icon" style="float: right;margin-right: 10px;">
          <a href="javascript:;" class="accept-request accept-request-save {{$save_fw}}" data-id="{{$comment->user->id}}">
          <span class="icon-minus without-text">
              <svg class="olymp-star-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
          </span>
          </a>
        </span>

          @endif
            @else
          <div class="more">
            <svg class="olymp-three-dots-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
            </svg>
            <ul class="more-dropdown">
              <li><a href="javascript:;" class="report_comment">Report Comment</a></li>
          </div>
          <span class="notification-icon" style="float: right;margin-right: 10px;">
          <a href="javascript:;" class="accept-request accept-request-save {{$save_fw}}" data-id="{{$comment->user->id}}">
          <span class="icon-minus without-text">
              <svg class="olymp-star-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
          </span>
          </a>
        </span>
          @endif
      </div>
      @if($comment->image)
         <img src="{{$comment->image->url}}">
      @else

      @endif

      <div class="friend-avatar" style="margin-top: 0px">
            <p class="friend-about" style="word-break: break-all;margin-right: 15px">
              <span>
                   @php
                     // Get raw comment
                    $text = $comment->content;
                    $comments = preg_replace('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', "<a href=\"\\0\">\\0</a>", $text);
                    echo $comments;
                   @endphp
              </span>
            </p>
      </div>
      @if($comment->external_link)
        @php
          $data = (object) getInfoUrl($comment->external_link);
        @endphp
        @include('template_part.content-external_link', ['data' => $data])
      @endif

      @if($comment->video)
        @include('template_part.content-video-status', ['video' => $comment->video])
      @endif


      @if($comment->list_media)
        @php
          $count = count($comment->images());
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
        <div class="post-block-photo js-zoom-gallery hp_showimg photo-content-list">

          @foreach($comment->images() as $key=>$images)
            <a href="{{$images->url}}" class="{{$class}} {{($key >4)?'d-none':''}}">
              <img class="test" src="{{$images->url}}" alt="photo">
            </a>
          @endforeach
        </div>
      @endif


      @if($comment->list_file)
    <ul class="notification-list friend-requests file-content-list">
      @foreach($comment->files() as $key=>$file)
        <li style="padding: 15px 15px 15px 0px;">
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


      @auth
        <div class="post-additional-info inline-items" style="padding-bottom: 20px;">
          <?php
          $post = $comment->post;

          $like_svg = 'upvote-inactive.svg';
          $dislike_svg = 'downvote-inactive.svg';
          $likecmt = \App\Models\PostLikeCmt::where([
            ['_comment', $comment->id],
            ['likecm',1],
          ])->get();
          $dislikecmt = \App\Models\PostLikeCmt::where([
            ['_comment', $comment->id],
            ['dislikecmt',1],
          ])->get();
          $heart = \App\Models\PostLikeCmt::where([
            ['_comment', $comment->id],
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
          <a href="javascript:;" class="post-add-icon inline-items {{$target}} {{$targets}} likecmt_btn likecmt-{{$comment->id}}" data-check_like = "1" data-user="{{$comment->user->id}}" data-stcmt="{{$comment->id}}" data-id="{{$post->id}}">
            <img class="mains" src="{{asset("public/frontend/img/$like_svg")}}">
            <img class="upvotes" hidden src="{{asset("public/frontend/img/upvote-active.svg")}}">
            <span class="pending" >{{$totallikecmt}}</span>
          </a>
          <a href="javascript:;" class="post-add-icon inline-items {{$target}} {{$targets}} dislikecmt_btn dislikecmt-{{$comment->id}}" data-check_like = "0" data-user="{{$comment->user->id}}" data-stcmt="{{$comment->id}}" data-id="{{$post->id}}">
            <img class="mains" src="{{asset("public/frontend/img/$dislike_svg")}}">
            <img class="downvotes" hidden src="{{asset("public/frontend/img/downvote-active.svg")}}">
            <span class="pending" >{{$totaldislikecmt}}</span>
          </a>
          <a href="javascript:;" class="post-add-icon inline-items {{$targeted_heart}} heart_btn " data-toggle="tooltip" data-placement="top" title="" data-user="{{$comment->user->id}}" data-stcmt="{{$comment->id}}" data-id="{{$post->id}}" data-original-title="Like">
            <svg class="olymp-heart-icon" style="height: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
            <span class="pending">{{$totalheart}}</span>
          </a>
          <a data-toggle="modal" data-target="#chatbox" href="javascript:;" class="post-add-icon inline-items count-comment popup-comment-cmt" data-id="{{$comment->id}}" data-placement="top" title="Comments">
            <svg class="olymp-speech-balloon-icon" style="height: 16px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
            <span>{{$comment->total_comments}}</span>
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
      @endauth

   </li>

<div class="modal fade" id="edit-cmt-popup" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog window-popup5 edit-widget edit-widget-blog-post" role="document" style="width: 100%;">
    <div class="modal-content">
      <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
        <svg class="olymp-close-icon">
          <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
        </svg>
      </a>
      <div class="modal-body">

        <div class="open-photo-content">
          <form id="edit_comment" class="files-group" data-popup="5">
            <div id="edit-comment-status-by-modal">
            </div>
            <div class="add-options-message" style="display: inline-block">
              <input type="hidden" name="list_media" value="">
              <input type="hidden" name="list_video" value="">
              <input type="hidden" data-edit-file='0' name="list_file" value="">
              <div class="post-message-left">
                <a id="addfile" href="javascript:;" data-id="{{$comment->id}}" data-edit-file="0" data-popup="5" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD FILE">
                  <label for="add-file" class="marginbottom-0">
                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#add-file">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                    </svg>
                  </label>
                </a>
                <a id="add-image" href="javascript:;" data-id="{{$comment->id}}" data-edit-image="0" data-popup="5" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTO">
                  <label for="add-photo" class="marginbottom-0">
                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                    </svg>
                  </label>
                </a>
                <a id="addvideo" href="javascript:;" data-id="{{$comment->id}}" data-edit-video="0" data-popup="5" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD VIDEO">
                  <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-video">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                  </svg>
                </a>
                <a id="addlink" href="javascript:;" data-id="{{$comment->id}}" data-edit-link="0" data-popup="5" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD EXTERNAL LINK">
                  <svg class="olymp-computer-icon" data-toggle="modal" data-target="#add-link">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                  </svg>
                </a>
              </div>
              <div class="post-message-right">
                <button class="btn btn-primary btn-md-2" data-popup="5">Post</button>
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


