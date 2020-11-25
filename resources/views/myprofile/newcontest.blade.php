@extends('layouts.master')
@section('title')
{{ isset($project) ? "Edit Contest" : "New Contest" }}
@endsection
@if(Auth::id())
@section('content')

<div class="container ">
    <div class="col col-xl-10 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ui-block" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
           <div class="ui-block-title">
              <h3 style="font-size: 20px">Create Contest</h3>
           </div>
        </div>
        <?php $project = isset($project) ? $project : null;?>
        <div class="ui-block">
            <div class="ui-block-content">
                <?php $action = isset($project) ? route('profile.editproject', $project->id) : route('profile.postjob')?>
                <form class="addnew-form" method="post" action="{!! $action !!}" enctype="multipart/form-data">
                    @csrf
                    <div class="progress-step">
                      <div class="step">
                        <div class="step-progress"></div>
                        <div class="icon-wrapper">
                          <div class="step-text">Step 01 | Contest Brief</div>
                        </div>
                      </div>
                      <div class="step">
                        <div class="step-progress"></div>
                        <div class="icon-wrapper">
                          <div class="step-text">Step 02 | Budget & References</div>
                        </div>
                      </div>
                      <div class="step">
                        <div class="step-progress"></div>
                        <div class="icon-wrapper">
                          <div class="step-text">Step 03 | Approval</div>
                        </div>
                      </div>
                    </div>

                  <div class="form-section">
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="col col-lg-8 col-md-8 col-sm-8 col-8 no-margin">
                          <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                             <div class="ui-block-title">
                                <h3 style="font-size: 15px">Step 01 - Contest Brief & Category</h3>
                             </div>
                          </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-4 col-4 no-margin form-navigation">
                            <a class="next btn btn-primary pull-right" href="javascript:;" style="padding: 20px 30px;">Procede to  Next Step &gt;</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0px">
                       <div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
                          <div class="ui-block">
                            <div class="ui-block-title">
                                <h3 style="font-size: 15px">Set Preferences</h3>
                            </div>
                               <div id="accordion" role="tablist" aria-multiselectable="true">
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
                                     <div id="collapseOne-7" class="collapse " role="tabpanel" aria-labelledby="headingOne-7">
                                        <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 0px;border-bottom-color: #E6ECF5">
                                           <div class="w-select" style="padding: 0px">
                                                <h6>+ Select Category</h6>                        
                                                <select name="cats[]" class="selectpicker form-control">
                                                    @foreach($cats as $cate)
                                                        <option @if(isset($pj_cats) && in_array($cate->id, $pj_cats)){!! 'selected' !!}@endif value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                    @endforeach
                                                </select>
                                           </div>
                                        </div>
                                        <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">
                                           <br>
                                            <div class="col col-lg-12 col-12 no-padding hungpro">
                                                <h6>+ Add Skills</h6>
                                                <select class="selectize form-control" name="skill[]">
                                                   <option value="">Select skill</option>
                                                    @foreach($skills as $key=>$skill)
                                                      <option value="{{$skill->id}}">{{$skill->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                               <div id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="card seachcriteria lever_preference">
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
                                            
								      		                  @foreach($list_title as $i=>$title)
                                            <?php $disabled = ($i > 1) ? 'disabled' : ''; ?>
                                            <li>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" {{$disabled}} name="user_title[]" value="{{$title->id}}">
                                                        {{$title->name}} LV {{$title->min_level}}-{{$title->max_level}}
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                     </div>
                                  </div>
                               </div>
                               <div id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="card seachcriteria">
                                     <div class="card-header " role="tab" id="headingOne-8" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
                                        <h6 class="mb-0">
                                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-9" aria-expanded="true" aria-controls="collapseOne-9">
                                              <img class="hpimg1" src="svg-icons/Create Job/incomplete.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
                                              <img class="hpimg2" src="svg-icons/Create Job/checked.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
                                              <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Listing Type </span>
                                              <svg class="olymp-dropdown-arrow-icon">
                                                 <use xlink:href="#olymp-dropdown-arrow-icon"></use>
                                              </svg>
                                           </a>
                                        </h6>
                                     </div>
                                     <div id="collapseOne-9" class="collapse" role="tabpanel" aria-labelledby="headingOne-9">
                                        <ul class="hungpro your-profile-menu" style="padding-bottom: 0px">
                                          @foreach($list_type as $type)
                                          <li>
                                            <div class="checkbox">
                                               <label>
                                               <input type="checkbox" name="list_type[]" value="{{$type->id}}">
                                               <span class="listname">{{$type->type_name}}</span>
                                               </label>
                                            </div>
                                          </li>
                                          @endforeach
                                        </ul>
                                     </div>
                                  </div>
                               </div>
                               <div id="accordion" role="tablist" aria-multiselectable="true">
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
                                            <div class="col col-lg-12 col-12 no-padding hungpro">
                                                <h6>+ Add Language</h6>
                                                <select class="selectize form-control ">
                                                   <option value="">Select language</option>
                                                   <option value="2">English</option>
                                                   <option value="3">French</option>
                                                   <option value="4">Chinese</option>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                          </div>
                       </div>
                       <div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-8 order-md-2 col-sm-12 col-12 no-margin">
                          <div class="row" style="margin-bottom: 10px">
                             <div class="col col-lg-12 col-md-12 col-sm-9 col-9 no-margin">
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
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </div>

                  <div class="form-section">
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="col col-lg-8 col-md-8 col-sm-8 col-8 no-margin">
                          <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                             <div class="ui-block-title">
                                <h3 style="font-size: 15px">Step 02 - Budget & Milestones</h3>
                             </div>
                          </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-4 col-4 no-margin form-navigation">
                            <a class="previous btn btn-primary pull-left" href="javascript:;" style="padding: 20px 20px; width: 46%;">Previous</a>
                            <a class="next btn btn-primary pull-right" href="javascript:;" style="padding: 20px 20px; width: 46%;">Next Step</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0px">
                       <div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-4 order-md-1 col-sm-12 col-12 no-margin">
                          <div class="ui-block">
                             <div class="ui-block-title">
                                <h3 style="font-size: 15px">Prize & Dates</h3>
                             </div>
                             <div class="ui-block-content">
                                <div class="row">
                                   <div class="col col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom: 5px">
                                      <hp>Enter Contest Price:</hp>
                                      <div class="form-group  quantity with-icon">
                                         <i class="fas fa-dollar-sign c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                                         <a href="javascript:;" class="quantity-minus">&#8744;</a>
                                        <input class="form-control none_arrow" type="number" name="budget" min="10" max="1000000" value="{{ old('budget', isset($project->budget) ? $project->budget : '' ) }}" required>
                                         <a href="javascript:;" class="quantity-plus">&#8743;</a>
                                      </div>
                                      <br>
                                      <div id="time_period adasdasadsda">
                                        <hp>Entry Begins</hp>
                                        <div class="form-group">
                                          <input class="actual_range" id="startbid" type="text" class="input-sm form-control" name="bid_start" value="{{ old('start_bid', isset($project->start_bid) ? $project->start_bid : '' ) }}" required="">
                                        </div>
                                        <br>
                                        <hp>Entry Ends</hp>
                                        <div class="form-group">
                                          <input class="actual_range" id="endbid" type="text" class="input-sm form-control" name="bid_end" value="{{ old('end_bid', isset($project->end_bid) ? $project->end_bid : '' ) }}" required="">
                                        </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="hp_previewfile col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-8 order-md-2 col-sm-12 col-12 no-margin" >
                          	<div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
	                          <div class="ui-block-title">
	                            <hp>Add Reference Files:</hp>
	                            <div style="position: relative;">
	                            	<label for="hp_file" class="hp_addfile">+ Add Files</label>
	                            	<input id="hp_file" style="visibility:hidden;" class="hp_file" type="file" name="file_attached[]" value="" multiple="">
	                            </div>
	                          </div>
	                        </div>

                            <div class="cart_item d-none" style="margin-bottom: 10px;">
							  	<div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);padding: 30px 20px;margin: 0px;">
							      	<div class="forum-item">
								      	<img src="img/zip.svg" alt="forum" width="40" style="margin-top: -10px">
								      	<div class="content">
								      		<a href="javascript:;" class="h6 title"></a>
								      	</div>
							      	</div>
							  	</div>
					      	</div>
					      	<div class="hienthi"></div>
                       </div>
                    </div>
                  </div>
                  <div class="form-section preview-job">
                    <div class="row" style="margin-bottom: 0px;">
                        <div class="col col-lg-8 col-md-8 col-sm-8 col-8 no-margin">
                          <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);">
                             <div class="ui-block-title">
                                <h3 style="font-size: 15px">Step 03 - Approve Project Details</h3>
                             </div>
                          </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-4 col-4 no-margin form-navigation">
                            <a class="previous btn btn-primary pull-left" href="javascript:;" style="padding: 20px 20px; width: 46%;">Previous</a>
                            <button type="submit" class="btn btn-success pull-right" style="padding: 20px 20px; width: 46%;background-image: linear-gradient(#BAEB07, #73CB00);">Approve</button>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0px">
                       <div class="col col-xl-5 order-xl-1 col-lg-5 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
                          <div class="ui-block info-job">
                             <div class="ui-block-title">
                                <h6 class="title">Contest Information</h6>
                             </div>
                             <div class="ui-block-content">
                                <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Entry Starts</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units bid_start" >10/04/2019</span></span></div>
                                <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Entry Ends</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units bid_end" >10/20/2019</span></span></div>
                                
                                <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Contest Total</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">$<span class="units budget">2,400.68</span></span></div>
                                <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Token Value</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">240.68</span> ALC <img src="svg-icons/JobCard/AlchemToken.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                                <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Crafting Cost</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >400</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                             </div>
                          </div>
                          <div class="ui-block">
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
                                         <div>
                                           <div class="shop_table cart">
                                             <div class="hienthi">
                                              
                                             </div>
                                           </div>
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
                                      <a href="javascript:;" class="post-category bg-smoke full-width align-center" style="padding-top: 10px;padding-bottom: 10px; margin: 0px;border-radius: 0px; font-size: 14px;color: #858AA6;background-image: linear-gradient(#FFFFFF, #FAFBFD);border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">$<span class="budget">2,500</span> USD | 3 Days</a>
                                   </div>
                                   <div class="post-thumb urgent hp_hidden" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                                      <a href="javascript:;" class="post-category  full-width align-center" style="background-image: linear-gradient(#FFCC7F, #FFBA50); padding-top: 5px;padding-bottom: 5px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px; font-size: 11px;font-weight: 500;color: #fff">Urgent project</a>
                                   </div>
                                   <div class="post-thumb featured hp_hidden" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                                      <a href="javascript:;" class="post-category  full-width align-center" style="background-image: linear-gradient(#C492FF, #B06FFC); padding-top: 5px;padding-bottom: 5px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px; font-size: 11px;font-weight: 500;color: #fff">Private Bidding</a>
                                   </div>
                                   <div class="post-thumb nda-require hp_hidden" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                                      <a href="javascript:;" class="post-category  full-width align-center" style="background-image: linear-gradient(#8BCCE7, #27AAE1); padding-top: 5px;padding-bottom: 5px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px; font-size: 11px;font-weight: 500;color: #fff">NDA Required</a>
                                   </div>
                                   <article class="hentry post video">
                                      @include('template_part.part-infouser', ['user'=>Auth::user()])
                                      <div class="post__author author vcard   inline-items" >
                                         <div class="author-date">
                                            <a class="h6 post__author-name fn" href="javascript:;" style="word-wrap: break-word; padding-right: 8px; font-weight: 500; margin-bottom: 0px; line-height: 20px"><span class="name"></span></a>  
                                         </div>
                                      </div>
                                      <div class="detail_description" style="margin-top: 0px"></div>
                                      <div class="post__date" style="margin-bottom: 25px; margin-top: -5px">
                                         <time data-toggle="tooltip" data-placement="top" title="DATE POSTED" class="published" datetime="2004-07-24T18:18">
                                         <img src="svg-icons/menu/post-it.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 9px;margin-left: 1px;">Thu, 18/04/2019
                                         </time>
                                         <a data-toggle="tooltip" data-placement="top" title="DAYS LEFT TO BID" href="javascript:;" class="post-add-icon inline-items">
                                            <img src="svg-icons/JobCard/timer.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: 10px">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                            <span style="font-weight: 400;color: #888DA8">08</span> <span style="font-weight: 400;color: #888DA8;">Bid Days Left </span>
                                         </a>
                                         <div class=" inline-items" style="margin-top: 5px" >
                                            <a data-toggle="tooltip" data-placement="top" title="FIAT PRICE" href="javascript:;" class="post-add-icon inline-items">
                                               <img src="svg-icons/Currency/039-dollar.svg" class="olymp-heart-icon" style="border-radius: 0%">
                                               <span style="font-weight: 400;color: #888DA8">$<span class="budget">2,300</span></span> <span style="font-weight: 400;color: #888DA8"></span>
                                            </a>
                                            <a data-toggle="tooltip" data-placement="top" title="ALCHEM TOKENS" href="javascript:;" class="post-add-icon inline-items" style="margin-left: 10px">
                                               <img src="svg-icons/JobCard/AlchemToken.svg" class="olymp-heart-icon" style="border-radius: 0%">
                                               <span style="font-weight: 400;color: #888DA8">$5,000</span> <span style="font-weight: 400;color: #888DA8">ALC Tokens</span>
                                            </a>
                                         </div>
                                      </div>
                                      <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding" style="padding-bottom: 0px;margin-top: -10px;margin-bottom: 20px; border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">
                                         <button type="button" class="btn btn-blue btn-sm" style="padding-top: 4px;padding-bottom: 4px; padding-left: 10px;padding-right: 10px">
                                         HTML5
                                         </button>
                                         <button type="button" class="btn btn-blue btn-sm" style="padding-top: 4px;padding-bottom: 4px; padding-left: 10px;padding-right: 10px">
                                         Web Design
                                         </button>
                                         <button type="button" class="btn btn-blue btn-sm" style="padding-top: 4px;padding-bottom: 4px; padding-left: 10px;padding-right: 10px">
                                         Graphic Design
                                         </button>
                                         <button type="button" class="btn btn-blue btn-sm" style="padding-top: 4px;padding-bottom: 4px; padding-left: 10px;padding-right: 10px">
                                         eCommerce
                                         </button>
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

    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">

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
    // $(".actual_range").datepicker({
    //   minDate:'-0d',
    //   format:' mm/dd/yyyy',
    //   startDate:'0d',
    //   todayHighlight:true
    // });
    // $('#time_period').datepicker({
    //     startDate: "0d",
    //     inputs: $('.actual_range'),
    // });

    </script>
@endsection
