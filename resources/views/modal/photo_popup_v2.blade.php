<head>
  <link rel="stylesheet" type="text/css" href="css/huystyle.css">
</head>
<div class="modal fade" id="open-photo-popup-v2-{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="open-photo-popup-v2" aria-hidden="true">
  <div class="modal-dialog window-popup open-photo-popup open-photo-popup-v2" role="document">
    <div class="modal-content">
      <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
        <svg class="olymp-close-icon">
          <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
        </svg>
      </a>
      <div class="modal-body">
        <div class="open-photo-thumb">
          <div class="swiper-container album-abc-{{$album->id}}" data-effect="fade" data-autoplay="3000">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <!-- Slides -->
              @foreach($album->imageAll() as $key => $img)

                <div class="swiper-slide swiper-slide-{{$key}}">
                  <div class="photo-item" data-swiper-parallax="-300" data-swiper-parallax-duration="500">
                    <img src="{{$img->url}}" alt="photo" style="width: 100%; height: 500px;">
                    <div class="overlay"></div>
                    <a href="#" class="more">
                      <svg class="olymp-three-dots-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                      </svg>
                    </a>

                    <a href="#" class="tag-friends" data-toggle="tooltip" data-placement="top" data-original-title="Like">
                      <svg class="olymp-heart-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                      </svg>
                    </a>
                    <div class="content">
                      <a href="#" class="h6 title">{{$img->name}}</a>
                      <a href="#" class="h7 title">{{$album->imageDecription($img->id)}}</a>
                      <time class="published" datetime="2017-03-24T18:18">{{$img->updated_at}}</time>
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
          <!--Pagination tabs-->
          <div class="slider-slides"  style="bottom: -40px;z-index: 3;width: 68%;">
          @foreach($album->images() as $key => $img)
              <a href="javascript:;" class="slides-item check-slider-{{$key}}">
              <img src="{{$img}}" alt="slide" class="photo-popup-footer">
                <div class="overlay overlay-dark" data-id="{{$album->id}}"></div>
              </a>
          @endforeach

          <!--Prev Next Arrows-->

            <svg class="btn-next olymp-popup-right-arrow" data-check = "0"><use xlink:href="svg-icons/sprites/icons.svg#olymp-popup-right-arrow"></use></svg>

            <svg class="btn-prev olymp-popup-left-arrow"><use xlink:href="svg-icons/sprites/icons.svg#olymp-popup-left-arrow"></use></svg>

          </div>
        </div>
        <div class="open-photo-content">

          <article class="hentry post">

            <div class="post__author author vcard inline-items" style="margin-bottom: -10px;">
              <div class="inline-items">
                <div class="author-thumb" style="position: sticky;margin-right: -5px;margin-top: -2px">
                  <a href="UserProfile-AboutMe.html" target="_blank">
                    <img src="{{$album->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">
                    <div class="label-avatar bg-primary" style="z-index: 4;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;position: absolute;left: -4px;">{{$album->user->level}}</div></a>
                </div>
                <div class="author-date">
                  <a class="h6 post__author-name fn" href="02-ProfilePage.html">{{$album->user->full_name}} ({{count($album->images())}} img)</a>
                  <div class="post__date">
                    <time class="published" datetime="2004-07-24T18:18">
                      9 hours ago
                    </time>
                  </div>
                </div>
              </div>
              <div class="more" style="margin-left: 15px;margin-right: 10px;">
                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                <ul class="more-dropdown">
                  <li>
                    <a href="#">Edit Post</a>
                  </li>
                  <li>
                    <a href="#">Delete Post</a>
                  </li>
                  <li>
                    <a href="#">Turn Off Notifications</a>
                  </li>
                  <li>
                    <a href="#">Select as Featured</a>
                  </li>
                </ul>
              </div>
              <?php
              $save_fw = 'add-fw';
              if (isset($album->user) && $album->user->is_saved_newsFeed()){
                $save_fw = '';
              }
              ?>
              <span class="notification-icon" style="float: right">
                <a href="javascript:;" class="accept-request {{$save_fw}}" data-id="{{$album->user->id}}">
                  <span class="icon-add without-text">
                    <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                  </span>
                </a>
              </span>
            </div>
            <p style="margin: 25px 0px 15px 0px;">{!!$album->description!!}
            <?php
            $targeted = $album->post->is_target() ? 'targeted' : '';
            $targeted_like = $album->post->is_like() ? 'targeted_like' : '';
            $value_like = $album->post->is_like() ? 0 : 1;
            $like_svg = 'upvote-inactive.svg';
            $dislike_svg = 'downvote-inactive.svg';
            if($album->post->user_liked()) $like_svg = 'upvote-active.svg';
            if($album->post->user_disliked()) $dislike_svg = 'downvote-active.svg';
            ?>
            <div class="comments-shared " style="margin-top: 5px;border-top: 1px solid #e6ecf5;padding-top: 15px">

              <a href="javascript:;" class="post-add-icon inline-items {{$targeted}} likepost_btn" data-check_like = "1" data-id="{{$album->post->id}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Upvote">
                <img src="{{asset("public/frontend/img/$like_svg")}}">
                <img class="votes" hidden src="{{asset("public/frontend/img/upvote-active.svg")}}">
                <span>{{$album->post->likes()}}</span>
              </a>
              <a href="javascript:;" class="post-add-icon inline-items {{$targeted}} dislikepost_btn" data-check_like = "0" data-id="{{$album->post->id}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Downvote">
                <img src="{{asset("public/frontend/img/$dislike_svg")}}">
                <img class="votes" hidden src="{{asset("public/frontend/img/downvote-active.svg")}}">
                <span>{{$album->post->dislikes()}}</span>
              </a>
              <a href="javascript:;" class="post-add-icon inline-items {{$targeted_like}} like_status_btn" data-check_like_status = "{{$value_like}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like" data-id="{{$album->post->id}}">
                <svg class="olymp-heart-icon" style="height: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                <span>{{$album->post->user_like_status()}}</span>
              </a>
              <a data-toggle="modal" data-target="#poppup-comment" href="javascript:;" class="post-add-icon inline-items popup-comment count-comment-{{$album->id}}" data-id="{{$album->post->id}}" data-id_album="{{$album->id}}" data-placement="top" title="Comments">
                <svg class="olymp-speech-balloon-icon" style="height: 16px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                <span>{{$album->post->total_comments}}</span>
              </a>
            </div>
            <br>
            <?php
            $index = 0;
            $checkMedia = 0;
            ?>
            @if($album->post->external_link || $album->post->album || $album->post->list_media)
              @php
                $checkMedia = 1;
              @endphp
            @endif
            <div class="control-block-button post-control-button">
              @if($album->post->is_author)
                <a href="javascript:;" class="btn btn-control " data-toggle="tooltip" data-placement="left" title="" style="background-color: #ffb542;" data-original-title="My Post" aria-describedby="tooltip491200">
                  <svg class="olymp-thunder-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use>
                  </svg>
                  <div class="ripple-container">
                  </div>
                </a>
              @endif

              @if($album->post->album)
                <a href="javascript:;" class="btn btn-control " data-toggle="tooltip" data-placement="left" title="" style="background-color: #fa6dbc;" data-original-title="Showcase">
                  <svg class="olymp-albums-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
                  </svg>
                </a>
              @endif
              <a href="javascript:;" class="btn btn-control" data-toggle="tooltip" data-placement="left" title="" data-original-title="Share Post">
                <svg class="olymp-share-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                </svg>
              </a>

            </div>
          </article>
          <div class="news-feed-form content-comment-padding-bottom">
            <!-- Nav tabs -->

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="reply-2" role="tabpanel" aria-expanded="true">
                <div class="chat-field">
                  <div class="mCustomScrollbar ps ps--theme_default ps--active-y" data-mcs-theme="dark" style="max-height: 250px;" data-ps-id="274741f7-5c5a-aeff-f2dd-7b4c165a834c">
                    <ul class="notification-list chat-message chat-message-field content-comment-album-popup">

                      @foreach($album->post->comments as $comment)
                        @include('template_part.content-comment-popup', ['comment' => $comment, 'post' => $album->post])
                      @endforeach

                    </ul>
                    <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                      <div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__scrollbar-y-rail" style="top: 0px; height: 250px; right: 0px;">
                      <div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 26px;"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="reply-3" role="tabpanel" aria-expanded="true">
                <div class="chat-field">
                  <div class="mCustomScrollbar ps ps--theme_default" data-mcs-theme="dark" style="max-height: 250px;" data-ps-id="fd53acde-7804-8fa7-f5f8-798d63e425de">
                    <ul class="notification-list chat-message chat-message-field">
                      <li>
                        <div class="author-thumb" style="left: 21px">
                          <img src="img/author-page.jpg" alt="author" style="border: solid;border-width: 3px;border-color: #E9E9E9;">
                        </div>
                        <div class="control-block-button post-control-button " style="margin-left: 0px;margin-top: 45px;display: grid;">
                          <a href="#" class="btn btn-control bg-follow " data-toggle="right" data-placement="top" title="Follow">
                            <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                          </a>
                          <div class="label-avatar bg-primary" style="z-index: 4;width: 18px;height: 18px;padding-top: 0.5px;font-size: 9px;position: absolute;left: -7px;top: -48px;">08</div>
                        </div>
                        <div class="notification-event" style="margin-left: 35px;max-width: 100%;">
                          <a href="#" class="h6 notification-friend">James Spiegel</a>
                          <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:30pm</time></span>
                          <span class="chat-message-item" style="margin-bottom: 10px;">Hi Elaine! I have a question, do you think that tomorrow we could talk to
																			the client to iron out some details before the presentation? I already finished the first screen but
																			I need to ask him something before moving on. Anyway, here’s a preview!
                                   </span>
                        </div>
                        <form action="#" method="post" class="cart-main" style="width: 100%;">
                          <!-- Shop Table Cart -->
                          <ul class="notification-list friend-requests" style="padding-left: 50px;margin-bottom: 10px;">
                            <li style="padding: 15px 0px 15px 0px;">
                              <div class="author-thumb" style="top: 15px;left: 0px;">
                                <img src="img/zip.svg" alt="author" style="width: 38px;border-radius: 0%;">
                              </div>
                              <div class="notification-event" style=" padding-left: 50px">
                                <div class="content"><a href="#" class="h6 title" style="font-size: 11px">Website Files.zip</a>
                                  <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18" style="font-size: 11px">Zip File</time>
                                  </div>
                                </div>
                              </div>
                              <span class="notification-icon" style="float: right; display: block;margin-top: 2px;">
                                         <a href="#" class="accept-request request-del">
                                           <span class="">
                                             <img src="svg-icons/sprites/download.svg" class="olymp-close-icon" style="height: 15px;
                      width: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                           </span>
                                          </a>

							                          </span>
                            </li>
                            <li style="padding: 15px 0px 15px 0px;">
                              <div class="author-thumb" style="top: 15px;left: 0px;">
                                <img src="img/powerpointFile.svg" alt="author" style="width: 38px;border-radius: 0%;">
                              </div>
                              <div class="notification-event" style=" padding-left: 50px">
                                <div class="content"><a href="#" class="h6 title" style="font-size: 11px">Portfolio Slide.ppt</a>
                                  <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18" style="font-size: 11px">PowerPoint File</time>
                                  </div>
                                </div>
                              </div>
                              <span class="notification-icon" style="float: right; display: block;margin-top: 2px;">
                                         <a href="#" class="accept-request request-del">
                                           <span class="">
                                             <img src="svg-icons/sprites/download.svg" class="olymp-close-icon" style="height: 15px;
                                    width: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                           </span>
                                         </a>
                                       </span>
                            </li>
                            <li style="padding: 15px 0px 15px 0px;">
                              <div class="author-thumb" style="top: 15px;left: 0px;">
                                <img src="img/pdfFILE.svg" alt="author" style="width: 38px;border-radius: 0%;">
                              </div>
                              <div class="notification-event" style=" padding-left: 50px">
                                <div class="content"><a href="#" class="h6 title" style="font-size: 11px">User Experience.pdf</a>
                                  <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18" style="font-size: 11px">PDF File</time>
                                  </div>
                                </div>
                              </div>
                              <span class="notification-icon" style="float: right; display: block;margin-top: 2px;">
                                         <a href="#" class="accept-request request-del">
                                           <span class="">
                                            <img src="svg-icons/sprites/download.svg" class="olymp-close-icon" style="height: 15px;
                            width: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                           </span>
                                         </a>
                                       </span>
                            </li>
                          </ul>
                          <table class="shop_table cart">
                            <thead>
                            <tr>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>

                          <!-- ... end Shop Table Cart -->
                        </form>


                        <div class="comments-shared " style="margin-top: 5px;border-top: 1px solid #e6ecf5;padding-top: 15px;width: 100%;">
                          <a href="#" class="post-add-icon inline-items" data-toggle="tooltip" data-placement="top" title="" data-original-title="Upvote">
                            <img src="svg-icons/Upvote-Downvote/upvote-inactive.svg" class="olymp-speech-balloon-icon" style="height: 17px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                            <span>61</span>
                          </a>
                          <a href="#" class="post-add-icon inline-items" data-toggle="tooltip" data-placement="top" title="" data-original-title="Downvote">
                            <img src="svg-icons/Upvote-Downvote/downvote-inactive.svg" class="olymp-share-icon" style="height: 17px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                            <span>32</span>
                          </a>
                          <a href="#" class="post-add-icon inline-items " data-toggle="tooltip" data-placement="top" title="" data-original-title="Like">
                            <svg class="olymp-heart-icon" style="height: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                            <span>61</span>
                          </a>
                          <a data-toggle="modal" data-target="#popup-reply" href="#" class="post-add-icon inline-items" data-placement="top" title="Comments">
                            <svg class="olymp-speech-balloon-icon" style="height: 16px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use></svg>
                            <span>61</span>
                          </a>
                        </div>
                      </li>
                    </ul>
                    <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                  <form>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <span>
		  <!-- ... end Comments -->
              <a href="#" class=""></a>
                <div class="add-options-message" style="border-top: 1px solid #e6ecf5;padding-top: 15px">
                  <button class="btn btn-secondary btn-sm float-right close-popup-album" data-toggle="modal" data-target="#chatbox" href="#" style="margin-top: 3px ">Close</button>
                  <button class="btn btn-blue btn-sm float-right popup-comment" data-toggle="modal" data-id="{{$album->post->id}}" data-id_album="{{$album->id}}" data-target="#poppup-comment" href="#" style="margin-top: 3px ">+ Add Comment</button>
                </div>
              <a href="#" class="more-comments" style="color: #fff;padding: 3px;margin-bottom: -15px;">.</a>
           </span>
        </div>
      </div>
    </div>
  </div>
</div>

