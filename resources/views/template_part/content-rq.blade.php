
<tr class="event-item">
    <?php $project = $rq->project;?>
     <td class="author">
      <div class="author-freshness" align="center">
         <span><span class="color-2 fontsize-14 fontweight-500 marginright5">Project ID:</span><span class="fontsize-14">{{$project->id}}</span></button>
         <a href="javascript:;" class="h6 title fontweight-500">{{$project->name}}</a>
         <time class="entry-date updated"><em class="fontsize-12">{{$project->catname}}</em></time>
         <br>
         <time class="entry-date updated"><em class="fontsize-12">{{$project->skillname}}</em></time>
      </div>
     </td>
     <td class="alchemit-col freshness inline-items" align="center">
      <div class="author-freshness margintop-5">
      	{!!$project->user_won->getAvatarImgAttribute(36)!!}
         <br>
         <a href="javascript:;" class="h6 title margintop-5">{{$project->user_won->full_name}} <img src="svg-icons/Flags/country-code/{{$user->location->country_code}}.svg" class="olymp-heart-icon avatarplag"></a>
         <time class="entry-date updated" datetime="2017-06-24T18:18" ><span class="fontsize-12">{{$project->user_won->user_title}} | LV {{$project->user_won->level}}</span></time>
      </div>
     </td>
     <td class="bids">
      <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width paddingtop15 paddingbottom15 paddingleft10 paddingright10"><span>
         <img src="svg-icons/JobCard/handshake (2).svg" width="20" hspace="1" class="paddingbottom4 marginleft-5">
         <span class="color-2 fontsize-12 fontweight-500"> Agreed Bid</span></span><br><span class="fontsize-12 fontweight-400">${{$project->bidwon->price}}, {{$project->bidwon->work_time}} Days</span></button>
     </td>
   	<td class="average align-top">
      	<button style="margin-top: 0px;text-align: center;" class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width">
         <span><img src="svg-icons/JobCard/timer.svg" width="21" hspace="1" class="marginleft-5 paddingbottom3 marginright-0">
            <strong class="color-2 fontsize-13 fontweight-500"> Deadline</strong></span><br><span class="fontsize-12 fontweight-400">29/03/2019</span></button>
   	</td>
     <td class="estimate">
        <a href="javascript:;" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center">
        	<img src="svg-icons/JobCard/dollar-coin-money.svg" width="15" hspace="1">Payment Due | ${{$rq->value}}
        </a>
      	<div id="accordion" role="tablist" aria-multiselectable="true">
         <div class="card">
            <div style="border: 1px solid #d8dbe6;" class="card-header paddingtop10 paddingbottom10 border-top-radius" role="tab" id="headingOne-20">
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
               <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="card">
                     <a href="javascript:;" class="post-category bg-img-75CEF3-4CB3DF color-fff border-top-radius-5 border-bottom-radius paddingtop10 paddingbottom10 margintop10 marginbottom-5 fontsize-11 fontweight-500 full-width align-center">milestone 0{{++$key}} | {{$status = $ms->status_name}}</a>
                     <div class="card-header paddingtop10 paddingbottom10 border-top-radius margintop5" role="tab" id="headingOne" >
                        <h6 class="mb-0">
                           <a data-toggle="collapse" data-parent="#accordion" href="#ms-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne">
                              <img src="svg-icons/JobCard/rotate.svg" width="18" hspace="1">
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
                                 <div class="skills-item-info"><span class="skills-item-title"><span class="color-2 fontsize-13 fontweight-500">4 / {{$workday = $ms->workday}} Days | Total 4 / 20</span> </span> <span class="skills-item-count color-2 fontsize-13 fontweight-500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="50" data-from="0"></span><span class="units">{{$ms->percent_payment}}%</span></span></div>
                                 <div class="skills-item-meter">
                                    <span class="skills-item-meter-active bg-blue" style="width: 50%"></span>
                                 </div>
                              </div>
                              <div class="skills-item">
                                 <span><span><img src="svg-icons/JobCard/timer.svg" width="18" hspace="1"><span class="color-2 fontsize-13 fontweight-500"> Deadline</span>
                                 </span><span class="fontsize-12 fontweight-400">29/03/2019</span>
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
     <td class="add-event align-center align-top">
      	<a href="{{$project->urlTracking()}}" class="btn btn-smoke btn-sm bg-img-57596E-3F4257 fontweight-400">TRACKER <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1"></a>
      	<a href="{{$project->urlTracking()}}" data-toggle="modal" class="btn btn-purple btn-sm btn-icon-left bg-img-6F7CC3-646FAB fontweight-500"><i class="fa fa-comments" aria-hidden="true"></i>Messages ({{$project->messages->count()}})</a>
     </td>
</tr>
