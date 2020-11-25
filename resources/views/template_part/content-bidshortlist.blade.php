
<div class="ui-block">
   <!-- Post -->
   <div class="post-thumb">
      <a href="javascript:;" class="post-category bg-smoke full-width align-center">${{$bid->price}} (USD) | {{$bid->work_time}} Days</a>
   </div>
   <article class="hentry post">
      @include('template_part.part-infouser', ['user' => $bid->user] )
      <div class="hung-post-author post__author author vcard   inline-items">
         <a data-toggle="tooltip" data-placement="top" title="COMPLETED JOBS" href="javascript:;" class="post-add-icon inline-items">
            <img src="svg-icons/JobCard/check-list.svg" class="olymp-heart-icon">
            <span>{{$bid->user->total_jobs()}}</span>
         </a>
         <a data-toggle="tooltip" data-placement="top" title="REVIEWS" href="javascript:;" class="post-add-icon inline-items">
            <img src="svg-icons/JobCard/star-icon.svg" class="olymp-heart-icon">
            <span>{{$bid->user->reviews->count()}}</span>
         </a>
         <a data-toggle="tooltip" data-placement="top" title="ALCHEMIST SKILL POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
            <img src="svg-icons/JobCard/trophy.svg" class="olymp-heart-icon">
            <span>SBP | LV {{$bid->user->level}}</span>
         </a>
         <a data-toggle="tooltip" data-placement="top" title="REPUTAION POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
            <img src="svg-icons/JobCard/loudspeaker.svg" class="olymp-heart-icon">
            <span>RP | LV {{$bid->user->rp_level}}</span>
         </a>
      </div>
   </article>
   <div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12  no-margin no-padding">
      <div class="hung-ui-block ui-block">
         <!-- Your Profile  -->
         <div class="your-profile">
            @include('template_part.profficicency', ['user' => $bid->user])
            <div id="accordion-xx" role="tablist" aria-multiselectable="true">
               <div class="card">
                  <div class="hung-card-header card-header" role="tab" id="headingOne-20">
                     <h6 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#list_ms-{{$bid->id}}" aria-expanded="true" aria-controls="collapseOne">
                           <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1">
                           <span>Milestones</span>
                           <svg class="olymp-dropdown-arrow-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                           </svg>
                        </a>
                     </h6>
                  </div>
                  <div id="list_ms-{{$bid->id}}" class="hung-collapse collapse" role="tabpanel" aria-labelledby="headingOne-20">
                     <div id="accordion-xxx" role="tablist" aria-multiselectable="true">
                        <div class="ui-block" data-mh="pie-chart">
                           <div class="today-events calendar">
                              <div class="list">
                                 <div id="accordion-3" role="tablist" aria-multiselectable="true" class="day-event">
                                    @foreach($bid->milestones as $ms)
                                    <div class="card">
                                       <div class="card-header" role="tab" id="headingOne-3">
                                          <div class="event-time">
                                             <time class="published">{{$ms->title}}</time>
                                          </div>
                                          <h5 class="mb-0 title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#ms-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne">
                                             <span>{{$ms->title}} | {{$ms->percent_payment}}% | ${{$ms->price}} USD</span><i class="fa fa-angle-down" aria-hidden="true"></i>
                                             </a>
                                          </h5>
                                       </div>
                                       <div id="ms-{{$ms->id}}" class="collapse collapse-body" role="tabpanel" aria-labelledby="headingOne">
                                          <div class="card-body">{{$ms->description}}</div>
                                          <div class="skills-item">
                                             <span><img src="svg-icons/JobCard/timer.svg" width="18" hspace="1">Duration</span>
                                             <span class="time-duraton">{{$ms->workday}} Days</span>
                                          </div>
                                          <div class="skills-item estimate-hp">
                                             <span><img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1">Estimate</span>
                                             <span class="estimate-price">${{$ms->price}} USD</span>
                                          </div>
                                       </div>
                                    </div>
                                    @endforeach
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="accordion" class="support-file-hp" role="tablist" aria-multiselectable="true">
                        <div class="card">
                           <div class="card-header" role="tab" id="headingOne">
                              <h6 class="mb-0">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#list_files-{{$bid->id}}" aria-expanded="true" aria-controls="collapseOne">
                                    <img src="svg-icons/JobCard/download.svg" width="15" hspace="1">
                                    <span>Support Files</span>
                                    <svg class="olymp-dropdown-arrow-icon c-white">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                    </svg>
                                 </a>
                              </h6>
                           </div>
                           <div id="list_files-{{$bid->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne" >
                              <div class="ui-block">
                                 <table style="width: 100%;" class="shop_table cart">
                                    <thead>
                                       <tr>
                                          <th style="width: 70%;padding-top: 10px; padding-bottom: 10px;" class="product-thumbnail">ITEM DESCRIPTION</th>
                                          <th style="width: 30%;" class="product-subtotal">DOWNLOAD</th>
                                       </tr>
                                    </thead>
                                    <tbody class="alldownload">
                                       @if($files = $bid->files())
                                          @foreach($files as $file)
                                             <tr class="cart_item" style="margin: 15px 0;border-bottom: 1px solid #e6ecf5;">
                                                <td class="product-thumbnail" style="padding-top: 10px; padding-bottom: 10px;">
                                                   <div class="forum-item">
                                                     <div class="content">
                                                         <a href="{{$file->url}}" data-name="{{$file->ori_name}}" class="my-files paddingbottom5 fontsize-13 fontweight-500 h6 title">
                                                            <span class="color-2">{{$file->name}}</span>
                                                         </a>
                                                         <div class="post__date">
                                                           <time class="published">{{$file->extension}} File </time>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </td>
                                                <td style="text-align: center;" class="product-subtotal">
                                                   <a href="{{$file->url}}" class="product-del remove" title="Remove this item" download>
                                                      <img src="img/inbox.svg" class="olymp-close-icon">
                                                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>

                                                   </a>
                                                </td>
                                             </tr>
                                          @endforeach
                                       @endif
                                       <tr>
                                          <td colspan="4" class="actions" style="padding-top: 10px;">
                                             <a style="width: 100%;" data-toggle="modal" data-target="#" href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left dowload-hp"><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
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
         </div>
         <!-- ... end Your Profile  -->
      </div>
   </div>
   <div class="comment-form-hp comment-form inline-items align-left">
      @if($bid->can_edit)
         <a href="javascript:;" data-id="{{$bid->id}}" class="btn btn-blue btn-sm btn-icon-left btn_editbid">EDIT</a>
      @endif
      @if($bid->project->status() != 'processing' && $bid->project->status() != 'completed' && $bid->project->status() != 'Waiting Accept')
         @if(Auth::user() && $bid->project->user->id == Auth::user()->id)
         <a style="padding-top: 8px;padding-bottom: 8px;" data-toggle="modal" data-target="#edit-widget-twitter" href="javascript:;" class="btn btn-md-2 btn-blue hire_me" data-budget="{{$bid->price}}" data-work_time="{{$bid->work_time}}" data-bid_id="{{$bid->id}}">AWARD</a>
         @endif
      @endif
      @if($bid->getStatus() == "awarding")
         @if(!$bid->author)
            <button type="button" class="btn btn-blue">Awarded</button>
         @endif
         @if($user != null && $user->id == $bid->user->id)
            <a style="padding-top: 8px;padding-bottom: 8px;" href="javascript:;" data-id="{{$project->id}}" class="btn btn-blue btn-md-2 btn-icon-left btn_acceptawardbid">
              <i class="fa fa-check" aria-hidden="true"></i>ACCEPT
            </a>
         @endif
      @endif
      <a href="javascript:;" data-id="{{$bid->id}}" class="shortlist_message btn btn-md-2 btn-border-think c-grey btn-transparent " ><i class="fa fa-comments" aria-hidden="true"></i>({{$bid->messages->count()}} NEW)</a>
   </div>
   <!-- .. end Post -->
</div>
