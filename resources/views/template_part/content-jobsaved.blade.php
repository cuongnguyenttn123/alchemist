<tr class="event-item">
  <td class="author">
    <div class="author-freshness" align="left">
							<span><span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px">Project ID:</span>
                <span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$project->id}}</span>
								<a href="#" class="h6 title" style="font-weight:700; padding-bottom: 2px;padding-top: 5px; font-weight: 500; color: #51537F;">{{$project->name}}</a>
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
          <img src="{{$project->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">


          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">{{$project->user->level}}</div></a>
      </div>
      <div class="author-freshness"><a href="{{$project->user->permalink()}}" target="_blank" class="h6 title" style="color: #51537F; font-weight:700; margin-top: -5px; font-size: 12px">{{$project->user->full_name}} <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$project->user->user_title}} | LV {{$project->user->level}}</span></time>

      </div>



    </div>
  </td>
<td class="upcoming">

    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="font-weight:700; margin-top: -5px; font-size: 12px;color: #51537F">Estimate:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">${{$project->budget}}, {{$project->total_day}} days</span></time>


      </div>



    </div></td>
  <td class="description">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="font-weight:700; margin-top: -5px; font-size: 12px;color: #51537F">Project Bids:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$project->bids->count()}}</span></time>

      </div>



    </div>
  </td>
  <td class="users">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="font-weight:700; margin-top: -5px; font-size: 12px;color: #51537F">Bidding Closes:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{date( "h:i m/d/Y", strtotime($project->end_bid))}}</span></time>

      </div>



    </div>
  </td>
  <td class="add-event">
    <a target="_blank" href="{{$project->permalink()}}" class="btn btn-smoke btn-sm" style="background-image: linear-gradient(#57596E, #3F4257);font-weight: 400">View Project <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px"></a>
    <a href="javascript:;" data-id = "{{$project->id}}" class="btn btn-sm btn-border-think custom-color c-grey save_project"><i class="fa fa-ban" aria-hidden="true"></i>&ensp; Remove Project</a>
  </td>
</tr>
