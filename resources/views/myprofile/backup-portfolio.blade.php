@extends('layouts.master')
@section('title')
Portfolio
@endsection
@section('content')
@include('myprofile.profile_header')
   
   
      <div class="container">
         <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="ui-block responsive-flex">
                  <div class="ui-block-title">
                     <div class="h6 title">My Portfolio - Albums | Videos</div>
                     <ul class="nav nav-tabs photo-gallery" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#photo-page" role="tab">
                              <svg class="olymp-photos-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                              </svg>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#album-page" role="tab">
                              <svg class="olymp-albums-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
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
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <div class="h6 title">My Albums</div>
                           <div class=" align-right">
                             <a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-blue btn-md-2">Create Album  +</a>
                          </div>
                           <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                       </div>
                    </div>
                 </div>
                  <div class="tab-pane active" id="album-page" role="tabpanel">
                     <div class="photo-album-wrapper">
                        @auth
                        <div class="photo-album-item-wrap col-4-width" >
                           <div class="photo-album-item create-album" data-mh="album-item">
                              <a href="#" data-toggle="modal" data-target="#create-photo-album" class="  full-block"></a>
                              <div class="content">
                                 <a href="javascript:;" class="btn btn-control bg-primary create_album">
                                    <svg class="olymp-plus-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                    </svg>
                                 </a>
                                 <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Create an Album</a>
                                 <span class="sub-title">It only takes a few minutes!</span>
                              </div>
                           </div>
                        </div>
                        @endauth
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

      <div class="container">
         <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="ui-block">
                  <div class="ui-block-title">
                     <div class="h6 title">My Videos</div>
                     <div class="align-right">
                        <a href="#" class="btn btn-primary btn-md-2" data-toggle="modal" data-target="#update-header-photo">Upload Video  +</a>
                     </div>
                     <a href="#" class="more">
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
            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
               <div class="ui-block video-item">
                  <div class="video-player">
                     <img src="img/vid1.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="overlay overlay-dark"></div>
                     <div class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="ui-block-content video-content">
                     <a href="#" class="h6 title">Video - Day 3</a>
                     <time class="published" datetime="2017-03-24T18:18">18:44</time>
                  </div>
               </div>
            </div>
            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
               <div class="ui-block video-item">
                  <div class="video-player">
                     <img src="img/vid2.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="overlay overlay-dark"></div>
                     <div class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="ui-block-content video-content"><a href="#" class="h6 title">Video - Day 2</a>
                     <time class="published" datetime="2017-03-24T18:18">13:19</time>
                  </div>
               </div>
            </div>
            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
               <div class="ui-block video-item">
                  <div class="video-player">
                     <img src="img/vid3.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="overlay overlay-dark"></div>
                     <div class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="ui-block-content video-content"><a href="#" class="h6 title">Video - &nbsp;Day 1</a>
                     <time class="published" datetime="2017-03-24T18:18">15:47</time>
                  </div>
               </div>
            </div>
            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
               <div class="ui-block video-item">
                  <div class="video-player">
                     <img src="img/vid-4.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="overlay overlay-dark"></div>
                     <div class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="ui-block-content video-content"><a href="#" class="h6 title">Video - Day 4</a>
                     <time class="published" datetime="2017-03-24T18:18">0:23</time>
                  </div>
               </div>
            </div>
            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
               <div class="ui-block video-item">
                  <div class="video-player">
                     <img src="img/vid3.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="overlay overlay-dark"></div>
                     <div class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="ui-block-content video-content"><a href="#" class="h6 title">Video - &nbsp;Day 1</a>
                     <time class="published" datetime="2017-03-24T18:18">15:47</time>
                  </div>
               </div>
            </div>
            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
               <div class="ui-block video-item">
                  <div class="video-player">
                     <img src="img/vid2.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="overlay overlay-dark"></div>
                     <div class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="ui-block-content video-content"><a href="#" class="h6 title">Video - Day 2</a>
                     <time class="published" datetime="2017-03-24T18:18">13:19</time>
                  </div>
               </div>
            </div>
            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
               <div class="ui-block video-item">
                  <div class="video-player">
                     <img src="img/vid-4.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="overlay overlay-dark"></div>
                     <div class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="ui-block-content video-content"><a href="#" class="h6 title">Video - Day 4</a>
                     <time class="published" datetime="2017-03-24T18:18">0:23</time>
                  </div>
               </div>
            </div>
            <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
               <div class="ui-block video-item">
                  <div class="video-player">
                     <img src="img/vid1.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="overlay overlay-dark"></div>
                     <div class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </div>
                  </div>
                  <div class="ui-block-content video-content">
                     <a href="#" class="h6 title">Video - Day 3</a>
                     <time class="published" datetime="2017-03-24T18:18">18:44</time>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="header-spacer"></div>
      
      <!-- Window-popup Open Photo Popup V1 -->
      @include('modal.photo_popup_v1')
      <!-- ... end Window-popup Open Photo Popup V1 -->
      <!-- Window-popup Open Photo Popup V2 -->
      @include('modal.photo_popup_v2')
      <!-- ... end Window-popup Open Photo Popup V2 -->
      <!-- Window-popup Create Photo Album -->
      @include('modal.create_album')
      <!-- ... end Window-popup Create Photo Album -->
      <!-- Window-popup Update Header Photo -->
      <div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
         <div class="modal-dialog window-popup update-header-photo" role="document">
            <div class="modal-content">
               <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                  <svg class="olymp-close-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                  </svg>
               </a>
               <div class="modal-header">
                  <h6 class="title">Choose Photos</h6>
               </div>
               <div class="modal-body">
                  <input id="upload" class="hidden" type="file" name="file" multiple/>
                  <a href="javascript:;" class="upload_link upload-photo-item">
                     <svg class="olymp-computer-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                     </svg>
                     <h6>Upload Photo</h6>
                     <span>Browse your computer.</span>
                  </a>
                  <a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">
                     <svg class="olymp-photos-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                     </svg>
                     <h6>Choose from My Photos</h6>
                     <span>Choose from your uploaded photos</span>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-- ... end Window-popup Update Header Photo -->
      <!-- Window-popup Choose from my Photo -->
      @include('modal.choose_photo')
      <!-- ... end Window-popup Choose from my Photo  -->
      <input type="hidden" name="getpostalbum" value="{{route('ajax.getpostalbum')}}">
      <input type="hidden" name="postcomment" value="{{route('ajax.postcomment')}}">
      <input type="hidden" name="likepost" value="{{route('ajax.likepost')}}">
      <input type="hidden" name="uploadfile" value="{{route('file-upload')}}">

@endsection

@section('scripts')
   <script type="text/javascript" src="{{asset('public/frontend/js/social.js')}}"></script>
   <script type="text/javascript" src="{{asset('public/frontend/js/portfolio.js')}}"></script>
@endsection

