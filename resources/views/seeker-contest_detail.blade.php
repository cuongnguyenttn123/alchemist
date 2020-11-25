<head>
  <link rel="stylesheet" type="text/css" href="css/huystyle.css">
</head>
@extends('layouts.master')
@section('title')
  Contest Detail
@endsection
@section('content')
  <div class="header-spacer"></div>
  <div class="main-header" style="margin-top: -110px">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container" >
      <div class="row">
        <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">

          <div class="main-header-content" style="margin-bottom: 60px">
            <h1>
              <i class="fas fa-cubes" style="margin-right: 15px"></i>Contest Tracker</h1>
            <p>Welcome to the Alchemunity Project Search. Search Projects from all across the globe by skill, level,  price, location and spoken languages. Review comprehensive Seeker details to find your best match!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="margin-top: -110px">
    <div class="row">
      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <nav aria-label="Page navigation" style="z-index: 2">
          <ul class="pagination " style="margin: 0px 0px -1px 0px">
            <li class="page-item" style="padding-left: 0px;">
              <a class="page-link" href="http://alche.wedidit.com.hk/Seeker-ContestTracking%20%28Updated%29.html#" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Go Back</a>
            </li>
            <li class="page-item disabled ">
              <a class="page-link " href="http://alche.wedidit.com.hk/Seeker-ContestTracking%20%28Updated%29.html#" tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;">Contest</a>
            </li>



          </ul>
        </nav>

        <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;border-top-left-radius: 0%;">
          <div class="ui-block-title">
            <h4><strong>Contest Bis:</strong> {{$contest->name_contest}}</h4>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="ui-block" style="border: 0px solid #e6ecf5;">
          <!-- News Feed Form  -->
          <div class="news-feed-form" style="background-color: #edf2f6;padding-bottom: 125px;border: 0px solid #e6ecf5;">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item"  >
                <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#milestones" role="tab" aria-expanded="true">
                  <img src="svg-icons/menu/podium.svg" class="olymp-status-icon" style="margin-right: 5px">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                  <span>Entries & Podium</span>
                </a>
              </li>
              @if($contest->is_author())
                <li class="nav-item">
                  <a class="nav-link inline-items" data-toggle="tab" href="#locked" role="tab" aria-expanded="false">
                    <img src="svg-icons/menu/folder.svg" class="olymp-status-icon" style="margin-right: 5px">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                    <span>Contest Files {{( !$contest->is_completed ) ? '(Locked)' : ''}}</span>
                  </a>
                </li>
              @endif
              @if($contest->is_completed)
                <li class="nav-item">
                  <a class="nav-link inline-items" data-toggle="tab" href="#results" role="tab" aria-expanded="false">
                    <img src="svg-icons/menu/trophy.svg" class="olymp-status-icon" style="margin-right: 5px">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                    <span>Results</span>
                  </a>
                </li>
              @endif
            </ul>
            <!-- Tab panes -->
            @if(count($contest->entries) == 0)
              <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-top: 15px">

                <a href="http://alche.wedidit.com.hk/SearchProjects(Job).html"></a>

                <div class="content" style="margin-top: 10px">

                  <a href="http://alche.wedidit.com.hk/SearchContests.html" class="btn btn-control bg-blue">
                    <svg class="olymp-trophy-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
                  </a>

                  <span class="title h5">No Contest Entries - Check Later</span>
                  <span class="sub-title">Contestant judging will be managed here</span>

                </div>

              </div>
            @else
              <div class="tab-content no-padding margin-top">
                <div class="tab-pane active" id="milestones" role="tabpanel" aria-expanded="true">
                  @if($contest->is_author() && !$contest->is_completed)
                    <div class="ui-block responsive-flex1200 " id="commit">
                      <div class="ui-block-title" id="contest-rank">
                        {{--                          {{dd($contest->max_rank)}}--}}
                        @for($i=1; $i<=$contest->max_rank; $i++)
                          <?php $vitri = $contest->vitri($i);
                          ?>

                          <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent rank-check-done-{{$i}}" >
                            <img src="svg-icons/Create Job/{{($vitri) ? 'checked' : 'incomplete'}}.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                            {{addOrdinalNumberSuffix($i)}} | {{($vitri) ? 'Done' : 'Please Select'}}</a>
                        @endfor
                        @if($contest->hasrank()>0 && $contest->hasrank()>=$contest->max_rank)
                          <a href="javascript:;" class="btn  btn-md-2 btn-icon-left has-rank" style="background-image: linear-gradient(#59A4FF, #2190EC);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>{{$contest->hasrank()}}/{{$contest->max_rank}}</a>
                          <a href="javascript:;" class="btn  btn-md-2 btn-icon-left confirm_contest commit-rank" style="background-image: linear-gradient(#A3E12A, #7CB905);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>CONFIRM</a>
                        @else
                          <a href="javascript:;" class="btn  btn-md-2 btn-icon-left has-rank" style="font-weight: 500;background-image: linear-gradient(#57596E, #3F4257)"><i class="fa fa-lock" aria-hidden="true"></i>{{$contest->hasrank()}}/{{$contest->max_rank ?? 0}}</a>
                          <a href="javascript:;" class="btn  btn-md-2 btn-icon-left confirm_contest commit-rank" style="display:none;background-image: linear-gradient(#A3E12A, #7CB905);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>CONFIRM</a>
                        @endif
                      </div>
                    </div>

                  @endif
                  <div class="ui-block">
                    <table width="93%" class="event-item-table event-item-table-fixed-width">
                      <thead style="background-color: #646464">

                      <tr>
                        <th width="285" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                          ALCHEMIST
                        </th>
                        <th width="332" class="description " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                          DESCRIPTION
                        </th>
                        <th width="299" class="users " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                          FILES<img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 2px; margin-left: 5px">
                        </th>

                        <th width="63" class="users " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                          OPTION<img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 2px; margin-left: 5px">
                        </th>
                        <th width="185" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                          ACTION
                        </th>
                      </tr>

                      </thead>
                      <tbody>
                      @foreach($contest->entries as $entry)
                        @include('template_part.content-entry')
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

                @if($contest->is_author())
                  <div class="tab-pane" id="locked" role="tabpanel" aria-expanded="true">
                    @if(!$contest->is_completed)
                      <div class="container no-padding" style="margin-top: 15px">
                        <div class="row">
                          <div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-1 col-sm-12 col-12">
                            <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                              <a href="#" data-toggle="modal" data-target="#create-photo-album"></a>

                              <div class="content" style="margin-top: 10px">

                                <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="#create-photo-album">
                                  <img src="svg-icons/JobCard/padlock.svg" class="olymp-plus-icon" style="margin-top: 10px">
                                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                </a>

                                <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Files Locked</a>
                                <span class="sub-title">File Upload / Payment Incomplete</span>

                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    @else
                      <div class="ui-block" style="margin-bottom: 0px">
                        <form action="javascript:;" method="post" class="cart-main">
                          <!-- Shop Table Cart -->
                          <table class="shop_table cart thread">
                            <thead style="background-color: white">
                            <tr>
                              <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
                              <th class="product-quantity">DATE UPLOADED</th>
                              <th class="product-subtotal">DOWNLOAD</th>
                            </tr>
                            </thead>
                            <tbody class="alldownload">
                            @foreach($contest->entries_rank() as $entry)
                              @foreach($entry->delivery_attachments() as $file)
                                @include('template_part.content-attachdelivery')
                              @endforeach
                            @endforeach

                            <tr>
                              <td colspan="4" class="actions" style="padding-left: 25px">
                                <a href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                              </td>
                            </tr>
                            </tbody>
                          </table>
                          <!-- ... end Shop Table Cart -->
                        </form>
                      </div>
                    @endif
                  </div>
                @endif
                @if($contest->is_completed)
                  <div class="tab-pane" id="results" role="tabpanel" aria-expanded="true">
                    <div class="ui-block" style="margin-top: 15px">
                      <table class="event-item-table event-item-table-fixed-width">
                        <thead>
                        <tr>
                          <th width="19%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; border-right: ">
                            ALCHEMIST
                          </th>
                          <th width="13%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                            LEADERBAORD
                          </th>
                          <th width="27%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                            REWARDS
                          </th>
                          <th width="32%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                            FILES
                          </th>
                          <th width="9%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ENTRY #
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contest->entries_rank() as $entry)

                          <tr class="event-item">
                            <td class="author" style="vertical-align: top;margin-bottom: -5px">
                              <div class="event-author author-freshness inline-items">
                                <div class="author-thumb" style="position: sticky;">
                                  <a href="javascript:;" target="_blank">
                                    <img src="{{$entry->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">
                                    <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">08
                                    </div>
                                  </a>
                                </div>
                                <div class="author-freshness">
                                  <a href="javascript:;" target="_blank" class="h6 title" style="margin-top: -5px; font-size: 12px">{{$entry->user->full_name}}
                                    <img src="svg-icons/Flags/country-code/{{$entry->user->countryflag}}.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px">
                                  </a>
                                  <time class="entry-date updated" datetime="2017-06-24T18:18">
                                    <span style="font-size: 12px;">{{$entry->user->user_title}} | LV {{$entry->user->level}}</span>
                                  </time>
                                </div>
                              </div>
                            </td>

                            <td class="estimate" style="vertical-align: top">
                              <div class="event-author author-freshness inline-items" style="vertical-align: middle;margin-bottom: -5px">
                                <div class="author-thumb" style="position: sticky; height: 50px;">
                                  <a href="UserProfile-AboutMe.html" target="_blank">
                                    <img src="svg-icons/Competition/{{addOrdinalNumberSuffix($entry->rank)}}.svg" alt="author" style="vertical-align: top; width: 50px; height: 48px;margin-left: -3px;">
                                  </a>
                                </div>
                                <div class="author-freshness">
                                    <span class="h6 title" style="margin-top: -5px; font-size: 12px">
                                      @if($entry->rank == 1) Champion!
                                      @elseif($entry->rank == 2) Runner Up
                                      @elseif($entry->rank == 3) Third Place
                                      @elseif($entry->rank == 4) forth Place
                                      @else {{addOrdinalNumberSuffix($entry->rank)}}
                                      @endif
                                    </span>
                                  <time class="entry-date updated" datetime="2017-06-24T18:18">
                                    <span style="font-size: 12px;">{{addOrdinalNumberSuffix($entry->rank)}} / {{$contest->total_entries}}</span>
                                  </time>
                                </div>
                              </div>
                            </td>
                            <td class="estimate" style="vertical-align: top">
                              <div id="accordion" role="tablist" aria-multiselectable="true" style="">
                                <div class="card" style="margin-bottom: -5px">
                                  <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px;">
                                    <h6 class="mb-0">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseReward-{{$entry->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        <img src="svg-icons/menu/trophy.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                                        <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Reward Details</span>
                                        <svg class="olymp-dropdown-arrow-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                        </svg>
                                      </a>
                                    </h6>
                                  </div>
                                  <div id="collapseReward-{{$entry->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20">
                                    <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                                      <div class="ui-block-content">
                                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Position</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$entry->position_prize}}/{{$contest->total_entries}}</span></span></div>
                                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Completed</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$entry->updated_at}}</span></span></div>
                                        <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Prize Awarded</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">${{$entry->prize_award}}</span> HKD </span></div>
                                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skill Points Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$entry->sbp_award}} SBP</span></span></div>
                                      </div>
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
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseContestPreview-{{$entry->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                                        <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
                                        <svg class="olymp-dropdown-arrow-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                        </svg>
                                      </a>
                                    </h6>
                                  </div>
                                  <div id="collapseContestPreview-{{$entry->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
                                    <div class="ui-block" style="margin-bottom: 0px">
                                      <form action="javascript:;" method="post" class="cart-main">
                                        <!-- Shop Table Cart -->
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
                                        <!-- ... end Shop Table Cart -->
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="add-event align-center" style="vertical-align: top">
                              <a href="/Seeker-ProjectBid-Details.html" class="btn btn-sm btn-border-think c-grey btn-transparent" style="padding: 14px 0px">#{{$entry->id}}</a>
                            </td>

                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>



                @endif
              </div>
              @if( Auth::user() && !$contest->user_posted() && !$contest->is_author() && !$contest->is_completed )
                <a href="javascript:;" class="btn btn-blue btn-md-2" data-toggle="modal" data-target="#popup-place-bid">Submit Entry Now</a>
              @endif
            @endif
          </div>
          <!-- ... end News Feed Form  -->
        </div>
      </div>
    </div>
  </div>

  @include('modal.entry')
  @auth
    <div class="modal fade modal-target" id="payment_contest" tabindex="-1" role="dialog" aria-labelledby="popup-place-bid"
         aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
            </svg>
          </a>
          <div class="modal-header">
            <h6 class="title">Pay to complete contest</h6>
          </div>
          <div class="modal-body">
            <!-- biding -->
            <form class="form-payment_contest" method="post" action="" data-parsley-validate>
              @csrf
              <div class="row">
                <input type="hidden" name="contest_id" value="{{$contest->id ?? ''}}" />
                <h3>Your wallet: ${{$user->wallet}}</h3>
                <button class="btn btn-blue btn-md full-width submit-test " type="submit" >Accept pay</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endauth
  <a href="javascript:;" class="btn btn-sm btn-border-think c-grey btn-transparent tag-user tag-user-unsave d-none" style="padding: 14px 0px;font-size: 12px">
    <svg class="svg-inline--fa fa-bookmark fa-w-12" aria-hidden="true" style="margin-right: 6px;" data-prefix="far" data-icon="bookmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
      <path fill="currentColor" d="M336 0H48C21.49 0 0 21.49 0 48v464l192-112 192 112V48c0-26.51-21.49-48-48-48zm0 428.43l-144-84-144 84V54a6 6 0 0 1 6-6h276c3.314 0 6 2.683 6 5.996V428.43z"></path>
    </svg>Tag User
    <div class="ripple-container"></div>
  </a>
  <a href="javascript:;" class="btn btn-secondary btn-sm btn-icon-left tag-user tag-user-save d-none" style="padding: 14px 0px;font-size: 12px;linear-gradient(#B0CADD, #7E92A1);font-weight: 500;color: #FFFFFF">
    <svg class="svg-inline--fa fa-bookmark fa-w-12" aria-hidden="true" data-prefix="fa" data-icon="bookmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
      <path fill="currentColor" d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z"></path>
    </svg>User Tagged
    <div class="ripple-container"></div>
  </a>
  <a href="javascript:;" data-id="" class="btn btn-purple btn-sm btn-icon-left lock_decision d-none" style="margin-top:0px; background-image: linear-gradient(#57596E, #3F4257);font-weight: 500;padding: 14px 0px;font-size: 11px">
    <i class="fa fa-lock" aria-hidden="true"></i>Lock Decision?
  </a>
  <input type="hidden" name="sum_entry" value={{ $contest->total_entries }}>
  <input type="hidden" name="_contest" value={{ $contest->id }}>
  <input type="hidden" name="post_entry" value="{{route('contest.ajaxPostTest')}}">
  <input type="hidden" name="set_winner" value="{{route('contest.ajaxSetWinner')}}">
  <input type="hidden" name="lockunlock" value="{{route('contest.lockunlock')}}">
  <input type="hidden" name="paymentcontest" value="{{route('contest.paymentcontest')}}">
  <input type="hidden" name="changeshortlistentry" value="{{route('contest.changeShortListEntry')}}">
@endsection

@section('styles')
  <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/parsleyjs/css/parsley.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/boss/libs/css/dropzone.css')}}">
@endsection
@section('scripts')
  <script src="{{ asset('public/assets/boss/libs/js/dropzone.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>

  <script type="text/javascript" src="{{asset('public/frontend/js/newjob.js')}}"></script>

  <script type="text/javascript">
    $(document).on('submit', '.form-post_test', function (e) {
      e.preventDefault();

      var form = $(this);

      var data = new FormData(form[0]);
      data.append('files_preview', form.find('input[name=files_preview]').val());
      data.append('files', form.find('input[name=files]').val());
      console.log(data);

      url = $('input[name=post_entry]').val();

      callAjax(url,data, function(res){
        console.log(res);
        if(res.error == false){
          jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          setTimeout(function(){window.location.reload();} , 2000);
        }else{
          if(!$.isPlainObject(res.message)){
            jQuery.sticky(res.message, {classList: 'important', speed: 200, autoclose: 5000});
          }else {
            $.each(res.message, function(key,value) {
              jQuery.sticky(value[0], {classList: 'important', speed: 200, autoclose: 5000});
            });
          }
          // swal(res.message);
        }
      },true);

    });

    $(document).on('click', '.set_winner', function (e) {
      e.preventDefault();
      var id = $(this).data('test_id');
      swal("Are you sure?")
        .then((value) => {
          if(value) {
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'POST',
              url: $('input[name=set_winner]').val(),
              data: 'id='+id,
              success: function (data) {
                if (data.error == false) {
                  jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                  setTimeout(function(){window.location.reload();} , 2000);
                }else{
                  if(!$.isPlainObject(data.message)){
                    jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }else {
                    $.each(data.message, function(key,value) {
                      jQuery.sticky(value[0], {classList: 'important', speed: 200, autoclose: 5000});
                    });
                  }
                }
              }
            });
          }
        });
    });
    function runajax(id_contest,id,position,type,lock,loca) {
      contest_id = $('input[name=_contest]').val()
      form_data = 'id_contest='+id_contest+'&position='+position+'&type='+type+'&entry_id='+id;
      url = $('input[name=lockunlock]').val();
      callAjax(url,form_data, function(res){
        if(res.error == false){
          jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          $('#contest-rank').html(res.dataContest);
          lock.html(res.dataLock);

          var ps = parseInt(position);


          if(position == 1){
            var rank = '1st';
          }else if(position == 2){
            var rank = '2nd';
          }else if(position == 3){
            var rank = '3rd';
          }else{
            var rank = position+'th';
          }

          if(type=="unlock"){
            $('.select-rank-'+ps).prop('disabled', false).html(rank+' Place').closest('li').removeClass('disabled');
            loca.find('.select-rank-'+ps).removeAttr('selected');
            loca.find('.select-null').prop('selected',true).prop('enable',true);
            save1 = $('.tag-user-save.d-none').clone().removeClass('d-none');
            save1.attr('data-id',id)
            lock.html(save1);
          }
          else{
            $('.select-rank-'+ps).prop('disabled', true).html(rank+' (Locked)').closest('li').addClass('disabled');
            $('.selectrank').each(function() {
              if($(this).find("option:selected").val() == ps)
                $(this).find('.select-null').prop('selected',true);
            });
            loca.find('.select-rank-'+ps).prop('selected',true);
          }
          // setTimeout(function(){window.location.reload();} , 2000);
        }else{
          swal(res.message, '', 'warning');
        }
      });
    }
    $(document).on('click', '.unlock_decision', function (e) {
      e.preventDefault();
      var id_contest = $('input[name=_contest]').val();
      var id = $(this).data('id');
      var lock = $(this).closest('td');
      var loca = $(this).closest('tr');
      var position = $(this).closest('tr').find('select option:selected').val();
      swal("Are you sure?")
        .then((value) => {
          if(value) {
            runajax(id_contest,id,position,type='unlock',lock,loca);
          }
        });
    });
    $(document).on('click', '.lock_decision', function (e) {
      e.preventDefault();
      var id_contest = $('input[name=_contest]').val();
      var id = $(this).data('id');
      var lock = $(this).closest('td');
      var loca = $(this).closest('tr');
      var position = $(this).closest('tr').find('select option:selected').val();

      if(position == 0) {
        swal("Please select place", '', 'warning');
      }else {
        swal("Are you sure?")
          .then((value) => {
            if(value) {
              runajax(id_contest,id,position,type='lock',lock,loca);
            }
          });
      }
    });
    $(document).on('change', '.selectrank', function (e) {
      e.preventDefault();
      var t = parseInt($(this).val());
      var id = $(this).data('id');
      if(t == 1 || t == 2 || t == 3 || t == 4){
        $(this).closest('tr').find('.lock_decision').remove();
        lock = $('.lock_decision.d-none').clone().removeClass('d-none');
        lock.attr('data-id',id);
        $(this).closest('tr').find('.tag-user').after(lock);
        $(this).closest('tr').find('.tag-user').hide();
      }else if(t == 0){
        $(this).closest('tr').find('.lock_decision').remove();
        $(this).closest('tr').find('.lock_decision').addClass('d-none');
        $(this).closest('tr').find('.tag-user').show();
      }
    });

    function ajax_shortlist(type, id, _this){
      if(type == 'remove'){
        btn_clone = $('.tag-user-unsave.d-none').clone().removeClass('d-none');
      }else {
        btn_clone = $('.tag-user-save.d-none').clone().removeClass('d-none');
      }
      btn_clone.attr('data-id', id);
      url = $('input[name=changeshortlistentry]').val();
      data = 'id='+id+'&type='+type;
      callAjax(url,data, function(res){
        if(res.error == false){
          _this.after(btn_clone);
          _this.remove();
          swal(res.message);
        }else{
          swal(res.message);
        }
      });
    }
    $(document).on('click', '.tag-user-save', function (e) {
      _this = $(this);
      id = _this.data('id');
      ajax_shortlist('remove', id, _this);
    });

    $(document).on('click', '.tag-user-unsave', function (e) {
      _this = $(this);
      id = _this.data('id');
      ajax_shortlist('add', id, _this);
    });

    $(document).on('click', '.confirm_contest', function (e) {
      e.preventDefault();
      $('#payment_contest').modal('show');
      // swal("Please payment to complete contest");
    });

    $(document).on('submit', '.form-payment_contest', function (e) {
      e.preventDefault();
      form_data = $(this).serialize();
      console.log(form_data);
      url = $('input[name=paymentcontest]').val();
      callAjax(url,form_data, function(res){
        if(res.error == false){
          jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          setTimeout(function(){window.location.reload();} , 2000);
        }else{
          swal(res.message, '', 'warning');
        }
      });
    });


    //add custom parsley max files
    window.Parsley.addValidator('maxFile', {
      validateString: function(_value, max, parsleyInstance) {
        if (!window.FormData) {
          alert('You are making all developpers in the world cringe. Upgrade your browser!');
          return true;
        }
        var files = parsleyInstance.$element[0].files;
        if(files.length > max)
          return false;
      },
      requirementType: 'integer',
      messages: {
        en: 'This field max %s files',
      }
    });







  </script>
@endsection
