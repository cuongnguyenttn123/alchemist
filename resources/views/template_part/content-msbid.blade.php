<div class="mile_property">
   <div>
      <div>
      <div class="card with-icon" style="background-color: #ECF1F5">
         <div class="card-header " role="tab" id="headingOne" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);margin-top: 0px;">
            <h6 class="mb-0">
               <a class="collapsepanel" data-toggle="collapse" data-parent="#accordion2" href="#milestone-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                  {{-- <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px"> --}}
                  <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">M0<span class="ms_counter">{{$key+1}}</span> | <span class="value_percent">{{$ms->percent_payment}}</span>% | $<span class="info_percent">{{$ms->price}}</span> | <span class="value_day">{{$ms->workday}}</span> Days</span> 
                  <svg class="olymp-dropdown-arrow-icon c-white">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
               </a>
            </h6>
         </div>
         <div id="milestone-{{$key}}" class="collapse props" data-parent="#accordion2" role="tabpanel" aria-labelledby="headingOne" style="margin-left: -1px">
            <div class="ui-block" data-mh="pie-chart" style="margin: 0px; padding: 0px 0px 10px 0px; border-radius: 0;border-top: 0;border-right: 0; ">
               <div class="ui-block-content" style=" padding: 15px 20px 5px 20px; text-align: left ">
                  {{-- <div class="crumina-module crumina-heading with-title-decoration " >
                     <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Setup Milestone 0<span class="ms_counter">1</span></h6>
                  </div> --}}

                  <div class="row" style="margin-bottom: 10px">
                     <div class="col col-lg-6 col-md-6 col-sm-6 col-6 hp_work_day">
                        <hp>Days <span class="value_day">{{$ms->workday}}</span></hp>
                        <div class="form-group label-floating quantity with-icon">
                           <i class="far fa-calendar-check c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                           <label class="control-label">Days</label>
                           <input type="number" min="1" max="365" name="mile[{{$key}}][workday]" class="form-control data-change-handle ms_workday" value="{{$ms->workday}}" required>
                        </div>
                     </div>
                     <div class="col col-lg-6 col-md-6 col-sm-6 col-6">
                        <hp><span class="value_percent">{{$ms->percent_payment}}</span>% / 100% = $<span class="units info_percent" style="color: #90CB1E">{{$ms->price}}</span></hp>
                        <div class="form-group is-select">
                           <select class="selectpicker1 form-control1 percent_payment ms_percent_payment" name="mile[{{$key}}][percent_payment]" required>
                             @if($key==0)
                               <option value="20" selected >20% | Locked</option>
                             @else
                              @for($i=1;$i<=8;$i++)
                              <?php $selected = ($ms->percent_payment==$i*10) ? 'selected' : ''; ?>
                              <option value="{{$i*10}}" {{$selected}}>{{$i*10}}%</option>
                              @endfor
                             @endif                                       
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                     <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <hp>Task Title (Alchemist Only)</hp>
                        <div class="form-group" style="font-size: 9px; ">
                           <input value="{{$ms->title}}" style="padding: 10px 15px 10px 15px;font-size: 11px;" type="text" name="mile[{{$key}}][title]" class="form-control data-change-handle ms_title" required>
                        </div>
                     </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px">
                     <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <hp>Milestone Description:</hp>
                        <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                           <label class="control-label" style="font-size: 11px;">Describe what you expect for this milestone....</label>
                           <textarea class="form-control data-change-handle ms_description" name="mile[{{$key}}][description]" rows="3" cols="30" required style="border: 0;font-size: 11px;">{{$ms->description}}</textarea>
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