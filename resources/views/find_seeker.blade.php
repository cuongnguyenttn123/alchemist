@extends('layouts.master')
@section('title')
  Search Seekers
@endsection
@section('content')
  <?php
  $user_row1=[];
  $user_row2=[];
  $user_row3=[] ;
  $j = 1;
  foreach($users as $key => $mem){
    if($j%3==1){
      $user_row1[]= $mem;
    }
    if($j%3==2){
      $user_row2[]= $mem;
    }
    if($j%3==0){
      $user_row3[]= $mem;
    }
    $j = $j+1;
  }
  ?>
<div class="banner-find-alchemuniti">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
        <div class="row">
            <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
                <div class="main-header-content">
                    <h1>Search Seekers</h1>
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

          <li class="page-item" >
            <a class="page-link" href="{{route('getListAllContest')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Contests</a>
          </li>

          <li class="page-item disabled "  >
            <a class="page-link " href="#" tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Seekers</a>
          </li>

          <li class="page-item" >
            <a class="page-link" href="{{route('find_alchemist')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Alchemists</a>
          </li>


        </ul>
      </nav>

      <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;border-top-left-radius: 0%;" >
        <div class="ui-block-title">
          <h4><strong>Search Seekers</strong></h4>
        </div>
      </div>
    </div>
  </div>
</div>

<form id="filter_users" method="get" action="{{route('find_seeker')}}">
    <div class="container">
        <div class="row">

            <div class="col col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 responsive-display-none">
                @include('nav-findseeker',['screen' => 'desktop','id' => 1])
            </div>
            <div class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex1200">
                    <div class="ui-block-title">

                        <div class="w-search" align="left">
                            <div class="form-group with-button">
                                <input class="form-control" type="text" name="keyword" value="{{old('keyword',$_GET['keyword'] ?? '')}}" placeholder="Search by name">
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
                                    <option value="total_points" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'total_points' ? 'selected' : '' }}>Total Points</option>
                                    <option value="SP" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'SP' ? 'selected' : '' }}>Seeker Points</option>
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
              <div class="row">
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12">
                  @foreach($user_row1 as $mem)
                    <?php
                      $key = $mem->id;
                    ?>
                    @include('template_part.content-userpoolSeeker')
                  @endforeach
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12">
                  @foreach($user_row2 as $mem)
                    <?php
                    $key = $mem->id;
                    ?>
                    @include('template_part.content-userpoolSeeker')
                  @endforeach
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12">
                  @foreach($user_row3 as $mem)
                    <?php
                    $key = $mem->id;
                    ?>
                    @include('template_part.content-userpoolSeeker')
                  @endforeach
                </div>
              </div>
              {!!$users ->appends(request()->except('page')) -> links('pagination.default')!!}

            </div>

        </div>
    </div>
    <div class="menu">
        <div class="profile-settings-responsive">

            <a href="#" class="js-profile-settings-open profile-settings-open">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <div class="mCustomScrollbar" data-mcs-theme="dark">


            </div>

        </div>
    </div>
</form>

@endsection
@section('scripts')


<script type="text/javascript">
    $("#search_find_seeker-mobile").click(function(e) {
        e.preventDefault();
        console.log("search");
       $("#filter_users").submit();
     });

    $(document).on('submit', '#filter_users', function(){
        $(this).find('.tab-pane.active').siblings().html('');
    })
    $(document).on('click', '.saved_user', function(){
        id = $(this).data('id');
        _this = $(this);
        form_data = 'id='+id+'&type=user';
        url = "{{route('ajax.savefavorite')}}";
        $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type:'POST',
               url: url,
               data: form_data,
               success:function(res){
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
               }
        });
    });
    $('.Statistics-mem').on('click' ,function () {
      _this = $(this);
      action(_this);
      _this.unbind('click');
    });
    // $('.ajax-user-stats').each(function(index){
    //     _this = $(this);
    //     action(_this);
    // });
    function action(target){
        id = target.data('id');
        target = $("#Statistics-"+id);
         console.log(target.attr('id'));
        form_data = 'id='+id;
        url = "{{route('ajax.loadinfo')}}";
        callAjax(url, form_data, function(res){
            console.log(target.attr('id'));
            if(res.error == false){
                target.html(res.data);
            }else{
                swal(res.message);
            }
        });
    }
</script>
@endsection
