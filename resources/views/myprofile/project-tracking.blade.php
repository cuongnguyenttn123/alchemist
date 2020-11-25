@extends('layouts.master')
@section('title')
  Tracking
@endsection
@if(Auth::id())
@section('content')
  <div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
      <div class="row">
        <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12" style="margin-top: -110px">
          <div class="main-header-content" style="margin-bottom: 60px">

            <h1>Project Tracker</h1>
            <p>Welcome to the Alchemunity Project Search. Search Projects from all across the globe by skill, level,  price, location and spoken languages. Review comprehensive Seeker details to find your best match!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Your Account Personal Information -->
      <div class="container" style="margin-top: -110px">
         <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <nav aria-label="Page navigation" style="z-index: 2">
                   <ul class="pagination " style="margin: 0px 0px -2px 0px">
                      <li class="page-item" style="padding-left: 0px;">
                         <a class="page-link" href="{{route('profile.myprojects')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Go Back</a>
                      </li>
                      <li class="page-item disabled " >
                         <a class="page-link " href="javascript:;" tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Project Tracker</a>
                      </li>
                   </ul>
                </nav>
               <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;">
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
                           <a class="nav-link inline-items hp_messagess" data-toggle="tab" href="#messagess" role="tab" aria-expanded="false">
                             <svg class="olymp-chat---messages-icon" style="width: 20px">
                               <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
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
                           <div class="ui-block" style="margin-top: 15px;">
                              <div class="ui-block-title">
                                 <div class="h6 title">Milestones</div>
                              </div>
                           </div>
                           <div class="ui-block margintop15">
                              <table width="100%" class="event-item-table event-item-table-fixed-width">
                                 <thead class="bg-color-646464">
                                    <tr>
                                       <th width="21%" class="name align-center">
                                         MILESTONE <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1">
                                       </th>
                                       <th width="30%" class="name align-center">
                                         DETAILS
                                       </th>
                                       <th width="24%"  class="mybid align-center">
                                         PROGRESS
                                       </th>
                                       <th width="25%" class="description align-center">
                                         ACTION
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
                                       $project->status() == 'processing')
                                       <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left complete_project" data-id="{{$project->id}}" style="background-color: #27AAE1;" >Complete project</a>
                                    @endif

                      @if($project->status()=='completed')
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
              <div class="tab-pane" id="messagess" role="tabpanel" aria-expanded="true">
                <div class="ui-block" style="margin-top: 15px;">
                  <div class="ui-block-title">
                    <div class="h6 title">Messages</div>
                  </div>
                </div>
                <div class="container no-padding margintop15">
                  <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-margin">
                      <div class="ui-block">
                        <div class="ui-block-content">
                          @if($disputing = $project->disputing())
                            @if($disputing->is_from)
                              <a href="javascript:;" data-id="{{$disputing->id}}" class="btn btn-green btn-md-2 full-width cancel_dispute"><i class="fa fa-check-circle" aria-hidden="true" ></i>RESOLVE DISPUTE</a>
                            @endif
                            <a href="javascript:;" data-id="{{$disputing->id}}" class="btn btn-secondary btn-md-2 full-width accept_dispute"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i>PROCEDE TO DISPUTE</a>
                          @else
                            <div class="photo-album-item create-album"  style="position: relative;padding-top: 100px;padding-bottom: 100px">
                              <a href="javascript:;"  data-toggle="modal" data-target="#"></a>
                              <div class="content" style="margin-top: 10px">
                                <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="">
                                  <img src="svg-icons/JobCard/padlock.svg" class="olymp-plus-icon" style="margin-top: -14px">
                                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                </a>
                                <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Dispute Inactive (Coming Soon)</a>
                                <span class="sub-title">No Dispute Has Been Initiated</span>
                              </div>
                            </div>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-margin">
                      <!-- Chat Field -->
                      <div class="chat-field" style="background-color: #fff;">
                        <div class="ui-block-title">
                          <h6 class="title">{{$user->full_name}}</h6>
                          <a href="javascript:;" class="more">
                            <svg class="olymp-three-dots-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg>
                          </a>
                        </div>
                        <div class="mCustomScrollbar wrapmessage" data-mcs-theme="dark">
                          <ul id="messages" class="notification-list chat-message chat-message-field" style="max-height: 350px;overflow-y: auto;">
                            @php $target_id = $message->user->id ?? false; @endphp
                            @foreach($project->messages as $ps)
                              @include('template_part.content-projectmessage',['target_id'])
                              @php $target_id = $ps->user->id; @endphp
                            @endforeach
                          </ul>
                        </div>
                        <form id="post_status" class="message-reply showfile files-group" data-parsley-validate>
                          <div class="form-group label-floating is-empty">
                            <label class="control-label">Write your reply here...</label>
                            <textarea class="form-control" placeholder="" name="message" required></textarea>
                          </div>
                          <div class="ui-block-content photo-preview d-hidden" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px">
                            <div class="post-block-photo" style="overflow: hidden;"></div>
                            <div>
                              <a href="javascript:;" class="col col-3-width clone_img clone d-hidden" style="max-width: 20%;" >
                                <i class="fas fa-times-circle removeimg"></i>
                                <img class="" src="img/1.jpg" alt="photo" style="object-fit: cover;height: 90px;margin-top: 10px;">
                              </a>
                            </div>
                          </div>
                          <div class="ui-block-content file-preview d-hidden" style="border-bottom: 1px solid #e6ecf5;padding-bottom: 0px">
                            <div class="post-block-files" style="overflow: hidden;"></div>
                            <div>
                              <a href="javascript:;" class="col col-3-width clone_file clone d-hidden" style="position: relative;padding-top: 10px;width: auto;" >
                                <button type="button" class="btn btn-blue btn-sm" style="padding-top: 4px;padding-bottom: 4px; padding-left: 10px;padding-right: 10px">Video Reference.mp4</button>
                                <i class="fas fa-times-circle removeimg"></i>
                              </a>
                            </div>
                          </div>
                          <div class="add-options-message form-group" style="background-color: #fff;">
                            <input type="hidden" name="list_media" value="">
                            <a id="add-image" href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top">
                              <label for="add-photo" class="marginbottom-0">
                                <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                                </svg><span style="vertical-align: super;font-size: 15px; padding-left: 8px;">+ Add File</span>
                              </label>
                            </a>

                            <a id="add-files" href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top">
                              <label for="hp_file" >
                                <svg class="olymp-camera-icon" width="15">
                                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use>
                                </svg><span style="vertical-align: super;font-size: 15px; padding-left: 8px;">+ Add Image</span>
                              </label>
                            </a>
                            <button class="btn btn-primary btn-sm">Post Reply</button>
                            {{-- <input type="reset" class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color clear_all" value="Clear" style="float: right;margin-right: 12px; width: auto;" /> --}}
                            <input type="hidden" name="pj_id" value="{{$project->id}}">
                            <input id="add-photo" class="add-photo d-none" type="file" name="files[]" accept="image/*" value="" multiple data-parsley-max-file="3" >
                            <input id="hp_file" class="add-files d-none" type="file" name="files[]" accept=".zip,.rar,.txt,.docx,.pptx,.pdf,video/*,audio/*" value="" multiple data-parsley-max-file="3">
                          </div>
                        </form>
                      </div>
                      <!-- ... end Chat Field -->
                    </div>
                  </div>

                  <!-- Pagination -->
                  <!-- ... end Pagination -->
                </div>
              </div>
              <div class="tab-pane " id="sharedfiles" role="tabpanel" aria-expanded="true">
                <div class="row">
                  @foreach($project->accepted_milestones as $key=>$ms)
                    @include('template_part.content-file_ms')
                  @endforeach
                </div>
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
  <input type="hidden" name="poststatus" value="{{route('project.postmessage')}}">
  <input type="hidden" name="previewimage" value="{{route('ajax.previewimage')}}">
  <div class="ui-block marginbottom-0 hp_previewfile">
    <div class="cart_item_1 d-none" style="margin-bottom: 10px;border-bottom: 1px solid #e6ecf5; ">
    <div class="ui-block" data-mh="pie-chart" style="padding: 15px;margin-left: 10px;border: none;">
      <div class="forum-item">
        <img src="img/zip.svg" alt="forum" width="40">
        <div class="content">
          <a href="javascript:;" class="h6 title" style="word-break: break-word;"></a>
          <div class="post__date">
            <time class="published" datetime="2017-03-24T18:18"></time>
          </div>
          <span class="notification-icon click-delete-file" data-filedelete style="margin-right: 10px; margin-top: -35px; float: right; display: block;">
            <a href="javascript:;" data-delete_file = "" class="accept-request request-del">
              <span class="delete-file">
                <img src="img/trash.svg" class="olymp-close-icon" style="margin: auto; height: 15px; width: 15px;">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
              </span>
              </a>
          </span>
        </div>


      </div>
    </div>
  </div>
  </div>

@endsection
@endif
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">
@endsection
@section('scripts')
  <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/frontend/js/file-custom-cn.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/frontend/js/chatmessage.js')}}"></script>
  <script type="text/javascript">
    $(document).on('click', '.abcs', function(){
      $('.abcsd').trigger('click');
    });
    $(document).on('click', '.abcss', function(){
      $('.abcsddd').trigger('click');
    });
    $(document).ready(function () {



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
      $(document).on('click', '.milestone_start', function(){
        swal("Are you want to start this milestone?")
          .then((value) => {
            if(value) {
              id_ms = $(this).data('ms');
              form_data = 'id='+id_ms;
              url = "{{route('ajax.milestone_start')}}";
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

      $(document).on('click', '.decline_payment', function(){
        swal("You do not agree with the release?")
          .then((value) => {
            if(value) {
              id_ms = $(this).data('ms');
              form_data = 'id='+id_ms;
              url = "{{route('ajax.milestone_start')}}";
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
      // $('#hp_file').change(function(){
      // // console.log('aaaaaaa');
      //   var files = $(this).get(0).files;
      //   var filename = $(this).closest('.form-group').find('.material-input');
      //   filename.html("");
      //   $.each(files,function(i,file){
      //     name = file.name;
      //     //console.log(name);
      //     filename.append('<p>'+name+'</p>');
      //   });
      // });
      $('.mCustomScrollbar').perfectScrollbar();

      $(document).on('submit', '.upload_files', function(e){
        e.preventDefault();

        form = $(this);

        listing_table = form.find('.cart-main').find('tbody');
        var form_data = new FormData(form[0]);
        var key =  $(this).find('.get-value-update').attr('data-key');
        var show_key =  $(this).find('.get-value-update').attr('data-show_key');
        console.log(key, show_key)
        form_data.append('files', form.find('input[name=files]').val());
        form_data.append('key', key);
        form_data.append('show_key', show_key);
        form_data.append('file_attached_delete', form.find('input[name=file_attached_delete]').val());
        // form_data = form.serialize();
        url = "{{route('project.upload')}}";
        callAjax(url,form_data, function(res){
          if(res.error == false){
            form.find("input[type=text], textarea").val("");
            listing_table.prepend(res.data);
            $('.hienthi').html('');
          }else{
            swal(res.message);
          }
        },true);
        resetfile = form.find('.resetfile');
        $(resetfile).trigger('click');
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
      $(document).on('click', '.hp_messagess', function(){
        window.callJs();
        window.chat_time();
        window.scrollToBottom();
      });


      window.callJs();
      window.chat_time();
      window.scrollToBottom();

    });
  </script>
  <script>
    $('.go-btn').click(function() {
      var data_value = $(this).attr('data-value_key');
      var idselect = '#select-value-'+data_value;
      console.log(idselect);
      var selected = $(idselect +' option:selected').val();
      console.log(selected);
      var id_a = '#'+selected+'_'+data_value;
      console.log(id_a);
      $(id_a).trigger('click');
    });

  </script>
@endsection
