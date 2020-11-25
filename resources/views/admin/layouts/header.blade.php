
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
        </div>

        <div class="navbar-brand">
            <a href="index.html"><img src="{{asset('public/admin/assets/images/logo.svg')}}" alt="Lucid Logo" class="img-responsive logo"></a>
        </div>

        <div class="navbar-right">
            <form id="navbar-search" class="navbar-form search-form">
                <input value="" class="form-control" placeholder="Search here..." type="text">
                <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
            </form>

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="file-dashboard.html" class="icon-menu d-none d-sm-block d-md-none d-lg-block"><i class="fa fa-folder-open-o"></i></a>
                    </li>
                    <li>
                        <a href="app-calendar.html" class="icon-menu d-none d-sm-block d-md-none d-lg-block"><i class="icon-calendar"></i></a>
                    </li>
                    <li>
                        <a href="app-chat.html" class="icon-menu d-none d-sm-block"><i class="icon-bubbles"></i></a>
                    </li>
                    <li>
                        <a href="app-inbox.html" class="icon-menu d-none d-sm-block"><i class="icon-envelope"></i><span class="notification-dot"></span></a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="notification-dot"></span>
                            @endif
                        </a>
                        <ul class="dropdown-menu notifications">
                            <li class="header"><strong>You have {{auth()->user()->unreadNotifications->count()}} new Notifications</strong></li>
                            @foreach(auth()->user()->unreadNotifications as $notification )
                                @if($notification ->data['type'] == "admin")
                                 <li>
                                    <a href="#" class="get_id">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-info text-warning"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text" >{{$notification->data['data']['message']}}</p>
                                                <input type="hidden" name="not_id" id="not_id" value="{{$notification->id}}">
                                                <span class="timestamp">{{ $notification->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                            @endforeach
                            @foreach(auth()->user()->readNotifications as $notification )
                                @if($notification ->data['type'] == "admin")
                                 <li>
                                    <a href="javascript:void(0);">
                                        <div class="media">
                                            <div class="media-left">
                                                <i class="icon-info text-success"></i>
                                            </div>
                                            <div class="media-body">
                                                <p class="text">{{$notification->data['data']['message']}}</p>
                                                <span class="timestamp">{{ $notification->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                            @endforeach
                           <!--
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-like text-success"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Your New Campaign <strong>Holiday Sale</strong> is approved.</p>
                                            <span class="timestamp">11:30 AM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-pie-chart text-info"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Website visits from Twitter is 27% higher than last week.</p>
                                            <span class="timestamp">04:00 PM Today</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="media-left">
                                            <i class="icon-info text-danger"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="text">Error on website analytics configurations</p>
                                            <span class="timestamp">Yesterday</span>
                                        </div>
                                    </div>
                                </a>
                            </li>-->
                            <li class="footer"><a href="{{route('getMarkAsRead')}}" class="more">Mark All As Read</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown"><i class="icon-equalizer"></i></a>
                        <ul class="dropdown-menu user-menu menu-icon">
                            <li class="menu-heading">ACCOUNT SETTINGS</li>
                            <li><a href="javascript:void(0);"><i class="icon-note"></i> <span>Basic</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-equalizer"></i> <span>Preferences</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-lock"></i> <span>Privacy</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-bell"></i> <span>Notifications</span></a></li>
                            <li class="menu-heading">BILLING</li>
                            <li><a href="javascript:void(0);"><i class="icon-credit-card"></i> <span>Payments</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-printer"></i> <span>Invoices</span></a></li>
                            <li><a href="javascript:void(0);"><i class="icon-refresh"></i> <span>Renewals</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('admin/logout')}}" class="icon-menu"><i class="icon-login"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

