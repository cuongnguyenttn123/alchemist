@extends('layouts.master')
@section('title')
  {{ isset($project) ? "Edit Contest" : "New Contest" }}
@endsection
@if(Auth::id())
@section('content')
  <style>
    @media (max-width: 1280px) {
      .photo-album-item.create-album {
        width: 90% !important;
        margin: auto !important;
      }
      #cn-skill{
        width: 90% !important;
        margin: auto !important;
      }
    }
    .photo-album-item.create-album:hover{
      border: 2px dashed #ff0b00;
    }
    #filedrag.hover
    {
      color: #f00;
      border-color: #f00;
      border-style: solid;
      box-shadow: inset 0 3px 4px #888;
    }
  </style>
  <div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
      <div class="row">
        <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
          <div class="main-header-content" style="margin-bottom: 60px">

            <h1>
              <i class="fa fa-trophy" aria-hidden="true"></i>  Start Contest</h1>
            <p>Welcome to the Alchemunity Project Search. Search Projects from all across the globe by skill, level,  price, location and spoken languages. Review comprehensive Seeker details to find your best match!</p>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- Your Account Personal Information -->

  <div class="container project-page" style="margin-top: -110px;">
    <div class="row">
      <div class="col col-xl-10 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
        <nav aria-label="Page navigation" style="z-index: 2">
          <ul class="pagination " style="margin: 0px 0px -1px 0px">
            <li class="page-item" style="padding-left: 0px;">
              <a class="page-link"  style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Go Back</a>
            </li>

            <li class="page-item">
              <a class="page-link" href="{{route('profile.newproject')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Create Project</a>
            </li>

            <li class="page-item disabled ">
              <a class="page-link "  tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;">Post Contests</a>
            </li>



          </ul>
        </nav>

        <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;border-top-left-radius: 0%;">
          <div class="ui-block-title">
            <h4>
              <i class="fa fa-trophy" aria-hidden="true" style="margin-left: -8px;margin-right: 12px;font-size: 20px"></i> <strong style="font-size: 17px">Create Contest Panel</strong></h4>
          </div>
        </div>
        <?php $contest = isset($contest) ? $contest : null;?>
        <div class="ui-block" style="background-color: transparent; border: none;">
          <div class="ui-block-content" style="padding: 0;">
          <?php $action = isset($contest) ? route('postEditContest', $contest->id) : route('profile.newcontest')?>
          @if (count($errors) > 0)
            <!-- Alert Message -->
              <div class="col-sm-12 col-12">
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{!! $error !!}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            @endif
            <form class="addnew-form" id="new-project" method="post" action="{!! $action !!}" enctype="multipart/form-data">
              @csrf
              <div class="news-feed-form" style="background-color: #edf2f6;padding-bottom: 15px;border: 0px solid #e6ecf5;">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active inline-items click-step-1" style="width: auto" data-toggle="tab" href="#deposit" role="tab" aria-expanded="true">
                      <span><svg class="svg-inline--fa fa-briefcase fa-w-16" aria-hidden="true" style="font-size: 20px; margin-right: 12px; vertical-align: text-bottom;" data-prefix="fas" data-icon="briefcase" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M320 288h192v144c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V288h192v20c0 6.627 5.373 12 12 12h104c6.627 0 12-5.373 12-12v-20zm192-112v80H0v-80c0-26.51 21.49-48 48-48h80V80c0-26.51 21.49-48 48-48h160c26.51 0 48 21.49 48 48v48h80c26.51 0 48 21.49 48 48zM320 96H192v32h128V96z"></path></svg></span><span style="font-size: 14px">01 - Contest Brief</span>

                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link inline-items click-step-2" data-toggle="tab" href="#securepayment" role="tab" aria-expanded="false">
                      <span><svg class="svg-inline--fa fa-list-alt fa-w-16" aria-hidden="true" style="font-size: 20px; margin-right: 12px; vertical-align: text-bottom;" data-prefix="fas" data-icon="list-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12z"></path></svg></span><span style="font-weight: 400;font-size: 14px">02 - Setup
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link inline-items click-step-3" data-toggle="tab" href="#token" role="tab" aria-expanded="false">
                      <span><svg class="svg-inline--fa fa-calendar-check fa-w-14" aria-hidden="true" style="font-size: 20px; margin-right: 12px;vertical-align: text-bottom;" data-prefix="fas" data-icon="calendar-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M436 160H12c-6.627 0-12-5.373-12-12v-36c0-26.51 21.49-48 48-48h48V12c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v52h128V12c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v52h48c26.51 0 48 21.49 48 48v36c0 6.627-5.373 12-12 12zM12 192h424c6.627 0 12 5.373 12 12v260c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V204c0-6.627 5.373-12 12-12zm333.296 95.947l-28.169-28.398c-4.667-4.705-12.265-4.736-16.97-.068L194.12 364.665l-45.98-46.352c-4.667-4.705-12.266-4.736-16.971-.068l-28.397 28.17c-4.705 4.667-4.736 12.265-.068 16.97l82.601 83.269c4.667 4.705 12.265 4.736 16.97.068l142.953-141.805c4.705-4.667 4.736-12.265.068-16.97z"></path></svg></span><span style="font-size: 14px">03 - Approval
                      </span>
                    </a>
                  </li>
                </ul>
              </div>


              <div class="form-section">
                <div class="row" style="margin-bottom: 0px;">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
                    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                      <div class="ui-block-title">
                        <h6 style="font-size: 15px"><span><svg class="svg-inline--fa fa-briefcase fa-w-16" aria-hidden="true" style="font-size: 20px; margin-right: 12px; vertical-align: text-bottom;" data-prefix="fas" data-icon="briefcase" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M320 288h192v144c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V288h192v20c0 6.627 5.373 12 12 12h104c6.627 0 12-5.373 12-12v-20zm192-112v80H0v-80c0-26.51 21.49-48 48-48h80V80c0-26.51 21.49-48 48-48h160c26.51 0 48 21.49 48 48v48h80c26.51 0 48 21.49 48 48zM320 96H192v32h128V96z"></path></svg></span><span style="font-weight: 400;font-size: 14px">01 - Contest Brief</span>
                        </h6>
                        <div class="align-right form-navigation">
                          <a class="next btn btn-primary btn-md-2 next-step-2 text-uppercase" href="javascript:;">Next</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-top: 0px">
                  <div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
                    <div class="ui-block">
                      <div class="ui-block-title " style="background-image: linear-gradient(#73757e, #3f4257)">
                        <svg class="svg-inline--fa fa-cog fa-w-16 c-create" aria-hidden="true" style="color:#ffffff; font-size: 19px;margin-left: -4px;margin-right: 12px; float: left;" data-prefix="fas" data-icon="cog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M444.788 291.1l42.616 24.599c4.867 2.809 7.126 8.618 5.459 13.985-11.07 35.642-29.97 67.842-54.689 94.586a12.016 12.016 0 0 1-14.832 2.254l-42.584-24.595a191.577 191.577 0 0 1-60.759 35.13v49.182a12.01 12.01 0 0 1-9.377 11.718c-34.956 7.85-72.499 8.256-109.219.007-5.49-1.233-9.403-6.096-9.403-11.723v-49.184a191.555 191.555 0 0 1-60.759-35.13l-42.584 24.595a12.016 12.016 0 0 1-14.832-2.254c-24.718-26.744-43.619-58.944-54.689-94.586-1.667-5.366.592-11.175 5.459-13.985L67.212 291.1a193.48 193.48 0 0 1 0-70.199l-42.616-24.599c-4.867-2.809-7.126-8.618-5.459-13.985 11.07-35.642 29.97-67.842 54.689-94.586a12.016 12.016 0 0 1 14.832-2.254l42.584 24.595a191.577 191.577 0 0 1 60.759-35.13V25.759a12.01 12.01 0 0 1 9.377-11.718c34.956-7.85 72.499-8.256 109.219-.007 5.49 1.233 9.403 6.096 9.403 11.723v49.184a191.555 191.555 0 0 1 60.759 35.13l42.584-24.595a12.016 12.016 0 0 1 14.832 2.254c24.718 26.744 43.619 58.944 54.689 94.586 1.667 5.366-.592 11.175-5.459 13.985L444.788 220.9a193.485 193.485 0 0 1 0 70.2zM336 256c0-44.112-35.888-80-80-80s-80 35.888-80 80 35.888 80 80 80 80-35.888 80-80z"></path></svg><span style="font-size: 15px;color: #fff; padding-left: 0px; font-weight: 500; float: left;padding-top: 2px">Preferences</span>
                      </div>
                      <div id="accordion" role="tablist" class="countbox" aria-multiselectable="true">
                        <div class="card seachcriteria">
                          <div class="card-header " role="tab" id="headingOne-2" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                            <h6 class="mb-0">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-7" aria-expanded="true" aria-controls="collapseOne-7">
                                <img class="hpimg1" src="svg-icons/Create Job/incomplete.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
                                <img class="hpimg2" src="svg-icons/Create Job/checked.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
                                <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Search Criteria </span>
                                <svg class="olymp-dropdown-arrow-icon">
                                  <use xlink:href="#olymp-dropdown-arrow-icon"></use>
                                </svg>
                              </a>
                            </h6>
                          </div>
                          <div id="collapseOne-7" class="collapse cats_skill" role="tabpanel" aria-labelledby="headingOne-7">
                            <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 0px;border-bottom-color: #E6ECF5">
                              <div class="w-select" style="padding: 0px">
                                <h6>+ Select Category</h6>
                                <span>Select skill categories you think will be involved in your contest.</span>
                                <select name="cats[]" class="selectize form-control select_cats" multiple>
                                  <option value="">Enter contest categories...</option>
                                  @foreach($cats as $cate)
                                    <option @if(old("cats") && in_array((string)$cate->id, old("cats"))){!! 'selected' !!}@endif value="{{ $cate->id }}" {{ (old("cats") == $cate->id ? "selected":"") }}>{{ $cate->name }}</option>
                                  @endforeach
                                </select>
                                <button class="clear_selectize btn btn-blue" >Clear Categories</button>
                              </div>
                            </div>
                            <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">
                              <br>
                              <div class="w-select col col-lg-12 col-12 no-padding" style="padding: 0px">
                                <h6>+ Add Skills</h6>
                                <span>Choose skills for new contest</span>
                                <select class="selectize form-control select_skill" name="skill[]" multiple>
                                  <option value="">Enter Skills to search...</option>
                                  @foreach($skills as $key=>$skill)
                                    <option @if(old("skill") && in_array((string)$skill->id, old("skill"))){!! 'selected' !!}@endif data-name="{{$skill->name}}" value="{{$skill->id}}">{{$skill->name}}</option>
                                  @endforeach
                                </select>
                                <button class="clear_selectize btn btn-blue" >Clear Skills</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="accordion" role="tablist" class="countbox-1" aria-multiselectable="true">
                        <div class="card seachcriteria lever_preference">
                          {{--<div class="card-header" role="tab" id="headingOne-4" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                            <h6 class="mb-0">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-8" aria-expanded="true" aria-controls="collapseOne-4">
                                <img class="hpimg2" src="svg-icons/Create Job/checked.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
                                <img class="hpimg1" src="svg-icons/Create Job/incomplete.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
                                <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Level Preference </span>
                                <svg class="olymp-dropdown-arrow-icon">
                                  <use xlink:href="#olymp-dropdown-arrow-icon"></use>
                                </svg>
                              </a>
                            </h6>
                          </div>--}}
                          <div id="collapseOne-8" class="collapse" role="tabpanel" aria-labelledby="headingOne-8">
                            <ul class="your-profile-menu hungpro" style="padding-bottom: 0px">
                              @foreach($alchemist_title as $i => $title)
                                <?php $disabled = ($i > 1) ? 'disabled' : ''; ?>
                                <?php $line = ($i > 1) ? 'text-decoration: line-through;' : ''; ?>
                                  @if($disabled == '')
                                    <input type="hidden" name="user_title[]" value="{{$title->id}}">
                                    @endif

                                <li>
                                  <div class="checkbox">
                                    <label style="{{$line}}">
                                      <input type="checkbox" {{$disabled}} name="user_title[]" value="{{$title->id}}" @if(old("user_title") && in_array((string)$title->id, old("user_title"))){!! 'checked' !!}@endif>
                                      {{$title->name}} LV {{$title->min_level}}-{{$title->max_level}}
                                    </label>
                                  </div>
                                </li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-8 order-md-2 col-sm-12 col-12 no-margin">
                    <div class="row" style="margin-bottom: 10px">
                      <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
                        <div class="ui-block" data-mh="pie-chart" style=" padding: 0px 0px 10px 0px ">
                          <div class="ui-block-title " style="background-image: linear-gradient(#73757e, #3f4257)">
                            <svg class="svg-inline--fa fa-pencil-alt fa-w-16 c-create" aria-hidden="true" style="color:#ffffff;font-size: 19px;margin-left: -4px;margin-right: 12px; float: left;" data-prefix="fas" data-icon="pencil-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg> <span style="font-size: 15px;color: #fff; padding-left: 0px; font-weight: 500; float: left;padding-top: 2px">Contest Brief</span>
                          </div>
                          <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">
                            <div class="crumina-module crumina-heading with-title-decoration ">
                              <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Contest Description</h6>
                            </div>
                            <div class="row" style="margin-top: -15px">
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                <hp>Contest Title</hp>
                                <input style="height: 40px;" class="form-control" name="name_contest" placeholder="Task Title" type="text" value="{{ old('name_contest', isset($contest->name_contest) ? $contest->name_contest : '' ) }}"  required data-parsley-minlength="1">
                              </div>
                            </div>
                            <div class="row" style="margin-top: -10px;">
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                <hp>Contest Description:</hp>
                                <div class="form-group label-floating is-empty" style="border-radius: 5px;margin-bottom: 10px;">
                                  <label class="control-label" style="font-size: 11px;">Describe what you need done....</label>
                                  <textarea class="form-control" name="rules" required>{{ old('rules', isset($contest->rules) ? $contest->rules : '' ) }}</textarea>
                                  <span class="material-input"></span></div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                      <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="align-right form-navigation">
                          <a class="next btn btn-primary btn-md-2 next-step-2 text-uppercase" href="javascript:;">Next</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-section">
                <div class="row" style="margin-bottom: 0px;">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin ">
                    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                      <div class="ui-block-title">
                        <h6 style="font-size: 15px">
                          <span><svg class="svg-inline--fa fa-list-alt fa-w-16" aria-hidden="true" style="font-size: 20px; margin-right: 12px; vertical-align: text-bottom;" data-prefix="fas" data-icon="list-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12z"></path></svg></span><span style="font-weight:400;font-size: 14px">02 - Setup
                      </span>
                        </h6>
                        <div class="align-right form-navigation divs_button">
                          <a class="previous btn btn-md-2 btn-border-think custom-color c-grey text-uppercase diva_previous" href="javascript:;">Previous</a>
                          <a class="next btn btn-primary btn-md-2 text-uppercase diva_next" href="javascript:;">Next</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-top: 0px">
                  <div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-4 order-md-1 col-sm-12 col-12 no-margin">
                    <div class="ui-block">
                      <div class="ui-block-title " style="background-image: linear-gradient(#73757e, #3f4257);">
                        <svg class="svg-inline--fa fa-lightbulb fa-w-12 c-create" aria-hidden="true" style="color: #ffffff;font-size: 18px;margin-right: 12px; float: left;" data-prefix="fas" data-icon="lightbulb" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M272 428v28c0 10.449-6.68 19.334-16 22.629V488c0 13.255-10.745 24-24 24h-80c-13.255 0-24-10.745-24-24v-9.371c-9.32-3.295-16-12.18-16-22.629v-28c0-6.627 5.373-12 12-12h136c6.627 0 12 5.373 12 12zm-143.107-44c-9.907 0-18.826-6.078-22.376-15.327C67.697 267.541 16 277.731 16 176 16 78.803 94.805 0 192 0s176 78.803 176 176c0 101.731-51.697 91.541-90.516 192.673-3.55 9.249-12.47 15.327-22.376 15.327H128.893zM112 176c0-44.112 35.888-80 80-80 8.837 0 16-7.164 16-16s-7.163-16-16-16c-61.757 0-112 50.243-112 112 0 8.836 7.164 16 16 16s16-7.164 16-16z"></path></svg><span style="font-size: 15px;color: #fff; padding-left: 0px; font-weight: 500; float: left;padding-top: 1px">Price &amp; Estimated Days</span>
                      </div>
                      <div class="ui-block-content">
                        <div class="row">
                          <div class="col col-lg-12 col-md-12 col-sm-12 col-12 step2-reponsive" style="margin-bottom: 5px">
                            <hp>Price Estimate ($USD)</hp>
                            <div class="form-group bugget-input  quantity with-icon" style="margin-bottom: -5px;margin-top: 10px;">
                              <i class="fas fa-dollar-sign c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                              <a href="javascript:;" class="quantity-minus">&#8744;</a>
                              <input onkeyup="this.value=FormatNumber(this.value);" id="replace_budget_value" class="replace_budget form-control none_arrow" type="text" name="total_prize" value="{{ old('total_prize', isset($contest->total_prize) ? $contest->total_prize : 0 ) }}" required>
                              <a href="javascript:;" class="quantity-plus">&#8743;</a>
                            </div>
                            <br>
                            <hp>Date to Post Contest</hp>
                            <div class="form-group deadline-time bugget-input  quantity with-icon" style="margin-bottom: -25px;margin-top: 10px;">
                              <svg class="svg-inline--fa fa-calendar-alt fa-w-14 c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px;" data-prefix="far" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></svg>
                              <input class="contest-time-line form-control" type="text" name="time_start" value="{{ old('time_start', isset($contest->time_start) ? $contest->time_start : date('m/d/Y') ) }}" data-date-autoclose="true" class="form-control" required>
                              <input type="hidden" id="contest_time_end_value" name="time_end" value="">
                              <span class="input-group-addon">
                                <svg class="olymp-month-calendar-icon icon" style="width: 15px;padding-bottom: 5px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
                              </span>
                            </div>
                            <br>
                          </div>

                        </div>
                      </div>

                    </div>
                    <div class="ui-block">
                      <div class="ui-block-title " style="background-image: linear-gradient(#73757e, #3f4257);">
                        <svg class="svg-inline--fa fa-gem fa-w-18 c-create" aria-hidden="true" style="color:#ffffff; font-size: 18px;margin-left: -4px;margin-right: 12px; float: left;" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M485.5 0L576 160H474.9L405.7 0h79.8zm-128 0l69.2 160H149.3L218.5 0h139zm-267 0h79.8l-69.2 160H0L90.5 0zM0 192h100.7l123 251.7c1.5 3.1-2.7 5.9-5 3.3L0 192zm148.2 0h279.6l-137 318.2c-1 2.4-4.5 2.4-5.5 0L148.2 192zm204.1 251.7l123-251.7H576L357.3 446.9c-2.3 2.7-6.5-.1-5-3.2z"></path></svg><span style="font-size: 15px;color: #fff; padding-left: 0px; font-weight: 500; float: left;padding-top: 1px">Posting Type &amp; Credit Fee</span>
                      </div>
                      <div class="ui-block-content">
                        <div class="row">
                          <div class="col col-lg-12 col-md-12 col-sm-12 col-12 step2-reponsive" style="margin-bottom: 5px">
                            <div class="ui-block-title" style="border-bottom: none !important;padding-left: 0px;padding-right: 0px; padding-bottom: 0px;padding-top: 0px; margin-bottom: 15px; border-bottom-width: 1px;border-bottom-color: #E6ECF5" >
                              <div class="w-search list_type" style="width: 100%" >
                                <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding" style="margin-bottom: 10px">
                                  <div class="ui-block-content no-padding">

                                    <div class="crumina-module crumina-heading with-title-decoration " style="margin-bottom: 15px;">

                                      <h5 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Listing Type</h5>
                                    </div>
                                  </div>
                                  <div style="border-bottom: solid 1px #e6ecf5;">
                                    <p style="line-height: 20px">Enhance your contest visibility with extra posting filters. The cratft credit pricing multipies for extra tags.</p>
                                  </div>
                                  </div>
                                <div class="list_type_bid_contest">
                                  <ul class="your-profile-menu" style="padding: 7px 0px 6px 0px !important; border-bottom:none !important;">
                                    @foreach($list_type as $type)
                                      @if($type->type_name == 'Featured')
                                      <li>
                                        <div class="checkbox list_type">
                                          <label>
                                            <input type="checkbox" name="list_type[]" value="{{$type->id}}" data-week1="7" data-week2="10" data-week3="13.5" data-week4="15">
                                            <span class="listname" style="font-size: 13px;">{{$type->type_name}} Contest</span>

                                          </label>
                                        </div>
                                      </li>
                                      @endif
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="crumina-module crumina-heading with-title-decoration " style="margin-bottom: 15px; margin-top: 15px">
                              <h5 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Entry Duration</h5>
                            </div>
                            <hp>Select the Contest Entry duration. Make sure to have suffcient credit before posting your Contest.  </hp>
                            <div class="hp_week col col-lg-12 col-md-12 col-sm-12 col-12 no-padding" style="margin-top: 20px;">
                              <div class="radio" style="padding-left: 0px" >
                                <label>
                                  <input class="oneweek" type="radio" name="credit" data-week="1" value="" checked>
                                  <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: middle;margin: 0px 2px"> <span class="oneweek" style="position: relative;left: 0;display: inline;">3</span> CT - 1 Week
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input class="twoweek" type="radio" name="credit" data-week="2" value="">
                                  <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: middle;margin: 0px 2px"> <span class="twoweek" style="position: relative;left: 0;display: inline;">5</span> CT - 2 Week
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input class="threeweek" type="radio" name="credit" data-week="3" value="">
                                  <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: middle;margin: 0px 2px"> <span class="threeweek" style="position: relative;left: 0;display: inline;">10</span> CT - 3 Week
                                </label>
                              </div>
                              <div class="radio">
                                <label>
                                  <input class="fourweek" type="radio" name="credit" data-week="4" value="">
                                  <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: middle;margin: 0px 2px"> <span class="fourweek" style="position: relative;left: 0;display: inline;">13.5</span> CT - 4 Week
                                </label>
                              </div>

                              <input type="hidden" name="week" value="">
                            </div>

                            <div id="cn-skill" class="ui-block-content no-padding">
                              <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 0px"><span class="skills-item-title"> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span></span></div>
                              <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Total Credit Required</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units craftingcost">0</span> <span> CT</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                              <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Credit Remaining</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span> <span class="units">{{$user->total_credit}} CT </span>  <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="hp_previewfile showfile col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-8 order-md-2 col-sm-12 col-12 no-margin" >
                    <div class="ui-block">
                      <div class="ui-block-title " style="background-image: linear-gradient(#73757e, #3f4257)">
                        <svg class="svg-inline--fa fa-folder-open fa-w-18 c-create" aria-hidden="true" style="color:#ffffff; font-size: 19px;margin-left: -4px;margin-right: 12px; float: left;" data-prefix="fas" data-icon="folder-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M572.694 292.093L500.27 416.248A63.997 63.997 0 0 1 444.989 448H45.025c-18.523 0-30.064-20.093-20.731-36.093l72.424-124.155A64 64 0 0 1 152 256h399.964c18.523 0 30.064 20.093 20.73 36.093zM152 224h328v-48c0-26.51-21.49-48-48-48H272l-64-64H48C21.49 64 0 85.49 0 112v278.046l69.077-118.418C86.214 242.25 117.989 224 152 224z"></path></svg><span style="font-size: 15px;color: #fff; padding-left: 0px; font-weight: 500; float: left;padding-top: 2px">Reference Files</span>
                      </div>
                      <div class="ui-block-title form-group" style="padding-top: 0px;">
                        <input style="width: 100%; display: none" id="hp_file" class="hp_file_contest hp_file_create_contest abcsd" type="file" name="file_attached[]" value="" multiple="" data-parsley-group="block-0" data-parsley-id="36">
                        <input type="hidden" type="text" id="list_array_delete" name="file_attached_delete">
                        <input type="hidden" type="text" id="list_array_delete_drag" name="file_attached_delete_drag">
                        <input type="hidden" type="text" id="list_id_file_drag" name="list_id_file_drag">
                      </div>
                      <fieldset style="margin-top: -30px;">
                        <div>
                          <label for="fileselect"></label>
                          <input type="hidden" id="fileselect" name="fileselect[]" multiple="multiple" />
                          <div id="filedrag">
                            <div class="ui-block-content" style="padding-top: 5px;padding-bottom: 10px;"><div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 15px">
                                <div class="content" style="margin-top: 15px">
                                  <a class="btn btn-control bg-primary abcs">
                                    <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                  </a>

                                  <a  class="title h5" data-toggle="modal" data-target="#create-photo-album">Add or Drag &amp; Drop</a>
                                  <span class="sub-title">Add reference files to attract Alchemists!</span>

                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>


                    <div id="messages">
                    </div>

                    <div class="cart_item d-none" style="margin-bottom: 10px; border-bottom: 1px solid #e6ecf5;">
                      <div class="ui-block" data-mh="pie-chart" style="padding: 15px;margin: 0px;border: none;">
                        <div class="forum-item">
                          <img src="img/zip.svg" alt="forum" width="40">
                          <div class="content">
                            <a href="javascript:;" class="h6 title" style="word-break: break-word;"></a>
                            <div class="post__date">
                              <time class="published" datetime="2017-03-24T18:18"></time>
                            </div>
                            <span class="notification-icon click-delete-file" data-filedelete style="margin-top: -35px; float: right; display: block;">
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
                    <div class="ui-block" style="margin-bottom: 0px; border:none !important;">
                      <div class="cart-main">
                        <div>
                          <div class="shop_table cart">
                            <div class="hienthi material-input"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="align-right form-navigation" style="margin-top: 30px;">
                      <a class="previous btn btn-md-2 btn-border-think custom-color c-grey text-uppercase diva_previous" href="javascript:;">Previous</a>
                      <a class="next btn btn-primary btn-md-2 text-uppercase diva_next" href="javascript:;">Next</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-section preview-job">
                <div class="row" style="margin-bottom: 0px;">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
                    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                      <div class="ui-block-title">
                        <h6 style="font-size: 15px">
                          <span><svg class="svg-inline--fa fa-calendar-check fa-w-14" aria-hidden="true" style="font-size: 20px; margin-right: 12px;vertical-align: text-bottom;" data-prefix="fas" data-icon="calendar-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M436 160H12c-6.627 0-12-5.373-12-12v-36c0-26.51 21.49-48 48-48h48V12c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v52h128V12c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v52h48c26.51 0 48 21.49 48 48v36c0 6.627-5.373 12-12 12zM12 192h424c6.627 0 12 5.373 12 12v260c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V204c0-6.627 5.373-12 12-12zm333.296 95.947l-28.169-28.398c-4.667-4.705-12.265-4.736-16.97-.068L194.12 364.665l-45.98-46.352c-4.667-4.705-12.266-4.736-16.971-.068l-28.397 28.17c-4.705 4.667-4.736 12.265-.068 16.97l82.601 83.269c4.667 4.705 12.265 4.736 16.97.068l142.953-141.805c4.705-4.667 4.736-12.265.068-16.97z"></path></svg></span><span style="font-weight: 400;font-size: 14px">03 - Approval Stage
                      </span>
                        </h6>
                        <div class="align-right form-navigation div_button">
                          <a class="previous btn btn-md-2 btn-border-think custom-color c-grey text-uppercase div_button_previous" href="javascript:;">Previous</a>
                          <button type="submit" class="btn btn-green btn-md-2 btn-success create-success text-uppercase div_button_next">Approve</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-top: 0px">
                  <div class="col col-xl-5 order-xl-1 col-lg-5 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
                    <div class="ui-block info-job">
                      <div class="ui-block-title " style="background-image: linear-gradient(#73757e, #3f4257)">
                        <svg class="svg-inline--fa fa-list fa-w-16 c-create" aria-hidden="true" style="color:#ffffff; font-size: 18px;margin-left: -3px;margin-right: 12px; float: left;" data-prefix="fas" data-icon="list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M128 116V76c0-8.837 7.163-16 16-16h352c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H144c-8.837 0-16-7.163-16-16zm16 176h352c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H144c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h352c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H144c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zM16 144h64c8.837 0 16-7.163 16-16V64c0-8.837-7.163-16-16-16H16C7.163 48 0 55.163 0 64v64c0 8.837 7.163 16 16 16zm0 160h64c8.837 0 16-7.163 16-16v-64c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v64c0 8.837 7.163 16 16 16zm0 160h64c8.837 0 16-7.163 16-16v-64c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v64c0 8.837 7.163 16 16 16z"></path></svg><!-- <i class="fas fa-list c-create" aria-hidden="true" style="font-size: 18px;margin-left: -3px;margin-right: 12px; float: left "></i> --><span style="font-size: 15px;color: #fff; padding-left: 0px; font-weight: 500; float: left;padding-top: 2px">Contest Breakdown</span>
                      </div>
                      <div class="ui-block-content">
                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Entry Starts</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units bid_start_contest" >10/04/2019</span></span></div>
                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Entry Ends</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units bid_end_contest" >10/20/2019</span></span></div>
                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Post Date</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{date("m/d/Y")}}</span></span></div>

                        <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Contest Total</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units budget contest_budget">2,400.68</span></span></div>
                        {{-- <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Token Value</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">240.68</span> ALC <img src="svg-icons/JobCard/AlchemToken.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div> --}}
                        <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Crafting Cost</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units craftingcost" >0</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                      </div>
                    </div>
                    {{--  <div class="ui-block">
                        <!-- Your Profile  -->
                        <div class="your-profile list_ms">
                           <div class="post-thumb" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                              <a href="javascript:;" class="post-category  full-width align-center" style="background-image: linear-gradient(#90CB1E, #4EB901); padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 14px;font-weight: 500;color: #fff">$<span class="budget">2,680</span> | 5 Days</a>
                           </div>
                        </div>
                        <!-- ... end Your Profile  -->
                     </div> --}}
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="hp_previewfile previewfile">
                      <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;background-color: #EDF2F6;margin-bottom: 5px">
                        <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 20px; padding-bottom: 20px;">
                          <h6 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-40" aria-expanded="true" aria-controls="collapseOne">
                              <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                              <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
                              <svg class="olymp-dropdown-arrow-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                              </svg>
                            </a>
                          </h6>
                        </div>
                        <div id="collapseOne-40" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
                          <div class="ui-block" style="margin-bottom: 0px">
                            <div class="cart-main">
                              <!-- Shop Table Cart -->
                              <div>
                                <div class="shop_table cart">
                                  <div class="hienthi showfile-step3 hienthi-drag">
                                  </div>
                                  <button class="btn-display-none btn btn-purple btn-md-2 btn-icon-left reset_file click-delete-file-all" type="button" style="display:none;background-image: linear-gradient(#57596E, #3F4257);margin-right: 5px;margin-left: 20px; margin-top: 15px;" data-parsley-group="block-1">
                                    <svg class="svg-inline--fa fa-window-close fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="window-close" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                      <path fill="currentColor" d="M464 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-83.6 290.5c4.8 4.8 4.8 12.6 0 17.4l-40.5 40.5c-4.8 4.8-12.6 4.8-17.4 0L256 313.3l-66.5 67.1c-4.8 4.8-12.6 4.8-17.4 0l-40.5-40.5c-4.8-4.8-4.8-12.6 0-17.4l67.1-66.5-67.1-66.5c-4.8-4.8-4.8-12.6 0-17.4l40.5-40.5c4.8-4.8 12.6-4.8 17.4 0l66.5 67.1 66.5-67.1c4.8-4.8 12.6-4.8 17.4 0l40.5 40.5c4.8 4.8 4.8 12.6 0 17.4L313.3 256l67.1 66.5z"></path>
                                    </svg>CLEAR ALL<div class="ripple-container">

                                    </div>
                                  </button>

                                </div>
                              </div>
                              <!-- ... end Shop Table Cart -->
                            </div>
                          </div>
                          <div class="ui-block file-drag-preview">

                            <div class="ui-block-content">

                              <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                                <a href="#" data-toggle="modal" data-target="" ></a>

                                <div class="content" style="margin-top: 10px">

                                  <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="">
                                    <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                  </a>

                                  <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Files Added</a>
                                  <span class="sub-title">Add reference files to attract Alchemists!</span>

                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col col-xl-7 order-xl-2 col-lg-7 order-lg-2 col-md-7 order-md-2 col-sm-12 col-12 no-margin" >
                    <div class="row" style="margin-bottom: 10px">
                      <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
                        <div class="ui-block content-job">
                          <div class="post-thumb" style="margin: 0px 0px 0px 0px; ">
                            <a href="javascript:;" class="post-category bg-smoke full-width align-center" style="padding-top: 10px;padding-bottom: 10px; margin: 0px;border-radius: 0px; font-size: 14px;color: #858AA6;background-image: linear-gradient(#FFFFFF, #FAFBFD);border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5"><span class="budget contest_budget">2,500</span> USD | <span class="totaltime bid_end_contest_day">3</span></a>
                          </div>
                          <div class="friend-header-thumb friend-header-thumb-none" style="display: none;">
                            <img src="img/featured-contest-bg-.svg" alt="friend">
                          </div>
                          <article class="hentry post video">
                            @include('template_part.part-infouserContest', ['user'=>Auth::user()])
                            <div class="post__author author vcard inline-items author-info">
                              <a data-toggle="tooltip" data-placement="top" title="POSTED JOBS" href="javascript:;" class="post-add-icon inline-items">
                                <img src="svg-icons/JobCard/paper-plane.svg" class="olymp-heart-icon">
                                <span>{{Auth::user()->total_jobs()}}</span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="REVIEWS" href="javascript:;" class="post-add-icon inline-items">
                                <img src="svg-icons/JobCard/interface.svg" class="olymp-heart-icon">
                                <span>{{Auth::user()->reviews->count()}}</span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="SEEKER POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
                                <img src="svg-icons/JobCard/seo-and-web.svg" class="olymp-heart-icon" style="border-radius: 0%;width: 15px">
                                <span>SP | LV {{Auth::user()->level}}</span>
                              </a>
                              <a data-toggle="tooltip" data-placement="top" title="REPUTAION POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
                                <img src="svg-icons/JobCard/yes.svg" class="olymp-heart-icon">
                                <span>RP | LV {{Auth::user()->rp_level}}</span>
                              </a>
                            </div>
                            <div class="post__date" style="color: #9A9FBF;margin-bottom: 10px; margin-top: 20px;" >
                              <time class="published" datetime="2004-07-24T18:18">
                                Posted: {{date('H:i m/d/Y')}}
                              </time>
                            </div>
                            <div class="post__author author vcard   inline-items" >
                              <div class="author-date">
                                <a class="h6 post__author-name fn" href="javascript:;" style="word-wrap: break-word; padding-right: 8px; font-weight: 500; margin-bottom: 0px; line-height: 20px">
                                  <span class="name"></span>
                                </a>
                              </div>
                            </div>
                            <div class="detail_description" style="margin-top: 0px;padding-bottom: 15px;"></div>
                            <div class="post__date" style="margin-bottom: 25px; margin-top: -5px; margin-bottom: 10px; margin-top: -5px; padding-bottom: 15px; border-bottom: solid 1px #E6ECF5;">
                              <time data-toggle="tooltip" data-placement="top" title="DATE POSTED" class="published" datetime="2004-07-24T18:18">
                                <img src="svg-icons/menu/post-it.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 9px;margin-left: 1px;"><span class="bid_start_contest"></span>
                              </time>
                              <time data-toggle="tooltip" data-placement="top" title="Time to Enter" class="published" datetime="2004-07-24T18:18">
                                <img src="svg-icons/JobCard/timer.svg" class="olymp-heart-icon" style="width: 18px; border-radius: 0%;margin-left: 10px">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                <span style="font-weight: 400;color: #888DA8"></span>
                                <span class="bid_end_contest_day"></span >
                              </time>
                              <a data-toggle="tooltip" data-placement="top" title="Time to Enter" href="#" class="post-add-icon inline-items">

                              </a>
                              <div class=" inline-items" style="margin-top: 5px" >
                                <a data-toggle="tooltip" data-placement="top" title="FIAT PRICE" href="#" class="post-add-icon inline-items">
                                  <img src="svg-icons/menu/target-square.svg" class="olymp-heart-icon" style="border-radius: 0%"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use><span style="font-weight: 400;color: #888DA8" class=""></span><span style="font-weight: 400;color: #888DA8" class="budget contest_budget"></span><span style="font-weight: 400;color: #888DA8">&nbsp;USD</span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="Contest Entry Period" href="#" class="post-add-icon inline-items" style="margin-left: 10px">
                                  <img src="svg-icons/JobCard/checked-calendar-icon-01.svg" class="olymp-heart-icon" style="border-radius: 0%"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use><span style="font-weight: 400;color: #888DA8"></span> <span style="font-weight: 400;color: #888DA8;"><span class="contest_week"></span > Week Entry Period</span>
                                </a>
                              </div>
                            </div>
                            <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding" style="padding-bottom: 0px;margin-top: -10px;margin-bottom: 10px;">
                              <div class="skills-item-info" style="padding-bottom: 0px;margin-bottom: 8px;"><span class="skills-item-title"><span style="color: #9a9fbf; padding-bottom: 5px;padding-right: 3px;font-size: 22px;font-weight: 500;vertical-align: sub;">●</span><span style="color: #525488; padding-bottom: 5px;padding-left: 0px; padding-right: 8px;font-size: 13px;font-weight: 500">Categories</span><span style="color: #38a9ff; padding-bottom: 5px;padding-right: 3px;font-size: 22px;font-weight: 500; vertical-align: sub;">●</span><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skills</span></span> </div>
                              <span class="approve_cats">
                                          <button type="button" class="btn btn-secondary btn-sm show_cats d-none" style="padding: 4px 10px;margin-right: 10px;margin-bottom: 10px;"></button>
                                          <span class="show_button"></span>
                                        </span>
                              <span class="approve_skill" style="">
                                          <button type="button" class="btn btn-blue btn-sm show_skill d-none" style="padding: 4px 10px;margin-right: 10px;margin-bottom: 10px;"></button>
                                          <span class="show_button"></span>
                                        </span>
                            </div>
                          </article>
                        </div>
                      </div>
                    </div>
                    <div class="align-right form-navigation" style="margin-top: 20px;">
                      <a class="previous btn btn-md-2 btn-border-think custom-color c-grey text-uppercase diva_previous" href="javascript:;">Previous</a>
                      <button type="submit" class="btn btn-green btn-md-2 btn-success create-success text-uppercase button_approve">Approve</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion item-ms d-none" role="tablist" aria-multiselectable="true">
    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h6 class="mb-0">
          <a class="collapse" data-toggle="collapse" data-parent="#accordion" href="#item-ms-99" aria-expanded="true" aria-controls="collapseOne">
            <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #858AA6">Milestone 0<span class="ms_counter">2</span> | <span class="percent_payment">30</span>% | $<span class="info_percent">2,400</span> USD</span>
            <svg class="olymp-dropdown-arrow-icon">
              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
            </svg>
          </a>
        </h6>
      </div>
      <div id="item-ms-99" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <ul class="your-profile-menu">
          <ul class="order-totals-list" style="padding: 10px 0px 10px 0px;vertical-align: top">
            <li>
              <span class="title"></span>
            </li>
            <div class="comment-content comment">
              <div class="description"></div>
              <br><br>
              <img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
              <span class="ui-block-title-small" style="margin-right: 8px">$<span class="info_percent">10,000</span></span>
              <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
              <span class="ui-block-title-small" style="margin-right: 8px"><span class="workday">3</span> Days</span>
            </div>
          </ul>
        </ul>
      </div>
    </div>
  </div>
  <!-- Modal Large Size -->
  <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
          </svg>
        </a>
        <div class="modal-header">
          <h4 class="title" id="largeModalLabel">File</h4>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#gallery"><i class="fas fa-user"></i>Gallery</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#new-upload"><i class="fas fa-upload"></i> Upload</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane show active" id="gallery">
              <div class="row media-container">
                @if(!empty($files))
                  @forelse ($files as $file)
                    {!!View::make('template_part.content-attachfile', ['file' => $file])!!}
                  @empty
                  @endforelse
                @endif
              </div>
            </div>
            <div class="tab-pane" id="new-upload">
              <form action="{{ route('file-upload') }}" enctype="multipart/form-data" class="dropzone"
                    id="my-dropzone" >
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Attach</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="create-photo-album" tabindex="-1" role="dialog" aria-labelledby="create-photo-album" style="display: none;" aria-hidden="true">
    <div class="modal-dialog window-popup create-photo-album" role="document" style="">
      <div class="modal-content" style="">
        <a href="http://alche.wedidit.com.hk/Seeker-CreateContest.html#" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
        </a>

        <div class="modal-header">
          <h6 class="title">Create Photo Album</h6>
        </div>

        <div class="modal-body create-friend-group create-friend-group-1 fav-page-popup full-width" style="">

          <form class="form-group label-floating">
            <label class="control-label">Album Name</label>
            <input class="form-control" placeholder="" type="text" value="Rock Garden Festival - Day 4">

            <span class="material-input"></span></form>


          <div class="form-group label-floating is-empty" style="border-radius: 0px">
            <label class="control-label">Write a little description about the page</label>
            <textarea class="form-control" placeholder=""></textarea>
            <span class="material-input"></span></div>

          <form class="form-group label-floating is-select is-empty">



            <div class="btn-group bootstrap-select show-tick form-control style-2 create-friend-group-add-friends"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="Nothing selected"><span class="filter-option pull-left">Nothing selected</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off" role="textbox" aria-label="Search"></div><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
                        <div class="author-thumb">
                          <img src="./Create Project_update_2_files/Sales-&amp;-Marketing.png" style="border-radius: 0px;max-width: 45px;" alt="author">
                        </div>
                        <div class="h6 author-title">Sales &amp; Marketing</div>
                      </div><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
                        <div class="author-thumb">
                          <img src="./Create Project_update_2_files/Sourcing-&amp;-Manufacturing.png" style="border-radius: 0px;max-width: 45px;" alt="author">
                        </div>
                        <div class="h6 author-title">Sourcing &amp; Manufacturing</div>
                      </div><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
                        <div class="author-thumb">
                          <img src="./Create Project_update_2_files/Translation-&amp;-Languages.png" style="border-radius: 0px;max-width: 45px;" alt="author">
                        </div>
                        <div class="h6 author-title">Translation &amp; Languages</div>
                      </div><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
                        <div class="author-thumb">
                          <img src="./Create Project_update_2_files/Websites,-IT-&amp;-Software.png" style="border-radius: 0px;max-width: 45px;" alt="author">
                        </div>
                        <div class="h6 author-title">Websites, IT &amp; Software</div>
                      </div><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><div class="inline-items">
                        <div class="author-thumb">
                          <img src="./Create Project_update_2_files/Writing-&amp;-Content.png" style="border-radius: 0px;max-width: 45px;" alt="author">
                        </div>
                        <div class="h6 author-title">Writing &amp; Content</div>
                      </div><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker form-control style-2 show-tick create-friend-group-add-friends" multiple="" data-max-options="4" data-live-search="true" style="max-height: 750px" tabindex="-98">

                <option title="Sales &amp; Marketing" data-content="&lt;div class=&quot;inline-items&quot;&gt;
												&lt;div class=&quot;author-thumb&quot;&gt;
													&lt;img src=&quot;img/tags/Sales-&amp;-Marketing.png&quot; style=&quot;border-radius: 0px;max-width: 45px;&quot; alt=&quot;author&quot;&gt;
												&lt;/div&gt;
												&lt;div class=&quot;h6 author-title&quot;&gt;Sales &amp; Marketing&lt;/div&gt;
											&lt;/div&gt;">Sales &amp; Marketing
                </option>

                <option title="Sourcing &amp; Manufacturing" data-content="&lt;div class=&quot;inline-items&quot;&gt;
												&lt;div class=&quot;author-thumb&quot;&gt;
													&lt;img src=&quot;img/tags/Sourcing-&amp;-Manufacturing.png&quot; style=&quot;border-radius: 0px;max-width: 45px;&quot; alt=&quot;author&quot;&gt;
												&lt;/div&gt;
												&lt;div class=&quot;h6 author-title&quot;&gt;Sourcing &amp; Manufacturing&lt;/div&gt;
											&lt;/div&gt;">Sourcing &amp; Manufacturing
                </option>

                <option title="Translation &amp; Languages" data-content="&lt;div class=&quot;inline-items&quot;&gt;
												&lt;div class=&quot;author-thumb&quot;&gt;
													&lt;img src=&quot;img/tags/Translation-&amp;-Languages.png&quot; style=&quot;border-radius: 0px;max-width: 45px;&quot; alt=&quot;author&quot;&gt;
												&lt;/div&gt;
												&lt;div class=&quot;h6 author-title&quot;&gt;Translation &amp; Languages&lt;/div&gt;
											&lt;/div&gt;">Translation &amp; Languages
                </option>

                <option title="Websites, IT &amp; Software" data-content="&lt;div class=&quot;inline-items&quot;&gt;
												&lt;div class=&quot;author-thumb&quot;&gt;
													&lt;img src=&quot;img/tags/Websites,-IT-&amp;-Software.png&quot; style=&quot;border-radius: 0px;max-width: 45px;&quot; alt=&quot;author&quot;&gt;
												&lt;/div&gt;
												&lt;div class=&quot;h6 author-title&quot;&gt;Websites, IT &amp; Software&lt;/div&gt;
											&lt;/div&gt;">Websites, IT &amp; Software
                </option>

                <option title="Writing &amp; Content" data-content="&lt;div class=&quot;inline-items&quot;&gt;
												&lt;div class=&quot;author-thumb&quot;&gt;
													&lt;img src=&quot;img/tags/Writing-&amp;-Content.png&quot; style=&quot;border-radius: 0px;max-width: 45px;&quot; alt=&quot;author&quot;&gt;
												&lt;/div&gt;
												&lt;div class=&quot;h6 author-title&quot;&gt;Writing &amp; Content&lt;/div&gt;
											&lt;/div&gt;">Writing &amp; Content
                </option>


              </select></div>
            <span class="material-input"></span><span class="material-input"></span></form>

          <div class="photo-album-wrapper" style="">
            <div class="photo-album-item-wrap col-3-width" style="">
              <div class="photo-album-item create-album" data-mh="album-item" style="">
                <div class="content">
                  <a href="http://alche.wedidit.com.hk/Seeker-CreateContest.html#" data-toggle="modal" data-target="#update-header-photo" class="btn btn-control bg-primary">
                    <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                  </a>

                  <a href="http://alche.wedidit.com.hk/Seeker-CreateContest.html#" class="title h5">Add More Photos...</a>
                </div>
              </div>
            </div>

            <div class="photo-album-item-wrap col-3-width" style="">
              <div class="photo-album-item" data-mh="album-item" style="">
                <div class="form-group is-empty">
                  <img src="./Create Project_update_2_files/photo-album6.jpg" alt="photo">
                  <textarea class="form-control" placeholder="Write something about this photo..."></textarea>
                  <span class="material-input"></span></div>

                <form class="form-group label-floating is-select">


                  <div class="checkbox" style="padding: 15px 0 0 15px">
                    <label>
                      <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                      Make Featured (0/9)
                    </label>
                  </div>
                </form>
              </div>
            </div>

            <div class="photo-album-item-wrap col-3-width" style="">
              <div class="photo-album-item" data-mh="album-item" style="">
                <div class="form-group is-empty">
                  <img src="./Create Project_update_2_files/photo-album6.jpg" alt="photo">
                  <textarea class="form-control" placeholder="Write something about this photo..."></textarea>
                  <span class="material-input"></span></div>

                <form class="form-group label-floating is-select">


                  <div class="checkbox" style="padding: 15px 0 0 15px">
                    <label>
                      <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                      Make Featured (0/9)
                    </label>
                  </div>
                </form>
              </div>
            </div>

            <div class="photo-album-item-wrap col-3-width" style="">
              <div class="photo-album-item" data-mh="album-item" style="">
                <div class="form-group is-empty">
                  <img src="./Create Project_update_2_files/photo-album6.jpg" alt="photo">
                  <textarea class="form-control" placeholder="Write something about this photo..."></textarea>
                  <span class="material-input"></span></div>

                <form class="form-group label-floating is-select">


                  <div class="checkbox" style="padding: 15px 0 0 15px">
                    <label>
                      <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                      Make Featured (0/9)
                    </label>
                  </div>
                </form>
              </div>
            </div>

            <div class="photo-album-item-wrap col-3-width" style="">
              <div class="photo-album-item" data-mh="album-item" style="">
                <div class="form-group is-empty">
                  <img src="./Create Project_update_2_files/photo-album6.jpg" alt="photo">
                  <textarea class="form-control" placeholder="Write something about this photo..."></textarea>
                  <span class="material-input"></span></div>

                <form class="form-group label-floating is-select">


                  <div class="checkbox" style="padding: 15px 0 0 15px">
                    <label>
                      <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                      Make Featured (0/9)
                    </label>
                  </div>
                </form>
              </div>
            </div>

            <div class="photo-album-item-wrap col-3-width" style="">
              <div class="photo-album-item" data-mh="album-item" style="">
                <div class="form-group is-empty">
                  <img src="./Create Project_update_2_files/photo-album6.jpg" alt="photo">
                  <textarea class="form-control" placeholder="Write something about this photo..."></textarea>
                  <span class="material-input"></span></div>

                <form class="form-group label-floating is-select">


                  <div class="checkbox" style="padding: 15px 0 0 15px">
                    <label>
                      <input type="checkbox" name="optionsCheckboxes"><span class="checkbox-material"><span class="check"></span></span>
                      Make Featured (0/9)
                    </label>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <a href="" class="btn btn-secondary btn-lg btn--half-width">Discard Everything</a>
          <a href="" class="btn btn-primary btn-lg btn--half-width">Post Album</a>

        </div>
      </div>
    </div>
  </div>


