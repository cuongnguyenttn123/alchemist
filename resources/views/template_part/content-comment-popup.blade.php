<li class="comment-padding content-comment-popup-{{$comment->id}}">
  <div class="author-thumb" style="left: 21px">
    <img src="{{$comment->user->getAvatarImgAttributeDefault()}}" alt="author" style="width:100%;border: solid;border-width: 3px;border-color: #E9E9E9;">
    <div class="label-avatar bg-primary" style="z-index: 4;width: 15px;height: 15px;font-size: 9px;position: absolute;left: -2px;">{{$comment->user->level}}</div>
  </div>
  <div class="control-block-button post-control-button " style="margin-left: 0px;margin-top: 45px;display: grid;">
    <?php
    $save_fw = 'add-fw';
    if ($comment->user->is_saved_newsFeed()){
      $save_fw = '';
    }
    ?>
    <span class="notification-icon" style="float: right">
                      <a href="javascript:;" class="accept-request {{$save_fw}}" data-id="{{$comment->user->id}}" style="">
                        <span class="icon-add without-text">
                    <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                  </span>
                      </a>
                    </span>

  </div>
  <div class="notification-event" style="margin-left: 35px;width: 100%;">
    <a href="#" class="h6 notification-friend">{{$comment->user->fullname}}</a>
    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">{{$comment->update_at}}</time></span>

    @if($comment->image)
      <div class="added-photos inline-items js-zoom-gallery" style="margin-top: 10px;">
        <a href="img/1.jpg" class="col col-3-width no-padding" style="max-width: 20%;margin-right: 10px">
          <img src="{{$comment->image->url}}" alt="photo">
        </a>
      </div>
    @else
      <div class="" style="margin-top: 10px; min-height: 90px">
        <br>
        <p style="word-break: break-all;">
          @php
            // Get raw comment
           $text = $comment->content;
           $comments = preg_replace('!(http|ftp|scp)(s)?:\/\/[a-zA-Z0-9.?%=&_/]+!', "<a href=\"\\0\">\\0</a>", $text);
           echo $comments;
          @endphp
        </p>
        {{--<p>{!!nl2br($comment->content)!!}</p>--}}

        @if($comment->external_link)
          @php
            $data = (object) getInfoUrl($comment->external_link);
          @endphp
        <div class="content-external-link">
          @include('template_part.content-external_link', ['data' => $data])
        </div>

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
                <img class="test" src="{{$images->url}}" alt="photo" style="object-fit: cover;">
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
      </div>

    @endif
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
  </div>
  <div class="comments-shared " style="margin-top: 5px;border-top: 1px solid #e6ecf5;padding-top: 15px;width: 100%;">
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

    <a data-toggle="modal" data-target="#poppup-comment" data-id="{{$comment->id}}" data-id_post="{{$comment->_post}}" href="javascript:;" class="post-add-icon inline-items count-comment reply-comment-left" data-placement="top" title="Comments">
      <svg class="olymp-speech-balloon-icon" style="height: 16px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
      <span>{{$comment->total_comments}}</span>
    </a>
  </div>
</li>
