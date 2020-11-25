@extends('layouts.master')
@section('title')
Profile Setting
@endsection
@section('content')

<!-- Top Header-Profile -->
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h6 class="mb-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="color: #515365; margin-top: -5px;">+ Open Nicholas's Statistics <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                    </h6>
                </div>

                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="header-content-wrapper"> <span></span>
                <div class="monthly-indicator">
                <div class="monthly-count">&nbsp;</div>
            </div>
            <div class="monthly-indicator">
                            <a href="#" class="btn btn-control bg-blue">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                            </a>

                            <div class="monthly-count"> Lv 05<span class="period">Level: Aprentice</span></div>
            </div>
            <div class="monthly-indicator">
                            <a href="#" class="btn btn-control bg-green">
                                <svg class="olymp-trophy-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use></svg>
                            </a>

                            <div class="monthly-count"> 8355 <span class="period">Skill Points</span></div>
            </div>
            <div class="monthly-indicator">
                            <a href="#" class="btn btn-control bg-primary">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-badge-icon"></use></svg>
                            </a>

                            <div class="monthly-count">2,600<span class="period">Tokens</span></div>
            </div>

            <div class="monthly-indicator">
                            <a href="#" class="btn btn-control bg-purple">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>
                            </a>

                            <div class="monthly-count"> $12,589 <span class="period">Fiat Chest</span></div>
             </div>
                        <div class="monthly-indicator">
                            <a href="#" class="btn btn-control bg-breez">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>
                            </a>

                            <div class="monthly-count"> 44,500 <span class="period">Likes</span></div>
                        </div>
                        <div class="monthly-indicator">
                            <a href="#" class="btn btn-control bg-yellow">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>
                            </a>

                            <div class="monthly-count"> 4,500 <span class="period">Followers</span></div>
                        </div>
                        <div class="monthly-indicator">
                            <a href="#" class="btn btn-control bg-grey">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>
                            </a>

                            <div class="monthly-count"> 3,400 <span class="period">Complted Projects</span></div>
                        </div>
                        <div class="monthly-indicator">
                            <a href="#" class="btn btn-control bg-secondary">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>
                            </a>

                            <div class="monthly-count"> 320 <span class="period">Articles</span></div>
                        </div>
                        <p></p>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="ui-block">
                <div class="top-header">
                    <div class="top-header-thumb">
                        <img src="img/mybanner.jpg" alt="nature">
                    </div>
                    <div class="profile-section">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 ">
                                <ul class="profile-menu">
                                    <li>
                                        <a href="ProfilePage-Timline.html">Timline</a>
                                    </li>
                                    <li> <a href="ProfilePage-About.html">About</a> </li>
                                    <li>
                                        <div class="more"><span class="left-menu-title">Connections</span>
                                          <ul class="more-dropdown more-with-triangle">
                                                <li>
                                                    <a href="ProfilePage-FellowAlchemists.html">Fellow Alchemists</a>
                                                </li>
                                                <li>
                                                    <a href="ProfilePage-FellowAlchemists(Seeker View).html">Fellow Alchemists (Seeker View)</a>
                                                </li>
                                                <li>
                                                    <a href="ProfilePage-FellowSeekers.html">Seeker Connections</a>
                                                </li>
                                                <li>
                                                    <a href="ProfilePage-FavouritePages.html">Favourite Pages</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-5 ml-auto col-md-5">
                                <ul class="profile-menu more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="ProfilePage-Portfolio-Alchemunity.html">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="ProfilePage-MyArticles.html">Articles</a>
                                    </li>
                                    <li>
                                        <div class="more">
                                            <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                            <ul class="more-dropdown more-with-triangle">
                                                <li>
                                                    <a href="#">Report Profile</a>
                                                </li>
                                                <li>
                                                    <a href="#">Block Profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="control-block-button">
                            <a href="#" class="btn btn-control bg-blue">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                            </a>

                            <a href="#" class="btn btn-control bg-purple">
                                <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
                            </a>

                            <div class="btn btn-control bg-primary more">
                                <svg class="olymp-settings-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

                                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#update-header-photo">Update Profile Photo</a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
                                    </li>
                                    <li>
                                        <a href="#">Account Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-header-author">
                        <a href="#" class="author-thumb">
                            <img src="img/author-main1.jpg" alt="author">
                        </a>
                        <div class="author-content"><a href="#" class="h4 author-name">James Rogers</a>
                          <div class="country">Hong Kong, Sheung Wan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Auth::id())
<div class="container">
    <div class="row">
        <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
            <div class="ui-block">
          <div class="ui-block-title">
                    <div class="h6 title">My Hire / Consultation Rates </div>

                  <div class="align-right"> <a href="#" class="btn btn-primary btn-md-2">Save all Changes</a></div>
