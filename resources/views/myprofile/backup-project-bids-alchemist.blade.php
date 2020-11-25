@extends('layouts.master')
@section('title')
Projects Bids
@endsection
@if(Auth::id())
@section('content')
  <?php $your_bid = $project->your_bid();?>
  <div class="header-spacer"></div>
  <div class="container">
     <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="ui-block" data-mh="pie-chart">
              <div class="ui-block-title">
                 <h4>Project Bids: {{$project->name}}</h4>
              </div>
          </div>
        </div>
          <div class="col col-xl-4 order-xl-1 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
              <div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12  no-margin no-padding">
                 <div class="ui-block" data-mh="pie-chart" style="margin-bottom: 0;">
                    <div class="ui-block-title">
                       <h6 class="title">Project Breakdown</h6>
                    </div>
                 </div>
              </div>
              
              <div class="list_bid" >
                @include('template_part/content-bidshortlist', ['bid' => $your_bid])
              </div>
            </div>
          <div class="hungn02 col col-xl-8 order-xl-2 col-lg-8 order-lg-1 col-md-12 order-md-1 col-sm-12 col-12">
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
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 wrapmessage">
                       <!-- Chat Field -->
                          @include('template_part.content-divbidmessage', ['bid' => $your_bid])
                       <!-- ... end Chat Field -->
                    </div>
                 </div>
              </div>
          </div>
          
     </div>
  </div>

  
  
<!-- Bid Modal -->
  @if($project->user_bided())
    @include('modal.bidedit')
  @endif
<input type="hidden" name="_project" value={{ $project->id }}>
<input type="hidden" name="bid_create" value={{ route('ajax.bidjob') }}>
<input type="hidden" name="getBids" value={{ route('project.getBids') }}>
<input type="hidden" name="changeShortlist" value={{ route('project.changeShortlist') }}>
      
  <!-- Confirm Award -->
  @include('modal.confirm-hire')

@endsection
@endif

@section('scripts')
    <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/boss/js/jobdetail.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/newjob.js')}}"></script>
<script type="text/javascript">
   $(document).ready(function () {

      $(document).on('click', '.btn_acceptawardbid', function(e) {
         swal("Are you sure?")
         .then((value) => {
           if(value) {
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
                     if (data.redirect != ''){
                       setTimeout(function(){window.location.replace(data.redirect);} , 2000);
                     }else {
                       setTimeout(function(){window.location.reload();} , 2000);
                     }
                  }else{
                    swal(data.message);
                  }
               }
            });
           }
         });
      });

      //edit bid
      $(document).on('click', '.btn_editbid', function(e){
        id = $(this).data('id');
        form_data = 'id='+id;
        url = "{{route('ajax.getBidEdit')}}";
        var modal_target = $('#bidedit');
        // modal_target.find('input[name=_project]').val(id);
        callAjax(url,form_data, function(res){
            if(res.error == false){
              modal_target.find('form .row').html(res.data);
              modal_target.modal('show');
              $('select.selectize').selectize('refresh');
            }else{
              swal(res.message);
            }
        });
      });

      //post message
      $(document).on('submit', '.message-reply', function(e) {
         e.preventDefault();
         var message_list = $('.wrapmessage .chat-message-field');
         form = $(this);
        var form_data = new FormData(form[0]);
        form_data.append('files', form.find('input[name=files]').val());

         // form_data = form.serialize();
         url = "{{route('bid.postmessage')}}";
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


   });
</script>
@endsection