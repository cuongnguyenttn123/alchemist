@extends('layouts.master')
@section('title')
Timeline
@endsection
@section('content')
@include('myprofile.profile_header')


      <!-- ... end Top Header-Profile -->
      <div class="container">
         <div class="row">
            <!-- Main Content -->
            <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
               <div id="newsfeed-items-grid">
                  @if($user && $user->id==$target_user->id)
                  <div class="ui-block">
                     <!-- News Feed Form  -->
                     <div class="news-feed-form">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">
                                 <svg class="olymp-status-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                                 </svg>
                                 <span>Status</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">
                                 <svg class="olymp-multimedia-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                                 </svg>
                                 <span>Multimedia</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link inline-items" data-toggle="tab" href="#blog" role="tab" aria-expanded="false">
                                 <svg class="olymp-blog-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use>
                                 </svg>
                                 <span>Blog Post</span>
                              </a>
                           </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">

                           <form id="post_status">
                              <div class="author-thumb">
                                 <img src="img/author-page.jpg" alt="author">
                              </div>
                              <div class="form-group with-icon label-floating is-empty">
                                 <label class="control-label">Share what you are thinking here...</label>
                                 <textarea class="form-control" placeholder="" name="caption" ></textarea>
                              </div>
                              <div class="add-options-message">
                                 <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                    <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                    </svg>
                                 </a>
                                 <a href="javascript:;" class="options-message" data-toggle= "modal" data-target="#create-friend-group-add-friends""tooltip" data-placement="top"   data-original-title="TAG Alchemists">
                                 <svg class="olymp-computer-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                 </svg>
                                 </a>
                                 <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                    <svg class="olymp-small-pin-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                                    </svg>
                                 </a>
                                 <button class="btn btn-primary btn-md-2">Post</button>
                                 <button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                                 <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                                 </div>
                                 <div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
                                 </div>
                                 <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <!-- ... end News Feed Form  -->       
                  </div>
                  @endif
                  @foreach($target_user->posts as $post)
                     <div class="ui-block">
                     @include('template_part.content-post', ['post' => $post])
                     </div>
                  @endforeach
               </div>
               <a id="load-more-button" href="javascript:;" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
                  <svg class="olymp-three-dots-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                  </svg>
               </a>
            </div>
            <!-- ... end Main Content -->
            <!-- Left Sidebar -->
            <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
               <div class="crumina-sticky-sidebar">
                  <div class="sidebar__inner">
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">Profile Intro</h6>
                        </div>
                        <div class="ui-block-content">
                           <!-- W-Personal-Info -->
                           <ul class="widget w-personal-info item-block">
                              <li>
                                 <span class="title">About Me:</span>
                                 <span class="text">{{$target_user->get_usermeta('description') ?? 'N/A'}}</span> 
                              </li>
                              <?php
                                 $list_hnb = [
                                     "Hobbies", "Favourite TV Shows", "Favourite Movies", "Favourite Games",
                                     "Favourite Music Bands / Artists", "Favourite Books", "Favourite Writers", "Other Interests"
                                 ];
                              ?>
                              @foreach($list_hnb as $hnb) 
                                 @if($bien = $target_user->get_usermeta(preg_replace("![^a-z0-9]+!i", "-", strtolower($hnb))) != '')
                                    <li>
                                       <span class="title">{{$hnb}}</span>
                                       <span class="text">{{$target_user->get_usermeta(preg_replace("![^a-z0-9]+!i", "-", strtolower($hnb))) ?? ""}}</span>
                                    </li>
                                 @endif
                              @endforeach
                           </ul>
                           <!-- .. end W-Personal-Info -->
                           <!-- W-Socials -->
                           <div class="widget w-socials">
                              <h6 class="title">Other Social Networks:</h6>
                              @if($target_user->get_usermeta('facebook'))
                                 <a href="{{addhttp($target_user->get_usermeta('facebook'))}}" class="social-item bg-facebook">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>Facebook
                                 </a>
                              @endif
                              @if($target_user->get_usermeta('twitter'))
                                 <a href="{{addhttp($target_user->get_usermeta('twitter'))}}" class="social-item bg-twitter">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>Twitter
                                 </a>
                              @endif
                              @if($target_user->get_usermeta('dribbble'))
                                 <a href="{{addhttp($target_user->get_usermeta('dribbble'))}}" class="social-item bg-dribbble">
                                    <i class="fab fa-dribbble" aria-hidden="true"></i>Dribbble
                                 </a>
                              @endif
                           </div>
                           <!-- ... end W-Socials -->
                        </div>
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">James’s Badges</h6>
                        </div>
                        <div class="ui-block-content">
                           <!-- W-Badges -->
                           <ul class="widget w-badges">
                              <li>
                                 <a href="24-CommunityBadges.html">
                                    <img src="img/badge1.png" alt="author">
                                    <div class="label-avatar bg-primary">2</div>
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                 <img src="img/badge4.png" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                    <img src="img/badge3.png" alt="author">
                                    <div class="label-avatar bg-blue">4</div>
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                 <img src="img/badge6.png" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                 <img src="img/badge11.png" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                 <img src="img/badge8.png" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                 <img src="img/badge10.png" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                    <img src="img/badge13.png" alt="author">
                                    <div class="label-avatar bg-breez">2</div>
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                 <img src="img/badge7.png" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="24-CommunityBadges.html">
                                 <img src="img/badge12.png" alt="author">
                                 </a>
                              </li>
                           </ul>
                           <!--.. end W-Badges -->
                        </div>
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">Last Videos</h6>
                        </div>
                        <div class="ui-block-content">
                           <!-- W-Latest-Video -->
                           <ul class="widget w-last-video">
                              <li>
                                 <a href="https://vimeo.com/ondemand/viewfromabluemoon4k/147865858" class="play-video play-video--small">
                                    <svg class="olymp-play-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                                    </svg>
                                 </a>
                                 <img src="img/vid2.jpg" alt="video">
                                 <div class="video-content">
                                    <div class="title">System of a Revenge - Hypnotize...</div>
                                    <time class="published" datetime="2017-03-24T18:18">3:25</time>
                                 </div>
                                 <div class="overlay"></div>
                              </li>
                              <li>
                                 <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video play-video--small">
                                    <svg class="olymp-play-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                                    </svg>
                                 </a>
                                 <img src="img/vid3.jpg" alt="video">
                                 <div class="video-content">
                                    <div class="title">Green Goo - Live at Dan’s Arena</div>
                                    <time class="published" datetime="2017-03-24T18:18">5:48</time>
                                 </div>
                                 <div class="overlay"></div>
                              </li>
                           </ul>
                           <!-- .. end W-Latest-Video -->
                        </div>
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">Twitter Feed</h6>
                        </div>
                        <!-- W-Twitter -->
                        <ul class="widget w-twitter">
                           <li class="twitter-item">
                              <div class="author-folder">
                                 <img src="img/twitter-avatar1.png" alt="avatar">
                                 <div class="author">
                                    <a href="#" class="author-name">graphicguru86</a>
                                    <a href="#" class="group">@graphicguru86</a>
                                 </div>
                              </div>
                              <p>Tomorrow with the agency we will run 5 km for charity. Come and give us your support!
                                 <a href="#" class="link-post">#Daydream5K</a>
                              </p>
                              <span class="post__date">
                              <time class="published" datetime="2017-03-24T18:18">
                              2 hours ago
                              </time>
                              </span>
                           </li>
                           <li class="twitter-item">
                              <div class="author-folder">
                                 <img src="img/twitter-avatar1.png" alt="avatar">
                                 <div class="author">
                                    <a href="#" class="author-name">graphicguru86</a>
                                    <a href="#" class="group">@graphicguru86</a>
                                 </div>
                              </div>
                              <p>Check out the new website of “The Bebop Bar”! <a href="#" class="link-post">bytle/thbp53f</a></p>
                              <span class="post__date">
                              <time class="published" datetime="2017-03-24T18:18">
                              16 hours ago
                              </time>
                              </span>
                           </li>
                           <li class="twitter-item">
                              <div class="author-folder">
                                 <img src="img/twitter-avatar1.png" alt="avatar">
                                 <div class="author">
                                    <a href="#" class="author-name">graphicguru86</a>
                                    <a href="#" class="group">@graphicguru86</a>
                                 </div>
                              </div>
                              <p>The Sunday is the annual agency camping trip and I still haven’t got a tent
                                 <a href="#" class="link-post">#TheWild #Indoors</a>
                              </p>
                              <span class="post__date">
                              <time class="published" datetime="2017-03-24T18:18">
                              Yesterday
                              </time>
                              </span>
                           </li>
                        </ul>
                        <!-- .. end W-Twitter -->
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">My Spotify Playlist</h6>
                        </div>
                        <!-- W-Playlist -->
                        <ol class="widget w-playlist">
                           <li class="js-open-popup" data-popup-target=".playlist-popup">
                              <div class="playlist-thumb">
                                 <img src="img/playlist6.jpg" alt="thumb-composition">
                                 <div class="overlay"></div>
                                 <a href="#" class="play-icon">
                                    <svg class="olymp-music-play-icon-big">
                                       <use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                                    </svg>
                                 </a>
                              </div>
                              <div class="composition">
                                 <a href="#" class="composition-name">The Past Starts Slow...</a>
                                 <a href="#" class="composition-author">System of a Revenge</a>
                              </div>
                              <div class="composition-time">
                                 <time class="published" datetime="2017-03-24T18:18">3:22</time>
                                 <div class="more">
                                    <svg class="olymp-three-dots-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                    <ul class="more-dropdown">
                                       <li>
                                          <a href="#">Add Song to Player</a>
                                       </li>
                                       <li>
                                          <a href="#">Add Playlist to Player</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </li>
                           <li class="js-open-popup" data-popup-target=".playlist-popup">
                              <div class="playlist-thumb">
                                 <img src="img/playlist7.jpg" alt="thumb-composition">
                                 <div class="overlay"></div>
                                 <a href="#" class="play-icon">
                                    <svg class="olymp-music-play-icon-big">
                                       <use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                                    </svg>
                                 </a>
                              </div>
                              <div class="composition">
                                 <a href="#" class="composition-name">The Pretender</a>
                                 <a href="#" class="composition-author">Kung Fighters</a>
                              </div>
                              <div class="composition-time">
                                 <time class="published" datetime="2017-03-24T18:18">5:48</time>
                                 <div class="more">
                                    <svg class="olymp-three-dots-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                    <ul class="more-dropdown">
                                       <li>
                                          <a href="#">Add Song to Player</a>
                                       </li>
                                       <li>
                                          <a href="#">Add Playlist to Player</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </li>
                           <li class="js-open-popup" data-popup-target=".playlist-popup">
                              <div class="playlist-thumb">
                                 <img src="img/playlist8.jpg" alt="thumb-composition">
                                 <div class="overlay"></div>
                                 <a href="#" class="play-icon">
                                    <svg class="olymp-music-play-icon-big">
                                       <use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                                    </svg>
                                 </a>
                              </div>
                              <div class="composition">
                                 <a href="#" class="composition-name">Blood Brothers</a>
                                 <a href="#" class="composition-author">Iron Maid</a>
                              </div>
                              <div class="composition-time">
                                 <time class="published" datetime="2017-03-24T18:18">3:06</time>
                                 <div class="more">
                                    <svg class="olymp-three-dots-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                    <ul class="more-dropdown">
                                       <li>
                                          <a href="#">Add Song to Player</a>
                                       </li>
                                       <li>
                                          <a href="#">Add Playlist to Player</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </li>
                           <li class="js-open-popup" data-popup-target=".playlist-popup">
                              <div class="playlist-thumb">
                                 <img src="img/playlist9.jpg" alt="thumb-composition">
                                 <div class="overlay"></div>
                                 <a href="#" class="play-icon">
                                    <svg class="olymp-music-play-icon-big">
                                       <use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                                    </svg>
                                 </a>
                              </div>
                              <div class="composition">
                                 <a href="#" class="composition-name">Seven Nation Army</a>
                                 <a href="#" class="composition-author">The Black Stripes</a>
                              </div>
                              <div class="composition-time">
                                 <time class="published" datetime="2017-03-24T18:18">6:17</time>
                                 <div class="more">
                                    <svg class="olymp-three-dots-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                    <ul class="more-dropdown">
                                       <li>
                                          <a href="#">Add Song to Player</a>
                                       </li>
                                       <li>
                                          <a href="#">Add Playlist to Player</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </li>
                           <li class="js-open-popup" data-popup-target=".playlist-popup">
                              <div class="playlist-thumb">
                                 <img src="img/playlist10.jpg" alt="thumb-composition">
                                 <div class="overlay"></div>
                                 <a href="#" class="play-icon">
                                    <svg class="olymp-music-play-icon-big">
                                       <use xlink:href="svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use>
                                    </svg>
                                 </a>
                              </div>
                              <div class="composition">
                                 <a href="#" class="composition-name">Killer Queen</a>
                                 <a href="#" class="composition-author">Archiduke</a>
                              </div>
                              <div class="composition-time">
                                 <time class="published" datetime="2017-03-24T18:18">5:40</time>
                                 <div class="more">
                                    <svg class="olymp-three-dots-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                    <ul class="more-dropdown">
                                       <li>
                                          <a href="#">Add Song to Player</a>
                                       </li>
                                       <li>
                                          <a href="#">Add Playlist to Player</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </li>
                        </ol>
                        <!-- .. end W-Playlist -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- ... end Left Sidebar -->
            <!-- Right Sidebar -->
            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
               <div class="crumina-sticky-sidebar">
                  <div class="sidebar__inner">
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">Portfolio Media</h6>
                        </div>
                        <div class="ui-block-content">
                           <!-- W-Latest-Photo -->
                           <ul class="widget w-last-photo js-zoom-gallery">
                              <li>
                                 <a href="img/1.jpg">
                                 <img src="img/1.jpg" alt="photo">
                                 </a>
                              </li>
                              <li>
                                 <a href="img/2.jpg">
                                 <img src="img/2.jpg" alt="photo">
                                 </a>
                              </li>
                              <li>
                                 <a href="img/3.jpg">
                                 <img src="img/3.jpg" alt="photo">
                                 </a>
                              </li>
                              <li>
                                 <a href="img/4.jpg">
                                 <img src="img/4.jpg" alt="photo">
                                 </a>
                              </li>
                              <li>
                                 <a href="img/5.jpg">
                                 <img src="img/5.jpg" alt="photo">
                                 </a>
                              </li>
                              <li>
                                 <a href="img/6.jpg">
                                 <img src="img/6.jpg" alt="photo">
                                 </a>
                              </li>
                              <li>
                                 <a href="img/7.jpg.jpg">
                                 <img src="img/7.jpg" alt="photo">
                                 </a>
                              </li>
                              <li>
                                 <a href="img/8.jpg">
                                 <img src="img/8.jpg" alt="photo">
                                 </a>
                              </li>
                              <li>
                                 <a href="img/9.jpg">
                                 <img src="img/9.jpg" alt="photo">
                                 </a>
                              </li>
                           </ul>
                           <!-- .. end W-Latest-Photo -->
                        </div>
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">James's Latest Articles</h6>
                        </div>
                        <!-- W-Blog-Posts -->
                        <ul class="widget w-blog-posts">
                           <li>
                              <article class="hentry post">
                                 <a href="#" class="h4">Good UX designers must be fighters, because compromised designs are not good designs.</a>
                                 <p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et.</p>
                                 <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                    7 hours ago
                                    </time>
                                 </div>
                              </article>
                           </li>
                           <li>
                              <article class="hentry post">
                                 <a href="#" class="h4">Content and Design Are Inseparable Work Partners</a>
                                 <p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et.</p>
                                 <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                    March 18th, at 6:52pm
                                    </time>
                                 </div>
                              </article>
                           </li>
                        </ul>
                        <!-- .. end W-Blog-Posts -->
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">Fellow Alchemists&nbsp;(86)</h6>
                        </div>
                        <div class="ui-block-content">
                           <!-- W-Faved-Page -->
                           <ul class="widget w-faved-page js-zoom-gallery">
                              <li>
                                 <a href="#">
                                 <img src="img/avatar38-sm.jpg" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar24-sm.jpg" alt="user">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar36-sm.jpg" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar35-sm.jpg" alt="user">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar34-sm.jpg" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar33-sm.jpg" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar32-sm.jpg" alt="user">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar31-sm.jpg" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar30-sm.jpg" alt="author">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar29-sm.jpg" alt="user">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar28-sm.jpg" alt="user">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar27-sm.jpg" alt="user">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar26-sm.jpg" alt="user">
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                 <img src="img/avatar25-sm.jpg" alt="user">
                                 </a>
                              </li>
                              <li class="all-users">
                                 <a href="#">+74</a>
                              </li>
                           </ul>
                           <!-- .. end W-Faved-Page -->
                        </div>
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">Favourite Pages</h6>
                        </div>
                        <!-- W-Friend-Pages-Added -->
                        <ul class="widget w-friend-pages-added notification-list friend-requests">
                           <li class="inline-items">
                              <div class="author-thumb">
                                 <img src="img/avatar41-sm.jpg" alt="author">
                              </div>
                              <div class="notification-event"><a href="#" class="h6 notification-friend">The Marina</a> <span class="chat-message-item">Virtual Office</span></div>
                              <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                 <a href="#">
                                    <svg class="olymp-star-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                    </svg>
                                 </a>
                              </span>
                           </li>
                           <li class="inline-items">
                              <div class="author-thumb">
                                 <img src="img/avatar42-sm.jpg" alt="author">
                              </div>
                              <div class="notification-event"><a href="#" class="h6 notification-friend">Tapronus Sound</a> <span class="chat-message-item">Sound Engineers</span></div>
                              <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                 <a href="#">
                                    <svg class="olymp-star-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                    </svg>
                                 </a>
                              </span>
                           </li>
                           <li class="inline-items">
                              <div class="author-thumb">
                                 <img src="img/avatar43-sm.jpg" alt="author">
                              </div>
                              <div class="notification-event"><a href="#" class="h6 notification-friend">Pixel Digital Design</a> <span class="chat-message-item">Design Agency</span></div>
                              <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                 <a href="#">
                                    <svg class="olymp-star-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                    </svg>
                                 </a>
                              </span>
                           </li>
                           <li class="inline-items">
                              <div class="author-thumb">
                                 <img src="img/avatar44-sm.jpg" alt="author">
                              </div>
                              <div class="notification-event"><a href="#" class="h6 notification-friend">Thompson’s Custom </a> <span class="chat-message-item">Digital Agency Store</span></div>
                              <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                 <a href="#">
                                    <svg class="olymp-star-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                    </svg>
                                 </a>
                              </span>
                           </li>
                           <li class="inline-items">
                              <div class="author-thumb">
                                 <img src="img/avatar45-sm.jpg" alt="author">
                              </div>
                              <div class="notification-event">
                                 <a href="#" class="h6 notification-friend">Crimson Agency</a>
                                 <span class="chat-message-item">Company</span>
                              </div>
                              <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                 <a href="#">
                                    <svg class="olymp-star-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                    </svg>
                                 </a>
                              </span>
                           </li>
                           <li class="inline-items">
                              <div class="author-thumb">
                                 <img src="img/avatar46-sm.jpg" alt="author">
                              </div>
                              <div class="notification-event"><a href="#" class="h6 notification-friend">Mannequin Angel</a> <span class="chat-message-item">3D Programmer</span></div>
                              <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                 <a href="#">
                                    <svg class="olymp-star-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use>
                                    </svg>
                                 </a>
                              </span>
                           </li>
                        </ul>
                        <!-- .. end W-Friend-Pages-Added -->
                     </div>
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 class="title">James's Poll</h6>
                        </div>
                        <div class="ui-block-content">
                           <!-- W-Pool -->
                           <ul class="widget w-pool">
                              <li>
                                 <p>If you had to choose, which framework do you rate as best in 2018?</p>
                              </li>
                              <li>
                                 <div class="skills-item">
                                    <div class="skills-item-info">
                                       <span class="skills-item-title">
                                       <span class="radio">
                                       <label>
                                       <input type="radio" name="optionsRadios">
                                       Laravel Framework
                                       </label>
                                       </span>
                                       </span>
                                       <span class="skills-item-count">
                                       <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span>
                                       <span class="units">62%</span>
                                       </span>
                                    </div>
                                    <div class="skills-item-meter">
                                       <span class="skills-item-meter-active bg-primary" style="width: 62%"></span>
                                    </div>
                                    <div class="counter-friends">12 Alchemists voted for this</div>
                                    <ul class="friends-harmonic">
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic1.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic2.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic3.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic4.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic5.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic6.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic7.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic8.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic9.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#" class="all-users">+3</a>
                                       </li>
                                    </ul>
                                 </div>
                              </li>
                              <li>
                                 <div class="skills-item">
                                    <div class="skills-item-info">
                                       <span class="skills-item-title">
                                       <span class="radio">
                                       <label>
                                       <input type="radio" name="optionsRadios">
                                       Ajax Framework
                                       </label>
                                       </span>
                                       </span>
                                       <span class="skills-item-count">
                                       <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="27" data-from="0"></span>
                                       <span class="units">27%</span>
                                       </span>
                                    </div>
                                    <div class="skills-item-meter">
                                       <span class="skills-item-meter-active bg-primary" style="width: 27%"></span>
                                    </div>
                                    <div class="counter-friends">7 Alchemists voted for this</div>
                                    <ul class="friends-harmonic">
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic7.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic8.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic9.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic10.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic9.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic10.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic1.jpg" alt="friend">
                                          </a>
                                       </li>
                                    </ul>
                                 </div>
                              </li>
                              <li>
                                 <div class="skills-item">
                                    <div class="skills-item-info">
                                       <span class="skills-item-title">
                                       <span class="radio">
                                       <label>
                                       <input type="radio" name="optionsRadios">
                                       HTML
                                       </label>
                                       </span>
                                       </span>
                                       <span class="skills-item-count">
                                       <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="11" data-from="0"></span>
                                       <span class="units">11%</span>
                                       </span>
                                    </div>
                                    <div class="skills-item-meter">
                                       <span class="skills-item-meter-active bg-primary" style="width: 11%"></span>
                                    </div>
                                    <div class="counter-friends">2 people voted for this</div>
                                    <ul class="friends-harmonic">
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic10.jpg" alt="friend">
                                          </a>
                                       </li>
                                       <li>
                                          <a href="#">
                                          <img src="img/friend-harmonic9.jpg" alt="friend">
                                          </a>
                                       </li>
                                    </ul>
                                 </div>
                              </li>
                           </ul>
                           <!-- .. end W-Pool -->
                           <a href="#" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Vote Now!</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- ... end Right Sidebar -->
         </div>
      </div>
   <input type="hidden" name="postcomment" value="{{route('ajax.postcomment')}}">
   <input type="hidden" name="likepost" value="{{route('ajax.likepost')}}">
   <input type="hidden" name="poststatus" value="{{route('ajax.poststatus')}}">

@endsection

@section('scripts')
   <script type="text/javascript" src="{{asset('public/frontend/js/social.js')}}"></script>
   <script type="text/javascript" src="{{asset('public/frontend/js/timeline.js')}}"></script>
@endsection

