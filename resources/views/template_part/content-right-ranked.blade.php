
  <li class="inline-items">
    <div class="event-author author-freshness inline-items">
      <div class="author-thumb author-thumb-higest-ranked" style="position: sticky;margin-top: -2px;margin-right: 15px;">
        <a href="{{$us->permalink()}}" target="_blank">
          <img src="{{$us->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">
          <div class="label-avatar bg-primary" style="z-index: 4;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;position: absolute;left: -7px;">{{$us->level}}</div></a>
      </div>
      <div class="author-freshness" style="vertical-align: -moz-middle-with-baseline;">
        <a href="{{$us->permalink()}}" target="_blank" class="h6 title" style="margin-top: -5px; font-size: 12px ;    display: flex;"><span class="name-user">{{$us->full_name}}</span><img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 11px;">{{$us->user_title}} | LV {{$us->level}}</span></time>
      </div>
    </div>
    <?php
    $save_fw = 'add-fw';
    if ($us->is_saved_newsFeed()){
      $save_fw = '';
    }
    ?>
    <span class="notification-icon margin-top-0">
              <a href="javascript:;" class="accept-request accept-request-save {{$save_fw}}" data-id="{{$us->id}}">
                    <span class="icon-add without-text">
                      <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
                    </span>
              </a>
              </span>
  </li>