@endsection
@endif

@section('styles')
  <link rel="stylesheet"
        href="{{asset('public/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/parsleyjs/css/parsley.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/summernote/dist/summernote.css')}}"/>
  <link rel="stylesheet"
        href="{{asset('public/admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/multi-select/css/multi-select.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/boss/css/project.css')}}">

  <link rel="stylesheet" href="{{asset('public/css/newjob.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">

@endsection
@section('scripts')
  <script src="{{asset('public/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
  <script src="{{asset('public/assets/boss/libs/jquery.quicksearch.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/summernote/dist/summernote.js')}}"></script>
  <script src="{{asset('public/assets/boss/js/boss.js')}}"></script>
  {{-- <script src="{{asset('public/assets/boss/js/project.js')}}"></script> --}}

  <script src="{{asset('public/frontend/js/form_step.js')}}"></script>
  <script src="{{asset('public/frontend/js/newjob.js')}}"></script>
  <script src="{{asset('public/frontend/js/newcontest.js')}}"></script>
  <script type="text/javascript">

    $(document).ready(function () {
      //#endregion file select
      //#region modal handle closing
      let gen_file_selected = function () {
        $(".file-attached").html('');
        var _files = $("input[name=file_attached]").val();
        JSON.parse(_files).forEach(function (e) {
          var text = $(`.image-contain a[data-id=${e}]`).find('.file-name p').text();
          $(".file-attached").append(`
                  <div class="alert alert-success alert-dismissible" role="alert" data-file-name="${text}"><i class="fas fa-file"></i> ${text}</div>
                  `);
        })
      }
      $("#largeModal").on("hidden.bs.modal", gen_file_selected);

      let image_click_event = function () {
        var data = [];
        $(this).parent().toggleClass("highlight-select");
        $(".image-contain.highlight-select").each(function () {
          data.push($(this).find("a").attr("data-id"));
        });
        $("input[name=file_attached]").val(JSON.stringify(data));
      }

      let file_click_event_init = function () {
        $(".file-select").on("click", image_click_event);
      }
      file_click_event_init();
      //#region dropzone
    });
    $(".project-deadline").datepicker({
      minDate:'-0d',
      format:' mm/dd/yyyy',
      startDate:'0d'
    });

    $(".contest-time-line").datepicker({
      minDate:'-0d',
      format:' mm/dd/yyyy',
      startDate:'0d'
    });

    $('#time_period').datepicker({
      startDate: "0d",
      inputs: $('.actual_range'),
      todayHighlight:true
    });

    $(document).on('input, change', 'input[name=name_contest]', function(){
      var title = $(this).val();
      $('.content-job').find('span.name').html(title);
    });

    $(document).on('change', 'textarea[name=rules]', function(){
      var descrip = $(this).val();
      $('.content-job').find('.detail_description').html(descrip);
    });


    //time start and time end
    $('input.actual_range').on('change',function(){
      $('.bid_start').html('');
      $('.bid_end').html('');
      $('#startbid').each(function(){
        var time_start = $(this).val();
        console.log(time_start);
        $('.bid_start').html(time_start);
        //console.log(time_start);
      });
      $('#endbid').each(function(){
        var time_end = $(this).val();
        $('.bid_end').html(time_end);
        //console.log(time_end);
      });
    });
    $('.contest_budget').html('');
    $('input[name=total_prize]').on('change',function(){
      var price_budget = $(this).val();
      price_budget = "$"+price_budget;
      $('.contest_budget').html(price_budget);
      //console.log(price_budget);
    });
  </script>
  <script>
    // getElementById
    function $id(id) {
      return document.getElementById(id);
    }

    //
    // output information
    function Output(msg) {
      var m = $id("messages");
      m.innerHTML = msg + m.innerHTML;
    }

    // call initialization file
    if (window.File && window.FileList && window.FileReader) {
      Init();
    }

    //
    // initialize
    function Init() {

      var fileselect = $id("fileselect"),
        filedrag = $id("filedrag")

      // file select
      fileselect.addEventListener("change", FileSelectHandler, false);

      // is XHR2 available?
      var xhr = new XMLHttpRequest();
      if (xhr.upload) {

        // file drop
        filedrag.addEventListener("dragover", FileDragHover, false);
        filedrag.addEventListener("dragleave", FileDragHover, false);
        filedrag.addEventListener("drop", FileSelectHandler, false);

      }

    }
    // file drag hover
    function FileDragHover(e) {
      e.stopPropagation();
      e.preventDefault();

    }

    // file selection
    function FileSelectHandler(e) {

      // cancel event and hover styling
      FileDragHover(e);

      // fetch FileList object
      var files = e.target.files || e.dataTransfer.files;
      var data = new FormData();
      for (var i = 0, files; i < files.length; i++) {
        data.append("file_attached[]", files[i]);
      }
      var ui_block = $('.hp_previewfile').find('.hienthi-drag');

      //upload file by ajax
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type:'POST',
        url: '{{ route('contest.ajaxPostFile') }}',
        success:function(data){
          console.log(data);
          $('.file-drag-preview').css("display", "none");
          $('.btn-display-none').css("display", "block");
          if ($('#list_id_file_drag').val() == ''){
            var item = [];
          }else {
            var item = JSON.parse("[" + $('#list_id_file_drag').val() + "]");
          }
          for (var i = 0, f; f = files[i]; i++) {
            item.push(data.idfile[i]);
            ParseFile(f, data.idfile[i]);
            ui_block.append("<div class=\"cart_item "+"delete-view-"+data.idfile[i]+ "\" style=\"margin-bottom: 10px;\">\n" +
              "                      <div class=\"ui-block\" data-mh=\"pie-chart\" style=\"padding: 15px;margin: 0px;border: none;\">\n" +
              "                        <div class=\"forum-item\">\n" +
              "                          <img src=\"img/"+data.listFile[i]['extension']+".svg\" alt=\"forum\" width=\"40\">\n" +
              "                          <div class=\"content\">\n" +
              "                            <a href=\"javascript:;\" class=\"h6 title\" style=\"word-break: break-word;\">"+data.listFile[i]['name']+"</a>\n" +
              "                            <div class=\"post__date\">\n" +
              "                              <time class=\"published\" datetime=\"2017-03-24T18:18\">"+data.listFile[i]['extension']+" File</time>\n" +
              "                            </div>\n" +
              "                            <span class=\"notification-icon click-delete-file\" data-filedelete=\""+data.idfile[i]+"\" style=\"margin-top: -35px; float: right; display: block;\">\n" +
              "                            <a href=\"javascript:;\" data-delete_file=\"\" class=\"accept-request request-del\">\n" +
              "                              <span class=\"delete-file\">\n" +
              "                                <img src=\"img/trash.svg\" class=\"olymp-close-icon\" style=\"margin: auto; height: 15px; width: 15px;\">\n" +
              "                                <use xlink:href=\"svg-icons/sprites/icons.svg#olymp-close-icon\"></use>\n" +
              "                              </span>\n" +
              "                              </a>\n" +
              "                          </span>\n" +
              "                          </div>\n" +
              "\n" +
              "\n" +
              "                        </div>\n" +
              "                      </div>\n" +
              "                    </div>");
          }
          $('#list_id_file_drag').val(item);

        }
      });


    }

    function ParseFile(file, id) {

      Output(
        "<div class=\"row file-upload-drag "+"delete-view-"+id+ "\">\n" +
        "                      <div class=\"col col-lg-10 col-md-9 col-sm-10 col-9 no-margin\" style=\"padding-right: 0px\">\n" +
        "                        <div class=\"ui-block\" data-mh=\"pie-chart\" style=\"border-color: #D8DBE6 \">\n" +
        "                          <div class=\"ui-block-content\" style=\" padding: 15px 20px 0px 20px \">\n" +
        "                            <div class=\"skills-item\" style=\"margin-bottom: 21px\">\n" +
        "                              <div class=\"skills-item-info\"><span class=\"skills-item-title\"><span style=\"color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500\">" + file.name +"</span></span> <span class=\"skills-item-count\" style=\"color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500\"><span class=\"count-animate\" data-speed=\"1000\" data-refresh-interval=\"50\" data-to=\"50\" data-from=\"0\"></span><span class=\"units\">100%</span></span></div>\n" +
        "                              <div class=\"skills-item-meter\">\n" +
        "                                <span class=\"skills-item-meter-active skills-animate\" style=\"width: 100%; background-color: rgb(154, 159, 191); opacity: 1;\"></span>\n" +
        "                              </div>\n" +
        "                            </div>\n" +
        "                          </div>\n" +
        "\n" +
        "                        </div>\n" +
        "                      </div>\n" +
        "                      <div class=\"col col-lg-2 col-md-3 col-sm-3 col-3 no-margin\" style=\"\">\n" +
        "                        <div class=\"ui-block\" data-mh=\"pie-chart\" style=\"border-color: #D8DBE6 \">\n" +
        "                          <div class=\"ui-block-content\" style=\" padding: 22px 0px 23px 0px \">\n" +
        "                           <span data-idfile = "+id+" class=\"notification-icon click-delete-file-drag align-center align-middle\" style=\" display: block;\">\n" +
        "                                <a class=\"accept-request request-del\">\n" +
        "                              <img src=\"img/trash.svg\" class=\"olymp-close-icon\" style=\"height: 15px;width: 15px;\"><use xlink:href=\"svg-icons/sprites/icons.svg#olymp-close-icon\"></use>\n" +
        "                              </a>\n" +
        "                            </span>\n" +
        "                          </div>\n" +
        "                        </div>\n" +
        "                      </div>\n" +
        "                    </div>"
      );

    }
  </script>
  <script>
    $(document).on('click', '.abcs', function(){
      $('.abcsd').trigger('click');
    });
  </script>
@endsection
