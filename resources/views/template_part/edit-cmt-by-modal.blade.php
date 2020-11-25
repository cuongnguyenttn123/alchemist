
  <div class="form-group label-floating is-empty">
    <textarea class="form-control" placeholder="" name="caption">
        {{$post->content}}
      </textarea>
    <input type="hidden" name="idPost" value="{{$post->id}}">
  </div>
  <div class="ui-block-title ui-block-title-small previewaction d-hidden" style="text-align: center;border-top: 0px solid #e6ecf5;">
    <h6 class="title">Preview Action</h6>
  </div>
    <div class="ui-block-content photo-preview" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px">
      <div class="post-block-photo post-block-photocount ">
      @if($post->list_media)
        @foreach($post->images() as $key=>$images)
          <a href="javascript:;" class="col col-3-width clone clone-img" style="max-width: 20%;">
            <svg class="svg-inline--fa fa-times-circle fa-w-16 removeimg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" data-id="{{$images->id}}">
              <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path></svg><!-- <i class="fas fa-times-circle removeimg"></i> -->
            <img class="" src="{{$images->url}}" alt="photo" style="object-fit: cover;height: 90px;margin-top: 10px;">
          </a>
        @endforeach
      @endif
      </div>
    </div>
    <div>
      <a href="javascript:;" class="col col-3-width clone d-hidden" style="max-width: 20%;">
        <svg class="svg-inline--fa fa-times-circle fa-w-16 removeimg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path></svg><!-- <i class="fas fa-times-circle removeimg"></i> -->
        <img class="" src="img/1.jpg" alt="photo" style="object-fit: cover;height: 90px;margin-top: 10px;">
      </a>
    </div>


  <div class="ui-block" style="margin-bottom: 0px; border:none !important;">
    <div class="cart-main abscssss ui-block-comment-edit-{{$post->id}}">
      <div>
        <div class="shop_table cart countui">
          <div class="hienthi material-input">
            @if($post->list_file)
              <ul class="file-list">
                @foreach($post->files() as $key=>$file)
                  <li style="padding: 15px 0px 15px 0px;">
                    <div class="cart_item delete-view-{{$post->id}}" style="margin-bottom: 10px; border-bottom: 1px solid #e6ecf5;">
                      <div class="ui-block" data-mh="pie-chart" style="padding: 15px;margin: 0px;border: none;">
                        <div class="forum-item">
                          <img src="img/{{$file->extension}}.svg" alt="forum" width="40">
                          <div class="content">
                            <a href="javascript:;" class="h6 title" style="word-break: break-word;">{{$file->name}}</a>
                            <div class="post__date">
                              <time class="published" datetime="2017-03-24T18:18">{{$file->extension}} File</time>
                            </div>
                          </div>
                          <span class="notification-icon click-delete-file" data-filedelete="{{$file->id}}" style="margin-top: -35px; float: right; display: block;">
                    <a href="javascript:;" data-delete_file="" class="accept-request request-del">
                      <span class="delete-file">
                        <img src="img/trash.svg" class="olymp-close-icon" style="margin: auto; height: 15px; width: 15px;">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                      </span>
                    </a>
                </span>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>
            @endif
            @if($post->external_link)
              @php
                $data = (object) getInfoUrl($post->external_link);
              @endphp
              <div class="link-list">
                @include('template_part.content-external_link', ['data' => $data])
              </div>
            @endif
            @if($post->video)
              <div class="video-list">
                @include('template_part.content-video-status', ['video' => $post->video])
              </div>
            @endif
              <div class="post-comment-cnsss d-hidden"></div>
            @if($post->album)
              @php
                $checkAlbum = 1;
              @endphp
              <div class="post-block-photo js-zoom-gallery">
                @foreach($post->album->media as $media)
                  <a href="{{$media->url}}" class="half-width">
                    <div style="width: 100%;height: 100%;">
                      <img class="test" src="{{$media->url}}" alt="photo">
                    </div>
                  </a>
                @endforeach
              </div>
            @endif
            </div>
        </div>
      </div>
    </div>
  </div>



