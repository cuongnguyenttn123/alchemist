<div class="chat-field">
  <div class="mCustomScrollbar ps ps--theme_default" data-mcs-theme="dark" style="max-height: 250px;" data-ps-id="fd53acde-7804-8fa7-f5f8-798d63e425de">
    <ul class="notification-list chat-message chat-message-field list-comment-right">
      @foreach($comment as $comm)
        @include('template_part.content-comment-popup',['comment' => $comm])
      @endforeach
    </ul>
    <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
  <form>
  </form>
</div>
