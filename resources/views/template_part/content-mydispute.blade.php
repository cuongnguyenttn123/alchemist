<tr class="event-item">
  <td class="author">
    <div class="author-freshness" align="left">
      <span><span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px; vertical-align: top">Dispute ID:</span><span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$dispute->id}}</span>
        <a href="#" class="h6 title" style="padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$dispute->project->name}}</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><em style="font-size: 12px;">{{$dispute->milestone->title}} | ${{$dispute->milestone->percent_payment}}</em>
        </time>

  </span>
    </div>
  </td>
  <td class="author">
    <div class="event-author author-freshness inline-items" style="vertical-align: top;">
      <div class="author-thumb" style="position: sticky;">
        <a href="UserProfile-AboutMe.html" target="_blank">
          <img src="{{$dispute->versus->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">


          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">{{$dispute->versus->level}}</div></a>
      </div>
      <div class="author-freshness"><a href="UserProfile-AboutMe.html" target="_blank" class="h6 title" style="margin-top: -5px; font-size: 12px">{{$dispute->versus->full_name}} <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$dispute->versus->user_title}} | LV {{$dispute->versus->level}}</span></time>
      </div>
    </div>
  </td>
  <td class="upcoming">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="margin-top: -5px; font-size: 12px;color: #51537F">Dispute Status:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;color: #F01855 ">{{$dispute->dispute_status}}</span></time>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;color: #8891B6 ">Earned: </span><span style="font-size: 12px; ">  <span class="units"> <img src="svg-icons/Payment Method/insert-coin.svg" style="border-radius: 0%;width: 12px;margin-bottom: 2px;margin-right: 3px;margin-left: 3px "> </span></span> ${{$dispute->amount}} USD </time>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;color: #8891B6 ">Craft Credit: </span><span style="font-size: 12px; ">  <span class="units"> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 12px;margin-bottom: 2px;margin-right: 3px;margin-left: 3px "> </span></span> 0 </time>
      </div>
    </div>
  </td>
  <td class="estimate" style="">
    <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width " style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 12px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">M 01 | $300 USD<div class="ripple-container"></div></a>
    <div id="accordion" role="tablist" aria-multiselectable="true" style="">
      <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
        <div class="card-header" role="tab" id="headingOne" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
          <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1-{{$dispute->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
              <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Dispute Details</span>
              <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
            </a>
          </h6>
        </div>

        <div id="collapseOne-1-{{$dispute->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">

          <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card" style="">
              <div class="card-header" role="tab" id="headingOne" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;margin-top: 8px;padding-top: 10px; padding-bottom: 11px; ">
                <h6 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2-{{$dispute->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed"><img src="svg-icons/JobCard/download.svg" width="15" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px">
                    <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">Stake Details</span>
                    <svg class="olymp-dropdown-arrow-icon c-white"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                  </a>
                </h6>
              </div>

              <div id="collapseOne-2-{{$dispute->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="margin-left: -1px;">
                <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                  <div class="ui-block-content" style="padding-bottom: 5px">

                    <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span>Milestone</span></span> <span class="skills-item-count"><span class="units">M1 20% | $300 </span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 15px; vertical-align: top"></span></div>

                    <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span>Total Staked</span> </span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">300 CC</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 15px; vertical-align: top"></span></div>

                    <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span>Your Stake</span> </span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">120 / 300 CC</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 15px; vertical-align: top"></span></div>
                    <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span>Win Dispute (5%)</span></span><span class="skills-item-count"><span class="units">114 CC</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 15px; vertical-align: top"> <img src="svg-icons/Like-Dislike/up-arrow.svg" style="border-radius: 0%;width: 15px; vertical-align: top"></span></div>
                    <div class="skills-item-info" style="margin-top: 15px;margin"><span class="skills-item-title"><span>Lose Dispute (100%)</span> </span>  <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span> - <span class="units">120 CC</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 15px; vertical-align: top"> <img src="svg-icons/Like-Dislike/down-arrow.svg" style="border-radius: 0%;width: 15px; vertical-align: top"> </span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
              <div class="card-header" role="tab" id="headingOne" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;margin-top: 8px;padding-top: 10px; padding-bottom: 11px; ">
                <h6 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-3-{{$dispute->id}}" aria-expanded="true" aria-controls="collapseOne" class=""><img src="svg-icons/menu/target-square.svg" width="15" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px">
                    <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">Potential Earnings</span>
                    <svg class="olymp-dropdown-arrow-icon c-white"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                  </a>
                </h6>
              </div>
              <div id="collapseOne-3-{{$dispute->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="margin-left: -1px;">
                <div class="ui-block" style="margin: 8px 0px 1px 0px; padding: 0px 0px -0px 0px ">
                  <div class="ui-block-content" style="padding-bottom: 5px">
                    @if($user->is_seeker())
                      @for($i=0; $i<=5; $i++)
                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px">
                          <span class="skills-item-title">
                            <span>{{$i}}/5 Votes ({{$i/5*100}}%)</span>
                          </span>
                              <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0">
                            </span><span class="units">Win ${{(5-$i)/5*$dispute->amount}}</span>
                          </span>
                        </div>
                      @endfor
                    @else
                      @for($i=0; $i<=5; $i++)
                        <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px">
                      <span class="skills-item-title"><span>{{$i}}/5 Votes ({{$i/5*100}}%)}}</span>
                      </span>
                          <span class="skills-item-count">
                        <span class="units">Win ${{$i/5*$dispute->amount}}</span>
                      </span>
                        </div>
                      @endfor
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </td>
   <td class="add-event align-center" style="vertical-align: top">
      <a href="{{$dispute->permalink()}}" class="btn btn-smoke btn-sm" style="background-image: linear-gradient(#57596E, #3F4257);font-weight: 400">DISPUTE PANEL
         <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px">
      </a>
      @if($dispute->is_decision)
            @if(!$user->is_seeker())
               @include('dispute.decision-alchemist')
            @endif
            @if($user->is_seeker())
               <a href="javascript:;" class="btn btn-sm btn-border-think c-grey btn-transparent" data-toggle="collapse" data-target="#dec-{{$dispute->id}}" aria-expanded="true">Make Decision</a>
                  </div>
               <div id="dec-{{$dispute->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20">
                  @include('dispute.decision-seeker')
               </div>
            @endif
      @endif
   </td>
</tr>
