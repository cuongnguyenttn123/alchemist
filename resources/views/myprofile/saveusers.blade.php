@extends('layouts.master')
@section('title')
Saved
@endsection
@section('content')
@include('myprofile.profile_header')

@if(Auth::id())
<?php
    $cl1 = 'order-xl-2 order-md-1';
    $cl2 = 'order-xl-1 order-md-2';
    if(isset($sidebar) && $sidebar == 'left'){
        $cl1 = 'order-xl-1 order-md-1';
        $cl2 = 'order-xl-2 order-md-2';
    }
?>
<?php
  $userSeeker = [];
  $userAlchemist = [];
  foreach($target_user->followings as $key => $mem){
    if($mem->isAlchemist()){
      $userAlchemist[]= $mem;
    }else{
      $userSeeker[]= $mem;
    }
  }
?>
<?php
$user_row1=[];
$user_row2=[];
$user_row3=[] ;
$j = 1;
foreach($userSeeker as $key => $mem){
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
<?php
$user_row4=[];
$user_row5=[];
$user_row6=[] ;
$j = 1;
foreach($userAlchemist as $key => $mem){
  if($j%3==1){
    $user_row4[]= $mem;
  }
  if($j%3==2){
    $user_row5[]= $mem;
  }
  if($j%3==0){
    $user_row6[]= $mem;
  }
  $j = $j+1;
}

?>
<div class="container">
  <div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="ui-block">
         <div class="ui-block-title">
            <div class="h6 title">{{$target_user->fullname}} Saved Users</div>
         </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
      <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="alchemist-tab" role="tabpanel" aria-labelledby="friend-tab">
              <form action="{{route('profile.saveusers')}}" method="GET">
                <div class="ui-block responsive-flex1200">
                <div class="ui-block-title">
                  <input type="hidden" name="role" value="alchemist">
                  <div class="w-search" >
                    <div class="form-group with-button">
                      <input class="form-control" type="text" name="keyword" value="{{old('keyword',$_GET['keyword'] ?? '')}}" placeholder="Search Alchemist......">
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
                        <option value="SBP" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'SBP' ? 'selected' : '' }}>Skill Based Points</option>
                        <option value="RP" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'RP' ? 'selected' : '' }}>Reputation Points</option>
                        <option value="rate" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'rate' ? 'selected' : '' }}>Star Rating</option>
                        <option value="projects_completed" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'projects_completed' ? 'selected' : '' }}># of Projects Completed</option>
                        <option value="contests_won" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'contests_won' ? 'selected' : '' }}># of Contests Won (1st)</option>
                        <option value="completed_placed" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'completed_placed' ? 'selected' : '' }}># of Contests Placed</option>
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

                  <button class="btn btn-md-2 btn-secondary seach-merchants-btn" style="padding: 8px 12px 8px 12px" align="right"><img src="svg-icons/JobCard/refresh-page-arrow-button.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px"></button>
                </div>

              </div>
              </form>
              <div class="row">
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12 list-seeker-1">
                  @foreach($user_row4 as $mem)
                    <?php
                    $key = $mem->id;
                    ?>
                    @include('template_part.content-userpool')
                  @endforeach
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12 list-seeker-2">
                  @foreach($user_row5 as $mem)
                    <?php
                    $key = $mem->id;
                    ?>
                    @include('template_part.content-userpool')
                  @endforeach
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12 list-seeker-3">
                  @foreach($user_row6 as $mem)
                    <?php
                    $key = $mem->id;
                    ?>
                    @include('template_part.content-userpool')
                  @endforeach
                </div>
              </div>
              <ul class="pagination justify-content-center">
                <li class="page-item  disabled">
                  <a class="page-link" href="http://calchemunity.com/find_seeker?page=1">Previous</a>
                </li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item ">
                  <a class="page-link" href="http://calchemunity.com/find_seeker?page=2">Next</a>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="seeker-tab" role="tabpanel" aria-labelledby="friend-tab">
              <form action="" id="find-seeker">
                <div class="ui-block responsive-flex1200">
                <div class="ui-block-title">
                  <input type="hidden" name="role" value="seeker">
                  <div class="w-search" >
                    <div class="form-group with-button">
                      <input class="form-control" type="text" name="keyword" value="{{old('keyword',$_GET['keyword'] ?? '')}}" placeholder="Search Seeker......">
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
                        <option value="projects_completed" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'projects_completed' ? 'selected' : '' }}># of Projects Completed</option>
                        <option value="contests_won" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'contests_won' ? 'selected' : '' }}># of Contests Won (1st)</option>
                        <option value="completed_placed" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'completed_placed' ? 'selected' : '' }}># of Contests Placed</option>
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

                  <button type="submit" class="btn btn-md-2 btn-secondary search-talent-btn" style="padding: 8px 12px 8px 12px" align="right">
                    <img src="svg-icons/JobCard/refresh-page-arrow-button.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px">
                  </button>

                </div>
              </div>
              </form>
              <div class="row">
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12 list-seeker-1">
                  @foreach($user_row1 as $mem)
                    <?php
                    $key = $mem->id;
                    ?>
                    @include('template_part.content-userpool')
                  @endforeach
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12 list-seeker-2">
                  @foreach($user_row2 as $mem)
                    <?php
                    $key = $mem->id;
                    ?>
                    @include('template_part.content-userpool')
                  @endforeach
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-6 col-12 list-seeker-3">
                  @foreach($user_row3 as $mem)
                    <?php
                    $key = $mem->id;
                    ?>
                    @include('template_part.content-userpool')
                  @endforeach
                </div>
              </div>
              <ul class="pagination justify-content-center">
                <li class="page-item  disabled">
                  <a class="page-link" href="http://calchemunity.com/find_seeker?page=1">Previous</a>
                </li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item ">
                  <a class="page-link" href="http://calchemunity.com/find_seeker?page=2">Next</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div id="desktop-container-panel" class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
          @include('myprofile.nav-saveusers')
        </div>
        <div class="menu">
          <div class="profile-settings-responsive">
            <a href="#" class="js-profile-settings-open profile-settings-open">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <div class="mCustomScrollbar" data-mcs-theme="dark">
              @include('myprofile.nav-saveusers')
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
$user = Auth::user();
?>
@endif
@endsection

