@extends('layouts.master')
@section('title')
  Contest Detail
@endsection
@section('content')
  <div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
      <div class="row">
        <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12" style="margin-top: -110px">
          <div class="main-header-content" style="margin-bottom: 60px">

            <h1>Contest Details</h1>
            <p>Welcome to the Alchemunity Project Search. Search Projects from all across the globe by skill, level,  price, location and spoken languages. Review comprehensive Seeker details to find your best match!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="container">
   <div class="row" style="margin-top: -110px;">
     <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
       <nav aria-label="Page navigation" style="z-index: 2">
         <ul class="pagination " style="margin: 0px 0px -1px 0px">
           <li class="page-item" style="padding-left: 0px;">
             <a class="page-link" href="{{route('getListAllContest')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Go Back</a>
           </li>
           <li class="page-item disabled " >
             <a class="page-link " tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Contest Details</a>
           </li>

         </ul>
       </nav>

       <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;border-top-left-radius: 0%;" >
         <div class="ui-block-title">
           <h4><strong>Contest Details:</strong> {{$contest->name_contest}}</h4>
         </div>
       </div>
     </div>

   </div>
</div>
<div class="container">
   <div class="row">
      <div  class="col col-xl-4 order-xl-3 col-lg-4 order-lg-3 col-md-12 order-md-2 col-sm-12 col-12 responsive-display">

        <!-- Your Profile  -->

        <div class="your-profile">
          <div class="post-thumb" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">

            <a href="#" class="post-category  full-width align-center" style="background-image: linear-gradient(#73757e, #3f4257); padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 14px;font-weight: 500;color: #fff">Seeker Information</a>
          </div>


          @include('template_part.information', ['user'=>$contest->user, 'content'=>'0'])
        </div>

        <!-- ... end Your Profile  -->
        <div class="ui-block" style="margin-top: 15px; margin-bottom: 0px">
            <div class="ui-block-title">
               <div class="h6 title">Supporting Files</div>
            </div>
            <form action="#" method="post" class="cart-main">
               <!-- Shop Table Cart -->
               <table class="shop_table cart">
                  <tbody class="alldownload">
                     @forelse($contest->author_attachments() as $file)
                        @include('template_part.content-attachdispute')
                     @empty
                        <td style="padding-left: 25px ;padding-top: 10px;padding-bottom: 10px;border-bottom: 1px solid #e6ecf5;">no file</td>
                     @endforelse
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
      </div>
      <div class="col col-xl-5 order-xl-2 col-lg-8 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
        <?php
        $diff = abs(strtotime($contest->time_end) - strtotime($contest->time_start));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
        if ($days == 0){
          $days = 1;
        }
        ?>
         <div class="ui-block">
            <div class="post-thumb" style="margin: 0px 0px 0px 0px; ">
               <a href="javascript:;" class="post-category bg-smoke full-width align-center" style="padding-top: 10px;padding-bottom: 10px; margin: 0px;border-radius: 0px; font-size: 14px;color: #858AA6;background-image: linear-gradient(#FFFFFF, #FAFBFD);border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">${{$contest->total_prize}} USD | {{$days}} DAY</a>
            </div>
           <div class="friend-header-thumb" >
             <img src="img/featured-contest-bg-.svg" alt="friend">
           </div>
            <article class="hentry post video">
               @include('template_part.part-infouser', ['user' => $contest->user] )
              <div class="post__author author vcard inline-items author-info" style="padding-top: 10px;padding-bottom: 10px;border-top: solid 1px #E6ECF5;border-bottom: solid 1px #E6ECF5;">
                <a data-toggle="tooltip" data-placement="top" title="POSTED JOBS" href="javascript:;" class="post-add-icon inline-items">
                  <img src="svg-icons/JobCard/paper-plane.svg" class="olymp-heart-icon">
                  <span>{{$contest->user->total_jobs()}}</span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="REVIEWS" href="javascript:;" class="post-add-icon inline-items">
                  <img src="svg-icons/JobCard/interface.svg" class="olymp-heart-icon">
                  <span>{{$contest->user->reviews->count()}}</span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="SEEKER POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
                  <img src="svg-icons/JobCard/seo-and-web.svg" class="olymp-heart-icon" style="border-radius: 0%;width: 15px">
                  <span>SP | LV {{$contest->user->level}}</span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="REPUTAION POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
                  <img src="svg-icons/JobCard/yes.svg" class="olymp-heart-icon">
                  <span>RP | LV {{$contest->user->rp_level}}</span>
                </a>
              </div>
              <div class="post__date day-post" >
                <time class="published" datetime="2004-07-24T18:18">
                  Posted: {{$contest->created_at->format('H:i, Y-m-d')}}
                </time>
              </div>
               <div class="post__author author vcard   inline-items" >
                  <div class="author-date">
                     <a class="h6 post__author-name fn" href="#" style="word-wrap: break-word; padding-right: 8px; font-weight: 500; margin-bottom: 0px; line-height: 20px">{{$contest->name_contest}}</a>
                  </div>
               </div>
               {!!nl2br($contest->rules)!!}
               <div class="post__date" style="margin-bottom: 10px; margin-top: 5px">


                 <div class="post__date" style="margin-bottom: 10px; margin-top: -5px; padding-bottom: 15px; border-bottom: solid 1px #E6ECF5;">
                   <time data-toggle="tooltip" data-placement="top" title="DATE POSTED" class="published" datetime="2004-07-24T18:18">
                     <img src="svg-icons/menu/post-it.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 9px;margin-left: 1px;">{{$contest->created_at->diffForHumans()}}
                   </time>
                   <a data-toggle="tooltip" data-placement="top" title="DAYS LEFT TO BID" href="#" class="post-add-icon inline-items">
                     <img src="svg-icons/JobCard/timer.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: 10px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use><span style="font-weight: 400;color: #888DA8">{{$contest->day_left}} </span> <span style="font-weight: 400;color: #888DA8;">Days Left</span>
                   </a>
                   <div class=" inline-items" style="margin-top: 5px" >
                     <a data-toggle="tooltip" data-placement="top" title="FIAT PRICE" href="#" class="post-add-icon inline-items">
                       <img src="svg-icons/menu/target-square.svg" class="olymp-heart-icon" style="border-radius: 0%"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></img><span style="font-weight: 400;color: #888DA8">${{$contest->total_prize}}</span> <span style="font-weight: 400;color: #888DA8"> USD</span>
                     </a>
                     <a data-toggle="tooltip" data-placement="top" title="JOB DELIVERY ESTIMATE" href="#" class="post-add-icon inline-items" style="margin-left: 10px">
                       <img src="svg-icons/JobCard/checked-calendar-icon-01.svg" class="olymp-heart-icon" style="border-radius: 0%"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></img><span style="font-weight: 400;color: #888DA8">{{$days}}</span> <span style="font-weight: 400;color: #888DA8">Day Project</span>
                     </a>
                   </div>
               </div>
               <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                 <div class="skills-item-info" style="padding-bottom: 0px;margin-bottom: 8px;"><span class="skills-item-title"><span style="color: #9a9fbf; padding-bottom: 5px;padding-right: 3px;font-size: 22px;font-weight: 500;vertical-align: sub;">●</span><span style="color: #525488; padding-bottom: 5px;padding-left: 0px; padding-right: 8px;font-size: 13px;font-weight: 500">Categories</span><span style="color: #38a9ff; padding-bottom: 5px;padding-right: 3px;font-size: 22px;font-weight: 500; vertical-align: sub;">●</span><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skills</span></span> </div>

                 <div class=" inline-items"  >

                     @foreach($contest->categories as $cat)
                     <a class="btn btn-secondary btn-sm" style="padding-top: 4px;padding-bottom: 4px; padding-left: 10px;padding-right: 10px" href="javascript:;">{{$cat->name}}</a>
                     @endforeach

                     @foreach($contest->skill as $sk)
                     <a class="btn btn-blue btn-sm" style="padding-top: 4px;padding-bottom: 4px; padding-left: 10px;padding-right: 10px" href="javascript:;">{{$sk->name}}</a>
                     @endforeach
                  </div>
               </div>
                 <div class="col col-lg-3 col-md-3 col-sm-3 col-3 float-right no-padding share-job" >
                   <div class="comments-shared float-right">
                     <a data-toggle="modal" data-target="#create-friend-group-add-friends" data-toggle="tooltip" data-placement="TOP" title="SHARE JOB" data-toggle="modal" data-target="#create-friend-group-add-friends" href="javascript:;" class="post-add-icon inline-items">
                       <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                       <span>0</span>
                     </a>
                   </div>
                 </div>

                 <div class="col col-lg-5 col-md-5 col-sm-5 col-5 no-padding inline-items share-job float-left" >
                   <div>
                     <a data-toggle="tooltip" data-placement="top" title="Alchemist Bids" href="javascript:;" class="post-add-icon inline-items" style="margin-left: 0px; color: #888DA8 ">
                       <img src="svg-icons/JobCard/profile.svg" class="olymp-heart-icon">
                       <span >3</span>
                     </a>
                     <a data-toggle="tooltip" data-placement="top" title="AVERAGE BID" href="javascript:;" class="post-add-icon inline-items"style="color: #888DA8; margin-left: 10px">
                       <img src="svg-icons/JobCard/average.svg" class="olymp-heart-icon">
                       <span>12</span>
                     </a>
                   </div>
                 </div>
               </div>
            </article>
           <div class="comment-form-1 inline-items">
             <?php
             $s_text = ($contest->is_saved()) ? 'SAVED' : 'SAVE';
             $bg = ($contest->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
             ?>
             <a href="javascript:;" data-id="{{$contest->id}}" data-toggle="modal" data-target="#popup-place-bid" class="btn btn-md-2 btn-blue float-right bid_now " style="background-color: #90CB1E;min-height: 44px;margin:15px 0 0">ENTER</a>
             <a href="javascript:;" data-id="{{$contest->id}}" class="btn btn-md-2 btn-primary float-right {{$bg}} save_contest" style="padding: 8px 12px 8px 12px;margin: 15px 15px 0 0; border-color: white;">
               <img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px">
             </a>
             <a href="{{$contest->permalink()}}"  class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color" style="margin-top: 15px; padding: 13px 25px 13px 25px;">CONTEST DETAILS</a>
           </div>
         </div>
      </div>
      <div  class="col col-xl-3 order-xl-1 col-lg-4 order-lg-1 col-md-12 order-md-1  col-sm-12 col-12 responsive-display">
         <div class="ui-block">
            <div class="ui-block-title">
               <h6 class="title">Contest ID: {{$contest->id}}</h6>
            </div>
            <div class="ui-block-content">
              @auth
               @if( Auth::user() && !$contest->user_posted() && !$contest->is_author() && !$contest->is_completed )
               <a href="javascript:;" class="btn btn-green btn-md-2 full-width" data-toggle="modal" data-target="#popup-place-bid"><img src="svg-icons/JobCard/target.svg" class="olymp-heart-icon " style="width: 16px;margin-right: 5px;padding-bottom: 2px; vertical-align: middle"> ENTER CONTEST</a>
               @endif
               <a href="javascript:;" class="btn btn-secondary btn-md-2 full-width"><img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon " style="width: 16px;margin-right: 5px;padding-bottom: 2px; vertical-align: middle"> SAVE CONTEST</a>
              @endauth
            </div>
         </div>
         <div class="ui-block">
            <div class="ui-block-title">
               <h6 class="title">Contest Details</h6>
            </div>
            <div class="ui-block-content" style="padding-bottom: 10px">
               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Entry Starts</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$contest->time_start}}</span></span></div>
               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Entry Ends</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$contest->time_end}}</span></span></div>
               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Post Date</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$contest->created_at->format('d-m-Y')}}</span></span></div>
               <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Contest Total</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">${{$contest->total_prize}}</span> HKD </span></div>
            </div>
           {{--<div class="your-profile" style="border-top: solid; border-top-width: 1px;border-top-color: #E6ECF5">
             @include('template_part.information', ['user'=>$contest->user])
           </div>--}}
         </div>
      </div>
   </div>
</div>

  @include('modal.entry')
<input type="hidden" name="_contest" value={{ $contest->id }}>
<input type="hidden" name="post_entry" value="{{route('contest.ajaxPostTest')}}">
<input type="hidden" name="set_winner" value="{{route('contest.ajaxSetWinner')}}">
<input type="hidden" name="lockunlock" value="{{route('contest.lockunlock')}}">
<input type="hidden" name="paymentcontest" value="{{route('contest.paymentcontest')}}">
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('public/assets/boss/libs/css/dropzone.css')}}">
@endsection
@section('scripts')
    <script src="{{ asset('public/assets/boss/libs/js/dropzone.js')}}"></script>

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
