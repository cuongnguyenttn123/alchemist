<div class="ui-block">
  <div class="news-feed-form ">
    <!-- Tab panes -->
    <div class="ui-block-title ui-block-title-small">
      <h6 class="title">Filter Preferences</h6>
    </div>
    <div class="tab-content">
      <div id="home-1" class="tab-pane active" id="alchemist-filter" role="tabpanel" aria-expanded="true">
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne-2"
                 style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2-{{$screen}}"
                   aria-expanded="true" aria-controls="collapseOne-2"><img src="svg-icons/sprites/tools.svg" width="15"
                                                                           hspace="1"
                                                                           style="PADDING-BOTTOM: 3px; margin-left: 2px">
                  <span
                    style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Search Skills </span>
                  <svg class="olymp-dropdown-arrow-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
                </a>
              </h6>
            </div>
            <div id="collapseOne-2-{{$screen}}" class="collapse show" role="tabpanel" aria-labelledby="headingOne-2">
              <div class="col col-lg-12 col-12 no-padding" style="padding-left: 1.55rem;padding-top: 20px;">
                <h6>+ Search Skills</h6>
              </div>
              <ul class="your-profile-menu">
                <li style="padding-bottom: 10px;">
                  <select class="selectize" name="filter_skill[]" multiple="multiple">
                    <option value="">Enter Skills To Search...</option>
                    @foreach($skills as $skill)
                      <option value="{{(int)$skill->id}}"
                        {{isset($_GET['filter_skill'])&&in_array($skill->id,$_GET['filter_skill'])? 'selected' : ''}}
                      >{{$skill->name}}</option>
                    @endforeach
                  </select>
                </li>
                <button class="btn btn-blue clear_selectize">Clear Skills</button>
              </ul>
            </div>
          </div>
        </div>
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne-3"
                 style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-3-{{$screen}}"
                   aria-expanded="true" aria-controls="collapseOne-3"><img src="svg-icons/sprites/star-icon.svg"
                                                                           width="15" hspace="1"
                                                                           style="PADDING-BOTTOM: 3px; margin-left: 2px">
                  <span
                    style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Select Level</span>
                  <svg class="olymp-dropdown-arrow-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
                </a>
              </h6>
            </div>

            <div id="collapseOne-3-{{$screen}}" class="collapse " role="tabpanel" aria-labelledby="headingOne-3">
              <ul class="your-profile-menu" style="padding-bottom: 0px">
                @foreach($seeker_title as $level)
                  @php
                    $checked = isset($inputs['level'])&&in_array($level->id,$inputs['level'])? 'checked' : '';
                  @endphp
                  <li>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="level[]" value="{{(int)$level->id}}" {{$checked}}>{{$level->name}}
                      </label>
                    </div>
                  </li>
                @endforeach

              </ul>
            </div>
          </div>
        </div>

        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne-5"
                 style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-5-{{$screen}}"
                   aria-expanded="true" aria-controls="collapseOne-5">
                  <img src="svg-icons/menu/maps-and-flags.svg" width="15" hspace="1"
                       style="PADDING-BOTTOM: 3px; margin-left: 2px">
                  <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Location </span>
                  <svg class="olymp-dropdown-arrow-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
                </a>
              </h6>
            </div>

            <div id="collapseOne-5-{{$screen}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-3">

              <ul class="your-profile-menu">
                <h6 style="padding-top: 20px;">+ Add Location</h6>
                <li style="padding-bottom: 10px;">
                  <select class="selectize" name="location[]" multiple="multiple">
                    <option value="">Seeker Location</option>
                    @foreach($list_location as $location)
                      <option
                        value="{{(int)$location->id}}" {{isset($inputs['location'])&&in_array($location->id,$inputs['location'])? 'selected' : ''}}>{{$location->country}}</option>
                    @endforeach
                  </select>
                </li>
                <button class="btn btn-blue clear_selectize">Clear Location</button>
              </ul>
            </div>
          </div>
        </div>
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne-5"
                 style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-6-{{$screen}}"
                   aria-expanded="true" aria-controls="collapseOne-6">
                  <img src="svg-icons/menu/chat.svg" width="15" hspace="1"
                       style="PADDING-BOTTOM: 3px; margin-left: 2px">
                  <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Language </span>
                  <svg class="olymp-dropdown-arrow-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
                </a>
              </h6>
            </div>
            <div id="collapseOne-6-{{$screen}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-3">
              <ul class="your-profile-menu">
                <h6 style="padding-top: 20px;">+ Add Language</h6>
                <li style="padding-bottom: 10px;">
                  <select class="selectize" name="language[]" multiple="multiple">
                    <option value="">Select Language</option>
                    @foreach($list_language as $language)
                      <option
                        value="{{(int)$language->id}}" {{isset($inputs['language'])&&in_array($language->id,$inputs['language'])? 'selected' : ''}}>{{$language->language_name}}</option>
                    @endforeach
                  </select>
                </li>
                <button class="btn btn-blue clear_selectize">Clear Language</button>
              </ul>
            </div>
          </div>
        </div>
        <input type="hidden" name="type" value="seeker">
        <div class="align-center" style="background-color: #fff;padding: 20px 20px 5px;">
          <button class="btn btn-blue" style="width: 100%;padding: 15px 0;">SEARCH</button>
        </div>
      </div>
    </div>
  </div>
</div>
