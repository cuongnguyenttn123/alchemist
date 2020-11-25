@extends('myprofile.master_pro')
@section('title')
Manage Jobs & Contests
@endsection
@if(Auth::id())
@section('profile_content')
      <div class="container">
         <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

               <div class="ui-block responsive-flex">
                  <div class="ui-block-title" >
                     <ul class="nav nav-tabs calendar-events-tabs fontweight-400" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#managejobs" role="tab">
                           <img src="svg-icons/menu/tasks.svg" width="150" class="olymp-status-icon" style="margin-right: 5px;width: 25px">
                           Project Manager <span class="items-round-little bg-primary">{{array_sum($job_counter)}}</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#managecontests" role="tab">
                           <img src="svg-icons/menu/trophy-gold.svg" width="150" class="olymp-status-icon" style="margin-right: 5px;width: 25px">
                           Contest Manager <span class="items-round-little bg-primary">{{array_sum($contest_counter)}}</span>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#managedispute" role="tab">
                           <img src="svg-icons/menu/organization.svg" width="150" class="olymp-status-icon" style="margin-right: 5px;width: 25px">
                             Dispute Manager (Coming Soon)<span class="items-round-little bg-primary">{{array_sum($dispute_counter)}}</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Tab panes -->
      <div class="tab-content" style="width: 100%;">
         <div class="tab-pane active" id="managejobs" role="tabpanel">
            <div class="container" >
               <div class="row">
                  <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="ui-block">
                        <!-- News Feed Form  -->
                        <div class="news-feed-form">
                           <!-- Nav tabs -->
                           <ul class="nav nav-tabs" role="tablist">
                              @if($user->isAlchemist())
                               <li class="nav-item">
                                 <a class="nav-link active  inline-items" data-toggle="tab" href="#savedprojects" role="tab" aria-expanded="false">

                                   <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>

                                   <span>Saved Projects</span> <span> ({{$job_counter["savedprojects"]}})</span>
                                   <div class="ripple-container"></div></a>
                               </li>

                              <li class="nav-item"  >
                                 <a class="nav-link inline-items" style="width: auto" data-toggle="tab" href="#activebids" role="tab" aria-expanded="true">
                                    <svg class="olymp-computer-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                                    <span>Active Bids</span> <span> ({{$job_counter["activebids"]}})</span>
                                 </a>
                              </li>
                              @endif
                              <li class="nav-item"  >
                                 <a class="nav-link inline-items @if($user->isSeeker()) active @endif" style="width: auto" data-toggle="tab" href="#openjobs" role="tab" aria-expanded="true">
                                    <svg class="olymp-status-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                                    </svg>
                                    @if($user->isSeeker())
                                    <span>Posted Projects</span> <span> ({{$job_counter["openjobs"]}})</span>
                                    @else
                                    <span>Awarded projects</span> <span> ({{$job_counter["openjobs"]}})</span>
                                    @endif
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link inline-items" data-toggle="tab" href="#currentjobs" role="tab" aria-expanded="false">
                                    <svg class="olymp-multimedia-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                    </svg>
                                    <span>Current Projects</span> <span>({{$job_counter["currentjobs"]}})</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link inline-items" data-toggle="tab" href="#archivejobs" role="tab" aria-expanded="false">
                                    <svg class="olymp-blog-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-checked-calendar-icon"></use>
                                    </svg>
                                    <span>Archived Projects</span> <span>({{$job_counter["archivejobs"]}})</span>
                                 </a>
                              </li>
                           </ul>
                           <!-- Tab panes -->
                           <div class="tab-content no-padding">
                              @if($user->isAlchemist())
                              <div class="tab-pane active" id="savedprojects" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                <br>
                                @if($job_counter["savedprojects"] == 0)
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">
                                    <a href="SearchProjects(Job).html"></a>
                                    <div class="content" style="margin-top: 10px">
                                      <a href="CreateJob.html" class="btn btn-control bg-primary">
                                        <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                      </a>
                                      <a href="#" class="title h5">No Posted Projects - Create Now!</a>
                                      <span class="sub-title">Posted projects &amp; active bids will be managed here</span>
                                    </div>

                                  </div>
                                @else
                                  <div class="ui-block">
                                    <table width="100%" class="event-item-table event-item-table-fixed-width">
                                      <thead>

                                      <tr>

                                        <th width="25%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; border-right: ">
                                          PROJECT NAME
                                        </th>

                                        <th width="20%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          SEEKER
                                        </th>

                                        <th width="13%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          ESTIMATE
                                        </th>

                                        <th width="11%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          PROJECT BIDS
                                        </th>

                                        <th width="15%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          BIDDING ENDS
                                        </th>

                                        <th width="20%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                        </th></tr>

                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                  </div>
                                @endif

                              </div>
                              <div class="tab-pane" id="activebids" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                <br>
                                @if($job_counter["activebids"] == 0)
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                    <a href="SearchProjects(Job).html"></a>

                                    <div class="content" style="margin-top: 10px">

                                      <a href="CreateJob.html" class="btn btn-control bg-primary">
                                        <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                      </a>

                                      <a href="#" class="title h5">No Posted Projects - Create Now!</a>
                                      <span class="sub-title">Posted projects &amp; active bids will be managed here</span>

                                    </div>

                                  </div>
                                @else
                                  <div class="ui-block">
                                    <table width="100%" class="event-item-table event-item-table-fixed-width">
                                      <thead>

                                      <tr>

                                        <th width="30%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; border-right: ">
                                          PROJECT NAME
                                        </th>

                                        <th width="17%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          ESTIMATE
                                        </th>

                                        <th width="13%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          # BIDS
                                        </th>

                                        <th width="11%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          AVERAGE BID
                                        </th>

                                        <th width="15%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          BIDDING ENDS
                                        </th>

                                        <th width="14%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                        </th></tr>

                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                  </div>
                                @endif

                              </div>
                              @endif
                              <div class="tab-pane @if($user->isSeeker()) active @endif" id="openjobs" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                <br>
                                @if($job_counter["openjobs"] == 0 )
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                    <a href="SearchProjects(Job).html"></a>

                                    <div class="content" style="margin-top: 10px">

                                      <a href="CreateJob.html" class="btn btn-control bg-primary">
                                        <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                      </a>

                                      <a href="#" class="title h5">No Posted Projects - Create Now!</a>
                                      <span class="sub-title">Posted projects &amp; active bids will be managed here</span>

                                    </div>

                                  </div>
                                @else
                                  <div class="ui-block">
                                    <table width="100%" class="event-item-table event-item-table-fixed-width">
                                      <thead>

                                      <tr>

                                        <th width="30%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px;">
                                          PROJECT NAME
                                        </th>

                                        <th width="17%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          ESTIMATE
                                        </th>

                                        <th width="13%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          # BIDS
                                        </th>

                                        <th width="11%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          AVERAGE BID
                                        </th>

                                        <th width="15%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          BIDDING ENDS
                                        </th>

                                        <th width="14%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                        </th></tr>

                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                  </div>
                                @endif

                              </div>
                              <div class="tab-pane" id="currentjobs" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                <br>
                                 <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding" >
                                   @if($job_counter["currentjobs"] == 0)
                                     <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                       <a href="{{route('search')}}"></a>

                                       <div class="content" style="margin-top: 10px">

                                         <a href="CreateJob.html" class="btn btn-control bg-primary">
                                           <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                         </a>

                                         <a href="CreateJob.html" class="title h5">No Current Projects - Create Now!</a>
                                         <span class="sub-title">Current projects will be managed here</span>

                                       </div>

                                     </div>
                                     @else
                                     <div class="ui-block">
                                       <table width="93%" class="event-item-table event-item-table-fixed-width">
                                         <thead>

                                         <tr>

                                           <th width="20%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; border-right: ">
                                             PROJECT NAME
                                           </th>

                                           <th width="21%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             ALCHEMIST
                                           </th>

                                           <th width="10%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             DEAL
                                           </th>

                                           <th width="9%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             DEADLINE
                                           </th>

                                           <th width="24%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             PROGRESS/PAYMENT
                                           </th>

                                           <th width="16%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                           </th></tr>

                                         </thead>
                                         <tbody>
                                         </tbody>
                                       </table>
                                     </div>
                                     @endif

                                 </div>
                              </div>
                              <div class="tab-pane" id="archivejobs" role="tabpanel" aria-expanded="true">

                                 {{--@include('manage_job.form-filter')--}}
                                <br>
                                @if($job_counter["archivejobs"] == 0)
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                    <a href="{{route('search')}}"></a>

                                    <div class="content" style="margin-top: 10px">

                                      <a href="SearchProjects(Job).html" class="btn btn-control bg-primary">
                                        <svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                      </a>

                                      <a href="CreateJob.html" class="title h5">No Completed Projects - Create Now!</a>
                                      <span class="sub-title">Completed projects can be reviwed and managed here</span>

                                    </div>

                                  </div>
                                @else
                                  <div class="ui-block">
                                    <table width="93%" class="event-item-table event-item-table-fixed-width">
                                      <thead>

                                      <tr>

                                        <th width="22%" class="name  archived-project" style="border-top-left-radius: 3px; ">
                                          PROJECT NAME
                                        </th>

                                        <th width="20%" class="name archived-project" >
                                          ALCHEMIST
                                        </th>

                                        <th width="14%" class="name archived-project" >
                                          REVIEW  STATUS
                                        </th>
                                        <th width="26%" class="name archived-project" >
                                          PROJECT DETAILS
                                        </th>

                                        <th width="18%" class="name archived-project align-center" style="border-top-right-radius: 3px;">ACTION


                                        </th></tr>

                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                  </div>
                                @endif

                              </div>
                           </div>
                        </div>
                        <!-- ... end News Feed Form  -->
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="tab-pane" id="managecontests" role="tabpanel">
            <div class="container">
               <div class="row">
                  <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="ui-block" style="border: 0px solid #e6ecf5;">
                        <!-- News Feed Form  -->
                        <div class="news-feed-form" style="background-color: #edf2f6;padding-bottom: 50px;border: 0px solid #e6ecf5;">
                           <!-- Nav tabs -->
                           <ul class="nav nav-tabs" role="tablist">
                             @if($user->isAlchemist())
                               <li class="nav-item">
                                 <a class="nav-link active inline-items" href="#saved_contests" data-toggle="tab" role="tab" aria-expanded="false">
                                   <svg class="olymp-play-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
                                   <span>Saved Contests</span><span> ({{$contest_counter["saved_contests"]}})</span>
                                 </a>
                               </li>
                               <li class="nav-item">
                                 <a class="nav-link inline-items" data-toggle="tab" href="#joined_contest" role="tab" aria-expanded="false">
                                   <svg class="olymp-multimedia-icon">
                                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                                   </svg>
                                   <span>Contest Joined</span> <span>({{$contest_counter["joined_contest"]}})</span>
                                 </a>
                               </li>
                             @endif
                             @if($user->isSeeker())
                                <li class="nav-item"  >
                               <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#post_contests" role="tab" aria-expanded="true">
                                  <svg class="olymp-status-icon">
                                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use>
                                  </svg>
                                  <span>Posted Contests</span> <span>({{$contest_counter["post_contests"]}})</span>
                               </a>
                            </li>
                             @endif
                               <li class="nav-item">
                                 <a class="nav-link inline-items" data-toggle="tab" href="#past_contest" role="tab" aria-expanded="false">
                                    <svg class="olymp-blog-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-blog-icon"></use>
                                    </svg>
                                    <span>Completed Contests</span> <span>({{$contest_counter["past_contests"]}})</span>
                                 </a>
                              </li>

                           </ul>
                           <!-- Tab panes -->
                           <div class="tab-content no-padding">
                             @if($user->isAlchemist())
                               <div class="tab-pane active" id="saved_contests" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                 <br>
                                 <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding" >
                                   @if($contest_counter["saved_contests"] == 0)
                                     <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                       <a></a>

                                       <div class="content" style="margin-top: 10px">

                                         <a href="CreateContest.html" class="btn btn-control bg-blue">
                                           <svg class="olymp-trophy-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
                                         </a>

                                         <a href="CreateContest.html" class="title h5">No Contests Posted - Create Now!</a>
                                         <span class="sub-title">Your posted contests will be managed here</span>

                                       </div>

                                     </div>
                                   @else
                                     <div class="ui-block">
                                       <table width="93%" class="event-item-table event-item-table-fixed-width">
                                         <thead>

                                         <tr>

                                           <th width="25%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; border-right: ">
                                             CONTEST NAME
                                           </th>

                                           <th width="20%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             SEEKER
                                           </th>

                                           <th width="13%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             PRIZE
                                           </th>

                                           <th width="11%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             ENTRIES
                                           </th>

                                           <th width="15%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             ENTRY ENDS
                                           </th>

                                           <th width="20%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                           </th></tr>

                                         </thead>
                                         <tbody>
                                         </tbody>
                                       </table>
                                     </div>
                                   @endif

                                 </div>
                               </div>
                               <div class="tab-pane" id="joined_contest" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                 <br>
                                 <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding" >
                                   @if($contest_counter["joined_contest"] == 0)
                                   @else
                                     <div class="ui-block">
                                       <table width="93%" class="event-item-table event-item-table-fixed-width">
                                         <thead>

                                         <tr>

                                           <th width="24%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; border-right: ">
                                             CONTEST NAME
                                           </th>

                                           <th width="20%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             SEEKER
                                           </th>

                                           <th width="12%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             PRIZE
                                           </th>

                                           <th width="24%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                             MY UPLOADS
                                           </th>
                                           <th width="18%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                           </th></tr>

                                         </thead>
                                         <tbody>
                                         </tbody>
                                       </table>
                                     </div>
                                   @endif

                                 </div>
                               </div>
                             @endif
                             @if($user->isSeeker())
                                <div class="tab-pane active" id="post_contests" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                  <br>
                                @if($contest_counter["post_contests"] == 0)
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                    <a ></a>

                                    <div class="content" style="margin-top: 10px">

                                      <a href="CreateContest.html" class="btn btn-control bg-blue">
                                        <svg class="olymp-trophy-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
                                      </a>

                                      <a href="CreateContest.html" class="title h5">No Contests Posted - Create Now!</a>
                                      <span class="sub-title">Your posted contests will be managed here</span>

                                    </div>

                                  </div>
                                  @else
                                  <div class="ui-block">
                                    <table width="100%" class="event-item-table event-item-table-fixed-width">
                                      <thead>

                                      <tr>

                                        <th width="30%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; ">
                                          CONTEST NAME
                                        </th>

                                        <th class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          ENTRIES
                                        </th>

                                        <th class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          PRIZE
                                        </th>

                                        <th class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          ENTRY CLOSES
                                        </th>
                                        <th width="18%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                        </th></tr>

                                      </thead>
                                      <tbody>

                                      </tbody>
                                    </table>
                                  </div>
                                  @endif

                              </div>
                             @endif
                             <div class="tab-pane" id="past_contest" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                               <br>
                                @if($contest_counter["past_contests"] == 0)
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                    <a href="SearchProjects(Job).html"></a>

                                    <div class="content" style="margin-top: 10px">

                                      <a href="CreateContest.html" class="btn btn-control bg-blue">
                                        <svg class="olymp-trophy-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
                                      </a>

                                      <a href="CreateContest.html" class="title h5">No Completed Contests - Create Now!</a>
                                      <span class="sub-title">Start your Alchemist Journey!</span>

                                    </div>

                                  </div>
                                @else
                                  <div class="ui-block">
                                    <table width="93%" class="event-item-table event-item-table-fixed-width">
                                      <thead>

                                      <tr>

                                        <th width="19%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; border-right: ">
                                          CONTEST NAME
                                        </th>

                                        <th width="19%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          SEEKER
                                        </th>

                                        <th width="24%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          PRIZE
                                        </th>

                                        <th width="23%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          MY UPLOADS
                                        </th>
                                        <th width="15%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                        </th></tr>

                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                  </div>
                                @endif
                              </div>


                           </div>
                        </div>
                        <!-- ... end News Feed Form  -->
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="tab-pane " id="managedispute" role="tabpanel">
            <div class="container">
               <div class="row">
                  <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                     <div class="ui-block" style="border: 0px solid #e6ecf5;">
                        <div class="news-feed-form" style="background-color: #edf2f6;padding-bottom: 50px;border: 0px solid #e6ecf5;">
                           <!-- Nav tabs -->
                           <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item"  >
                                 <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#mydisputes" role="tab" aria-expanded="true">
                                    <svg class="olymp-status-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                                    </svg>
                                    <span>My Disputes</span> <span>({{$dispute_counter["mydisputes"]}})</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link inline-items" data-toggle="tab" href="#disputeinvite" role="tab" aria-expanded="false">
                                    <svg class="olymp-multimedia-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
                                    </svg>
                                    <span>Dispute Invitations</span> <span>({{$dispute_counter["disputeinvite"]}})</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link inline-items" data-toggle="tab" href="#acceptedisputes" role="tab" aria-expanded="false">
                                    <svg class="olymp-checked-calendar-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-checked-calendar-icon"></use>
                                    </svg>
                                    <span>Accepted Disputes</span> <span>({{$dispute_counter["acceptedisputes"]}})</span>
                                 </a>
                              </li>
                           </ul>
                           <!-- Tab panes -->
                           <div class="tab-content no-padding">
                              <div class="tab-pane active" id="mydisputes" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                <br>
                                @if($dispute_counter["mydisputes"] == 0)
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                    <a href=""></a>

                                    <div class="content" style="margin-top: 10px">

                                      <a href="" class="btn btn-control bg-purple">
                                        <svg class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                      </a>

                                      <a href="#" class="title h5">No Disputes Initiated!</a>
                                      <span class="sub-title">Your Disputes will be managed here</span>

                                    </div>

                                  </div>
                                @else
                                  <div class="ui-block">
                                    <table width="100%" class="event-item-table event-item-table-fixed-width">
                                      <thead>

                                      <tr>

                                        <th width="22%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px;">
                                          DISPUTE NAME
                                        </th>

                                        <th width="20%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          VERSUS
                                        </th>

                                        <th width="14%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          STATUS
                                        </th>
                                        <th width="26%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          DISPUTE DETAILS
                                        </th>

                                        <th width="18%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                        </th></tr>

                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                  </div>
                                @endif

                              </div>
                              <div class="tab-pane" id="disputeinvite" role="tabpanel" aria-expanded="true">

                                 {{--@include('manage_job.form-filter')--}}
                                <br>
                                @if($dispute_counter["disputeinvite"] == 0)
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                    <a href=""></a>

                                    <div class="content" style="margin-top: 10px">

                                      <a href="" class="btn btn-control bg-purple">
                                        <svg class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                      </a>

                                      <a href="#" class="title h5">No Dispute Invitations</a>
                                      <span class="sub-title">Arbitration invites will be managed here</span>

                                    </div>

                                  </div>
                                @else
                                  <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding" >
                                    <div class="ui-block">
                                      <table width="100%" class="event-item-table event-item-table-fixed-width">
                                        <thead>

                                        <tr>

                                          <th width="27%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px; ">
                                            DISPUTE NAME
                                          </th>
                                          <th width="17%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                            OFFER ENDS
                                          </th>
                                          <th width="33%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                            ARBITER DETAILS
                                          </th>
                                          <th width="23%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION
                                          </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                @endif

                              </div>
                              <div class="tab-pane" id="acceptedisputes" role="tabpanel" aria-expanded="true">
                                 {{--@include('manage_job.form-filter')--}}
                                <br>
                                @if($dispute_counter["acceptedisputes"] == 0)
                                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 10px">

                                    <a href=""></a>

                                    <div class="content" style="margin-top: 10px">

                                      <a href="" class="btn btn-control bg-purple">
                                        <svg class="olymp-block-from-chat-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-block-from-chat-icon"></use></svg>
                                      </a>

                                      <a href="#" class="title h5">No Arbiter Invites Accepted!</a>
                                      <span class="sub-title">Your accepted arbiter cases will be managed here</span>

                                    </div>

                                  </div>
                                @else
                                  <div class="ui-block">
                                    <table width="100%" class="event-item-table event-item-table-fixed-width">
                                      <thead>

                                      <tr>

                                        <th width="22%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-left-radius: 3px;">
                                          DISPUTE NAME
                                        </th>
                                        <th width="14%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          ACTION DATE
                                        </th>

                                        <th width="16%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          STATUS
                                        </th>

                                        <th width="30%" class="name " style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
                                          ARBITER DETAILS
                                        </th>

                                        <th width="18%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257);border-top-right-radius: 3px;">ACTION


                                        </th></tr>

                                      </thead>
                                      <tbody>
                                      {{-- @foreach($user->acceptedDispute() as $dispute)
                                         @include('template_part/content-disputeinvite', ['accept'=>true])
                                      @endforeach --}}
                                      </tbody>
                                    </table>
                                  </div>
                                @endif

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   <!-- include modal here  -->
   @include('modal.review')

