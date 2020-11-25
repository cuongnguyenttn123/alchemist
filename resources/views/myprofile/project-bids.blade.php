@extends('layouts.master')
@section('title')
Project Bids
@endsection
@if(Auth::id())
@section('content')
  <div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
      <div class="row">
        <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12" style="margin-top: -110px">
          <div class="main-header-content" style="margin-bottom: 60px">

            <h1>Bids &amp;  Negotiation</h1>
            <p>Win more projects with your mad negotiation skills!Chat freely with the Project Seeker before commiting to your final Bid price. Edit your current bid, delivery time, files and milestone setup. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="margin-top: -110px">
     <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <nav aria-label="Page navigation" style="z-index: 2">
             <ul class="pagination " style="margin: 0px 0px -2px 0px">
                <li class="page-item" style="padding-left: 0px;">
                   <a class="page-link" href="{{route('profile.myprojects')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Go Back</a>
                </li>
                <li class="page-item disabled " >
                   <a class="page-link " href="javascript:;" tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Alchemist Bids</a>
                </li>
             </ul>
          </nav>
           <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;border-top-left-radius: 0%;">
              <div class="ui-block-title">
                 <h4>Project Bids: {{$project->name}}</h4>
              </div>
           </div>
          <form method="get" action="{{route('search.alchemist')}}">
           <div class="ui-block">
              <!-- News Feed Form  -->
              <div class="news-feed-form">
                 <div class="tab-content no-padding">
                    <div class="tab-pane active" id="milestones" role="tabpanel" aria-expanded="true">
                       <div class="ui-block responsive-flex1200">
                         <div class="ui-block-title">

                           <div class="w-search" align="left">
                             <div class="form-group with-button">
                               <input class="form-control" type="text" name="search" value="{{old('search',$_GET['search'] ?? '')}}" placeholder="Search by name">
                               <button>
                                 <svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                               </button>
                             </div>
                           </div>
                           <input type="hidden" name="id" value="{{$project->id}}">

                           <div class="w-select" align="right" style="padding-left: 2em;">
                             <div class="title"> Filter By:</div>
                             <fieldset class="form-group">
                               <select class="selectpicker form-control" name="order_by">
                                 <option value="">Sort</option>
                                 <option value="total_points" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'total_points' ? 'selected' : '' }}>Total Points</option>
                                 <option value="SP" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'SP' ? 'selected' : '' }}>Alchemist Points</option>
                                 <option value="RP" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'RP' ? 'selected' : '' }}>Reputation Points</option>
                                 <option value="rate" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'rate' ? 'selected' : '' }}>Star Rating</option>
                                 <option value="projects_posted" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'projects_posted' ? 'selected' : '' }}># of Projects Posted</option>
                                 <option value="contests_posted" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'contests_posted' ? 'selected' : '' }}># of Contests Posted</option>
                                 <option value="completed_jobs" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'completed_jobs' ? 'selected' : '' }}># of Completed Jobs</option>
                                 <option value="total_disputes" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'total_disputes' ? 'selected' : '' }}>Total Disputes</option>
                                 <option value="disputes_win" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'disputes_win' ? 'selected' : '' }}>Disputes Won</option>
                                 <option value="disputes_lost" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'disputes_lost' ? 'selected' : '' }}>Disputes Lost</option>
                               </select>
                             </fieldset>
                           </div>

                           <div class="w-select" align="right">
                             <fieldset class="form-group">
                               <select class="selectpicker form-control" name="order_value">
                                 <option value="desc" {{ isset($_GET['order_value']) && $_GET['order_value'] == 'desc' ? 'selected' : '' }}>Descending</option>
                                 <option value="asc" {{ isset($_GET['order_value']) && $_GET['order_value'] == 'asc' ? 'selected' : '' }}>Ascending</option>
                               </select>
                             </fieldset>
                           </div>

                           <button class="btn btn-md-2 btn-secondary " style="padding: 8px 12px 8px 12px" align="right"><img src="svg-icons/JobCard/refresh-page-arrow-button.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px"></button>
                         </div>
                       </div>

                         @if(count($bids) == 0)
                           <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                             <a href="SearchProjects(Job).html"></a>

                             <div class="content" style="margin-top: 10px">

                               <a href="CreateJob.html" class="btn btn-control bg-primary">
                                 <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                               </a>

                               <a href="javascript:;" class="title h5">No Project Bids - Bids Now!</a>
                               <span class="sub-title">Project Bids &amp; active bids will be managed here</span>
                             </div>
                           </div>
                         @else
                            <div class="ui-block">
                              <table width="100%" class="seeker-project-bid event-item-table event-item-table-fixed-width">
                               <thead>
                               <tr>
                                 <th width="19%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                   ALCHEMIST
                                 </th>
                                 <th width="25%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                   MILESTONES
                                 </th>
                                 <th width="30%" class="description align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                   ALCHEMIST INFO
                                 </th>
                                 <th width="13%" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                   SHORTLIST
                                 </th>
                                 <th width="18%" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                   OPTION
                                 </th>
                               </tr>
                               </thead>
                               <tbody>
                               @if(is_array($bids) || is_object($bids))
                                 @foreach($bids as $bid)
                                   @include('template_part.content-projectbid', ['bid'])
                                 @endforeach
                               @endif
                               </tbody>
                             </table>
                            </div>
                          @endif

                    </div>

                 </div>
              </div>

              <!-- ... end News Feed Form  -->
           </div>
          </form>
        </div>
     </div>
  </div>
  <div class="modal fade" id="chatbox" tabindex="-1" role="dialog" aria-labelledby="chatbox" aria-hidden="true">
         <div class="modal-dialog window-popup edit-widget edit-widget-blog-post" role="document">
            <div class="modal-content">
               <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                  <svg class="olymp-close-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                  </svg>
               </a>
               <div class="popup-chat full-width chat-seeker">

               </div>
            </div>
         </div>
      </div>

