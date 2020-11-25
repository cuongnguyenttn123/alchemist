    <tr>
      <td class="topic-date" colspan="2">{{$bid->created_at}}
      	<a href="javascript:;" class="reply-topic open_message" data-id="{{$bid->id}}">Reply ({{$bid->messages->count()}} Messages)</a>
      </td>
    </tr>
    <tr>
      <td class="author">
        <div class="author-thumb">
          {!!$bid->user->avatar_img!!}
        </div>
        <div class="author-content">
          <a href="{{$bid->user->permalink()}}" class="h6 author-name">{{$bid->user->full_name}}</a>
          <div class="country">Hong Kong, {{$bid->user->get_usermeta('district')}}</div>
          <p></p>
          @if($project->status() != 'processing' && $project->status() != 'completed' && $project->status() != 'Waiting Accept')
          @if($user != null && $auth_pj->id == $user->id)
            <a data-toggle="modal" data-target="#edit-widget-twitter" href="javascript:;"
               class="btn btn-primary btn-sm hire_me" data-budget="{{$bid->price}}"
               data-work_time="{{$bid->work_time}}" data-bid_id="{{$bid->id}}">Hire Me</a>
            <a href="javascript:;" class="btn btn-purple btn-sm open_message" data-id="{{$bid->id}}">Chat-Open ({{$bid->messages->count()}})</a>
          @endif
          @endif
          @if($bid->getStatus() == "awarding")
            <button class="btn btn-blue">Awarded</button>
            @if($user != null && $user->id == $bid->user->id)
            <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-blue btn-sm btn-icon-left btn_acceptawardbid">
              <i class="fa fa-check" aria-hidden="true"></i>ACCEPT
            </a>
            @endif
          @endif
          @if($bid->can_edit)
          <a href="javascript:;" data-id="{{$bid->id}}" class="btn btn-blue btn-sm btn-icon-left btn_editbid">EDIT</a>
          @endif
          @if($bid->getStatus() == "accepted" )
            <button class="btn btn-blue">Working</button>
          @endif
        </div>
      </td>
      <td class="posts">
        <div class="more">
          <div class="crumina-module crumina-heading with-title-decoration">
            <h4 class="heading-title">${{$bid->price}} USD | T2500 in {{$bid->work_time}} Days</h4>
          </div>
        </div>
        <p>{!!$bid->description!!}</p>

        <div role="tablist" aria-multiselectable="true">
          <div class="card">
             <div class="card-header" role="tab" id="headingOne">
                <h4 class="mb-0">
                   <a data-toggle="collapse" data-parent="#accordion" href="#bid-{{$bid->id}}" aria-expanded="true" aria-controls="bid-{{$bid->id}}"> + Project BID Details
                   </a>
                </h4>
             </div>
             <div id="bid-{{$bid->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-body inline-items">
                   <div class="col col-lg-12 col-sm-12 col-12  ml-auto">
                         <div class="crumina-module crumina-heading with-title-decoration">
                            <h6 class="heading-title">Alchemist Skill Level - Journeyman</h6>
                            <div class="friend-count" data-swiper-parallax="-500">
                               <a href="javascript:;" class="friend-count-item">
                                  <div class="h6">{{$bid->user->level}}</div>
                                  <div class="title">Level</div>
                               </a>
                               <a href="javascript:;" class="friend-count-item">
                                  <div class="h6">{{$bid->user->total_point()}}</div>
                                  <div class="title">Skill Points</div>
                               </a>
                               <a href="javascript:;" class="friend-count-item">
                                  <div class="h6">{{$bid->user->average_score}}</div>
                                  <div class="title">Rating</div>
                               </a>
                            </div>
                         </div>
                         <div class="crumina-module crumina-heading with-title-decoration">
                            <h6 class="heading-title">Project Cost Estimate/Bid</h6>
                         </div>
                         <div class="container">
                            <div class="row">
                               <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                  <ul class="order-totals-list">
                            			@foreach($bid->milestones as $ms)
                                       <li>
                                          {{$ms->title}}<span>${{$ms->price_bid}} in {{$ms->workday}} Days</span>
                                       </li>
                                       <div class="comment-content comment">
                                          {{$ms->description}}<br><br>
                                       </div>
                            			@endforeach
                                  </ul>
                               </div>
                               <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                  <div class="more">
                                     <div class="crumina-module crumina-heading with-title-decoration">
                                        <h4 class="heading-title"><strong>Fiat:</strong> ${{$bid->price}} USD</h4>
                                     </div>
                                  </div>
                               </div>
                               <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                  <div class="more">
                                     <div class="crumina-module crumina-heading with-title-decoration">
                                        <h4 class="heading-title"><strong>Tokens:</strong> T2500</h4>
                                     </div>
                                  </div>
                               </div>
                               <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                  <div class="more">
                                     <div class="crumina-module crumina-heading with-title-decoration">
                                        <h4 class="heading-title"><strong>Total Days:</strong> {{$bid->work_time}}</h4>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                   </div>
                   <div class="col col-lg-12 col-sm-12 col-12  ml-auto">
                         <div class="crumina-module crumina-heading with-title-decoration">
                            <h6 class="heading-title">Associated Files</h6>
                         </div>
                         <div class="container">
                            <div class="row">
                            	@if($media = $bid->media())
                               <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                  <div class="ui-block video-item">
                                      <img src="{{$media->url}}" alt="photo">
                                  </div>
                               </div>
                              @endif
                            </div>
                         </div>
                   </div>
                </div>
             </div>
          </div>
        </div>
      </td>
    </tr>
