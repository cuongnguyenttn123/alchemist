@extends('myprofile.master')
@section('title')
Personal Information
@endsection
@section('profile_title')
Personal Information
@endsection
@if(Auth::id())
@section('profile_content')
    <div id="responsive-container-panel" class="profile-settings-responsive">

        <a href="#" class="js-profile-settings-open profile-settings-open">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <div class="mCustomScrollbar" data-mcs-theme="dark">
            <div class="ui-block">
            </div>
        </div>
    </div>
    

    <div class="ui-block">
        <form method="post" action="{{route('profile.info')}}" enctype="multipart/form-data">
            <div class="ui-block-title">
                <div class="h6 title">Personal Information</div>
                
            </div>
            <div class="ui-block-content">
                <!-- Personal Information Form  -->
                    @csrf
                    <div class="row">
                        @if(session('success'))
                        <div class="col-sm-12 col-12">
                            <div class="alert alert-success">{!!session('success')!!}</div>
                        </div>
                        @endif
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
                                <input name="birthday" value="{{ isset($meta['birthday']) ? $meta['birthday'] : '' }}" />
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
                                <input class="form-control" name="meta[website]" placeholder="" type="text" value="{{ isset($meta['website']) ? $meta['website'] : 'google.com' }}">
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Your Phone Number</label>
                                <input class="form-control" name="phone" type="text" value="{{$user->phone}}">
                            </div>
                        </div>

                        <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="form-group label-floating is-select">
                                <label class="control-label">Your Country</label>
                                <select class="selectpicker form-control" name="country">
                                    @foreach($list_location as $country)
                                        <option value="{{$country->id}}" @if($user->_location == $country->id) selected @endif>{{$country->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="form-group label-floating is-select">
                                <label class="control-label">Your State / Province</label>
                                <select class="selectpicker form-control">
                                    <option value="">Hong Kong</option>
                                </select>
                            </div>
                        </div>
                        <?php 
                            $list_city = ['Hong Kong', 'Kowloon', 'Tsuen Wan', 'Yuen Long', 'Tung Chung', 'Shatin', 'Tuen Mun', 'Tai Po', 'Sai Kung', 'Yung Shue Wan']
                        ?>
                        <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="form-group label-floating is-select">
                                <label class="control-label">Your City</label>
                                <select class="selectpicker form-control" name="meta[district]">
                                    @foreach($list_city as $city)
                                        <option value="{{$city}}" @if(isset($meta['district']) && $meta['district'] == $city) selected @endif>{{$city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            
                            <div class="form-group label-floating">
                                <label class="control-label">Write a little description about you</label>
                                <textarea class="form-control" name="meta[description]">{{$target_user->get_usermeta('description') ?? 'N/A'}}</textarea>
                            </div>
                            <div class="form-group label-floating is-select">
                                <label class="control-label">Your Gender</label>
                                <select class="selectpicker form-control" name="sex">
                                    <option value="1" @if($user->sex == 1) selected @endif>Male</option>
                                    <option value="0" @if($user->sex == 0) selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            
                            <div class="form-group label-floating">
                                <label class="control-label">Your Occupation</label>
                                <input class="form-control" type="text" name="meta[occupation]" value="{{ isset($meta['occupation']) ? $meta['occupation'] : 'UI/UX Designer' }}">
                            </div>
                            <div class="form-group label-floating is-select">
                                <label class="control-label">Currency</label>
                                <select class="selectpicker form-control" name="meta[currency]">
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency}}" @if($user->get_usermeta('currency') == $currency) selected @endif>{{$currency}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="row">
                                <div class="col col-lg-6 col-md-6 col-sm-6 col-6">
                                    <h7 style="padding-bottom: 4px;font-size: 11px;">Hourly Rate 
                                        <span class="country">:USD</span>
                                    </h7>
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn data-dwn input-group-prepend">
                                            <button type="button" class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                        </span>
                                        <input name="hourly_hire" value="{{ isset($meta['hourly_hire']) ? $meta['hourly_hire'] : '60' }}" type="text" class="form-control text-center" min="0" max="100000">
                                        <span class="input-group-btn data-up input-group-append">
                                            <button type="button" class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col col-lg-6 col-md-6 col-sm-6 col-6">
                                    <h7 style="padding-bottom: 4px;font-size: 11px;">Weekly Rate 
                                        <span class="country">:USD</span>
                                    </h7>
                                    <div class="input-group number-spinner number-spinner--secondary">
                                        <span class="input-group-btn data-dwn input-group-prepend">
                                        <button type="button" class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
                                        </span>
                                        <input name="weekly_hire" value="{{ isset($meta['weekly_hire']) ? $meta['weekly_hire'] : '400' }}" type="text" class="form-control text-center" min="50" max="100050">
                                        <span class="input-group-btn data-up input-group-append">
                                            <button type="button" class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group with-icon label-floating">
                                <label class="control-label">Your Facebook Account</label>
                                <input class="form-control" type="text" name="meta[facebook]" value="{{ isset($meta['facebook']) ? $meta['facebook'] : '' }}">
                                <i class="fab fa-facebook-f c-facebook" aria-hidden="true"></i>
                            </div>
                            <div class="form-group with-icon label-floating">
                                <label class="control-label">Your Twitter Account</label>
                                <input class="form-control" type="text" name="meta[twitter]" value="{{ isset($meta['twitter']) ? $meta['twitter'] : '' }}">
                                <i class="fab fa-twitter c-twitter" aria-hidden="true"></i>
                            </div>
                            <div class="form-group with-icon label-floating">
                                <label class="control-label">Your RSS Feed Account</label>
                                <input class="form-control" type="text" name="meta[rass]" value="{{ isset($meta['rass']) ? $meta['rass'] : '' }}">
                                <i class="fa fa-rss c-rss" aria-hidden="true"></i>
                            </div>
                            <div class="form-group with-icon label-floating">
                                <label class="control-label">Your Dribbble Account</label>
                                <input class="form-control" type="text" name="meta[dribbble]" value="{{ isset($meta['dribbble']) ? $meta['dribbble'] : '' }}">
                                <i class="fab fa-dribbble c-dribbble" aria-hidden="true"></i>
                            </div>
                            <div class="form-group with-icon label-floating">
                                <label class="control-label">Your Spotify Account</label>
                                <input class="form-control" type="text" name="meta[spotify]" value="{{ isset($meta['spotify']) ? $meta['spotify'] : '' }}">
                                <i class="fab fa-spotify c-spotify" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <button type="button" class="btn btn-secondary btn-lg full-width reset_form">Restore all Attributes</button>
                        </div>
                        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                            <button class="btn btn-primary btn-lg full-width">Save all Changes</button>
                        </div>
                    </div>
                <!-- ... end Personal Information Form  -->
            </div>
        </form>
    </div>
@endsection
@endif


