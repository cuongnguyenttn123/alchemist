
<div class="container">
  <div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="margin-top: 45px">
      <div class="ui-block">
        <div class="top-header top-header-favorit">
          <div class="top-header-thumb ">
              @if($profile_banner = $target_user->profile_banner)
                  <img src="{{$profile_banner}}" class="profile_banner">
              @else
                  <img src="{{asset('public/frontend/img/mybanner.jpg')}}" alt="nature" class="profile_banner">
              @endif
            <div class="top-header-author">
              <div class="label-avatar bg-primary" style="position: sticky; z-index: 4; margin-bottom: -30px; width: 28px;height: 28px; padding-top: 6px;font-size: 11px">{{$target_user->level}}</div>
              <div class="author-thumb">
                  @if($ava = $target_user->avatar)
                      <img width="120" src="{{$ava}}" class="avatar">
                  @else
                      <img width="120" src="img/author-main1.jpg" alt="author">
                  @endif
              </div>
              <div class="author-content">
                <a href="javascript:;" class="h3 author-name">{{$target_user->full_name}}</a>
                <div class="country">{{$target_user->full_location}}</div>
                <div class="country">{{$target_user->user_type}} | {{$target_user->user_title}} Level {{$target_user->level}}</div>
              </div>
            </div>
          </div>
          <div class="profile-section with-social-menu-tabs">
            <div class="row">
              <div class="col col-xl-12 m-auto col-lg-8 col-md-12">
                <ul class="nav nav-tabs social-menu-tabs" role="tablist">
                  @php
                    $arr_menu = [
                      'Feed' => [
                          'text' => 'My Feed',
                          'route_name' => 'profile.timeline',
                          'type' => 'img',
                          'url_img' => 'svg-icons/menu/newsfeed.svg'
                          ],
                      'Settings' => [
                          'text' => 'Settings',
                          'route_name' => 'profile.index',
                          'type' => 'img',
                          'url_img' => 'svg-icons/menu/content.svg'
                          ],
                      'Portfolio' => [
                          'text' => 'Portfolio',
                          'route_name' => 'profile.portfolio',
                          'type' => 'img',
                          'url_img' => 'svg-icons/JobCard/open-folder-outline.svg'
                          ],
                      'Stats' => [
                          'text' => 'Stats',
                          'route_name' => 'profile.stats',
                          'type' => 'svg',
                          'url_img' => 'svg-icons/sprites/icons.svg#olymp-stats-icon'
                          ],
                      'Saved' => [
                          'text' => 'Saved',
                          'route_name' => 'profile.saveusers',
                          'type' => 'svg',
                          'url_img' => 'svg-icons/sprites/icons.svg#olymp-heart-icon'
                          ],
                      'work' => [
                          'text' => 'Work',
                          'route_name' => 'profile.myprojects',
                          'type' => 'svg',
                          'url_img' => 'svg-icons/sprites/icons.svg#olymp-computer-icon'
                          ],
                      'Finance' => [
                          'text' => 'Finance',
                          'route_name' => 'profile.thefinancemanager',
                          'type' => 'img',
                          'url_img' => 'svg-icons/menu/wallet.svg'
                          ],
                    ];
                    if(Route::current()->getPrefix() == '/user'){
                      $arr_menu = [
                        'Feed' => [
                          'text' => 'NewsFeed',
                          'route_name' => 'user.timeline',
                          'type' => 'img',
                          'url_img' => 'svg-icons/menu/newsfeed.svg'
                          ],
                        'Portfolio' => [
                          'text' => 'Portfolio',
                          'route_name' => 'user.portfolio',
                          'type' => 'img',
                          'url_img' => 'svg-icons/JobCard/open-folder-outline.svg'
                          ],
                        'Stats' => [
                          'text' => 'Stats',
                          'route_name' => 'user.stats',
                          'type' => 'svg',
                          'url_img' => 'svg-icons/sprites/icons.svg#olymp-stats-icon'
                          ],
                        'Saved' => [
                          'text' => 'Saved',
                          'route_name' => 'user.saveusers',
                          'type' => 'svg',
                          'url_img' => 'svg-icons/sprites/icons.svg#olymp-heart-icon'
                          ],
                        ];
                    }
                  @endphp
                  @foreach($arr_menu as $menu)
                    @php
                      $menu = (object) $menu;
                      $active = (Route::currentRouteName() == $menu->route_name) ? 'active' : '';
                      if(Route::current()->getPrefix() == '/user'){
                        $href = route($menu->route_name, $target_user->id);
                      }else {
                        $href = route($menu->route_name);
                      }
                    @endphp
                    <li class="nav-item">
                      <a class="nav-link {{$active}}" href="{{$href}}" role="tab" aria-selected="false">
                        @if($menu->type == 'img')
                        <img src="{{$menu->url_img}}" style="height: 22px;width: 22px;" class="olymp-home-icon" style="margin-right: 10px;">
                        @endif
                        @if($menu->type == 'svg')
                        <svg class="olymp-stats-icon" style="height: 22px;width: 22px;"><use xlink:href="{{$menu->url_img}}"></use></svg>
                        @endif
                        <span style="margin-left: 10px;" class="">{{$menu->text}}</span>
                      </a>
                    </li>
                  @endforeach

                </ul>
              </div>
            </div>

            <div class="control-block-button">
              <a  class="btn btn-control bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Like Profile" aria-describedby="tooltip733940">
                <svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                <div class="ripple-container"></div></a>
              <a class="btn btn-control bg-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Favourite">
                <img src="svg-icons/JobCard/save-file-option-white.svg" width="20" class="" style="vertical-align: unset "><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use>
              </a>

              <div class="btn btn-control bg-primary more">
                <svg class="olymp-settings-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

                <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                  <li>
                    <label for="change_profile_file" class="options-message" style="display: block;color: #515365;cursor: pointer;">Update Profile Photo</label>
                    <input id="change_profile_file" class="change_profile d-none" type="file" name="files" data-type="profile" accept="image/gif, image/jpeg, image/png">
                  </li>
                  <li>
                    <label for="change_header_file" class="options-message" style="display: block;color: #515365;cursor: pointer;">Update Header Photo</label>
                    <input id="change_header_file" class="change_profile d-none" type="file" name="files" data-type="header" accept="image/gif, image/jpeg, image/png">
                  </li>
                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<input type="hidden" name="update_photo" value="{{route('ajax.updateuserphoto')}}">
