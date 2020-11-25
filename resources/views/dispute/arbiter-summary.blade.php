<div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
  <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
      <div class="ui-block-title" >
         <h3 style="font-size: 17px;color: #FFFFFF;">Decision Summary</h3>
      </div>
  </div>
</div>
<div class="col col-xl-12">
  <div class="row" >
     <div class="col col-lg-6 col-md-6 col-sm-6 col-12 no-margin">
        <div class="ui-block" data-mh="pie-chart" style="margin-bottom: 8px">
           <div class="ui-block-title ui-block-title-small">
              <h6 class="h6 title" align="center">Plaintiff</h6>
           </div>
           <div style="margin-bottom: 0px;padding: 20px">
            @include('template_part.part-infouser', ['user' => $dispute->user_from])
           </div>
        </div>
        <div id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom: 5px;margin-top: 0px">
           <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
              <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px;">
                 <h6 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-60" aria-expanded="true" aria-controls="collapseOne">
                       <img src="svg-icons/JobCard/exclamation.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                       <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Plaintiff Decision</span>
                       <svg class="olymp-dropdown-arrow-icon">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                       </svg>
                    </a>
                 </h6>
              </div>
              <div id="collapseOne-60" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EDF2F6">
                 <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                    <div class="ui-block-content">
                       <div class="crumina-module crumina-heading with-title-decoration " >
                          <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">{{$dispute->case_user_from()->title ?? ""}}</h6>
                       </div>
                       <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Disputed Milestone</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">M{{$dispute->milestone->position}} {{$dispute->milestone->percent_payment}}% | ${{$dispute->milestone->price_bid}} </span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                       <p style="font-size: 12px">{{$dispute->case_user_from()->description ?? ""}}</p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div id="accordion" role="tablist" aria-multiselectable="true">
           <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px;background-color: #EDF2F6">
              <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px;;">
                 <h6 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDisputeCaseA" aria-expanded="true" aria-controls="collapseOne">
                       <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                       <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Your Evidence Files</span>
                       <svg class="olymp-dropdown-arrow-icon">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                       </svg>
                    </a>
                 </h6>
              </div>
              <div id="collapseDisputeCaseA" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px;">
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
                                   <a data-toggle="modal" data-target="#" href="#" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>             
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
           <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin" >
              <div class="empty-area" style="padding: 0px 0px 0px 0px">
                 <div class="content"  align="center" style="vertical-align: middle;padding: 3px">
                    @if($dispute->is_voted_from())
                    <div class="ui-block bg-blue" data-mh="pie-chart" >
                       <div class="ui-block-title" style="padding: 10px 0px">
                          <h4 style="font-size: 13px;color: #FFFDFD;font-weight: 500" align="center">MY DECISION</h4>
                       </div>
                    </div>
                    @else
                    <span class="sub-title" style="line-height: 38px;">NOT SELECTED</span>
                    @endif
                 </div>
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
            @include('template_part.part-infouser', ['user' => $dispute->user_to])
           </div>
        </div>
        <div id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom: 5px;margin-top: 0px">
           <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
              <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px;">
                 <h6 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDefense1" aria-expanded="true" aria-controls="collapseOne">
                       <img src="svg-icons/JobCard/exclamation.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                       <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Defense Decision</span>
                       <svg class="olymp-dropdown-arrow-icon">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                       </svg>
                    </a>
                 </h6>
              </div>
              <div id="collapseDefense1" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EDF2F6">
                 <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                    <div class="ui-block-content">
                       <div class="crumina-module crumina-heading with-title-decoration " >
                          <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">{{$dispute->case_user_to()->title ?? ''}}</h6>
                       </div>
                       <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Disputed Milestone</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">M{{$dispute->milestone->position}} {{$dispute->milestone->percent_payment}}% | ${{$dispute->milestone->price_bid}} </span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                       <p style="font-size: 12px">{{$dispute->case_user_to()->description ?? ''}}</p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div id="accordion"   role="tablist" aria-multiselectable="true">
           <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px;background-color: #EDF2F6">
              <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px;;">
                 <h6 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseDisputeCaseZ" aria-expanded="true" aria-controls="collapseOne">
                       <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                       <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Evidence Files</span>
                       <svg class="olymp-dropdown-arrow-icon">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                       </svg>
                    </a>
                 </h6>
              </div>
              <div id="collapseDisputeCaseZ" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px;">
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
                                   <a data-toggle="modal" data-target="#" href="#" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>             
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
           <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin" >
              <div class="empty-area">
                 <div class="content" align="center" style="vertical-align: middle;padding: 3px">
                    @if($dispute->is_voted_to())
                    <div class="ui-block bg-blue" data-mh="pie-chart" >
                       <div class="ui-block-title" style="padding: 10px 0px">
                          <h4 style="font-size: 13px;color: #FFFDFD;font-weight: 500" align="center">MY DECISION</h4>
                       </div>
                    </div>
                    @else
                    <span class="sub-title" style="line-height: 38px;">NOT SELECTED</span>
                    @endif
                 </div>
              </div>
           </div>
        </div>
     </div>
  </div>
</div>