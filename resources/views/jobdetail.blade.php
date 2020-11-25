@extends('layouts.master')
@section('title')
  Search Projects
@endsection
@section('content')
  <div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
      <div class="row">
        <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12" style="margin-top: -110px">
          <div class="main-header-content" style="margin-bottom: 60px">

            <h1>Create Project</h1>
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
               <a class="page-link" href="{{route('search')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Go Back</a>
             </li>
             <li class="page-item disabled " >
               <a class="page-link " tabindex="-1" style="border-bottom-left-radius: 0%;
               border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Project Details</a>
             </li>



           </ul>
         </nav>

         <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;border-top-left-radius: 0%;" >
           <div class="ui-block-title">
             <h4><strong>Project Details:</strong> {{$project->name}}</h4>
           </div>
         </div>
       </div>
        <div class="col col-xl-3 order-xl-1 col-lg-4 order-lg-1 col-md-12 order-md-1  col-sm-12 col-12 responsive-display">
          <div id="newsfeed-items-grid">
              <div class="ui-block">
                  <div class="ui-block-title">
                     <h6 class="title">Project ID: {{$project->id}}</h6>
                  </div>
                  @auth
                    <div class="ui-block-content action_button">
                      <?php
                      $idCheck = 0;
                      if (Auth::user()){
                        $idCheck = $user->id;
                      }
                      ?>
                      @if( $user != null && !$project->user_bided() && $idCheck != $project->user->id && $project->bid_end > time() && (($project->status() == 'created') || ($project->status() == 'Waiting Accept')))
                      <a href="javascript:;" class="btn btn-green btn-md-2 full-width" data-toggle="modal" data-target="#popup-place-bid">
                        <img src="svg-icons/JobCard/target.svg" class="olymp-heart-icon" style="width: 16px;margin-right: 5px;padding-bottom: 2px; vertical-align: middle">BID ON PROJECT
                      </a>
                      @endif
                      <?php
                        $s_text = ($project->is_saved()) ? 'SAVED' : 'SAVE';
                        $bg = ($project->is_saved()) ? 'bg-primary' : '';
                      ?>
                      <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-secondary btn-md-2 full-width {{$bg}} save_project">
                        <img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="width: 16px;margin-right: 5px;padding-bottom: 2px; vertical-align: middle"><span>{{$s_text}}</span> PROJECT</a>
                    </div>
                  @endauth
               </div>
              <div class="ui-block" >
                <div class="ui-block-title">
                  <h6 class="title">Project Breakdown</h6>
                </div>
                <div class="ui-block-content" style="padding-bottom: 0px">
                  <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px">
                    <span class="skills-item-title">
                      <span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Bidding Starts</span>
                    </span>
                    <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">
                      <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                      <span class="units" >{{$project->start_bid}}</span>
                    </span>
                  </div>
                  <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px">
                    <span class="skills-item-title">
                      <span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Bidding Ends</span>
                    </span>
                    <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">
                      <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                      <span class="units" >{{$project->end_bid}}</span>
                    </span>
                  </div>
                  <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px">
                    <span class="skills-item-title">
                      <span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Preferred Deadline</span>
                    </span>
                    <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">
                      <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                      <span class="units" >{{$project->deadline()}}</span>
                    </span>
                  </div>
                  <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px">
                    <span class="skills-item-title">
                      <span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Estimated Days</span>
                    </span>
                    <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">
                      <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                      <span class="units" >{{$project->total_day}} Days</span>
                    </span>
                  </div>
                  <div class="skills-item-info" style="margin-top: 15px;padding-bottom: 5px">
                    <span class="skills-item-title">
                      <span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Project Total</span>
                    </span>
                    <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">
                      <span class="units">${{$project->budget}}</span> USD
                    </span>
                  </div>
                </div>
                {{--<div class="your-profile" style="border-top: solid; border-top-width: 1px;border-top-color: #E6ECF5">
                  @include('template_part.information', ['user'=>$project->user])
                </div>--}}
              </div>
           </div>
        </div>
        <div class="col col-xl-5 order-xl-2 col-lg-8 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
           <div class="crumina-sticky-sidebar">
              <div class="sidebar__inner">
                @include('template_part.content-job-search', ['project'=>$project, 'jobdetail'=>'0'])
              </div>
           </div>
        </div>
        <!-- Main Content -->
        <div class="col col-xl-4 order-xl-3 col-lg-12 order-lg-3 col-md-12 col-sm-12 col-12">
           <div id="newsfeed-items-grid">

              <div class="ui-block">
                 <!-- Your Profile  -->
                 <div class="your-profile">
                   <div class="post-thumb" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                     <a href="#" class="post-category  full-width align-center" style="background-image: linear-gradient(#73757e, #3f4257); padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 14px;font-weight: 500;color: #fff">Seeker Milestones</a>
                   </div>
                   <div id="accordion" role="tablist" aria-multiselectable="true" >
                     <div class="card">
                       @include('template_part.information', ['user'=>$project->user, 'content'=>'0'])
                     </div>
                   </div>


                 @foreach($project->my_milestone as $key => $ms)

                         <div id="accordion-{{$ms->id}}" role="tablist" aria-multiselectable="true">
                            <div class="card">
                               <div class="card-header" role="tab" id="headingOne">
                                  <h6 class="mb-0">
                                     <a data-toggle="collapse" data-parent="#accordion" href="#ms-{{$ms->id}}" aria-expanded="true" aria-controls="ms-{{$ms->id}}">
                                        <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #858AA6">Milestone 0{{$key+1}} | {{$ms->percent_payment}}% | ${{$ms->price}} USD</span>
                                        <svg class="olymp-dropdown-arrow-icon">
                                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                        </svg>
                                     </a>
                                  </h6>
                               </div>
                               <div id="ms-{{$ms->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                  <ul class="your-profile-menu">
                                    <li style="padding-bottom: 15px;margin-bottom: 15px;border-bottom: 1px solid #e6ecf5;">{{$ms->title}}</li>
                                    <div class="comment-content comment">
                                      <div class="milestone-description">
                                        <p class="friend-about" data-swiper-parallax="-500">
                                          <span>{{$ms->description}}</span>
                                        </p>
                                      </div>

                                      <br>
                                      <br>
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
             <div class="ui-block" style="margin-top: 15px; margin-bottom: 0px">
               <div class="ui-block-title">
                 <div class="h6 title">Supporting Files</div>
               </div>
               <form action="#" method="post" class="cart-main">
                 <!-- Shop Table Cart -->
                 <table class="shop_table cart">
                   <tbody class="alldownload">
                   @forelse($project->attachments as $file)
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
              <div class="ui-block">
                 <div class="ui-block-title">
                    <h6 class="title">Alchemist Bids</h6>
                 </div>
              </div>
              <div class="ui-block responsive-flex1200">
                 <div class="ui-block-title">
                    <div class="w-select">
                       <div class="title" style="">Filter By:</div>
                       <fieldset class="form-group">
                          <select class="selectpicker form-control">
                             <option value="NU">All Categories</option>
                             <option value="NU">Saved Jobs</option>
                             <option value="NU">Latest Jobs</option>
                             <option value="NU">Lowest Price</option>
                             <option value="NU">Highest Price</option>
                             <option value="NU">Most Bids</option>
                             <option value="NU">Fewest Bids</option>
                          </select>
                       </fieldset>
                    </div>
                 </div>
              </div>
              <div class="list_bid">
                @foreach($project->bids->take(5) as $bid)
                  @include('template_part.content-bid', $bid)
                @endforeach
             </div>
           </div>
           <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
              <svg class="olymp-three-dots-icon">
                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
              </svg>
           </a>
        </div>
        <!-- ... end Main Content -->
        <!-- Left Sidebar -->
        <!-- ... end Left Sidebar -->
        <!-- Right Sidebar -->
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
  <script type="text/javascript" src="{{asset('public/frontend/js/cncustom.js')}}"></script>
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
              $('.save_project').removeClass('bg-gradient-gray bg-primary').addClass(bg);
              jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
              swal(res.message);
            }
        });
      });

  </script>
@endsection
