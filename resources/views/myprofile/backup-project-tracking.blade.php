@extends('layouts.master')
@section('title')
Tracking
@endsection
@if(Auth::id())
@section('content')
   <div class="header-spacer"></div>
      <div class="container">
         <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="ui-block" data-mh="pie-chart">
                  <div class="ui-block-title">
                     <h4><strong>Project Tracker: </strong>{{$project->name}}</h4>
                  </div>
               </div>
               <div class="ui-block">
                  <!-- News Feed Form  -->
                  <div class="news-feed-form">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"  >
                           <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#milestones" role="tab" aria-expanded="true">
                              <svg class="olymp-status-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                              </svg>
                              <span>Milestones</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link inline-items" data-toggle="tab" href="#messages" role="tab" aria-expanded="false">
                              <svg class="olymp-multimedia-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                              </svg>
                              <span>Messages ({{$project->messages->count()}})</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link inline-items" data-toggle="tab" href="#sharedfiles" role="tab" aria-expanded="false">
                              <svg class="olymp-blog-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use>
                              </svg>
                              <span>Project Files</span>
                           </a>
                        </li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content no-padding">
                        <div class="tab-pane active" id="milestones" role="tabpanel" aria-expanded="true">
                           <div class="ui-block margintop15">
                              <table width="100%" class="event-item-table event-item-table-fixed-width">
                                 <thead class="bg-color-646464">
                                    <tr>
                                       <th width="21%" class="name align-center">
                                          PROJECT NAME <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1">
                                       </th>
                                       <th width="32%" class="name align-center">
                                          SEEKER EST.
                                       </th>
                                       <th width="22%"  class="mybid align-center">
                                          # BIDS
                                       </th>
                                       <th width="25%" class="description align-center">
                                          AVG BID
                                       </th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($project->accepted_milestones as $key=>$ms)
                                       @include('template_part.content-milestone')
                                    @endforeach
                                 </tbody>
                              </table>
                                 <?php
                                    $is_seeker = $user->isSeeker();
                                    $is_alchemist = $user->isAlchemist();
                                 ?>
                                 <div class="col col-sm-12 col-12">
                                    <br><br>
                                    <center>
                                    @if($is_seeker && $project->isCompleted() &&
                                       $project->status() == 'Processing')
                                       <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left complete_project" data-id="{{$project->id}}" style="background-color: #27AAE1;" >Complete project</a>
                                    @endif

                                    @if($project->status()=='Completed')
                                       @if($is_alchemist)
                                          <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #27AAE1;" ><i class="fa fa-comments" aria-hidden="true" ></i>Project Completed</a>
                                       @endif
                                       <?php
                                          if($is_seeker) {
                                             $name_user = $project->user_won->full_name;
                                             $user_to = $project->user_won->id;
                                             $is_reviewed = $project->is_reviewed($project->user->id);
                                          }
                                          if($is_alchemist) {
                                             $name_user = $project->user->full_name;
                                             $user_to = $project->user->id;
                                             $is_reviewed = $project->is_reviewed($project->user_won->id);
                                          }
                                       ?>
                                       @if(!$is_reviewed)
                                         @php
                                           $data_type = '';
                                           if(!$project->is_author()){
                                             $data_type = 'data-type="true"';
                                           }
                                         @endphp
                                       <h6>Please Review {{$name_user}}’s Work</h6>
                                       <a href="javascript:;" {{$data_type}} data-bid_id="{{$project->bidwon->id}}" data-name_user="{{$name_user}}" data-user_to="{{$user_to}}" data-project_id="{{$project->id}}" class="btn btn-purple btn-md-2 btn-icon-left open_review_modal"><i class="fa fa-comments" aria-hidden="true" ></i>REVIEW PROJECT</a><br><br>
                                       @endif
                                    @endif
                                    </center>
                                 </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-expanded="true">
                           <div class="container no-padding margintop15">
                              <div class="row">
                                 <div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-1 col-sm-12 col-12">
                                    <div class="ui-block">
                                       <div class="ui-block-title">
                                          <h6 class="title">Chat / Messages</h6>
                                          <a href="javascript:;" class="more">
                                             <svg class="olymp-three-dots-icon">
                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                             </svg>
                                          </a>
                                       </div>
                                       <div class="row">
                                          <div class="col col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12 padding-r-0">
                                             <ul class="notification-list chat-message">
                                                <li>
                                                   <div class="notification-event">
                                                      @if($project->is_author())
                                                      @include('template_part.part-infouser', ['user'=>$project->userwon])
                                                      @else
                                                      @include('template_part.part-infouser', ['user'=>$project->user])
                                                      @endif
                                                   </div>
                                                </li>
                                                <li>
                                                   @if($disputing = $project->disputing())
                                                   @if($disputing->is_from)
                                                   <a href="javascript:;" data-id="{{$disputing->id}}" class="btn btn-purple btn-sm btn-icon-left bg-color-90CB1E cancel_dispute"><i class="fa fa-check-circle" aria-hidden="true" ></i>RESOLVE DISPUTE</a>
                                                   @endif
                                                   <a href="javascript:;" data-id="{{$disputing->id}}" class="btn btn-purple btn-sm btn-icon-left bg-color-FF5E3A accept_dispute"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i>PROCEDE TO DISPUTE</a>
                                                   @endif
                                                </li>
                                             </ul>
                                          </div>
                                          <div class="col col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12 padding-l-0">
                                             <!-- Chat Field -->
                                             <div class="chat-field">
                                                <div class="ui-block-title">
                                                   <h6 class="title">{{$user->full_name}}</h6>
                                                   <a href="javascript:;" class="more">
                                                      <svg class="olymp-three-dots-icon">
                                                         <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                                      </svg>
                                                   </a>
                                                </div>
                                                <div class="mCustomScrollbar wrapmessage" data-mcs-theme="dark">
                                                   <ul class="notification-list chat-message chat-message-field">
                                                      @foreach($project->messages as $ps)
                                                         @include('template_part.content-projectmessage')
                                                      @endforeach
                                                   </ul>
                                                </div>
                                                <form class="message-reply" action="" method="POST" data-parsley-validate>
                                                   <div class="form-group label-floating is-empty">
                                                      <label class="control-label">Write your reply here...</label>
                                                      <textarea class="form-control" name="message" required></textarea>
                                                   </div>
                                                   <div class="add-options-message">
                                                      <label for="hp_file" class="options-message">
                                                         <svg class="olymp-multimedia-icon">
                                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                                                         </svg></label>
                                                      <button class="btn btn-primary btn-sm">Post Reply</button>
                                                      <input type="hidden" name="pj_id" value="{{$project->id}}">
                                                      <input id="hp_file" class="form-control d-none" type="file" name="files[]" multiple data-parsley-max-file="3">
                                                   </div>
                                                </form>
                                             </div>
                                             <!-- ... end Chat Field -->
                                          </div>
                                       </div>
                                    </div>
                                    <!-- Pagination -->
                                    <!-- ... end Pagination -->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane " id="sharedfiles" role="tabpanel" aria-expanded="true">
                           @foreach($project->accepted_milestones as $key=>$ms)
                              @include('template_part.content-file_ms')
                           @endforeach
                        </div>
                     </div>
                  </div>
                  <!-- ... end News Feed Form  -->
               </div>
            </div>
         </div>
      </div>

