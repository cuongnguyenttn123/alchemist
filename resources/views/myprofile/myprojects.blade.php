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
            <a class="nav-link active inline-items" data-toggle="tab" href="#open-jobs" role="tab" aria-expanded="true">
               <svg class="olymp-checked-calendar-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-checked-calendar-icon"></use></svg>
               <span>Open Jobs</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link inline-items" data-toggle="tab" href="#working-jobs" role="tab" aria-expanded="false">
               <svg class="olymp-play-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use></svg>
               <span>Working Jobs</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link inline-items" data-toggle="tab" href="#contests" role="tab" aria-expanded="false">
               <svg class="olymp-star-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-star-icon"></use></svg>
               <span>Contest Entries</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link inline-items" data-toggle="tab" href="#archived-jobs" role="tab" aria-expanded="false">
               <svg class="olymp-checked-calendar-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-checked-calendar-icon"></use></svg>
               <span>Archive / Review</span>
            </a>
         </li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
         <div class="tab-pane active" id="open-jobs" role="tabpanel" aria-expanded="true">
            <div class="ui-block responsive-flex1200">
               <div class="ui-block-title">
                  <div class="w-select">
                     <div class="title">Filter By:</div>
                     <fieldset class="form-group">
                        <div class="btn-group bootstrap-select form-control">
                           <select class="selectpicker form-control" tabindex="-98">
                              <option value="">Select Category</option>
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                           </select>
                        </div>
                        <span class="material-input"></span>
                     </fieldset>
                  </div>
                  <div class="w-select">
                     <fieldset class="form-group">
                        <div class="btn-group bootstrap-select form-control">
                           <select class="selectpicker form-control" tabindex="-98">
                              <option value="desc">Date (Descending)</option>
                              <option value="asc">Date (Ascending)</option>
                           </select>
                        </div>
                        <span class="material-input"></span>
                     </fieldset>
                  </div>
                  <a href="javascript:;" class="btn btn-primary btn-md-2">Filter</a>
                  <form class="w-search">
                     <div class="form-group with-button is-empty">
                        <input class="form-control" type="text" placeholder="Search Projects/Seekers...">
                        <button>
                           <svg class="olymp-magnifying-glass-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                           </svg>
                        </button>
                        <span class="material-input"></span>
                     </div>
                  </form>
               </div>
            </div>
            <table class="forums-table">
               <thead>
                  <tr>
                     <th width="56%" class="forum" style="background-color: #7C5AC2">Recently Awarded Projects - Milestone Agreement (Contract)</th>
                     <th width="12%" class="topics" style="background-color: #6944B4"> Stand to Earn:</th>
                     <th width="13%" class="posts" style="background-color: #5F3AAA">Expires:</th>
                     <th width="19%" class="freshness" style="background-color: #532CA0">Posted By:</th>
                  </tr>
               </thead>
               <tbody>
                @foreach($awarding as $project)
                  <tr>
                     <td class="forum">
                        <div class="forum-item">
                           <img src="img/coding.svg" alt="forum" width="40">
                           <div class="content">
                              <a href="{{$project->permalink()}}" class="h6 title">{{$project->name}}</a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18"> Websites, IT &amp; Software - Verified Payment </time>
                              </div>
                              <p class="text" style="max-width: 450px">
                                {{$project->short_description}}
                                <a href="javascript:;" rel="external" class=" " style="text-color: #666"> Read more..</a>
                              </p>
                              <br>
                              @if($user->isAlchemist())
                              <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-purple btn-sm btn-icon-left btn_cancelawardbid" style="background-color: #F9593B">
                                <i class="fa fa-ban" aria-hidden="true"></i>CANCEL OFFER
                              </a>
                              <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-blue btn-sm btn-icon-left btn_acceptawardbid">
                                <i class="fa fa-check" aria-hidden="true"></i>ACCEPT
                              </a>
                              @endif
                              @if($user->isSeeker())
                              <a href="{{route('profile.singleproject', $project->id)}}"  class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E"><i class="fa fa-arrows-alt" aria-hidden="true" ></i>MANAGE PROJECT</a>
                              @endif
                           </div>
                        </div>
                     </td>
                     <td class="topics"><a href="#" class="h6 count">${{$project->budget}}</a><br>
                        <a href="#" class="h6 count">T24500</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18">SBP: 100p</time>
                     </td>
                     <td class="posts"><a href="#" class="h6 count">{{$project->deadline_left}} Days left</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18">{{$project->deadline()}}</time>
                     </td>
                     <td class="freshness">
                        <div class="author-freshness">
                           @if($ava = $project->user->avatar())
                              <img width="48" src="{{$ava}}">
                           @else
                              <img class="" src="img/badge11.png" alt="author">
                           @endif
                           <span class="icon-status"></span>
                           <p></p>
                           <a href="#" class="h6 title">{{$project->user->full_name}}</a>
                           <time class="entry-date updated" datetime="2017-06-24T18:18">{{$project->posted_at}} days ago</time>
                           <p></p>
                           <a href="{{route('profile.singleproject', $project->id)}}#messages" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #7C5AC2">
                              <i class="fa fa-comments" aria-hidden="true"></i>CHAT
                           </a>
                           <a href="{{$project->urlProjectBids()}}" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #7C5AC2">
                              <i class="fa fa-comments" aria-hidden="true"></i>Project Bids
                           </a>
                        </div>
                     </td>
                  </tr>
                @endforeach
               </tbody>
            </table>
         </div>
         <div class="tab-pane" id="working-jobs" role="tabpanel" aria-expanded="true">
            <div class="ui-block responsive-flex1200">
               <div class="ui-block-title">
                  <div class="w-select">
                     <div class="title">Filter By:</div>
                     <fieldset class="form-group">
                        <select class="selectpicker form-control">
                           <option value="DA">Select Category</option>
                           <option value="NU">Websites, IT & Software</option>
                           <option value="NU">Mobile Phone & Computing</option>
                           <option value="NU">Writing & Content</option>
                           <option value="NU">Design Media & Architecture</option>
                           <option value="NU">Data Entry & Admin</option>
                           <option value="NU">Engineering & Science</option>
                           <option value="NU">Product Sourcing & Manufacturing</option>
                           <option value="NU">Sales & Marketing</option>
                           <option value="NU">Business, Accounting, Human Resources & Legal</option>
                           <option value="NU">Translation & Languages</option>
                           <option value="NU">Local Jobs & Services</option>
                           <option value="NU">Other</option>
                        </select>
                     </fieldset>
                  </div>
                  <div class="w-select">
                     <fieldset class="form-group">
                        <select class="selectpicker form-control">
                           <option value="NU">Date (Descending)</option>
                           <option value="NU">Date (Ascending)</option>
                        </select>
                     </fieldset>
                  </div>
                  <a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Filter</a>
                  <form class="w-search">
                     <div class="form-group with-button">
                        <input class="form-control" type="text" placeholder="Search Projects/Seekers...">
                        <button>
                           <svg class="olymp-magnifying-glass-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                           </svg>
                        </button>
                     </div>
                  </form>
               </div>
            </div>
            <table class="forums-table">
               <thead>
                  <tr>
                     <th class="forum" style="background-color: #38A9FF">Current Projects - Management</th>
                     <th class="topics" style="background-color: #2B99EC">Project Amount:</th>
                     <th class="posts" style="background-color: #1B84D3">Delivery Date:</th>
                     <th class="freshness" style="background-color: #0F70B9">Posted By:</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($current_project as $project)
                  <tr>
                     <td class="forum">
                        <div class="forum-item">
                           <img src="img/coding.svg" alt="forum" width="40">
                           <div class="content">
                              <a href="{{$project->permalink()}}" class="h6 title">{{$project->name}}</a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18"> Websites, IT &amp; Software - Verified Payment </time>
                              </div>
                              <p class="text" style="max-width: 450px">
                                {{$project->short_description}}
                                <a href="javascript:;" rel="external" class=" " style="text-color: #666"> Read more..</a>
                              </p>
                              <br>
                              <a href="{{route('profile.singleproject', $project->id)}}"  class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E"><i class="fa fa-arrows-alt" aria-hidden="true" ></i>MANAGE PROJECT</a>
                           </div>
                        </div>
                     </td>
                     <td class="topics"><a href="#" class="h6 count">${{$project->budget}}</a><br>
                        <a href="#" class="h6 count">T24500</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18">SBP: 100p</time>
                     </td>
                     <td class="posts"><a href="#" class="h6 count">{{$project->deadline_left}} Days left</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18">{{$project->deadline()}}</time>
                     </td>
                     <td class="freshness">
                        <div class="author-freshness">
                           @if($ava = $project->user->avatar())
                              <img width="48" src="{{$ava}}">
                           @else
                              <img class="" src="img/badge11.png" alt="author">
                           @endif
                           <span class="icon-status"></span>
                           <p></p>
                           <a href="#" class="h6 title">{{$project->user->full_name}}</a>
                           <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 minutes ago</time>
                           <p></p>
                           <a href="{{route('profile.singleproject', $project->id)}}#messages" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #7C5AC2">
                              <i class="fa fa-comments" aria-hidden="true"></i>CHAT
                           </a>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
         <div class="tab-pane" id="contests" role="tabpanel" aria-expanded="true">
            <div class="ui-block responsive-flex1200">
               <div class="ui-block-title">
                  <div class="w-select">
                     <div class="title">Filter By:</div>
                     <fieldset class="form-group">
                        <select class="selectpicker form-control">
                           <option value="DA">Select Category</option>
                           <option value="NU">Websites, IT & Software</option>
                           <option value="NU">Mobile Phone & Computing</option>
                           <option value="NU">Writing & Content</option>
                           <option value="NU">Design Media & Architecture</option>
                           <option value="NU">Data Entry & Admin</option>
                           <option value="NU">Engineering & Science</option>
                           <option value="NU">Product Sourcing & Manufacturing</option>
                           <option value="NU">Sales & Marketing</option>
                           <option value="NU">Business, Accounting, Human Resources & Legal</option>
                           <option value="NU">Translation & Languages</option>
                           <option value="NU">Local Jobs & Services</option>
                           <option value="NU">Other</option>
                        </select>
                     </fieldset>
                  </div>
                  <div class="w-select">
                     <fieldset class="form-group">
                        <select class="selectpicker form-control">
                           <option value="NU">Date (Descending)</option>
                           <option value="NU">Date (Ascending)</option>
                        </select>
                     </fieldset>
                  </div>
                  <a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Filter</a>
                  <form class="w-search">
                     <div class="form-group with-button">
                        <input class="form-control" type="text" placeholder="Search Contests...">
                        <button>
                           <svg class="olymp-magnifying-glass-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                           </svg>
                        </button>
                     </div>
                  </form>
               </div>
            </div>
            <table class="forums-table">
               <thead>
                  <tr>
                     <th class="forum" style="background-color: #50D78D">My Contest Entries</th>
                     <th class="topics" style="background-color: #31C574">Stand to Win:</th>
                     <th class="posts" style="background-color: #1BB460">Submit By:</th>
                     <th class="freshness" style="background-color: #0D9A4C">Posted By:</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="forum">
                        <div class="forum-item">
                           <img src="img/coding.svg" alt="forum" width="40">
                           <div class="content">
                              <a href="#" class="h6 title">Create HTML5 Website</a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18"> Websites, IT &amp; Software - Verified Payment </time>
                              </div>
                              <p class="text" style="max-width: 450px">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                 fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                 sequi nesciunt. <a href="#" rel="external" class=" " style="text-color: #666"> Read more..</a>
                              </p>
                              <br>
                              <a href="YourAccount-ContestDetails.html" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E"><i class="fa fa-trophy" aria-hidden="true" ></i>OPEN CONTEST PANEL</a> <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #F9593B"><i class="fa fa-ban" aria-hidden="true" ></i>LEAVE CONTEST</a>
                           </div>
                        </div>
                     </td>
                     <td class="topics"><a href="#" class="h6 count">$3000</a><br>
                        <a href="#" class="h6 count">T24500</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18">SBP: 100p</time>
                     </td>
                     <td class="posts"><a href="#" class="h6 count">8 Days left</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18"></time>
                     </td>
                     <td class="freshness">
                        <div class="author-freshness">
                           <img class="" src="img/badge11.png" alt="author">
                           <p></p>
                           <a href="#" class="h6 title">Mathilda Brinker</a>
                           <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td class="forum">
                        <div class="forum-item">
                           <img src="img/typewriter.svg" alt="forum" width="40">
                           <div class="content">
                              <a href="#" class="h6 title">Screenplay </a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18"> Writing &amp; Content - Verified Payment </time>
                              </div>
                              <p class="text" style="max-width: 450px">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                 fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                 sequi nesciunt. <a href="#" rel="external" class=" " style="text-color: #666"> Read more..</a>
                              </p>
                              <br>
                              <a href="YourAccount-ContestDetails.html" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E"><i class="fa fa-trophy" aria-hidden="true" ></i>OPEN CONTEST PANEL</a> <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #F9593B"><i class="fa fa-ban" aria-hidden="true" ></i>LEAVE CONTEST</a>
                           </div>
                        </div>
                     </td>
                     <td class="topics"><a href="#" class="h6 count">$3000</a><br>
                        <a href="#" class="h6 count">T24500</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18">SBP: 100p</time>
                     </td>
                     <td class="posts"><a href="#" class="h6 count">8 Days left</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18"></time>
                     </td>
                     <td class="freshness">
                        <div class="author-freshness">
                           <img class="" src="img/badge11.png" alt="author">
                           <p></p>
                           <a href="#" class="h6 title">Mathilda Brinker</a>
                           <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
                           <p></p>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td class="forum">
                        <div class="forum-item">
                           <img src="img/tools.svg" alt="forum" width="40">
                           <div class="content">
                              <a href="#" class="h6 title">Create Logo</a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18"> Design, Media &amp; Architecture - Verified Payment </time>
                              </div>
                              <p class="text" style="max-width: 450px">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                 fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                 sequi nesciunt. <a href="#" rel="external" class=" " style="text-color: #666"> Read more..</a>
                              </p>
                              <br>
                              <a href="YourAccount-ContestDetails.html" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E"><i class="fa fa-trophy" aria-hidden="true" ></i>OPEN CONTEST PANEL</a> <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #F9593B"><i class="fa fa-ban" aria-hidden="true" ></i>LEAVE CONTEST</a>
                           </div>
                        </div>
                     </td>
                     <td class="topics"><a href="#" class="h6 count">$3000</a><br>
                        <a href="#" class="h6 count">T24500</a>
                     </td>
                     <td class="posts"><a href="#" class="h6 count"> Days left</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18"></time>
                     </td>
                     <td class="freshness">
                        <div class="author-freshness">
                           <img class="" src="img/badge11.png" alt="author">
                           <p></p>
                           <a href="#" class="h6 title">Mathilda Brinker</a>
                           <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td class="forum">
                        <div class="forum-item">
                           <img src="img/translator.svg" alt="forum" width="40">
                           <div class="content">
                              <a href="#" class="h6 title">Translate Website</a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18"> Translation &amp; Languages - Verified Payment </time>
                              </div>
                              <p class="text" style="max-width: 450px">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                 fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem
                                 sequi nesciunt. <a href="#" rel="external" class=" " style="text-color: #666"> Read more..</a>
                              </p>
                              <br>
                              <a href="YourAccount-ContestDetails.html" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E"><i class="fa fa-trophy" aria-hidden="true" ></i>OPEN CONTEST PANEL</a> <a href="#" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #F9593B"><i class="fa fa-ban" aria-hidden="true" ></i>LEAVE CONTEST</a>
                           </div>
                        </div>
                     </td>
                     <td class="topics"><a href="#" class="h6 count">$3000</a><br>
                        <a href="#" class="h6 count">T24500</a>
                     </td>
                     <td class="posts"><a href="#" class="h6 count"> Days left</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18"></time>
                     </td>
                     <td class="freshness">
                        <div class="author-freshness">
                           <img class="" src="img/badge11.png" alt="author">
                           <p></p>
                           <a href="#" class="h6 title">Mathilda Brinker</a>
                           <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
                           <p></p>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="tab-pane" id="archived-jobs" role="tabpanel" aria-expanded="true">
            <div class="ui-block responsive-flex1200">
               <div class="ui-block-title">
                  <div class="w-select">
                     <div class="title">Filter By:</div>
                     <fieldset class="form-group">
                        <select class="selectpicker form-control">
                           <option value="">Select Category</option>
                           <option value="">Websites, IT & Software</option>
                           <option value="">Mobile Phone & Computing</option>
                           <option value="">Writing & Content</option>
                           <option value="">Design Media & Architecture</option>
                           <option value="">Data Entry & Admin</option>
                           <option value="">Engineering & Science</option>
                           <option value="">Product Sourcing & Manufacturing</option>
                           <option value="">Sales & Marketing</option>
                           <option value="">Business, Accounting, Human Resources & Legal</option>
                           <option value="">Translation & Languages</option>
                           <option value="">Local Jobs & Services</option>
                           <option value="">Other</option>
                        </select>
                     </fieldset>
                  </div>
                  <div class="w-select">
                     <fieldset class="form-group">
                        <select class="selectpicker form-control">
                           <option value="">Date (Descending)</option>
                           <option value="">Date (Ascending)</option>
                        </select>
                     </fieldset>
                  </div>
                  <a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Filter</a>
                  <form class="w-search">
                     <div class="form-group with-button">
                        <input class="form-control" type="text" placeholder="Search Contests...">
                        <button>
                           <svg class="olymp-magnifying-glass-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                           </svg>
                        </button>
                     </div>
                  </form>
               </div>
            </div>
            <table class="forums-table">
               <thead>
                  <tr>
                     <th class="forum" style="background-color: #9A9FBF">Archive &amp; Review Past Projects</th>
                     <th class="topics" style="background-color: #858AA7">Earnings</th>
                     <th class="posts" style="background-color: #707592">Completed:</th>
                     <th class="freshness" style="background-color: #5F637B">Posted By:</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($completed_project as $project)
                  <tr>
                     <td class="forum">
                        <div class="forum-item">
                           <img src="img/coding.svg" alt="forum" width="40">
                           <div class="content">
                              <a href="javascript:;" class="h6 title">{{$project->name}}</a>
                              <div class="post__date">
                                 <time class="published" datetime="2017-03-24T18:18"> Websites, IT &amp; Software - Verified Payment </time>
                              </div>
                              <p class="text" style="max-width: 450px">{{$project->short_descripttion}}</p>
                              <br>
                              <?php
                                 $is_seeker = $user->isSeeker();
                                 $is_alchemist = $user->isAlchemist();
                                 if($is_seeker) {
                                    $name_user = $project->userwon->full_name;
                                    $user_to = $project->userwon->id;
                                    $is_reviewed = $project->is_reviewed($project->user->id);
                                 }
                                 if($is_alchemist) {
                                    $name_user = $project->user->full_name;
                                    $user_to = $project->user->id;
                                    $is_reviewed = $project->is_reviewed($project->userwon->id);
                                 }
                              ?>
                              @if(!$is_reviewed)
                              <a href="javascript:;" data-bid_id="{{$project->bidwon->id}}" data-name_user="{{$name_user}}" data-user_to="{{$user_to}}" class="btn btn-secondary btn-sm btn-icon-left open_review_modal" style="background-color: #90cb1e;" ><i class="fa fa-comments" aria-hidden="true" ></i>REVIEW PROJECT</a>
                              @else
                              <a href="javascript:;" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-secondary btn-sm btn-icon-left" style="background-color: #9A9FBF"><i class="fa fa-check-circle" aria-hidden="true" ></i>REVIEW COMPLETED</a>
                              @endif
                           </div>
                        </div>
                     </td>
                     <td class="topics"><a href="#" class="h6 count">${{$project->budget}}</a><br>
                        <a href="#" class="h6 count">T24500</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18">SBP: 100p</time>
                     </td>
                     <td class="posts"><a href="#" class="h6 count">Completed:</a><br>
                        <time class="entry-date updated" datetime="2017-06-24T18:18">27/11/2018</time>
                     </td>
                     <td class="freshness">
                        <div class="author-freshness">
                           <img class="" src="img/badge11.png" alt="author">
                           <p></p>
                           <a href="javascript:;" class="h6 title">{{$project->user->full_name}}</a>
                           <time class="entry-date updated" datetime="2017-06-24T18:18">Contact Seeker</time>
                           <p></p>
                           <a href="javascript:;" data-toggle="modal" data-target="#job-post-seeker" class="btn btn-purple btn-sm btn-icon-left" style="background-color: #7C5AC2"><i class="fa fa-comments" aria-hidden="true"></i>CHAT</a>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <!-- ... end News Feed Form  -->
</div>
   {!!$awarding->links('pagination.default')!!}
   <!-- include modal here  -->
   @include('modal.review')

@endsection
@endif

@section('scripts')
   <script type="text/javascript">
      $(document).on('click', '.btn_cancelawardbid', function(e) {
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
      });
      $(document).on('click', '.btn_acceptawardbid', function(e) {
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
                     setTimeout(function(){window.location.reload();} , 2000);
                  }else{
                     jQuery.sticky(data.message, {classList: 'important', speed: 200, autoclose: 5000});
                  }
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
         data_bid = beforeOpenReviewModal(bid_id);
         name_user = $(this).data('name_user');
         user_to = $(this).data('user_to');
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
   </script>
@endsection
