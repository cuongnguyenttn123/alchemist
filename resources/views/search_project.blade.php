@extends('layouts.master')
@section('title')
  Find Jobs
@endsection
@section('content')
  <div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
      <div class="row">
        <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
          <div class="main-header-content">
            <h1>Search Projects</h1>
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

            <li class="page-item disabled " style="padding-left: 0px;" >
              <a class="page-link " href="#" tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Projects</a>
            </li>

            <li class="page-item" >
              <a class="page-link" href="{{route('getListAllContest')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Contests</a>
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
            <h4><strong>Search Projects</strong></h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form method="get" action="{{route('search')}}">
    <div class="container">
      <div class="row">

        <div class="col col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12 responsive-display-none">

          <div class="ui-block">
            <div class="news-feed-form" style="overflow: none;">
              <!-- Nav tabs -->
              <div class="tab-content">
                <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                  <?php $screen = 'desktop'; ?>
                  @include('menu-searchjob',['screen'])
                </div>
              </div>
            </div>

          </div>

        </div>
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
          <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12 ">
              <div class="clients-grid">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
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
                            <option value="of_bid" {{ isset($_GET['order_by']) && $_GET['order_by'] == 'of_bid' ? 'selected' : '' }}># of bid</option>
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
                  {{--<div class="ui-block responsive-flex1200">--}}
                    {{--<div class="ui-block-title">--}}

                      {{--<div class="w-search">--}}
                        {{--<div class="form-group with-button">--}}
                          {{--<input class="form-control" type="text" name="keyword"--}}
                                 {{--value="{{old('keyword',$_GET['keyword'] ?? '')}}" placeholder="Search Project">--}}
                          {{--<button>--}}
                            {{--<svg class="olymp-magnifying-glass-icon">--}}
                              {{--<use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>--}}
                            {{--</svg>--}}
                          {{--</button>--}}
                        {{--</div>--}}
                      {{--</div>--}}

                      {{--<div class="w-select">--}}
                        {{--<div class="title" style="margin-left: 15px">Filter By:</div>--}}
                        {{--<fieldset class="form-group">--}}
                          {{--<select class="selectpicker form-control" name="orderby">--}}
                            {{--<option value="">Select</option>--}}
                            {{--<option--}}
                              {{--value="id,desc" {{(isset($_GET['orderby']) && $_GET['orderby'] == "id,desc") ? "selected" : ""}}>--}}
                              {{--Latest Jobs--}}
                            {{--</option>--}}
                            {{--<option--}}
                              {{--value="budget,asc" {{(isset($_GET['orderby']) && $_GET['orderby'] == "budget,asc") ? "selected" : ""}}>--}}
                              {{--Lowest Price--}}
                            {{--</option>--}}
                            {{--<option--}}
                              {{--value="budget,desc" {{(isset($_GET['orderby']) && $_GET['orderby'] == "budget,desc") ? "selected" : ""}}>--}}
                              {{--Highest Price--}}
                            {{--</option>--}}
                            {{--<option value="">Most Bids</option>--}}
                            {{--<option value="">Fewest Bids</option>--}}
                          {{--</select>--}}
                        {{--</fieldset>--}}
                      {{--</div>--}}

                    {{--</div>--}}
                  {{--</div>--}}
                </div>

                <div class="row sorting-container" id="clients-grid-1" data-layout="masonry">
                  @forelse($projects as $project)
                    @include('template_part.content-job-search', ['project' => $project])
                  @empty
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <h3>No project found</h3>
                    </div>
                  @endforelse
                </div>
                {!!$projects ->appends(request()->except('page')) -> links('pagination.default')!!}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </form>
  <form method="get" action="{{route('search')}}">
    <div class="menu">
      <div class="profile-settings-responsive">

        <a href="javascript:" class="js-profile-settings-open profile-settings-open">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
          <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
          <?php $screen = 'mobile'; ?>
          @include('menu-searchjob',['screen'])
        </div>

      </div>
    </div>
  </form>
  @if(isset($project))
    @include('modal.bid')
  @endif
  <!-- User Files -->
  @include('modal.user-files')

  <input type="hidden" name="bid_create" value={{ route('ajax.bidjob') }}>
  <input type="hidden" name="getBids" value={{ route('project.getBids') }}>

@endsection


@section('scripts')
  <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/assets/boss/js/jobdetail.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/frontend/js/newjob.js')}}"></script>
  <script type="text/javascript">

    <?php $var = (isset($_GET['price'])) ? explode(';', $_GET['price']) : [];?>
    $(".range-slider-js1").ionRangeSlider({
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
    $(document).on('click', '.save_project', function (e) {

      var _this = $(this);
      id = $(this).data('id');
      form_data = 'id=' + id + '&type=project';
      url = "{{route('ajax.savefavorite')}}";
      callAjax(url, form_data, function (res) {
        if (res.error == false) {
          var s_text = (res.action == 'add') ? 'SAVED' : 'SAVE';
          var bg = (res.action == 'add') ? 'bg-primary' : 'bg-gradient-gray';
          console.log(s_text, bg);
          _this.find('span').text(s_text);
          _this.removeClass('bg-gradient-gray bg-primary').addClass(bg);
          $('.save_project').removeClass('bg-gradient-gray bg-primary').addClass(bg);
          jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
        } else {
          swal(res.message);
        }
      });
    });
    $(document).on('click', '.bid_now', function (e) {
      var _this = $(this);
      id = $(this).data('id');
      form_data = 'id=' + id;
      url = "{{route('ajax.bidproject')}}";
      var modal_target = $('#popup-place-bid');
      modal_target.find('input[name=_project]').val(id);
      callAjax(url, form_data, function (res) {
        if (res.error == false) {
          modal_target.find('form .row').html(res.data);
          modal_target.modal('show');
          $('select.selectize').selectize('refresh');
        } else {
          swal(res.message);
        }
      });
    });


  </script>
@endsection