@include('modal.review')

<div class="modal fade" id="dispute_modal" tabindex="-1" role="dialog" aria-labelledby="dispute_modal" aria-hidden="true">
   <div class="modal-dialog window-popup edit-widget edit-widget-pool" role="document">
      <div class="modal-content">
         <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
         </a>

         <div class="modal-header">
            <h6 class="title">Procede to Negotiations?</h6>
         </div>

         <div class="modal-body">
            <form>
               <div class="form-group label-floating">
                  <label class="control-label">Dispute Reason</label>
                  <input class="form-control" placeholder="" type="text" value="Work not delivered!" name="title">
               </div>
               <div class="form-group label-floating">
                  <label class="control-label">Intiate Negotiation Message</label>
                  <textarea class="form-control" placeholder="" name="description">I have not received this any updated files or links... Please send today so we don't have to enter a dispute.. Thanks, speak soon.
                  </textarea>
               </div>
               @if($project->is_author())
                  <input type="hidden" name="_user_from" value="{{$project->user->id}}">
                  <input type="hidden" name="_user_to" value="{{$project->userwon->id}}">
               @else
                  <input type="hidden" name="_user_to" value="{{$project->user->id}}">
               @endif
                  <input type="hidden" name="milestone_id" value="">
                  <input type="hidden" name="_project" value="{{$project->id}}">
               <div class="row">
                  <div class="col col-lg-6 col-sm-12 col-12">
                     <a href="javascript:;" data-dismiss="modal" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #7C7C7C; width: 100%" ><i class="fa fa-times-circle" aria-hidden="true" ></i>EXIT PANEL</a>
                  </div>

                  <div class="col col-lg-6 col-sm-12 col-12">
                     <a href="javascript:;" data-toggle="modal" data-target="" class="btn btn-purple btn-md-2 btn-icon-left submit_dispute" style="background-color: #EC7E1D; width: 100%" ><i class="fa fa-comments" aria-hidden="true" ></i>NEGOTIATE</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<input type="hidden" name="_project" value={{ $project->id }}>
<input type="hidden" name="acceptcancel" value="{{route('dispute.goprocess')}}">


