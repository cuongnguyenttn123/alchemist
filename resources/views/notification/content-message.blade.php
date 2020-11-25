<li>
  <div class="author-thumb">
     <img src="{{$n->data->avatar}}" alt="author" width="36">
  </div>
  <div class="notification-event">
     <a href="{{$n->data->link}}" class="h6 notification-friend">{{$n->data->from}}</a>
     <span class="chat-message-item">{{$n->data->message}}</span>
     <span class="notification-date"><time class="entry-date updated">{{$n->created_at->diffForHumans()}}</time></span>
  </div>
  <span class="notification-icon">
     <svg class="olymp-chat---messages-icon">
        <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
     </svg>
  </span>
</li>