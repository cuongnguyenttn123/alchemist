
<li class="{{ (Auth::id() == $message->_user ) ? 'seeker-mess' : 'alchemist-mess'}}" style="padding-top: 0px;padding-bottom: 5px;">

  @if(isset($target_id) && $target_id != $message->user->id)
    <div class="author-thumb" style="margin-top: 10px;">
      {!!$message->user->getAvatarImgAttribute(36)!!}
    </div>
  @endif
  <div class="notification-event" style="width: 100%;padding-top: 0px;">
    @if(isset($target_id) && $target_id != $message->user->id)
      <a href="javascript:;" class="h6 notification-friend" style="padding-top: 10px;">{{$message->user->fullname}}</a>
    @endif
    <span class="notification-date d-none" style="top: 10px;"><time class="entry-date updated">{{$message->created_at->diffForHumans()}}</time></span>
    <span class="chat-message-item" style="clear: both;margin: 10px 0;">{!!$message->message!!}</span>
    @if($message->attach())
      <div class="{{-- added-photos --}} hp_showimg js-zoom-gallery post-block-photo" style="clear: both;margin: 10px 0 0;">
        @foreach($message->attach() as $file)
          @if($file->extension == 'jpg' || $file->extension == 'png' || $file->extension == 'gif')
            <a href="{{$file->link}}" class="col col-3-width no-padding image_show" style="float:left;max-width: 20%;margin-right: 10px">
              <img src="{{$file->link}}" alt="photo" style="object-fit: cover;">
            </a>
          @else
            <div class="forum-item" style="clear: both;padding-bottom: 10px;">
              <img class="img_prefile" src="img/{{$file->extension}}.svg" alt="forum" width="40">
              <div class="content">
                <a href="{{$file->link}}" class="h6 title stop-show" style="word-break: break-word;padding: 0;margin-bottom: 0;" download>{{$file->name}}</a>
                <div class="post__date" style="clear: both;">
                  <time class="published">{{$file->extension}} File</time>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    @endif
  </div>
</li>