</div>
                <div class="ui-block-content">

                    
                    <!-- Form Hobbies and Interests -->
                    
                    <form>
                      <div class="row">
                    <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                  
                      <h6>Hourly Hire 
                                 <span class="count-stat">$</span>
                                <span class="country">USD</span>
                                 <img src="img/flag1.jpg" alt="flag" style="PADDING-BOTTOM: 2px">
                                </h6>
                      
                      <div class="input-group number-spinner">
                                <span class="input-group-btn data-dwn input-group-prepend">
                                <button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                        </span>
                        <input type="text" class="form-control text-center" value="60" min="0" max="100000">
                                <span class="input-group-btn data-up input-group-append">
                                    <button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                </span>
                            </div>
                        </div>
                            <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                              <h6>Weekly Hire <span class="count-stat">$</span>
                                <span class="country">USD</span>
                                 <img src="img/flag1.jpg" alt="flag" style="PADDING-BOTTOM: 2px"></h6>
                              <div class="input-group number-spinner number-spinner--secondary">
                                <span class="input-group-btn data-dwn input-group-prepend">
                                <button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                </span>
                                <input type="text" class="form-control text-center" value="400" min="-50" max="100050">
                                <span class="input-group-btn data-up input-group-append">
                                    <button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                </span>
                            </div>
                        </div>
                    <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                        <h6>6 Month Consultancy <span class="count-stat">$</span>
                                <span class="country">USD</span>
                                 <img src="img/flag1.jpg" alt="flag" style="PADDING-BOTTOM: 2px"></h6>
                        <div class="input-group number-spinner number-spinner--breez">
                                <span class="input-group-btn data-dwn input-group-prepend">
                                <button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                </span>
                                <input type="text" class="form-control text-center" value="8000" min="300" max="100050">
                                <span class="input-group-btn data-up input-group-append">
                                    <button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                </span>
                        </div>
                    </div>
                        <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                            <h6>1 Year Consultancy <span class="count-stat">$</span>
                                <span class="country">USD</span>
                                <img src="img/flag1.jpg" alt="flag" style="PADDING-BOTTOM: 2px">
                            </h6>
                            <div class="input-group number-spinner number-spinner--green">
                                <span class="input-group-btn data-dwn input-group-prepend">
                                <button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                </span>
                                <input type="text" class="form-control text-center" value="15000" min="0" max="100050">
                                <span class="input-group-btn data-up input-group-append">
                                    <button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                </span>
                            </div>
                         </div>
                    
                        </div>
                    </form>
                    
                    <!-- ... end Form Hobbies and Interests -->

                </div>
            </div>
            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Personal Information</h6>
                </div>
                <div class="ui-block-content">

                    
                    <!-- Personal Information Form  -->
                    
                    <form method="post" action="{{route('profile.settings')}}">
                        @csrf
                        <div class="row">
                        
                            @if (count($errors) > 0)
                            <!-- Alert Message -->
                            <div class="col-sm-12 col-12">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">First Name</label>
                                    <input class="form-control" name="first_name" type="text" value="{{$user->first_name}}">
                                </div>
                    
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Email</label>
                                    <input class="form-control" name="email" type="email" value="{{$user->email}}">
                                </div>
                    
                                <div class="form-group date-time-picker label-floating">
                                    <label class="control-label">Your Birthday</label>
                                    <input name="birthday" value="10/24/1984" />
                                    <span class="input-group-addon">
                                        <svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
                                    </span>
                                </div>
                            </div>
                    
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" name="last_name" type="text" value="{{$user->last_name}}">
                                </div>
                    
                              <div class="form-group label-floating">
                                    <label class="control-label">Your Website</label>
                                    <input class="form-control" placeholder="" type="text" value="wedidit.com">
                                </div>
                    
                    
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Phone Number</label>
                                    <input class="form-control" name="phone" type="text" value="{{$user->phone}}">
                                </div>
                            </div>
                    
                            <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Your Country</label>
                                    <select class="selectpicker form-control">
                                        <option value="US">China</option>
                                        <option value="AU">Australia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Your State / Province</label>
                                    <select class="selectpicker form-control">
                                        <option value="CA">Hong Kong</option>
                                        <option value="TE">SAR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Your City</label>
                                    <select class="selectpicker form-control">
                                        <option value="SF">Hong Kong Island</option>
                                        <option value="NY">Kowloon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                              <div class="form-group label-floating">
                                    <label class="control-label">Write a little description about you</label>
                                    <textarea class="form-control" name="description">Hi, I’m James, I’m 32 and I work as a Digital Designer for the  “Wedidit” Agency in Sheung Wan and love to snowboard, design and chew bubblegum </textarea>
                                </div>
                    
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Your Gender</label>
                                    <select class="selectpicker form-control" name="sex">
                                        <option value="Male" @if($user->sex == "Male") selected @endif>Male</option>
                                        <option value="Female" @if($user->sex == "Female") selected @endif>Female</option>
                                    </select>
                                </div>
                    
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Religious Belifs</label>
                                    <input class="form-control" placeholder="" type="text">
                                </div>
                            </div>
                            
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Your Birthplace</label>
                                    <input class="form-control" placeholder="" type="text">
                                </div>
                    
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Occupation</label>
                                    <input class="form-control" placeholder="" type="text" value="UI/UX Designer">
                                </div>
                    
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Status</label>
                                    <select class="selectpicker form-control">
                                        <option value="MA">Married</option>
                                        <option value="FE">Not Married</option>
                                    </select>
                                </div>
                    
                                <div class="form-group label-floating">
                                    <label class="control-label">Political Incline</label>
                                    <input class="form-control" placeholder="" type="text" value="Democrat">
                                </div>
                            </div>
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group with-icon label-floating">
                                    <label class="control-label">Your Facebook Account</label>
                                    <input class="form-control" type="text" name="meta[fb]" value="www.facebook.com/james_rogers">
                                    <i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
                                </div>
                                <div class="form-group with-icon label-floating">
                                    <label class="control-label">Your Twitter Account</label>
                                    <input class="form-control" type="text" name="meta[tw]" value="www.twitter.com/james_rogers">
                                    <i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <label class="control-label">Your RSS Feed Account</label>
                                    <input class="form-control" type="text">
                                    <i class="fa fa-rss c-rss" aria-hidden="true"></i>
                                </div>
                                <div class="form-group with-icon label-floating">
                                    <label class="control-label">Your Dribbble Account</label>
                                    <input class="form-control" type="text" value="www.dribbble.com/thecowboydesigner">
                                    <i class="fab fa-dribbble c-dribbble" aria-hidden="true"></i>
                                </div>
                                <div class="form-group with-icon label-floating is-empty">
                                    <label class="control-label">Your Spotify Account</label>
                                    <input class="form-control" type="text">
                                    <i class="fab fa-spotify c-spotify" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
                            </div>
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <button class="btn btn-primary btn-lg full-width">Save all Changes</button>
                            </div>
                    
                        </div>
                    </form>
                    
                    <!-- ... end Personal Information Form  -->
                </div>
            </div>
        </div>

        <div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
            <div class="ui-block">

                
                
                <!-- Your Profile  -->
                
                <div class="your-profile">
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">Your PROFILE</h6>
                    </div>
                
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Profile Settings
                                        <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                                    </a>
                                </h6>
                            </div>
                
                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                <ul class="your-profile-menu">
                                    <li>
                                        <a href="YourAccount-PersonalInformation.html">Personal Information</a>
                                    </li>
                                    <li>
                                        <a href="YourAccount-AccountSettings.html">Account Settings</a>
                                    </li>
                                    <li>
                                        <a href="YourAccount-ChangePassword.html">Change Password</a>
                                    </li>
                                    <li>
                                        <a href="YourAccount-HobbiesAndInterests.html">Hobbies and Interests</a>
                                    </li>
                                    <li>
                                        <a href="YourAccount-EducationAndEmployement.html">Education and Employement</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
                    <div class="ui-block-title"><a href="YourAccount-Notifications.html" class="h6 title"> Notifications</a> <a href="YourAccount-Notifications.html" class="items-round-little bg-primary">8</a></div>
                    <div class="ui-block-title">
                        <a href="YourAccount-ChatMessages.html" class="h6 title">Chat / Messages</a>
                        <a href="YourAccount-ChatMessages.html" class="items-round-little bg-purple">7</a>
                    </div>
                    <div class="ui-block-title"><a href="YourAccount-FriendsRequests.html" class="h6 title">Seeker / Alchemist Requests</a> <a href="YourAccount-FriendsRequests.html" class="items-round-little bg-blue">4</a></div>
                    <div class="ui-block-title"><a href="YourAccount-Skill-Contest-Notifications.html" class="h6 title">Skill / Contest Notifications</a> <a href="YourAccount-Skill-Contest-Notifications.html" class="items-round-little bg-green">4</a></div>
                    <div class="ui-block-title ui-block-title-small">
                        <h6 class="title">FAVOURITE / COMPANY PAGE</h6>
                    </div>
                    <div class="ui-block-title"><a href="YourAccount-Fav-Company-Create.html" class="h6 title">Create Fav / Company Page</a></div>
                    <div class="ui-block-title">
                        <a href="YourAccount-Fav-Company-Create.html" class="h6 title">Fav / Company Page Manager</a>
                    </div>
                </div>
                
                <!-- ... end Your Profile  -->
                

            </div>
        </div>
    </div>
</div>
@endif
@endsection


