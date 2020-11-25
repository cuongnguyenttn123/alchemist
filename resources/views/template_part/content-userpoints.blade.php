
  <div class="userpoints">
    <div class="ui-block-content">
       <div class="skills-item">
          <div class="skills-item-info">
            <img src="img/trophy-2.svg" width="21" hspace="1">
            <span class="skills-item-title"> Skill Pts Progress</span> <span class="skills-item-count">
              <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span>
              <span class="units">260 / 290</span>
            </span>
          </div>
          <div class="skills-item-meter">
            <span class="skills-item-meter-active bg-smoke bg-color-3F8DEF" style="width: 80%;"></span>
          </div>
       </div>
       <div class="ui-block">
          <div class="your-profile">
             <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                   <div class="card-header" role="tab" id="headingOne">
                      <a data-toggle="collapse" data-parent="#accordion" href="#sbp_points-{{$user->id}}" aria-expanded="true" aria-controls="collapseOne-{{$user->id}}" class="collapsed">
                          <img src="img/secure.svg" width="15" hspace="1">
                          <span data-toggle="tooltip" data-placement="top" title="Fiat Currency">General SBP Points</span>
                          <svg class="olymp-dropdown-arrow-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                          </svg>
                      </a>
                   </div>
                   <div id="sbp_points-{{$user->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$user->id}}">
                      <div class="your-profile-menu row">
                        @for($i=1;$i<=4;$i++)
                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="counter-numbers counter h5">
                              <span data-speed="2000" data-refresh-interval="15" data-to="40" data-from="0">0</span>
                              <div class="units"><font color="#3E8BED">SBP</font></div>
                            </div>
                            <div class="counter-title">Type of Point<br>Total Points</div>
                          </div>
                        @endfor
                      </div>
                   </div>
                </div>
             </div>
             <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                   <div class="card-header" role="tab" id="headingOne">
                      <a data-toggle="collapse" data-parent="#accordion" href="#review_points-{{$user->id}}" aria-expanded="true" aria-controls="review_points-24" class="collapsed">
                        <img src="img/secure.svg" width="15" hspace="1">
                        <span class="ui-block-title-small" data-toggle="tooltip" data-placement="top" title="Fiat Currency">Review Points</span>
                        <svg class="olymp-dropdown-arrow-icon">
                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                      </a>
                   </div>
                   <div id="review_points-{{$user->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-24">
                      <div class="your-profile-menu row">
                        @foreach($criteria_rating as $key=>$value)
                          <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                             <div class="counter-numbers counter h5">
                                <span data-speed="2000" data-refresh-interval="15" data-to="260" data-from="0">0</span>
                                <div class="units">
                                   <div><font color="#3E8BED">SBP</font></div>
                                </div>
                             </div>
                             <div class="counter-title">{{$value}}<br>
                             </div>
                             <ul class="rait-stars">
                                <li class="numerical-rating">{{rateToStar($user->type_point($key))}}</li>
                                {{rateToStar($user->type_point($key))}}
                                <li class="numerical-rating"><font color="#8E92AC">Average Star Rating</font></li>
                             </ul>
                          </div>
                        @endforeach
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="ui-block-content">
       <div class="skills-item">
          <div class="skills-item-info">
            <img src="img/medal.svg" width="23" hspace="1">
            <span class="skills-item-title"> Reputation Pts Progress</span>
            <span class="skills-item-count">
              <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="60" data-from="0"></span>
              <span class="units">360 / 500</span>
            </span>
          </div>
          <div class="skills-item-meter">
            <span class="skills-item-meter-active bg-smoke bg-color-FF9600" style="width: 60%;"></span>
          </div>
       </div>
       <div class="ui-block">
          <div class="your-profile">
             <div id="accordion-rp" role="tablist" aria-multiselectable="true">
                <div class="card">
                   <div class="card-header" role="tab" id="headingOne">
                      <a data-toggle="collapse" data-parent="#accordion" href="#rp-{{$user->id}}" aria-expanded="true" aria-controls="collapseOne-{{$user->id}}" class="collapsed">
                        General Reputation Points
                        <svg class="olymp-dropdown-arrow-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                      </a>
                   </div>
                   <div id="rp-{{$user->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$user->id}}">
                      <br>
                      <ul class="your-profile-menu">
                         <div class="row">
                            <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                               <div class="counter-numbers counter h5">
                                  <span data-speed="2000" data-refresh-interval="15" data-to="260" data-from="0">360</span>
                                  <div class="units">
                                     <div><font color="#FF9600">RP</font></div>
                                  </div>
                               </div>
                               <div class="counter-title">Showcase <br>
                                  Likes Pts
                               </div>
                            </div>
                            <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                               <div class="counter-numbers counter h5">
                                  <span data-speed="2000" data-refresh-interval="15" data-to="160" data-from="0">180</span>
                                  <div class="units"><font color="#FF9600">RP</font></div>
                               </div>
                               <div class="counter-title">Showcase<br>
                                  Comments Pts
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                               <div class="counter-numbers counter h5">
                                  <span data-speed="2000" data-refresh-interval="15" data-to="40" data-from="0">100</span>
                                  <div class="units"><font color="#FF9600">RP</font></div>
                               </div>
                               <div class="counter-title">Article / Post <br>
                                  Concurs Pts
                               </div>
                            </div>
                            <div class="crumina-module crumina-counter-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                               <div class="counter-numbers counter h5">
                                  <span data-speed="2000" data-refresh-interval="15" data-to="60" data-from="0">80</span>
                                  <div class="units"><font color="#FF9600">RP</font></div>
                               </div>
                               <div class="counter-title">Dispute <br>
                                  Total Points
                               </div>
                            </div>
                         </div>
                      </ul>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
  </div>