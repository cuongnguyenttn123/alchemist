
  <li>
    <div class="author-thumb">
      @php
        $user_report = $user;
        $img_avt = 'http://calchemunity.com/public/frontend/img/author-page.jpg';
          if (isset($n->data->user_report)){
              $user_report = \App\Models\User::find($n->data->user_report);
              $img_avt = $user_report->getAvatarImgAttributeDefault();
           }
      @endphp
      <img src="{{$img_avt}}" alt="author">
    </div>
    <div class="notification-event">
      <a href="#" class="h6 notification-friend">{{$user_report->full_name}} </a> {!!$n->data->description ?? ''!!} <a href="{!!$n->data->link ?? ''!!}" class="notification-link">{!!$n->data->title ?? ''!!}</a>.
      <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">{{$n->created_at->diffForHumans()}}</time></span>
    </div>
  </li>

