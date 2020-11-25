
<div class="ui-block-content">
   <!-- W-Latest-Video -->
   @if($featurevideos = $user->featurevideos)
   <ul class="widget w-last-video">
      @foreach($featurevideos as $media)
        @if($media->video->external_link=='')
      <li>
         <a href="{{$media->url}}" class="play-video play-video--small">
            <svg class="olymp-play-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
            </svg>
         </a>
         <img src="{{$media->video->image_url}}" alt="video">
         <div class="video-content">
            <div class="title">{{$media->video->name}}</div>
            <time class="published">{{$media->video->duration ?? ""}}</time>
         </div>
         <div class="overlay"></div>
      </li>
       @else
         <?php $data =(object) getInfoUrl($media->video->external_link)?>
         <li>
           <a href="{{$media->url}}" class="play-video play-video--small">
             <svg class="olymp-play-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
             </svg>
           </a>
           <img src="{{$data->img_url}}" alt="video">
           <div class="video-content">
             <div class="title">{{$media->video->name}}</div>
             <time class="published">{{$media->video->duration ?? ""}}</time>
           </div>
           <div class="overlay"></div>
         </li>
       @endif
      @endforeach
   </ul>
   @endif
   <!-- .. end W-Latest-Video -->
</div>