@section('scripts')
  <script type="text/javascript">
    var urlParams = new URLSearchParams(window.location.search);

    $( document ).ready(function() {
      $('.search-talent').css('display', 'none');
      $(document).on('click', '.card .card-header a', function () {
         var _id = $(this).attr('href');
         $(_id+'.collapse').slideToggle();
      })



      $('#find-seeker').submit(function(e){
        e.preventDefault();
        target1 = $(".list-seeker-1");
        target2 = $(".list-seeker-2");
        target3 = $(".list-seeker-3");
        form_data = $(this).serialize();
        url = "{{route('profile.saveusers')}}";
        callAjax(url, form_data, function (res) {
          if (res.error == false) {
            target1.html(res.data1);
            target2.html(res.data2);
            target3.html(res.data3);
          } else {
            swal(res.message);
          }
        });
      });
      /*$(document).on('click', ".check-tag-alche", function(e){
        $('.search-talent').css('display', 'none');
        $('.seach-merchants').css('display', 'block');
        console.log("vào 1");
      });
      $(document).on('click', ".check-tag-seeker", function(e){
        $('.seach-merchants').css('display', 'none');
        $('.search-talent').css('display', 'block');
        console.log("vào 2");
      });
      $(document).on('click', ".seach-merchants", function(e){
        $('.seach-merchants-btn').trigger('click');
        console.log("vào search 2");
      });
      $(document).on('click', ".search-talent", function(e){
        $('.search-talent-btn').trigger('click');
        console.log("vào search 1");
      });*/
      hashtag = urlParams.get('role');
      var role = (hashtag === null) ? 'alchemist' : hashtag;
      if(role ==='seeker'){
       /* $('check-tag-alche').removeClass('active').removeClass('show');
        $('check-tag-seeker').addClass('active').addClass('show');*/
        $('.check-tag-seeker').trigger('click');
        console.log("vào");
      }
    });
    $('.Statistics-mem').on('click' ,function () {
      _this = $(this);
      action(_this);
      _this.unbind('click');
    });
    // $('.ajax-user-stats').each(function (index) {
    //   _this = $(this);
    //   console.log('đâ')
    //   action(_this);
    // });

    function action(target) {
      id = target.data('id');
      target = $("#Statistics-" + id);
      console.log(target.attr('id'));
      form_data = 'id=' + id;
      url = "<?php echo e(route('ajax.loadinfo')); ?>";
      callAjax(url, form_data, function (res) {
        console.log(target.attr('id'));
        if (res.error == false) {
          target.html(res.data);
        } else {
          swal(res.message);
        }
      });
    }


  </script>
@endsection

