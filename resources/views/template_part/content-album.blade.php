<head>
  <link href="css/huystyle.css" rel="stylesheet" type="text/css">
</head>
<div id="album-{{$album->id}}" class="model_album photo-album-item-wrap col-4-width">
  <div class="photo-album-item" data-mh="album-item">
    <div class="photo-item">
      <img src="{{$album->firstImageUrl()}}" alt="photo" class="header-album" style="width:100%; height: 250px">
      <div class="overlay overlay-dark"></div>
      <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
      <a href="#" class="post-add-icon">
        <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
        <span>{{$album->post->likes()}}</span>
      </a>
      <a href="javascript:;" data-id="{{$album->id}}" data-images="{{json_encode($album->images())}}" data-toggle="modal" data-target="#open-photo-popup-v2-{{$album->id}}" class=" slider-check-0 full-block popup-album"></a>

    </div>
    <div class="content">
      <a href="javascript:;"  class="title h5">{{$album->album}}</a>
      <span class="sub-title">Last Added: {{$album->created_at->diffForHumans()}}</span>

        {{-- If not current user's album show this --}}
        @if(isset($target_user->id) && Auth::id() != $target_user->id)
        <div class="">
        <div class="">
          <div class="">
            <div class="friend-count" >
              <a href="javascript:;"  class="friend-count-item">
                @if($album->post->likes() == null)
                  <div class="h6">0</div>
                @else
                  <div class="h6">{{$album->post->likes()}}</div>
                @endif

                <div class="title">Upvotes</div>
              </a>
              <a href="javascript:;"  class="friend-count-item comment">
                <div class="h6">{{$album->post->comments->count()}}</div>
                <div class="title">Comments</div>
              </a>
              <a href="javascript:;"  class="friend-count-item">
                @if($album->post->user_like_status() == null)
                  <div class="h6">0</div>
                @else
                  <div class="h6">{{$album->post->user_like_status()}}</div>
                @endif
                <div class="title">Likes</div>
              </a>
            </div>
          </div>
        </div>
        @endif

        {{-- If current user's album show this --}}
        @if(isset($target_user->id) && Auth::id() == $target_user->id)
            <div class="">
            <div class="">
              <div class="">
                <div class="friend-count" >
                  <a href="javascript:;"  class="friend-count-item">
                      <div class="h6">{{$album->media->count()}}</div>
                    <div class="title">Photos</div>
                  </a>
                  <a href="javascript:;"  class="friend-count-item comment">
                    <div class="h6">{{$album->post->comments->count()}}</div>
                    <div class="title">Comments</div>
                  </a>
                  <a href="javascript:;"  class="friend-count-item">
                    <div class="h6">0</div>
                    <div class="title">Shares</div>
                  </a>
                </div>
              </div>
            </div>
          <div class=" align-center inline-items">
            <a href="javascript:;" class="edit_album btn btn-blue btn-sm">Edit +</a>
            @if(!$album->is_feed)
              <a href="javascript:;" class="album_to_feed btn btn-sm btn-secondary" data-type="add">Post to Feed (<span class="album_left">{{$target_user->album_left}}</span>)</a>
            @else
              <a href="javascript:;" class="album_to_feed btn btn-sm btn-primary" data-type="remove">Posted (<span class="album_feed">{{$target_user->postsAlbumFeed->count()}}</span>)</a>
            @endif
            <a href="javascript:;" class="del_album btn btn-sm btn-border-think custom-color c-grey">Delete Album</a>
          </div>
        @else
          <div class=" align-center inline-items">
            <a href="javascript:;" data-toggle="modal" data-target="#open-photo-popup-v2-{{$album->id}}" class="btn btn-blue btn-sm">View Album  +<div class="ripple-container"></div></a>
          </div>
      @endif
      <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</div>
<!-- Window-popup Open Photo Popup V2 -->
@include('modal.photo_popup_v2',[$album])
<!-- ... end Window-popup Open Photo Popup V2 -->
