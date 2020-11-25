

        <div class="" style="margin-bottom: 0;">
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
                                <ul class="nav nav-tabs your-profile-menu" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Account Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="hobbies-tab" data-toggle="tab" href="#hobbies" role="tab" aria-controls="hobbies" aria-selected="false">Hobbies and Interests</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Education and Employement</a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>

                <div class="ui-block-title ui-block-title-small">
                    <h6 class="title">MY SKILLS</h6>
                </div>
                <ul class="nav nav-tabs your-profile-menu main" id="myTab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">
                            <div class="ui-block-title">
                                <div class="h6 title">Notifications</div>
                                <div class="items-round-little bg-primary">0</div>
                            </div>
                        </a>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" id="friend-tab" data-toggle="tab" href="#project" role="tab" aria-controls="friend" aria-selected="false">
                            <div class="ui-block-title">
                                <div class="h6 title">Projects / Contests</div>
                                <div class="items-round-little bg-blue" style="background-color: #FFB600">{{$user->notifications()->unread('job')->count()}}</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="chat-message-tab" data-toggle="tab" href="#chat-message" role="tab" aria-controls="chat-message" aria-selected="false">
                            <div class="ui-block-title">
                                <div class="h6 title">Chat / Messages</div>
                                <div class="items-round-little bg-purple">{{$user->notifications()->unread('message')->count()}}</div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="friend-tab" data-toggle="tab" href="#friend" role="tab" aria-controls="friend" aria-selected="false">
                            <div class="ui-block-title">
                                <div class="h6 title">Favourite Requests</div>
                                <div class="items-round-little bg-blue">0</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">SKILLS MANAGER</h6>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a id="myskills-tab" href="#myskills" class="nav-link" data-toggle="tab" role="tab" aria-controls="myskills" aria-selected="false">
                            <div class="ui-block-title">
                                <div class="h6 title btn btn-blue btn-sm full-width">Add Skills +</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">My Skills</h6>
                        </div>
                    </li>
                </ul>


            </div>
            <!-- ... end Your Profile  -->
        </div>
        <div class="ajax-load-skilss" style="margin-bottom: 0;">
            <!-- Your Skills  -->
            <div id="profile-panel" class="your-profile">
                <?php $user_skills = $user->skills()->get()->pluck('id')->toArray();?>
                @foreach($cats as $cat)
                <?php $c_skill = $cat->skills->pluck('id')->toArray();?>
                @if(count(array_intersect($user_skills, $c_skill)) > 0)
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="heading{{$cat->id}}">
                            <h6 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$cat->id}}" aria-expanded="true" aria-controls="collapse{{$cat->id}}">{{$cat->name}}
                                    <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                                </a>
                            </h6>
                        </div>
                        <div id="collapse{{$cat->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$cat->id}}">
                            <ul class="your-profile-menu">
                                @foreach($cat->skills as $skill)
                                @if(in_array($skill->id, $user_skills))
                                <li>
                                    <img src="img/star.svg" alt="" width="15" hspace="3" style="PADDING-BOTTOM: 3px">
                                    <span class="country">{{$skill->name}} | </span>
                                    <span class="ui-block-title-small">{{$skill->count_jobs}} Jobs</span>
                                    <span class="tag-label bg-smoke remove_skill" data-id="{{$skill->id}}" style="color: #888da8; PADDING-LEFT: 10px; PADDING-RIGHT: 10px;cursor: pointer;">X</span>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <div class="ui-block-title">
                    <a href="javascript:;" class="btn btn-grey-lighter btn-md full-width">{{$user->skills->count()}} / {{$user->limit_skill}}</a>
                </div>
                <input id="saveskill" type="hidden" name="" value="{{route('ajax.saveskill')}}">
                <input id="searchskill" type="hidden" name="" value="{{route('ajax.searchskill')}}">
                <input id="getskill" type="hidden" name="" value="{{route('ajax.getallskills')}}">
            </div>
        </div>
