<head>
  <link rel="stylesheet" type="text/css" href="css/huystyle.css">
</head>
<tr class="event-item">
  <td class="author" style="vertical-align: top;margin-bottom: -5px">
    <div class="event-author author-freshness inline-items">
      <div class="author-thumb" style="position: sticky;">
        <a href="{{$entry->user->permalink()}}" target="_blank">
          <img src="{{$entry->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">
          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">08</div></a>
      </div>
      <div class="author-freshness"><a href="http://alche.wedidit.com.hk/UserProfile-AboutMe.html" target="_blank" class="h6 title" style="margin-top: -5px; font-size: 12px">{{$entry->user->full_name}}<img src="svg-icons/Flags/country-code/{{$entry->user->countryflag}}.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$entry->user->user_title}} | LV {{$entry->user->level}}</span></time>
      </div>
    </div>
  </td>
  <td class="estimate" style="vertical-align: top">
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: -5px">
        <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px;">
          <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseContest2-{{$entry->id}}" aria-expanded="true" aria-controls="collapseOne" class="">
              <img src="svg-icons/menu/review.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
              <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Alchemist Brief</span>
              <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
            </a>
          </h6>
        </div>
        <div id="collapseContest2-{{$entry->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: rgb(235, 240, 244); margin-top: 8px;">
          <div class="ui-block" style="margin-bottom: 0px">
            <ul class="your-profile-menu">
              <ul class="order-totals-list" style="padding: 10px 0px 10px 0px;vertical-align: top">
                <li style="padding-bottom: 15px">
                  <h6 style="font-size: 12px">{!!nl2br($entry->title)!!}</h6>
                </li>
                <div class="comment-content comment">
                  {!!nl2br($entry->description)!!}
                </div>
              </ul>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </td>
  <td class="estimate" style="vertical-align: top">
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card" style="margin-bottom: -5px">
        <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px;">
          <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseContest1-{{$entry->id}}" aria-expanded="true" aria-controls="collapseOne">
              <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
              <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
              <svg class="olymp-dropdown-arrow-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
              </svg>
            </a>
          </h6>
        </div>
        @if($contest->is_author() || $entry->is_author())
          <div id="collapseContest1-{{$entry->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: rgb(235, 240, 244); margin-top: 8px;">
            <div class="ui-block" style="margin-bottom: 0px">
              <form action="javascript:;" method="post" class="cart-main">
                <div class="alldownload">
                  <ul class="notification-list friend-requests">
                    @forelse($entry->preview_attachments() as $file)
                      @include('template_part.content-attachdispute')
                    @empty
                      <li>
                        no file
                      </li>
                    @endforelse
                  </ul>
                  <table class="shop_table cart">
                    <tbody>
                    <tr>
                      <td colspan="4" class="actions" style="padding-left: 25px">
                        <a data-toggle="modal" data-target="#" href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " >
                          <i class="fa fa-download" aria-hidden="true"></i>
                          DOWNLOAD ALL
                        </a>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
          </div>
        @endif
      </div>
    </div>
  </td>

  @if($contest->is_author())
    <td class="add-event align-center" style="vertical-align: top">
      <div class="w-select35" style="margin-bottom: -5px; margin-left: 0px;">

        <fieldset class="form-group" style="margin-left: 0px;">
          <div class="btn-group bootstrap-select form-control">

            <select class="selectpicker form-control loca selectrank" data-id="{{$entry->id}}" tabindex="-98">

              <option class="select-null" value="0" >Podium Selection</option>
              <?php
              $max = 4;
                if($contest->total_entries<4) $max = $contest->total_entries;
              ?>
              @for($i=1; $i<=$max; $i++)
                <?php $vitri = $contest->vitri($i);?>
                <option class="select-rank-{{$i}}" value="{{$i}}"
                  {{($vitri) ? 'disabled' : ''}}
                  {{($entry->rank == $i) ? 'selected' : ''}}>{{addOrdinalNumberSuffix($i)}}
                  {{($vitri) ? '(Locked)' : 'Place'}}
                </option>
              @endfor
            </select>
          </div>
          <span class="material-input"></span>
        </fieldset>
      </div>

    </td>

      <td class="add-event align-center lock" style="vertical-align: top">
        @if($contest->is_author() & !$contest->is_completed)
          @if($entry->rank)
            <?php
            if($entry->rank == "1st"){
                $col = 'linear-gradient(#A3E12A, #7CB905)';

              }else if($entry->rank == "2nd"){
                $col = 'linear-gradient(#75CEF3, #4CB3DF)';
              }else if($entry->rank == "3rd"){
                $col = 'linear-gradient(#FF8A8A, #F36161)';
              }else{
                $col = 'linear-gradient(#FFB33A, #F89A00)';
              }
            ?>
            <a href="javascript:;" data-id="{{$entry->id}}" class="btn btn-purple btn-sm btn-icon-left unlock_decision" style="background-image: {{$col}};font-weight: 500;padding: 14px 0px;font-size: 11px;">
              <i class="fa fa-unlock-alt" aria-hidden="true"></i>Unlock {{addOrdinalNumberSuffix($entry->rank)}} Place
            </a>
          @else

            @if(!$entry->shortlist)
            <a href="javascript:;" class="btn btn-sm btn-border-think c-grey btn-transparent tag-user tag-user-unsave" data-id="{{$entry->id}}" style="padding: 14px 0px;font-size: 12px">
              <i class="fas fa-bookmark"></i> Tag User
              <div class="ripple-container"></div>
            </a>
            @else
              <a href="javascript:;" class="btn btn-secondary btn-sm btn-icon-left tag-user tag-user-save" data-id="{{$entry->id}}" style="padding: 14px 0px;font-size: 12px;linear-gradient(#B0CADD, #7E92A1);font-weight: 500;color: #FFFFFF">
                <i class="fas fa-bookmark"></i>User Tagged
                <div class="ripple-container"></div>
              </a>
            @endif
          @endif
        @endif
      </td>
  @endif

</tr>

