

<div class="ui-block-content video-prevs video-post" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px;padding-top: 0px;">
   <div class="post-video ">
     <div>
       <a href="javascript:;" class="col col-3-width clone linklink d-hidden" style="max-width: 20%;" >
         <i class="fas fa-times-circle  removelink"></i>
       </a>
     </div>
      <div class="video-thumb ">
        <img src="{{$data->img_url ?? ""}}" alt="photo" >
        <a href="{{$data->url ?? ""}}" class="{{($data->video) ? "play-video" : ""}}" {{($data->video) ? "" : "target=blank"}}>
          @if($data->video)
            <svg class="olymp-play-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
            </svg>
          @endif
        </a>
      </div>
      <div class="video-content">
        <a href="{{$data->url ?? ""}}" {{($data->video) ? "" : "target=blank"}} class="h4 title">{{$data->title ?? ""}}</a>
        <p>{{$data->desc ?? ""}}</p>
        <a href="{{$data->url ?? ""}}" {{($data->video) ? "" : "target=blank"}} class="link-site">{{$data->host ?? ""}}</a>
      </div>
   </div>

    <input type="hidden" name="external_link" value="{{$data->url ?? ""}}">
</div>

