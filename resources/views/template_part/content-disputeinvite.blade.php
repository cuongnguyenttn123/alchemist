<tr class="event-item">
   <td class="author" style="vertical-align: top">
      <div class="author-freshness" align="center">
         <span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 14px; font-weight: 500; margin-right: 5px">Dispute ID:</span><span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$dispute->id}}</span></button>
         <a href="javascript:;" class="h6 title" style="padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$dispute->title}}</a>
         <time class="entry-date updated" datetime="2017-06-24T18:18" ><em style="font-size: 12px;">{{$dispute->milestone->title}} | ${{$dispute->milestone->price_bid}}</em></time>
      </div>
   </td>
   <td class="estimate" style="vertical-align: top">
      <a href="javascript:;" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px"> {{$dispute->milestone->percent_payment}}% | ${{$dispute->milestone->price_bid}} </a>
      <div id="accordion" role="tablist" aria-multiselectable="true">
         <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
            <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
               <h6 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$dispute->id}}" aria-expanded="true" aria-controls="collapseOne">
                     <img src="svg-icons/JobCard/exclamation.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                     <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Dispute Details</span>
                     <svg class="olymp-dropdown-arrow-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                     </svg>
                  </a>
               </h6>
            </div>
            <div id="collapseOne-{{$dispute->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20">
               <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                  <div class="ui-block-content" style=" padding: 15px 20px 0px 20px ">
                     <div class="skills-item">
                        <span><span><img src="svg-icons/JobCard/timer.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Deadline</span>
                        </span><span style="font-size: 12px;font-weight: 400">{{$dispute->deadline_arbiter}}</span>
                     </div>
                     <div class="skills-item">
                        <span><span><img src="svg-icons/menu/coins.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Dispute Amount</span>
                        </span><span style="font-size: 12px;font-weight: 400">${{$dispute->amount}}</span>
                     </div>
                     <div class="skills-item">
                        <span><span><img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500">Required Entry stake</span>
                        </span><span style="font-size: 12px;font-weight: 400">{{$dispute->arbitration_fee}} ALC</span>
                     </div>
                     <div class="skills-item">
                        <span><span><img src="svg-icons/Upvote-Downvote/upvote-active.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Win High:</span>
                         </span><span style="font-size: 12px;font-weight: 400"> 25% = {{$dispute->win_hightest}} CRT</span>
                        </span>
                     </div>
                     <div class="skills-item">
                        <span><span><img src="svg-icons/Upvote-Downvote/downvote-active.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Win Low:</span>
                         </span><span style="font-size: 12px;font-weight: 400"> 8% = {{$dispute->win_lowest}} CRT</span>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </td>
   <td style="vertical-align: top">
      <button class="btn btn-md-2 btn-border-think c-grey btn-transparent full-width full-height" style="vertical-align: top; padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/stopwatch (2).svg" width="18" hspace="1" style="PADDING-BOTTOM: 4px; margin-left: -5px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500"> Status</span></span><br><span style="font-size: 12px;font-weight: 400">{{$dispute->dispute_status}}<span></button>
   </td>
   <td class="bids" style="vertical-align: top">
      <button class="btn btn-md-2 btn-border-think c-grey btn-transparent full-width" style=" padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/stopwatch (2).svg" width="18" hspace="1" style="PADDING-BOTTOM: 4px; margin-left: -5px"><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 12px;font-weight: 500"> Deadline</span></span><br><span style="font-size: 12px;font-weight: 400">{{$dispute->deadline_left}}</span></button>
   </td>
   <td class="add-event align-center" style="vertical-align: top">
      @if(isset($accept) && $accept == true)
         <a href="{{$dispute->permalink()}}" class="btn btn-smoke btn-sm" style="background-image: linear-gradient(#1C91FF, #0081C9);font-weight: 400">ARBITER PANEL <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px"></a>
         @if($dispute->is_voted())
            <a href="#" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E;font-weight: 500;color: #FFFFFF"><i class="fa fa-check-circle" aria-hidden="true" ></i>ENTRY COMPLETE</a>
         @else
            <a href="javascript:;" class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#FF5E3A, #FF5E3A);font-weight: 500;color: #FFFFFF"><i class="fa fa-times-circle" aria-hidden="true"></i>NO ENTRY</a>
         @endif
      @else
      <a href="javascript:;" class="btn btn-purple btn-sm btn-icon-left accept_dispute" data-dispute="{{$dispute->id}}" style="background-color: #90CB1E;font-weight: 500;color: #FFFFFF"><i class="fa fa-check-circle" aria-hidden="true" ></i>ACCEPT OFFER</a>
      <a href="javascript:;" class="btn btn-purple btn-sm btn-icon-left decline_dispute" data-dispute="{{$dispute->id}}" style="background-image: linear-gradient(#FF5E3A, #FF5E3A);font-weight: 500;color: #FFFFFF
         "><i class="fa fa-times-circle" aria-hidden="true"></i>DECLINE OFFER</a>
      @endif
   </td>
</tr>