@endsection
@endif
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">
@endsection
@section('scripts')
   <script type="text/javascript">
      $(document).on('click', '.btn_cancelawardbid', function(e) {
         swal("Are you sure?")
         .then((value) => {
           if(value) {
            id = $(this).data('id');
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type:'POST',
               url: "{{route('ajax.cancelawardbid')}}",
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
      });
      $(document).on('click', '.btn_acceptawardbid', function(e) {
         swal("Are you sure?")
         .then((value) => {
           if(value) {
            id = $(this).data('id');
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type:'POST',
               url: "{{route('ajax.acceptawardbid')}}",
               data: 'id='+id,
               success:function(data){
                  if (data.error == false) {
                     jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                     if (data.redirect != ''){
                       setTimeout(function(){window.location.replace(data.redirect);} , 2000);
                     }else {
                       setTimeout(function(){window.location.reload();} , 2000);
                     }
                  }else{
                     jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }
               }
            });
           }
         });
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
         data_type = $(this).data('type');
         if(!data_type){
            data_bid = beforeOpenReviewModal(bid_id);
         }else {
            $('.label_skill, .bid_skill').hide();
         }
         name_user = $(this).data('name_user');
         user_to = $(this).data('user_to');
         project_id = $(this).data('project_id');
         var target_modal = $('#popup-write-rewiev');
         // target_modal.find('.name_user').text(data_bid.full_name);
         // target_modal.find('.user_to').val(data_bid._freelancer);
         target_modal.find('.name_user').text(name_user);
         target_modal.find('.user_to').val(user_to);
         target_modal.find('.project_id').val(project_id);
         if(!data_type){
            target_modal.find('.bid_skill > div').html(data_bid.bid_skill_html);
         }
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
      $(document).on('click', '.accept_dispute', function(e){
         e.preventDefault();
         id_dispute = $(this).data('dispute');
         form_data = 'id_dispute='+id_dispute+'&type=accept';
         url = "{{route('dispute.acceptcancel')}}";
         console.log(form_data);
         callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
            }else{
               swal(res.message);
            }
         });
      });
      $(document).on('click', '.decline_dispute', function(e){
         e.preventDefault();
         id_dispute = $(this).data('dispute');
         form_data = 'id_dispute='+id_dispute+'&type=cancel';
         url = "{{route('dispute.acceptcancel')}}";
         console.log(form_data);
         callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
            }else{
               swal(res.message);
            }
         });
      });
      $('.tab-pane:not(.skip) .nav-tabs a').on('show.bs.tab', function(e){
         doSomething($(this));
      });
      // this happens on page load
      // doSomething($(".tab-pane .nav-tabs a.active"));
      $(".tab-pane:not(.skip) .nav-tabs a.active").each(function(){
         doSomething($(this));
      });
      function doSomething(target) {
         // console.log(target[0]);
         var href = target.attr("href") // href tab
         console.log($.trim($(href).find('tbody').html()));
         if($.trim($(href).find('tbody').html()) == ''){

            var type = href.substring(1, href.length);
            form_data = 'type='+type;
            url = "{{route('profile.loadmorejob')}}";

            callAjax(url,form_data, function(res){
               if(res.error == false){
                  // jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
                  $(href).find('tbody').html(res.data);
               }else{
                  swal(res.message);
               }
            });
         }
      }

      $(document).on('click', ".dispute_payment", function(e){
          e.preventDefault();
          var type = $(this).data('type');
          var dispute_id = $(this).data('id');

          form_data = 'id_dispute='+dispute_id+'&type='+type;
          url = "{{route('dispute.payment')}}";

          callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
            }else{
               swal(res.message);
            }
          });

      });
      $(document).on('click', '.save_project', function (e) {

        var _this = $(this);
        id = $(this).data('id');
        form_data = 'id=' + id + '&type=project';
        url = "{{route('ajax.savefavorite')}}";
        callAjax(url, form_data, function (res) {
          if (res.error == false) {

            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          } else {
            swal(res.message);
          }
        });
      });

      $(document).on('click', '.save_contest', function(e){
        var _this = $(this);
        id = $(this).data('id');
        form_data = 'id='+id+'&type=contest';
        url = "{{route('ajax.savefavorite')}}";
        callAjax(url,form_data, function(res){
          if(res.error == false){
            var s_text = (res.action == 'add') ? 'SAVED' : 'SAVE';
            var bg = (res.action == 'add') ? 'bg-primary' : 'bg-gradient-gray';
            console.log(s_text,bg);
            _this.find('span').text(s_text);
            _this.removeClass('bg-gradient-gray bg-primary').addClass(bg);
            jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
          }else{
            swal(res.message);
          }
        });
      });

      $(document).on('click', ".continue_project", function(e){
          e.preventDefault();
          var type = $(this).data('type');
          var dispute_id = $(this).data('id');

          form_data = 'id_dispute='+dispute_id+'&type='+type;
          url = "{{route('dispute.continue')}}";

          callAjax(url,form_data, function(res){
            if(res.error == false){
               jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
               setTimeout(function(){window.location.reload();} , 2000);
            }else{
               swal(res.message);
            }
          });

      });
      $(document).on('click', '.saved_user_archi', function(){
        id = $(this).data('id');
        role = $(this).data('role');
        sumUser = $(this).data('sumuser');
        save = 'Save '+ role;
        saved = 'Saved ' + sumUser + '/15';
        _this = $(this);
        form_data = 'id='+id+'&type=user';
        url = "{{route('ajax.savefavorite')}}";
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:'POST',
          url: url,
          data: form_data,
          success:function(res){
            if(res.error == false){
              var s_text = (res.action == 'add') ? saved : save;
              var bg = (res.action == 'add') ? 'save-user-archived' : 'save-user-archived-not';
              var bg_remove = (res.action == 'add') ? 'save-user-archived-not' : 'save-user-archived';
              console.log(s_text,bg, role, res);
              _this.find('span').text(s_text);
              _this.removeClass(bg_remove).addClass(bg);
              jQuery.sticky(res.message, {classList: 'success', speed: 200, autoclose: 5000});
            }else{
              swal(res.message);
            }
          }
        });
      });
   </script>
@endsection
