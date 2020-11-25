
<div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">

  <div class="ui-block video-item" >
    <div class="video-player portfolio-video">
      <img class="image_url" src="{{$data->img_url ?? ""}}" alt="photo">
      <a href="{{$data->url ?? ""}}" class="play-video">
        <svg class="olymp-play-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
      </a>
      <div class="overlay overlay-dark"></div>
      <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></div>
    </div>

    <div class="ui-block-content video-content" style="padding-bottom: 10px">
      <span class="time-total">{{gmdate("H:i:s", (double)$video->duration ?? "")}}</span><br>
      <time class="published" datetime="2017-03-24T18:18" >Added: {{$video->time_ago}}</time>

      <a href="javascript" class="h6 title" style="margin-bottom: 10px;margin-top: 5px">{{$video->name}}</a>
      <br><br><br>
      <div class="friend-avatar">
        <p class="friend-about" data-swiper-parallax="-500">
          <span>{{$video->description ?? 'N/A'}}</span>
        </p>
      </div>


    </div>
  </div>

</div>
