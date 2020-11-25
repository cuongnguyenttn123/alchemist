<div class="container">
  <div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding my_videos">
      <div class="row">
        @foreach($video as $video)
          @include('template_part.content-video-popup', [$video])
        @endforeach
      </div>
    </div>
  </div>
</div>
