<tr class="event-item">
  <td class="author">
    <div class="author-freshness" align="left">
      <span>
        <span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px">Project ID:</span>
        <span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$project->id}}</span>
        <a href="{{$project->permalink()}}" class="h6 title" style="font-weight:700; padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$project->name}}</a>
          <time class="entry-date updated" datetime="2017-06-24T18:18">
            <em style="font-size: 12px;">{{$project->catname}}</em>
          </time>
          <time class="entry-date updated" datetime="2017-06-24T18:18">
            <em style="font-size: 12px;">{{$project->skillname}}</em>
          </time>
      </span>Project Details
    </div>
  </td>
  <td class="upcoming">
    @php
      if($project->is_author())  {
         $txt = $project->budget.', '.$project->total_day.' days';
      }else {
         $txt = $project->your_bid()->price.', '.$project->your_bid()->work_time.' days';
      }
    @endphp
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style=" font-weight:700; margin-top: -5px; font-size: 12px;color: #51537F">My Estimate:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">${{$txt}}</span></time>
      </div>
    </div>
  </td>
  <td class="description">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="font-weight:700; margin-top: -5px; font-size: 12px;color: #51537F">Project Bids:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$project->bids->count()}}</span></time>
      </div>
    </div>
  </td>
  <td class="description">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="font-weight:700; margin-top: -5px; font-size: 12px;color: #51537F">Average Bid:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$project->average_bidprice}} USD</span></time>
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
   <td class="add-event align-center">
      @if($user->isAlchemist())
      <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-blue btn-sm btn-icon-left btn_acceptawardbid" style="background-image: linear-gradient(#88CF00, #6FA900);font-weight: 400">
        <i class="fa fa-check" aria-hidden="true"></i>ACCEPT
      </a>
      <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-purple btn-sm btn-icon-left btn_cancelawardbid" style="background-image: linear-gradient(#FF8A8A, #F36161);font-weight: 400">
        <i class="fa fa-ban" aria-hidden="true"></i>CANCEL OFFER
      </a>
      @endif
      @if($user->isSeeker())
      <a target="_blank" href="{{$project->urlProjectBids()}}" class="btn btn-smoke btn-sm bg-img-57596E-3F4257 fontweight-400">View Project <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1" class="marginleft5 paddingbottom3"></a>
      @endif
   </td>
</tr>
