@extends('myprofile.master')
@section('title')
Manage Projects
@endsection
@if(Auth::id())
@section('profile_content')


      <div class="ui-block">
         <!-- News Feed Form  -->
         <div class="news-feed-form">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active inline-items" data-toggle="tab" href="#milestones" role="tab" aria-expanded="true">
                     <svg class="olymp-status-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                     </svg>
                     <span>Milestones</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link inline-items" data-toggle="tab" href="#messages" role="tab" aria-expanded="false">
                     <svg class="olymp-chat---messages-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                     </svg>
                     <span>Messages</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link inline-items" data-toggle="tab" href="#sharedfiles" role="tab" aria-expanded="false">
                     <svg class="olymp-share-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                     </svg>
                     <span>Shared Files</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link inline-items" data-toggle="tab" href="#upload" role="tab" aria-expanded="false">
                     <svg class="olymp-plus-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                     </svg>
                     <span>Upload Panel</span>
                  </a>
               </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
               <div class="tab-pane active" id="milestones" role="tabpanel" aria-expanded="true">
                  <div class="ui-block-title">
                     <div class="post__author author vcard inline-items">
                        <img src="img/coding.svg" alt="author">
                        <div class="author-date">
                           <a class="h6 post__author-name fn" href="javascript:;">{{$project->name}}<span class="tag-label bg-green">GUARANTEED FULL PAYMENT</span></a>
                           <div class="post__date">
                              <time class="published" datetime="2017-03-24T18:18"> 6 Days Left- Verified Payment </time>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container">
                     <p></p>
                     <br>
                     <div class="row">
                        <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                           <div class="ui-block">
                              <div class="birthday-item inline-items">
                                 <div class="forum-item">
                                    @if($ava = $project->user->avatar())
                                       <img src="{{$ava}}" width="25">
                                    @else
                                       <img class="" src="img/badge11.png" width="25">
                                    @endif
                                    <div class="monthly-count" style="font-size: 12px">{{$project->user->full_name}}<span class="period" style="font-size: 11px">{{$project->user->role->first()->name}}</span></div>
                                 </div>
                                 <a href="{{$project->user->permalink()}}" class="btn btn-sm bg-blue">View</a>
                              </div>
                           </div>
                           <div class="ui-block">
                              <div class="ui-block-title" >
                                 <div class="h6 title" style="color: #888DA8">Project Earnings <span class="" style="color: #5C5C5C" > | Total Gains</span></div>
                              </div>
                              <div class="birthday-item inline-items">
                                 <img src="img/AlchemFiatCoin.svg" width="18" hspace="3" style="PADDING-BOTTOM: 0px">
                                 <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency">${{$project->budget}}</span> <img src="img/AlchemToken.svg" width="18" hspace="3" style="PADDING-BOTTOM: 0px">
                                 <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Alchem Coin">20,500</span>
                                 <img src="img/AlchemSBP.svg" width="18" hspace="3" style="PADDING-BOTTOM: 0px">
                                 <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Skill Based Pts">2,000</span>
                              </div>
                           </div>
                        </div>
                        <div class="col col-xl-8 order-xl-8 col-lg-12 order-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="ui-block">
                              <div class="your-profile">
                                 <div class="ui-block-title ui-block-title-small">
                                    <h6 class="h6 title">Milestone Settings</h6>
                                 </div>
                                 <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card">
                                       <div class="card-header" role="tab" id="headingOne">
                                          <p class="mb-0">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="collapsed">
                                                Agreed Project Tasks
                                                <svg class="olymp-dropdown-arrow-icon">
                                                   <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                             </a>
                                          </p>
                                       </div>
                                       <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                          <!-- Forums Table -->
                                          <ul class="your-profile-menu">
                                             <ul class="order-totals-list">
                                                <br>
                                                <li> Website Design <span>$10,000</span> </li>
                                                <div class="comment-content comment">
                                                   Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                   fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                   sequi nesciunt. Sed ut perspiciatis unde omnis iste natus error sit
                                                   voluptatem accusantium ntium, totam rem aperiam, eaque ipsa quae ab illo
                                                   inventore veritatis et quasi architecto.<br><br><img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">$10,000</span> <img src="img/AlchemToken.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">20,500</span> <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">3 Days</span>
                                                   <li><span></span> </li>
                                                </div>
                                                <li>
                                                   Crypto wallet  <span>$400</span>
                                                </li>
                                                <div class="comment-content comment">
                                                   Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                   fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                   sequi nesciunt. Sed ut perspiciatis unde omnis iste natus error sit
                                                   voluptatem accusantium ntium, totam rem aperiam, eaque ipsa quae ab illo
                                                   inventore veritatis et quasi architecto.<br><br><img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">$10,000</span> <img src="img/AlchemToken.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">20,500</span> <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">3 Days</span>
                                                   <li><span></span> </li>
                                                </div>
                                                <li>
                                                   Graphic Design <span>$100</span>
                                                </li>
                                                <div class="comment-content comment">
                                                   Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                   fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                   sequi nesciunt. Sed ut perspiciatis unde omnis iste natus error sit
                                                   voluptatem accusantium ntium, totam rem aperiam, eaque ipsa quae ab illo
                                                   inventore veritatis et quasi architecto.<br><br><img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">$10,000</span> <img src="img/AlchemToken.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">20,500</span> <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">3 Days</span>
                                                   <li><span></span> </li>
                                                </div>
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
                                             <a data-toggle="collapse" data-parent="#accordion" href="#project_contract" aria-expanded="true" aria-controls="project_contract" class="collapsed">
                                                Project Contract
                                                <svg class="olymp-dropdown-arrow-icon">
                                                   <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                </svg>
                                             </a>
                                          </p>
                                       </div>
                                       <div id="project_contract" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                          <!-- Forums Table -->
                                          <div class="single-post-additional inline-items" style="margin-bottom: -30px">
                                             <div class="post__author author vcard inline-items">
                                                <img src="img/day-and-night.svg" alt="author" width="150" class="avatar">
                                                <div class="author-date not-uppercase">
                                                   <a class="h6 post__author-name fn" href="#">09 Days</a>
                                                   <div class="author_prof">
                                                      Project Duration
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="post__author author vcard inline-items">
                                                <img src="img/calendar.svg" alt="author" width="150" class="avatar">
                                                <div class="author-date not-uppercase">
                                                   <a class="h6 post__author-name fn" href="#">Mon 08 Dec</a>
                                                   <div class="author_prof">
                                                      Due Date
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="post__author author vcard inline-items">
                                                <img src="img/time-passing.svg" alt="author" width="150" class="avatar">
                                                <div class="author-date not-uppercase">
                                                   <a class="h6 post__author-name fn" href="#">13:30pm</a>
                                                   <div class="author_prof">
                                                      Delivery Time
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <ul class="your-profile-menu">
                                             <ul class="order-totals-list">
                                                <li>
                                                   <span></span>
                                                </li>
                                                <li> <span>Seeker Contract</span><span>Not Signed</span> </li>
                                                <div class="comment-content comment">
                                                   Legal and Binding Agreement. This Agreement is legal and binding between the Parties as stated in our <a data-toggle="modal" data-target="#faqs-popup" href="#">contract terms.</a> The Parties each represent that they have the authority to enter into this Agreement.
                                                   The Parties agree to the terms and conditions set forth above as demonstrated by their signatures as follows:<br>
                                                   <li>
                                                      <span></span>
                                                   </li>
                                                   <div class="title h6">Payment Option Totals</div>
                                                   <br>
                                                   <img src="img/AlchemFiatCoin.svg" width="20" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">$10,000</span> <img src="img/AlchemToken.svg" width="20" hspace="3" style="PADDING-BOTTOM: 3px">
                                                   <span class="ui-block-title-small" style="margin-right: 8px">20,500</span>
                                                   <li>
                                                      <span></span>
                                                   </li>
                                                   <div class="row">
                                                      <div class="col col-lg-12  col-md-12
                                                         col-sm-12 col-12">
                                                         <div class="tab-content">
                                                            <div class="tab-pane active" id="home1" role="tabpanel" data-mh="log-tab">
                                                               <div class="title h6">Project Hire Agreement * E-Signature Required</div>
                                                               <form class="content">
                                                                  <div class="row">
                                                                     <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                        <br>
                                                                        <label class="control-label">Seeker Name</label>
                                                                        <div class="form-group label-floating is-empty">
                                                                           <label class="control-label">Your Name</label>
                                                                           <input class="form-control" placeholder="" type="text">
                                                                        </div>
                                                                     </div>
                                                                     <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                                        <br>
                                                                        <label class="control-label">Business Name</label>
                                                                        <div class="form-group label-floating is-empty">
                                                                           <label class="control-label">Business Name</label>
                                                                           <input class="form-control" placeholder="" type="text">
                                                                        </div>
                                                                     </div>
                                                                     <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                        <br>
                                                                        <label class="control-label">Alchemunity ID</label>
                                                                        <div class="form-group label-floating is-empty">
                                                                           <label class="control-label">Enter ID Name</label>
                                                                           <input class="form-control" placeholder="" type="email">
                                                                        </div>
                                                                        <br>
                                                                        <label class="control-label">Alchemuntiy Signature ID</label>
                                                                        <div class="form-group label-floating is-empty">
                                                                           <label class="control-label">Enter Signature ID Key</label>
                                                                           <input class="form-control" placeholder="" type="password">
                                                                        </div>
                                                                        <br>
                                                                        <label class="control-label">Contract Signature Date</label>
                                                                        <div class="form-group date-time-picker label-floating">
                                                                           <label class="control-label">Date of Signature</label>
                                                                           <input name="datetimepicker" value="11/28/2018" />
                                                                           <span class="input-group-addon">
                                                                              <svg class="olymp-calendar-icon">
                                                                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use>
                                                                              </svg>
                                                                           </span>
                                                                        </div>
                                                                        <br>
                                                                        <div class="remember">
                                                                           <div class="checkbox">
                                                                              <label>
                                                                              <input name="optionsCheckboxes" type="checkbox">
                                                                              I accept the <a href="#">Terms and Conditions</a> of the website
                                                                              </label>
                                                                           </div>
                                                                        </div>
                                                                        <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #90CB1E; width: 50%" ><i class="fa fa-unlock" aria-hidden="true" ></i>SIGN CONTRACT</a> <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #828282; width: 49%" ><i class="fa fa-lock" aria-hidden="true" ></i>ALCHEMIST (SIGNED)</a>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                            </div>
                                                            <div class="tab-pane" id="profile1" role="tabpanel" data-mh="log-tab">
                                                               <div class="title h6">Login to your Account</div>
                                                               <form class="content">
                                                                  <div class="row">
                                                                     <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                        <div class="form-group label-floating is-empty">
                                                                           <label class="control-label">Your Email</label>
                                                                           <input class="form-control" placeholder="" type="email">
                                                                        </div>
                                                                        <div class="form-group label-floating is-empty">
                                                                           <label class="control-label">Your Password</label>
                                                                           <input class="form-control" placeholder="" type="password">
                                                                        </div>
                                                                        <div class="remember">
                                                                           <div class="checkbox">
                                                                              <label>
                                                                              <input name="optionsCheckboxes" type="checkbox">
                                                                              Remember Me
                                                                              </label>
                                                                           </div>
                                                                           <a href="#" class="forgot">Forgot my Password</a>
                                                                        </div>
                                                                        <a href="#" class="btn btn-lg btn-primary full-width">Login</a>
                                                                        <div class="or"></div>
                                                                        <a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a>
                                                                        <a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login with Twitter</a>
                                                                        <p>Don’t you have an account?
                                                                           <a href="#">Register Now!</a> it’s really simple and you can start enjoing all the benefits!
                                                                        </p>
                                                                     </div>
                                                                  </div>
                                                               </form>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <li>
                                                         <span></span>
                                                      </li>
                                                      <p></p>
                                                   </div>
                                                </div>
                                                <div class="comment-content comment">
                                                   Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                                   fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                                   sequi nesciunt. Sed ut perspiciatis unde omnis iste natus error sit
                                                   voluptatem accusantium ntium, totam rem aperiam, eaque ipsa quae ab illo
                                                   inventore veritatis et quasi architecto.<br><br>
                                                </div>
                                             </ul>
                                          </ul>
                                          <!-- ... end Forums Table -->
                                       </div>
                                    </div>
                                 </div>
                                 <div class="ui-block-content">
                                    <div class="skills-item">
                                       <div class="skills-item-info"><span class="skills-item-title"><strong>Overall Progress</strong> &gt; Milestone 03 &gt; Day 6 / 9</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span><span class="units">70%</span></span></div>
                                       <div class="skills-item-meter" style="height: 5px">
                                          <span class="skills-item-meter-active bg-yellow" style="width: 70%; height: 20px" ></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="card"> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <?php
                           $is_seeker = $user->isSeeker();
                           $is_alchemist = $user->isAlchemist();
                        ?>
                        @foreach($project->agreed_ms() as $ms)
                        <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                           <div class="ui-block" >
                              <div class="ui-block-title" >
                                 <div class="h6 title" style="color: #90CB1E">{{$ms->title}} <span class="" style="color: #5C5C5C" >| {{$ms->percent_payment}}% of project total</span>
                                 </div>
                              </div>
                              <div class="ui-block-content">
                                 <div class="skills-item">
                                    <div class="skills-item-info"><span class="skills-item-title">Progress | 1-3 Days / 9 Days</span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="100" data-from="0"></span><span class="units">100%</span></span></div>
                                    <div class="skills-item-meter">
                                       <span class="skills-item-meter-active bg-green" style="width: 100% ; height: 10px "></span>
                                    </div>
                                 </div>
                                 <img src="img/AlchemFiatCoin.svg" width="18" hspace="3" style="PADDING-BOTTOM: 3px">
                                 <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency (20%)">$10,000</span>
                                 <img src="img/AlchemToken.svg" width="18" hspace="3" style="PADDING-BOTTOM: 3px">
                                 <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Alchem Coin (20%)">20,500</span> <br><br>
                                 <div class="ui-block">
                                    <!-- Your Profile  -->
                                    <div class="your-profile">
                                       <div class="ui-block-title ui-block-title-small">
                                          <h6 class="h6 title">Milestone </h6>
                                       </div>
                                       <div id="accordion" role="tablist" aria-multiselectable="true">
                                          <div class="card">
                                             <div class="card-header" role="tab" id="headingOne">
                                                <p class="mb-0">
                                                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne-{{$ms->id}}" class="collapsed">
                                                      Payment Option
                                                      <svg class="olymp-dropdown-arrow-icon">
                                                         <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                      </svg>
                                                   </a>
                                                </p>
                                             </div>
                                             <div id="collapseOne-{{$ms->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$ms->id}}">
                                                <br>
                                                <ul class="your-profile-menu">
                                                   <div>
                                                      <ul class="payment-methods-list">
                                                         <li>
                                                            <div class="radio" style="margin-bottom: 2px">
                                                               <label>
                                                               <input type="radio" name="optionsRadios" checked>
                                                               Alchemunity Tokens
                                                               </label>
                                                            </div>
                                                            <img src="img/wallet.svg" width="18" hspace="3" style="PADDING-BOTTOM: 3px; margin-left: 25px">
                                                            <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency (20%)">10,000</span>
                                                            <img src="img/AlchemToken.svg" width="18" hspace="3" style="PADDING-BOTTOM: 3px">
                                                            <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Alchem Coin (20%)">20,500</span>
                                                         </li>
                                                         <li>
                                                            <div class="radio" style="margin-bottom: 2px; margin-top: 10px">
                                                               <label>
                                                               <input type="radio" name="optionsRadios" checked>
                                                               Currency (USD)
                                                               </label>
                                                            </div>
                                                            <img src="img/wallet.svg" width="18" hspace="3" style="PADDING-BOTTOM: 3px; margin-left: 25px">
                                                            <span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Fiat Currency (20%)">$10,000</span>
                                                            <img src="img/AlchemFiatCoin.svg" width="18" hspace="3" style="PADDING-BOTTOM: 3px"> 5,000<span class="ui-block-title-small" style="margin-right: 8px" data-toggle="tooltip" data-placement="top" title="Alchem Coin (20%)"></span>
                                                         </li>
                                                         <li>
                                                            <div class="radio" style=" margin-top: 10px">
                                                               <label>
                                                               <input type="radio" name="optionsRadios">
                                                               Stripe Gateway
                                                               </label>
                                                            </div>
                                                         </li>
                                                         <li>
                                                            <div class="radio" style=" margin-top: -10px">
                                                               <label>
                                                               <input type="radio" name="optionsRadios">
                                                               Paypal
                                                               </label>
                                                            </div>
                                                         </li>
                                                      </ul>
                                                      <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E; width: 100%" ><i class="fa fa-bookmark" aria-hidden="true"  ></i>Save Option</a>
                                                   </div>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- ... end Your Profile  -->
                                 </div>
                                 @switch ($ms->milestone_status->status)
                                    @case('Processing')
                                       <a href="javascript:;" class="btn btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left" style=" width: 100%" ><i class="fa fa-lock" aria-hidden="true"></i>DISPUTE CLOSED</a>
                                       @if($is_seeker)
                                       <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #828282; width: 100%" ><i class="fa fa-lock" aria-hidden="true" ></i>RELEASE (LOCKED)</a>
                                       @endif
                                       @if($is_alchemist)
                                       <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left complete_milestone" data-ms="{{$ms->id}}" style="background-color: #27AAE1; width: 100%" ><i class="fa fa-check-circle" aria-hidden="true" ></i>COMPLETE MILESTONE</a>
                                       @endif
                                    @break;
                                    @case('Payment Due')
                                       <a href="javascript:;" class="btn btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left" style=" width: 100%" ><i class="fa fa-lock" aria-hidden="true"></i>DISPUTE CLOSED</a>
                                       @if($is_seeker)
                                       <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left release_payment" data-ms="{{$ms->id}}" style="background-color: #27AAE1; width: 100%" ><i class="fa fa-paper-plane" aria-hidden="true" ></i>Payment Due ~ RELEASE</a>
                                       @endif
                                       @if($is_alchemist)
                                       <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #27AAE1; width: 100%" ><i class="fa fa-check-circle" aria-hidden="true" ></i>Payment Due</a>
                                       @endif
                                    @break;
                                    @case('Completed')
                                       <a href="javascript:;" data-toggle="modal" data-target="#are-you-sure-dispute" class="btn btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left" style="background-color: #FBFBFB; width: 100%"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>DISPUTE / NEGOTIATE</a>
                                       @if($is_seeker)
                                       <a href="javascript:;" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #90CB1E; width: 100%" ><i class="fa fa-check-circle" aria-hidden="true" ></i>FUNDS RELEASED (COMPLETED)</a>
                                       @endif
                                       @if($is_alchemist)
                                       <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #90CB1E; width: 100%" ><i class="fa fa-check-circle" aria-hidden="true" ></i>Paid</a>
                                       @endif
                                    @break;

                                    @default
                                       <a href="javascript:;" class="btn btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left" style=" width: 100%" ><i class="fa fa-lock" aria-hidden="true"></i>DISPUTE CLOSED</a>
                                       @if($is_alchemist)
                                       <a href="javascript" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #828282; width: 100%" ><i class="fa fa-lock" aria-hidden="true" ></i>RELEASE (LOCKED)</a>
                                       @endif
                                    @break;
                                 @endswitch

                              </div>
                           </div>
                        </div>
                        @endforeach
                        <div class="container">
                           <div class="row">
                              <div class="col col-xl-5 col-lg-12 col-md-12 m-auto">
                                 <div class="logout-content">
                                    <!-- show button complete -->
                                    @if($is_seeker && $project->isCompleted() &&
                                       $project->status() == 'Processing')
                                       <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left complete_project" data-id="{{$project->id}}" style="background-color: #27AAE1; width: 60%" ><i class="fa fa-comments" aria-hidden="true" ></i>Complete project</a>
                                    @endif
                                    @if($project->status()=='Completed')
                                       @if($is_alchemist)
                                          <a href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #27AAE1; width: 60%" ><i class="fa fa-comments" aria-hidden="true" ></i>Project Completed</a>
                                       @endif
                                       <?php
                                          if($is_seeker) {
                                             $name_user = $project->user_won->full_name;
                                             $user_to = $project->user_won->id;
                                             $is_reviewed = $project->is_reviewed($project->user->id);
                                          }
                                          if($is_alchemist) {
                                             $name_user = $project->user->full_name;
                                             $user_to = $project->user->id;
                                             $is_reviewed = $project->is_reviewed($project->user_won->id);
                                          }
                                       ?>
                                       @if(!$is_reviewed)
                                       <h6>Please Review {{$name_user}}’s Work</h6>
                                       <p>Now your Project is complete you can review {{$name_user}} from your <a href="javascript:;">Dashboard</a> anytime, or quickly Review {{$name_user}} now to and gain a bonus <a href="javascript:;">10 Reputation Points</a> for reviewing within 24 Hours of the project compltetion.
                                       </p>
                                       <a href="javascript:;" data-bid_id="{{$project->bidwon->id}}" data-name_user="{{$name_user}}" data-user_to="{{$user_to}}" class="btn btn-purple btn-md-2 btn-icon-left open_review_modal" style="background-color: #7C5AC2; width: 60%" ><i class="fa fa-comments" aria-hidden="true" ></i>REVIEW PROJECT</a><br><br>
                                       @endif
                                    @endif
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="messages" role="tabpanel" aria-expanded="true">
                  <div class="ui-block-title">
                     <h6 class="title">Chat / Messages + Dispute Negotiation</h6>
                     <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </a>
                  </div>
                  <ul class="comments-list">
                     @foreach($project->messages as $ps)
                     <li class="comment-item">
                        <div class="post__author author vcard inline-items">
                           @if($ava = $ps->user->avatar())
                              <img src="{{$ava}}" width="25">
                           @else
                              <img src="img/author-page.jpg" alt="author">
                           @endif
                           <div class="author-date">
                              <a class="h6 post__author-name fn" href="javascript:;">{{$ps->user->full_name}}</a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18">
                                 1 hour ago
                                 </time>
                              </div>
                           </div>
                           <a href="#" class="more">
                              <svg class="olymp-three-dots-icon">
                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                              </svg>
                           </a>
                        </div>
                        <p>{{$ps->message}}</p>
                        <a href="javascript:;" class="post-add-icon inline-items">
                           <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                           </svg>
                        </a>
                        <a href="javascript:;" class="reply">Reply</a>
                     </li>
                     @endforeach
                  </ul>
                  <form class="" action="{{route('profile.projectmessage')}}" method="POST">
                     @csrf
                     <div class="author-thumb">
                        @if($ava = $user->avatar())
                           <img src="{{$ava}}" width="25">
                        @else
                           <img src="img/author-page.jpg" alt="author">
                        @endif
                     </div>
                     <div class="form-group with-icon label-floating is-empty">
                        <label class="control-label">Share what you are thinking here...</label>
                        <textarea class="form-control" placeholder="" name="message"></textarea>
                     </div>
                     <div class="add-options-message">
                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                           <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                           </svg>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target="#are-you-sure-dispute" class="btn btn-border-think btn-transparent c-grey btn-sm-2 btn-icon-left"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>DISPUTE / NEGOTIATE</a>
                        <input type="hidden" name="pj_id" value="{{$project->id}}">
                        <button type="submit" class="btn btn-primary btn-md-2">Post Message</button>
                     </div>
                  </form>
               </div>
               <div class="tab-pane" id="sharedfiles" role="tabpanel" aria-expanded="true">
                  <div class="ui-block-title">
                     <h6 class="title">Shared Files</h6>
                     <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </a>
                  </div>
                  <div class="col col-xl-12 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
                     <table class="shop_table cart">
                        <thead>
                           <tr>
                              <td colspan="4" class="actions"><a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left" ><i class="fa fa-upload" aria-hidden="true"  ></i>UPLOAD FILES</a>
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
                           @foreach($project->attachments as $attachment)
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
                                 <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
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
                                    <input type="checkbox" name="optionsCheckboxes" checked>
                                    </label>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="tab-pane" id="upload" role="tabpanel" aria-expanded="true">
                  <div class="ui-block-title">
                     <h6 class="title">Upload Project Deliverables Here</h6>
                     <a href="#" class="more">
                        <svg class="olymp-three-dots-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                        </svg>
                     </a>
                  </div>
                  <div class="col col-xl-12 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
                     <form action="#" method="post" class="cart-main">
                        <!-- Shop Table Cart -->
                        <table class="shop_table cart">
                           <thead>
                              <tr>
                                 <td colspan="4" class="actions"><a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left" ><i class="fa fa-upload" aria-hidden="true"  ></i>UPLOAD FILES</a>
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
                              <tr class="cart_item">
                                 <td class="product-thumbnail">
                                    <div class="forum-item">
                                       <img src="img/3.jpg" alt="forum" width="40">
                                       <div class="content">
                                          <a href="#" class="h6 title">Website Files.zip</a>
                                          <div class="post__date">
                                             <time class="published" datetime="2017-03-24T18:18">Zip File </time>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="product-price">
                                    <div class="author-freshness">
                                       <a href="#" class="h6 title">Albert Chiu</a>
                                    </div>
                                 </td>
                                 <td class="product-quantity">
                                    <P class="price amount">28/11/2018</P>
                                    <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
                                 </td>
                                 <td class="product-subtotal">
                                    <a href="#" class="product-del remove" title="Remove this item">
                                       <img src="img/inbox.svg" class="olymp-close-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="product-remove">
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="optionsCheckboxes" checked>
                                       </label>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="cart_item">
                                 <td class="product-thumbnail">
                                    <div class="forum-item">
                                       <img src="img/video-player.svg" alt="forum" width="40">
                                       <div class="content">
                                          <a href="#" class="h6 title">Video Reference</a>
                                          <div class="post__date">
                                             <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="product-price">
                                    <div class="author-freshness">
                                       <a href="#" class="h6 title">Albert Chiu</a>
                                    </div>
                                 </td>
                                 <td class="product-quantity">
                                    <P class="price amount">28/11/2018</P>
                                    <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
                                 </td>
                                 <td class="product-subtotal">
                                    <a href="#" class="product-del remove" title="Remove this item">
                                       <img src="img/inbox.svg" class="olymp-close-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="product-remove">
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="optionsCheckboxes" checked>
                                       </label>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="cart_item">
                                 <td class="product-thumbnail">
                                    <div class="forum-item">
                                       <img src="img/powerpointFile.svg" alt="forum" width="40">
                                       <div class="content">
                                          <a href="#" class="h6 title">Flow-Diagram.ppt</a>
                                          <div class="post__date">
                                             <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="product-price">
                                    <div class="author-freshness">
                                       <a href="#" class="h6 title">James Rogers</a>
                                    </div>
                                 </td>
                                 <td class="product-quantity">
                                    <P class="price amount">28/11/2018</P>
                                    <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
                                 </td>
                                 <td class="product-subtotal">
                                    <a href="#" class="product-del remove" title="Remove this item">
                                       <img src="img/inbox.svg" class="olymp-close-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="product-remove">
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="optionsCheckboxes">
                                       </label>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="cart_item">
                                 <td class="product-thumbnail">
                                    <div class="forum-item">
                                       <img src="img/pdfFILE.svg" alt="forum" width="40">
                                       <div class="content">
                                          <a href="#" class="h6 title">User-Guide.pdf</a>
                                          <div class="post__date">
                                             <time class="published" datetime="2017-03-24T18:18">PDF File</time>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                                 <td class="product-price">
                                    <div class="author-freshness">
                                       <a href="#" class="h6 title">Albert Chiu</a>
                                    </div>
                                 </td>
                                 <td class="product-quantity">
                                    <P class="price amount">28/11/2018</P>
                                    <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
                                 </td>
                                 <td class="product-subtotal">
                                    <a href="#" class="product-del remove" title="Remove this item">
                                       <img src="img/inbox.svg" class="olymp-close-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                       </svg>
                                    </a>
                                 </td>
                                 <td class="product-remove">
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox" name="optionsCheckboxes" checked>
                                       </label>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="4" class="actions">
                                    <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #90CB1E; margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>    <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-border-think btn-transparent c-grey btn-md-2 btn-icon-left" ><i class="fa fa-check-circle" aria-hidden="true"  ></i>DOWNLOAD SELECTED</a>
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
         <!-- ... end News Feed Form  -->
      </div>

   <!-- include modal here  -->
   @include('modal.review')
   @include('modal.release_pay')
   @include('modal.dispute')


