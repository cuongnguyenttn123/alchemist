<?php $rand = rand(0,99)?>
<div class="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom: 10px">
   <div class="card" >
      <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #E6ECF5;border-width: 1px; border-radius: 0px;padding-top: 10px; padding-bottom: 11px;">
         <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter-{{$rand}}" aria-expanded="true" aria-controls="collapseOne">
               <img src="svg-icons/JobCard/settings-icon.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
               <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">SEARCH FILTER</span>
               <svg class="olymp-dropdown-arrow-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
               </svg>
            </a>
         </h6>
      </div>
      <div id="collapseFilter-{{$rand}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;">
         <div class="ui-block responsive-flex1200" style="margin-top: 10px;margin-bottom: 0px;background-image: linear-gradient(#FCFCFC, #FAFBFD)">
            <div class="ui-block-title">
               <div class="w-select" align="left" >
                  <form class="w-search" style="width: inherit">
                     <div class="form-group with-button">
                        <input class="form-control" type="text" placeholder="Search Project ID, Project Name etc......">
                        <button>
                           <svg class="olymp-magnifying-glass-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                           </svg>
                        </button>
                     </div>
                  </form>
               </div>
               <div class="w-select" align="right">
                  <div class="title" > Filter By:</div>
                  <fieldset class="form-group">
                     <select class="selectpicker form-control">
                        <option value="NU">All Skills</option>
                        <option value="NU">Websites, IT & Software</option>
                        <option value="NU">Mobile Phone & Computing</option>
                        <option value="NU">Writing & Content</option>
                        <option value="NU">Design, Media & Architecture</option>
                        <option value="NU">Data Entry & Admin</option>
                        <option value="NU">Engineering & Science</option>
                        <option value="NU">Sourcing & Manufacturing</option>
                        <option value="NU">Sales & Marketing</option>
                        <option value="NU">Business, Accounting & HR</option>
                        <option value="NU">Legal, Risk</option>
                        <option value="NU">Translation & Languages</option>
                        <option value="NU">Local Jobs & Services</option>
                     </select>
                  </fieldset>
               </div>
               <div class="w-select" align="right">
                  <fieldset class="form-group">
                     <select class="selectpicker form-control">
                        <option value="NU">Show 10</option>
                        <option value="NU">Show 30</option>
                        <option value="NU">Show 50</option>
                        <option value="NU">Show 80</option>
                        <option value="NU">Show 100</option>
                     </select>
                  </fieldset>
               </div>
               <div class="w-select" align="right">
                  <fieldset class="form-group">
                     <select class="selectpicker form-control">
                        <option value="NU">Date (Descending)</option>
                        <option value="NU">Date (Ascending)</option>
                     </select>
                  </fieldset>
               </div>
               <a href="javascript:;" class="btn btn-primary btn-md-2" align="right">Filter</a>
               <button class="btn btn-md-2 btn-secondary " style="padding: 8px 12px 8px 12px" align="right"><img src="svg-icons/JobCard/refresh-page-arrow-button.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px"></button>
            </div>
         </div>
      </div>
   </div>
</div>