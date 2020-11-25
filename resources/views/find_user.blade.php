@extends('layouts.master')
@section('title')
  Search Alchemist
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
            <h1>Search Alchemist</h1>
            <p>Welcome to the Alchemunity Talent Pool. Search Alchemist's from all across the globe by skill, level,
              hourly price, location and spoken languages. Review comprehensive Alchemist details to find your best
              match!</p>
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
              <a class="page-link" href="{{route('find_alchemist')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Contests</a>
            </li>

            <li class="page-item" >
              <a class="page-link" href="{{route('find_seeker')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Seekers</a>
            </li>



            <li class="page-item disabled " >
              <a class="page-link " href="#" tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Alchemists</a>
            </li>

          </ul>
        </nav>

        <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;border-top-left-radius: 0%;" >
          <div class="ui-block-title">
            <h4><strong>Search Alchemist</strong></h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form id="filter_users" method="get" action="{{route('find_alchemist')}}">
    <div class="container">
      <div class="row">

        <div class="col col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 responsive-display-none">
          @include('nav-findalchemits')
        </div>
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
            <div class="ui-block responsive-flex1200">
                <div class="ui-block-title">

                    <div class="w-search" align="left">
                        <div class="form-group with-button">
                            <input class="form-control" type="text" name="keyword" value="{{old('keyword',$_GET['keyword'] ?? '')}}" placeholder="Search Alchemist...">
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

                    <button class="btn btn-md-2 btn-secondary " style="padding: 8px 12px 8px 12px" align="right"><img src="svg-icons/JobCard/refresh-page-arrow-button.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px"></button>
                </div>
            </div>
          <div class="row">
            <div class="col col-lg-4 col-md-6 col-sm-6 col-12">
              @foreach($user_row1 as $mem)
                <?php
                $key = $mem->id;
                ?>
                @include('template_part.content-userpool')
              @endforeach
            </div>
            <div class="col col-lg-4 col-md-6 col-sm-6 col-12">
              @foreach($user_row2 as $mem)
                <?php
                $key = $mem->id;
                ?>
                @include('template_part.content-userpool')
              @endforeach
            </div>
            <div class="col col-lg-4 col-md-6 col-sm-6 col-12">
              @foreach($user_row3 as $mem)
                <?php
                $key = $mem->id;
                ?>
                @include('template_part.content-userpool')
              @endforeach
            </div>
          </div>
          {!!$users ->appends(request()->except('page')) -> links('pagination.default')!!}
        </div>

      </div>
    </div>
  </form>
  <form method="get" action="{{route('find_alchemist')}}">
    <div class="menu">
      <div class="profile-settings-responsive">
        <a href="#" class="js-profile-settings-open profile-settings-open">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
          <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
          <div class="ui-block">
            <div class="news-feed-form ">
              <!-- Tab panes -->
              <div class="ui-block-title ui-block-title-small">
                <h6 class="title">Filter Preferences</h6>
              </div>
              <div class="tab-content">
                <div class="tab-pane {{(isset( $_GET['type']) && $_GET['type'] == 'seeker') ? '' : 'active'}}"
                     id="alchemist-filter" role="tabpanel" aria-expanded="true">

                  <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                      <div class="card-header" role="tab" id="headingOne-2"
                           style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                        <h6 class="mb-0">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-21" aria-expanded="true"
                             aria-controls="collapseOne-2"><img src="svg-icons/sprites/tools.svg" width="15" hspace="1"
                                                                style="PADDING-BOTTOM: 3px; margin-left: 2px">
                            <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Search Skills </span>
                            <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                            </svg>
                          </a>
                        </h6>
                      </div>

                      <div id="collapseOne-21" class="collapse show" role="tabpanel" aria-labelledby="headingOne-2">
                        <div class="col col-lg-12 col-12 no-padding" style="padding-left: 1.55rem;padding-top: 20px;">
                          <h6>+ Search Skills</h6>
                        </div>
                        <ul class="your-profile-menu">
                          <li style="padding-bottom: 10px;">
                            <select class="selectize" name="filter_skill[]" multiple="multiple">
                              <option value="">Enter Skills To Search...</option>
                              @foreach($skills as $skill)
                                <option value="{{(int)$skill->id}}"
                                  {{isset($_GET['filter_skill'])&&in_array($skill->id,$_GET['filter_skill'])? 'selected' : ''}}
                                >{{$skill->name}}</option>
                              @endforeach
                            </select>
                          </li>
                          <button class="btn btn-blue clear_selectize">Clear Skills</button>
                        </ul>

                      </div>
                    </div>
                  </div>
                  <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                      <div class="card-header" role="tab" id="headingOne-3"
                           style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                        <h6 class="mb-0">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-31" aria-expanded="true"
                             aria-controls="collapseOne-3"><img src="svg-icons/sprites/star-icon.svg" width="15"
                                                                hspace="1"
                                                                style="PADDING-BOTTOM: 3px; margin-left: 2px">
                            <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Select Level</span>
                            <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                            </svg>
                          </a>
                        </h6>
                      </div>

                      <div id="collapseOne-31" class="collapse " role="tabpanel" aria-labelledby="headingOne-3">
                        <ul class="your-profile-menu" style="padding-bottom: 0px">
                          @foreach($alchemist_title as $level)
                            @php
                              $checked = isset($inputs['level'])&&in_array($level->id,$inputs['level'])? 'checked' : ''
                            @endphp
                            <li>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="level[]"
                                         value="{{(int)$level->id}}" {{$checked}}>{{$level->name}}
                                </label>
                              </div>
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                      <div class="card-header" role="tab" id="headingOne-4"
                           style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                        <h6 class="mb-0">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-41" aria-expanded="true"
                             aria-controls="collapseOne-4">
                            <img src="svg-icons/menu/target-square.svg" width="15" hspace="1"
                                 style="PADDING-BOTTOM: 3px; margin-left: 2px">
                            <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Price Range </span>
                            <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                            </svg>
                          </a>
                        </h6>
                      </div>

                      <div id="collapseOne-41" class="collapse " role="tabpanel" aria-labelledby="headingOne-4">
                        <div class="search_price"
                             style="padding: 0 1.5rem;border-bottom: solid; border-bottom-width: 1px;border-top-width: 0px;border-bottom-color: #E6ECF5;float: left;width: 100%;">

                          <h6 style="padding-top: 20px;">+ Add Price</h6>
                          <div class="price-range">
                            <input placeholder="Min" class="none_arrow" type="number" name="minprice"
                                   value="{{isset($_GET['minprice']) ? $_GET['minprice'] : ''}}">

                            <input style="float: right;" placeholder="Max" class="none_arrow" type="number"
                                   name="maxprice" value="{{isset($_GET['maxprice']) ? $_GET['maxprice'] : ''}}">
                          </div>
                          <button class="btn btn-blue clear_price">Clear Price</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                      <div class="card-header" role="tab" id="headingOne-5"
                           style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                        <h6 class="mb-0">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-51" aria-expanded="true"
                             aria-controls="collapseOne-5">
                            <img src="svg-icons/menu/maps-and-flags.svg" width="15" hspace="1"
                                 style="PADDING-BOTTOM: 3px; margin-left: 2px">
                            <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Location </span>
                            <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                            </svg>
                          </a>
                        </h6>
                      </div>

                      <div id="collapseOne-51" class="collapse" role="tabpanel" aria-labelledby="headingOne-3">

                        <ul class="your-profile-menu">
                          <h6 style="padding-top: 20px;">+ Add Location</h6>
                          <li style="padding-bottom: 10px;">
                            <select class="selectize" name="location[]" multiple="multiple">
                              <option value="">Alchemist Location</option>
                              @foreach($list_location as $location)
                                <option
                                  value="{{(int)$location->id}}" {{isset($inputs['location'])&&in_array($location->id,$inputs['location'])? 'selected' : ''}}>{{$location->country}}</option>
                              @endforeach
                            </select>
                          </li>
                          <button class="btn btn-blue clear_selectize">Clear Location</button>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                      <div class="card-header" role="tab" id="headingOne-5"
                           style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                        <h6 class="mb-0">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-61" aria-expanded="true"
                             aria-controls="collapseOne-6">
                            <img src="svg-icons/menu/chat.svg" width="15" hspace="1"
                                 style="PADDING-BOTTOM: 3px; margin-left: 2px">
                            <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Language </span>
                            <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                            </svg>
                          </a>
                        </h6>
                      </div>
                      <div id="collapseOne-61" class="collapse" role="tabpanel" aria-labelledby="headingOne-3">
                        <ul class="your-profile-menu">
                          <h6 style="padding-top: 20px;">+ Add Language</h6>
                          <li style="padding-bottom: 10px;">
                            <select class="selectize" name="language[]" multiple="multiple">
                              <option value="">Select Language</option>
                              @foreach($list_language as $language)
                                <option
                                  value="{{(int)$language->id}}" {{isset($inputs['language'])&&in_array($language->id,$inputs['language'])? 'selected' : ''}}>{{$language->language_name}}</option>
                              @endforeach
                            </select>
                          </li>
                          <button class="btn btn-blue clear_selectize">Clear Language</button>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="" value="alchemist">
                  <div class="align-center" style="background-color: #fff;padding: 20px 20px 5px;">
                    <button class="btn btn-blue" style="width: 100%;padding: 15px 0;">SEARCH</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </form>

