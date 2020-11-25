
<li class="{{ (Auth::id() == $ps->_user ) ? 'seeker-mess' : 'alchemist-mess'}}" style="padding-top: 15px;padding-bottom: 10px;">
   @if(isset($target_id) && $target_id != $ps->user->id)
   <div class="author-thumb">
     <div style="margin-top: 15px; ">
       {!!$ps->user->avatar_img!!}
     </div>

   </div>
    @else
   @endif
   <div class="notification-event" style="padding-top:0px;width:100%;">
    @if(isset($target_id) && $target_id != $ps->user->id)
      <a href="javascript:;" class="h6 notification-friend">{{$ps->user->full_name}}</a>
    @endif

      <span class="notification-date" style="bottom: inherit;">
         <time class="entry-date updated">{{$ps->created_at->diffForHumans()}}</time>
      </span>
      <span class="chat-message-item" style="clear: both;">{!!$ps->message!!}</span>
      @if($ps->attach())
        <div class=" hp_showimg js-zoom-gallery post-block-photo" style="clear: both;margin: 10px 0 0;">
        @foreach($ps->attach() as $file)
          @if($file->extension == 'jpg' || $file->extension == 'png' || $file->extension == 'gif')
            <a href="{{$file->link}}" class="col col-3-width no-padding image_show" style="float:left;max-width: 20%;margin-right: 10px">
              <img src="{{$file->link}}" alt="photo" style="object-fit: cover;">
            </a>
          @else
            <div class="forum-item" style="clear: both;margin: 10px 0;">
              <img class="img_prefile" src="img/{{$file->extension}}.svg" alt="forum" width="40">
              <div class="content">
                <a href="{{$file->link}}" class="h6 title stop-show" style="word-break: break-word;padding: 0;" download>{{$file->name}}</a>
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



