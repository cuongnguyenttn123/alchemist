
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Account Settings</h6>
        </div>
        <div class="ui-block-content">
            <!-- Personal Information Form  -->
            <form method="post" action="{{route('profile.settings')}}">
                @csrf
                <div class="row">
                
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
                    
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Who Can Tag You?</label>
                                    <select class="selectpicker form-control">
                                
                                        <option value="EO">Seekers Only</option>
                                        <option value="NO">Alchemists Only</option>
                                        <option value="EO">Both</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group label-floating is-select">
                                    <label class="control-label">Who Can View Your Posts</label>
                                    <select class="selectpicker form-control">
                                    <option value="EO">Seekers Only</option>
                                    <option value="NO">Alchemists Only</option>
                                    <option value="EO">Both</option>
                                    </select>
                                </div>
                            </div>
                    
                            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="description-toggle">
                                    <div class="description-toggle-content">
                                        <div class="h6">Notifications Sound</div>
                                        <p>A sound will be played each time you receive a new activity notification</p>
                                    </div>
                    
                                    <div class="togglebutton">
                                        <label>
                                            <input type="checkbox" checked="">
                                        </label>
                                    </div>
                                </div>
                                <div class="description-toggle">
                                    <div class="description-toggle-content">
                                        <div class="h6">Notifications Email</div>
                                        <p>We’ll send you an email to your account each time you receive a new activity notification</p>
                                    </div>
                    
                                    <div class="togglebutton">
                                        <label>
                                            <input type="checkbox" checked="">
                                        </label>
                                    </div>
                                </div>
                                <div class="description-toggle">
                                    <div class="description-toggle-content">
                                        <div class="h6">Friend’s Birthdays</div>
                                        <p>Choose wheather or not receive notifications on your newsfeed</p>
                                    </div>
                    
                                    <div class="togglebutton">
                                        <label>
                                            <input type="checkbox" checked="">
                                        </label>
                                    </div>
                                </div>
                                <div class="description-toggle">
                                    <div class="description-toggle-content">
                                        <div class="h6">Chat Message Sound</div>
                                        <p>A sound will be played each time you receive a new message on an inactive chat window</p>
                                    </div>
                    
                                    <div class="togglebutton">
                                        <label>
                                            <input type="checkbox" checked="">
                                        </label>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
                            </div>
                            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                <button type="submit" class="btn btn-primary btn-lg full-width">Save all Changes</button>
                            </div>
            
                </div>
            </form>
            <!-- ... end Personal Information Form  -->
        </div>
    </div>



