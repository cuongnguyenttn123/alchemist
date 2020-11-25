<div id="video-{{$video->id}}" class="model_video col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 ">
   <div class="ui-block video-item">
      <div class="video-player portfolio-video">
         <img class="image_url" src="{{$video->image_url}}" alt="photo" >
         <a href="{{$video->media->url}}" class="play-video">
            <svg class="olymp-play-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
            </svg>
         </a>
         <div class="overlay overlay-dark"></div>
         <div class="more">
            <svg class="olymp-three-dots-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
            </svg>
            <ul class="more-dropdown more-with-triangle triangle-top-right">
               <li>
                  <a href="javascript:;" class="replace_video">Replace Video Image</a>
                  <input type="file" class="hidden d-none" name="replace_video" accept="image/*">
               </li>
               <li>
                  <a href="javascript:;" class="delete_video">Delete</a>
               </li>
            </ul>
         </div>
      </div>
      <div class="ui-block-content video-content" style="padding-bottom: 10px">
         <form>
            <div class="form-group label-floating">
               <label class="control-label">Video Name</label>
               <input class="form-control" placeholder="" type="text" name="video_name" value="{{$video->name ?? ""}}">
            </div>
            <div class="form-group label-floating">
               <label class="control-label">Video Description</label>
               <textarea class="form-control" placeholder="" name="description">{{$video->description ?? ""}}</textarea>
            </div>
            <div class="checkbox" style="">
               <label>
               <input type="checkbox" name="featured" value="1" {{$video->media->is_featured ? "checked" : ""}}>
               Make Featured (<span class="current_fv">{{$target_user->total_featured_videos}}</span>/{{$target_user->max_featuredvideo}})
               </label>
            </div>
            <div class=" align-left inline-items">
               <a href="javascript:;" class="save_video btn btn-primary btn-sm">Save</a>
            </div>
         </form>
      </div>
   </div>
</div>
