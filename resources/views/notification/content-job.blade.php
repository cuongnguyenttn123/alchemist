
<li data-id="{{$n->id}}">
    <div class="author-thumb">
      @php
        $dd = public_path()."/frontend/img/notification/".$n->data->type.".svg";
        if (file_exists( $dd)) {
            $bb = url("public/frontend/img/notification/".$n->data->type.".svg");
        } else {
            $bb = 'img/notification/default.svg';
        }
      @endphp
      <img src="{{$bb}}" alt="author">
    </div>
    <div class="notification-event">
       <a href="javascript:;" class="h6 notification-friend">{{$n->data->title}}</a>
       @if($n->data->sub_title)
       <span class="chat-message-item"><strong>{{$n->data->sub_title ?? ''}}</strong></span><br>
       @endif
       <span class="chat-message-item">{!!$n->data->description ?? ''!!}</a></span>
       <span class="notification-date"><time class="entry-date updated">{{$n->created_at->diffForHumans()}}</time></span>
    </div>
    <span class="notification-icon">
       <a href="{{$n->data->link}}" class="accept-request del_notif"style="background-color: #FFB600">
       	<img src="img/notification/focus-notify.svg" width="22">
       </a>
       <a href="javascript:;" class="accept-request del_notif">
          <span class="">
            <svg class="olymp-close-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
            </svg>
          </span>
       </a>
    </span>
</li>
