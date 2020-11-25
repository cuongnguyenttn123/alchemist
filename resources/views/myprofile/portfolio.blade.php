@extends('myprofile.master_pro')
@section('title')
  Portfolio
@endsection
@section('content')
  <head>
    <link rel="stylesheet" href="css/huystyle.css">
  </head>


  @include('myprofile.profile_header')
  <div class="container">
    <div class="row">
      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ui-block responsive-flex">
          <div class="ui-block-title" style="height: 50">
            <div class="h6 title" style="padding: 10px 0">{{$target_user->full_name}}’s Portfolio</div>
            <ul class="nav nav-tabs photo-gallery" role="tablist">
              <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Albums">
                <a class="nav-link active" data-toggle="tab" href="#album-page" role="tab">
                  <svg class="olymp-albums-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
                  </svg>
                </a>
              </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Videos">
                <a class="nav-link" data-toggle="tab" href="#photo-page" role="tab">
                  <svg class="olymp-play-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                  </svg>
                </a>
              </li>
            </ul>
            <a href="javascript:;" class="more">
              <svg class="olymp-three-dots-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane" id="photo-page" role="tabpanel">
            <div class="container" id="video-page">
              <div class="row" >
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                  <div class="ui-block">
                    <div class="ui-block-title">
                      <div class="h6 title">{{$target_user->full_name}}’s Videos</div>
                      @if(Auth::id() == $target_user->id)
                        <div class="align-right">
                          <a href="javascript:;" class="upload_video btn btn-primary btn-md-2">Upload Video  +</a>
                          <a href="#" data-toggle="modal" data-popup="0" data-target="#add-link" class="btn btn-md-2 btn-border-think custom-color options-message c-grey">Add Video Link<div class="ripple-container"></div></a>
                          <input id="upload_video" class="hidden d-none" type="file" name="video_file" accept="video/*" multiple/>
                        </div>
                        <a href="javascript:;" class="more">
                          <svg class="olymp-three-dots-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                          </svg>
                        </a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container" id="list-video-page">
              <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding my_videos">
                  <div class="row">
                    @foreach($target_user->videos as $video)
                      @if(Auth::id() == $target_user->id)
                        @if($video->external_link==null)
                          @include('template_part.content-video', [$video])
                        @else
                          @include('template_part.content-video-link', [$video,$data=(object) getInfoUrl($video->external_link)])
                        @endif
                      @else
                        @if($video->external_link==null)
                          @include('template_part.content-video-view', [$video])
                        @else
                          @include('template_part.content-video-view-link', [$video,$data=(object) getInfoUrl($video->external_link)])
                        @endif
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane active" id="album-page" role="tabpanel">
            <div class="container">
              <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                  <div class="ui-block">
                    <div class="ui-block-title">
                      <div class="h6 title">{{$target_user->full_name}}'s Albums</div>
                      @if(Auth::id() == $target_user->id)
                        <div class=" align-right">
                          <a href="javascript:;" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Create Album  +</a>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="photo-album-wrapper">
              @if(Auth::id() == $target_user->id)
                <div class="photo-album-item-wrap col-4-width" >
                  <div class="photo-album-item create-album" data-mh="album-item">
                    <a href="javascript:;" data-toggle="modal" data-target="#create-photo-album" class="full-block"></a>
                    <div class="content">
                      <a href="javascript:;" class="btn btn-control bg-primary" data-toggle="modal" data-target="#create-photo-album">
                        <svg class="olymp-plus-icon">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                        </svg>
                      </a>
                      <a href="javascript:;" class="title h5" data-toggle="modal" data-target="#create-photo-album">Create an Album</a>
                      <span class="sub-title">It only takes a few minutes!</span>
                    </div>
                  </div>
                </div>
              @endif
              @foreach($albums as $album)
                @include('template_part.content-album', [$album])
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-spacer"></div>

  <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 video_parttern d-none">
    <div class="ui-block video-item">
      <div class="video-player portfolio-video">
        <img src="img/vid-4.jpg" alt="photo" style="width:100%; height: 250px">
        <a href="https://www.youtube.com/watch?v=Bey4XXJAqS8" class="play-video">
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
              <a href="javascript:;" data-toggle="modal" data-target="#update-header-photo">Replace Video Image</a>
            </li>
            <li>
              <a href="javascript:;" data-toggle="modal" data-target="#update-header-photo">Delete</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="ui-block-content video-content" style="padding-bottom: 10px">
        <form class="form-group label-floating">
          <label class="control-label">Video Name</label>
          <input class="form-control" placeholder="" type="text" value="" name="name">>
        </form>
        <form class="form-group label-floating">
          <label class="control-label">Video Description</label>
          <textarea class="form-control" placeholder="" name="description"></textarea>
        </form>
        <div class="checkbox" style="">
          <label>
            <input type="checkbox" name="optionsCheckboxes">
            Make Featured (0/3)
          </label>
        </div>
        <div class=" align-left inline-items">
          <a href="javascript:;" data-toggle="modal" data-target="#open-photo-popup-v2" class="btn btn-primary btn-sm">Save</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Window-popup Open Photo Popup V1 -->
  @include('modal.photo_popup_v1')
  <!-- ... end Window-popup Open Photo Popup V1 -->
  <!-- Window-popup Create Photo Album -->
  @include('modal.create_album')
  <!-- ... end Window-popup Create Photo Album -->
  <!-- Window-popup Update Header Photo -->
  <div class="modal fade" id="poppup-comment" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog window-popup2 edit-widget edit-widget-blog-post" style="width: 100%" role="document">
      <div class="modal-content">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
          </svg>
        </a>
        <div class="modal-body modal-comment-body modal-comment-body-popup">

          <div class="open-photo-content" id="f">


          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="add-file" tabindex="-1" role="dialog" aria-labelledby="add-file" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
      <div class="modal-content">
        <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <input id="upload_file_status" class="hidden d-none" type="file" name="file_status" accept="file/*" multiple="">
        <div class="modal-header">
          <h6 class="title">+ Add Files</h6>
        </div>

        <div class="modal-body" style="padding: 0px !important;">
          <a href="javascript:;" class="upload-photo-item upload-file-status">
            <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>


            <h6>Upload</h6>
            <span>Browse your computer.</span>
          </a>

          <a href="javascript:;" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

            <svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

            <h6>Choose from My Files</h6>
            <span>Choose from your uploaded files</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="hp_previewfile">
    <div class="cart_item d-none" style="margin-bottom: 10px; border-bottom: 1px solid #e6ecf5;">
      <div class="ui-block" data-mh="pie-chart" style="padding: 15px;margin: 0px;border: none;">
        <div class="forum-item">
          <img src="img/zip.svg" alt="forum" width="40">
          <div class="content">
            <a href="javascript:;" class="h6 title" style="word-break: break-word;"></a>
            <div class="post__date">
              <time class="published" datetime="2017-03-24T18:18"></time>
            </div>
            <span class="notification-icon click-delete-file" data-filedelete style="margin-top: -35px; float: right; display: block;">
                                <a href="javascript:;" data-delete_file = "" class="accept-request request-del">
                                  <span class="delete-file">
                                    <img src="img/trash.svg" class="olymp-close-icon" style="margin: auto; height: 15px; width: 15px;">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                  </span>
                                  </a>
                              </span>
          </div>


        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="add-video" tabindex="-1" role="dialog" aria-labelledby="add-video" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document">
      <div class="modal-content">
        <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <input id="upload_video_status" class="hidden d-none" type="file" name="video_file" accept="video/*" multiple="">
        <div class="modal-header">
          <h6 class="title">+ Add Files</h6>
        </div>

        <div class="modal-body" style="padding: 0px !important;">
          <a href="javascript:;" class="upload-photo-item upload-video-status">
            <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>


            <h6>Upload</h6>
            <span>Browse your computer.</span>
          </a>

          <a href="javascript:;" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

            <svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>

            <h6>Choose from My Files</h6>
            <span>Choose from your uploaded files</span>
          </a>
        </div>
      </div>
    </div>
  </div>
{{--  <div class="modal fade" id="add-link-album-comment" tabindex="-1" role="dialog" aria-labelledby="main-popup-search" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document" id="dd">--}}
{{--      <div class="modal-content">--}}
{{--        <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">--}}
{{--          <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>--}}
{{--        </a>--}}
{{--        <div class="modal-body">--}}
{{--          <form class="form-inline search-form" method="post">--}}
{{--            <div class="form-group label-floating">--}}
{{--              <label class="control-label">Add Video Link +</label>--}}
{{--              <input class="form-control bg-white" name="url-video" placeholder="" type="text" value="">--}}
{{--            </div>--}}

{{--            <button class="btn btn-purple btn-lg add-link-album-comment">Add +</button>--}}
{{--          </form>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
  <div class="modal fade" id="add-link" tabindex="-1" role="dialog" aria-labelledby="main-popup-search" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered window-popup main-popup-search" role="document" id="dd">
      <div class="modal-content">
        <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
        </a>
        <div class="modal-body">
          <form class="form-inline search-form" method="post">
            <div class="form-group label-floating">
              <label class="control-label">Add Video Link +</label>
              <input class="form-control bg-white" name="url-video" placeholder="" type="text" value="">
            </div>

            <button class="btn btn-purple btn-lg add-link-album-comment add-link">Add +</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" name="popup_comment" value="<?php echo e(route('ajax.popupComment')); ?>">

  <div class="current_fi d-none">{{$target_user->total_featured_images}}</div>
  <div class="max_fi d-none">{{$target_user->max_featuredimage}}</div>

  <div class="current_fv d-none">{{$target_user->total_featured_videos}}</div>
  <div class="max_fv d-none">{{$target_user->max_featuredvideo}}</div>

  <a href="javascript:;" class="album_to_feed btn btn-sm btn-secondary add_feed d-none" data-type="add">Post to Feed (<span class="album_left"></span>)</a>
  <a href="javascript:;" class="album_to_feed btn btn-sm btn-primary remove_feed d-none" data-type="remove">Posted (<span class="album_feed"></span>)</a>

  <input type="hidden" name="imagevideo" value="{{route('ajax.imagevideo')}}">
  <input type="hidden" name="delvideo" value="{{route('ajax.delvideo')}}">
  <input type="hidden" name="updatevideo" value="{{route('ajax.updatevideo')}}">
  <input type="hidden" name="newvideo" value="{{route('ajax.newvideo')}}">
  <input type="hidden" name="editalbum" value="{{route('ajax.editalbum')}}">
  <input type="hidden" name="delalbum" value="{{route('ajax.delalbum')}}">
  <input type="hidden" name="getpostalbum" value="{{route('ajax.getpostalbum')}}">
  <input type="hidden" name="albumtofeed" value="{{route('ajax.albumtofeed')}}">
  <input type="hidden" name="postcomment" value="{{route('ajax.postcomment')}}">
  <input type="hidden" name="likepost" value="{{route('ajax.likepost')}}">
  <input type="hidden" name="uploadfile" value="{{route('file-upload')}}">
  <input type="hidden" name="previewlink" value="{{route('ajax.previewlink')}}">
  <input type="hidden" name="postvideolink" value="{{route('ajax.postvideolink')}}">

  <input type="hidden" name="getpost" value="{{route('ajax.getpost')}}">
  <input type="hidden" name="postcomment" value="{{route('ajax.postcomment')}}">
  <input type="hidden" name="previewimage" value="{{route('ajax.previewimage')}}">
  <input type="hidden" name="previewfile" value="{{route('ajax.previewfile')}}">
  <input type="hidden" name="newvideo-status" value="{{route('ajax.newvideo.status')}}">
  <input type="hidden" name="likestatus" value="{{route('ajax.likestatus')}}">
  <input type="hidden" name="newsfeed-more" value="{{route('newsfeed-more')}}">
  <input type="hidden" name="poststatus" value="{{route('ajax.poststatus')}}">
  <input type="hidden" name="popup_comment" value="{{route('ajax.popupComment')}}">
  <input type="hidden" name="ajax-likecmt" value="{{route('ajax.likecmt')}}">
  <input type="hidden" name="ajax-heart" value="{{route('ajax.heart')}}">
  <input type="hidden" name="ajax-disLikeCmt" value="{{route('ajax.disLikeCmt')}}">

@endsection

@section('scripts')
  <script type="text/javascript" src="{{asset('public/frontend/js/social.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/frontend/js/portfolio.js')}}"></script>
  <script>
    $(document).on('click', '.accept-request' || '.accept-request-comment', function () {
      console.log('res.action');
      id = $(this).data('id');
      _this = $(this);
      form_data = 'id=' + id + '&type=user';
      url = "{{route('ajax.favoritenewsfeed')}}";
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: url,
        data: form_data,
        success: function (res) {
          if (res.error == false) {

            if (res.action == 'add') {
              _this.removeClass('add-fw')
            } else {
              _this.addClass('add-fw')
            }
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          } else {
            swal(res.message);
          }
        }
      });
    });
  </script>

@endsection
