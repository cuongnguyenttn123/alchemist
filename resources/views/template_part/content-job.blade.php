		<div class="ui-block">
         <!-- Post -->
         <div class="news-feed-form">
            <div class="ui-block-title">
               <h6 class="title">Job: {{$project->name}}</h6>
               <a href="{{$project->permalink()}}" class="more">
                  <svg class="olymp-three-dots-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                  </svg>
               </a>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active inline-items" data-toggle="tab" href="#milestones{{$project->id}}" role="tab" aria-expanded="true">
                     <svg class="olymp-status-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                     </svg>
                     <span>Job Desciption</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link inline-items" data-toggle="tab" href="#messages{{$project->id}}" role="tab" aria-expanded="false">
                     <svg class="olymp-multimedia-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                     </svg>
                     <span>Details</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link inline-items" data-toggle="tab" href="#sharedfiles{{$project->id}}" role="tab" aria-expanded="false">
                     <svg class="olymp-blog-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use>
                     </svg>
                     <span>Shared Files</span>
                  </a>
               </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
               <div class="tab-pane active" id="milestones{{$project->id}}" role="tabpanel" aria-expanded="true">
                  <article class="hentry post has-post-thumbnail thumb-full-width">
                     <div class="post__author author vcard inline-items">
                        <img src="img/coding.svg" alt="author">
                        <div class="author-date">
                           <a href="{{$project->permalink()}}" class="h6 post__author-name fn">Job: {{$project->name}}<span class="tag-label bg-green">GUARANTEED FULL PAYMENT</span></a>
                           <div class="post__date">
                              <time class="published" datetime=""> {{$project->day_left}} Days Left</time>
                           </div>
                        </div>
                        <div class="more">
                           <div class="crumina-module crumina-heading with-title-decoration">
                              <h4 class="heading-title">${{$project->budget}} USD</h4>
                           </div>
                        </div>
                     </div>
                     <div class="comment-entry comment comments__article">
                        <div class="comments__body ovh">
                           <ul class="rait-stars">
                              <?php
                                $rating_sum = $project->user->average_score;
                                $star_s = round($rating_sum*2)/2*10;
                              ?>
                              <li><span class="rating-static rating-{{$star_s}}"></span></li>
                              <li class="numerical-rating">{{$project->user->average_score}} / 5 Rating <a href="{{$project->user->permalink()}}" rel="external" class=" ">{{$project->user->full_name}}</a>
                           </ul>
                           <div class="comment-content comment">
                              {{$project->short_description}}
                              <br><br>
                           </div>
                           <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                              @foreach($project->categories as $cat)
                              <a class="btn btn-secondary" href="{{$cat->permalink()}}">{{$cat->name}}</a>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </article>
               </div>
               <div class="tab-pane" id="messages{{$project->id}}" role="tabpanel" aria-expanded="true">
                  <div class="ui-block-title">
                     <h6 class="title">Details & Estimates</h6>
                     <a href="javascript:;" class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </a>
                  </div>
                  <div class="container">
                     <p></p>
                     <br>
                     <div class="row">
                        <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                           <div class="ui-block">
                              <div class="birthday-item inline-items">
                                 <div class="forum-item">
                                    @if($ava = $project->user->avatar)
                                       <img width="25" src="{{$ava}}">
                                    @else
                                       <img src="img/forum8.png" alt="forum" width="25">
                                    @endif
                                    <div class="monthly-count" style="font-size: 12px">
                                       {{$project->user->full_name}}
                                       <span class="period" style="font-size: 11px">Seeker</span>
                                    </div>
                                 </div>
                                 <a href="{{$project->user->permalink()}}" class="btn btn-sm bg-blue">View</a>
                              </div>
                           </div>
                           <div class="ui-block">
                              <!-- Birthday Item -->
                              <div class="ui-block-title" >
                                 <div class="h6 title" style="color: #888DA8">Project Earnings <span class="" style="color: #5C5C5C" > | Total Gains</span></div>
                              </div>
                              <div class="birthday-item inline-items">
                                 <img src="img/AlchemFiatCoin.svg" width="18" hspace="3" style="PADDING-BOTTOM: 0px">
                                 <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">$10,000</span> <img src="img/AlchemToken.svg" width="18" hspace="3" style="PADDING-BOTTOM: 0px">
                                 <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Alchem Coin">20,500</span> 
                                 <img src="img/AlchemSBP.svg" width="18" hspace="3" style="PADDING-BOTTOM: 0px">
                                 <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Skill Based Pts">200</span> 
                              </div>
                              <!-- ... end Birthday Item -->
                           </div>
                        </div>
                        <div class="col col-xl-8 order-xl-8 col-lg-12 order-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="ui-block">
                              <!-- Your Profile  -->
                              <div class="your-profile">
                                 <div class="ui-block-title ui-block-title-small">
                                    <h6 class="h6 title">Milestone Settings</h6>
                                 </div>
                                 <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                       <div class="card-header" role="tab" id="headingOne">
                                          <p class="mb-0">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne{{$project->id}}" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                                                Seeker Tasks & Estimates
                                                <svg class="olymp-dropdown-arrow-icon">
                                                   <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                             </a>
                                          </p>
                                       </div>
                                       <div id="collapseOne{{$project->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                          <!-- Forums Table -->
                                          <ul class="your-profile-menu">
                                             <ul class="order-totals-list">
                                                @foreach($project->milestone as $ms)
                                                <li>{{$ms->title}} <span>${{$ms->price()}}  in 2 Days</span></li>
                                                <div class="comment-content comment">
                                                   {!!$ms->content!!}
                                                   <br><br>
                                                   <img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">$10,000</span> <img src="img/AlchemToken.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">20,500</span> <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">3 Days</span>
                                                   <li><span></span> </li>
                                                </div>
                                                @endforeach
                                             </ul>
                                          </ul>
                                          <!-- ... end Forums Table -->
                                       </div>
                                    </div>
                                 </div>
                                 <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                       <div class="card-header" role="tab" id="headingOne">
                                          <p class="mb-0">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo{{$project->id}}" aria-expanded="true" aria-controls="collapseTwo" class="collapsed">
                                                Project Details
                                                <svg class="olymp-dropdown-arrow-icon">
                                                   <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                             </a>
                                          </p>
                                       </div>
                                       <div id="collapseTwo{{$project->id}}" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                          <!-- Forums Table -->
                                          <div class="single-post-additional inline-items" style="margin-bottom: -30px">
                                             <div class="post__author author vcard inline-items">
                                                <img src="img/day-and-night.svg" alt="author" width="150" class="avatar">
                                                <div class="author-date not-uppercase">
                                                   <a class="h6 post__author-name fn" href="javascript:;">09 Days</a>
                                                   <div class="author_prof">
                                                      Total Days
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="post__author author vcard inline-items">
                                                <img src="img/calendar.svg" alt="author" width="150" class="avatar">
                                                <div class="author-date not-uppercase">
                                                   <a class="h6 post__author-name fn" href="javascript:;">Mon 08 Dec</a>
                                                   <div class="author_prof">
                                                      Project Posted
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="post__author author vcard inline-items">
                                                <img src="img/time-passing.svg" alt="author" width="150" class="avatar">
                                                <div class="author-date not-uppercase">
                                                   <a class="h6 post__author-name fn" href="javascript:;">06 Days</a>
                                                   <div class="author_prof">
                                                      Bidding Closes
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <ul class="your-profile-menu">
                                             <ul class="order-totals-list">
                                                <li>
                                                   <span></span>
                                                </li>
                                                <li> <span>Project Total Earnings</span> </li>
                                                <img src="img/AlchemFiatCoin.svg" width="20" hspace="3" style="PADDING-BOTTOM: 3px">
                                                <span class="ui-block-title-small" style="margin-right: 8px">$10,000</span> <img src="img/AlchemToken.svg" width="20" hspace="3" style="PADDING-BOTTOM: 3px">
                                                <span class="ui-block-title-small" style="margin-right: 8px">20,500</span>
                                                <img src="img/AlchemSBP.svg" width="18" hspace="3" style="PADDING-BOTTOM: 0px">
                                                <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Skill Based Pts">200</span> 
                                                <img src="img/recommended.svg" width="18" hspace="3" style="PADDING-BOTTOM: 0px">
                                                <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="REPUTATION PTS">200</span> 
                                                <div class="comment-content comment">
                                                   <li>
                                                      <span></span>
                                                   </li>
                                                   <div class="title h6">Alchemist Skill Level Welcome to Bid</div>
                                                   <br>
                                                </div>
                                                <div class="post__author author vcard inline-items">
                                                   @foreach($alchemist_title as $title)
                                                   <div class="checkbox">
                                                      <label><input type="checkbox" name="" disabled @if($project->check_title($title->id)) {{"checked"}} @endif>{{$title->name}}</label>
                                                   </div>
                                                   @endforeach
                                                </div>
                                             </ul>
                                          </ul>
                                          <!-- ... end Forums Table -->
                                       </div>
                                    </div>
                                 </div>
                                 <div class="ui-block-content">
                                    <div class="skills-item">
                                       <div class="skills-item-info"><span class="skills-item-title"><strong>Days Left</strong> > 06 Days Left to Bid</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span><span class="units">70%</span></span></div>
                                       <div class="skills-item-meter" style="height: 5px">
                                          <span class="skills-item-meter-active bg-blue" style="width: 70%; height: 20px" ></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card"> </div>
                                 </div>
                              </div>
                              <!-- ... end Your Profile  -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="sharedfiles{{$project->id}}" role="tabpanel" aria-expanded="true">
                  <div class="ui-block-title">
                     <h6 class="title">Project Shared Files</h6>
                     <a href="javascript:;" class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </a>
                  </div>
                  <div class="col col-xl-12 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
                     <form action="#" method="post" class="cart-main" style="padding-left: ">
                        <!-- Shop Table Cart -->
                        <table class="shop_table cart">
                           <thead>
                              <tr>
                                 <td colspan="4" class="actions">
                                    <a data-toggle="modal" data-target="#" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #90CB1E; margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>    <a href="javascript:;" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left" ><i class="fa fa-check-circle" aria-hidden="true"  ></i>DOWNLOAD SELECTED</a>
                                 </td>
                              </tr>
                              <tr>
                                 <th class="product-thumbnail">ITEM DESCRIPTION</th>
                                 <th class="product-price">UPLOADER</th>
                                 <th class="product-quantity">DATE UPLOADED</th>
                                 <th class="product-subtotal">DOWNLOAD</th>
                                 <th class="product-remove">MULTI SELECT</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($project->attachments as $attachment )
                              <tr class="cart_item">
                                 <td class="product-thumbnail">
                                    <div class="forum-item">
                                       <img src="img/3.jpg" alt="forum" width="40">
                                       <div class="content">
                                          <a href="javascript:;" class="h6 title">{{$attachment->name}}</a>
                                          <div class="post__date">
                                             <time class="published" datetime="2017-03-24T18:18">{{$attachment->extension}} File </time>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="product-price">
                                    <div class="author-freshness">
                                       <a href="javascript:;" class="h6 title">{{$attachment->user->full_name}}</a>
                                    </div>
                                 </td>
                                 <td class="product-quantity">
                                    <P class="price amount">{{$attachment->created_at}}</P>
                                    <time class="entry-date updated">13 Days, 58 mins ago</time>
                                 </td>
                                 <td class="product-subtotal">
                                    <a href="{{$attachment->link}}" class="product-del remove" title="Download this item">
                                       <img src="img/inbox.svg" class="olymp-close-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="product-remove">
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="itemdownload" checked>
                                       </label>
                                    </div>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <!-- ... end Shop Table Cart -->
                     </form>
                  </div>
               </div>
               <div class="post-additional-info inline-items">
                  <a href="javascript:;" class="post-add-icon inline-items">
                     <img src="svg-icons/sprites/profile.svg" class="olymp-heart-icon" data-toggle="tooltip" data-placement="top" data-original-title="ALCHEMIST BIDS" />
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                     <span>{{$total_bids = $project->bids->count()}}</span>
                  </a>
                  <ul class="friends-harmonic">
                     @foreach($project->takeBids(5) as $bid)
                     <?php $name_bid[] = $bid->user->full_name;?>
                     <li><a href="javascript:;">{!!$bid->user->avatar_img!!}</a></li>
                     @endforeach
                     @if($total_bids > 5)
                     <li><a href="javascript:;" class="all-users">+{{$total_bids-5}}</a></li>
                     @endif
                  </ul>
                  <div class="names-people-likes">
                     @if($total_bids > 0)
                     {{implode(', ', array_slice($name_bid, 0 , 2)) ?? ''}}
                     @if($total_bids > 2)and<br> {{$total_bids-2}} more @endif applied to this project
                     @endif
                  </div>
                  <div class="comments-shared">
                     <a href="javascript:;" class="post-add-icon inline-items">
                        <svg class="olymp-share-icon" data-toggle="tooltip" data-placement="top"   data-original-title="SAHRE AMOUNT">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                        </svg>
                        <span>0</span>
                     </a>
                  </div>
               </div>
               <div class="add-options-message">
                  <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="SAVE PROJECT">
                     <svg class="olymp-heart-icon" data-toggle="modal" data-target="#">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                     </svg>
                  </a>
                  <a href="javascript:;" class="options-message" data-toggle= "modal" data-target="#create-friend-group-add-friends" data-original-title="TAG YOUR CONTACTS">
                     <svg class="olymp-computer-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                     </svg>
                  </a>
                  <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="SHARE PROJECT">
                     <svg class="olymp-small-share-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                     </svg>
                  </a>
                  @if($project->user->id == Auth::id())
                  <a href="{{route('profile.editproject', $project->id)}}" class="btn btn-md-2 float-right" style="background-color: #90CB1E">Edit</a>
                  {{-- <a href="{{route('profile.deleteproject', $project->id)}}" class="btn btn-md-2 float-right" style="background-color: #90CB1E">Delete</a> --}}
                  @else
                  <a href="{{$project->permalink()}}" class="btn btn-md-2 float-right"  style="background-color: #90CB1E">APPLY TO JOB</a>
                  @endif
                  <a href="{{$project->permalink()}}" class="btn btn-md-2 btn-border-think btn-transparent c-grey float-right">FULL DETAILS</a>
               </div>
            </div>
         </div>
         <!-- .. end Post -->
      </div>