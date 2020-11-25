@extends('layouts.master')
@section('title')
  {{ isset($project) ? "Edit Project" : "New Project" }}
@endsection
@if(Auth::id())
@section('content')
  <?php $date = now(); ?>
  <div class="container project-page">
    <div class="row">
      <div class="col col-xl-10 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ui-block" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
          <div class="ui-block-title">
            <h3 style="font-size: 20px">Create Project</h3>
          </div>
        </div>
        <?php $project = isset($project) ? $project : null;?>
        <div class="ui-block" style="background-color: transparent;border: none;padding-top: 20px;">
          <div class="ui-block-content" style="padding: 0;">

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
            <?php $action = isset($project) ? route('profile.editproject', $project->id) : route('profile.postjob')?>
            <form class="addnew-form" method="post" action="{!! $action !!}" enctype="multipart/form-data">
              @csrf
              <div class="progress-step">
                <div class="step">
                  <div class="step-progress"></div>
                  <div class="icon-wrapper">
                    <div class="step-text">Project Brief</div>
                  </div>
                </div>
                <div class="step">
                  <div class="step-progress"></div>
                  <div class="icon-wrapper">
                    <div class="step-text">Budget & Milestones</div>
                  </div>
                </div>
                <div class="step">
                  {{-- <div class="step-progress"></div> --}}
                  <div class="icon-wrapper">
                    <div class="step-text"> Approval</div>
                  </div>
                </div>
              </div>

              <div class="form-section">
                <div class="row" style="margin-bottom: 0px;">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
                    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                      <div class="ui-block-title">
                        <h6 style="font-size: 15px">Step 01</h6>
                        <div class="align-right form-navigation">
                          <a class="next btn btn-primary btn-md-2" href="javascript:;">Next Step</a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row" style="margin-top: 0px">
                  <div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
                    <div class="ui-block">
                      <div class="ui-block-title">
                        <h6 style="font-size: 15px">Set Preferences</h6>
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
                              <div class="w-select" style="padding: 0px;">
                                <h6>+ Select Category</h6>
                                <span>Select skill categories you think will be involved in your project.</span>
                                <div class="formcat" style="margin-top: 10px;">
                                  <select name="cats[]" class="selectize form-control select_cats" multiple>
                                    <option value="">Enter project categories...</option>
                                    @foreach($cats as $cate)
                                      <option @if(old("cats") && in_array((string)$cate->id, old("cats"))){!! 'selected' !!}@endif value="{{ $cate->id }}" {{ (old("cats") == $cate->id ? "selected":"") }}>{{ $cate->name }}</option>
                                    @endforeach
                                  </select>
                                  <button class="clear_selectize btn btn-blue" >Clear Categories</button>
                                </div>
                              </div>
                            </div>
                            <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">
                              <br>
                              <div class="w-select col col-lg-12 col-12 no-padding" style="padding: 0px;">
                                <h6>+ Add Skills</h6>
                                <span>Select skills you think will be involved in your project. Alchemists can add more specific skills to their bid.</span>
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
                      <div id="accordion" role="tablist" class="countbox" aria-multiselectable="true">
                        <div class="card seachcriteria">
                          <div class="card-header" role="tab" id="headingOne-4" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
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
                          </div>
                          <div id="collapseOne-8" class="collapse" role="tabpanel" aria-labelledby="headingOne-8">

                            <ul class="your-profile-menu hungpro" style="padding-bottom: 0px">
                              <h6>Select Alchemist Level</h6>
                              <span style="float: left;padding-bottom: 10px;">Select the level of Alchemist to take on your project. </span>
                              @foreach($list_title as $i=>$title)
                                <?php $disabled = ($i > 1) ? 'disabled' : ''; ?>
                                <?php $line = ($i > 1) ? 'text-decoration: line-through;' : ''; ?>
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

                      <div id="accordion" role="tablist" class="countbox" aria-multiselectable="true">
                        <div class="card seachcriteria">
                          <div class="card-header" role="tab" id="headingOne-10" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                            <h6 class="mb-0">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-10" aria-expanded="true" aria-controls="collapseOne-10">
                                <img class="hpimg1" src="svg-icons/Create Job/incomplete.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
                                <img class="hpimg2" src="svg-icons/Create Job/checked.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
                                <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Language </span>
                                <svg class="olymp-dropdown-arrow-icon">
                                  <use xlink:href="#olymp-dropdown-arrow-icon"></use>
                                </svg>
                              </a>
                            </h6>
                          </div>
                          <div id="collapseOne-10" class="collapse " role="tabpanel" aria-labelledby="headingOne">
                            <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-top-width: 0px;border-bottom-color: #E6ECF5">
                              <div class="w-select col col-lg-12 col-12 no-padding hungpro" style="padding: 0;">
                                <h6>+ Add Language</h6>
                                <span>What language preference do need for your project & Alchemist?</span>
                                <select class="selectize form-control" name="language[]" multiple>
                                  <option value="">Add Language...</option>
                                  @if($list_language)
                                    @foreach($list_language as $language)
                                      <option value="{{$language->id}}"  @if(old("language") && in_array((string)$language->id, old("language"))){!! 'selected' !!}@endif>
                                        {{$language->language_name}}</option>
                                    @endforeach
                                  @endif
                                </select>
                                <button class="clear_selectize btn btn-blue" >Clear Language</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-8 order-md-2 col-sm-12 col-12 no-margin">
                    <div class="row" style="margin-bottom: 10px">
                      <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
                        <div class="ui-block" data-mh="pie-chart" style=" padding: 0px 0px 10px 0px ">
                          <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">
                            <div class="crumina-module crumina-heading with-title-decoration ">
                              <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Project Description</h6>
                            </div>
                            <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                <hp>Project Title</hp>
                                <input class="form-control" name="name" placeholder="" type="text" value="{{ old('name', isset($project->name) ? $project->name : '' ) }}"  required data-parsley-minlength="1">
                              </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                <hp>Project Description:</hp>
                                <textarea class="form-control" name="detail_description" required>{{ old('detail_description', isset($project->detail_description) ? $project->detail_description : '' ) }}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
                          <div class="ui-block-title form-group">
                            <input style="width: 100%;" id="hp_file" class="hp_file" type="file" name="file_attached[]" value="" multiple="">
                            <button class="btn btn-secondary btn-sm align-right reset_file" type="button" style="background-image: linear-gradient(#E7E7E7, #D4D4D4);border: #B9B9B9 solid 1px;color: #6B6F83;font-weight: 500; margin-top: 10px;">Clear</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-section">
                <div class="row" style="margin-bottom: 0px;">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
                    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                      <div class="ui-block-title">
                        <h6 style="font-size: 15px">Step 02</h6>
                        <div class="align-right form-navigation">
                          <a class="previous btn btn-md-2 btn-border-think custom-color c-grey" href="javascript:;">Previous</a>
                          <a class="next btn btn-primary btn-md-2" href="javascript:;">Next Step</a>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="row" style="margin-top: 0px">
                  {{-- <div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-4 order-md-1 col-sm-12 col-12 no-margin">
                     <div class="ui-block">
                        <div class="ui-block-title">
                           <h6 style="font-size: 15px">Budget & Milestones</h6>
                        </div>
                        <div class="ui-block-content">
                           <div class="row">
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12 step2-reponsive" style="margin-bottom: 5px">
                                 <hp>Price Estimate ($USD) :</hp>
                                 <div class="form-group quantity bugget-input with-icon">
                                   <i class="fas fa-dollar-sign c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                                    <a href="javascript:;" class="quantity-minus">&#8744;</a>
                                   <input onkeyup="this.value=FormatNumber(this.value);" class="replace_budget form-control none_arrow" type="text" name="budget" value="{{ old('budget', isset($project->budget) ? $project->budget : '' ) }}" required>
                                    <a href="javascript:;" class="quantity-plus">&#8743;</a>
                                 </div>
                                 <p></p>
                                 <hp>Preffered Deadline</hp>
                                 <div class="form-group deadline-time" >
                                     <input class="project-deadline form-control" type="text" name="deadline" value="{{ old('deadline', $project !== null ? $project->deadline() : '' ) }}" data-date-autoclose="true" class="form-control" required>
                                     <input type="hidden" name="daynow" value="{{date('m/d/Y')}}">
                                 </div>
                                 <br>


                                 <hp>Listing Type</hp>
                                 <div class="list_type_bid">
                                   <ul class="your-profile-menu" style="padding-bottom: 0px">
                                     @foreach($list_type as $type)
                                     <li>
                                       <div class="checkbox list_type">
                                         <label>
                                           <input type="checkbox" name="list_type[]" value="{{$type->id}}" data-week1="5" data-week2="7.5" data-week3="10">
                                           <span class="listname" style="font-size: 13px;">{{$type->type_name}}</span>

                                         </label>
                                       </div>
                                     </li>
                                     @endforeach
                                   </ul>
                                 </div>
                                 <h6>Bid Duration / Cost</h6>
                                 <p><img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: middle;margin: 0px 2px"> {{$user->total_credit}} CT - Available Credit</p>
                                 <p style="font-size: 12px;">Lorem lipsum</p>
                                 <br>
                                 <div class="hp_week col col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
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
                                       <input class="threeweek" type="radio" name="credit" data-week="4" value="">
                                       <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: middle;margin: 0px 2px"> <span class="threeweek" style="position: relative;left: 0;display: inline;">7.5</span> CT - 4 Week
                                     </label>
                                   </div>
                                   <input type="hidden" name="week" value="">
                                 </div>
                                 <br>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div> --}}
                  <div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-4 order-md-1 col-sm-12 col-12 no-margin">
                    <div class="ui-block">
                      <div class="ui-block-title">
                        <h6 style="font-size: 15px">Budget & Milestones</h6>
                      </div>
                      <div class="ui-block-content">
                        <div class="row">
                          <div class="col col-lg-12 col-md-12 col-sm-12 col-12 step2-reponsive" style="margin-bottom: 5px">
                            <hp>Price Estimate ($USD) :</hp>
                            <div class="form-group quantity bugget-input with-icon">
                              <i class="fas fa-dollar-sign c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                              <a href="javascript:;" class="quantity-minus">&#8744;</a>
                              <input onkeyup="this.value=FormatNumber(this.value);" class="replace_budget form-control none_arrow" type="text" name="budget" value="{{ old('budget', isset($project->budget) ? $project->budget : '' ) }}" required>
                              <a href="javascript:;" class="quantity-plus">&#8743;</a>
                            </div>
                            <p></p>
                            <hp>Preffered Deadline</hp>
                            <div class="form-group deadline-time" >
                              <input style="padding: 10px 8px;" class="project-deadline form-control" type="text" name="deadline" value="{{ old('deadline', $project !== null ? $project->deadline() : '' ) }}" data-date-autoclose="true" class="form-control" required>
                              <span class="input-group-addon">
                                           <svg class="olymp-month-calendar-icon icon" style="width: 15px">
                                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use>
                                           </svg>
                                        </span>
                              <input type="hidden" name="daynow" value="{{date('m/d/Y')}}">
                            </div>
                            <br>
                            <div class="ui-block-title" style="padding-left: 0px;padding-right: 0px; padding-bottom: 0px;padding-top: 15px; margin-bottom: 15px;border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5" >
                              <br>
                              <div class="w-search list_type" style="width: 100%" >
                                <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding" style="margin-bottom: 10px">
                                  <h6>Listing Type</h6>
                                  <hp>Enhance your project visibility with extra posting filters.</hp>
                                </div>
                                <div class="list_type_bid">
                                  <ul class="your-profile-menu" style="padding-bottom: 0px">
                                    @foreach($list_type as $type)
                                      <li>
                                        <div class="checkbox list_type">
                                          <label>
                                            <input type="checkbox" name="list_type[]" value="{{$type->id}}" data-week1="5" data-week2="7.5" data-week3="10">
                                            <span class="listname" style="font-size: 13px;">{{$type->type_name}} Project</span>

                                          </label>
                                        </div>
                                      </li>
                                    @endforeach
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <h6>Bid Duration / Cost</h6>
                            <label>
                              <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: middle;margin: 0px 2px">
                              {{$user->total_credit}} CT - Available Credit
                            </label>
                            <p style="font-size: 12px;">Select the project posting duration. Make sure to have suffcient credit before posting your project.</p>

                            <div class="hp_week col col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
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
                                  <input class="threeweek" type="radio" name="credit" data-week="4" value="">
                                  <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: middle;margin: 0px 2px"> <span class="threeweek" style="position: relative;left: 0;display: inline;">7.5</span> CT - 4 Week
                                </label>
                              </div>
                              <input type="hidden" name="week" value="">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-8 order-md-2 col-sm-12 col-12 no-margin milestone_group" >

                    <div id="accordion1" class="accordion" role="tablist" aria-multiselectable="true">
                      <div class="photo-album-item create-album wrap_clone_ms"  style="position: relative;padding-top: 100px;padding-bottom: 100px">

                        <div class="content" style="margin-top: 10px">
                          <a href="javascript:;" class="btn btn-control bg-primary clone_ms" data-toggle="modal" data-target="#create-photo-album">
                            <svg class="olymp-plus-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                            </svg>
                          </a>
                          <a href="javascript:;" class="title h5 clone_ms">Add Milestones *Optional</a>
                          <span class="sub-title">This is for advanced project estimates. If you are Seeker beginner you can skip this step.</span>
                        </div>
                      </div>

                      <div class="row mile_property d-none" style="margin-bottom: 10px;">
                        <div class="col col-lg-2 col-md-3 col-sm-2 col-2 no-margin">
                          <div class="checkbox" align="center" style=" background-color: #FFFFFF;height: 60px;border-radius: 4px;border: solid 1px #D8DBE6;padding: 20px 4px 0px 4px;vertical-align: middle;margin-bottom: 0px" >
                            <a class="delpanel" href="javascript:;">
                              <i class="fas fa-trash-alt" style="font-size: 20px"></i>
                            </a>
                          </div>
                        </div>
                        <div class="col col-lg-10 col-md-9 col-sm-9 col-10 no-margin" style="padding-left: 0px">

                          <div class="card" style="background-color: #ECF1F5">
                            <div class="card-header" role="tab" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;margin-top: 0px; padding-top: 20px; padding-bottom: 20px; ">
                              <h6 class="mb-0">
                                <a class="collapsepanel collapsed" data-toggle="collapse" data-parent="#accordion1" href="#milestone-99" aria-expanded="true">
                                  <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px">
                                  <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">M0<span class="ms_counter">1</span> | <span class="value_percent">20</span>% | $<span class="info_percent">0.00</span> | <span class="value_day">0</span> Days</span>
                                  <svg class="olymp-dropdown-arrow-icon c-white">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                  </svg>
                                </a>
                              </h6>
                            </div>
                            <div id="milestone-99" class="collapse props" data-parent="#accordion1" role="tabpanel" style="margin-left: -1px">
                              <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 8px 0px; padding: 0px 0px 10px 0px ">
                                <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">
                                  <div class="crumina-module crumina-heading with-title-decoration " >
                                    <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Setup Milestone 0<span class="ms_counter">1</span></h6>
                                  </div>
                                  <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                      <hp>Task Title (Alchemist Only)</hp>
                                      <div class="form-group" style="font-size: 9px; ">
                                        <input type="text" name="kt_mile[99][title]" class="form-control data-change-handle ms_title" required>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-bottom: 10px">
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                      <hp>Milestone Description:</hp>
                                      <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                                        <label class="control-label" style="font-size: 11px;">Describe what you expect for this milestone....</label>
                                        <textarea class="form-control data-change-handle ms_description" name="kt_mile[99][description]" rows="3" cols="30" required></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row" style="margin-bottom: 10px">
                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 hp_work_day">
                                      <hp>Days <span class="value_day">0</span></hp>
                                      <div class="form-group label-floating quantity with-icon">
                                        <i class="far fa-calendar-check c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                                        <label class="control-label">Days</label>
                                        <input type="number" min="1" max="365" name="kt_mile[99][workday]" class="form-control data-change-handle ms_workday" value="" required>
                                      </div>
                                    </div>
                                    <div class="col col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12">
                                      <hp><span class="value_percent">20</span>% / 100% = $<span class="units info_percent" style="color: #90CB1E">0.00</span></hp>
                                      <div class="form-group is-select">
                                        <select class="selectpicker1 form-control1 percent_payment ms_percent_payment" name="kt_mile[99][percent_payment]" required>
                                          <option value="10">10%</option>
                                          <option value="20">20%</option>
                                          <option value="30">30%</option>
                                          <option value="40">40%</option>
                                          <option value="50">50%</option>
                                          <option value="60">60%</option>
                                          <option value="70">70%</option>
                                          <option value="80">80%</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-section preview-job">
                <div class="row" style="margin-bottom: 0px;">
                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
                    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                      <div class="ui-block-title">
                        <h6 style="font-size: 15px">Step 03</h6>
                        <div class="align-right form-navigation">
                          <a class="previous btn btn-md-2 btn-border-think custom-color c-grey" href="javascript:;">Previous</a>
                          <button type="submit" class="btn btn-green btn-md-2 btn-success create-success" >Approve</button>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row" style="margin-top: 0px">
                  <div class="col col-xl-5 order-xl-1 col-lg-5 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
                    <div class="ui-block info-job" style="margin-bottom: 0;">
                      <div class="ui-block-title">
                        <h6 class="title">Project Breakdown</h6>
                      </div>
                      <div class="ui-block-content">
                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Bidding Starts</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units bid_start" >10/04/2019</span></span></div>
                        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Bidding Ends</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units bid_end" >10/20/2019</span></span></div>
                        {{-- <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Prefered Day</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units deadline" >10/05/2019</span></span></div> --}}
                        <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Project Total</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">$<span class="units budget">2,400.68</span></span></div>
                        <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Total Days</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units totalday">240.68</span> Days </span></div>
                        <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Crafting Cost</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units craftingcost" ></span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                      </div>
                    </div>
                    <div class="ui-block" style="margin-top: 15px;">
                      <!-- Your Profile  -->
                      <div class="your-profile list_ms">
                        <div class="post-thumb" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                          <a href="javascript:;" class="post-category  full-width align-center" style="background-image: linear-gradient(#90CB1E, #4EB901); padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 14px;font-weight: 500;color: #fff">$<span class="budget">2,680</span> | 5 Days</a>
                        </div>
                      </div>
                      <!-- ... end Your Profile  -->
                    </div>
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="hp_previewfile previewfile hp_hidden">
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
                              <table class="shop_table cart">
                                <tbody>
                                <tr class="cart_item d-none">
                                  <td class="product-thumbnail" style="padding-left: 25px">
                                    <div class="forum-item">
                                      <img class="img_prefile" src="img/zip.svg" alt="forum" width="40">
                                      <div class="content">
                                        <a href="javascript:;" class="h6 title" style="word-break: break-word;"></a>
                                        <div class="post__date">
                                          <time class="published" datetime="2017-03-24T18:18"></time>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                </tbody>
                              </table>
                              <div>
                                <table class="shop_table cart">
                                  <tbody class="hienthi">

                                  </tbody>
                                </table>
                              </div>
                              <!-- ... end Shop Table Cart -->
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
                            <a href="javascript:;" class="post-category bg-smoke full-width align-center" style="padding-top: 10px;padding-bottom: 10px; margin: 0px;border-radius: 0px; font-size: 14px;color: #858AA6;background-image: linear-gradient(#FFFFFF, #FAFBFD);border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">$<span class="budget">2,500</span> USD | <span class="totalday">3</span> Days</a>
                          </div>

                          <div class="post-thumb featured hp_hidden" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                            <img src="img/featured-bg.svg" alt="friend">
                          </div>
                          <div class="post-thumb urgent hp_hidden" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                            <a href="javascript:;" class="post-category  full-width align-center" style="background-image: linear-gradient(#FFCC7F, #FFBA50); padding-top: 5px;padding-bottom: 5px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px; font-size: 11px;font-weight: 500;color: #fff">Urgent project</a>
                          </div>
                          <article class="hentry post video">
                            @include('template_part.part-infouser', ['user'=>Auth::user()])
                            <div class="post__author author vcard  inline-items" >
                              <div class="author-date">
                                <a class="h6 post__author-name fn" href="javascript:;" style="word-wrap: break-word; padding-right: 8px; font-weight: 500; margin-bottom: 0px; line-height: 20px"><span class="name"></span></a>
                              </div>
                            </div>
                            <div class="detail_description" style="margin-top: 0px;margin-bottom: 20px;"></div>
                            <div class="post__date" style="margin-bottom: 25px; margin-top: -5px">
                              <time data-toggle="tooltip" data-placement="top" title="DATE POSTED" class="published" datetime="2004-07-24T18:18">

                                <img src="svg-icons/menu/post-it.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 9px;margin-left: 1px;">{{date('m/d/Y')}}
                              </time>
                              <a data-toggle="tooltip" data-placement="top" title="DAYS LEFT TO BID" href="javascript:;" class="post-add-icon inline-items">
                                <img src="svg-icons/JobCard/timer.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: 10px">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                <span class="bid_week" style="font-weight: 400;color: #888DA8">08</span> <span style="font-weight: 400;color: #888DA8;">Bid Days Left </span>
                              </a>
                              <div class=" inline-items" style="margin-top: 5px" >
                                <a data-toggle="tooltip" data-placement="top" title="FIAT PRICE" href="javascript:;" class="post-add-icon inline-items">
                                  <img src="svg-icons/Currency/039-dollar.svg" class="olymp-heart-icon" style="border-radius: 0%">
                                  <span style="font-weight: 400;color: #888DA8">$<span class="budget">2,300</span></span> <span style="font-weight: 400;color: #888DA8">USD</span>
                                </a>
                                <a data-toggle="tooltip" data-placement="top" title="JOB DELIVERY ESTIMATE" href="javascript:;" class="post-add-icon inline-items" style="margin-left: 10px">
                                  <img src="svg-icons/JobCard/day-and-night.svg" class="olymp-heart-icon" style="border-radius: 0%">
                                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                  <span class="total-project-day" style="font-weight: 400;color: #888DA8">3</span>
                                  <span style="font-weight: 400;color: #888DA8">Day Project</span>
                                </a>
                              </div>
                            </div>
                            <div class=" col col-lg-12 col-md-12 col-sm-12 col-12 no-padding" style="padding-bottom: 0px;margin-top: -10px;margin-bottom: 10px;">

                              <h3 style="color: #525488; padding-bottom: 15px;padding-left: 0px;font-size: 13px;font-weight: 500;width: 100%;margin-bottom: 0;">Category / Skills</h3>

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
                  </div>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="header-spacer"></div>
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
@endsection
@endif

@section('styles')
  <link rel="stylesheet"
        href="{{asset('public/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">

  <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/summernote/dist/summernote.css')}}"/>
  <link rel="stylesheet"
        href="{{asset('public/admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/admin/assets/vendor/multi-select/css/multi-select.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/boss/css/project.css')}}">

  <link rel="stylesheet" href="{{asset('public/css/newjob.css')}}">

@endsection
@section('scripts')
  <script src="{{asset('public/admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>

  <script src="{{asset('public/admin/assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
  <script src="{{asset('public/assets/boss/libs/jquery.quicksearch.js')}}"></script>
  <script src="{{asset('public/admin/assets/vendor/summernote/dist/summernote.js')}}"></script>
  <script src="{{asset('public/assets/boss/js/boss.js')}}"></script>
  {{-- <script src="{{asset('public/assets/boss/js/project.js')}}"></script> --}}

  <script src="{{asset('public/frontend/js/form_step.js')}}"></script>
  <script src="{{asset('public/frontend/js/newjob.js')}}"></script>
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
      startDate:'0d',
      todayHighlight:true
    });
    $('#time_period').datepicker({
      startDate: "0d",
      inputs: $('.actual_range')
    });



  </script>
@endsection
