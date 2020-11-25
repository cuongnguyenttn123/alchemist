   
  <input type="hidden" name="bid_id" value="{{$bid->id ?? ''}}">
  <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="more">
      <div class="post__author author vcard inline-items">
        <img src="img/coding.svg" alt="author">
        <div class="author-date">
          <a class="h6 post__author-name fn" href="javascript:;">Write Your Proposal</a>
          <div class="">
            <time class="published">${{$bid->price ?? $project->budget}} USD | {{$bid->work_time ?? $project->total_day}} Days to Complete </time>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 ">
    <hp>Response Title</hp>
    <div class="form-group">
      <input style="padding: 10px 15px;font-size: 11px;" class="form-control c-biding" type="text" name="title" value="{{$bid->title ?? ''}}" required>
    </div>
  </div>
  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 ">
    <hp>Response Description</hp>
    <div class="form-group label-floating">
      <label class="control-label">Edit Seeker's Description:</label>
      <textarea style="font-size: 11px;" class="form-control c-biding" name="description">{{strip_tags($project->detail_description ?? '')}}</textarea>
    </div>
  </div>
  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 ">
    <hp>Enter Required Skills</hp>
    <div class="form-group abc_hkt">
      <select class="selectize" name="skill" multiple style="width: 100%;">
        @if($skills)
         @foreach($skills as $skill)
            <option value="{{$skill->id}}">{{$skill->name}}</option>
         @endforeach
        @endif
      </select>
    </div>
  </div>

  <div class="col col-lg-6 col-md-6 col-sm-12 col-12 hp_work_price">
    <hp>${{$bid->price ?? $project->budget}} <span class="units" style="color: #90CB1E">+ $<span class="hp_price_up">0</span></span></hp>
    <div class="form-group label-floating quantity">
       <label class="control-label">Enter Price - $USD</label>
       <a href="#" class="quantity-minus">&#8744;</a>
       <input onkeyup="this.value=FormatNumber(this.value);" name="price" title="Price - $USD" class="replace_budget form-control work_price c-biding" min="10" max="100000" type="text" value="{{$bid->price ?? $project->budget}}" required>
       <a href="#" class="quantity-plus">&#8743;</a>
       <input class="hidden-price" type="hidden" name="hidden-price" data-price="{{$bid->price ?? $project->budget}}">
    </div>
  </div>
  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 milestone_group milestone_bid">
    <div class="ui-block">
      <!-- Your Profile  -->
      <div class="your-profile">
        <div class="ui-block-title ui-block-title-small">
           <h6 class="h6 title">EDIT SEEKER ESTIMATE</h6>
        </div>

        <div id="accordion2" class="accordion" role="tablist" aria-multiselectable="true">
            @if($project && !$bid)

              @foreach($project->milestone as $key=>$ms)
                @include('template_part.content-msbid')
              @endforeach
            @endif
            @if($bid)
              @foreach($bid->milestones as $key=>$ms)
                @include('template_part.content-msbid')
              @endforeach
            @endif
          <div class="ui-block-title wrap_clone_ms" style="border-bottom: 0px solid #e6ecf5;border-top: 0px solid #e6ecf5;">
            
            <a href="javascript:;" class="clone_ms btn btn-border-think btn-md btn-blue full-width" style="background-image: linear-gradient(#E7E7E7, #D4D4D4);border: #B9B9B9 solid 1px;color: #6B6F83;font-weight: 500" >+ Add Milestone</a>
          </div>
          <div class="mile_property d-none">
            <div>
              <div>
                 <div class="card with-icon" style="background-color: #ECF1F5">
                    <div class="card-header " role="tab" id="headingOne" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);margin-top: 0px;">
                       <h6 class="mb-0">
                          <a class="collapsepanel" data-toggle="collapse" data-parent="#accordion2" href="#milestone-99" aria-expanded="true" aria-controls="collapseOne">
                             {{-- <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px"> --}}
                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">M0<span class="ms_counter">1</span> | <span class="value_percent">20</span>% | $<span class="info_percent">{{0.2*$project->budget}}</span> | <span class="value_day">0</span> Days</span> 
                             <svg class="olymp-dropdown-arrow-icon c-white">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                             </svg>
                          </a>
                       </h6>
                    </div>
                    <div id="milestone-99" class="collapse props" data-parent="#accordion2" role="tabpanel" aria-labelledby="headingOne" style="margin-left: -1px">
                       <div class="ui-block" data-mh="pie-chart" style="margin: 0px; padding: 0px 0px 10px 0px; border-radius: 0;border-top: 0;border-right: 0; ">
                          <div class="ui-block-content" style=" padding: 15px 20px 5px 20px; text-align: left ">
                             {{-- <div class="crumina-module crumina-heading with-title-decoration " >
                                <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Setup Milestone 0<span class="ms_counter">1</span></h6>
                             </div> --}}

                             <div class="row" style="margin-bottom: 10px">
                                <div class="col col-lg-6 col-md-6 col-sm-6 col-6 hp_work_day">
                                   <hp>Days <span class="value_day">0</span></hp>
                                   <div class="form-group label-floating quantity with-icon">
                                      <i class="far fa-calendar-check c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                                      <label class="control-label">Days</label>
                                      <input type="number" min="1" max="365" name="kt_mile[99][workday]" class="form-control data-change-handle ms_workday" value="" required>
                                   </div>
                                </div>
                                <div class="col col-lg-6 col-md-6 col-sm-6 col-6">
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
                             <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                                <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                   <hp>Task Title (Alchemist Only)</hp>
                                   <div class="form-group" style="font-size: 9px; ">
                                      <input style="padding: 10px 15px 10px 15px;font-size: 11px;" type="text" name="kt_mile[99][title]" class="form-control data-change-handle ms_title" required>
                                   </div>
                                </div>
                             </div>
                             <div class="row" style="margin-bottom: 10px">
                                <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                   <hp>Milestone Description:</hp>
                                   <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                                      <label class="control-label" style="font-size: 11px;">Describe what you expect for this milestone....</label>
                                      <textarea class="form-control data-change-handle ms_description" name="kt_mile[99][description]" rows="3" cols="30" required style="border: 0;font-size: 11px;"></textarea>
                                   </div>
                                   <a href="javascript:;" class="delpanel btn btn-primary btn-sm" style="font-weight: 500">Remove</a>
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
       <!-- ... end Your Profile  -->
    </div>
  </div>
  <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="" >
      <div class="ui-block">
        <!-- Your Profile  -->
        <div class="your-profile">
          <div class="ui-block-title ui-block-title-small">
            <h6 class="h6 title">Add Reference Files:</h6>
          </div>
          <div class="ui-block-title form-group">
            <input id="sp_file" class="" type="file" name="files" value="" multiple  data-parsley-max-file="3">
            <button class="btn btn-blue reset_file" type="button" style="margin-top: 5px;">Clear File</button>
          </div>
        </div>
        <!-- ... end Your Profile  -->
      </div>
      <div class="ui-block" >
        <div class="ui-block-title">
          <h6 class="title">Bid Summary</h6>
        </div>
        <div class="ui-block-content" style="padding-bottom: 5px">
          <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Total Days</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units total_bid_day">{{$bid->work_time ?? $project->total_day}} </span>Days</span></div>
          <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Project Total</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units total_bid_price">${{$bid->price ?? $project->budget}}</span> USD</span></div>
          
        </div>
      </div>
      <div class="crumina-module crumina-heading with-title-decoration"> </div>
    </div>
  </div>
  <input type="hidden" name="_project" value={{ $project->id }}>