@endsection
@endif

@section('scripts')
<script type="text/javascript">
   $(document).ready(function () {
      $(document).on('click', '.complete_milestone', function(){
         if(confirm("Are you want to complete this milestone?")){
            id_ms = $(this).data('ms');
            $.ajax({
               type:'POST',
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: "{{route('ajax.complete_milestone')}}",
               data: 'id='+id_ms,
               success:function(data){
                  if (data.error == false) {
                     jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                     setTimeout(function(){window.location.reload();} , 2000);
                  }else{
                     jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }
               }
            });
         }
      });
      $(document).on('click', '.release_payment', function(){
         if(confirm("Are you want to complete this milestone?")){
            id_ms = $(this).data('ms');
            $.ajax({
               type:'POST',
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: "{{route('ajax.release_payment')}}",
               data: 'id='+id_ms,
               success:function(data){
                  if (data.error == false) {
                     jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                     setTimeout(function(){window.location.reload();} , 2000);
                  }else{
                     jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }
               }
            });
         }
      });
      $(document).on('click', '.complete_project', function(){
         if(confirm("Are you want to complete this project?")){
            id = $(this).data('id');
            $.ajax({
               type:'POST',
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: "{{route('ajax.complete_project')}}",
               data: 'id='+id,
               success:function(data){
                  if (data.error == false) {
                     jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                     setTimeout(function(){window.location.reload();} , 2000);
                  }else{
                     jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }
               }
            });
         }
      });
      function beforeOpenReviewModal(id) {
         d=[];
         $.ajax({
            type:'POST',
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('ajax.getBidinfo')}}",
            data: 'id='+id,
            success:function(res){
               d=res.data;
            },
            async: false
         });
         return d;
      }
      $(document).on('click', '.open_review_modal', function(e){
         e.preventDefault();
         bid_id = $(this).data('bid_id');
         data_bid = beforeOpenReviewModal(bid_id);
         var name_user = $(this).attr('data-name_user');
         var user_to = $(this).data('user_to');
         var target_modal = $('#popup-write-rewiev');
         // target_modal.find('.name_user').text(data_bid.full_name);
         // target_modal.find('.user_to').val(data_bid._freelancer);
         target_modal.find('.name_user').text(name_user);
         target_modal.find('.user_to').val(user_to);
         target_modal.find('.bid_skill > div').html(data_bid.bid_skill_html);
         target_modal.modal('show');
      });
      $(document).on('submit', '.form-write-rewiev', function(e){
         e.preventDefault();
         data = $(this).serialize();
         $.ajax({
            type:'POST',
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('ajax.postreview')}}",
            data: data,
            success:function(data){
               if (data.error == false) {
                  jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                  setTimeout(function(){window.location.reload();} , 2000);
               }else{
                  jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
               }
            }
         });
      });
   });
</script>
@endsection
