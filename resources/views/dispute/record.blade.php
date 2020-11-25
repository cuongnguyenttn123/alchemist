<div class="row" style="margin-bottom: 0px">
   <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
      <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
         <div class="ui-block-title" >
            <h3 style="font-size: 17px;color: #FFFFFF;">Results Record</h3>
         </div>
      </div>
   </div>
</div>

<div class="ui-block">
 <table width="100%" class="event-item-table event-item-table-fixed-width">
   <thead style="background-color: #646464">
      <tr>
        <th width="22%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
         USER 
      </th>
      <th width="50%"  class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
         CASE DETAILS
      </th>
      <th   class="mybid align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
         ACTION
      </th>
   </tr>
   </thead>
   <tbody>
      <tr class="event-item">
         <td class="freshness inline-items" align="center" style="vertical-align: top">
            <div class="author-freshness" style="margin-top: -5px">
               {!!$dispute->plaintiff->getAvatarImgAttribute(36)!!}
               <br>
               {{$dispute->plaintiff->full_name}}
               @if($dispute->is_from_win())
               <time class="entry-date updated"><span style="font-size: 12px;">Plaintiff | <span style="color: #78BF00">Case Won</span></span></time>
               @else 
               <time class="entry-date updated"><span style="font-size: 12px;">Plaintiff | <span style="color: #FF5E3A">Case Lose</span></span></time>
               @endif
            </div>
         </td>
         <td class="estimate" style="vertical-align: top">
            <a href="javascript:;" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">Case Details</a>
            <div id="accordion" role="tablist" aria-multiselectable="true">
               <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
                  <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
                     <h6 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#caseplaintif" aria-expanded="true" aria-controls="collapseOne">
                           <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                           <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">View Details</span>
                           <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                           </svg>
                        </a>
                     </h6>
                  </div>
                  <div id="caseplaintif" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" >
                     <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                        <div class="ui-block-content">
                       <div class="crumina-module crumina-heading with-title-decoration " >
                          <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">{{$dispute->case_user_from()->title ?? ''}}</h6>
                       </div>
                       <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Disputed Milestone</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">{{$dispute->milestone->percent_payment}}%| ${{$dispute->amount}}</span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                       {{$dispute->case_user_from()->description ?? ''}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </td>
         <td class="add-event align-center" style="vertical-align: top">
            <a class="btn btn--md-2 btn-purple" data-toggle="collapse" href="#filesplaintiff">
               <span>All files</span>
            </a>
            <div id="filesplaintiff" class="collapse">
               <table class="shop_table cart">
                 <tbody class="alldownload">
                      @foreach($dispute->attachments_from() as $file)
                        @include('template_part.content-attachdispute')
                      @endforeach
                     <tr>
                       <td colspan="4" class="actions" style="padding-left: 25px">
                          <a href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>             
                       </td>
                    </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
      <tr class="event-item">
         <td class="freshness inline-items" align="center" style="vertical-align: top">
            <div class="author-freshness" style="margin-top: -5px">
               {!!$dispute->defendant->getAvatarImgAttribute(36)!!}
               <br>
               {{$dispute->defendant->full_name}}
               @if(!$dispute->is_from_win())
               <time class="entry-date updated"><span style="font-size: 12px;">Defendant | <span style="color: #78BF00">Case Won</span></span></time>
               @else 
               <time class="entry-date updated"><span style="font-size: 12px;">Defendant | <span style="color: #FF5E3A">Case Lose</span></span></time>
               @endif
            </div>
         </td>
         <td class="estimate" style="vertical-align: top">
            <a href="javascript:;" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">Case Details</a>
            <div id="accordion" role="tablist" aria-multiselectable="true">
               <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
                  <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
                     <h6 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#caseplaintiff" aria-expanded="true" aria-controls="collapseOne">
                           <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                           <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">View Details</span>
                           <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                           </svg>
                        </a>
                     </h6>
                  </div>
                  <div id="caseplaintiff" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" >
                     <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                        <div class="ui-block-content">
                           <div class="crumina-module crumina-heading with-title-decoration " >
                              <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">{{$dispute->case_user_to()->title ?? ''}}</h6>
                           </div>
                          <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Disputed Milestone</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">{{$dispute->milestone->percent_payment}}%| ${{$dispute->amount}}</span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                          {{$dispute->case_user_to()->description ?? ''}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </td>
         <td class="add-event align-center" style="vertical-align: top">
            <a class="btn btn--md-2 btn-purple" data-toggle="collapse" href="#filesdefendant">
               <span>All files</span>
            </a>
            <div id="filesdefendant" class="collapse">
               <table class="shop_table cart">
                 <tbody class="alldownload">
                      @foreach($dispute->attachments_from() as $file)
                        @include('template_part.content-attachdispute')
                      @endforeach
                     <tr>
                       <td colspan="4" class="actions" style="padding-left: 25px">
                          <a href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>             
                       </td>
                    </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
      @foreach($dispute->arbiters_accept() as $arbiter)
      <tr class="event-item">
         <td class="freshness inline-items" align="center" style="vertical-align: top">
            @php 
               $img = "user";
               $color = "#FF5E3A";
               $text = "Loser";
               if($arbiter->is_win){
                  $img = "user-win";
                  $color = "#78BF00";
                  $text = "Winner";
               }
            @endphp
            <div class="author-freshness" style="margin-top: -5px"> <img src="svg-icons/Dispute/{{$img}}.svg" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
               Anonymous
               <br>
               <time class="entry-date updated"><span style="font-size: 12px;">Arbiter 0{{$arbiter->position}} | <span style="color: {{$color}}">{{$text}}</span></span></time>
            </div>
         </td>
         <td class="estimate" style="vertical-align: top">
            <a href="javascript:;" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">Case Details</a>
            <div id="accordion"   role="tablist" aria-multiselectable="true">
               <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
                  <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
                     <h6 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseArbiter-{{$arbiter->id}}" aria-expanded="true" aria-controls="collapseOne">
                           <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                           <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">View Details</span>
                           <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                           </svg>
                        </a>
                     </h6>
                  </div>
                  @php $desc = $arbiter->desc() @endphp
                  <div id="collapseArbiter-{{$arbiter->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" >
                     <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                        <div class="ui-block-content">
                           <div class="crumina-module crumina-heading with-title-decoration">
                             <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Disputed Milestone</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">{{$dispute->milestone->percent_payment}}%| ${{$dispute->amount}}</span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                             {{$desc["desc"] ?? ''}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </td>
         <td class="add-event align-center" style="vertical-align: top">
            <a class="btn btn--md-2 btn-purple" data-toggle="collapse" href="#files-{{$arbiter->id}}">
               <span>All files</span>
            </a>
            <div id="files-{{$arbiter->id}}" class="collapse">
               <table class="shop_table cart">
                 <tbody class="alldownload">
                      @foreach($arbiter->file_arbiters() as $file)
                        @include('template_part.content-attachdispute')
                      @endforeach
                     <tr>
                       <td colspan="4" class="actions" style="padding-left: 25px">
                          <a href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>             
                       </td>
                    </tr>
                  </tbody>
               </table>
            </div>
      </tr>
      @endforeach
   </tbody>
</table>
</div>