@endsection
@section('scripts')
  <script type="text/javascript">
    // var mySwiper = new Swiper('.swiper-container', {
    //     speed: 100,
    //     autoplay: {
    // 	    delay: 1000,
    //   	},
    // });

    <?php $var = (isset($_GET['price'])) ? explode(';', $_GET['price']) : [];?>
    $(".range-slider-js2").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 100,
        from: {{$var[0] ?? '20'}},
        to: {{$var[1] ?? '50'}},
        prefix: "$"
      }
    );

    $(document).on('submit', '#filter_users', function () {
      $(this).find('.tab-pane.active').siblings().html('');
    });

    $(document).on('click', '.saved_user', function () {
      id = $(this).data('id');
      _this = $(this);
      form_data = 'id=' + id + '&type=user';
      url = "{{route('ajax.savefavorite')}}";
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: url,
        data: form_data,
        success: function (res) {
          if (res.error == false) {
            var s_text = (res.action == 'add') ? 'SAVED' : 'SAVE';
            var bg = (res.action == 'add') ? 'bg-primary' : 'bg-gradient-gray';
            console.log(s_text, bg);
            _this.find('span').text(s_text);
            _this.removeClass('bg-gradient-gray bg-primary').addClass(bg);
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          } else {
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
    // $('.ajax-user-stats').each(function (index) {
    //   _this = $(this);
    //   console.log('kkkk')
    //   action(_this);
    // });

    function action(target) {
      id = target.data('id');
      target = $("#Statistics-" + id);
      form_data = 'id=' + id;
      url = "{{route('ajax.loadinfo')}}";
      callAjax(url, form_data, function (res) {
        if (res.error == false) {
          target.html(res.data);
        } else {
          swal(res.message);
        }
      });
    }


  </script>
@endsection
