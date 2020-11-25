<div class="ui-block-content video-status status-video" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px; padding-top: 0px">
  <!-- W-Latest-Video -->
  <div class="post-video">
      <a href="javascript:;" class="col col-3-width videovideo clone d-hidden " style="max-width: 20%;" >
        <i class="fas fa-times-circle  removevideo"></i>
      </a>
    <div class="video-thumb f-none">
      <img src="{{$video->image_url}}" alt="photo" style="width: 100%">
      <a href="{{$video->media->url}}" class="play-video">
        <svg class="olymp-play-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
      </a>
    </div>
  </div>
  <!-- .. end W-Latest-Video -->
</div>

