
<div class="container">
    <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="card">
                     <div class="card-header" role="tab" id="headingTwo">
                        <h6 class="mb-0">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="color: #515365; margin-top: -5px;">+ Open {{$target_user->full_name}}'s Statistics <i class="fa fa-angle-down" aria-hidden="true"></i>
                           </a>
                        </h6>
                     </div>
                     <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="header-content-wrapper">
                           <span></span>
                           <div class="monthly-indicator">
                              <div class="monthly-count">&nbsp;</div>
                           </div>
                           <div class="monthly-indicator">
                              <a href="javascript:;" class="btn btn-control bg-blue">
                                 <svg class="olymp-happy-face-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
                                 </svg>
                              </a>
                              <div class="monthly-count"> Lv {{$target_user->level}}<span class="period">Level: {{$target_user->user_title}}</span></div>
                           </div>
                           <div class="monthly-indicator">
                              <a href="javascript:;" class="btn btn-control bg-green">
                                 <svg class="olymp-trophy-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-trophy-icon"></use>
                                 </svg>
                              </a>
                              <div class="monthly-count"> {{$target_user->total_point()}} <span class="period">Skill Points</span></div>
                           </div>
                           <div class="monthly-indicator">
                              <a href="javascript:;" class="btn btn-control bg-primary">
                                 <svg class="olymp-happy-face-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-badge-icon"></use>
                                 </svg>
                              </a>
                              <div class="monthly-count">0<span class="period">Tokens</span></div>
                           </div>
                           <div class="monthly-indicator">
                              <a href="javascript:;" class="btn btn-control bg-purple">
                                 <svg class="olymp-happy-face-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                                 </svg>
                              </a>
                              <div class="monthly-count"> ${{$target_user->wallet}} <span class="period">Wallet</span></div>
                           </div>
                           <div class="monthly-indicator">
                              <a href="javascript:;" class="btn btn-control bg-breez">
                                 <svg class="olymp-happy-face-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                                 </svg>
                              </a>
                              <div class="monthly-count">N/A<span class="period">Likes</span></div>
                           </div>
                           <div class="monthly-indicator">
                              <a href="javascript:;" class="btn btn-control bg-yellow">
                                 <svg class="olymp-happy-face-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                                 </svg>
                              </a>
                              <div class="monthly-count">N/A<span class="period">Followers</span></div>
                           </div>
                           <div class="monthly-indicator">
                              <a href="javascript:;" class="btn btn-control bg-grey">
                                 <svg class="olymp-happy-face-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                                 </svg>
                              </a>
                              <div class="monthly-count">N/A<span class="period">Completed Projects</span></div>
                           </div>
                           <div class="monthly-indicator">
                              <a href="javascript:;" class="btn btn-control bg-secondary">
                                 <svg class="olymp-happy-face-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                                 </svg>
                              </a>
                              <div class="monthly-count">{{$target_user->posts->count()}}<span class="period">Articles</span></div>
                           </div>
                           <p></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
    </div>
</div>
