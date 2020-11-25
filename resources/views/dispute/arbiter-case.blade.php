<?php
$your_vote = $dispute->your_vote();
$description = (object) $your_vote->description;
?>
<div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
   <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
      <div class="ui-block-title">
         <h3 style="font-size: 17px;color: #FFFFFF;">Dispute Overview</h3>
      </div>
   </div>
   <div class="ui-block responsive-flex1200">
      <div class="ui-block-content">
         <div class="crumina-module crumina-heading with-title-decoration ">
            <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Dispute Regulations & Potential Rewards </h6>
         </div>
         <p style="font-size: 12px"> Please review both statements carefully and make sure to leave a minimum of 200 words to state your case. This information will be saved and only reviewed by the Plaintiff & Defendant in case of further dispute procedings. Your Identity is hidden by all parties to ensure protected dispute process. </p>
      </div>
   </div>
   <div class="ui-block responsive-flex1200" style="margin-top: 15px">
      <div class="ui-block-title">
         <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px;"><img src="svg-icons/menu/coins.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Price: ${{$dispute->amount}}</a>
         <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px"><img src="svg-icons/Token/AlchemToken.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Token Pot: {{$dispute->total_credit}} ALC</a>
         <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px"><img src="svg-icons/Like-Dislike/up-arrow.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Win Highest: 25% = {{$dispute->win_hightest}} ALC</a>
         <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px"><img src="svg-icons/Like-Dislike/down-arrow.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Win Lowest: 8% = {{$dispute->win_lowest}} ALC</a>
      </div>
   </div>
</div>
<div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
   <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
      <div class="ui-block-title">
         <h3 style="font-size: 17px;color: #FFFFFF;">Review & Enter Case</h3>
      </div>
   </div>
</div>
@if(!$dispute->check_dispute_case())
<div class="col col-xl-12">
   Waiting Statement
