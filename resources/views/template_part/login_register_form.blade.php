
<!-- Login-Registration Form  -->
<?php
    $bien1 = rand(9, 99);
    $bien2 = rand(99, 999);
$list_location = \App\Models\Location::orderBy('country', 'ASC')->get();
?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home<?php echo $bien1;?>" role="tab">
            <svg class="olymp-login-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-login-icon"></use>
            </svg>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile<?php echo $bien2;?>" role="tab">
            <svg class="olymp-register-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-register-icon"></use>
            </svg>
        </a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="home<?php echo $bien1;?>" role="tabpanel" data-mh="log-tab">
        <div class="title h6">Register Alchemunity</div>
        <form class="content reg_form" method="post" action="{{route('ajax.register')}}">
            @csrf
            <div class="row">
                <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group label-floating is-select">
                        <label class="control-label">User Type</label>
                        <select class="selectpicker form-control user_type" name="user_type">
                            <option value="">Select Category</option>
                                <option value="Alchemist">Alchemist (Freelancer)</option>
                                <option value="Seeker">Seeker (Employer)</option>
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
                <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">First Name</label>
                        <input class="form-control first_name" name="first_name" type="text">
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
                <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Last Name</label>
                        <input class="form-control last_name" name="last_name" type="text">
                        <span class="invalid-feedback"></span>
                    </div>
                </div>
                <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Username</label>
                        <input class="form-control username" name="username" type="text">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Your Email</label>
                        <input class="form-control email" name="email" type="email">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Your Password</label>
                        <input class="form-control password" name="password" type="password">
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="form-group date-time-picker label-floating">
                        <label class="control-label">Your Birthday</label>
                        <input class="birthday" name="birthday" value="10/24/1984" />
                        <span class="input-group-addon">
                            <svg class="olymp-calendar-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-calendar-icon"></use></svg>
                        </span>
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="form-group label-floating is-select">
                        <label class="control-label">Your Gender</label>
                        <select class="selectpicker form-control gender" name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="invalid-feedback"></span>
                    </div>
                  <div class="form-group label-floating is-select">
                    <label class="control-label">Your Country</label>
                    <select class="selectpicker form-control select_country" name="country">
                      <option value="">Select Country</option>
                      @foreach($list_location as $country)
                        <option value="{{$country->id}}">{{$country->country}}</option>
                      @endforeach
                    </select>
                  </div>
                    <div class="remember">
                        <div class="checkbox accept_term">
                            <label>
                                <input name="accept_term" type="checkbox">
                                I accept the <a href="javascript:;">Terms and Conditions</a> of the website
                            </label>
                        </div>
                        <span class="invalid-feedback"></span>
                    </div>
                    <a href="#" class="btn btn-purple btn-lg full-width submit_reg">Complete Registration!</a>
                </div>
            </div>
        </form>
    </div>

    <div class="tab-pane login" id="profile<?php echo $bien2;?>" role="tabpanel" data-mh="log-tab">
        <div class="title h6">Login to your Account</div>
        <form class="form_login content" action="{{route('ajax.login')}}">
            @csrf
            <div class="row">
                <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Username</label>
                        <input class="form-control" placeholder="" type="text" name="username">
                    </div>
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Your Password</label>
                        <input class="form-control" placeholder="" type="password" name="password">
                    </div>

                    <div class="remember">
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="1">
                                Remember Me
                            </label>
                        </div>
                        <a href="javascript:;" class="forgot">Forgot my Password</a>
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary full-width">Login</button>

                    <div class="or"></div>

                    <a href="{{ route('auth.facebook') }}" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fab fa-facebook-f" aria-hidden="true"></i>Login with Facebook</a>

                    <a href="{{ route('auth.twitter') }}" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fab fa-twitter" aria-hidden="true"></i>Login with Twitter</a>


                    <p>Don’t you have an account?
                        <a href="javascript:;">Register Now!</a> it’s really simple and you can start enjoing all the benefits!
                    </p>
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane" id="forgot_password" role="tabpanel" data-mh="log-tab">
        <div class="title h6">Forgot Password</div>
        <form class="content form-forgot" method="post" action="{{route('ajax.forgot')}}">
            @csrf
            <div class="row">
                <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Your Email</label>
                        <input class="form-control email" name="email" type="email">
                        <span class="invalid-feedback"></span>
                    </div>
                    <a class="btn btn-blue btn-md-2 backhome" style="color: #fff;">Go Back</a>
                    <input type="submit" name="" value="Submit" class="vkl btn btn-primary btn-md-2" style="float: right;width: auto;">
                </div>
            </div>
        </form>
    </div>
</div>

<!-- ... end Login-Registration Form  -->



