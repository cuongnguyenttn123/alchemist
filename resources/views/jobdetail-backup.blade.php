@extends('layouts.master')
@section('title')
  Job Detail
@endsection
@section('content')
    <div class="container">
       <div class="row">
          <!-- Main Content -->
          <div class="col col-xl-4 order-xl-3 col-lg-12 order-lg-3 col-md-12 col-sm-12 col-12">
             <div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12  no-margin no-padding ">
                <div class="ui-block">
                   <div class="friend-header-thumb">
                      <img src="img/browse-biddders-BANNER-01.svg" style="border-radius: 5px"  alt="">
                   </div>
                </div>
             </div>
             <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                <div class="ui-block responsive-flex1200">
                   <div class="ui-block-title">
                      <div class="w-select">
                         <div class="title" style="">Filter By:</div>
                         <fieldset class="form-group">
                            <select class="btn_filter selectpicker form-control">
                              <option value="">Select Filter</option>
                              <option value="id,desc">Latest Bids</option>
                              <option value="id,asc">Oldest Bids</option>
                              <option value="price,asc">Lowest Price</option>
                              <option value="price,desc">Highest Price</option>
                              <option value="">Most Bids</option>
                              <option value="">Fewest Bids</option>
                            </select>
                         </fieldset>
                      </div>
                   </div>
                </div>
             </div>
             <div class="list_bid">
                @foreach($project->bids->take(5) as $bid)
                  @include('template_part.content-bid', $bid)
                @endforeach
             </div>
             <a id="load_more_button" href="javascript:;" class="btn btn-control btn-more load_more_button">
                <svg class="olymp-three-dots-icon">
                   <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                </svg>
             </a>
          </div>
          <!-- ... end Main Content -->
          <!-- Left Sidebar -->
          <div class="col col-xl-5 order-xl-1 col-lg-7 order-lg-1 col-md-6 col-sm-6 col-12">
             <div class="crumina-sticky-sidebar">
                <div class="sidebar__inner">
                  @include('template_part.content-job-search', ['project'=>$project, 'jobdetail'=>'1'])
                </div>
             </div>
          </div>
          <!-- ... end Left Sidebar -->
          <!-- Right Sidebar -->
          <div class="col col-xl-3 order-xl-2 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
             <div class="crumina-sticky-sidebar middle_bar">
                <div class="sidebar__inner">
                   <div class="ui-block">
                      <!-- Your Profile  -->
                      <div class="your-profile">
                         <div class="post-thumb">
                            <div class="post-category full-width align-center bg-gradient-pink"><img style="display: inline;" src="svg-icons/JobCard/focus.svg"  hspace="1">SEEKER INFORMATION</div>
                         </div>
                         <div id="accordion-z" role="tablist" aria-multiselectable="true">
                            <div class="card">
                               <div class="card-header" role="tab" id="headingOne">
                                  <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-points" aria-expanded="true" aria-controls="collapseOne">
                                      <img src="svg-icons/sprites/star-icon.svg" width="15" hspace="1">
                                      <span>Points & Level</span>
                                      <svg class="olymp-dropdown-arrow-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                      </svg>
                                    </a>
                                  </h6>
                               </div>
                               <div id="collapseOne-points" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                  @include('template_part.content-userpoints', ['user'=>$project->user])
                               </div>
                            </div>
                         </div>
                         <div id="accordion-zx" role="tablist" aria-multiselectable="true">
                            <div class="card">
                               <div class="card-header" role="tab" id="headingOne">
                                  <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#stats" aria-expanded="true" aria-controls="collapseOne">
                                      <img src="svg-icons/JobCard/stats-icon.svg" width="15" hspace="1"><span> Statistics</span>
                                      <svg class="olymp-dropdown-arrow-icon">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                      </svg>
                                    </a>
                                  </h6>
                               </div>
                               <div id="stats" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                  Statistics
                               </div>
                            </div>
                         </div>
                      </div>
                      <!-- ... end Your Profile  -->
                   </div>
                   <div class="ui-block">
                      <!-- Your Profile  -->
                      <div class="your-profile">
                         <div class="post-thumb">

                            <div class="post-category full-width align-center bg-gradient-blue">${{$project->budget}} (USD) | {{$project->day_left}} Days To Bid</a>
                         </div>
                         @foreach($project->my_milestone as $ms)
                         <div id="accordion-{{$ms->id}}" role="tablist" aria-multiselectable="true">
                            <div class="card">
                               <div class="card-header" role="tab" id="headingOne">
                                  <h6 class="mb-0">
                                     <a data-toggle="collapse" data-parent="#accordion" href="#ms-{{$ms->id}}" aria-expanded="true" aria-controls="ms-{{$ms->id}}">
                                        <span>{{$ms->title}} | {{$ms->percent_payment}}% | ${{$ms->price}} USD</span>
                                        <svg class="olymp-dropdown-arrow-icon">
                                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                        </svg>
                                     </a>
                                  </h6>
                               </div>
                               <div id="ms-{{$ms->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                  <ul class="your-profile-menu">
                                    <li>{{$ms->title}}</li>
                                    <div class="comment-content comment">
                                      {{$ms->description}}
                                      <br><br>
                                      <img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3">
                                      <span class="ui-block-title-small" style="margin-right: 8px">${{$ms->price}}</span>
                                      <img src="img/time-passing.svg" alt="" width="30" hspace="3">
                                      <span class="ui-block-title-small" style="margin-right: 8px">{{$ms->workday}} Days</span>
                                    </div>
                                  </ul>
                               </div>
                            </div>
                         </div>
                         @endforeach
                      </div>
                      <!-- ... end Your Profile  -->
                   </div>
                   <div class="ui-block">
                      <div class="ui-block-title">
                         <div class="author-date">
                            <a class="h6 post__author-name fn" href="javascript:;" style="font-weight: 500">Project ID: <span style="color: #888DA8">{{$project->id}}</span></a>
                         </div>
                      </div>
                      @auth
                      <div class="ui-block-content action_button">
                        @if( $user != null && !$project->user_bided() && $user->id != $project->user->id )
                        <a href="javascript:;" class="btn btn-green full-width bg-gradient-blue" data-toggle="modal" data-target="#popup-place-bid"><img src="svg-icons/JobCard/target.svg" class="olymp-heart-icon">BID NOW</a>
                        @endif
                        <?php
                          $s_text = ($project->is_saved()) ? 'SAVED' : 'SAVE';
                          $bg = ($project->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
                        ?>
                        <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-green full-width {{$bg}} save_project"><img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon"><span>{{$s_text}}</span> PROJECT</a>
                      </div>
                      @endauth
                   </div>
                </div>
             </div>
          </div>
          <!-- ... end Right Sidebar -->
       </div>
    </div>
  <!-- Bid Modal -->
  @if(!$project->user_bided())
    @include('modal.bid')
  @else
    @include('modal.bidedit')
  @endif
  <!-- Bid Messages Modal -->
  @include('modal.bid-messages')
  <!-- Confirm Award -->
  @include('modal.confirm-hire')
  <!-- User Files -->
  @include('modal.user-files')
  <!-- add mile -->
  <div class="modal fade c-mile-modal modal-target" id="fav-page-popup" tabindex="-1" role="dialog" aria-labelledby="fav-page-popup"
       aria-hidden="true">
    <div class="modal-dialog window-popup fav-page-popup" role="document">
      <div class="modal-content">
        <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
          </svg>
        </a>
        <div class="modal-header">
          <h6 class="title">+ Add Project Task</h6>
        </div>
        <div class="modal-body">
          <form class="task_form">
            <div class="row">
              <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group label-floating">
                  <label class="control-label">Task Name</label>
                  <input class="form-control c-mile" data-key="name" type="text" required>
                </div>
              </div>
              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                  Days to Complete Task</p>
                  <div class="form-group label-floating quantity">
                    <label class="control-label">Workday</label>
                    <input title="Workday" class="form-control  c-mile" data-key="workday" min="1" max="360" type="text" required>
                  </div>
              </div>
              <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                  Edit Item Price (Optional)</p>
                  <div class="form-group label-floating quantity">
                    <label class="control-label">Percent payment - %</label>
                    <input title="Percent - %" class="form-control c-mile" data-key="perpay" min="1" max="100" type="text" required>
                  </div>
              </div>
              <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="form-group label-floating">
                  <label class="control-label">Write a little description about the task</label>
                  <textarea class="form-control c-mile" data-key="description" placeholder=""></textarea>
                </div>
                <button type="button" class="btn btn-primary btn-lg full-width add-mile">+ Add Task</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- ... end Window-popup Create Photo Album -->
  <!-- mile-patern -->
  <div class="d-none mile-patern" id="accordion" role="tablist" aria-multiselectable="true" class="mile">
    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h6 class="mb-0">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-22"
             aria-expanded="true" aria-controls="collapseOne-22" class="collapsed">
            <span class="mile-title">Task 03 - Print Design</span>
            <svg class="olymp-dropdown-arrow-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
            </svg>
          </a>
        </h6>
      </div>
      <div id="collapseOne-22" class="collapse" role="tabpanel" aria-labelledby="headingOne-22">
        <ul class="your-profile-menu">
          <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
              <br>
                <div class="form-group label-floating">
                  <label class="control-label">Task name</label>
                  <input class="form-control mile-in mile-name" data-type="name" type="text" name="mile[title]" required>
                </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
              <br>
                <div class="form-group label-floating quantity">
                  <label class="control-label">Workday</label>
                  <input title="Price - $USD" class="form-control mile-in mile-workday" data-type="workday" min="1" max="360" type="number" required>
                </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
              <br>
                <div class="form-group label-floating quantity">
                  <label class="control-label">Enter Percent - %</label>
                  <input title="Percent" class="form-control mile-in mile-perpay" data-type="perpay" min="1" max="100" type="number" required>
                </div>
            </div>
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
              <br>
              <div class="form-group label-floating">
                <label class="control-label">Write a description Here</label>
                <textarea class="form-control mile-in mile-description" data-type="description" placeholder=""></textarea>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div>
</div>
<a href="javascript:;" class="btn btn-control btn-more load_more_button d-none">
  <svg class="olymp-three-dots-icon">
     <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
  </svg>
</a>
<div class="header-spacer"></div>
<input type="hidden" name="bid_create" value={{ route('ajax.bidjob') }}>
<input type="hidden" name="getBids" value={{ route('project.getBids') }}>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('public/assets/boss/libs/css/dropzone.css')}}">
@endsection
@section('scripts')
    <script src="{{ asset('public/assets/boss/libs/js/dropzone.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/assets/boss/js/boss.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/assets/boss/js/jobdetail.js')}}"></script>

  <script type="text/javascript" src="{{asset('public/frontend/js/newjob.js')}}"></script>
	<script type="text/javascript">
      $(document).on('click', '.hire_me', function (e) {
          e.preventDefault();
          budget = $(this).data('budget');
          work_time = $(this).data('work_time');
          bid_id = $(this).data('bid_id');
          $('.form_award_bid').find('.bid_budget').text(budget);
          $('.form_award_bid').find('.bid_work_time').text(work_time);
          $('.form_award_bid').find('.bid_id').val(bid_id);
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
                      jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                      setTimeout(function () {
                          window.location.reload();
                      }, 2000);
                  } else {
                      jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }
              }
          });
      });

      if (window.location.href.indexOf("filter") > -1) {
          $('html,body').animate({
              scrollTop: $(".list_bid").offset().top
          }, 1000);
          // alert($.urlParam('filter'));
      }
      $(document).on('click', '.load_more_button', function (e) {
          _this = $(this);
          length = $('.list_bid .content-bid').length;
          val = $('select.btn_filter').val();
          id = $('input[name=_project]').val();
          url = $('input[name=getBids]').val();
          data = 'filter='+val+'&id='+id+'&length='+length;
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
          data = 'filter='+val+'&id='+id;
          callAjax(url,data, function(res){
            $('.list_bid').html(res.data);
            if ($(".list_bid").siblings('.load_more_button').length == 0) {
              $('.list_bid').after(clone_loadmore);
            }
          });
      });

      $(document).on('click', '.btn_acceptawardbid', function(e) {
         id = $(this).data('id');
         $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type:'POST',
               url: "{{route('ajax.acceptawardbid')}}",
               data: 'id='+id,
               success:function(data){
                  if (data.error == false) {
                     jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                     setTimeout(function(){window.location.reload();} , 2000);
                  }else{
                     jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }
               }
            });
      });
      //open modal message via ajax
      $(document).on('click', '.open_message', function(e) {
         id = $(this).data('id');
         $('#hire-alchemist').find('form').find('input[name=id]').val(id);
         $.ajax({
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             type:'POST',
             url: "{{route('bid.getmessages')}}",
             data: 'id='+id,
             success:function(res){
                if (res.error == false) {
                  $('#hire-alchemist .chat-message-field').html(res.data);
                  $('#hire-alchemist').modal('show');
                }
             }
          });
      });

      //post message -- enter to submit
      $(document).on('keypress', '.comment-form textarea', function(e){
        if(e.which == 13  && !e.shiftKey) {
          e.preventDefault();
          var message_list = $('#hire-alchemist .chat-message-field');
          form = $(this).closest('form');
          form_data = form.serialize();
          url = $('input[name=postcomment]').val();
          $.ajax({
              headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'POST',
              url: "{{route('bid.postmessage')}}",
              data: form_data,
              success: function (res) {
                form.find("input[type=text], textarea").val("");
                message_list.append(res.data);
                $('.mCustomScrollbar').perfectScrollbar();
              }
          });
          // console.log(form_data);
        }
      });

      //edit bid
      $(document).on('click', '.btn_editbid', function(e){
        id = $(this).data('id');
        $.ajax({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: "{{route('ajax.getBidEdit')}}",
            data: 'id='+id,
            success: function (res) {
              $('#bidedit').find('.submit-bid').before(res.data);
              $('#bidedit').modal('show');
              $('.selectize').selectize({
                maxItems: 99
              });
            }
        });
      });
      //save project
      $(document).on('click', '.save_project', function(e){
        var _this = $(this);
        id = $(this).data('id');
        form_data = 'id='+id;
        url = "{{route('ajax.saveproject')}}";
        callAjax(url,form_data, function(res){
            if(res.error == false){
              var s_text = (res.action == 'add') ? 'SAVED' : 'SAVE';
              var bg = (res.action == 'add') ? 'bg-primary' : 'bg-gradient-gray';
              console.log(s_text,bg);
              _this.find('span').text(s_text);
              _this.removeClass('bg-gradient-gray bg-primary').addClass(bg);
              jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
              swal(res.message);
            }
        });
      });

  </script>
@endsection
