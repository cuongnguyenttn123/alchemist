@extends('layouts.master')
@section('title')
About
@endsection
@section('content')
      <div class="container">
         <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="ui-block">
                <div class="top-header">
                    <div class="top-header-thumb profile_banner">
                        @if($profile_banner = $target_user->profile_banner)
                            <img src="{{$profile_banner}}">
                        @else
                            <img src="img/mybanner.jpg" alt="nature">
                        @endif
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 ">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="{{route('user.timeline', $target_user->id)}}">Timline</a>
                                    </li>
                                    <li> <a href="{{route('userinfo', $target_user->id)}}">About</a></li>
                                    <li>
                                        <div class="more"><span class="left-menu-title">Connections</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-5 ml-auto col-md-5">
                                <ul class="profile-menu more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="{{route('user.portfolio', $target_user->id)}}">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.articles', $target_user->id)}}">Articles</a>
                                    </li>
                                    <li>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            <a href="javascript:;" class="btn btn-control bg-blue">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                            </a>

                            <a href="javascript:;" class="btn btn-control bg-purple">
                                <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                            </a>

                            <div class="btn btn-control bg-primary more">
                                <svg class="olymp-settings-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a class="change_profile_photo" href="javascript:;" data-type="profile">Update Profile Photo</a>
                                    </li>
                                    <li>
                                        <a class="change_profile_photo" href="javascript:;" data-type="header">Update Header Photo</a>
                                    </li>
                                    <li>
                                        <a href="{{route('profile.settings')}}">Account Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-header-author">
                        <a href="javascript:;" class="author-thumb avatar">
                            @if($ava = $target_user->avatar)
                                <img width="132" src="{{$ava}}">
                            @else
                                <img width="132" src="img/author-main1.jpg" alt="author">
                            @endif
                        </a>
                        <div class="author-content"><a href="javascript:;" class="h4 author-name">{{$target_user->full_name}}</a>
                          <div class="country">Hong Kong, {{$target_user->get_usermeta('district')}}</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
         </div>
      </div>

      <div class="container">
         <div class="row">
            <!-- Main Content -->
            <div class="col col-xl-5 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
               <div id="newsfeed-items-grid">
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <h6 class="title">Education and Employement</h6>
                        <a href="javascript:;" class="more">
                           <svg class="olymp-three-dots-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                           </svg>
                        </a>
                     </div>
                     <div class="ui-block-content">
                        <div class="row">
                           <?php $edu = json_decode($target_user->get_usermeta('edu'));?>
                           @if(isset($edu))
                           @foreach($edu as $e)
                           <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                              <!-- W-Personal-Info -->
                              <ul class="widget w-personal-info item-block">
                                 <li>
                                    <span class="title">{{$e->title}}</span>
                                    <span class="date">{{$e->time}}</span>
                                    <span class="text">{{$e->descrition}}</span>
                                 </li>
                              </ul>
                           </div>
                           @endforeach
                           @endif
                           <?php $emp = json_decode($target_user->get_usermeta('emp'));?>
                           @if(isset($emp))
                           @foreach($emp as $e)
                           <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                              <!-- W-Personal-Info -->
                              <ul class="widget w-personal-info item-block">
                                 <li>
                                    <span class="title">{{$e->title}}</span>
                                    <span class="date">{{$e->time}}</span>
                                    <span class="text">{{$e->descrition}}</span>
                                 </li>
                              </ul>
                           </div>
                           @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <h6 class="title">Hobbies and Interests</h6>
                        <a href="javascript:;" class="more">
                           <svg class="olymp-three-dots-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                           </svg>
                        </a>
                     </div>
                     <div class="ui-block-content">
                        <div class="row">
                          <?php
                              $list_hnb = [
                                  "Hobbies", "Favourite TV Shows", "Favourite Movies", "Favourite Games",
                                  "Favourite Music Bands / Artists", "Favourite Books", "Favourite Writers", "Other Interests"
                              ];
                          ?>
                          @foreach($list_hnb as $hnb)
                             @if($bien = $target_user->get_usermeta(preg_replace("![^a-z0-9]+!i", "-", strtolower($hnb))) != '')
                             <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                 <!-- W-Personal-Info -->
                                 <ul class="widget w-personal-info item-block">
                                    <li>
                                       <span class="title">{{$hnb}}</span>
                                       <span class="text">{{$target_user->get_usermeta(preg_replace("![^a-z0-9]+!i", "-", strtolower($hnb))) ?? ""}}</span>
                                    </li>
                                 </ul>
                             </div>
                             @endif
                          @endforeach
                        </div>
                     </div>
                  </div>
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <h6 class="title">Ratings & Reviews</h6>
                        <div class="togglebutton">
                           <label>
                           <input type="checkbox" checked="">
                           </label>
                        </div>
                     </div>
                     <div class="ui-block-content">
                        <div class="crumina-module crumina-heading with-title-decoration" style="margin-bottom: -26px">
                           <p class="heading-title"><font color="#515365">Average score {{$target_user->average_score}}</font></p>
                        </div>
                        <div class="row">
                           <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                              <!-- Reviews -->
                              <ul class="comments__list-review">
                                 @foreach($target_user->reviews as $review)
                                 <li class="comments__item-review" style="padding-top: 25px; padding-bottom: 20px; margin-top: -0px">
                                    <div class="comment-entry comment comments__article">
                                       <div class="comments__body ovh">
                                          <h6 class="title">{{$review->title}}</h6>
                                             @foreach($review->ratings() as $rating)
                                             <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 10px">
                                                <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">{{$rating->value}} / 5</li>
                                                <li><span class="rating-static rating-{{round($rating->value*2)/2*10}}"></span></li>
                                                <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">{{$rating->name}}</font></li>
                                             </ul>
                                             @endforeach
                                          <div class="comment-content comment">{{$review->content}}<br><br>
                                             <font color="#515365">Skill Reccomendations:</font><br>
                                             <em>{{$review->skills()}}</em>
                                             </p>
                                          </div>
                                          <header class="comment-meta comments__header-review">
                                             <time class="published comments__time-review" datetime="2017-10-02 12:00:00">{{$review->created_at->diffForHumans()}}</time>
                                             <cite class="fn url comments__author-review">
                                             <a href="javascript:;" rel="external" class=" ">{{$review->user_from->full_name}}</a>
                                             </cite>
                                          </header>
                                       </div>
                                    </div>
                                 </li>
                                 @endforeach
                              </ul>
                              <!-- ... end Reviews -->
                           </div>
                           <a href="javascript:;" class="more-comments">View more reviews <span>+</span></a>
                        </div>
                     </div>
                  </div>
               </div>
               <a id="load-more-button" href="javascript:;" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
                  <svg class="olymp-three-dots-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                  </svg>
               </a>
            </div>
            <!-- ... end Main Content -->
            <!-- Left Sidebar -->
            <div class="col col-xl-4 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
                 <div class="">
                     <div class="">
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
                                             <span>Info</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link inline-items" data-toggle="tab" href="#tabpoint" role="tab" aria-expanded="false">
                                             <svg class="olymp-multimedia-icon">
                                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                                             </svg>
                                             <span>{{$rolename = $target_user->rolename}} Pts</span>
                                         </a>
                                     </li>
                                 </ul>
                                 <!-- Tab panes -->
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                                       <div class="ui-block-content" style="margin-top: 10px; margin-bottom: 0px; border-bottom-style: solid;
                                             border-width: 1px; border-color: #ECF1F5">
                                             <ul class="statistics-list-count">
                                                 <li>
                                                     <div class="points"><span> <span  style="background-color: #90CB1E; "></span> <font style="color: #515365; font-weight: 500; font-size: 18px ">James Rogers</font></span></div>
                                                     <div class="count-stat" style="font-size: 13px; padding-left: 0px; color: #888DA8">{{$rolename}} Level {{$target_user->level}}</div>
                                                 </li>
                                                 <div class="points">
                                                 </div>
                                             </ul>
                                             <div class="chart-with-statistic">
                                                <ul class="statistics-list-count">
                                                  <li>
                                                      <div class="points">
                                                          <span>
                                                          <span class="statistics-point bg-purple"></span>
                                                          <font style="color: #515365; font-weight: 500; font-size: 13px ">Showcases</font>
                                                          </span>
                                                      </div>
                                                      <div class="count-stat" style="font-size: 13px; padding-left: 18px; color: #888DA8">N/A</div>
                                                  </li>
                                                  <li>
                                                      <div class="points"><span> <span class="statistics-point bg-breez"></span><font style="color: #515365; font-weight: 500; font-size: 13px ">Contests Entered</font></div>
                                                      <div class="count-stat" style="font-size: 13px; padding-left: 15px; color: #888DA8">N/A</div>
                                                  </li>
                                                  <li>
                                                      <div class="points">
                                                          <span>
                                                          <span class="statistics-point bg-primary"></span>
                                                          <font style="color: #515365; font-weight: 500; font-size: 13px ">Jobs Posted</font>
                                                          </span>
                                                      </div>
                                                      <div class="count-stat" style="font-size: 13px; padding-left: 18px; color: #888DA8">{{$target_user->total_jobs()}}</div>
                                                  </li>
                                                  <li>
                                                      <div class="points">
                                                          <span>
                                                          <span class="statistics-point bg-yellow"></span>
                                                          <font style="color: #515365; font-weight: 500; font-size: 13px ">Articles</font>
                                                          </span>
                                                      </div>
                                                      <div class="count-stat" style="font-size: 13px; padding-left: 18px; color: #888DA8">{{$target_user->posts->count()}}</div>
                                                  </li>
                                                </ul>
                                                <div class="chart-js chart-js-pie-color">
                                                   <canvas id="pie-color-chart" width="140" height="140"></canvas>
                                                   <div class="chart-with-statistic" style="margin-top: 0x">
                                                      <div class="author-thumb" style="width: 180px; height: 180px; margin-left: -18px; margin-top: -18px">
                                                          <img src="img/author-main1.jpg" alt="author" style="width: 160px; height: 160px">
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                       </div>
                                       <div class="ui-block-content">
                                             <!-- W-Personal-Info -->
                                             <ul class="widget w-personal-info">
                                                 <li> <span class="title">About Me:</span><span class="text">{!!$target_user->get_usermeta('description') ?? 'N/A' !!}</span>
                                                 </li>
                                                 <li>
                                                     <span class="title">Birthday:</span>
                                                     <span class="text">{{$target_user->get_usermeta('birthday') ?? 'N/A'}}</span>
                                                 </li>
                                                 <li>
                                                     <span class="title">Birthplace:</span>
                                                     <span class="text">{{$target_user->get_usermeta('birthplace' ?? 'N/A')}}</span>
                                                 </li>
                                                 <li>
                                                     <span class="title">Lives in:</span>
                                                     <span class="text">{{$target_user->get_usermeta('live_in') ?? 'N/A'}}</span>
                                                 </li>
                                                 <li>
                                                     <span class="title">Occupation:</span>
                                                     <span class="text">{{$target_user->get_usermeta('occupation') ?? 'N/A'}}</span>
                                                 </li>
                                                 <li>
                                                   <span class="title">Joined:</span>
                                                   <span class="text">{{$target_user->joined ?? ''}}</span></li>
                                                 <li>
                                                     <span class="title">Gender:</span>
                                                     <span class="text">{{$target_user->sex == 1 ? 'Male' : 'Female'}}</span>
                                                 </li>
                                                 <li>
                                                     <span class="title">Status:</span>
                                                     <span class="text">N/A</span>
                                                 </li>
                                                 <li>
                                                   <span class="title">Email:</span>
                                                   <a href="javascript:;" class="text">{{$target_user->email}}</a>
                                                </li>
                                                 <li>
                                                     <span class="title">Website:</span>
                                                     <a href="{{addhttp($target_user->get_usermeta('website'))}}" class="text">{{$target_user->get_usermeta('website') ?? ''}}</a>
                                                 </li>
                                                 <li>
                                                     <span class="title">Phone Number:</span>
                                                     <span class="text">{{$target_user->phone ?? ''}}</span>
                                                 </li>
                                                 <li>
                                                     <span class="title">Religious Belifs:</span>
                                                     <span class="text">{{$target_user->get_usermeta('rb') ?? ''}}</span>
                                                 </li>
                                                 <li>
                                                     <span class="title">Political Incline:</span>
                                                     <span class="text">{{$target_user->get_usermeta('pi') ?? ''}}</span>
                                                 </li>
                                             </ul>
                                             <!-- ... end W-Personal-Info -->
                                             <!-- W-Socials -->
                                             <div class="widget w-socials">
                                                <h6 class="title">Other Social Networks:</h6>
                                                @if(isset($meta['facebook']))
                                                   <a href="{{addhttp($meta['facebook'])}}" class="social-item bg-facebook">
                                                      <i class="fab fa-facebook-f" aria-hidden="true"></i>Facebook
                                                   </a>
                                                @endif
                                                @if(isset($meta['twitter']))
                                                <a href="{{addhttp($meta['twitter'])}}" class="social-item bg-twitter">
                                                   <i class="fab fa-twitter" aria-hidden="true"></i>Twitter
                                                </a>
                                                @endif
                                                @if(isset($meta['dribbble']))
                                                <a href="{{addhttp($meta['dribbble'])}}" class="social-item bg-dribbble">
                                                   <i class="fab fa-dribbble" aria-hidden="true"></i>Dribbble
                                                </a>
                                                @endif
                                             </div>
                                             <!-- ... end W-Socials -->
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="tabpoint" role="tabpanel" aria-expanded="true">
                                       @include('template_part.user-tabpoint')
                                    </div>
                                 </div>
                             </div>
                             <!-- ... end News Feed Form  -->
                         </div>
                     </div>
                 </div>
            </div>
            <!-- ... end Left Sidebar -->
            <!-- Right Sidebar -->
            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
               <div class="">
                  <div class="">
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
                  </div>
               </div>
            </div>
            <!-- ... end Right Sidebar -->
         </div>
      </div>
@endsection
