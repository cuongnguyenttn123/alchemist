
<tr class="event-item hp-bid2">
  <td class="author">
    <div class="event-author author-freshness inline-items" style="vertical-align: top;margin-top: 15px;">
      <div class="author-thumb" style="margin-bottom:0px; position: sticky;">
        <a href="{{$bid->user->permalink()}}" target="_blank">
          <img src="{{$bid->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">


          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">{{$bid->user->level}}</div></a>
      </div>
      <div class="author-freshness">
        <a href="{{$bid->user->permalink()}}" target="_blank" class="h6 title" style="margin-top: -5px; font-size: 12px; font-weight: 600">{{$bid->user->full_name}}
          <img src="svg-icons/Flags/country-code/{{$bid->user->countryflag}}.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$bid->user->user_title}} | LV {{$bid->user->level}}</span></time>

      </div>



    </div>
  </td>
    {{--<td class="align-top estimate bid2-miletone">
      <a href="javascript:;" class="paddingtop10 paddingbottom10 margin0 fontsize-12 fontweight-500 post-category btn btn-sm btn-border-think c-grey btn-transparent full-width align-center">${{$bid->price}} | {{$bid->work_time}} Days</a>
      <div id="accordion" class="" role="tablist" aria-multiselectable="true">
         <div class="card father-card">
            <div class="card-header border-top-radius" role="tab" id="headingOne-{{$bid->id}}">
               <h6 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$bid->id}}" aria-expanded="true" aria-controls="collapseOne">
                     <img class="marginright5 paddingbottom5" src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1">
                     <span class="color-1 paddingbottom5 fontweight-400 fontsize-13">Details</span>
                     <svg class="olymp-dropdown-arrow-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                     </svg>
                  </a>
               </h6>
            </div>
            <div id="collapseOne-{{$bid->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$bid->id}}">
               <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="ui-block margintop10" data-mh="pie-chart" style="border:none;">
                     <div class="today-events calendar">
                        <div class="list">
                           <div id="list_milestone-{{$bid->id}}" role="tablist" aria-multiselectable="true" class="day-event">
                              @foreach($bid->milestones as $ms)
                              <div class="card ">
                                 <div class="card-header paddingbottom10 paddingtop10" role="tab" id="headingOne-{{$ms->id}}">
                                    <div class="event-time fontweight-400">
                                       <time class="published color-2 paddingbottom5 fontsize-13 fontweight-500" datetime="2017-03-24T18:18">{{$ms->title}}</time>
                                    </div>
                                    <h5 class="mb-0 title margintop-10 paddingright20">
                                       <a data-toggle="collapse" data-parent="#accordion-{{$ms->id}}" href="#collapseOne-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne" class="color-3 fontweight-400 fontsize-12">
                                       {{$ms->percent_payment}}% | <span>$</span>{{$ms->price_bid}} | {{$ms->workday}} Days<i class="fa fa-angle-down" aria-hidden="true"></i>
                                       </a>
                                    </h5>
                                 </div>
                                 <div id="collapseOne-{{$ms->id}}" class="collapse " role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body paddingbottom10">{{$ms->description}}</div>
                                    <div class="skills-item marginleft25 margintop5">
                                       <span>
                                          <img src="svg-icons/JobCard/timer.svg" width="18" hspace="1">
                                          <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-500">Duration</span>
                                       </span>
                                       <span class="fontsize-12 fontweight-400">{{$ms->workday}} Days</span>
                                    </div>
                                    <div class="skills-item marginleft25 margintop-10">
                                       <span>
                                          <img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1">
                                          <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-500">Estimate</span>
                                       </span>
                                       <span class="fontsize-12 fontweight-400">${{$ms->price_bid}} USD</span>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="accordion-{{$bid->id}}" role="tablist" aria-multiselectable="true">
                  <div class="card support-hp">
                     <div class="card-header" role="tab" id="headingOne-{{$bid->id}}">
                        <h6 class="mb-0">
                           <a data-toggle="collapse" data-parent="#accordion-{{$bid->id}}" href="#collapseOne--{{$bid->id}}" aria-expanded="true" aria-controls="collapseOne">
                              <img class="paddingbottom-0 marginright5" src="svg-icons/JobCard/download.svg" width="15" hspace="1">
                              <span class="color-4 paddingbottom5 fontweight-400 fontsize-13">Support Files</span>
                              <svg class="olymp-dropdown-arrow-icon c-white">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                              </svg>
                           </a>
                        </h6>
                     </div>
                     <div id="collapseOne--{{$bid->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$bid->id}}">
                        <div class="ui-block margintop10 padding0">
                           <table class="shop_table cart">
                              <thead>
                                 <tr> </tr>
                                 <tr>
                                    <th style="width: 70%;" class="product-thumbnail">ITEM DESCRIPTION</th>
                                    <th style="width: 30%;" class="product-subtotal">DOWNLOAD</th>
                                 </tr>
                              </thead>
                              <tbody class="alldownload">
                                 @if($files = $bid->files())
                                    @foreach($files as $file)
                                    <tr class="cart_item" style="border-bottom: 1px solid #e6ecf5;">
                                       <td style="width: 70%;" class="product-thumbnail">
                                          <div class="forum-item">
                                            <div class="content">
                                                <a href="{{$file->url}}" data-name="{{$file->ori_name}}" class="my-files paddingbottom5 fontsize-13 fontweight-500 h6 title" download>
                                                   <span class="color-2">{{$file->name}}</span>
                                                </a>
                                                <div class="post__date">
                                                  <time class="published">{{$file->extension}} File </time>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td style="width: 30%; text-align: center;" class="product-subtotal">
                                          <a href="{{$file->url}}" class="product-del remove" title="Remove this item" download="">
                                             <img src="img/inbox.svg" class="olymp-close-icon">
                                             <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                             </svg>
                                          </a>
                                       </td>
                                    </tr>
                                    @endforeach
                                 @endif
                                 <tr>
                                    <td colspan="4" class="actions">
                                       <a data-toggle="modal" data-target="#" href="javascript:;" class="download-all marginright10 btn btn-purple btn-md-2 btn-icon-left"><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </td>--}}
   <td class="align-top estimate bid2-miletone" style="vertical-align: top">
      <a href="javascript:;" class="paddingtop10 paddingbottom10 margin0 fontsize-12 fontweight-500 post-category btn btn-sm btn-border-think c-grey btn-transparent full-width align-center">${{$bid->price}} | {{$bid->work_time}} Days</a>
      <div id="accordion" role="tablist" aria-multiselectable="true">
         <div class="card father-card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
            <div class="card-header" role="tab" id="headingOne-{{$bid->id}}" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 8px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
               <h6 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$bid->id}}" aria-expanded="true" aria-controls="collapseOne">
                     <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                     <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Details</span>
                     <svg class="olymp-dropdown-arrow-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                     </svg>
                  </a>
               </h6>
            </div>
            <div id="collapseOne-{{$bid->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$bid->id}}">
               <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                     <div class="today-events calendar">
                        <ul class="order-totals-list" style="padding: 15px 15px 0px 15px;vertical-align: top">
                           <li style="padding-bottom: 15px;margin-bottom: 15px;">{{$bid->title}}</li>
                           <div class="comment-content comment">
                              {{$bid->description}}
                              <br><br>
                              <img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                              <span class="ui-block-title-small" style="margin-right: 8px">${{$bid->price}}</span>
                              <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                              <span class="ui-block-title-small" style="margin-right: 8px">{{$bid->work_time}} Days</span>
                           </div>
                        </ul>
                     </div>
                  </div>
               </div>
               <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 8px 0px; padding: 0px 0px 10px 0px ">
                     <div class="today-events calendar">
                        <div class="list">
                           <div id="accordion-3" role="tablist" aria-multiselectable="true" class="day-event" style="border: none;">
                              @foreach($bid->milestones as $ms)
                              <div class="card ">
                                 <div class="card-header paddingbottom10 paddingtop10" role="tab" id="headingOne-{{$ms->id}}">
                                    <div class="event-time fontweight-400">
                                       <time class="published color-2 paddingbottom5 fontsize-13 fontweight-500" datetime="2017-03-24T18:18">{{$ms->title}}</time>
                                    </div>
                                    <h5 class="mb-0 title margintop-10 paddingright20">
                                       <a data-toggle="collapse" data-parent="#accordion-{{$ms->id}}" href="#collapseOne-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne" class="color-3 fontweight-400 fontsize-12">
                                       {{$ms->percent_payment}}% | <span>$</span>{{$ms->price_bid}} | {{$ms->workday}} Days<i class="fa fa-angle-down" aria-hidden="true"></i>
                                       </a>
                                    </h5>
                                 </div>
                                 <div id="collapseOne-{{$ms->id}}" class="collapse " role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-body paddingbottom10">{{$ms->description}}</div>
                                    <div class="skills-item marginleft25 margintop5">
                                       <span>
                                          <img src="svg-icons/JobCard/timer.svg" width="18" hspace="1">
                                          <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-500">Duration</span>
                                       </span>
                                       <span class="fontsize-12 fontweight-400">{{$ms->workday}} Days</span>
                                    </div>
                                    <div class="skills-item marginleft25 margintop-10">
                                       <span>
                                          <img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1">
                                          <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-500">Estimate</span>
                                       </span>
                                       <span class="fontsize-12 fontweight-400">${{$ms->price_bid}} USD</span>
                                    </div>
                                 </div>
                              </div>
                              @endforeach

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="accordion-{{$bid->id}}" role="tablist" aria-multiselectable="true">
                  <div class="card support-hp">
                     <div class="card-header" role="tab" id="headingOne-{{$bid->id}}">
                        <h6 class="mb-0">
                           <a data-toggle="collapse" data-parent="#accordion-{{$bid->id}}" href="#collapseOne--{{$bid->id}}" aria-expanded="true" aria-controls="collapseOne">
                              <img class="paddingbottom-0 marginright5" src="svg-icons/JobCard/download.svg" width="15" hspace="1">
                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">Support Files</span>
                              <svg class="olymp-dropdown-arrow-icon c-white">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                              </svg>
                           </a>
                        </h6>
                     </div>
                     <div id="collapseOne--{{$bid->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$bid->id}}">
                        <div class="ui-block margintop10 padding0">
                           <table class="shop_table cart" style="width: 100%">
                              <thead style="background-color: white;">
                                 <tr> </tr>
                                 @if($files = $bid->files())
                                   <tr>
                                     <th class="product-thumbnail bg-img" style="background-image:none; color: #8891B6 ;">ITEM DESCRIPTION</th>
                                     <th class="product-subtotal bg-img" style="background-image:none; color: #8891B6 ;">DOWNLOAD</th>
                                   </tr>
                                 @endif

                              </thead>
                              <tbody class="alldownload">
                                 @if($files = $bid->files())
                                    @foreach($files as $file)
                                    <tr class="cart_item" style="border-bottom: 1px solid #e6ecf5;">
                                       <td style="width: 70%;" class="product-thumbnail">
                                          <div class="forum-item">
                                            <div class="content">
                                                <a href="{{$file->url}}" data-name="{{$file->ori_name}}" class="my-files paddingbottom5 fontsize-13 fontweight-500 h6 title" download>
                                                   <span class="color-2">{{$file->name}}</span>
                                                </a>
                                                <div class="post__date">
                                                  <time class="published">{{$file->extension}} File </time>
                                                </div>
                                             </div>
                                          </div>
                                       </td>
                                       <td style="width: 30%; text-align: center;" class="product-subtotal">
                                          <a href="{{$file->url}}" class="product-del remove" title="Remove this item" download="">
                                             <img src="img/inbox.svg" class="olymp-close-icon">
                                             <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                             </svg>
                                          </a>
                                       </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                      <td colspan="4" class="actions">
                                        <a data-toggle="modal" data-target="#" href="javascript:;" class="download-all marginright10 btn btn-purple btn-md-2 btn-icon-left"><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                                      </td>
                                    </tr>
                                 @else
                                   <div class="ui-block-content">

                                     <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                                       <a  data-toggle="modal" data-target=""></a>

                                       <div class="content" style="margin-top: 10px">

                                         <a  class="btn btn-control bg-secondary" data-toggle="modal" data-target="" style="margin: auto;">
                                           <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                         </a>

                                         <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Files Added</a>
                                         <span class="sub-title">Add reference files to attract Alchemists!</span>

                                       </div>

                                     </div>
                                   </div>
                              @endif

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </td>
   <td class="align-top estimate bid2-miletone">
      <a href="javascript:;" class="paddingtop10 paddingbottom10 margin0 fontsize-12 fontweight-500 post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center">
      Alchemist Info</a>
      @include('template_part.profficicency', ['user' => $bid->user])
   </td>
   <td class="align-center align-top hp-option" align="center">
      @if($bid->shortlist)
         <a href="javascript:;" class="btn btn-smoke btn-sm remove-shortlist" data-id="{{$bid->id}}" style="background-color: #ff5e3a !important;font-weight: 400">SHORTLISTED
            <img src="svg-icons/JobCard/check-mark-white-on-black-circular-background.svg" width="12" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px"></a>
      @else
      <a href="javascript:;" class="btn btn-smoke btn-sm add-shortlist" data-id="{{$bid->id}}">SHORTLIST
         <img src="svg-icons/JobCard/plus-sign-in-a-black-circle.svg" width="12" hspace="1">
      </a>
      @endif
      <a href="javascript:;" class="btn btn-sm btn-border-think c-grey btn-transparent fontweight-500">SHORTLIST <span class="total_shortlist">{{$project->total_shortlist}}</span>/{{$project->max_shortlist}}</a>
   </td>
   <td class="add-event align-center comment-form-hp comment-form inline-items " style="vertical-align: top" align="center">
      @if($bid->project->status() != 'processing' && $bid->project->status() != 'completed' && $bid->project->status() != 'Waiting Accept')
         @if(Auth::user() && $bid->project->user->id == Auth::user()->id)
         <a style="padding-top: 8px;padding-bottom: 8px; font-weight:400;" data-toggle="modal" data-target="#edit-widget-twitter" href="javascript:;" class="btn btn-md-2 btn-blue-one hire_me" data-budget="{{$bid->price}}" data-work_time="{{$bid->work_time}}" data-bid_id="{{$bid->id}}">AWARD
           <img src="svg-icons/JobCard/check-mark-white-on-black-circular-background.svg" width="12" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px"></a>
         @endif
      @endif
      @if($bid->getStatus() == "awarding")
         @if(!$bid->author)
            <a style="padding-top: 8px;padding-bottom: 8px;font-weight:400;" href="javascript:;" class="btn btn-blue ">AWARDED
              <img src="svg-icons/JobCard/check-mark-white-on-black-circular-background.svg" width="12" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px">
            </a>
         @endif
         @if($user != null && $user->id == $bid->user->id)
            <a style="padding-top: 8px;padding-bottom: 8px;" href="javascript:;" data-id="{{$project->id}}" class="btn btn-blue btn-md-2 btn-icon-left btn_acceptawardbid">
              <i class="fa fa-check" aria-hidden="true"></i>ACCEPT
            </a>
         @endif
      @endif
      <a data-id="{{$bid->id}}" data-toggle="modal" data-target="#chatbox" href="javascript:;" class="shortlist_message btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#6F7CC3, #646FAB);font-weight: 500"><i class="fa fa-comments" aria-hidden="true"></i>Messages ({{$bid->messages->count()}})</a>
   </td>
</tr>
