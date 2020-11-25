<div id="accordion" role="tablist" aria-multiselectable="true" >
  <div class="card">
    <div class="card-header" role="tab" id="headingOne-1" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
      <h6 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$user->id}}" aria-expanded="true" aria-controls="collapseOne-{{$user->id}}">
          <img src="svg-icons/Alchemist Info/info.svg " width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
          <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> @if(isset($content)) Seeker @endif Information </span>
          <svg class="olymp-dropdown-arrow-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
          </svg>
        </a>
      </h6>
    </div>
    <div id="collapseOne-{{$user->id}}" class="collapse " role="tabpanel" aria-labelledby="headingOne-1">
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne-1-1" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
            <h6 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$user->id}}-1" aria-expanded="true" aria-controls="collapseOne-{{$user->id}}-1">
                <img src="svg-icons/Alchemist Info/thunderbolt.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Points</span>
                <svg class="olymp-dropdown-arrow-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                </svg>
              </a>
            </h6>
          </div>
          <div id="collapseOne-{{$user->id}}-1" class="collapse " role="tabpanel" aria-labelledby="headingOne-1-1">
            <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5" >
              <form class="w-search" >
                <div class="col col-lg-12 col-12 no-padding" align="center">
                  <div class="friend-count" style="margin-top: 20px;" data-swiper-parallax="-500">
                    <a href="#" class="friend-count-item">
                      <div class="h6">2342</div>
                      <div class="title">{{($user->rolename == 'Seeker') ? 'Seeker' : 'Skill Based'}} Pts</div>
                    </a>
                    <a href="#" class="friend-count-item">
                      <div class="h6">1456</div>
                      <div class="title">Reputation Pts</div>
                    </a>
                  </div>
                  <div class="friend-count" data-swiper-parallax="-500">
                    <a href="#" class="friend-count-item">
                      <div class="h6">32</div>
                      <div class="title">Site Posts</div>
                    </a>
                    <a href="#" class="friend-count-item">
                      <div class="h6">32</div>
                      <div class="title">Upvotes</div>
                    </a>
                    <a href="#" class="friend-count-item">
                      <div class="h6">30</div>
                      <div class="title">Downvotes</div>
                    </a>
                  </div>
                  <div class="friend-count" data-swiper-parallax="-500">
                    <a href="#" class="friend-count-item">
                      <div class="h6">22</div>
                      <div class="title">Badges</div>
                    </a>
                    <a href="#" class="friend-count-item">
                      <div class="h6">32</div>
                      <div class="title">Likes</div>
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne-1-2" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
            <h6 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$user->id}}-2" aria-expanded="true" aria-controls="collapseOne-{{$user->id}}-2">
                <img src="svg-icons/Alchemist Info/graph-pie.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Work Statistics </span>
                <svg class="olymp-dropdown-arrow-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                </svg>
              </a>
            </h6>
          </div>
          <div id="collapseOne-{{$user->id}}-2" class="collapse " role="tabpanel" aria-labelledby="headingOne-1-2">
            <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5" >

              <form class="w-search" >
                <div class="col col-lg-12 col-12 no-padding">
                  <div class="skills-item" >
                    <div class="skills-item-info"><span class="skills-item-title"><span >Reviews (Done/Incomplete)</span> </span>
                      <span class="skills-item-count" >
                                    <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                                    <span class="units" style="color: #90CB1E">{{$user->reviews()->count()}}</span>
                                    <span>/ </span>
                                    <span class="units" style="color: #FF5E3A">0</span>
                                 </span>
                    </div>
                  </div>
                  @if($user->rolename == 'Seeker')
                    <div class="skills-item" style="margin-top: -5px">
                      <div class="skills-item-info"><span class="skills-item-title"><span>Total Projects Posted</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->projects_joined()->count()}}</span></span></div>
                    </div>
                    <div class="skills-item" style="margin-top: -5px">
                      <div class="skills-item-info"><span class="skills-item-title"><span>Total Contests Posted</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->contests_joined()->count()}}</span></span></div>
                    </div>
                  @else
                    <div class="skills-item" style="margin-top: -5px">
                      <div class="skills-item-info"><span class="skills-item-title"><span>Projects Completed</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->projects_joined()->count()}}</span></span></div>
                    </div>
                    <div class="skills-item" style="margin-top: -5px">
                      <div class="skills-item-info"><span class="skills-item-title"><span>Contests Entered</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->contests_joined()->count()}}</span></span></div>
                    </div>
                    <div class="skills-item" style="margin-top: -5px">
                      <div class="skills-item-info"><span class="skills-item-title"><span>Contests Won (1st)</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->contests_win()->count()}}</span></span></div>
                    </div>
                    <div class="skills-item" style="margin-top: -5px">
                      <div class="skills-item-info"><span class="skills-item-title"><span>Contests Placed (2nd, 3rd, 4th)</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->contests_placed()->count()}}</span></span></div>
                    </div>
                  @endif

                  <div class="skills-item" style="margin-top: -5px">
                    <div class="skills-item-info"><span class="skills-item-title"><span>Total Disputes</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->total_disputes}}</span></span></div>
                  </div>
                  <div class="skills-item" style="margin-top: -5px">
                    <div class="skills-item-info"><span class="skills-item-title"><span>Disputes Won</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->disputes_win}}</span></span></div>
                  </div>
                  <div class="skills-item" style="border-bottom: solid 1px #E6ECF5;margin-top: -5px">
                    <div class="skills-item-info"><span class="skills-item-title"><span>Disputes Lost</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$user->disputes_lose}}</span></span></div>
                  </div>

                  @if($user->rolename == 'Seeker')

                    <div class="skills-item">
                      <div class="skills-item-info"><span class="skills-item-title"><span >On Time Payments</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="90" data-from="0"></span><span class="units">90%</span></span></div>
                      <div class="skills-item-meter" style="margin-top: -10px">
                        <span class="skills-item-meter-active bg-blue" style="width: 50%"></span>
                      </div>
                    </div>
                  @else
                    <div class="skills-item">
                      <div class="skills-item-info"><span class="skills-item-title"><span >On Budget</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="90" data-from="0"></span><span class="units">90%</span></span></div>
                      <div class="skills-item-meter" style="margin-top: -10px">
                        <span class="skills-item-meter-active bg-blue" style="width: 50%"></span>
                      </div>
                    </div>
                    <div class="skills-item">
                      <div class="skills-item-info"><span class="skills-item-title"><span >On Time Delivery</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="87" data-from="0"></span><span class="units">87%</span></span></div>
                      <div class="skills-item-meter" style="margin-top: -10px">
                        <span class="skills-item-meter-active bg-blue" style="width: 87%"></span>
                      </div>
                    </div>
                  @endif

                  <div class="skills-item">
                    <div class="skills-item-info"><span class="skills-item-title"><span >Completion Rate</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="87" data-from="0"></span><span class="units">87%</span></span></div>
                    <div class="skills-item-meter" style="margin-top: -10px">
                      <span class="skills-item-meter-active bg-blue" style="width: 87%"></span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne-1-3" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
            <h6 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$user->id}}-3" aria-expanded="true" aria-controls="collapseOne-{{$user->id}}-3">
                <img src="svg-icons/sprites/star-icon.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Review Statistics </span>
                <svg class="olymp-dropdown-arrow-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                </svg>
              </a>
            </h6>
          </div>
          <div id="collapseOne-{{$user->id}}-3" class="collapse " role="tabpanel" aria-labelledby="headingOne-1-3">
            <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
              <div class="ui-block-title" style="border: none;padding-left: 20px;padding-right: 20px;border-top-width: 0px;border-bottom-color: #E6ECF5">
                <div class="ui-block-content" style="margin: 0px;" >
                  <div class="crumina-module crumina-heading with-title-decoration " style="margin-bottom: 5px;" >
                    <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Average Rating: <?php echo e(number_format((float)$user->rating, 1, '.', '')); ?></h6>
                  </div>
                  <div class="skills-item inline-items" style="margin-bottom: 10px">
                    <span style="color: #515365;font-size: 13px;font-weight: 500">
                      <img src="svg-icons/Rating/thumbs-up.svg" width="15" hspace="1" style="padding-bottom: 3px; margin-left: 0px; margin-right: 5px;">
                      Recommended
                    </span>
                    <br>
                    <div class="rating-box infomation-bis">
                      <div class="rating" style="width:{{$user->ratingDetail['hire_again']*20}}%;"></div>
                    </div>

                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$user->ratingDetail['hire_again'], 1, '.', '')}}</span>

                    </div>
                  </div>
                  <div class="skills-item inline-items" style="margin-bottom: 10px">
                    <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/JobCard/star-icon.svg" width="14" hspace="1" style="padding-bottom: 3px; margin-left: 0px; margin-right: 5px;"> Work Quality</span><br>
                    <div class="rating-box infomation-bis">
                      <div class="rating" style="width:{{$user->ratingDetail['work_quality']*20}}%;"></div>
                    </div>
                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$user->ratingDetail['work_quality'], 1, '.', '')}}</span>
                    </div>
                  </div>
                  <div class="skills-item inline-items" style="margin-bottom: 10px">
                    <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/chat.svg" width="15" hspace="1" style="padding-bottom: 3px; margin-left: 0px; margin-right: 5px;"> Communication</span><br>
                    <div class="rating-box infomation-bis">
                      <div class="rating" style="width:{{$user->ratingDetail['communication']*20}}%;"></div>
                    </div>

                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$user->ratingDetail['communication'], 1, '.', '')}}</span>

                    </div>
                  </div>
                  <div class="skills-item inline-items" style="margin-bottom: 10px">
                    <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/testing.svg" width="15" hspace="1" style="padding-bottom: 3px; margin-left: 0px; margin-right: 5px;"> Organisation</span><br>
                    <div class="rating-box infomation-bis">
                      <div class="rating" style="width:{{$user->ratingDetail['organisation']*20}}%;"></div>
                    </div>

                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$user->ratingDetail['organisation'], 1, '.', '')}}</span>

                    </div>
                  </div>
                  <div class="skills-item inline-items" style="margin-bottom: 10px">

                    <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/portfolio.svg" width="15" hspace="1" style="padding-bottom: 3px;vertical-align: reset; margin-left: 0px; margin-right: 5px;"> Professionalism</span><br>
                    <div class="rating-box infomation-bis">
                      <div class="rating" style="width:{{$user->ratingDetail['professionalism']*20}}%;"></div>
                    </div>

                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$user->ratingDetail['professionalism'], 1, '.', '')}}</span>

                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
      @if($user->rolename == 'Alchemist')
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne-1-4" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$user->id}}-4" aria-expanded="true" aria-controls="collapseOne-{{$user->id}}-4">
                  <img src="svg-icons/Alchemist Info/picture.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                  <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Featured Portfolio </span>
                  <svg class="olymp-dropdown-arrow-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
                </a>
              </h6>
            </div>
            <div id="collapseOne-{{$user->id}}-4" class="collapse " role="tabpanel" aria-labelledby="headingOne-1-4">
                  <?php
                  $listImage = $user->feature_images;
                  ?>
                  @if( !empty($listImage->toArray()))
                      <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                        <div class="ui-block-title" style="border: none;padding-left: 20px;padding-right: 20px;border-top-width: 0px;border-bottom-color: #E6ECF5">
                          <div class="ui-block-content" style="margin: 0px;" >
                        <div class="row">
                          <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                            <ul class="widget w-last-photo js-zoom-gallery">
                              @foreach($listImage as $image)
                                <li>
                                  <a href="{{$image->url}}">
                                    <img src="{{$image->url}}" alt="photo">
                                  </a>
                                </li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>
                  @else
                      <div class="ui-block margintop10 padding0">
                        <div class="ui-block-content">

                          <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                            <a data-toggle="modal" data-target=""></a>

                            <div class="content" style="margin-top: 10px">

                              <a class="btn btn-control bg-secondary" data-toggle="modal" data-target="" style="margin: auto;">
                                <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                              </a>

                              <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Files Added</a>
                              <span class="sub-title">Add reference files to attract Alchemists!</span>

                            </div>

                          </div>
                        </div><table class="shop_table cart" style="width: 100%">
                          <thead style="background-color: white;">
                          <tr> </tr>

                          </thead>
                          <tbody class="alldownload">
                          </tbody>
                        </table>
                      </div>
                  @endif
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
