<div class="col col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
   <div class="ui-block" style="border-bottom: 0px solid">
      <!-- Friend Item -->
      <div class="friend-item">
         <div class="friend-header-thumb">
            <img src="img/3-318x122-Alchemist-card.png" alt="friend">
         </div>
         <div class="friend-item-content">
            <div class="more">
               @auth
               <svg class="olymp-three-dots-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
               </svg>
               <ul class="more-dropdown">
                  <li>
                     <a href="javascript:;">Report Profile</a>
                  </li>
                  <li>
                     <a href="javascript:;">Block Profile</a>
                  </li>
               </ul>
               @endauth
            </div>
            <div class="friend-avatar">
               <div class="author-thumb">
                  {!!$mem->getAvatarImgAttribute(92)!!}
                  <div class="label-avatar bg-primary" style="position: relative; margin-right: -23px;margin-top: -100px;width: 25px;height: 25px; padding-top: 4px;padding-right: 2px;font-size: 11px"><span></span>{{$mem->level}}</span></div>
                  @auth
                  <div class="label-avatar bg-secondary control-block-button post-control-button " style=" margin-left: 60px;margin-top: 40px;width: 34px;height: 34px; padding-top: 7px;padding-bottom: 7px;padding-left: 2.8px;font-size: 11px;border: 0px solid #fff;line-height: 0px">
                     <?php
                        $cl = 'bg-secondary';
                        $title = "Save";
                        if($user->users_saved->contains($mem))
                           $cl = 'bg-primary'; $title = "Remove";
                        $s_text = ($mem->is_saved()) ? 'SAVED' : 'SAVE';
                        $bg = ($mem->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
                     ?>
                     <span>
                        <a data-toggle="tooltip" data-placement="right" href="javascript:;" class="btn btn-control saved_user {{$bg}}" data-id="{{$mem->id}}" title="{{$s_text}} {{$user->users_saved->count()}}/15" style="margin-left: -3px;margin-top: -7px;">
                           <img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-like-post-icon" style="border: 0px solid #fff;border-radius: 0%;width: 17px;margin-top: -8px" >
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
                           </svg>
                        </a>
                     </span>
                  </div>
                  @endif
               </div>
               <div class="author-content">
                  <a href="{{$mem->permalink()}}" class="h5 author-name">{{$mem->full_name}}</a>
                  <div class="country">${{$mem->get_usermeta('hourly_hire')}}/HR | Hong Kong, CH</div>
               </div>
            </div>
            <div class="swiper-container">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <p class="friend-about" data-swiper-parallax="-500">
                        {{$mem->get_usermeta('description') ?? 'N/A'}}
                        <br>
                        <em>{{$mem->myskills}}</em>
                     </p>
                     <div class="friend-count" data-swiper-parallax="-500">
                        <a href="#" class="friend-count-item">
                           <div class="h6">{{$mem->points}}</div>
                           <div class="title">{{$mem->point_name}}</div>
                        </a>
                        <a href="#" class="friend-count-item">
                           <div class="h6">LV {{$mem->level}}</div>
                           <div class="title" >{{$mem->user_title}}</div>
                        </a>
                        <a href="#" class="friend-count-item">
                           <div class="h6">{{$mem->RP}}</div>
                           <div class="title">RP</div>
                        </a>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="friend-count" data-swiper-parallax="-500">
                        <a href="#" class="friend-count-item">
                           <div class="h6">22</div>
                           <div class="title">Badges</div>
                        </a>
                        <a href="#" class="friend-count-item">
                           <div class="h6">32</div>
                           <div class="title">Likes</div>
                        </a>
                        <a href="#" class="friend-count-item">
                           <div class="h6">30</div>
                           <div class="title">Concurs</div>
                        </a>
                     </div>
                     <div class="friend-count" data-swiper-parallax="-500">
                        <a href="#" class="friend-count-item">
                           <div class="h6">22</div>
                           <div class="title">Articles</div>
                        </a>
                        <a href="#" class="friend-count-item">
                           <div class="h6">304</div>
                           <div class="title">Projects</div>
                        </a>
                        <a href="#" class="friend-count-item">
                           <div class="h6">30</div>
                           <div class="title">Contests</div>
                        </a>
                     </div>
                     <div class="friend-count" data-swiper-parallax="-500">
                        <a href="#" class="friend-count-item">
                           <div class="h6">2342</div>
                           <div class="title">Skill Based Pts</div>
                        </a>
                        <a href="#" class="friend-count-item">
                           <div class="h6">1456</div>
                           <div class="title">Reputation Pts</div>
                        </a>
                     </div>
                     <div class="friend-since" data-swiper-parallax="-500">
                        <span>ALCHEMIST LEVEL</span>
                        <div class="h6">Sorcerer | LV 29</div>
                     </div>
                  </div>
                  <div class="swiper-slide" align="left">
                     <div class="skills-item" >
                        <div class="skills-item-info">
                           <span class="skills-item-title">
                              <span class="paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">Contests (Won/Placed/Joined)</span>
                           </span>
                           <span class="skills-item-count paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">
                              <span class="units color-5">{{$mem->contests_win()->count()}}/{{$mem->contests_placed()->count()}}/{{$mem->contests_joined()->count()}}</span>
                           </span>
                        </div>
                     </div>
                     <div class="skills-item" >
                        <div class="skills-item-info">
                           <span class="skills-item-title">
                              <span class="paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">Reviews (Done/Incomplete)</span>
                           </span>
                           <span class="skills-item-count paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">
                              <span class="count-animate" data-speed="50" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                              <span class="units color-5">{{$mem->reviews()->count()}}</span> <span>/ </span>
                              <span class="units color-6">0</span>
                           </span>
                        </div>
                     </div>
                     <div class="skills-item margintop-15" style="border-bottom: : 1px solid #e6ecf5;">
                        <div class="skills-item-info">
                           <span class="skills-item-title">
                              <span class="paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">Total Projects</span>
                           </span>
                           <span class="skills-item-count paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">
                              <span class="count-animate" data-speed="50" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                              <span class="units">{{$mem->projects_joined()->count()}}</span>
                           </span>
                        </div>
                     </div>
                     <div class="skills-item">
                        <div class="skills-item-info">
                           <span class="skills-item-title">
                              <span class="paddingbottom-0 paddingleft-0 fontweight-500 fontsize-13 color-2">On Budget</span>
                           </span>
                           <span class="skills-item-count paddingbottom-0 paddingleft-0 fontweight-500 fontsize-13 color-2">
                              <span class="count-animate" data-speed="50" data-refresh-interval="50" data-to="90" data-from="0"></span>
                              <span class="units">90%</span>
                           </span>
                        </div>
                        <div class="skills-item-meter margintop-10">
                           <span class="skills-item-meter-active bg-blue" style="width: 50%"></span>
                        </div>
                     </div>
                     <div class="skills-item">
                        <div class="skills-item-info">
                           <span class="skills-item-title">
                              <span class="paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">On Time Delivery</span>
                           </span>
                           <span class="skills-item-count paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">
                              <span class="count-animate" data-speed="50" data-refresh-interval="50" data-to="87" data-from="0"></span><span class="units">87%</span>
                           </span>
                        </div>
                        <div class="skills-item-meter margintop-10">
                           <span class="skills-item-meter-active bg-blue" style="width: 87%"></span>
                        </div>
                     </div>
                     <div class="skills-item paddingbottom25" style="border-bottom: : 1px solid #e6ecf5;">
                        <div class="skills-item-info">
                           <span class="skills-item-title">
                              <span class="paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">Completion Rate</span>
                           </span>
                           <span class="skills-item-count paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">
                              <span class="count-animate" data-speed="50" data-refresh-interval="50" data-to="98" data-from="0"></span>
                              <span class="units">98%</span>
                           </span>
                        </div>
                        <div class="skills-item-meter margintop-10">
                           <span class="skills-item-meter-active bg-blue" style="width: 98%"></span>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <ul class="widget w-last-photo js-zoom-gallery">
                        <li>
                           <a href="img/1.jpg">
                           <img src="img/1.jpg" alt="photo">
                           </a>
                        </li>
                        <li>
                           <a href="img/2.jpg">
                           <img src="img/2.jpg" alt="photo">
                           </a>
                        </li>
                        <li>
                           <a href="img/3.jpg">
                           <img src="img/3.jpg" alt="photo">
                           </a>
                        </li>
                        <li>
                           <a href="img/4.jpg">
                           <img src="img/4.jpg" alt="photo">
                           </a>
                        </li>
                        <li>
                           <a href="img/5.jpg">
                           <img src="img/5.jpg" alt="photo">
                           </a>
                        </li>
                        <li>
                           <a href="img/6.jpg">
                           <img src="img/6.jpg" alt="photo">
                           </a>
                        </li>
                        <li>
                           <div class="photo-album-item create-album"  style="position: relative;height: 75px;border-width: 1px">
                              <a href="#"  data-toggle="modal" data-target="#create-photo-album"#
                                 ></a>
                              <div class="content" style="padding-top: 48px"> <a class="title h6" style="color: #8F8F8F" ><i class="fas fa-images"></i></a>
                                 <span class="sub-title" style="font-size: 9px">EMPTY SLOT</span>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="photo-album-item create-album"  style="position: relative;height: 75px;border-width: 1px">
                              <a href="#"  data-toggle="modal" data-target="#create-photo-album"#
                                 ></a>
                              <div class="content" style="padding-top: 48px"> <a class="title h6" style="color: #8F8F8F" ><i class="fas fa-images"></i></a>
                                 <span class="sub-title" style="font-size: 9px">EMPTY SLOT</span>
                              </div>
                           </div>
                        </li>
                        <li>
                           <a href="ProfilePage-Portfolio-Alchemunity.html">
                              <div class="photo-album-item create-album"  style="position: relative;height: 75px;border-width: 1px">
                                 <div class="content" style="padding-top: 18px">
                           <a href="" class="title h6" >+ More</a>
                           </div>
                           </div>
                           </a>
                        </li>
                     </ul>
                     <br>
                  </div>
                  <div class="swiper-slide" style="padding-top: 0px" >
                     <div class="ui-block-content" style="margin: 0px;padding: 0px" >
                        <div class="skills-item inline-items" style="margin-bottom: 10px">
                           <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/thumbs-up.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"> Recommended</span><br>
                           <div class="counter-numbers counter h5 inline-items" style="font-size: 12px; margin-bottom: 0px;">
                              <span data-speed="2000" data-refresh-interval="15" data-to="12260" data-from="0" style="color: #71768E;font-weight: 400">0</span>
                              <div class="units">
                                 <div><font color="#3E8BED " style="font-weight: 400">SBP </font></div>
                              </div>
                           </div>
                           <ul class="rait-stars" style="margin-bottom: 0px; margin-top: 0px">
                              <li class="numerical-rating" style="margin-left: 0px; padding-left: 5px; font-size: 12px; line-height: 19px; color: #71768E;font-weight: 400">| 4.9</li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px"  aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                           </ul>
                        </div>
                        <div class="skills-item inline-items" style="margin-bottom: 10px">
                           <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/JobCard/star-icon.svg" width="14" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"> Work Quality</span><br>
                           <div class="counter-numbers counter h5 inline-items" style="font-size: 12px; margin-bottom: 0px;">
                              <span data-speed="2000" data-refresh-interval="15" data-to="12260" data-from="0" style="color: #71768E;font-weight: 400">4260</span>
                              <div class="units">
                                 <div><font color="#3E8BED " style="font-weight: 400">SBP </font></div>
                              </div>
                           </div>
                           <ul class="rait-stars" style="margin-bottom: 0px; margin-top: 0px">
                              <li class="numerical-rating" style="margin-left: 0px; padding-left: 5px; font-size: 12px; line-height: 19px; color: #71768E;font-weight: 400">| 4.9</li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px"  aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                           </ul>
                        </div>
                        <div class="skills-item inline-items" style="margin-bottom: 10px">
                           <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/chat.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"> Communication</span><br>
                           <div class="counter-numbers counter h5 inline-items" style="font-size: 12px; margin-bottom: 0px;">
                              <span data-speed="2000" data-refresh-interval="15" data-to="12260" data-from="0" style="color: #71768E;font-weight: 400">160</span>
                              <div class="units">
                                 <div><font color="#3E8BED " style="font-weight: 400">SBP </font></div>
                              </div>
                           </div>
                           <ul class="rait-stars" style="margin-bottom: 0px; margin-top: 0px">
                              <li class="numerical-rating" style="margin-left: 0px; padding-left: 5px; font-size: 12px; line-height: 19px; color: #71768E;font-weight: 400">| 4.9</li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px"  aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                           </ul>
                        </div>
                        <div class="skills-item inline-items" style="margin-bottom: 10px">
                           <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/testing.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"> Organisation</span><br>
                           <div class="counter-numbers counter h5 inline-items" style="font-size: 12px; margin-bottom: 0px;">
                              <span data-speed="2000" data-refresh-interval="15" data-to="12260" data-from="0" style="color: #71768E;font-weight: 400">5265</span>
                              <div class="units">
                                 <div><font color="#3E8BED " style="font-weight: 400">SBP </font></div>
                              </div>
                           </div>
                           <ul class="rait-stars" style="margin-bottom: 0px; margin-top: 0px">
                              <li class="numerical-rating" style="margin-left: 0px; padding-left: 5px; font-size: 12px; line-height: 19px; color: #71768E;font-weight: 400">| 4.9</li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px"  aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                           </ul>
                        </div>
                        <div class="skills-item inline-items" style="margin-bottom: 10px">
                           <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/portfolio.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 0px"> Professionalism</span><br>
                           <div class="counter-numbers counter h5 inline-items" style="font-size: 12px; margin-bottom: 0px;">
                              <span data-speed="2000" data-refresh-interval="15" data-to="12260" data-from="0" style="color: #71768E;font-weight: 400">750</span>
                              <div class="units">
                                 <div><font color="#3E8BED " style="font-weight: 400">SBP </font></div>
                              </div>
                           </div>
                           <ul class="rait-stars" style="margin-bottom: 0px; margin-top: 0px">
                              <li class="numerical-rating" style="margin-left: 0px; padding-left: 5px; font-size: 12px; line-height: 19px; color: #71768E;font-weight: 400">| 4.9</li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px"  aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                              <li>
                                 <i class="fa fa-star star-icon c-primary" style="color: #4E95EE; font-size: 10px" aria-hidden="true"></i>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- If we need pagination -->
               <div class="swiper-pagination"></div>
            </div>
         </div>
      </div>
      <!-- ... end Friend Item -->
   </div>
</div>
