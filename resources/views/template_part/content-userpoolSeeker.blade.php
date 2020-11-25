<div class="ui-block">
  <!-- Friend Item -->
  <div class="friend-item fav-page">
    <div class="friend-header-thumb">
      <img src="{{$mem->profile_banner == null ? "https://development.alchemunity.com/public/avatars/jamie.seeker.A_profilebanner.jpg" : $mem->profile_banner}}" alt="friend">
    </div>
    <div class="friend-item-content">
      <div class="more">
        <svg class="olymp-three-dots-icon">
          <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
        </svg>
        <ul class="more-dropdown">
          <li>
            <a href="#">Report Profile</a>
          </li>
          <li>
            <a href="#">Block Profile</a>
          </li>
          <li>
            <a href="#">Turn Off Notifications</a>
          </li>
        </ul>
      </div>
      <h1></h1>
      <div class="friend-avatar">
        <div class="author-thumb">
          <img width="92" height="92" alt="author" src="{{$mem->avatar == null ? "https://development.alchemunity.com/public/avatars/user.svg" : $mem->avatar}}" class="avatar">
          <div class="label-avatar bg-primary" data-toggle="tooltip" data-placement="left" title="Alchemist Lvl"
               style="position: sticky; z-index: 4; margin-top: -100px; width: 28px;height: 28px; padding-top: 6px;font-size: 11px">{{$mem->level}}</div>
          @auth
            <div class="label-avatar bg-secondary control-block-button post-control-button "
                 style=" position: sticky; margin-left: 62px;margin-top: 40px;width: 34px;height: 34px; padding-top: 7px;padding-bottom: 7px;padding-left: 2.8px;font-size: 11px;border: 0px solid #fff;line-height: 0px">
              <?php
              $s_text = ($mem->is_saved()) ? 'SAVED' : 'SAVE';
              $bg = ($mem->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
              ?>
              <span>
                        <a data-toggle="tooltip" data-placement="right" href="javascript:"
                           class="btn btn-control saved_user {{$bg}}" data-id="{{$mem->id}}"
                           title="{{$s_text}} {{$user->followings->count()}}/15"
                           style="margin-left: -3px;margin-top: -7px;">
                           <img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-like-post-icon"
                                style="border: 0px solid #fff;border-radius: 0%;width: 17px;margin-top: 2px;margin-left: 8px">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                          </svg>
                        </a>
                     </span>
            </div>
          @endif
        </div>
        <div class="author-content">
          <a href="{{$mem->permalink()}}" class="h5 author-name inline-items"><img src="svg-icons/Flags/country-code/{{$mem->countryflag}}.svg" width="17" hspace="1"
                                                                                   style="padding-bottom: 3px;vertical-align: reset;
                                                                                     margin-left: 0px; margin-right: 6px;">{{$mem->full_name}}</a>
          <div class="country "><strong>{{($mem->rolename == 'Seeker') ? 'Seeker' : $mem->rolename.' |'}} | {{$mem->user_title}} | LVL {{$mem->level}}</strong></div>
          <div class="country">
            @foreach($list_location as $country)
              @if($mem->_location == $country->id)
                {{$country->country}}
              @endif
            @endforeach, {{$mem->user_detail['state'] ?? ""}}</div>
        </div>

        <div class="skills-item inline-items" style="margin-bottom: 10px">

          <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; ">
            <div class="units">
              <div>
                <font color="#71768E " style="font-weight: 400; margin-right: 0px;">{{number_format((float)$mem->rating, 1, '.', '')}}</font>
                <font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font>
              </div>
            </div>
          </div>
          <div class="rating-box">
            <div class="rating-a" style="width:{{$mem->rating*20}}%;"></div>
          </div>
        </div>
        <p class="friend-about" data-swiper-parallax="-500">
          <span>{{$mem->get_usermeta('description') ?? 'N/A'}}</span>
          @if($mem->rolename == 'Alchemist')
            ----
            <br>
            <em class="skill-dc">{{ $mem->myskills}}</em>
          @endif
        </p>
        <div class="friend-count">
          <a href="#" class="friend-count-item">
            <div class="h6">{{$mem->points}}</div>
            <div class="title">{{$mem->point_name}}</div>
          </a>
          <a href="#" class="friend-count-item">
            <div class="h6">LV {{$mem->level}}</div>
            <div class="title">{{$mem->user_title}}</div>
          </a>
          <a href="#" class="friend-count-item">
            <div class="h6">{{$mem->RP}}</div>
            <div class="title">RP</div>
          </a>
        </div>
      </div>
    </div>
    <div class="your-profile " style="border-top: solid; border-top-width: 1px;border-top-color: #E6ECF5">
      @include('partials.findSeekers.infoTabSeeker')
    </div>
  </div>
  <!-- ... end Friend Item -->
</div>

