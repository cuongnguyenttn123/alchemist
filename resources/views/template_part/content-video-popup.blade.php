<div id="video-{{$video->id}}" class="model_video col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
  <div class="ui-block video-item">
    <div class="ui-block-content video-status status-video" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px; padding-top: 0px">
      <!-- W-Latest-Video -->
      <div class="post-video">
        <a href="javascript:;" class="col col-3-width videovideo clone" style="max-width: 20%; display: none">
          <svg class="svg-inline--fa fa-times-circle fa-w-16 removevideo" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path></svg><!-- <i class="fas fa-times-circle  removevideo"></i> -->
        </a>
        <div class="video-thumb f-none">
          <img class="image_url" src="{{$video->image_url}}" alt="photo" >
          <a href="{{$video->media->url}}" class="play-video">
            <svg class="olymp-play-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
            </svg>
          </a>
        </div>
      </div>
      <!-- .. end W-Latest-Video -->
    </div>
    <div class="ui-block-content video-content" style="padding-bottom: 10px">
      <p>
        {{$video->name}}
      </p>
      <br>
      <p>
        {{$video->description ?? ""}}
      </p>
      <div id="post-myvideo">
        <input type="hidden" name="video" value="{{$video->id}}">
        <div class=" align-left inline-items">
          <a href="javascript:;" class="post_myvideo btn btn-primary btn-sm">Post</a>
        </div>
      </div>
    </div>
  </div>
</div>