</div>
@else
<div class="col col-xl-12 vote_case">
   <div class="row">
      <div class="col col-lg-6 col-md-6 col-sm-6 col-12 no-margin">
         <div class="ui-block" data-mh="pie-chart" style="margin-bottom: 8px">
            <div class="ui-block-title ui-block-title-small">
               <h6 class="h6 title" align="center">Plaintiff</h6>
            </div>
            <div style="margin-bottom: 0px;padding: 20px">
               @include('template_part.part-infouser', ['user' => $dispute->plaintiff])
            </div>
         </div>
         <div id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom: 5px;margin-top: 0px">
            <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
               <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px;">
                  <h6 class="mb-0">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-50" aria-expanded="true" aria-controls="collapseOne">
                        <img src="svg-icons/JobCard/exclamation.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                        <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Plaintiff Statement</span>
                        <svg class="olymp-dropdown-arrow-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                     </a>
                  </h6>
               </div>
               <div id="collapseOne-50" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EDF2F6">
                  <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                     <div class="ui-block-content">
                        <div class="crumina-module crumina-heading with-title-decoration ">
                           <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">{{$dispute->case_user_from()->title ?? ''}}</h6>
                        </div>
                        <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Disputed Milestone</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">{{$dispute->milestone->percent_payment}}%| ${{$dispute->amount}}</span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                        {{$dispute->case_user_from()->description ?? ''}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px;background-color: #EDF2F6">
               <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px;;">
                  <h6 class="mb-0">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseContestPreview1" aria-expanded="true" aria-controls="collapseOne">
                        <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                        <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Evidence Files</span>
                        <svg class="olymp-dropdown-arrow-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                     </a>
                  </h6>
               </div>
               <div id="collapseContestPreview1" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px;">
                  <div class="ui-block" style="margin-bottom: 0px">
                     <form action="#" method="post" class="cart-main">
                        <!-- Shop Table Cart -->
                        <table class="shop_table cart">
                           <thead>
                              <tr>
                                 <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
                              </tr>
                           </thead>
                           <tbody class="alldownload">
                              @foreach($dispute->attachments_from() as $file)
                              @include('template_part.content-attachdispute')
                              @endforeach
                              <tr>
                                 <td colspan="4" class="actions" style="padding-left: 25px">
                                    <a data-toggle="modal" data-target="#" href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px "><i class="fa fa-download" aria-hidden="true"></i>DOWNLOAD ALL</a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <!-- ... end Shop Table Cart -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="row" style="margin-bottom: 10px">
            <div class="col col-lg-10 col-md-9 col-sm-9 col-9 no-margin">
               <div id="accordion " role="tablist" aria-multiselectable="true">
                  <div class="card with-icon" style="background-color: #ECF1F5">
                     <div class="card-header " role="tab" id="headingOne" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;margin-top: 0px; padding-top: 20px; padding-bottom: 20px; ">
                        <h6 class="mb-0">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseOne">
                              <img src="svg-icons/Create Job/incomplete.svg" width="15" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px">
                              <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">Enter Case & Select Dispute Winner</span>
                              <svg class="olymp-dropdown-arrow-icon c-white">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                              </svg>
                           </a>
                        </h6>
                     </div>
                     <div id="collapseNine" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="margin-left: -1px">
                        <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 8px 0px; padding: 0px 0px 10px 0px ">
                           <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">
                              <div class="crumina-module crumina-heading with-title-decoration ">
                                 <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Arbiter Statement</h6>
                              </div>
                              <form>
                                 <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                    </div>
                                 </div>
                                 <div class="row" style="margin-bottom: 10px">
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                       <hp>Enter your reason for your decision:</hp>
                                       <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                                          <label class="control-label" style="font-size: 11px;"></label>
                                          <textarea style="font-size: 11px;margin-top: 2px" class="form-control" placeholder="" name="description">{!!$description->plaintiff['desc'] ?? ""!!}</textarea>
                                       </div>
                                    </div>
                                 </div>
                                 @if($your_vote->files_plaintiff())
                                 <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
                                    <div class="ui-block-title">
                                       <div class="form-group">
                                          @foreach($your_vote->files_plaintiff() as $file)
                                          @include('template_part.content-attachdispute')
                                          @endforeach
                                       </div>
                                    </div>
                                 </div>
                                 @endif
                                 <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
                                    <div class="ui-block-title">
                                       <div class="form-group">
                                          <label for="zzFile">+Add files</label>
                                          <input type="file" class="form-control-file" id="zzFile" name="files[]" multiple>
                                          <button class="btn btn-secondary btn-sm align-right reset_file" type="button" style="background-image: linear-gradient(#E7E7E7, #D4D4D4);border: #B9B9B9 solid 1px;color: #6B6F83;font-weight: 500; margin-top: 10px;">Clear</button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-bottom: 10px">
                                    <div class="col col-lg-6 col-md-6 col-sm-6 col-6">
                                       <input type="hidden" name="type" value="plaintiff">
                                       <button type="button" class="save_case btn btn-sm btn-border-think c-grey btn-transparent">SAVE ENTRY
                                       </button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col col-lg-2 col-md-3 col-sm-2 col-2 no-margin " style="padding: 0px 15px 0px 0px">
               <div class="radio" align="center" style=" background-color: #FFFFFF;height: 60px;border-radius: 4px;border: solid 1px #D8DBE6;padding: 15px 0px 0px 0px;vertical-align: middle;margin-bottom: 0px">
                  <label style="align-items: center">
                     <input class="vote_dispute" type="radio" name="vote" value="0">
                  </label>
               </div>
            </div>
         </div>
      </div>
      <div class="col col-lg-6 col-md-6 col-sm-6 col-12 no-margin">
         <div class="ui-block" data-mh="pie-chart" style="margin-bottom: 8px">
            <div class="ui-block-title ui-block-title-small">
               <h6 class="h6 title" align="center">Defendant</h6>
            </div>
            <div style="margin-bottom: 0px;padding: 20px">
               @include('template_part.part-infouser', ['user' => $dispute->defendant])
            </div>
         </div>
         <div id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom: 5px;margin-top: 0px">
            <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
               <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px;">
                  <h6 class="mb-0">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseDefense" aria-expanded="true" aria-controls="collapseOne">
                        <img src="svg-icons/JobCard/exclamation.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                        <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Defense Statement</span>
                        <svg class="olymp-dropdown-arrow-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                     </a>
                  </h6>
               </div>
               <div id="collapseDefense" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EDF2F6">
                  <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                     <div class="ui-block-content">
                        <div class="crumina-module crumina-heading with-title-decoration ">
                           <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">{{$dispute->case_user_to()->title ?? ''}}</h6>
                        </div>
                        <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Disputed Milestone</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">{{$dispute->milestone->percent_payment}}%| ${{$dispute->amount}}</span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                        {{$dispute->case_user_to()->description ?? ''}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px;background-color: #EDF2F6">
               <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px;;">
                  <h6 class="mb-0">
                     <a data-toggle="collapse" data-parent="#accordion" href="#collapseContestPreview2" aria-expanded="true" aria-controls="collapseOne">
                        <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                        <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Evidence Files</span>
                        <svg class="olymp-dropdown-arrow-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                     </a>
                  </h6>
               </div>
               <div id="collapseContestPreview2" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px;">
                  <div class="ui-block" style="margin-bottom: 0px">
                     <form action="#" method="post" class="cart-main">
                        <!-- Shop Table Cart -->
                        <table class="shop_table cart">
                           <thead>
                              <tr>
                                 <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
                              </tr>
                           </thead>
                           <tbody class="alldownload">
                              @foreach($dispute->attachments_to() as $file)
                              @include('template_part.content-attachdispute')
                              @endforeach
                              <tr>
                                 <td colspan="4" class="actions" style="padding-left: 25px">
                                    <a href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px "><i class="fa fa-download" aria-hidden="true"></i>DOWNLOAD ALL</a>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <!-- ... end Shop Table Cart -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="row" style="margin-bottom: 10px">
            <div class="col col-lg-10 col-md-9 col-sm-9 col-9 no-margin">
               <div id="accordion " role="tablist" aria-multiselectable="true">
                  <div class="card with-icon" style="background-color: #ECF1F5">
                     <div class="card-header " role="tab" id="headingOne" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;margin-top: 0px; padding-top: 20px; padding-bottom: 20px; ">
                        <h6 class="mb-0">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseOne">
                              <img src="svg-icons/Create Job/checked.svg" width="15" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px">
                              <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">Enter Case & Select Dispute Winner</span>
                              <svg class="olymp-dropdown-arrow-icon c-white">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                              </svg>
                           </a>
                        </h6>
                     </div>
                     <div id="collapseTen" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="margin-left: -1px">
                        <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 8px 0px; padding: 0px 0px 10px 0px ">
                           <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">
                              <div class="crumina-module crumina-heading with-title-decoration ">
                                 <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Arbiter Statement</h6>
                              </div>
                              <form>
                                 <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                    </div>
                                 </div>
                                 <div class="row" style="margin-bottom: 10px">
                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                       <hp>Enter your reason for your decision:</hp>
                                       <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                                          <label class="control-label" style="font-size: 11px;"></label>
                                          <textarea style="font-size: 11px;margin-top: 2px" class="form-control" placeholder="" name="description">{!!$description->defendant['desc'] ?? ""!!}</textarea>
                                       </div>
                                    </div>
                                 </div>
                                 @if($your_vote->files_defendant())
                                 <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
                                    <div class="ui-block-title">
                                       <div class="form-group">
                                          @foreach($your_vote->files_defendant() as $file)
                                          @include('template_part.content-attachdispute')
                                          @endforeach
                                       </div>
                                    </div>
                                 </div>
                                 @endif
                                 <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
                                    <div class="ui-block-title">
                                       <div class="form-group">
                                          <label for="zFile">+Add files</label>
                                          <input type="file" class="form-control-file" id="zFile" name="files[]" multiple>
                                          <button class="btn btn-secondary btn-sm align-right reset_file" type="button" style="background-image: linear-gradient(#E7E7E7, #D4D4D4);border: #B9B9B9 solid 1px;color: #6B6F83;font-weight: 500; margin-top: 10px;">Clear</button>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row" style="margin-bottom: 10px">
                                    <div class="col col-lg-6 col-md-6 col-sm-6 col-6">
                                       <input type="hidden" name="type" value="defendant">
                                       <button type="button" class="save_case btn btn-sm btn-border-think c-grey btn-transparent">SAVE ENTRY
                                       </button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col col-lg-2 col-md-3 col-sm-2 col-2 no-margin " style="padding: 0px 15px 0px 0px">
               <div class="radio" align="center" style=" background-color: #FFFFFF;height: 60px;border-radius: 4px;border: solid 1px #D8DBE6;padding: 15px 0px 0px 0px;vertical-align: middle;margin-bottom: 0px">
                  <label style="align-items: center">
                     <input class="vote_dispute" type="radio" name="vote" value="1">
                  </label>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col col-xl-12">
   <div class="row">
      <div class="col col-xl-6 col-lg-12 col-md-12 m-auto">
         <div class="logout-content">
            <br>
            <h6>DECISION</h6>
            <p>{{$dispute->user_from->full_name}} (Plantiff) - {{$dispute->user_to->full_name}} (Defendant)
            </p>
            <button class="btn btn-purple btn-md-2 btn-icon-left send_decision" style="background-color: #90CB1E; width: 60%"><i class="fa fa-paper-plane" aria-hidden="true"></i>SEND DECISION?</button><br><br>
         </div>
      </div>
   </div>
</div>
@endif