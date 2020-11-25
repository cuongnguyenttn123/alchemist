<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title')</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="{{asset('public/frontend/')}}/">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendor/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/selectize.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/job_search.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/cuongstyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/vendor/parsleyjs/css/parsley.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/font-awesome.css')}}"/>
    <!-- Main Font -->
    <script src="js/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>
    @yield('styles')

</head>

<body class="page-has-left-panels">



{{-- @if(Auth::check()) --}}
@include('layouts.fixedbar')
{{-- @endif --}}

<!-- Header-BP-logout -->

@if(Auth::check())
<header class="header" id="site-header">
@else

<header class="header header--logout" id="site-header">
    <a href="javascript:;" class="logo">
        <div class="img-wrap">
            <img src="img/Alchem-Logo-Icon-White.png" alt="Alchemunity">
        </div>
    </a>
@endif

    <div class="page-title">
        <h6>@yield('title')</h6>
    </div>
    <div class="header-content-wrapper">
        <form class="search-bar w-search notification-list friend-requests">
            <div class="form-group with-button">
                <input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
                <button>
                    <svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
                </button>
            </div>
        </form>

        @if(Auth::check())

    <div class="control-block">
        <div class="control-icon more has-items">
            <svg class="olymp-happy-star-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
            </svg>
            <?php $notif = $user->notifications()->unread('job');?>
            <div class="label-avatar" style="background-color: #FFB600">{{$notif->count()}}</div>
            <div class="more-dropdown more-with-triangle triangle-top-center">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">INCREASE SKILL FEED</h6>
                    <a href="javascript:;">Find Exams & Contests</a>

                    <a href="javascript:;">Settings</a>

                 </div>
                <div class="mCustomScrollbar" data-mcs-theme="dark">
                    <ul class="notification-list friend-requests">
                        @foreach($notif as $n )
                            @include('notification.content-job')
                        @endforeach
                    </ul>
                </div>
                <input type="hidden" name="deleteNotif" value="{{route('deleteNotif')}}">
                <a href="{{route('getMarkAsRead')}}" class="view-all" style="background-color: #FF9E00">Check All Skill Notifications</a>
            </div>
        </div>
        <div class="control-icon more has-items">
            <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
            <div class="label-avatar bg-blue">0</div>

            <div class="more-dropdown more-with-triangle triangle-top-center">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">CONNECTION REQUESTS</h6>
                    <a href="javascript:;">Find Connections</a>
                    <a href="javascript:;">Settings</a>
                </div>

                <div class="mCustomScrollbar" data-mcs-theme="dark">
                    <ul class="notification-list friend-requests">
                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar55-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="javascript:;" class="h6 notification-friend">Tamara Romanoff</a>
                                <span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
                            </div>
                            <span class="notification-icon">
                                <a href="javascript:;" class="accept-request">
                                    <span class="icon-add without-text">
                                        <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>
                                </a>

                                <a href="javascript:;" class="accept-request request-del">
                                    <span class="icon-minus">
                                        <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>
                                </a>

                            </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            </div>
                        </li>

                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar56-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="javascript:;" class="h6 notification-friend">Tony Stevens</a>
                                <span class="chat-message-item">4 Friends in Common</span>
                            </div>
                            <span class="notification-icon">
                                <a href="javascript:;" class="accept-request">
                                    <span class="icon-add without-text">
                                        <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>
                                </a>

                                <a href="javascript:;" class="accept-request request-del">
                                    <span class="icon-minus">
                                        <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>
                                </a>

                            </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            </div>
                        </li>

                        <li class="accepted">
                            <div class="author-thumb">
                                <img src="img/avatar57-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                You and <a href="javascript:;" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="javascript:;" class="notification-link">her wall</a>.
                            </div>
                            <span class="notification-icon">
                                <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                            </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                <svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                            </div>
                        </li>

                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar58-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <a href="javascript:;" class="h6 notification-friend">Stagg Clothing</a>
                                <span class="chat-message-item">9 Friends in Common</span>
                            </div>
                            <span class="notification-icon">
                                <a href="javascript:;" class="accept-request">
                                    <span class="icon-add without-text">
                                        <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>
                                </a>

                                <a href="javascript:;" class="accept-request request-del">
                                    <span class="icon-minus">
                                        <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>
                                </a>

                            </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                            </div>
                        </li>

                    </ul>
                </div>
                <a href="YourAccount-FriendsRequests.html" class="view-all bg-blue">Check all Invitations</a>
            </div>
        </div>

        <div class="control-icon more has-items">
            <svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
            <?php $notif = $user->notifications()->unread('message');?>
            <div class="label-avatar bg-purple">{{$notif->count()}}</div>

            <div class="more-dropdown more-with-triangle triangle-top-center">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Chat / Messages</h6>
                    <a href="javascript:;">Mark all as read</a>
                    <a href="javascript:;">Settings</a>
                </div>

                <div class="mCustomScrollbar" data-mcs-theme="dark">
                    <ul class="notification-list chat-message">
                        @foreach($notif as $n )
                            @include('notification.content-message')
                       @endforeach
                    </ul>
                </div>

                <a href="YourAccount-ChatMessages.html" class="view-all bg-purple">View All Messages</a>
            </div>
        </div>

        <div class="control-icon more has-items">
            <svg class="olymp-thunder-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use></svg>

            <div class="label-avatar bg-primary">0</div>

            <div class="more-dropdown more-with-triangle triangle-top-center">
                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">Notifications</h6>
                    <a href="javascript:;">Mark all as read</a>
                    <a href="javascript:;">Settings</a>
                </div>

                <div class="mCustomScrollbar" data-mcs-theme="dark">
                    <ul class="notification-list">
                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar62-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <div><a href="javascript:;" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="javascript:;" class="notification-link">profile status</a>.</div>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                            </div>
                                <span class="notification-icon">
                                    <svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                <svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                            </div>
                        </li>

                        <li class="un-read">
                            <div class="author-thumb">
                                <img src="img/avatar63-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <div>You and <a href="javascript:;" class="h6 notification-friend">Nicholas Grissom</a> are now connected. Write on <a href="javascript:;" class="notification-link">his wall</a>.</div>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
                            </div>
                                <span class="notification-icon">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                <svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                            </div>
                        </li>

                        <li class="with-comment-photo">
                            <div class="author-thumb">
                                <img src="img/avatar64-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <div><a href="javascript:;" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="javascript:;" class="notification-link">photo</a>.</div>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
                            </div>
                                <span class="notification-icon">
                                    <svg class="olymp-comments-post-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use></svg>
                                </span>

                            <div class="comment-photo">
                                <img src="img/forum3.png" alt="photo">
                                <span>“looks incredible in that project! We should see each...”</span>
                            </div>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                <svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                            </div>
                        </li>

                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar65-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <div><a href="javascript:;" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="javascript:;" class="notification-link">Gotham Bar</a>.</div>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
                            </div>
                                <span class="notification-icon">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                <svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                            </div>
                        </li>

                        <li>
                            <div class="author-thumb">
                                <img src="img/avatar66-sm.jpg" alt="author">
                            </div>
                            <div class="notification-event">
                                <div><a href="javascript:;" class="h6 notification-friend">James Summers</a> commented on your new <a href="javascript:;" class="notification-link">profile status</a>.</div>
                                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
                            </div>
                                <span class="notification-icon">
                                    <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                </span>

                            <div class="more">
                                <svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                <svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
                            </div>
                        </li>
                    </ul>
                </div>

                <a href="YourAccount-Notifications.html" class="view-all bg-primary">View All Notifications</a>
            </div>
        </div>

        <div class="author-page author vcard inline-items more">
            <div class="author-thumb">

                {!!$user->avatar_img!!}
                <span class="icon-status online"></span>
                <div class="more-dropdown more-with-triangle">
                    <div class="mCustomScrollbar" data-mcs-theme="dark">
                        <div class="ui-block-title ui-block-title-small">
                          <h6 class="title">ENGAGE</h6>
                        </div>
                        <ul class="account-settings">
                            <li>
                                @if($user->is_seeker())
                                <a href="{{route('profile.newproject')}}">
                                    <img src="svg-icons/menu/post-it.svg">
                                    <span>Create Project</span>
                                </a>
                                @else
                                <a href="{{route('search')}}">
                                    <img src="svg-icons/menu/post-it.svg">
                                    <span>List Project</span>
                                </a>
                                @endif
                            </li>
                            <li>
                                @if($user->is_seeker())
                                <a href="{{route('profile.newcontest')}}">
                                    <img src="svg-icons/menu/trophy.svg">
                                    <span>New Contest</span>
                                </a>
                                @else
                                <a href="{{route('getListAllContest')}}">
                                    <img src="svg-icons/menu/trophy.svg">
                                    <span>List Contest</span>
                                </a>
                                @endif
                            </li>
                        </ul>
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Your Account</h6>
                        </div>

                        <ul class="account-settings">
                            <li>
                                <a href="{{route('profile.index')}}">
                                    <img src="svg-icons/sprites/profile.svg">
                                    <span>Profile Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <img src="svg-icons/menu/pyramid.svg">
                                    <span>Manage Membership</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.logout')}}">
                                    <svg class="olymp-logout-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>


                        <div class="ui-block-title ui-block-title-small">
                          <h6 class="title">Earnings</h6>
                        </div>

                        <ul class="account-settings">
                            <li>
                                <a href="{{route('profile.thefinancemanager')}}">
                                    <img src="svg-icons/menu/coins.svg" width="25" hspace="1" class="align-center">
                                    <span>${{$user->wallet}} USD</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('profile.thefinancemanager')}}">
                                    <img src="svg-icons/menu/gem.svg" width="25" hspace="1" class="align-center">
                                    <span>{{$user->total_credit}} CRT</span>
                                </a>
                            </li>
                        </ul>

                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Custom Status</h6>
                        </div>

                        <form class="form-group with-button custom-status">
                            <input class="form-control" placeholder="" type="text" value="Space Cowboy">

                            <button class="bg-purple">
                                <svg class="olymp-check-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-check-icon"></use></svg>
                            </button>
                        </form>
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Profile Status</h6>
                        </div>
                        <ul class="account-settings">
                            <div class="skills-item">
                                <div class="skills-item-info">
                                    <span class="skills-item-title">Profile Completion</span>
                                    <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76" data-from="0"></span><span class="units">76%</span></span>
                                </div>
                                <div class="skills-item-meter">
                                    <span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
                                </div>
                            </div>

                            <span>Complete <a style="display: inline-block;" href="{{route('profile.index')}}">your profile</a> and earn free Craft Credit & Tokens!</span>
                        </ul>


                    </div>

                </div>
            </div>
            <a href="javascript:;" class="author-name fn">
                <div class="author-title">{{$user->full_name}}
                    <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                </div>
                <span class="author-subtitle">${{$user->wallet}}</span></a>
        </div>

    </div>
        @else
        <div class="form--login-logout">
            <form class="form_login form-inline" method="post" action="{{route('ajax.login')}}">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-sm" type="text" name="username" placeholder="Username" value="" required>
                    <span class="errors">{{$errors -> first('username')}}</span>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-sm" type="password" name="password" placeholder="Password" value="" required>
                    <span class="errors">{{$errors -> first('password')}}</span>
                </div>
                <button type="submit" class="btn btn-primary btn-md-2">Login</button>
                <button type="button" data-toggle="modal" data-target="#registration-login-form-popup" class="btn btn-purple btn-md-2 signup">Sign Up</button>
                @if(session('err'))
                {!!session('err')!!}
                @endif
            </form>
            <a href="javascript:;" class="btn btn-primary btn-md-2 login-btn-responsive" data-toggle="modal" data-target="#registration-login-form-popup">Login</a>
        </div>
        @endif
    </div>
