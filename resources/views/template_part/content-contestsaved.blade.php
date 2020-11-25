<tr class="event-item">
  <td class="author">
    <div class="author-freshness" align="left">
      <span><span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px">Contest ID:</span>
        <span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$contest->id}}</span>
        <a href="#" class="h6 title" style="padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$contest->name_contest}}</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><em style="font-size: 12px;">{{$contest->catname}}</em></time>

      </span>
    </div>
  </td>
  <td class="author">
    <div class="event-author author-freshness inline-items" style="vertical-align: top;margin-top: 15px;">
      <div class="author-thumb" style="margin-bottom:0px; position: sticky;">
        <a href="{{$contest->user->permalink()}}" target="_blank">
          <img src="{{$contest->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">


          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">{{$contest->user->level}}</div></a>
      </div>
      <div class="author-freshness">
        <a href="{{$contest->user->permalink()}}" target="_blank" class="h6 title" style="margin-top: -5px; font-size: 12px; font-weight: 600">{{$contest->user->full_name}}
          <img src="svg-icons/Flags/country-code/{{$contest->user->countryflag}}.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$contest->user->user_title}} | LV {{$contest->user->level}}</span></time>
      </div>
    </div>
  </td>
  <td class="upcoming">

    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="margin-top: -5px; font-size: 12px;color: #51537F">Prize:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">${{$contest->total_prize}} USD, {{$contest->totalDay()}} Days</span></time>
      </div>
    </div>
  </td>
  <td class="description">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="margin-top: -5px; font-size: 12px;color: #51537F">Contest Entries:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$contest->total_entries}}</span></time>
      </div>
    </div>
  </td>
  <td class="users">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="margin-top: -5px; font-size: 12px;color: #51537F">Entry Closes:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{date( "h:i m/d/Y", strtotime($contest->time_end))}}</span></time>
      </div>
    </div>
  </td>
  <td class="add-event">
    <a target="_blank" href="{{$contest->permalink()}}" class="btn btn-smoke btn-sm" style="background-image: linear-gradient(#57596E, #3F4257);font-weight: 400">View Contest <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px"></a>
    <a href="javascript:;" data-id = "{{$contest->id}}" class="btn btn-sm btn-border-think custom-color c-grey save_contest">
      <i class="fa fa-ban" aria-hidden="true"></i>
      Remove Contest<div class="ripple-container"></div></a>
  </td>
</tr>
