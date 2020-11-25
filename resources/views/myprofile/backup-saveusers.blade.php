@extends('layouts.master')
@section('title')
Saved
@endsection
@section('content')
@include('myprofile.profile_header')

@if(Auth::id())
<?php
    $cl1 = 'order-xl-2 order-md-1';
    $cl2 = 'order-xl-1 order-md-2';
    if(isset($sidebar) && $sidebar == 'left'){
        $cl1 = 'order-xl-1 order-md-1';
        $cl2 = 'order-xl-2 order-md-2';
    }
?>

      <div class="container">
         <form action="{{route('profile.saveusers')}}" method="GET">
            <div class="row">
               <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="ui-block responsive-flex">
                     <div class="ui-block-title">
                        <div class="h6 title">Alchemist Conenctions ({{$list_users->total()}})</div>
                           <div class="w-select">
                              <div class="title">Order By:</div>
                              <fieldset class="form-group">
                                 <select class="selectpicker form-control" name="filter">
                                    <option value="">Select Filter</option>
                                    <option selected="selected" value="id,desc">Alchemist Rating - DESC/ASC</option>
                                    <option value="id,asc">Alchemist Rating - ASC/DESC</option>
                                    <option value="">Alchemist Skill/Level - DESC/ASC</option>
                                    <option value="">Alchemist Skill/Level - ASC/DESC</option>
                                    <option value="">Completed Projects</option>
                                    <option value="">Contests Won</option>
                                    <option value="">Contests Posted</option>
                                    <option value="">Number of Articles</option>
                                 </select>
                              </fieldset>
                           </div>
                           <div class="w-search">
                              <div class="form-group with-button">
                                 <input class="form-control" type="text" name="keyword" placeholder="Search Alchemist Name..." value="@if($keyword){{$keyword}}@endif">
                                 <button type="submit">
                                    <svg class="olymp-magnifying-glass-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                       <!-- <a href="#" class="more">
                           <svg class="olymp-three-dots-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                           </svg>
                        </a>-->
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="container">
         <div class="row">
            @foreach($list_users as $list_user)
            <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6">
               <div class="ui-block">
                  <!-- Friend Item -->
                  <div class="friend-item">
                     <div class="friend-header-thumb">
                        <img src="img/1-318x122-Alchemist-card.png" alt="friend">
                     </div>
                     <div class="friend-item-content">
                        <div class="more">
                           <svg class="olymp-three-dots-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                           </svg>
                           <ul class="more-dropdown">
                              <li>
                                 <a href="#">Report Profile</a>
                              </li>
                              <li>
                                 <a href="#">Block Profile</a>
                              </li>
                              <li>
                                 <a href="#">Turn Off Notifications</a>
                              </li>
                           </ul>
                        </div>
                        <div class="friend-avatar">
                           <div class="author-thumb">
                              <img src="img/1-92x92-Alchemist-card.png" alt="author">
                           </div>
                           <div class="author-content">
                              <a href="{{$list_user->permalink()}}" class="h5 author-name">{{$list_user->first_name ." ". $list_user->last_name}}</a>
                              <div class="country">Graphic Designer | $75/HR</div>
                           </div>
                        </div>
                        <div class="swiper-container">
                           <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                 <p class="friend-about" data-swiper-parallax="-500"> Hi!, I’m James Rogers and I’m a Multimedia Designer for “WEDIDIT Creative”. My focus is on progressive UX/UI Design that improves technology and P2P interations. <br>
                                    ---- <br>
                                    <em> Photoshop, Illustrator, After Effects, DreamWeaver, Ruby, Premire, Logic, Blockchain, Powerpoint.. More..</em>
                                 </p>
                                 <div class="friend-count" data-swiper-parallax="-500">
                                    <a href="#" class="friend-count-item">
                                       <div class="h6">{{$list_user->level}}</div>
                                       <div class="title">Level</div>
                                    </a>
                                    <a href="#" class="friend-count-item">
                                       <div class="h6">{{$list_user->total_point()}}</div>
                                       <div class="title">Skill Points</div>
                                    </a>
                                    <a href="#" class="friend-count-item">
                                       <div class="h6">{{$list_user->AverageScore}}</div>
                                       <div class="title">Rating</div>
                                    </a>
                                 </div>
                                 <div class="control-block-button" data-swiper-parallax="-100">
                                    <a href="#" class="btn btn-control bg-blue">
                                       <svg class="olymp-happy-face-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
                                       </svg>
                                    </a>
                                    <a href="#" class="btn btn-control bg-purple js-chat-open">
                                       <svg class="olymp-chat---messages-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                                       </svg>
                                    </a>
                                 </div>
                              </div>
                             <!--  <div class="swiper-slide">
                                <div class="friend-since" data-swiper-parallax="-100">
                                   <div class="h6">- STATISTICS -</div>
                                   <br>
                                </div>
                                <div class="friend-count" data-swiper-parallax="-500">
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">22</div>
                                      <div class="title">Level</div>
                                   </a>
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">2094</div>
                                      <div class="title">Skill Points</div>
                                   </a>
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">4.2</div>
                                      <div class="title">Rating</div>
                                   </a>
                                </div>
                                <div class="friend-count" data-swiper-parallax="-500">
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">22</div>
                                      <div class="title">Badges</div>
                                   </a>
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">32</div>
                                      <div class="title">Specialties</div>
                                   </a>
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">30</div>
                                      <div class="title">Followers</div>
                                   </a>
                                </div>
                                <div class="friend-count" data-swiper-parallax="-500">
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">22</div>
                                      <div class="title">Articles</div>
                                   </a>
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">304</div>
                                      <div class="title">Projects</div>
                                   </a>
                                   <a href="#" class="friend-count-item">
                                      <div class="h6">30</div>
                                      <div class="title">Contests</div>
                                   </a>
                                </div>
                                <div class="friend-since" data-swiper-parallax="-100">
                                   <span>ALCHEMIST LEVEL</span>
                                   <div class="h6">Sorcerer | LV 29</div>
                                </div>
                             </div>
                             <div class="swiper-slide">
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
                                   <li>
                                      <a href="img/9.jpg">
                                      <img src="img/last-photo5.jpg" alt="photo">
                                      </a>
                                   </li>
                                   <li>
                                      <a href="img/9.jpg">
                                      <img src="img/photo-item11.jpg" alt="photo">
                                      </a>
                                   </li>
                                   <li>
                                      <a href="img/9.jpg">
                                      <img src="img/last-photo3.jpg" alt="photo">
                                      </a>
                                   </li>
                                </ul>
                                <br>
                             </div>
                             <div class="swiper-slide">
                                <div class="friend-since" data-swiper-parallax="-100"><span>FEATURED SKILLS (5)</span>
                                   <br>
                                   <br>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info">
                                      <span class="skills-item-title">Ruby - Lv 02 Beginner</span>
                                      <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="46" data-from="0"></span><span class="units">46%</span></span>
                                   </div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active bg-purple" style="width: 46%"></span>
                                   </div>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info">
                                      <span class="skills-item-title">DreamWeaver - Lv 04 Intermidiate</span>
                                      <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="62" data-from="0"></span><span class="units">62%</span></span>
                                   </div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active bg-primary" style="width: 62%"></span>
                                   </div>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info">
                                      <span class="skills-item-title">Photoshop - Lv 05 Advanced</span>
                                      <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="79" data-from="0"></span><span class="units">79%</span></span>
                                   </div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active bg-blue" style="width: 79%"></span>
                                   </div>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info">
                                      <span class="skills-item-title">PHP - Lv 01 Beginner</span>
                                      <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="34" data-from="0"></span><span class="units">34%</span></span>
                                   </div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active bg-breez" style="width: 34%"></span>
                                   </div>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info">
                                      <span class="skills-item-title">Illustrator - Lv 06 Expert</span>
                                      <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="95" data-from="0"></span><span class="units">95%</span></span>
                                   </div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active bg-yellow" style="width: 95%"></span>
                                   </div>
                                </div>
                             </div>
                             <div class="swiper-slide">
                                <div class="friend-since" data-swiper-parallax="-100">
                                   <span>COMMUNITY EARNED</span>
                                   <div class="h6">BADGES</div>
                                </div>
                                <div class="ui-block-content">
                                   W-Badges
                                   <ul class="widget w-badges">
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                            <img src="img/badge1.png" alt="author">
                                            <div class="label-avatar bg-primary">2</div>
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge4.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                            <img src="img/badge3.png" alt="author">
                                            <div class="label-avatar bg-blue">4</div>
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge6.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge11.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge8.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge10.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                            <img src="img/badge13.png" alt="author">
                                            <div class="label-avatar bg-breez">2</div>
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge7.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge12.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge12.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge11.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                         <img src="img/badge4.png" alt="author">
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                            <img src="img/badge1.png" alt="author">
                                            <div class="label-avatar bg-primary">2</div>
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                            <img src="img/badge3.png" alt="author">
                                            <div class="label-avatar bg-blue">4</div>
                                         </a>
                                      </li>
                                      <li>
                                         <a href="ProfilePage-Community-badges.html">
                                            <img src="img/badge13.png" alt="author">
                                            <div class="label-avatar bg-breez">2</div>
                                         </a>
                                      </li>
                                   </ul>
                                   .. end W-Badges
                                </div>
                                <a href="ProfilePage-Community-badges.html" class="btn btn-primary btn-sm">View Badges</a>
                             </div> -->
                           </div>
                           <!-- If we need pagination -->
                           <div class="swiper-pagination"></div>
                        </div>
                     </div>
                  </div>
                  <!-- ... end Friend Item -->
               </div>
            </div>
            @endforeach
         </div>
      </div>
@endif
@endsection


