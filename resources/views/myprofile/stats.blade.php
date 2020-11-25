@extends('myprofile.master_pro')
@section('title')
Stats
@endsection
@section('profile_content')
    <div class="container">
      <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="ui-block">
            <div class="ui-block-title">
              <div class="h6 title">{{$target_user->full_name}} Info & Statistics</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container {{ ($target_user->is_seeker()) ? 'seeker' : '' }}">
      <div class="row">
         <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                  <div class="row">
                     <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="ui-block">
                           <div class="ui-block-content">
                              <ul class="statistics-list-count">
                                 <li>
                                    <div class="points">
                                       <span>
                                       Last Month Visitors
                                       </span>
                                    </div>
                                    <div class="count-stat">284
                                       <span class="indicator positive"> + 407</span>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="ui-block">
                           <div class="ui-block-content">
                              <ul class="statistics-list-count">
                                 <li>
                                    <div class="points">
                                       <span>
                                       Last Year Visitors
                                       </span>
                                    </div>
                                    <div class="count-stat">4506
                                       <span class="indicator negative"> - 125</span>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="ui-block">
                           <div class="ui-block-content">
                              <ul class="statistics-list-count">
                                 <li>
                                    <div class="points">
                                       <span>
                                       Last Month Posts
                                       </span>
                                    </div>
                                    <div class="count-stat">53
                                       <span class="indicator positive"> + 10</span>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="ui-block">
                           <div class="ui-block-content">
                              <ul class="statistics-list-count">
                                 <li>
                                    <div class="points">
                                       <span>
                                       Last Year Posts
                                       </span>
                                    </div>
                                    <div class="count-stat">390
                                       <span class="indicator positive"> + 27</span>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="ui-block user_lever" data-mh="pie-chart">
                           <div class="ui-block-content inline-items" align="center">
                              <div class="circle-progress circle-pie-chart-small  " style="margin-right: 5px;position: relative;height: 250px;display: block;" align="center" >
                                 <img class="author" src="img/level_image/level_{{$target_user->user_tier()}}.svg" alt="Skill Level"
                                 style="margin-bottom: 0; width: 160px;position: absolute;top: 70px;left: 27%;" >
                                 <div class="pie-chart" data-lv="{{roundUpToAny($target_user->level)}}" data-value="{{$target_user->PercentToNextLevel}}" style="position: absolute;top: 56px;left: 22.5%;" data-startcolor="#90CB1E" data-endcolor="#78B10A" data-border= 30px background-color: #ebecf2>
                                    {{-- <div class="content" align="center" style="font-size: 17px; font-weight: 700; color: #90CB1E; "><span>%</span></div>
                                    <div class="counter-title" style=" line-height: 18px;" >LEVEL {{roundUpToAny($target_user->level())}}</div> --}}
                                 </div>
                              </div>
                           </div>
                           <div class="container" style="margin-top: 0px; ">
                              <div class="chart-text">
                                 <div class="crumina-module crumina-counter-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="counter-numbers counter h5" style="font-size: 35px; margin-bottom: 5px">
                                       <div class="units">
                                          <div><font color="#515365">LEVEL</font></div>
                                          <span data-speed="2000" data-refresh-interval="50" data-to="{{$target_user->level}}" data-from="0" style="color: #868BA6; padding-bottom: 10px; padding-top: 10px">0</span>
                                       </div>
                                    </div>
                                    <h6 style="margin-bottom: 25px">{{$target_user->rolename}} TIER {{$target_user->user_tier()}}: <font color="#868BA6">{{$target_user->user_title}}</font> </h6>
                                    <div class="row" style="margin-bottom: 35px">
                                       <!-- Counter Item -->
                                       <!-- ... end Counter Item -->
                                       <div class="crumina-module col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " style="padding: 0px 25px" >
                                          <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding: 0 20px 0 20px">
                                             <div class="counter-title" align="center" style="margin-bottom: -5px;" >
                                                <font color="#3F8DEF">{{$target_user->point_name}} </font>LV {{$target_user->level}} | {{$target_user->points}} &gt; {{$target_user->next_level_point}} | LV {{$target_user->level+1}}
                                             </div>
                                             <div class="skills-item">
                                                <div class="skills-item-meter seeker-bgcolor" style="height: 23px; margin-top: 11px; background-color: #62A1ED; border-style: solid;
                                                   border-width: 0px; border-color: #707070; ">
                                                   <span class="skills-item-meter-active bg-purple " style=" margin-top: 6px; height: 10px; width: 70%; background-image: linear-gradient(#FCFCFC, #C8C8C8); "></span>
                                                </div>
                                                <div class="skills-item-meter seeker-bgcolor-FF0ACD" style="height: 23px; margin-top: 0px; background-color: #90CB1E; border-style: solid;
                                                   border-width: 0px; border-color: #707070;  ">
                                                   <span class="skills-item-meter-active bg-purple " style=" margin-top: 6px; height: 10px; width: 30%; background-image: linear-gradient(#FCFCFC, #C8C8C8);"></span>
                                                </div>
                                                <div class="counter-title" align="center" style="margin-top: 10px;"><font color="#7BB40B">RP </font>LV {{$target_user->rp_level}} | {{$target_user->RP}} &gt; {{$target_user->rp_next_level_point}} | LV {{$target_user->rp_level+1}}</div>
                                             </div>
                                          </div>
                                          <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" align="left" style="margin: -105px 0 0 -26px; ">
                                             <div>
                                                <img class="author" src="img/Diamond-Apprentice-small.svg" alt="Skill Level" style="max-width: 65px">
                                                <div class="label-avatar bg-grey" style="position: sticky;z-index: 4;margin: -53px 0 0 12px;width: 42px;height: 42px;padding-top: 14px;font-size: 16px;padding-left: 0px;">{{$target_user->level}}</div>
                                             </div>
                                          </div>
                                          <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" align="right" style="margin: -54px 0 0 26px ">
                                             <div>
                                                <img class="author" src="img/Diamond-Apprentice-small.svg" alt="Skill Level" style="max-width: 65px">
                                                <div class="label-avatar bg-grey" style="position: sticky;z-index: 4;margin: -53px 11px 0 0;width: 42px;height: 42px;padding-top: 14px;font-size: 16px;padding-left: 0px;">{{$target_user->level+1}}</div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row" style="margin-top:15px">
                                 <!-- Counter Item -->
                                 <!-- ... end Counter Item -->
                                 <!-- Counter Item -->
                                 <!-- ... end Counter Item -->
                                 <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style=" margin-bottom: 0px">
                                    <div class="counter-numbers counter h5" style="font-size: 20px; margin-bottom: 5px">
                                       <div class="" style="margin-right: 5px; margin-bottom: 5px">
                                          <img src="svg-icons/JobCard/trophy.svg" alt="author" width="30" style="padding-bottom: 3px">
                                       </div>
                                       <span data-speed="2000" data-refresh-interval="50" data-to="{{$target_user->points}}" data-from="0">0</span>
                                       <div class="units" style="color: #F7F7F9">
                                          <div><font class="seeker-color" color="#3F8DEF">{{$target_user->point_name}}</font></div>
                                       </div>
                                    </div>
                                    <div class="counter-title" style=" line-height: 18px">Skill Based Points<br> Level {{$target_user->level}}</div>
                                 </div>
                                 <!-- Counter Item -->
                                 <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" style=" margin-bottom: 0px">
                                    <div class="counter-numbers counter h5" style="font-size: 20px; margin-bottom: 5px">
                                       <div class="" style="margin-right: 5px; margin-bottom: 5px">
                                          <img src="svg-icons/JobCard/loudspeaker.svg" alt="author" width="30" style="padding-bottom: 3px; ">
                                       </div>
                                       <span data-speed="2000" data-refresh-interval="50" data-to="{{$target_user->RP}}" data-from="0">0</span>
                                       <div class="units">
                                          <div><font class="seeker-color" color="#90CB1E">RP</font></div>
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
                                    <div class="skills-item-info"><img src="svg-icons/JobCard/trophy.svg" width="21" hspace="1" style="margin-right: 5px; padding-bottom: 1px"><span class="skills-item-title"> Skill Pts Progress</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="{{$target_user->points}}" data-from="0"></span><span class="units">{{$target_user->points}} / {{$target_user->next_level_point}}</span></span></div>
                                    <div class="skills-item-meter">
                                       <span class="skills-item-meter-active bg-smoke seeker-bgcolor" style="width: 80%; background-color: #3F8DEF;"></span>
                                    </div>
                                 </div>
                                 <div class="ui-block" style="margin-top: -23px">
                                    <!-- Your Profile  -->
                                    <div class="your-profile">
                                       <div id="accordion" role="tablist" aria-multiselectable="true">
                                          <div class="card">
                                             <div class="card-header" role="tab" id="headingOne" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                                                <p class="mb-0">
                                                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-21" aria-expanded="true" aria-controls="collapseOne-21" class="collapsed">
                                                      <img src="svg-icons/Alchemist Info/thunderbolt.svg" width="18" hspace="1" style="margin-left: -11px; margin-right: 10px; padding-bottom: 3px">General SBP Points
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
                                                            <span data-speed="2000" data-refresh-interval="15" data-to="260" data-from="0">0</span>
                                                            <div class="units">
                                                               <div><font class="seeker-color" color="#3E8BED">SBP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style=" line-height: 18px">Project Review<br>
                                                            Total Pts
                                                         </div>
                                                      </div>
                                                      <!-- Counter Item -->
                                                      <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                         <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                            <span data-speed="2000" data-refresh-interval="15" data-to="160" data-from="0">0</span>
                                                            <div class="units">
                                                               <div><font class="seeker-color" color="#3E8BED">SBP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style=" line-height: 18px">Rating<br>
                                                            Consistancy
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
                                                               <div><font class="seeker-color" color="#3E8BED">SBP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style=" line-height: 18px">Contest<br>
                                                            Podium Pts
                                                         </div>
                                                      </div>
                                                      <!-- Counter Item -->
                                                      <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                         <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                            <span data-speed="2000" data-refresh-interval="15" data-to="60" data-from="0">0</span>
                                                            <div class="units">
                                                               <div><font class="seeker-color" color="#3E8BED">SBP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style="line-height: 18px">Podium<br>
                                                            Consistency
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
                                                      <div class="crumina-module crumina-counter-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                         <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                            <span data-speed="2000" data-refresh-interval="15" data-to="60" data-from="0">0</span>
                                                            <div class="units">
                                                               <div><font class="seeker-color" color="#3E8BED">SP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style="line-height: 18px">No. Of Months Lapsed</div>
                                                      </div>
                                                      <!-- ... end Counter Item -->
                                                   </div>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div id="accordion" role="tablist" aria-multiselectable="true">
                                          <div class="card">
                                             <div class="card-header" role="tab" id="headingOne" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                                                <p class="mb-0">
                                                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-24" aria-expanded="true" aria-controls="collapseOne-24" class="collapsed">
                                                      <img src="svg-icons/sprites/star-icon.svg" width="18" hspace="1" style="margin-left: -11px; margin-right: 10px; padding-bottom: 3px"><span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">Review Points</span>
                                                      <svg class="olymp-dropdown-arrow-icon">
                                                         <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                      </svg>
                                                   </a>
                                                </p>
                                             </div>
                                             <div id="collapseOne-24" class="collapse" role="tabpanel" aria-labelledby="headingOne-24">
                                                <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-top-width: 0px;border-bottom-color: #E6ECF5">
                                                      <div class="ui-block-content" align="center" style="margin: 0px;padding: 0px" >
                                                         @foreach($criteria_rating as $key=>$value)
                                                         <div class="skills-item inline-items" style="margin-bottom: 10px">
                                                            <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/thumbs-up.svg" width="15" hspace="1" style="padding-bottom: 3px;vertical-align: reset; margin-left: 0px">{{$value}}</span><br>
                                                            <div class="counter-numbers counter h5 inline-items" style="font-size: 12px; margin-bottom: 0px;">
                                                               <span data-speed="2000" data-refresh-interval="15" data-to="{{$target_user->total_point($key)}}" data-from="0" style="color: #71768E;font-weight: 400">0</span>
                                                               <div class="units">
                                                                  <div><font class="seeker-color" color="#3E8BED " style="font-weight: 400">{{$target_user->point_name}} </font></div>
                                                               </div>
                                                            </div>
                                                            <ul class="rait-stars" style="margin-bottom: 0px; margin-top: 0px">
                                                               <li class="numerical-rating" style="margin-left: 0px; padding-left: 5px; font-size: 12px; line-height: 19px; color: #71768E;font-weight: 400">| {{$target_user->type_point($key)}}</li>
                                                               {{rateToStar($target_user->type_point($key))}}
                                                            </ul>
                                                         </div>
                                                         @endforeach
                                                      </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- ... end Your Profile  -->
                                 </div>
                                 <div class="skills-item">
                                    <div class="skills-item-info"><img src="svg-icons/JobCard/loudspeaker.svg" width="23" hspace="1" style="margin-right: 5px; padding-bottom: 1px"><span class="skills-item-title"> Reputation Pts Progress</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="{{$target_user->RP}}" data-from="0"></span><span class="units">{{$target_user->RP}} / {{$target_user->rp_next_level_point}}</span></span></div>
                                    <div class="skills-item-meter">
                                       <span class="skills-item-meter-active bg-smoke seeker-bgcolor" style="width: 60%; background-color: #90CB1E;"></span>
                                    </div>
                                 </div>
                                 <div class="ui-block" style="margin-top: -23px">
                                    <!-- Your Profile  -->
                                    <div class="your-profile">
                                       <div id="accordion" role="tablist" aria-multiselectable="true">
                                          <div class="card">
                                             <div class="card-header" role="tab" id="headingOne" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                                                <p class="mb-0">
                                                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-22" aria-expanded="true" aria-controls="collapseOne-22" class="collapsed">
                                                      <img src="svg-icons/Alchemist Info/thunderbolt.svg" width="18" hspace="1" style="margin-left: -11px; margin-right: 10px; padding-bottom: 3px">Reputation Details
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
                                                            <span data-speed="2000" data-refresh-interval="15" data-to="260" data-from="0">360</span>
                                                            <div class="units">
                                                               <div><font color="#90CB1E">RP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style=" line-height: 18px">No. of <br>posts/Mth</div>
                                                      </div>
                                                      <!-- Counter Item -->
                                                      <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                         <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                            <span data-speed="2000" data-refresh-interval="15" data-to="160" data-from="0">180</span>
                                                            <div class="units">
                                                               <div><font color="#90CB1E">RP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style=" line-height: 18px">No. of <br>showcases/Mth</div>
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
                                                         <div class="counter-title" style=" line-height: 18px">No. of <br>Comments/Mth</div>
                                                      </div>
                                                      <!-- Counter Item -->
                                                      <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                         <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                            <span data-speed="2000" data-refresh-interval="15" data-to="60" data-from="0">80</span>
                                                            <div class="units">
                                                               <div><font color="#90CB1E">RP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style="line-height: 18px">No. of <br>Disputes/Mth </div>
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
                                                      <div class="crumina-module crumina-counter-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                         <div class="counter-numbers counter h5" style="font-size: 16px; margin-bottom: 5px">
                                                            <span data-speed="2000" data-refresh-interval="15" data-to="40" data-from="0">100</span>
                                                            <div class="units">
                                                               <div><font color="#90CB1E">RP</font></div>
                                                            </div>
                                                         </div>
                                                         <div class="counter-title" style=" line-height: 18px">No. of months <br> have lapsed</div>
                                                      </div>
                                                   </div>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- ... end Your Profile  -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="ui-block">
                           <div class="ui-block-title">
                              <h6 class="title"> Work Statistics</h6>
                           </div>
                           <div class="ui-block-content"  >
                              <form class="" >
                                 <div class="col col-lg-12 col-12">
                                    <div class="skills-item" >
                                       <div class="skills-item-info">
                                          <span class="skills-item-title"><span >Reviews (Done/Incomplete)</span></span>
                                             <span class="skills-item-count" >
                                                <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                                                <span class="units" style="color: #90CB1E">{{$target_user->reviews()->count()}}</span>
                                                <span>/ </span><span class="units" style="color: #FF5E3A">0</span>
                                             </span>
                                          </div>
                                    </div>
                                    <div class="skills-item" style="margin-top: -15px">
                                       <div class="skills-item-info">
                                          <span class="skills-item-title"><span>Projects Completed</span> </span>
                                          <span class="skills-item-count" >
                                             <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                                             <span class="units">{{$target_user->projects_joined()->count()}}</span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="skills-item" style="margin-top: -15px">
                                       <div class="skills-item-info">
                                          <span class="skills-item-title"><span>Contests Entered</span> </span>
                                          <span class="skills-item-count" >
                                             <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                                             <span class="units">{{$target_user->contests_joined()->count()}}</span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="skills-item" style="margin-top: -15px">
                                       <div class="skills-item-info">
                                          <span class="skills-item-title"><span>Contests Won (1st)</span> </span>
                                          <span class="skills-item-count" >
                                             <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                                             <span class="units">{{$target_user->contests_win()->count()}}</span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="skills-item" style="margin-top: -15px">
                                       <div class="skills-item-info">
                                          <span class="skills-item-title"><span>Contests Placed (2nd, 3rd, 4th)</span> </span>
                                          <span class="skills-item-count" >
                                             <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                                             <span class="units">{{$target_user->contests_placed()->count()}}</span>
                                          </span>
                                       </div>
                                    </div>
                                    <div class="skills-item" style="margin-top: -15px">
                                       <div class="skills-item-info"><span class="skills-item-title"><span>Total Disputes</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$target_user->total_disputes}}</span></span></div>
                                    </div>
                                    <div class="skills-item" style="margin-top: -15px">
                                       <div class="skills-item-info"><span class="skills-item-title"><span>Disputes Won</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$target_user->disputes_win}}</span></span></div>
                                    </div>
                                    <div class="skills-item" style="border-bottom: solid 1px #E6ECF5;margin-top: -15px">
                                       <div class="skills-item-info"><span class="skills-item-title"><span>Disputes Lost</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$target_user->disputes_lose}}</span></span></div>
                                    </div>
                                    <div class="skills-item">
                                       <div class="skills-item-info"><span class="skills-item-title"><span >On Budget</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="90" data-from="0"></span><span class="units">90%</span></span></div>
                                       <div class="skills-item-meter" style="margin-top: -10px">
                                          <span class="skills-item-meter-active bg-blue seeker-bgcolor" style="width: 50%"></span>
                                       </div>
                                    </div>
                                    <div class="skills-item">
                                       <div class="skills-item-info"><span class="skills-item-title"><span >On Time Delivery</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="87" data-from="0"></span><span class="units">87%</span></span></div>
                                       <div class="skills-item-meter" style="margin-top: -10px">
                                          <span class="skills-item-meter-active bg-blue seeker-bgcolor" style="width: 87%"></span>
                                       </div>
                                    </div>
                                    <div class="skills-item" >
                                       <div class="skills-item-info"><span class="skills-item-title"><span >Completion Rate</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="98" data-from="0"></span><span class="units">98%</span></span></div>
                                       <div class="skills-item-meter" style="margin-top: -10px">
                                          <span class="skills-item-meter-active bg-blue seeker-bgcolor" style="width: 98%"></span>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="ui-block">
                           <div class="ui-block-title">
                              <h6 class="title">Skill Recommendations</h6>
                           </div>
                           <ul class="your-profile-menu" style="margin-top: 15px">
                              <div class="crumina-module crumina-heading with-title-decoration">
                                 <p class="heading-title"><font class="seeker-color" color="#515365">Websites, IT & Software</font></p>
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
                                 <p class="heading-title"><font class="seeker-color" color="#515365">Design, Media & Architecture</font></p>
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
                           <a href="#" class="more-comments">View more Recommendations <span>+</span></a>
                        </div>
                        <div class="ui-block" data-mh="pie-chart">
                           <div class="ui-block-title">
                              <div class="h6 title">User Engagement Statistics</div>
                              <a href="#" class="more">
                                 <svg class="olymp-three-dots-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                 </svg>
                              </a>
                           </div>
                           <div class="ui-block-content">
                              <div class="monthly-indicator-wrap">
                                 <div class="monthly-indicator">
                                    <a href="#" class="btn btn-control bg-blue">
                                       <svg class="olymp-like-post-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                                       </svg>
                                    </a>
                                    <div class="monthly-count">
                                       9855
                                       <span class="period">Profile Likes</span>
                                    </div>
                                 </div>
                                 <div class="monthly-indicator">
                                    <a href="#" class="btn btn-control bg-blue">
                                       <svg class="olymp-share-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                       </svg>
                                    </a>
                                    <div class="monthly-count">
                                       6721
                                       <span class="period">Profile Shares</span>
                                    </div>
                                 </div>
                                 <div class="monthly-indicator">
                                    <a href="#" class="btn btn-control bg-blue">
                                       <svg class="olymp-comments-post-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
                                       </svg>
                                    </a>
                                    <div class="monthly-count">
                                       2047
                                       <span class="period">Comments</span>
                                    </div>
                                 </div>
                                 <div class="monthly-indicator">
                                    <a href="#" class="btn btn-control bg-blue">
                                       <svg class="olymp-camera-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                       </svg>
                                    </a>
                                    <div class="monthly-count">
                                       1.536
                                       <span class="period">Showcase Upvotes</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="ui-block" data-mh="pie-chart">
                           <div class="ui-block-title">
                              <div class="h6 title">{{$target_user->full_name}} Engagement Statistics </div>
                              <a href="#" class="more">
                                 <svg class="olymp-three-dots-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                 </svg>
                              </a>
                           </div>
                           <div class="ui-block-content">
                              <div class="chart-with-statistic">
                                 <ul class="statistics-list-count">
                                    <li>
                                       <div class="points">
                                          <span>
                                          <span class="statistics-point bg-purple"></span>
                                          Posts
                                          </span>
                                       </div>
                                       <div class="count-stat">{{$target_user->total_jobs()}}</div>
                                    </li>
                                    <li>
                                       <div class="points">
                                          <span>
                                          <span class="statistics-point bg-breez"></span>
                                          Showcases
                                          </span>
                                       </div>
                                       <div class="count-stat">5630</div>
                                    </li>
                                    <li>
                                       <div class="points">
                                          <span>
                                          <span class="statistics-point bg-primary"></span>
                                          Comments
                                          </span>
                                       </div>
                                       <div class="count-stat">1498</div>
                                    </li>
                                    <li>
                                       <div class="points">
                                          <span>
                                          <span class="statistics-point bg-yellow"></span>
                                          Disputes
                                          </span>
                                       </div>
                                       <div class="count-stat">136</div>
                                    </li>
                                 </ul>
                                 <div class="chart-js chart-js-pie-color">
                                    <canvas id="pie-color-chart" width="180" height="180"></canvas>
                                    <div class="general-statistics">146
                                       <span>Last Month Posts</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Pagination -->
                  <!-- ... end Pagination -->
               </div>
               <div class="tab-pane fade" id="friend" role="tabpanel" aria-labelledby="friend-tab">
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <h6 class="title">Reviews</h6>
                     </div>
                     <div class="ui-block-content">
                        <div class="crumina-module crumina-heading with-title-decoration" style="margin-bottom: -26px">
                           <p class="heading-title"><font class="seeker-color" color="#515365">Average score {{$target_user->average_score}}</font></p>
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
                                           @foreach($review->ratings as $rating)
                                          <ul class="rait-stars" style="margin-bottom: 5px; margin-top: 10px">
                                            <li class="numerical-rating">{{rateToStar($rating->value)}}</li>
                                            <li class="numerical-rating" style="font-size: 10px; margin-right: 0px"><font color="#515365">{{$rating->name}}</font></li>
                                          </ul>
                                          @endforeach
                                          <div class="comment-content comment"> {{$review->content}}<br>
                                             ---<br>
                                             <font color="#515365">Skill Reccomendations:</font><br>
                                             <em>{{$review->skills()}}</em>
                                             </p>
                                          </div>
                                          <header class="comment-meta comments__header-review">
                                             <time class="published comments__time-review">{{$review->created_at->diffForHumans()}}</time>
                                             <cite class="fn url comments__author-review">
                                             <a href="javascript:;" rel="external" class=" ">{{$review->user_from->full_name}}</a>
                                             </cite>
                                          </header>
                                       </div>
                                    </div>
                                 </li>
                                 @endforeach
                              </ul>
                              <!-- ... end W-Personal-Info -->
                           </div>
                        </div>
                        <a href="javascript:;" class="more-comments">View more reviews <span>+</span></a>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills">
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <div class="h6 title">Skills & Completed Projects</div>
                     </div>
                     <div class="ui-block-content">
                        <div class="row">
                           @foreach($cats as $cat)
                           @if($cat->skills->count())
                           <div class="col col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                              <h6>{{$cat->name}}</h6>
                              @foreach($cat->skills as $skill)
                              <div class="checkbox">
                                 <label>
                                 {{$skill->name}} <font color="#38a9ff">({{$target_user->skillvoteby($skill->id)}})</font>
                                 </label>
                              </div>
                              @endforeach
                           </div>
                           @endif
                           @endforeach
                        </div>
                     </div>
                  </div>
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <div class="h6 title">Skills & Entered Contests</div>
                     </div>
                     <div class="ui-block-content">
                        <div class="row">
                           @foreach($cats as $cat)
                           @if($cat->skills->count())
                           <div class="col col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                              <h6>{{$cat->name}}</h6>
                              @foreach($cat->skills as $skill)
                              <div class="checkbox">
                                 <label>
                                 {{$skill->name}} <font color="#38a9ff">({{$target_user->contestsWithSkill($skill->id)}})</font>
                                 </label>
                              </div>
                              @endforeach
                           </div>
                           @endif
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile">
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <h6 class="title">About</h6>
                        @php
                           $edu = json_decode($target_user->get_usermeta('edu'));
                           $emp = json_decode($target_user->get_usermeta('emp'));
                        @endphp

                        <a href="#" class="more">
                           <svg class="olymp-three-dots-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                           </svg>
                        </a>
                     </div>
                     <div class="ui-block-content">
                        <div class="row">
                           <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                              <!-- W-Personal-Info -->
                              <ul class="widget w-personal-info item-block">
                                 <li>
                                    <span class="title">Occupation:</span>
                                    <span class="text">{{ ($target_user->get_usermeta('occupation')) ? $target_user->get_usermeta('occupation') : 'N/A' }}</span>
                                 </li>
                                 <li>
                                    <span class="title">Hourly Rate:</span>
                                    <span class="text">{{ ($target_user->get_usermeta('hourly_hire')) ? $target_user->get_usermeta('hourly_hire') : '0.00' }} USD</span>
                                 </li>
                                 <li>
                                    <span class="title">Email:</span>
                                    <a href="javascript:;" class="text">{{$target_user->email}}</a>
                                 </li>
                                 <li>
                                    <span class="title">Website:</span>
                                    <a href="javascript:;" class="text">{{ ($target_user->get_usermeta('website')) ? $target_user->get_usermeta('website') : 'N/A' }}</a>
                                 </li>
                                 <li>
                                    <span class="title">Phone Number:</span>
                                    <span class="text">{{$target_user->phone}}</span>
                                 </li>
                                 <li>
                                    <span class="title">About Me:</span>
                                    <span class="text">{{$target_user->get_usermeta('description') ?? 'N/A'}}</span>
                                 </li>
                              </ul>
                              <!-- ... end W-Personal-Info -->
                           </div>
                           <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                              <!-- W-Personal-Info -->
                              <ul class="widget w-personal-info item-block">
                                 <li>
                                    <span class="title">Birthday:</span>
                                    <span class="text">{{ isset($meta['birthday']) ? $meta['birthday'] : 'N/A' }}</span>
                                 </li>
                                 <li>
                                    <span class="title">Birthplace:</span>
                                    <span class="text">{{$target_user->get_usermeta('birthplace') ?? 'N/A'}}</span>
                                 </li>
                                 <li>
                                    <span class="title">Lives in:</span>
                                    <span class="text">{{$target_user->full_location ?? 'N/A'}}</span>
                                 </li>
                                 <li>
                                    <span class="title">Joined:</span>
                                    <span class="text">{{$target_user->joined ?? ''}}</span>
                                 </li>
                                 <li>
                                    <span class="title">Gender:</span>
                                    <span class="text">{{($target_user->sex == 1) ? 'Male' : 'Female'}}</span>
                                 </li>
                              </ul>
                              <div class="widget w-socials">
                                 <h6 class="title">Other Social Networks:</h6>
                                 @if($target_user->get_usermeta('facebook'))
                                 <a target="_blank" href="{{addhttp($target_user->get_usermeta('facebook'))}}" class="social-item bg-facebook">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    Facebook
                                 </a>
                                 @endif
                                 @if($target_user->get_usermeta('twitter'))
                                    <a href="{{addhttp($target_user->get_usermeta('twitter'))}}" class="social-item bg-twitter">
                                       <i class="fab fa-twitter" aria-hidden="true"></i>
                                       Twitter
                                    </a>
                                 @endif
                                 @if($target_user->get_usermeta('dribbble'))
                                    <a href="{{addhttp($target_user->get_usermeta('dribbble'))}}" class="social-item bg-dribbble">
                                       <i class="fab fa-dribbble" aria-hidden="true"></i>
                                       Dribbble
                                    </a>
                                 @endif
                              </div>
                              <!-- ... end W-Personal-Info -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <h6 class="title">Employment History</h6>
                     </div>
                     <div class="ui-block-content">
                        <div class="row">
                           @if($emp)
                              @foreach($emp as $em)
                                 <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <!-- W-Personal-Info -->
                                    <ul class="widget w-personal-info item-block">
                                       <li>
                                          <span class="title">{{$em->title}}</span>
                                          <span class="date">{{$em->time}}</span>
                                          <span class="text">{{$em->descrition}}</span>
                                       </li>
                                    </ul>
                                    <!-- ... end W-Personal-Info -->
                                 </div>
                              @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <h6 class="title">Education History</h6>
                        <a href="#" class="more">
                           <svg class="olymp-three-dots-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                           </svg>
                        </a>
                     </div>
                     <div class="ui-block-content">
                        <div class="row">
                           @if($edu)
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
                                    <!-- ... end W-Personal-Info -->
                                 </div>
                              @endforeach
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="ui-block">
                     <div class="ui-block-title">
                        <h6 class="title">Hobbies and Interests</h6>
                        <a href="#" class="more">
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
                              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                 <!-- W-Personal-Info -->
                                 <ul class="widget w-personal-info item-block">
                                    <li>
                                       <span class="title">{{$hnb}}</span>
                                       <span class="text">{{$target_user->get_usermeta(preg_replace("![^a-z0-9]+!i", "-", strtolower($hnb)))}}</span>
                                    </li>

                                 </ul>
                                 <!-- ... end W-Personal-Info -->
                              </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="desktop-container-panel" class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
            @include('myprofile.stats-nav')
         </div>
         <div class="menu">
            <div class="profile-settings-responsive">
               <a href="#" class="js-profile-settings-open profile-settings-open">
               <i class="fa fa-angle-right" aria-hidden="true"></i>
               <i class="fa fa-angle-left" aria-hidden="true"></i>
               </a>
               <div class="mCustomScrollbar" data-mcs-theme="dark">
                  @include('myprofile.stats-nav')
               </div>
            </div>


         </div>
      </div>
   </div>
@endsection
