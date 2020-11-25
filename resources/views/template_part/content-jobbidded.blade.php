<tr class="event-item">
  <td class="author">
    <div class="author-freshness" align="left">
							<span><span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px">Project ID:</span>
                <span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$project->id}}</span>
								<a href="#" class="h6 title" style="font-weight:700; padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$project->name}}</a>
                <time class="entry-date updated" datetime="2017-06-24T18:18">
                  <em style="font-size: 12px;">{{$project->catname}}</em>
                </time>
                <time class="entry-date updated" datetime="2017-06-24T18:18">
                  <em style="font-size: 12px;">{{$project->skillname}}</em>
                </time>
              </span>
    </div>
  </td>
  <td class="upcoming">

    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="font-weight:700; margin-top: -5px; font-size: 12px;color: #51537F">My Estimate:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">${{$project->your_bid()->price}} USA, {{$project->your_bid()->work_time}} days</span></time>
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
      <div class="author-freshness"><a class="h6 title" style="font-weight:700; margin-top: -5px; font-size: 12px;color: #51537F">Average Bids:</a>
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
      <a  target="_blank" href="{{$project->urlProjectBids()}}" class="btn btn-smoke btn-sm bg-img-57596E-3F4257 fontweight-400">View Project <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1" class="marginleft5 paddingbottom3"></a>

   </td>
</tr>
