

            <div class="ui-block">
                <div class="ui-block-title">
                    <h6 class="title">Change Password</h6>
                </div>
                <div class="ui-block-content">
                    <!-- Change Password Form -->
                    
                    <form method="post" action="{{route('profile.change_pass')}}">
                        @csrf
                        <div class="row">
                            @if(session('error'))
                            <div class="col-sm-12 col-12"><div class="alert alert-danger">{!!session('error')!!}</div></div>
                            @endif
                            @if(session('success'))
                            <div class="col-sm-12 col-12"><div class="alert alert-success">{!!session('success')!!}</div></div>
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
                    
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Confirm Current Password</label>
                                    <input class="form-control" name="current_password" placeholder="" type="password" value="">
                                </div>
                            </div>
                    
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Your New Password</label>
                                    <input class="form-control" name="new_password" placeholder="" type="password">
                                </div>
                            </div>
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label">Confirm New Password</label>
                                    <input class="form-control" name="renew_password" placeholder="" type="password">
                                </div>
                            </div>
                    
                            
                            <div class="col col-lg-12 col-sm-12 col-sm-12 col-12">
                                <div class="remember">
                    
                                    <a href="javascript:;" class="forgot" data-toggle="modal" data-target="#restore-password">Forgot my Password</a>
                                </div>
                            </div>
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button type="submit" class="btn btn-primary btn-lg full-width">Change Password Now!</button>
                            </div>
                    
                        </div>
                    </form>
                    
                    <!-- ... end Change Password Form -->
                </div>
            </div>

