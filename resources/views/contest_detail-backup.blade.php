@extends('layouts.master')
@section('title')
  Contest Detail
@endsection
@section('content')
  <div class="container">
    <div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
       <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
          <div class="ui-block-title" style="padding-left: 0px">
             <h3 style="font-size: 17px;color: #FFFFFF;"><img src="img/screens.svg" width="100" class="olymp-heart-icon" style=" border-radius: 0%; width: 70px;margin-left: 0px;margin-left: 6px;margin-top: -2px">Contest: {{$contest->name_contest}}</h3>
          </div>
       </div>
       <div class="ui-block" style="border: 0px solid #e6ecf5;">
          <!-- News Feed Form  -->
          <div class="news-feed-form" style="background-color: #edf2f6;padding-bottom: 50px;border: 0px solid #e6ecf5;">
             <!-- Nav tabs -->
             <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px">
                <li class="nav-item"  >
                   <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#milestones" role="tab" aria-expanded="true">
                      <img src="svg-icons/menu/podium.svg" class="olymp-status-icon" style="margin-right: 5px">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                      </svg>
                      <span>Entries & Podium</span>
                   </a>
                </li>
                @if($contest->is_author())
                <li class="nav-item">
                   <a class="nav-link inline-items" data-toggle="tab" href="#locked" role="tab" aria-expanded="false">
                      <img src="svg-icons/menu/folder.svg" class="olymp-status-icon" style="margin-right: 5px">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                      </svg>
                      <span>Contest Files {{( !$contest->is_completed ) ? '(Locked)' : ''}}</span>
                   </a>
                </li>
                @endif
                @if($contest->is_completed)
                <li class="nav-item">
                   <a class="nav-link inline-items" data-toggle="tab" href="#results" role="tab" aria-expanded="false">
                      <img src="svg-icons/menu/trophy.svg" class="olymp-status-icon" style="margin-right: 5px">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                      </svg>
                      <span>Results</span>
                   </a>
                </li>
                @endif
             </ul>
             <!-- Tab panes -->
             <div class="tab-content no-padding">
                <div class="tab-pane active" id="milestones" role="tabpanel" aria-expanded="true">
                  @if($contest->is_author() && !$contest->is_completed)
                   <div class="ui-block responsive-flex1200">
                      <div class="ui-block-title">
                        @for($i=1; $i<5; $i++)
                          <?php $vitri = $contest->vitri($i);?>
                          <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent">
                            <img src="svg-icons/Create Job/{{($vitri) ? 'checked' : 'incomplete'}}.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                          {{addOrdinalNumberSuffix($i)}} | {{($vitri) ? 'Done' : 'Please Select'}}</a>
                        @endfor
                        @if($contest->hasrank()>=4)
                          <a href="javascript:;" class="btn  btn-md-2 btn-icon-left" style="background-image: linear-gradient(#59A4FF, #2190EC);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>{{$contest->hasrank()}}/4</a>
                          <a href="javascript:;" class="btn  btn-md-2 btn-icon-left confirm_contest" style="background-image: linear-gradient(#A3E12A, #7CB905);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>CONFIRM</a>
                        @else
                          <a href="javascript:;" class="btn  btn-md-2 btn-icon-left" style="font-weight: 500;background-image: linear-gradient(#57596E, #3F4257)"><i class="fa fa-lock" aria-hidden="true"></i>{{$contest->hasrank()}}/4</a>
                        @endif
                      </div>
                   </div>
                  @endif
                   <div class="ui-block">
                      <table width="93%" class="event-item-table event-item-table-fixed-width">
                         <thead style="background-color: #646464">
                            <tr>
                               <th width="20%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                  ALCHEMIST
                               </th>
                               <th width="21%" class="description align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                  DELIVERY DATE
                               </th>
                               <th width="46%" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                  FILE PREVIEW<img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 2px; margin-left: 5px">
                               </th>
                               <th width="13%" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
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
                            <div class="photo-album-item create-album"  style="position: relative;padding-top: 100px;padding-bottom: 100px">
                               <a href="javascript:;"  data-toggle="modal" data-target="#create-photo-album"#
                                  ></a>
                               <div class="content" style="margin-top: 10px">
                                  <a href="javascript:;" class="btn btn-control bg-secondary" data-toggle="modal" data-target="#create-photo-album">
                                     <img src="svg-icons/JobCard/padlock.svg" class="olymp-plus-icon" style="margin-top: -14px">
                                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                     </img>
                                  </a>
                                  <a href="javascript:;" class="title h5" data-toggle="modal" data-target="#create-photo-album">Files Locked</a>
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
                         <table class="shop_table cart">
                            <thead>
                               <tr>
                                  <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
                                  <th class="product-quantity">DATE UPLOADED</th>
                                  <th class="product-subtotal">DOWNLOAD</th>
                               </tr>
                            </thead>
                            <tbody class="alldownload">
                              @foreach($contest->delivery_att() as $file)
                                @include('template_part.content-attachdelivery')
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
                      <table width="93%" class="event-item-table event-item-table-fixed-width">
                         <thead style="background-color: #646464">
                            <tr>
                               <th width="9%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                  POSITION
                               </th>
                               <th width="18%" class="description align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                  ALCHEMIST
                               </th>
                               <th width="28%" class="description align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                  DETAILS
                               </th>
                               <th  class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                  FILE PREVIEW<img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 2px; margin-left: 5px">
                               </th>
                               <th width="10%" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                  ACTION
                               </th>
                            </tr>
                         </thead>
                         <tbody>
                          @foreach($contest->entries_rank() as $entry)
                            <tr class="event-item">
                               <td class="freshness inline-items" align="center" style="vertical-align: top">
                                  <div class="author-freshness" style="margin-top: -10px"> <img src="svg-icons/Competition/{{addOrdinalNumberSuffix($entry->rank)}}.svg" alt="Cup" style="vertical-align: top; width: 50px;">
                                     <br>
                                     <a class="h6 title" style="margin-top: 5px">
                                      @if($entry->rank == 1) Winner
                                      @elseif($entry->rank == 2) Runner Up
                                      @else {{addOrdinalNumberSuffix($entry->rank)}}
                                      @endif
                                     </a>
                                     <time class="entry-date updated" ><span style="font-size: 12px;">{{addOrdinalNumberSuffix($entry->rank)}} / {{$contest->total_entries}}</span></time>
                                  </div>
                               </td>
                               <td class="freshness inline-items" align="center" style="vertical-align: top">
                                  <div class="author-freshness" style="margin-top: -5px">
                                    {!!$entry->user->avatar_img!!}
                                     <br>
                                     <br>
                                     <a href="javascript:;" class="h6 title" style="margin-top: -5px">{{$entry->user->full_name}} <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
                                     <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">{{$entry->user->user_title}} | LV {{$entry->user->level}}<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
                                  </div>
                               </td>
                               <td class="estimate" style="vertical-align: top">
                                  <a href="javascript:;" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px"> ${{$entry->prize_award}} USD | {{$entry->sbp_award}} SBP </a>
                                  <div id="accordion" role="tablist" aria-multiselectable="true">
                                     <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
                                        <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
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
                                  <a href="javascript:;" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
                                  <div id="accordion" role="tablist" aria-multiselectable="true">
                                     <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
                                        <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
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
                                                 <table class="shop_table cart">
                                                    <thead>
                                                       <tr>
                                                          <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
                                                       </tr>
                                                    </thead>
                                                    <tbody class="alldownload">
                                                      @forelse($entry->preview_attachments() as $file)
                                                        @include('template_part.content-attachdispute')
                                                      @empty
                                                        <td>no file</td>
                                                      @endforelse
                                                       <tr>
                                                          <td colspan="4" class="actions" style="padding-left: 25px">
                                                             <a data-toggle="modal" data-target="javascript:;" href="" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                                                          </td>
                                                       </tr>
                                                    </tbody>
                                                 </table>
                                                 <!-- ... end Shop Table Cart -->
                                              </form>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </td>
                               <td class="add-event align-center" style="vertical-align: top">
                                 da
                                  <a  href="{{$entry->user->permalink()}}"  class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E;font-weight: 500;color: #FFFFFF"><i class="fa fa-eye" aria-hidden="true" ></i>VIEW PROFILE</a>
                                  <a href="javascript:;" class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#FF5E3A, #FF5E3A);font-weight: 500;color: #FFFFFF
                                     "><i class="fa fa-bookmark" aria-hidden="true"></i>HIRE</a>
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