<a href="javascript:;" class="btn btn-smoke btn-sm shortlisted remove-shortlist d-none" style="background-image: linear-gradient(#ff5e3a, #ff5e3a);font-weight: 400">SHORTLISTED
  <img src="svg-icons/JobCard/check-mark-white-on-black-circular-background.svg" width="12" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px">
</a>
<a href="javascript:;" class="btn btn-smoke btn-sm add-shortlist d-none">ADD TO SHORTLIST
   <img src="svg-icons/JobCard/plus-sign-in-a-black-circle.svg" width="12" hspace="1">
</a>
<a href="javascript:;" class="btn btn-control btn-more load_more_button d-none">
  <svg class="olymp-three-dots-icon">
     <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
  </svg>
</a>
<input type="hidden" name="_project" value={{ $project->id }}>
<input type="hidden" name="getBids" value={{ route('project.getBids') }}>
<input type="hidden" name="changeShortlist" value={{ route('project.changeShortlist') }}>
<input type="hidden" name="poststatus" value="{{route('bid.postmessage')}}">
<input type="hidden" name="previewimage" value="{{route('ajax.previewimage')}}">

  <!-- Confirm Award -->
  @include('modal.confirm-hire')

@endsection
@endif
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">
@endsection
@section('scripts')
<script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/chatmessage.js')}}"></script>
<script type="text/javascript">
   $(document).ready(function () {
      $(document).on('click', '.hire_me', function (e) {
          e.preventDefault();
          budget = $(this).data('budget');
          work_time = $(this).data('work_time');
          bid_id = $(this).data('bid_id');
          $('.form_award_bid').find('.bid_budget').text(budget);
          $('.form_award_bid').find('.bid_work_time').text(work_time);
          $('.form_award_bid').find('.bid_id').val(bid_id);
          $('.form_award_bid').find('.add-shortlist-1').attr('data-id', bid_id);
          return false;
      });
      $(document).on('click', '.confirm_hire', function (e) {
          form_data = $(this).closest('.form_award_bid').serialize();
          // console.log(form_data);
          $.ajax({
              type: 'POST',
              url: "{{route('ajax.award_bid')}}",
              data: form_data,
              success: function (data) {
                  if (data.error == false) {
                      swal("Your selection for this project has been successfully processed! Please wait for your selected Alchemist to accept the project. You can now find your project listed in the Current Projects Tab");
                      setTimeout(function () {
                          window.location.reload();
                      }, 2000);
                  } else {
                      jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }
              }
          });
      });
      $(document).on('click', '.load_more_button', function (e) {
          _this = $(this);
          length = $('.list_bid > div').length;
          val = $('select.btn_filter').val();
          id = $('input[name=_project]').val();
          url = $('input[name=getBids]').val();
          data = 'filter='+val+'&id='+id+'&length='+length+'&shortlist=shortlist';
          callAjax(url,data, function(res){
            if (res.data == '') {
              _this.remove();
            }else {
              $('.list_bid').append(res.data);
            }
          });
      });
      $(document).on('change', 'select.btn_filter', function (e) {
        clone_loadmore = $('.load_more_button').clone().removeClass('d-none');
          val = $(this).val();
          id = $('input[name=_project]').val();
          url = $('input[name=getBids]').val();
          data = 'filter='+val+'&id='+id+'&shortlist=shortlist';
          callAjax(url,data, function(res){
            $('.list_bid').html(res.data);
            if ($(".list_bid").siblings('.load_more_button').length == 0) {
              $('.list_bid').after(clone_loadmore);
            }
          });
      });

      function ajax_shortlist(type, id, _this){
        if(type == 'remove'){
          btn_clone = $('.add-shortlist.d-none').clone().removeClass('d-none');
        }else {
          btn_clone = $('.shortlisted.d-none').clone().removeClass('d-none');
        }
        btn_clone.attr('data-id', id);
        total_shortlist = $('.total_shortlist');
        url = $('input[name=changeShortlist]').val();
        data = 'id='+id+'&type='+type;
        callAjax(url,data, function(res){
            if(res.error == false){
              _this.after(btn_clone);
              _this.remove();
              $('.hp-notification-left').html(res.data1);
              $('.wrapmessage').html(res.data2);
              if(type == 'remove'){
                total_shortlist.html(parseInt(total_shortlist.html(), 10)-1);
              }
              else {
                total_shortlist.html(parseInt(total_shortlist.html(), 10)+1);
              }
            }else{
               swal(res.message);
            }
        });
      }

      //add-shortlist
      $(document).on('click', '.add-shortlist', function (e) {
         _this = $(this);
         id = _this.data('id');
         ajax_shortlist('add', id, _this);
      });
      $(document).on('click', '.add-shortlist-1', function (e) {
         _this = $('.add-shortlist');
         id = _this.data('id');
         ajax_shortlist('add', id, _this);
      });
      $(document).on('click', '.remove-shortlist', function (e) {
         _this = $(this);
         id = _this.data('id');
         ajax_shortlist('remove', id, _this);
      });


      //open bid message
      $(document).on('click', '.shortlist_message', function(e) {
         id = $(this).data('id');
         // console.log(id);
         // $('#hire-alchemist').find('form').find('input[name=id]').val(id);
         $('.popup-chat').find('form').find('input[name=id]').val(id);
         data = 'id='+id;
         url = "{{route('bid.getmessages')}}";
         callAjax(url,data, function(res){
            if(res.error == false){
              $('.popup-chat').html(res.data);
              $('.mCustomScrollbar').perfectScrollbar();
              CRUMINA.mediaPopups();
              window.callJs();
              window.chat_time();
              window.scrollToBottom();
            }else{
              swal(res.message);
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


   });
</script>
@endsection
