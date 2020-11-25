@extends('layouts.master')
@section('title')
  Search Contest
@endsection
@section('content')
 <div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
       <div class="row">
          <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
             <div class="main-header-content">
                <h1>Search Contest</h1>
                <p>Welcome to the Alchemunity Talent Pool. Search Alchemist's from all across the globe by skill, level, hourly price, location and spoken languages. Review comprehensive Alchemist details to find your best match!</p>
             </div>
          </div>
       </div>
    </div>
    <img class="img-bottom" src="img/account-bottom.png" alt="friends">
 </div>

 <div class="container" style="margin-top: -110px">
   <div class="row">
     <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
       <nav aria-label="Page navigation" style="z-index: 2">
         <ul class="pagination " style="margin: 0px 0px -1px 0px">



           <li class="page-item" style="padding-left: 0px;">
             <a class="page-link" href="{{route('search')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Projects</a>
           </li>

           <li class="page-item disabled "  >
             <a class="page-link " href="#" tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Contests</a>
           </li>

           <li class="page-item" >
             <a class="page-link" href="{{route('find_seeker')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Seekers</a>
           </li>

           <li class="page-item" >
             <a class="page-link" href="{{route('find_alchemist')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Alchemists</a>
           </li>



         </ul>
       </nav>

       <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;border-top-left-radius: 0%;" >
         <div class="ui-block-title">
           <h4><strong>Search Contests</strong></h4>
         </div>
       </div>
     </div>
   </div>
 </div>
<div class="container">
  <form method="get" action="">
      <div class="row">

		<div class="col col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 responsive-display-none">

			<div class="ui-block">
				<div class="news-feed-form" style="overflow: none;">
					<div class="tab-content">
						<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
							<?php $screen = 'desktop'; ?>
							@include('menu-searchcontest',['screen'])
						</div>
					</div>
				</div>

			</div>

		</div>
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
            <div class="row">
				<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="ui-block responsive-flex1200">
            <div class="ui-block-title">

              <div class="w-search" align="left">
                <div class="form-group with-button">
                  <input class="form-control" type="text" name="keyword" value="{{old('keyword',$_GET['keyword'] ?? '')}}" placeholder="Search keyword">
                  <button>
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                  </button>
                </div>
              </div>

              <div class="w-select" align="right" style="padding-left: 2em;">
                <div class="title"> Filter By:</div>
                <fieldset class="form-group">
                  <select class="selectpicker form-control" name="order_by">
                    <option value="">Sort</option>
                    <option value="date_posted" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'date_posted' ? 'selected' : '' }}>Date Posted</option>
                    <option value="by_price" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'by_price' ? 'selected' : '' }}>By price</option>
                    <option value="of_entries" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'of_entries' ? 'selected' : '' }}># of Entries</option>
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
				</div>
               @forelse($contests as $contest)
               	@include('template_part.content-contestSearchContest',['contest'=>$contest])
               @empty

               <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               		<h3>No Contests found</h3>
	           </div>
               @endforelse
            </div>
            <!-- Pagination -->
                  {!!$contests ->appends(request()->except('page')) -> links('pagination.default')!!}
            <!-- Pagination -->
        </div>
      </div>
  </form>
</div>
 @include('modal.entrySeach')
 <input type="hidden" id="post_entry_id" name="post_entry" value="{{route('contest.ajaxPostTest')}}">
<form method="get" action="">
	<div class="menu">
	  	<div class="profile-settings-responsive">

		    <a href="javascript:;" class="js-profile-settings-open profile-settings-open">
		      <i class="fa fa-angle-right" aria-hidden="true"></i>
		      <i class="fa fa-angle-left" aria-hidden="true"></i>
		    </a>
		    <div class="mCustomScrollbar" data-mcs-theme="dark">
		    	<?php $screen = 'mobile'; ?>
		      	@include('menu-searchcontest',['screen'])
			</div>

		</div>
	</div>
</form>
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">
@endsection
@endsection
@section('scripts')
<script type="text/javascript">
		<?php $var = (isset($_GET['price'])) ? explode(';', $_GET['price']) : [];?>
		$(".range-slider-js2").ionRangeSlider({
				type: "double",
				grid: true,
				min: 0,
				max: 1000,
				from: {{$var[0] ?? '200'}},
				to: {{$var[1] ?? '800'}},
				prefix: "$"
			}
		);
      //save project
      $(document).on('click', '.save_contest', function(e){
        var _this = $(this);
        id = $(this).data('id');
        form_data = 'id='+id+'&type=contest';
        url = "{{route('ajax.savefavorite')}}";
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
<script type="text/javascript">
  $(document).on('submit', '.form-post_test', function (e) {
    e.preventDefault();

    var form = $(this);

    var data = new FormData(form[0]);
    data.append('files_preview', form.find('input[name=files_preview]').val());
    data.append('files', form.find('input[name=files]').val());
    console.log(data);

    url = $('#post_entry_id').val();

    console.log(url);
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

  $(document).on('click', '.enter-contest-now', function (e) {
    var id = $(this).attr('data-id');
    $('#contest_value_id').val(id);
    console.log(id);
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
