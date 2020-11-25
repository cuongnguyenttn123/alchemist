<div class="container" style="margin-top: 0px; margin-bottom: 0px; padding-top: 30px; background-color: ; padding-bottom: 0px; border-top-style: solid; border-bottom-style: solid; border-width: 0px; border-color: #ECF1F5;">
    <div class="chart-text">
        <div class="crumina-module crumina-counter-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="counter-numbers counter h5" style="font-size: 35px; margin-bottom: 10px">
                <div class="units">
                    <div><font color="#515365">LEVEL</font></div>
                    <span data-speed="2000" data-refresh-interval="{{$target_user->level}}" data-to="{{$target_user->level()}}" data-from="1" style="color: #90CB1E; padding-bottom: 10px; padding-top: 10px">{{$target_user->level()}}</span>
                </div>
            </div>
            <h6>{{$rolename}} TIER 0{{$target_user->user_tier()}}: <font color="#9ACF32">{{$target_user->user_title}}</font></h6>
        </div>
        <div class="ui-block-content" style="margin-bottom: -35px; margin-top: -10px">
            <div class="chart-with-statistic" style="position: relative;">
                <div class="circle-progress circle-pie-chart" >
                    <div class="pie-chart" data-value="{{$target_user->percent_tier()}}" data-startcolor="#9fd734" data-endcolor="#71a927" >
                        <div class="top-header-author" align="center" style="width: 185px; height: 185px; margin-top: 5px">
                            <div class="content" align="center" style="font-size: 17px; font-weight: 700; color: #90CB1E; margin-top: 75px"><span>%</span></div>
                            <img class="author" src="{{asset('public/frontend/img/bigcricle.png')}}" alt="Skill Level" style="width: 200px; height: auto; margin-top: -17px">


                            <div class="counter-title" style=" line-height: 18px; margin-top: 30px; height: 300px; font-size: 15px" >Tier 0{{$target_user->user_tier()}} | Level Progress</div>
                            <div class="label-avatar " style="margin-right: 68px; margin-top: 73px; width: 50px; height: 50px; padding-top: 5px; padding-right: 1px; font-weight: 900; border-style: solid;
                                border-width: 0px;"><font style="color: #FFFFFF; font-size: 15px;">LV.{{$target_user->level}}</font></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="ui-block-content inline-items" style="margin-top: -60px; margin-bottom: -30px" >
    <div class="circle-progress circle-pie-chart-sm inline-items" align="center" style="width: 115px">
        <img class="author" src="img/Alchemist LEVEL/TIER-01/Alchemist-Tier 01-LV5 (1ST).svg" alt="Skill Level" style="margin-bottom: -105px; width: 75px" >
        <div class="pie-chart" data-value="1.0" data-startcolor="#90CB1E" data-endcolor="#78B10A" data-border= 20px>
            <div class="content" align="center" style="font-size: 17px; font-weight: 700; color: #90CB1E"><span>%</span></div>
            <div class="counter-title" style=" line-height: 18px;" >LEVEL 05</div>
        </div>
    </div>
    <div class="circle-progress circle-pie-chart-sm inline-items" align="center" style="width: 115px">
        <img class="author" src="img/Alchemist LEVEL/TIER-01/Alchemist-Tier 01-LV10 (2nd).svg" alt="Skill Level" style="margin-bottom: -105px; width: 75px" >
        <div class="pie-chart" data-value="1.0" data-startcolor="#90CB1E" data-endcolor="#78B10A" data-border= 20px>
            <div class="content" align="center" style="font-size: 17px; font-weight: 700; color: #90CB1E"><span>%</span></div>
            <div class="counter-title" style=" line-height: 18px;" >LEVEL 10</div>
        </div>
    </div>
    <div class="circle-progress circle-pie-chart-sm inline-items" align="center" style="width: 115px">
        <img class="author" src="img/Alchemist LEVEL/TIER-01/Alchemist-Tier 01-LV15(3rd).svg" alt="Skill Level" style="margin-bottom: -105px; width: 75px" >
        <div class="pie-chart" data-value="0.70" data-startcolor="#90CB1E" data-endcolor="#78B10A" data-border= 20px>
            <div class="content" align="center" style="font-size: 17px; font-weight: 700; color: #90CB1E"><span>%</span></div>
            <div class="counter-title" style=" line-height: 18px;" >LEVEL 15</div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 0px; margin-bottom: 40px; padding-top: 30px; padding-bottom: 30px; border-top-style: solid; border-bottom-style: solid;
    border-width: 0px; border-color: #ECF1F5;">
    <div class="counter-title" align="center" style="margin-bottom: -22px
        " >
        <font color="#3F8DEF">{{$pointname = $target_user->pointname}} </font>LV {{$target_user->level}} | {{$target_user->total_point}} &gt; {{$target_user->next_level_point}} | LV {{$target_user->level()+1}}
    </div>
    <div class="row" style="margin-top:15px">
        <!-- Counter Item -->
        <!-- ... end Counter Item -->
        <div class="crumina-module col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 no-padding" style="margin-left: 57px">
            <div class="skills-item">
                <div class="skills-item-meter" style="height: 23px; margin-top: 11px; background-color: #62A1ED; border-style: solid;border-width: 0px; border-color: #707070">
                    <span class="skills-item-meter-active bg-purple " style=" margin-top: 14px; height: 10px; width: 70%; background-color: #E2E2E3; "></span>
                </div>
                <div class="skills-item-meter" style="height: 23px; margin-top: 0px; background-color: #FF9600; border-style: solid;border-width: 0px; border-color: #707070 ">
                    <span class="skills-item-meter-active bg-purple " style=" margin-top: 14px; height: 10px; width: 30%; background-color: #E2E2E3;"></span>
                </div>
            </div>
        </div>
        <!-- Counter Item -->
        <!-- ... end Counter Item -->
        <div class="crumina-module col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" style="bottom: 70px;left: -13px;">
            <img class="author" src="img/Diamond-Apprentice-small.svg" alt="Skill Level" >
            <div class="label-avatar " style="margin-right: 31px; margin-top: 22px; width: 30px; height: 30px; padding-top: 7px; padding-right: 0px; background-color: #707070  "><font style="color: #FFFFFF; font-size: 13px; ">{{$target_user->level}}</font></div>
        </div>
        <!-- Counter Item -->
        <div class="crumina-module crumina-counter-item col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" style="bottom: 70px;right: -183px;">
            <img class="author" src="img/Diamond-Apprentice-small.svg" alt="Skill Level">
            <div class="label-avatar " style="margin-right: 31px; margin-top: 22px; width: 30px; height: 30px; padding-top: 7px; padding-right: 0px; background-color: #707070  "><font style="color: #FFFFFF; font-size: 13px; ">{{$target_user->level+1}}</font></div>
        </div>
        <!-- ... end Counter Item -->
    </div>
    <div class="counter-title" align="center" style="margin-top: -15px;"><font color="#7BB40B">RP </font>LV {{$target_user->rp_level}} | {{$target_user->total_rp()}} &gt; {{$target_user->rp_next_level_point}} | LV {{$target_user->rp_level+1}}</div>
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
                <span data-speed="2000" data-refresh-interval="15" data-to="260" data-from="0">{{$target_user->total_point()}}</span>
                <div class="units" style="color: #F7F7F9">
                    <div><font color="#3F8DEF">{{$pointname}}</font></div>
                </div>
            </div>
            <div class="counter-title" style=" line-height: 18px">Skill Based Points<br> Level {{$target_user->level}}</div>
        </div>
        <!-- Counter Item -->
        <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="counter-numbers counter h5" style="font-size: 20px; margin-bottom: 5px">
                <div class="" style="margin-right: 5px; margin-bottom: 5px">
                    <img src="img/medal.svg" alt="author" width="30" style="padding-bottom: 3px; ">
                </div>
                <span data-speed="2000" data-refresh-interval="15" data-to="{{$target_user->total_rp()}}" data-from="0">{{$target_user->total_rp()}}</span>
                <div class="units">
                    <div><font color="#FF9600">RP</font></div>
                </div>
            </div>
            <div class="counter-title" style="line-height: 18px">Reputation Points</strong> <br>
                Level {{$target_user->rp_level}}
            </div>
        </div>
        <!-- ... end Counter Item -->
    </div>
