@extends('myprofile.master_pro')
@section('title')
Stats
@endsection
@section('profile_content')

      <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
          <div class="ui-block">
            <div class="ui-block-content">
              <div class="monthly-indicator">
                <a href="#" class="btn btn-control bg-breez">
                  <svg class="olymp-stats-arrow"><use xlink:href="svg-icons/sprites/icons.svg#olymp-stats-arrow"></use></svg>
                </a>
                <div class="monthly-count">
                  522.670 New Favourites
                  <span class="indicator positive"> + 78.546</span>
                  <span class="period">Last Month</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
          <div class="ui-block">
            <div class="ui-block-content">
              <div class="monthly-indicator">
                <a href="#" class="btn btn-control bg-primary negative">
                  <svg class="olymp-stats-arrow"><use xlink:href="svg-icons/sprites/icons.svg#olymp-stats-arrow"></use></svg>
                </a>
                <div class="monthly-count">
                  208.341 New Visitors
                  <span class="indicator negative"> - 47.052</span>
                  <span class="period">Last Month</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="container">
         <div class="row">
            <!-- Main Content -->
            <div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
              <div class="ui-block">
                 <div class="ui-block-title">
                    <h6 class="title">Ratings & Reviews</h6>
                 </div>
                 <div class="ui-block-content">
                    <div class="crumina-module crumina-heading with-title-decoration" style="margin-bottom: -26px">
                       <p class="heading-title"><font color="#515365">Average score {{$target_user->average_score}}</font></p>
                    </div>
                    <div class="row">
                       <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                          <!-- W-Personal-Info -->
                          <ul class="comments__list-review">
                          @foreach($target_user->reviews as $review)
                             <li class="comments__item-review" style="padding-top: 25px; padding-bottom: 20px; margin-top: -0px">
                                <div class="comment-entry comment comments__article">
                                   <div class="comments__body ovh">
                                      <h6 class="title">{{$review->title}}</h6>
                                       @foreach($review->ratings() as $rating)
                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 10px">
                                         <li class="numerical-rating">{{rateToStar($rating->value)}}</li>
                                        <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">{{$rating->name}}</font></li>
                                      </ul>
                                      @endforeach
                                      <div class="comment-content comment"> {{$review->content}} <font color="#FF5E3A">More..</font><br>
                                         ---<br>
                                         <font color="#515365">Skill Reccomendations:</font><br>
                                         <em>{{$review->skills()}} <font color="#FF5E3A">More..</font></em>
                                         </p>
                                      </div>
                                      <header class="comment-meta comments__header-review">
                                         <time class="published comments__time-review" datetime="2017-10-02 12:00:00">4 hours ago by</time>
                                         <cite class="fn url comments__author-review">
                                         <a href="#" rel="external" class=" ">Nicholas Grissom</a>
                                         </cite>
                                      </header>
                                   </div>
                                </div>
                             </li>
                          @endforeach
                          </ul>
                          <!-- ... end W-Personal-Info -->
                       </div>
                       <a href="#" class="more-comments">View more reviews <span>+</span></a>
                    </div>
                 </div>
              </div>
              <div class="ui-block">
                 <div class="ui-block-title">
                    <h6 class="title">Skill Vote Levels</h6>
                    <a href="#" class="more">
                       <svg class="olymp-three-dots-icon">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                       </svg>
                    </a>
                 </div>
                 <div class="ui-block-content">
                    <div class="row">
                       <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                          <!-- W-Personal-Info -->
                          <ul >
                             <div>
                                <div class="crumina-module crumina-heading with-title-decoration">
                                   <p class="heading-title"><font color="#515365">Websites, IT & Software</font></p>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info"><span class="skills-item-title">Photshop - Lvl 01 (Begginer)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span><span class="units">90/100</span></span></div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active bg-green " style="width: 90%; background-color: #90CB1E;"></span>
                                   </div>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info"><span class="skills-item-title">UX/UI- Lvl 21 (Advanced)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="84" data-from="0"></span><span class="units">84/100</span></span></div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active" style="width: 84%; background-color: #3F8BEC;"></span>
                                   </div>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info"><span class="skills-item-title">Illustrator - Lvl 12 (Intermediate)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span><span class="units">60/100 </span></span></div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active bg-purple " style="width: 60%; background-color: #7B59C1;"></span>
                                   </div>
                                </div>
                                <div class="crumina-module crumina-heading with-title-decoration" style="margin-top: 30px">
                                   <p class="heading-title"><font color="#515365">Design, Media & Architecture</font></p>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info"><span class="skills-item-title">JavaScript - Lvl 31 (Advanced)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="50" data-from="0"></span><span class="units">50/100 </span></span></div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active " style="width: 50%; background-color: #3F8DEF;"></span>
                                   </div>
                                </div>
                                <div class="skills-item">
                                   <div class="skills-item-info"><span class="skills-item-title">DreamWeaver - Lvl 21 (Intermediate)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="70" data-from="0"></span><span class="units">70/100 </span></span></div>
                                   <div class="skills-item-meter">
                                      <span class="skills-item-meter-active bg-purple " style="width: 70%; background-color: #7A59C0;"></span>
                                   </div>
                                </div>
                             </div>
                          </ul>
                          <a href="#" class="more-comments">View more results <span>+</span></a>
                          <!-- ... end W-Personal-Info -->
                       </div>
                    </div>
                 </div>
              </div>
            </div>
            <!-- ... end Main Content -->
            <!-- Left Sidebar -->
            <div class="col col-xl-4 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
                 <div class="">
                     <div class="sidebar__inner">
                         <div class="ui-block">

                             <!-- News Feed Form  -->
                            <div class="ui-block-title">
                              <h6 class="title">Personal Info</h6>
                            </div>
                             <div class="news-feed-form">
                                 <!-- Nav tabs -->

                                 <!-- Tab panes -->
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                                       <div class="ui-block-content" style="margin-top: 10px; margin-bottom: 0px; border-bottom-style: solid;
                                             border-width: 1px; border-color: #ECF1F5">
                                             <ul class="statistics-list-count">
                                                 <li>
                                                     <div class="points"><span> <span  style="background-color: #90CB1E; "></span> <font style="color: #515365; font-weight: 500; font-size: 18px ">{{$target_user->full_name}}</font></span></div>
                                                     <div class="count-stat" style="font-size: 13px; padding-left: 0px; color: #888DA8">{{$rolename = $target_user->rolename}} Level {{$target_user->level}}</div>
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
                                                        {!!$target_user->getAvatarImgAttribute(160)!!}
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
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
                 <div class="ui-block" data-mh="pie-chart">
               <div class="ui-block-title">
                  <div class="h6 title">Skill Card</div>
                  <a href="#" class="more">
                     <svg class="olymp-three-dots-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                     </svg>
                  </a>
               </div>
               <div class="ui-block-content">
                  <div class="chart-with-statistic">
                     <div class="circle-progress circle-pie-chart" >
                        <div class="pie-chart" data-value="{{$target_user->percent_tier()}}" data-startcolor="#9fd734" data-endcolor="#71a927" >
                           <div class="top-header-author" align="center">
                              <img class="author-thumb" src="img/Diamond-Green.svg" alt="Skill Level" style="width: 160px; height: 160px">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container" style="margin-top: -40px; margin-bottom: 30px">
                  <div class="chart-text">
                     <h6>{{$rolename}} TIER: <font color="#90CB1E">{{$target_user->user_title}}</font> </h6>
                     <div class="crumina-module crumina-counter-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="counter-numbers counter h5" style="font-size: 30px; margin-bottom: 15px">
                           <div class="units">
                              <div><font color="#515365">Lvl</font></div>
                              <span data-speed="2000" data-refresh-interval="{{$target_user->level}}" data-to="{{$target_user->level()}}" data-from="0" style="color: #90CB1E; padding-bottom: 10px; padding-top: 10px">0</span>
                           </div>
                        </div>
                        <div class="counter-title" >
                           Level {{$target_user->level}} | <font color="#3F8DEF">{{$target_user->point_name}} </font>{{$target_user->points}} &gt; {{$target_user->next_level_point}}
                        </div>
                        <div class="chart-text">
                           <img src="img/skill-bar.png" alt=""/ style="margin-top: 0px; margin-bottom: 0px">
                           <div class="counter-title" style="margin-top: 0px;"> Level {{$target_user->rp_level}} | <font color="#7BB40B">RP </font>{{$target_user->total_rp()}} &gt; {{$target_user->rp_next_level_point}}</div>
                        </div>
                     </div>
                  </div>
                  <div class="row" style="margin-top:15px">
                     <!-- Counter Item -->
                     <!-- ... end Counter Item -->
                     <!-- Counter Item -->
                     <!-- ... end Counter Item -->
                     <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="counter-numbers counter h5" style="font-size: 20px; margin-bottom: 5px">
                           <div class="" style="margin-right: 5px; margin-bottom: 5px">
                              <img src="img/trophy-2.svg" alt="author" width="30" style="padding-bottom: 3px">
                           </div>
                           <span data-speed="2000" data-refresh-interval="15" data-to="{{$target_user->points}}" data-from="0">{{$target_user->points}}</span>
                           <div class="units" style="color: #F7F7F9">
                              <div><font color="#3F8DEF">{{$target_user->point_name}}</font></div>
                           </div>
                        </div>
                        <div class="counter-title" style=" line-height: 18px">{{$target_user->point_text}} Points<br> Level {{$target_user->level}}</div>
                     </div>
                     <!-- Counter Item -->
                     <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="counter-numbers counter h5" style="font-size: 20px; margin-bottom: 5px">
                           <div class="" style="margin-right: 5px; margin-bottom: 5px">
                              <img src="img/medal.svg" alt="author" width="30" style="padding-bottom: 3px; ">
                           </div>
                           <span data-speed="2000" data-refresh-interval="15" data-to="{{$target_user->RP}}" data-from="0">{{$target_user->RP}}</span>
                           <div class="units">
                              <div><font color="#90CB1E">RP</font></div>
                           </div>
                        </div>
                        <div class="counter-title" style="line-height: 18px">Reputation Points</strong> <br>
                           Level {{$target_user->rp_level}}
                        </div>
                     </div>
                     <!-- ... end Counter Item -->
                  </div>
                  <div class="ui-block-content">
                     <div class="skills-item">
                        <div class="skills-item-info"><img src="img/trophy-2.svg" width="21" hspace="1" style="margin-right: 5px; padding-bottom: 1px"><span class="skills-item-title"> Skill Pts Progress</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span><span class="units">{{$target_user->points}} / {{$target_user->nextLevelPoint()}}</span></span></div>
                        <div class="skills-item-meter">
                           <span class="skills-item-meter-active bg-smoke " style="width: {{$target_user->percent_next}}%; background-color: #3F8DEF;"></span>
                        </div>
                     </div>
                     <div class="ui-block" style="margin-top: -20px">
                        <!-- Your Profile  -->
                        <div class="your-profile">
                           <div id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="card">
                                 <div class="card-header" role="tab" id="headingOne">
                                    <p class="mb-0">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-21" aria-expanded="true" aria-controls="collapseOne-21" class="collapsed">
                                          Skill Points Details
                                          <svg class="olymp-dropdown-arrow-icon">
                                             <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                          </svg>
                                       </a>
                                    </p>
                                 </div>
                                 <div id="collapseOne-21" class="collapse" role="tabpanel" aria-labelledby="headingOne-21">
                                    <br>
                                    <ul class="your-profile-menu">
                                       <div class="row">
                                          <!-- Counter Item -->
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <!-- ... end Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="{{$target_user->points}}" data-from="0">0</span>
                                                <div class="units">
                                                   <div><font color="#3E8BED">{{$target_user->point_name}}</font></div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">Combined Total&nbsp;<br>
                                                {{$target_user->points}} / {{$target_user->next_level_point}}
                                             </div>
                                          </div>
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="160" data-from="0">0</span>
                                                <div class="units">
                                                   <div><font color="#3E8BED">{{$target_user->point_name}}</font></div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style=" line-height: 18px">Projects (Jobs)<br>
                                                Total Points
                                             </div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                       </div>
                                       <div class="row" style="margin-top: 20px; margin-bottom: 20px">
                                          <!-- Counter Item -->
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <br>
                                          <br>
                                          <!-- ... end Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="40" data-from="0">0</span>
                                                <div class="units">
                                                   <div><font color="#3E8BED">{{$target_user->point_name}}</font></div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style=" line-height: 18px">Competions <br>
                                                Total Points
                                             </div>
                                          </div>
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="60" data-from="0">0</span>
                                                <div class="units">
                                                   <div><font color="#3E8BED">{{$target_user->point_name}}</font></div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">Examinations <br>
                                                Total Points
                                             </div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                       </div>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- ... end Your Profile  -->
                     </div>
                     <div class="skills-item">
                        <div class="skills-item-info"><img src="img/medal.svg" width="23" hspace="1" style="margin-right: 5px; padding-bottom: 1px"><span class="skills-item-title"> Reputation Pts Progress</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span><span class="units">{{$target_user->RP}} / {{$target_user->rp_next_level_point}}</span></span></div>
                        <div class="skills-item-meter">
                           <span class="skills-item-meter-active bg-smoke" style="width: {{$target_user->percent_next_rp}}%; background-color: #90CB1E;"></span>
                        </div>
                     </div>
                     <div class="ui-block" style="margin-top: -20px">
                        <!-- Your Profile  -->
                        <div class="your-profile">
                           <div id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="card">
                                 <div class="card-header" role="tab" id="headingOne">
                                    <p class="mb-0">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-22" aria-expanded="true" aria-controls="collapseOne-22" class="collapsed">
                                          Reputation Details
                                          <svg class="olymp-dropdown-arrow-icon">
                                             <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                          </svg>
                                       </a>
                                    </p>
                                 </div>
                                 <div id="collapseOne-22" class="collapse" role="tabpanel" aria-labelledby="headingOne-22">
                                    <br>
                                    <ul class="your-profile-menu">
                                       <div class="row">
                                          <!-- Counter Item -->
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <!-- ... end Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="{{$target_user->points}}" data-from="0">{{$target_user->points}}</span>
                                                <div class="units">
                                                   <div><font color="#90CB1E">RP</font></div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style=" line-height: 18px">Combined Total&nbsp;<br>
                                                {{$target_user->points}} / {{$target_user->next_level_point}}
                                             </div>
                                          </div>
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="160" data-from="0">180</span>
                                                <div class="units">
                                                   <div><font color="#90CB1E">RP</font></div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style=" line-height: 18px">Posts <br>
                                                Total Points
                                             </div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                       </div>
                                       <div class="row" style="margin-top: 20px; margin-bottom: 20px">
                                          <!-- Counter Item -->
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <br>
                                          <br>
                                          <!-- ... end Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="40" data-from="0">100</span>
                                                <div class="units">
                                                   <div><font color="#90CB1E">RP</font></div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style=" line-height: 18px">Showcase <br>
                                                Total Points
                                             </div>
                                          </div>
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="60" data-from="0">80</span>
                                                <div class="units">
                                                   <div><font color="#90CB1E">RP</font></div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">Comments <br>
                                                Total Points
                                             </div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                       </div>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- ... end Your Profile  -->
                     </div>
                     <div class="ui-block" style="margin-top: 0px">
                        <!-- Your Profile  -->
                        <div class="your-profile">
                           <div class="ui-block-title ui-block-title-small">
                              <h6 class="h6 title">PROFICIENCIES</h6>
                           </div>
                           <div id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="card">
                                 <div class="card-header" role="tab" id="headingOne">
                                    <p class="mb-0">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-32" aria-expanded="true" aria-controls="collapseOne-32" class="collapsed">
                                          <img src="img/graduate-cap.svg" width="18" hspace="1" style="margin-left: -13px; margin-right: 5px; ">
                                          <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">Exam Results / Level</span>
                                          <svg class="olymp-dropdown-arrow-icon">
                                             <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                          </svg>
                                       </a>
                                    </p>
                                 </div>
                                 <div id="collapseOne-32" class="collapse" role="tabpanel" aria-labelledby="headingOne-23">
                                    <br>
                                    <ul class="your-profile-menu">
                                       <div>
                                          <div class="crumina-module crumina-heading with-title-decoration">
                                             <p class="heading-title"><font color="#515365">Websites, IT & Software</font></p>
                                          </div>
                                          <div class="skills-item">
                                             <div class="skills-item-info"><span class="skills-item-title">Photshop - Lvl 01 (Begginer)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span><span class="units">90/100</span></span></div>
                                             <div class="skills-item-meter">
                                                <span class="skills-item-meter-active bg-smoke " style="width: 90%; height: 10px; background-color: #3F8DEF;"></span>
                                             </div>
                                          </div>
                                          <div class="skills-item">
                                             <div class="skills-item-info"><span class="skills-item-title">UX/UI- Lvl 21 (Advanced)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="84" data-from="0"></span><span class="units">84/100</span></span></div>
                                             <div class="skills-item-meter">
                                                <span class="skills-item-meter-active bg-smoke " style="width: 84%; height: 10px; background-color: #3F8DEF;"></span>
                                             </div>
                                          </div>
                                          <div class="skills-item">
                                             <div class="skills-item-info"><span class="skills-item-title">Illustrator - Lvl 12 (Intermediate)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span><span class="units">60/100 </span></span></div>
                                             <div class="skills-item-meter">
                                                <span class="skills-item-meter-active bg-smoke " style="width: 60%; height: 10px; background-color: #3F8DEF;"></span>
                                             </div>
                                          </div>
                                          <div class="crumina-module crumina-heading with-title-decoration" style="margin-top: 30px">
                                             <p class="heading-title"><font color="#515365">Design, Media & Architecture</font></p>
                                          </div>
                                          <div class="skills-item">
                                             <div class="skills-item-info"><span class="skills-item-title">JavaScript - Lvl 31 (Advanced)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="50" data-from="0"></span><span class="units">50/100 </span></span></div>
                                             <div class="skills-item-meter">
                                                <span class="skills-item-meter-active bg-smoke " style="width: 50%; height: 10px; background-color: #3F8DEF;"></span>
                                             </div>
                                          </div>
                                          <div class="skills-item">
                                             <div class="skills-item-info"><span class="skills-item-title">DreamWeaver - Lvl 21 (Intermediate)</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="70" data-from="0"></span><span class="units">70/100 </span></span></div>
                                             <div class="skills-item-meter">
                                                <span class="skills-item-meter-active bg-smoke " style="width: 70%; height: 10px; background-color: #3F8DEF;"></span>
                                             </div>
                                          </div>
                                       </div>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="card">
                                 <div class="card-header" role="tab" id="headingOne">
                                    <p class="mb-0">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-24" aria-expanded="true" aria-controls="collapseOne-24" class="collapsed">
                                          <img src="img/secure.svg" width="15" hspace="1" style="margin-left: -11px; margin-right: 6px; padding-bottom: 3px">
                                          <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">Skill Recomendations </span>
                                          <svg class="olymp-dropdown-arrow-icon">
                                             <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                          </svg>
                                       </a>
                                    </p>
                                 </div>
                                 <div id="collapseOne-24" class="collapse" role="tabpanel" aria-labelledby="headingOne-24">
                                    <br>
                                    <ul class="your-profile-menu">
                                       <div class="crumina-module crumina-heading with-title-decoration">
                                          <p class="heading-title"><font color="#515365">Websites, IT & Software</font></p>
                                       </div>
                                       <div class="row">
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="245" data-from="0">0</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">WordPress</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="230" data-from="0">0</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">Html5</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="3" data-from="0">0</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">JavaScript</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                       </div>
                                       <div class="row" style="margin-top: 20px; margin-bottom: 20px">
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="45" data-from="0">445</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">Laravel</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="10" data-from="0">340</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">Html5</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="14" data-from="0">0</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">JavaScript</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                       </div>
                                       <div class="crumina-module crumina-heading with-title-decoration" style="margin-top: 30px">
                                          <p class="heading-title"><font color="#515365">Design, Media & Architecture</font></p>
                                       </div>
                                       <div class="row" style="margin-top: 20px; margin-bottom:20px">
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="29" data-from="0">0</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">Photoshop</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="34" data-from="0">0</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">Illustrator</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                          <!-- Counter Item -->
                                          <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                             <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                <span data-speed="2000" data-refresh-interval="15" data-to="56" data-from="0">0</span>
                                                <div class="units">
                                                   <div>+</div>
                                                </div>
                                             </div>
                                             <div class="counter-title" style="line-height: 18px">AfterEffects</div>
                                          </div>
                                          <!-- ... end Counter Item -->
                                       </div>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div id="accordion" role="tablist" aria-multiselectable="true">
                              <div class="card">
                                 <div class="card-header" role="tab" id="headingOne">
                                    <p class="mb-0">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-52" aria-expanded="true" aria-controls="collapseOne-52" class="collapsed">
                                          <img src="img/star (2).svg" width="15" hspace="1" style="margin-left: -10px; margin-right: 5px; padding-bottom: 3px"> Recent <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">Ratings</span>
                                          <svg class="olymp-dropdown-arrow-icon">
                                             <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                          </svg>
                                       </a>
                                    </p>
                                 </div>
                                 <div id="collapseOne-52" class="collapse" role="tabpanel" aria-labelledby="headingOne-25">
                                    <br>
                                    <ul class="your-profile-menu">
                                       <div class="tab-pane" id="rewievs" role="tabpanel" data-mh="log-tab">
                                          <div class="crumina-module crumina-heading with-title-decoration" style="margin-bottom: -26px">
                                             <p class="heading-title"><font color="#515365">Recent Seeker Reviews</font></p>
                                          </div>
                                          <ul class="comments__list-review">
                                             <li class="comments__item-review" style="padding-top: 25px; padding-bottom: 20px; margin-top: -0px">
                                                <div class="comment-entry comment comments__article">
                                                   <div class="comments__body ovh">
                                                      <h6 class="title">Perfect Logo Design!</h6>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 10px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">5 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Work Quality</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">2 &nbsp;/ 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365"> Manangement</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px" >4 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Attitude</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 10px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">3 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Item Organisation</font></li>
                                                      </ul>
                                                      <div class="comment-content comment"> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                         fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                         sequi nesciunt..<font color="#FF5E3A">More..</font><br>---<br>
                                                         <font color="#515365">Skill Reccomendations:</font><br>
                                                         <em> Photoshop, Illustrator, After Effects, DreamWeaver, Ruby, Premire, Logic, Blockchain, Powerpoint..<font color="#FF5E3A">More..</font> </em></p>
                                                      </div>
                                                      <header class="comment-meta comments__header-review">
                                                         <time class="published comments__time-review" datetime="2017-10-02 12:00:00">4 hours ago by</time>
                                                         <cite class="fn url comments__author-review">
                                                         <a href="#" rel="external" class=" ">Nicholas Grissom</a>
                                                         </cite>
                                                      </header>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="comments__item-review" style="padding-top: 25px; padding-bottom: 20px; margin-top: -0px">
                                                <div class="comment-entry comment comments__article">
                                                   <div class="comments__body ovh">
                                                      <h6 class="title">Perfect Logo Design!</h6>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 10px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">5 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Work Quality</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">2 &nbsp;/ 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Project Manangement</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px" >4 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Attitude</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 10px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">3 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Item Organisation</font></li>
                                                      </ul>
                                                      <div class="comment-content comment"> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                         fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                         sequi nesciunt..<font color="#FF5E3A">More..</font><br>---<br>
                                                         <font color="#515365">Skill Reccomendations:</font><br>
                                                         <em> Photoshop, Illustrator, After Effects, DreamWeaver, Ruby, Premire, Logic, Blockchain, Powerpoint..<font color="#FF5E3A">More..</font> </em></p>
                                                      </div>
                                                      <header class="comment-meta comments__header-review">
                                                         <time class="published comments__time-review" datetime="2017-10-02 12:00:00">4 hours ago by</time>
                                                         <cite class="fn url comments__author-review">
                                                         <a href="#" rel="external" class=" ">Nicholas Grissom</a>
                                                         </cite>
                                                      </header>
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="comments__item-review" style="padding-top: 25px; padding-bottom: 20px; margin-top: -0px">
                                                <div class="comment-entry comment comments__article">
                                                   <div class="comments__body ovh">
                                                      <h6 class="title">Perfect Logo Design!</h6>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 10px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">5 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Work Quality</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">2 &nbsp;/ 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Project Manangement</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px" >4 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Attitude</font></li>
                                                      </ul>
                                                      <ul class="rait-stars" style="margin-bottom: 10px; margin-top: 5px">
                                                         <li class="numerical-rating" style="margin-left: 0px; padding-right: 5px; font-size: 10px">3 / 5</li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="fa fa-star star-icon c-primary" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li>
                                                            <i class="far fa-star star-icon" aria-hidden="true"></i>
                                                         </li>
                                                         <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">Item Organisation</font></li>
                                                      </ul>
                                                      <div class="comment-content comment"> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                         fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                         sequi nesciunt..<font color="#FF5E3A">More..</font><br>---<br>
                                                         <font color="#515365">Skill Reccomendations:</font><br>
                                                         <em> Photoshop, Illustrator, After Effects, DreamWeaver, Ruby, Premire, Logogic, Blockchain, Powerpoint..<font color="#FF5E3A">More..</font> </em></p>
                                                      </div>
                                                      <header class="comment-meta comments__header-review">
                                                         <time class="published comments__time-review" datetime="2017-10-02 12:00:00">4 hours ago by</time>
                                                         <cite class="fn url comments__author-review">
                                                         <a href="#" rel="external" class=" ">Nicholas Grissom</a>
                                                         </cite>
                                                      </header>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                          <a href="#" class="more-comments">View more reviews <span>+</span></a>
                                       </div>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- ... end Your Profile  -->
                     </div>
                  </div>
                  <div class="container" style="margin-top: 0px; margin-bottom: 0px">
                     <div class="row">
                        <!-- Counter Item -->
                        <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                           <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                              <span data-speed="2000" data-refresh-interval="15" data-to="45" data-from="0">0</span>
                              <div class="units">
                                 <div>+</div>
                              </div>
                           </div>
                           <div class="counter-title" style="line-height: 18px">Completed Jobs</div>
                        </div>
                        <!-- ... end Counter Item -->
                        <!-- Counter Item -->
                        <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                           <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                              <span data-speed="2000" data-refresh-interval="15" data-to="30" data-from="0">0</span>
                              <div class="units">
                                 <div>+</div>
                              </div>
                           </div>
                           <div class="counter-title" style="line-height: 18px">Competitions Won</div>
                        </div>
                        <!-- ... end Counter Item -->
                        <!-- Counter Item -->
                        <div class="crumina-module crumina-counter-item col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                           <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                              <span data-speed="2000" data-refresh-interval="15" data-to="3" data-from="0">0</span>
                              <div class="units">
                                 <div>+</div>
                              </div>
                           </div>
                           <div class="counter-title" style="line-height: 18px">Articles/Blogs Posted</div>
                        </div>
                        <!-- ... end Counter Item -->
                     </div>
                  </div>
               </div>
            </div>
            </div>
            <!-- ... end Left Sidebar -->

         </div>
      </div>
@endsection
