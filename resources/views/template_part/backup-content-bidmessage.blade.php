<li>
  <div class="author-thumb">
     {!!$message->user->getAvatarImgAttribute(36)!!}
  </div>
  <div class="notification-event" style="padding-left: 5px;padding-top:8px;max-width:100%;">
     <a href="javascript:;" class="h6 notification-friend">{{$message->user->full_name}}</a>
     
     <span style="float: left;width: 100%;">{{$message->message}}</span>
     <div style="float: left;">
      @if($message->attach())
      @foreach($message->attach() as $file)
        <a href="{{$file->link}}">{{$file->name}}</a>
      @endforeach
      @endif
     </div>
     <span class="notification-date">
        <time style="position: absolute;right: 25px;top: 35px;" class="entry-date updated" >{{$message->created_at->diffForHumans()}}</time>
     </span>
  </div>
</li>