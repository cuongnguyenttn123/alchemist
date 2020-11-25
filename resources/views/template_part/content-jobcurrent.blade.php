<?php
  $listmilestone = $project->bidwon->milestones;
  
  $mil =  $listmilestone[count($listmilestone) -1];
   for($i = 0; $i < count($listmilestone) -2; $i++){
     if ($listmilestone[$i+1]->status_name == 'Locked'){
       $mil =  $listmilestone[$i];
       break;
     }
   }
?>
<tr class="event-item jobcurrent">
  <td class="author">
    <div class="author-freshness" align="left">
      <span>
        <span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px">Project ID:</span>
        <span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$project->id}}</span>
        <a href="{{$project->permalink()}}" class="h6 title" style="font-weight: 700 !important; color: #51537F; padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$project->name}}</a>
          <time class="entry-date updated" datetime="2017-06-24T18:18">
            <em style="font-size: 12px;">{{$project->catname}}</em>
          </time>
          <time class="entry-date updated" datetime="2017-06-24T18:18">
            <em style="font-size: 12px;">{{$project->skillname}}</em>
          </time>
      </span>
    </div>
  </td>
  <td class="author">
    <div class="event-author author-freshness inline-items" style="vertical-align: top;">
      <div class="author-thumb" style="position: sticky;">
        <a href="UserProfile-AboutMe.html" target="_blank">
          <img src="{{$project->user_won->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">


          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">{{$project->user_won->level}}</div></a>
      </div>
      <div class="author-freshness"><a href="UserProfile-AboutMe.html" target="_blank" class="h6 title" style="font-weight: 700;color: #51537F; margin-top: -5px; font-size: 12px">{{$project->user_won->full_name}} <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$project->user_won->user_title}} | LV {{$project->user_won->level}}</span></time>

      </div>



    </div>
  </td>
  <td class="upcoming">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="font-weight: 700; margin-top: -5px; font-size: 12px;color: #51537F">Agreed Price:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">${{$project->bidwon->price}} USD</span></time>
      </div>
    </div>
  </td>
  <td class="description">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="font-weight: 700; margin-top: -5px; font-size: 12px;color: #51537F">DeadLine:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$project->deadline()}}</span></time>
      </div>
    </div>
  </td>
  <td class="estimate">
    <a href="javascript:;" class=" post-cat milestone-color-defaut-bg post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style="color: #ffffff">MILESTONES | {{$mil->status_name}}</a>
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card">
        <div class="card-header paddingtop10 paddingbottom10 border-top-radius" role="tab" id="headingOne-20">
          <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#listms-{{$project->id}}" aria-expanded="true" aria-controls="collapseOne">
              <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1" class="marginleft-5 paddingbottom3">
              <span class="color-1 fontsize-13 fontweight-400">Milestones</span>
              <svg class="olymp-dropdown-arrow-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
              </svg>
            </a>
          </h6>
        </div>
        <div id="listms-{{$project->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20">
          @foreach($project->bidwon->milestones as $key => $ms)
            <?php
            $color = '';
            $back_color = '';
            switch ($ms->status_name){
              case 'Completed':
                $color = 'milestone-color-gree';
                $back_color = 'milestone-color-gree-bg';
                break;
              case 'Waiting':
                $color = 'milestone-color-waiting';
                $back_color = 'milestone-color-waiting-bg';
                break;
              case 'Block':
                $color = 'milestone-color-block';
                $back_color = 'milestone-color-block-bg';
                break;
              case 'Underway':
                $color = 'milestone-color-troi';
                $back_color = 'milestone-color-troi-bg';
                break;
              case 'Payment Due':
                $color = 'milestone-color-hong';
                $back_color = 'milestone-color-hong-bg';
                break;
              case 'Created':
                $color = 'milestone-color-create';
                $back_color = 'milestone-color-waiting-bg';
                break;
              case 'Early Release':
                $color = 'milestone-color-yellow';
                $back_color = 'milestone-color-yellow-bg';
                break;
              default:
                $color = 'milestone-color-defaut';
                $back_color = 'milestone-color-defaut-bg';
               
            }
            ?>
            <div id="accordion" role="tablist" aria-multiselectable="true">
              <div class="card">
                <a href="javascript:;" class="post-category {{$back_color}} color-fff border-top-radius-5 border-bottom-radius paddingtop10 paddingbottom10 margintop10 marginbottom-5 fontsize-11 fontweight-500 full-width align-center">milestone 0{{++$key}} | {{$status = $ms->status_name}}</a>
                <div class="card-header paddingtop10 paddingbottom10 border-top-radius margintop5" role="tab" id="headingOne" >
                  <h6 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#ms-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne">
                      <img src="svg-icons/JobCard/{{$ms->color_and_background[2]}}" width="18" hspace="1">
                      <span class="fontweight-400 fontsize-13 color-4 ">{{$ms->percent_payment}}% | ${{$price_bid = $ms->price_bid}}</span>
                      <svg class="olymp-dropdown-arrow-icon c-white">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                      </svg>
                    </a>
                  </h6>
                </div>
                <div id="ms-{{$ms->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="ui-block border-width margintop10 marginbottom-0 padding0" data-mh="pie-chart">
                    <div class="ui-block-content paddingtop15 paddingright20 paddingleft20 paddingbottom-0">
                      <div class="skills-item">
                        <div class="skills-item-info">
                          <span class="skills-item-title">
                            <span class="color-2 fontsize-13 fontweight-500">

                              <?php
                              $workday = $ms->workday;
                              $checkphantram = $ms->percent_work;
                              if ($status == 'Completed'){
                                $checkphantram = 100;
                                $day = $ms->workday;
                                $daytotal = $ms->bid->work_time;
                              }
                              $workdayms =  $ms->total_days;
                              $totalBid = $ms->bid->total_workdays;
                              $workdaymsSt = $workdayms;
                              if ($workdayms > $workday){
                                $workdaymsSt = $workday." <span style='color: red'>(+".($workdayms-$workday).")</span>";
                              }
                              if ($totalBid > $ms->bid->work_time){
                                $totalBid = $ms->bid->work_time." <span style='color: red'>(+".($totalBid-$ms->bid->work_time).")</span>";
                              }
                              ?>
                                {!! $workdaymsSt !!}/{{$workday}} Days | Total {!! $totalBid !!}/{{$ms->bid->work_time}}</span>
                          </span>
                          <span class="skills-item-count color-2 fontsize-13 fontweight-500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="50" data-from="0"></span>
                            <span class="units">{{$checkphantram}}%</span></span></div>
                        <div class="skills-item-meter">
                          <span class="skills-item-meter-active {{$back_color}}" style="width:{{$checkphantram}}%; max-width: 100%; opacity: 1;"></span>
                        </div>
                      </div>
                      <div class="skills-item">
                         <span><span><img src="svg-icons/JobCard/timer.svg" width="18" hspace="1"><span class="color-2 fontsize-13 fontweight-500"> Deadline</span>
                         </span><span class="fontsize-12 fontweight-400">{{$project->deadline()}}</span>
                      </div>
                      <div class="skills-item">
                                 <span><span><img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1"><span class="color-2 fontsize-13 fontweight-500"> Price</span>
                                 </span><span class="fontsize-12 fontweight-400">${{$price_bid}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </td>
  <td class="add-event align-center">
    <a target="_blank" href="{{$project->urlTracking()}}" class="btn btn-smoke btn-sm bg-img-57596E-3F4257 fontweight-400" style="margin-bottom: 2px; padding: .4rem 1.7rem;">TRACKER <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1"></a>
    <a href="{{$project->urlTracking()}}" data-toggle="modal" class="btn btn-purple btn-sm btn-icon-left bg-img-6F7CC3-646FAB fontweight-400" style="margin-top: 13px;padding: .4rem 1.7rem;"><i class="fa fa-comments" aria-hidden="true"></i>Messages ({{$project->messages->count()}})</a>
  </td>
</tr>
