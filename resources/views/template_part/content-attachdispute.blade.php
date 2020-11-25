
<li class="cart_item">
  <div class="author-thumb">
    <img class="img-complete-contest" src="img/{{$file->extension}}.svg" alt="author" style="width: 38px;border-radius: 0%;">
  </div>
  <div class="notification-event" style="padding-left: 55px">
    <div class="content">
      <a href="{{$file->link}}" data-name="{{$file->ori_name}}" class="h6 title my-files" style="font-size: 11px" download>{{$file->name}}</a>
      <div class="post__date">
        <time class="published" style="font-size: 11px">{{$file->extension}} File</time>
      </div>
    </div>
    <span class="notification-icon" style="float: right;display: block;margin-top: 5px;">
    <a href="{{$file->link}}" class="accept-request request-del" download>
      <span class="">
        <img src="svg-icons/sprites/download.svg" class="olymp-close-icon" style="height: 15px;width: 15px;">
        <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
      </span>
    </a>
  </span>
  </div>

</li>


