@extends('myprofile.master')
@section('title')
Personal Information
@endsection
@section('profile_title')
Personal Information
@endsection
@if(Auth::id())
@section('profile_content')
<div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
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
                                <input class="datepicker" name="meta[birthday]" value="{{ isset($meta['birthday']) ? $meta['birthday'] : '' }}" />
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
                                <select class="selectpicker form-control select_country" name="country">
                                    @foreach($list_location as $country)
                                        <option value="{{$country->id}}" @if($user->_location == $country->id) selected @endif>{{$country->country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="form-group label-floating is-select">
                                <label class="control-label">Your State / Province</label>
                                <select class="selectpicker form-control list_states" name="meta[state]">
                                    <option value="{{$meta['state'] ?? ""}}">{{$meta['state'] ?? ""}}</option>
                                </select>
                            </div>
                        </div>
                        <?php
                            $list_city = ['Hong Kong', 'Kowloon', 'Tsuen Wan', 'Yuen Long', 'Tung Chung', 'Shatin', 'Tuen Mun', 'Tai Po', 'Sai Kung', 'Yung Shue Wan']
                        ?>
                        <div class="col col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="form-group label-floating is-select">
                                <label class="control-label">Your City</label>
                                <input class="form-control" name="meta[city]" placeholder="" type="text" value="{{ $meta['city'] ?? '' }}">
                                {{-- <select class="selectpicker form-control" name="meta[district]">
                                    @foreach($list_city as $city)
                                        <option value="{{$city}}" @if(isset($meta['district']) && $meta['district'] == $city) selected @endif>{{$city}}</option>
                                    @endforeach
                                </select> --}}
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

                          <style>
                            .selectize-input{
                              height: 55px;
                            }
                          </style>
                          <div class="form-group label-floating is-select">
                            <select class="selectize" name="language[]" multiple="multiple">
                              <option value="">Select Language</option>

                              @foreach($list_language as $language)
                                <?php $selected = (isset($languageUser) && in_array($language->language_name, $languageUser, TRUE )) ? 'selected' : '';?>
                                <option value="{{$language->id}}" {{$selected}}>{{$language->language_name}}</option>
                              @endforeach
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
                            <div class="form-group label-floating">
                                <label class="control-label">Hourly Rate</label>
                                <input name="meta[hourly_hire]" class="form-control" placeholder="" type="text" value="{{ isset($meta['hourly_hire']) ? $meta['hourly_hire'] : '0.00' }}" min="0" max="100000">
                            </div>
                          <div class="form-group label-floating">
                            <label class="control-label">IBAN</label>
                            <input class="form-control" name="iban" placeholder="" type="text" value="{{ isset($user->iban) ? $user->iban : '' }}"/>
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
                            <button type="submit" class="btn btn-primary btn-lg full-width">Save all Changes</button>
                        </div>
                    </div>
                <!-- ... end Personal Information Form  -->
            </div>
        </form>
    </div>
</div>


<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
    @include('myprofile.settings')
</div>

<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
    @include('myprofile.change_pass')
</div>
<div class="tab-pane fade" id="hobbies" role="tabpanel" aria-labelledby="hobbies-tab">
    @include('myprofile.hnb')
</div>
<div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
    @include('myprofile.yeh')
</div>
<div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
    @include('myprofile.notifications')
</div>
<div class="tab-pane fade" id="myskills" role="tabpanel" aria-labelledby="myskills-tab">
    @include('myprofile.myskills')
</div>
<div class="tab-pane fade" id="chat-message" role="tabpanel" aria-labelledby="chat-message-tab">
    @include('myprofile.notification-chatmessage')
</div>
<div class="tab-pane fade" id="friend" role="tabpanel" aria-labelledby="friend-tab">
    @include('myprofile.notification-favourite')
</div>
<div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="friend-tab">
    @include('myprofile.notification-project')
</div>



    <input type="hidden" name="getstate" value="{{route('ajax.getstate')}}">
    <input type="hidden" name="profile_url" value="{{route('ajax.saveinfo')}}">

@endsection
@endif


