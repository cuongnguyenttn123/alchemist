@extends('layouts.master')
@section('title')
  Dispute Panel
@endsection
@section('content')
<div class="header-spacer"></div>
<?php
  $is_from = $dispute->is_from;
  $is_to = $dispute->is_to;
  $is_arbiter = $dispute->is_arbiter();
  $is_voted = $dispute->is_voted();
?>
<div class="container ">
   <div class="col col-xl-8 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
         <div class="ui-block-title" style="padding-left: 0px">
            <h3 style="font-size: 17px;color: #FFFFFF;"><img src="svg-icons/menu/organization.svg" width="100" class="olymp-heart-icon" style=" border-radius: 0%; width: 70px;margin-left: 0px;margin-left: 6px;margin-top: -2px">
              @if($is_arbiter) Arbiter
              @elseif($is_from) Plaintiff
              @elseif($is_to) Defendant @endif

              @if($is_arbiter) - Review Case @endif

            </h3>
         </div>
      </div>
      <div class="ui-block" style="border: 0px solid #e6ecf5;">
         <div class="news-feed-form" style="background-color: #edf2f6;padding-bottom: 50px;border: 0px solid #e6ecf5;">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#deposit" role="tab" aria-expanded="true">
                  <span>
                    @if($is_arbiter && !$is_voted)Enter Case
                    @elseif($is_arbiter && $is_voted) Decision Summary
                    @elseif(($is_from || $is_to) && !$dispute->my_case()) Enter Case
                    @elseif(($is_from || $is_to) && $dispute->my_case()) Sent Case @endif
                  </span> 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link inline-items" data-toggle="tab" href="#token" role="tab" aria-expanded="false">
                  <span>Results ({{$dispute->arbiters_voted()->count()}}/{{$dispute->arbiters()->count()}})</span>
                </a>
              </li>
              @if($dispute->is_decision)
              <li class="nav-item">
                <a class="nav-link inline-items" data-toggle="tab" href="#decision" role="tab" aria-expanded="false">
                  <span>Decision</span>
                </a>
              </li>
              @endif
              @if($dispute->is_results)
              <li class="nav-item">
                <a class="nav-link inline-items" data-toggle="tab" href="#record" role="tab" aria-expanded="false">
                  <span>Results Record</span>
                </a>
              </li>
              @endif
            </ul>
            <!-- Tab panes -->
            <div class="tab-content no-padding">
              <div class="tab-pane active" id="deposit" role="tabpanel" aria-expanded="true">
                <div class="row" style="margin-top: 0px">
                  @if( ($is_from || $is_to) && !$dispute->my_case() )
                    @include('dispute.user-case')
                  @elseif( ($is_from || $is_to) && $dispute->my_case() )
                    @include('dispute.case-detail')
                  @endif
                  @if($dispute->is_arbiter() && !$dispute->is_voted())
                    @include('dispute.arbiter-case')
                  @endif
                  @if($is_arbiter && $is_voted)
                    @include('dispute.arbiter-summary')
                  @endif
                </div>
              </div>
              <div class="tab-pane" id="token" role="tabpanel" aria-expanded="true">
                  @include('dispute.results')
              </div>
              <div class="tab-pane" id="decision" role="tabpanel" aria-expanded="true">
                  @include('dispute.decision')
              </div>
              <div class="tab-pane" id="record" role="tabpanel" aria-expanded="true">
                  @include('dispute.record')
              </div>
            </div>
         </div>
      </div>
   </div>
</div>

<input type="hidden" name="dispute_id" value={{ $dispute->id }}>
<input type="hidden" name="acceptcancel" value="{{route('dispute.goprocess')}}">
@endsection

@section('scripts')
	<script type="text/javascript">
      $(document).on('click', '.random_arbiter', function (e) {
          e.preventDefault();
          var dispute_id = $('input[name=dispute_id]').val();
          form_data = 'id_dispute='+dispute_id;
          url = "{{route('dispute.random')}}";
          console.log(form_data);
          callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
               swal(res.message);
            }
          });
      });
      $(document).on('click', '.accept_arbiter', function (e) {
          e.preventDefault();
          var dispute_id = $('input[name=dispute_id]').val();
          form_data = 'id_dispute='+dispute_id;
          url = "{{route('dispute.accept_arbiter')}}";
          console.log(form_data);
          callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
               swal(res.message);
            }
          });
      });
      $(document).on('click', '.arbiter_vote', function (e) {
          e.preventDefault();
          var dispute_id = $('input[name=dispute_id]').val();
          form_data = 'id_dispute='+dispute_id;
          url = "{{route('dispute.arbiter_vote')}}";
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

      $(document).on('submit', ".send_case", function(e){
          e.preventDefault();

          var form = $(this);

          var data = new FormData(form[0]);
          data.append('id_dispute', $('input[name=dispute_id]').val());
          console.log(data);

          url = "{{route('dispute.sendcase')}}";

          callAjax(url,data, function(res){
            console.log(res);
            if(res.error == false){
              jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
            }else{
              if(!$.isPlainObject(res.message)){
                  swal(res.message);
              }else{
                $.each(res.message, function(key,value){
                  swal(value[0]);
                });
              }
            }
          },true);

      });

      $(document).on('click', ".send_decision", function(e){
          e.preventDefault();
          var dispute_id = $('input[name=dispute_id]').val();

          var input = $('.vote_case').find('.vote_dispute:checked');

          var form = input.closest(".row").find("form");


          var val = input.val();
          if (!val) {
            swal('please select');
            return false;
          }
          textarea = input.closest('.row').find('[name=description]').val();
          if (!textarea) {
            swal('please type  reason');
            return false;
          }

          url = "{{route('dispute.submit-vote')}}";

          var form_data = new FormData(form[0]);
          form_data.append('id', dispute_id);
          form_data.append('vote', val);

          callAjax(url,form_data, function(res){
            if(res.error == false){
              jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
              setTimeout(function(){window.location.reload();} , 2000);
            }else{
              if(!$.isPlainObject(res.message)){
                swal(res.message);
              }else{
                $.each(res.message, function(key,value){
                  swal(value[0]);
                });
              }
            }
          }, true);

      });

      $(document).on('click', ".dispute_payment", function(e){
          e.preventDefault();
          var type = $(this).data('type');
          var dispute_id = $('input[name=dispute_id]').val();

          form_data = 'id_dispute='+dispute_id+'&type='+type;
          url = "{{route('dispute.payment')}}";

          callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
            }else{
               swal(res.message);
            }
          });

      });

      $(document).on('click', ".continue_project", function(e){
          e.preventDefault();
          var type = $(this).data('type');
          var dispute_id = $('input[name=dispute_id]').val();

          form_data = 'id_dispute='+dispute_id+'&type='+type;
          url = "{{route('dispute.continue')}}";

          callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
            }else{
               swal(res.message);
            }
          });

      });

      $(document).on('click', ".save_case", function(e){
        e.preventDefault();
        var dispute_id = $('input[name=dispute_id]').val();
        var form = $(this).closest('form');
        var form_data = new FormData(form[0]);
        form_data.append('id', dispute_id);
        url = "{{route('dispute.arbiter-save')}}";

          callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
               swal(res.message);
            }
          }, true);
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

  </script>
@endsection 