@endsection
@endif
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">
@endsection
@section('scripts')
   <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
   <script type="text/javascript">
   $(document).ready(function () {

      //post message
      $(document).on('submit', '.message-reply', function(e) {
         e.preventDefault();
         var message_list = $('.wrapmessage .chat-message-field');
         form = $(this);
        var form_data = new FormData(form[0]);
        form_data.append('files', form.find('input[name=files]').val());

         // form_data = form.serialize();
         url = "{{route('project.postmessage')}}";
         callAjax(url,form_data, function(res){
            if(res.error == false){
               form.find("input[type=text], textarea").val("");
               form.find(".material-input").html("");
               message_list.append(res.data);
               $('.mCustomScrollbar').perfectScrollbar();
            }else{
               swal(res.message);
            }
         },true);
      });

      $(document).on('click', '.milestone_request', function(){
         swal("Are you want to request release this milestone?")
         .then((value) => {
           if(value) {
            id_ms = $(this).data('ms');
            form_data = 'id='+id_ms;
            url = "{{route('ajax.milestone_request')}}";
            callAjax(url,form_data, function(res){
               if(res.error == false){
                  jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
                  setTimeout(function(){window.location.reload();} , 2000);
               }else{
                  swal(res.message);
               }
            });
           }
         });
      });
      $(document).on('click', '.release_payment', function(){
         swal("Are you want to release this milestone?")
         .then((value) => {
           if(value) {
            id_ms = $(this).data('ms');
            form_data = 'id='+id_ms;
            url = "{{route('ajax.release_payment')}}";
            callAjax(url,form_data, function(res){
               if(res.error == false){
                  jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
                  setTimeout(function(){window.location.reload();} , 2000);
               }else{
                  swal(res.message);
               }
            });
           }
         });
      });

      $(document).on('click', '.open_dispute_modal', function(){
         ms_id = $(this).closest('tr').data('ms_id');
         $('#dispute_modal').find('input[name=milestone_id]').val(ms_id);
         // alert(ms_id);
      });

      $(document).on('click', '.submit_dispute', function(){
         form_data = $(this).closest('form').serialize();
         url = "{{route('profile.newdispute')}}";
         console.log(form_data);
         callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
            }else{
               swal(res.message);
            }
         });
      });

       function runajax(type,id) {
         form_data = 'id='+id+'&type='+type;
         url = $('input[name=acceptcancel]').val();
         callAjax(url,form_data, function(res){
             if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
             }else{
               swal(res.message, '', 'warning');
             }
         });
       }
      $(document).on('click', '.cancel_dispute, .accept_dispute', function(){
         id = $(this).data('id');
         if($(this).hasClass('cancel_dispute')){
            type = 'cancel';
         }
         if($(this).hasClass('accept_dispute')){
            type = 'accept';
         }
         swal("Are you sure?")
         .then((value) => {
           if(value) {
               runajax(type,id);
           }
         });
      });

      $(document).on('click', '.complete_project', function(){
         swal("Are you want to complete this project?")
         .then((value) => {
           if(value) {
               id = $(this).data('id');
               $.ajax({
                  type:'POST',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: "{{route('ajax.complete_project')}}",
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
           }
         });
      });
   //show name upload file
      $('#hp_file').change(function(){
      // console.log('aaaaaaa');
        var files = $(this).get(0).files;
        var filename = $(this).closest('.form-group').find('.material-input');
        filename.html("");
        $.each(files,function(i,file){
          name = file.name;
          //console.log(name);
          filename.append('<p>'+name+'</p>');
        });
      });

      $(document).on('submit', '.upload_files', function(e){
        e.preventDefault();
        form = $(this);
        listing_table = form.siblings('.cart-main').find('tbody');
        var form_data = new FormData(form[0]);
        form_data.append('files', form.find('input[name=files]').val());

         // form_data = form.serialize();
         url = "{{route('project.upload')}}";
         callAjax(url,form_data, function(res){
            if(res.error == false){
               form.find("input[type=text], textarea").val("");
               listing_table.prepend(res.data);
            }else{
               swal(res.message);
            }
         },true);
      });

      function beforeOpenReviewModal(id) {
         d=[];
         $.ajax({
            type:'POST',
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('ajax.getBidinfo')}}",
            data: 'id='+id,
            success:function(res){
               d=res.data;
            },
            async: false
         });
         return d;
      }
      $(document).on('click', '.open_review_modal', function(e){
         e.preventDefault();
         bid_id = $(this).data('bid_id');
         data_type = $(this).data('type');
         if(!data_type){
            data_bid = beforeOpenReviewModal(bid_id);
         }else {
            $('.label_skill, .bid_skill').hide();
         }
         name_user = $(this).data('name_user');
         user_to = $(this).data('user_to');
         project_id = $(this).data('project_id');
         var target_modal = $('#popup-write-rewiev');
         // target_modal.find('.name_user').text(data_bid.full_name);
         // target_modal.find('.user_to').val(data_bid._freelancer);
         target_modal.find('.name_user').text(name_user);
         target_modal.find('.user_to').val(user_to);
         target_modal.find('.project_id').val(project_id);
         if(!data_type){
            target_modal.find('.bid_skill > div').html(data_bid.bid_skill_html);
         }
         target_modal.modal('show');
      });
      //submit review
      $(document).on('submit', '.form-write-rewiev', function(e){
         e.preventDefault();
         data = $(this).serialize();
         $.ajax({
            type:'POST',
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('ajax.postreview')}}",
            data: data,
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