<input type="hidden" name="_contest" value={{ $contest->id }}>
<input type="hidden" name="post_entry" value="{{route('contest.ajaxPostTest')}}">
<input type="hidden" name="set_winner" value="{{route('contest.ajaxSetWinner')}}">
<input type="hidden" name="lockunlock" value="{{route('contest.lockunlock')}}">
<input type="hidden" name="paymentcontest" value="{{route('contest.paymentcontest')}}">
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
    function runajax(id,position,type) {
      contest_id = $('input[name=_contest]').val()
      form_data = 'position='+position+'&type='+type+'&entry_id='+id;
      url = $('input[name=lockunlock]').val();
      callAjax(url,form_data, function(res){
          if(res.error == false){
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            setTimeout(function(){window.location.reload();} , 2000);
          }else{
            swal(res.message, '', 'warning');
          }
      });
    }
    $(document).on('click', '.unlock_decision', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      var position = $(this).closest('td').find('select option:selected').val();
      swal("Are you sure?")
      .then((value) => {
        if(value) {
          runajax(id,position,type='unlock');
        }
      });
    });
    $(document).on('click', '.lock_decision', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      var position = $(this).closest('td').find('select option:selected').val();
      if(position == '') {
        swal("Please select place", '', 'warning');
      }else {
        swal("Are you sure?")
        .then((value) => {
          if(value) {
            runajax(id,position,type='lock');
          }
        });
      }
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