</header>

<header class="header header-responsive" id="site-header-responsive" >
    @if(Auth::check())
    <div class="header-content-wrapper">
        <ul class="nav nav-tabs mobile-app-tabs" role="tablist" >
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#search" role="tab">
               <svg class="olymp-magnifying-glass-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
               </svg>
               <svg class="olymp-close-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
               </svg>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#work" role="tab">
               <div class="control-icon has-items">
                  <svg class="olymp-happy-star-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                  </svg>
                  <div class="label-avatar" style="background-color: #FFB600">6</div>
               </div>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#request" role="tab">
               <div class="control-icon has-items">
                  <svg class="olymp-heart-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                  </svg>
                  <div class="label-avatar bg-blue">6</div>
               </div>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#chat" role="tab">
               <div class="control-icon has-items">
                  <svg class="olymp-chat---messages-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                  </svg>
                  <div class="label-avatar bg-purple">2</div>
               </div>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#notification" role="tab">
               <div class="control-icon has-items">
                  <svg class="olymp-thunder-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-thunder-icon"></use>
                  </svg>
                  <div class="label-avatar bg-primary">8</div>
               </div>
            </a>
         </li>
            <div class="author-page author vcard inline-items more">

                <div class="author-thumb">

                    {!!$user->avatar_img!!}
                    <span class="icon-status online"></span>
                    <div class="more-dropdown more-with-triangle">
                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <div class="ui-block-title ui-block-title-small">
                              <h6 class="title">ENGAGE</h6>
                            </div>
                            <ul class="account-settings">
                                <li>
                                    @if($user->is_seeker())
                                    <a href="{{route('profile.newproject')}}">
                                        <img src="svg-icons/menu/post-it.svg">
                                        <span>Create Project</span>
                                    </a>
                                    @else
                                    <a href="{{route('search')}}">
                                        <img src="svg-icons/menu/post-it.svg">
                                        <span>Post Project</span>
                                    </a>
                                    @endif
                                </li>
                                <li>
                                    @if($user->is_seeker())
                                    <a href="{{route('profile.newcontest')}}">
                                        <img src="svg-icons/menu/trophy.svg">
                                        <span>New Contest</span>
                                    </a>
                                    @else
                                    <a href="{{route('getListAllContest')}}">
                                        <img src="svg-icons/menu/trophy.svg">
                                        <span>List Contest</span>
                                    </a>
                                    @endif
                                </li>
                            </ul>
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Your Account</h6>
                            </div>

                            <ul class="account-settings">
                                <li>
                                    <a href="{{route('profile.index')}}">
                                        <img src="svg-icons/sprites/profile.svg">
                                        <span>Profile Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <img src="svg-icons/menu/pyramid.svg">
                                        <span>Manage Membership</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('user.logout')}}">
                                        <svg class="olymp-logout-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>

                                        <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>


                            <div class="ui-block-title ui-block-title-small">
                              <h6 class="title">Earnings</h6>
                            </div>

                            <ul class="account-settings">
                                <li>
                                    <a href="{{route('profile.thefinancemanager')}}">
                                        <img src="svg-icons/menu/coins.svg" width="25" hspace="1" class="align-center">
                                        <span>${{$user->wallet}} USD</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('profile.thefinancemanager')}}">
                                        <img src="svg-icons/menu/gem.svg" width="25" hspace="1" class="align-center">
                                        <span>{{$user->total_credit}} CRT</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Custom Status</h6>
                            </div>

                            <form class="form-group with-button custom-status">
                                <input class="form-control" placeholder="" type="text" value="Space Cowboy">

                                <button class="bg-purple">
                                    <svg class="olymp-check-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-check-icon"></use></svg>
                                </button>
                            </form>
                            <div class="ui-block-title ui-block-title-small">
                                <h6 class="title">Profile Status</h6>
                            </div>
                            <ul class="account-settings">
                                <div class="skills-item">
                                    <div class="skills-item-info">
                                        <span class="skills-item-title">Profile Completion</span>
                                        <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76" data-from="0"></span><span class="units">76%</span></span>
                                    </div>
                                    <div class="skills-item-meter">
                                        <span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
                                    </div>
                                </div>

                                <span>Complete <a style="display: inline-block;" href="{{route('profile.index')}}">your profile</a> and earn free Craft Credit & Tokens!</span>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
   <!-- Tab panes -->
    <div class="tab-content tab-content-responsive hungpro-tab">
      <div class="tab-pane " id="work" role="tabpanel">
         <div class="mCustomScrollbar" data-mcs-theme="dark">
            <div class="ui-block-title ui-block-title-small">
               <h6 class="title">PROJECT & CONTEST</h6>
               <a href="#">VIEW ALL</a>
               <a href="#">Settings</a>
            </div>
            @include('myprofile.notification-project')
            <a href="YourAccount-Skill-Contest-Notifications.html" class="view-all" style="background-color: #FF9E00">Check All Skill Notifications</a>
         </div>
      </div>
      <div class="tab-pane " id="request" role="tabpanel">
         <div class="mCustomScrollbar" data-mcs-theme="dark">
            <div class="ui-block-title ui-block-title-small">
               <h6 class="title">FAVOURITE REQUESTS</h6>
               <a href="#"></a>
               <a href="#">Settings</a>
            </div>
            @include('myprofile.notification-favourite')
            <a href="#" class="view-all bg-blue">Check all your Events</a>
         </div>
      </div>
      <div class="tab-pane " id="chat" role="tabpanel">
         <div class="mCustomScrollbar" data-mcs-theme="dark">
            <div class="ui-block-title ui-block-title-small">
               <h6 class="title">Chat / Messages</h6>
               <a href="#">Mark all as read</a>
               <a href="#">Settings</a>
            </div>
            @include('myprofile.notification-chatmessage')
            <a href="#" class="view-all bg-purple">View All Messages</a>
         </div>
      </div>
      <div class="tab-pane " id="notification" role="tabpanel">
         <div class="mCustomScrollbar" data-mcs-theme="dark">
            <div class="ui-block-title ui-block-title-small">
               <h6 class="title">Notifications</h6>
               <a href="#">Mark all as read</a>
               <a href="#">Settings</a>
            </div>
            @include('myprofile.notifications')
            <a href="#" class="view-all bg-primary">View All Notifications</a>
         </div>
      </div>
      <div class="tab-pane " id="search" role="tabpanel">
         <form class="search-bar w-search notification-list friend-requests">
            <div class="form-group with-button">
               <input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
            </div>
         </form>
      </div>
    </div>
   <!-- ... end  Tab panes -->
    @else
    <div class="form--login-logout">
        <form class="form_login form-inline" method="post" action="{{route('ajax.login')}}">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-sm" type="text" name="username" placeholder="Username" value="" required>
                <span class="errors">{{$errors -> first('username')}}</span>
            </div>
            <div class="form-group">
                <input class="form-control form-control-sm" type="password" name="password" placeholder="Password" value="" required>
                <span class="errors">{{$errors -> first('password')}}</span>
            </div>
            <button type="submit" class="btn btn-primary btn-md-2">Login</button>
            <button type="button" data-toggle="modal" data-target="#registration-login-form-popup" class="btn btn-purple btn-md-2">Sign Up</button>
            @if(session('err'))
            {!!session('err')!!}
            @endif
        </form>
        <a href="javascript:;" class="btn btn-primary btn-md-2 login-btn-responsive" data-toggle="modal" data-target="#registration-login-form-popup">Login</a>
    </div>
    @endif
</header>


<!-- Top Header-Profile Logout -->
<div class="header-spacer"></div>


@if(!Auth::id())
@include('layouts.modal_register')
@endif
