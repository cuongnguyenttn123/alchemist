<tr class="event-item event-item-response item-{{$ms->id}}" data-ms_id="{{$ms->id}}">
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
    case 'Locked':
      $color = 'milestone-color-defaut';
      $back_color = 'milestone-color-defaut-bg';
      break;
  }
  ?>
  <td class="author align-top">
    <div class="author-freshness" align="center">
      <span class="left-auth">M 0{{++$key}}: </span>
      <span class="right-status-cn {{$color}}">{{$status = $ms->status_name}}</span>
      <a href="javascript:;" class="h6 title">{{$ms->title}}</a>
    </div>
  </td>

  <td class="bids align-top cot2">
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card">
        <a href="javascript:;" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center">MILESTONE DETAILS</a>
        <div class="card-header" role="tab" id="headingOne">
          <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#msid-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne">
              <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1">
              <span>{{$ms->percent_payment}}% | ${{$price_bid = $ms->price_bid}} | {{$workday = $ms->workday}} DAYS</span>
              <svg class="olymp-dropdown-arrow-icon c-white">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
              </svg>
            </a>
          </h6>
        </div>
        <div id="msid-{{$ms->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
          <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="ui-block margintop10 paddingbottom10" data-mh="pie-chart">
              <div class="today-events calendar">
                <div class="list">
                  <div id="accordion-3" role="tablist" aria-multiselectable="true" class="day-event">
                    <div class="card">
                      <div class="card-header paddingtop10 paddingbottom10" role="tab" id="headingOne-3">
                        <div class="event-time fontweight-400">
                          <time class="published color-2 paddingbottom5 fontsize-13 fontweight-500" datetime="2017-03-24T18:18">Milestone 0{{$key}}</time>
                        </div>
                        <h5 class="mb-0 title margintop-10">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="color-3 fontsize-12 fontweight-400">
                            {{$ms->percent_payment}}% | <span>$</span>{{$price_bid}} | {{$workday}} Days<i class="fa fa-angle-down" aria-hidden="true"></i>
                          </a>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-boby-mi paddingbottom10">{{$ms->content}}</div>
                        <div class="skills-item marginleft25 margintop5">
                                       <span><img src="svg-icons/JobCard/timer.svg" width="18" hspace="1">
                                          <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-500">Duration</span>
                                       </span><span class="fontsize-12 fontweight-400">{{$workday}} Days</span>
                        </div>
                        <div class="skills-item marginleft25 margintop-10">
                                       <span><img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1">
                                          <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-500">Price</span>
                                       </span><span class="fontsize-12 fontweight-400">${{$price_bid}} USD</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </td>
  <td class="bids align-top cot3">
    <div class="ui-block margin0 padding0 align-top" data-mh="pie-chart">
      <div class="ui-block-content">
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
            <span class="skills-item-count color-2 fontsize-13 fontweight-500 paddingbottom5">
                     <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="50" data-from="0"></span>
                     <span class="units">{{$checkphantram}}%</span>
                  </span>
          </div>
          <div class="skills-item-meter">
            <span class="skills-item-meter-active {{$back_color}}" style="width: {{$checkphantram}}%; max-width: 100%;"></span>
          </div>
        </div>
      </div>
    </div>
  </td>
  <td class="average align-top">
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card">
        <?php
        $is_seeker = $user->isSeeker();
        $is_alchemist = $user->isAlchemist();
        ?>
        @switch ($status)
          @case('Early Release')
          <a href="javascript:;" class="post-category {{$back_color}} border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | {{$status}}</a>
          @break;
          @case('Locked')
          <a href="javascript:;" class="post-category {{$back_color}} border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | {{$status}}</a>
          @break;
          @case('Locked')
          <a href="javascript:;" class="post-category {{$back_color}} border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | {{$status}}</a>
          @break;
          @case('Completed')
          <a href="javascript:;" class="post-category {{$back_color}} border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | {{$status}}</a>
          @break;
          @case('Underway')
          @if($is_seeker)
            <a href="javascript" class="post-category {{$back_color}} border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | {{$status}}</a>
          @endif
          @if($is_alchemist)
            @if($ms->can_request)
              <a href="javascript:;" class="post-category {{$back_color}} border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | Request release</a>
            @else
              <a href="javascript" class="post-category {{$back_color}} border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | LOCKED</a>
            @endif
          @endif
          @break;
          @case('Payment Due')
          @if($is_seeker)
            <a href="javascript:;" class="post-category bg-img-FF8A8A-F36161 border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | Payment Due</a>
          @endif
          @if($is_alchemist)
            <a href="javascript:;" class="post-category bg-img-FF8A8A-F36161 border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | {{$status}}</a>
          @endif
          @break;
          @case('disputing')
          <a href="javascript:;" class="post-category bg-img-57596E-3F4257 border-bottom-radius paddingtop10 paddingbottom10 fontweight-500 color-fff full-width align-center">milestone 0{{$key}} | {{$status}}</a>
          @break;
        @endswitch
        <div class="card-header" role="tab" id="headingOne">
          <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#pm-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne">
              @switch ($status)
                @case('Early Release')
                <img src="svg-icons/JobCard/handshake%20(2).svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                @break;
                @case('created')
                <img src="svg-icons/JobCard/checked.svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                @break;
                @case('Locked')
                <img src="svg-icons/JobCard/password.svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                @break;
                @case('waiting')
                <img src="svg-icons/JobCard/rotate.svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                @break;
                @case('Completed')
                <img src="svg-icons/JobCard/checked.svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                @break;
                @case('Underway')
                <img src="svg-icons/JobCard/rotate.svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                @break;
                @case('Payment Due')
                <img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                @break;
                @case('disputing')
                <img src="svg-icons/JobCard/checked.svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                 @break;
                @default
                <img src="svg-icons/JobCard/rotate.svg" width="18" hspace="1" class="paddingbottom-0 marginright5">
                @break;
              @endswitch

              <span class="color-4 paddingbottom5 fontweight-400 fontsize-13">{{$ms->percent_payment}}% | ${{$ms->price_bid}}</span>
              <svg class="olymp-dropdown-arrow-icon c-white">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
              </svg>
            </a>
          </h6>
        </div>
        <div id="pm-{{$ms->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
          @switch ($status)
            @case('Completed')
            <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 10px 0px 10px 10px;margin-top: 8px; text-align: left">
              <span><img src="svg-icons/JobCard/checked.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;margin-left: 15px">
                <span style="color: #8891B6; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 400;align: left">Payment Released</span>
              </span>
              <div class="ripple-container"></div>
            </button>
            <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
              <div class="ui-block-content" style=" padding: 15px 20px 0px 20px ">
                <div class="skills-item">
                        <span><span><img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px">
                            <span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Price</span>
                            </span>
                          <span style="font-size: 12px;font-weight: 400">${{$price_bid}}</span>
                        </span>
                </div>
              </div>
            </div>
            @break;
            @case('Underway')
            @if($is_seeker)
              <a style="display: none" href="javascript:;" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-md-2 btn-icon-left">RELEASE (LOCKED)</a>
            @endif
            @if($is_alchemist)
              <a style="display: none" id="milestone_request_{{$key}}" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left milestone_request" data-ms="{{$ms->id}}">Request release</a>
              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px; margin-top: 8px">
                <fieldset class="form-group is-empty">
                  <div class="btn-group bootstrap-select form-control">
                    <select id="select-value-{{$key}}" class="selectpicker form-control" style="" tabindex="-98">
                      <option value="milestone">Milestone | Options </option>
                      <option value="milestone_request">Request Release</option>
                      {{--<option value="open_dispute_modal">Enter Dispute</option>--}}
                    </select>
                  </div>
                  <span class="material-input"></span>
                </fieldset>
              </div>
              <button type="button" data-value_key="{{$key}}" class="go-btn btn btn-sm btn-border-think c-grey btn-transparent " data-toggle="tooltip" data-placement="top" style="width: 50%; font-size: 10px; margin-left: 1px;background-image: linear-gradient(#FCFCFC, #FAFBFD)" data-original-title="" title="">
                <span>COMPLETE ACTION</span>
                <div class="ripple-container"></div>
              </button>
            @endif
            @break;
            @case('Locked')
            @if($is_seeker)
              <a style="display: none" href="javascript:;" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-md-2 btn-icon-left">RELEASE (LOCKED)</a>
            @endif
            @if($is_alchemist && $ms->can_request)
              <a style="display: none" id="start_{{$key}}" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left milestone_start" data-ms="{{$ms->id}}">Start</a>
              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px; margin-top: 8px">
                <fieldset class="form-group is-empty">
                  <div class="btn-group bootstrap-select form-control">
                    <select id="select-value-{{$key}}" class="selectpicker form-control" style="" tabindex="-98">
                      <option value="milestone">Milestone | Options </option>
                      <option value="start">Start</option>
                    </select>
                  </div>
                  <span class="material-input"></span>
                </fieldset>
              </div>
              <button type="button" data-value_key="{{$key}}" class="go-btn btn btn-sm btn-border-think c-grey btn-transparent " data-toggle="tooltip" data-placement="top" style="width: 50%; font-size: 10px; margin-left: 1px;background-image: linear-gradient(#FCFCFC, #FAFBFD)" data-original-title="" title="">
                <span>COMPLETE ACTION</span>
                <div class="ripple-container"></div>
              </button>
            @endif
            @break;
            @case('Payment Due')
            @if($is_seeker)
              <a style="display: none" id="release_payment_{{$key}}" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left release_payment" data-ms="{{$ms->id}}">Release payment</a>
              <a style="display: none" id="decline_payment_{{$key}}" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left decline_payment" data-ms="{{$ms->id}}">Decline payment</a>
            <div class="get-select-value">


              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px; margin-top: 8px">
                <fieldset class="form-group">
                  <div class="btn-group bootstrap-select form-control">
                    <select id="select-value-{{$key}}" class="selectpicker form-control" style="" tabindex="-98">
                      <option value="payment_due">Payment Due | Options </option>
                      <option value="release_payment">Release Funds</option>
                      <option value="decline_payment">Decline</option>
                      {{--<option value="open_dispute_modal">Dispute Negotiation</option>--}}
                    </select>
                    <span class="material-input"></span>
                  </div>
                </fieldset>
              </div>
              <button type="button" data-value_key="{{$key}}" class="go-btn btn btn-sm btn-border-think c-grey btn-transparent " data-toggle="tooltip" data-placement="top" style="width: 50%; font-size: 10px; margin-left: 1px;background-image: linear-gradient(#FCFCFC, #FAFBFD)" data-original-title="" title="">
                <span>COMPLETE ACTION</span>
                <div class="ripple-container"></div>
              </button>
            </div>
            @endif
            @break;
            @case('Early Release')
            @if($is_seeker)
              <a style="display: none" id="release_payment_{{$key}}" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left release_payment" data-ms="{{$ms->id}}">Release payment</a>
              <a style="display: none" id="decline_payment_{{$key}}" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left decline_payment" data-ms="{{$ms->id}}">Decline payment</a>
              <div class="get-select-value">


                <div class="w-select" style="padding-right: 0px; margin-bottom: 8px; margin-top: 8px">
                  <fieldset class="form-group">
                    <div class="btn-group bootstrap-select form-control">
                      <select id="select-value-{{$key}}" class="selectpicker form-control" style="" tabindex="-98">
                        <option value="payment_due">Payment Due | Options </option>
                        <option value="release_payment">Release Funds</option>
                        <option value="decline_payment">Decline</option>
                        {{--<option value="open_dispute_modal">Dispute Negotiation</option>--}}
                      </select>
                      <span class="material-input"></span>
                    </div>
                  </fieldset>
                </div>
                <button type="button" data-value_key="{{$key}}" class="go-btn btn btn-sm btn-border-think c-grey btn-transparent " data-toggle="tooltip" data-placement="top" style="width: 50%; font-size: 10px; margin-left: 1px;background-image: linear-gradient(#FCFCFC, #FAFBFD)" data-original-title="" title="">
                  <span>COMPLETE ACTION</span>
                  <div class="ripple-container"></div>
                </button>
              </div>
            @endif
            @break;
          @endswitch

            <a id="open_dispute_modal_{{$key}}" href="javascript:;" data-toggle="modal" data-target="#dispute_modal" class="btn open_dispute_modal_{{$key}} btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left open_dispute_modal" style="display: none; background-color: #FBFBFB; width: 100%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>DISPUTE / NEGOTIATE</a>
            <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
              <div class="ui-block-content" style=" padding: 15px 20px 0px 20px ">
                <div class="skills-item">
                    <span><span><img src="svg-icons/JobCard/timer.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Deadline</span></span>
                        @if($status != 'Locked')
                          <?php
                          $start_work = $ms['start_work'];
                          $workday = $ms['workday'];
                          $done_work = date('d/m/Y', strtotime($start_work. ' + '.$workday.' days'));
                          ?>
                            <span style="font-size: 12px;font-weight: 400">{{$done_work}}</span>
                        @else
                        <span style="font-size: 12px;font-weight: 400">{{date('d/m/Y', $project->deadline)}}</span>
                        @endif

                  </span></div>
                <div class="skills-item">
                    <span><span><img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Price</span>
                      </span><span style="font-size: 12px;font-weight: 400">${{$price_bid}}</span>

                  </span></div>
              </div>

            </div>
        </div>
      </div>
    </div>
  </td>
</tr>