</div>
<div class="container" style="margin-top: -60px; margin-bottom: 30px; border-bottom-style: solid;
    border-width: 0px; border-color: #ECF1F5 ">
    @include('template_part.content-userpoints', ['user'=>$target_user])
</div>
<div class="container" style="margin-top: -20px; margin-bottom: 0px; border-bottom-style: solid;
    border-width: 0px; border-color: #ECF1F5">
    <div class="ui-block-content">
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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-25" aria-expanded="true" aria-controls="collapseOne-25" class="collapsed">
                                    <img src="img/star (2).svg" width="15" hspace="1" style="margin-left: -10px; margin-right: 5px; padding-bottom: 3px"> Recent <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">Ratings</span>
                                    <svg class="olymp-dropdown-arrow-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                    </svg>
                                </a>
                            </p>
                        </div>
                        <div id="collapseOne-25" class="collapse" role="tabpanel" aria-labelledby="headingOne-25">
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
                                    </ul>
                                    <a href="#" class="more-comments">View more reviews <span>+</span></a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <p class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-26" aria-expanded="true" aria-controls="collapseOne-24" class="collapsed">
                                    <img src="img/secure.svg" width="15" hspace="1" style="margin-left: -11px; margin-right: 6px; padding-bottom: 3px">
                                    <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">Skill Recomendations </span>
                                    <svg class="olymp-dropdown-arrow-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                    </svg>
                                </a>
                            </p>
                        </div>
                        <div id="collapseOne-26" class="collapse" role="tabpanel" aria-labelledby="headingOne-24">
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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-23" aria-expanded="true" aria-controls="collapseOne-23" class="collapsed">
                                    <img src="img/graduate-cap.svg" width="18" hspace="1" style="margin-left: -13px; margin-right: 5px; ">
                                    <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">Exam Results / Level</span>
                                    <svg class="olymp-dropdown-arrow-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                    </svg>
                                </a>
                            </p>
                        </div>
                        <div id="collapseOne-23" class="collapse" role="tabpanel" aria-labelledby="headingOne-23">
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
            </div>
            <!-- ... end Your Profile  -->
        </div>
    </div>
</div>
