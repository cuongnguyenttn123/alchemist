<div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne-{{$mem->id}}"
         style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
      <h6 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$mem->id}}" aria-expanded="true"
           aria-controls="collapseOne-{{$mem->id}}">
          <img src="svg-icons/Alchemist Info/info.svg " width="15" hspace="1"
               style="PADDING-BOTTOM: 3px; margin-right: 5px;">
          <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Information </span>
          <svg class="olymp-dropdown-arrow-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
          </svg>
        </a>
      </h6>
    </div>
    <div id="collapseOne-{{$mem->id}}" class="collapse " role="tabpanel" aria-labelledby="headingOne-{{$mem->id}}">
      {{--      Points--}}
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne-{{20+$key}}-{{$key+1}}"
               style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
            <h6 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{20+$key}}-{{$key+1}}"
                 aria-expanded="true" aria-controls="collapseOne-{{20+$key}}-{{$key+1}}">
                <img src="svg-icons/Alchemist Info/thunderbolt.svg" width="15" hspace="1"
                     style="PADDING-BOTTOM: 3px; margin-right: 5px">
                <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Points</span>
                <svg class="olymp-dropdown-arrow-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                </svg>
              </a>
            </h6>
          </div>
          <div id="collapseOne-{{20+$key}}-{{$key+1}}" class="collapse " role="tabpanel"
               aria-labelledby="headingOne-{{20+$key}}-{{$key+1}}">
            <div class="ui-block-title"
                 style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">
              <form class="w-search">
                <div class="col col-lg-12 col-12 no-padding" align="center">
                  <div class="friend-count" data-swiper-parallax="-500">
                    <a href="#" class="friend-count-item">
                      <div class="h6">2342</div>
                      <div class="title">{{($mem->rolename == 'Seeker') ? 'Seeker' : 'Skill Based'}} Pts</div>
                    </a>
                    <a href="#" class="friend-count-item">
                      <div class="h6">1456</div>
                      <div class="title">Reputation Pts</div>
                    </a>
                  </div>
                  <div class="friend-count" data-swiper-parallax="-500">
                    <a href="#" class="friend-count-item">
                      <div class="h6">32</div>
                      <div class="title">Site Posts</div>
                    </a>
                    <a href="#" class="friend-count-item">
                      <div class="h6">32</div>
                      <div class="title">Upvotes</div>
                    </a>
                    <a href="#" class="friend-count-item">
                      <div class="h6">30</div>
                      <div class="title">Downvotes</div>
                    </a>
                  </div>
                  <div class="friend-count" data-swiper-parallax="-500">
                    <a href="#" class="friend-count-item">
                      <div class="h6">22</div>
                      <div class="title">Badges</div>
                    </a>
                    <a href="#" class="friend-count-item">
                      <div class="h6">32</div>
                      <div class="title">Likes</div>
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{--      Work Stats--}}
      <div class="ajax-user-stats" data-id="{{$mem->id}}" id="accordion-{{$mem->id}}" role="tablist"
           aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne-"
               style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
            <h6 class="mb-0">
              <a data-toggle="collapse" class="Statistics-mem active" data-id="{{$mem->id}}" href="#Statistics-{{$mem->id}}" aria-expanded="true"
                 aria-controls="collapseOne-">
                <img src="svg-icons/Alchemist Info/graph-pie.svg" width="15" hspace="1"
                     style="PADDING-BOTTOM: 3px; margin-right: 5px">
                <span
                  style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Work Statistics </span>
                <svg class="olymp-dropdown-arrow-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                </svg>
              </a>
            </h6>
          </div>
          <div id="Statistics-{{$mem->id}}" class="collapse output_info" role="tabpanel" aria-labelledby="headingOne">
          </div>
        </div>
      </div>
      {{--Review Stats--}}
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne-{{20+$key}}-{{$key+3}}"
               style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
            <h6 class="mb-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{20+$key}}-{{$key+3}}"
                 aria-expanded="true" aria-controls="collapseOne-{{20+$key}}-{{$key+3}}">
                <img src="svg-icons/sprites/star-icon.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Review Statistics </span>
                <svg class="olymp-dropdown-arrow-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                </svg>
              </a>
            </h6>
          </div>
          {{--<div id="collapseOne-{{20+$key}}-{{$key+3}}" class="collapse " role="tabpanel"
               aria-labelledby="headingOne-{{20+$key}}-{{$key+3}}">
            <div class="ui-block-title"
                 style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-top-width: 0px;border-bottom-color: #E6ECF5">
              <form class="w-search">
                <div class="ui-block-content" style="margin: 0px;padding: 0px">
--}}{{--                  @include('partials.findSeekers.skills',['skills'=>$mem->isAlchemist() ? $alchemist_skills : $seeker_skills])--}}{{--
                </div>
              </form>
            </div>
          </div>--}}
          <div id="collapseOne-{{20+$key}}-{{$key+3}}" class="collapse " role="tabpanel" aria-labelledby="headingOne-{{20+$key}}-{{$key+3}}">
            <div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-top-width: 0px;border-bottom-color: #E6ECF5">
              <form class="w-search" ><div class="ui-block-content" style="margin: 0px;padding: 0px" >
                  <div class="crumina-module crumina-heading with-title-decoration " style="margin-bottom: 5px;" >
                    <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Average Rating: {{number_format((float)$mem->rating, 1, '.', '')}}</h6>
                  </div>

                  <div class="skills-item inline-items" style="margin-bottom: 10px">
                    <span style="color: #515365;font-size: 13px;font-weight: 500">
                      <img src="svg-icons/Rating/thumbs-up.svg" width="15" hspace="1" style="padding-bottom: 3px;vertical-align: reset; margin-left: 0px; margin-right: 5px;">
                      Hire Again?
                    </span>
                    <br>
                    <div class="rating-box rating-marin">
                      <div class="rating" style="width:{{$mem->ratingDetail['hire_again']*20}}%;"></div>
                    </div>

                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$mem->ratingDetail['hire_again'], 1, '.', '')}}</span>

                    </div>
                  </div>
                  <div class="skills-item inline-items" style="margin-bottom: 10px">
                    <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/JobCard/star-icon.svg" width="14" hspace="1" style="padding-bottom: 3px;vertical-align: reset; margin-left: 0px; margin-right: 5px;"> Work Quality</span><br>
                    <div class="rating-box rating-marin">
                      <div class="rating" style="width:{{$mem->ratingDetail['work_quality']*20}}%;"></div>
                    </div>
                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$mem->ratingDetail['work_quality'], 1, '.', '')}}</span>
                    </div>
                  </div>
                  <div class="skills-item inline-items" style="margin-bottom: 10px">
                    <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/chat.svg" width="15" hspace="1" style="padding-bottom: 3px;vertical-align: reset; margin-left: 0px; margin-right: 5px;"> Communication</span><br>
                    <div class="rating-box rating-marin">
                      <div class="rating" style="width:{{$mem->ratingDetail['communication']*20}}%;"></div>
                    </div>

                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$mem->ratingDetail['communication'], 1, '.', '')}}</span>

                    </div>
                  </div>


                  <div class="skills-item inline-items" style="margin-bottom: 10px">
                    <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/testing.svg" width="15" hspace="1" style="padding-bottom: 3px;vertical-align: reset; margin-left: 0px; margin-right: 5px;"> Organisation</span><br>
                    <div class="rating-box rating-marin">
                      <div class="rating" style="width:{{$mem->ratingDetail['organisation']*20}}%;"></div>
                    </div>

                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$mem->ratingDetail['organisation'], 1, '.', '')}}</span>

                    </div>
                  </div>
                  <div class="skills-item inline-items" style="margin-bottom: 10px">

                    <span style="color: #515365;font-size: 13px;font-weight: 500"> <img src="svg-icons/Rating/portfolio.svg" width="15" hspace="1" style="padding-bottom: 3px;vertical-align: reset; margin-left: 0px; margin-right: 5px;"> Professionalism</span><br>
                    <div class="rating-box rating-marin">
                      <div class="rating" style="width:{{$mem->ratingDetail['professionalism']*20}}%;"></div>
                    </div>

                    <div class=" h5 inline-items" style="font-size: 12px; margin-bottom: 0px;vertical-align: text-top;line-height: 17px; "><font color="#71768E " style="font-weight: 400; margin-right: 3px; margin-left: 3px; padding-bottom: 1px;">|</font><span  style="color: #71768E;font-weight: 400">{{number_format((float)$mem->ratingDetail['professionalism'], 1, '.', '')}}</span>

                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      {{--      Featured Portfolio--}}
      @if($mem->isAlchemist())
        <div id="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne-{{20+$key}}-{{$key+4}}"
                 style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{20+$key}}-{{$key+4}}"
                   aria-expanded="true" aria-controls="collapseOne-{{20+$key}}-{{$key+4}}">
                  <img src="svg-icons/Alchemist Info/picture.svg" width="15" hspace="1"
                       style="PADDING-BOTTOM: 3px; margin-right: 5px">
                  <span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Featured Portfolio </span>
                  <svg class="olymp-dropdown-arrow-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
                </a>
              </h6>
            </div>
            <div id="collapseOne-{{20+$key}}-{{$key+4}}" class="collapse " role="tabpanel" aria-labelledby="headingOne-1-4">
              <?php
              $listImage = $mem->feature_images;
              ?>
              @if( !empty($listImage->toArray()))
                <div class="" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
                  <div class="ui-block-content" style="margin: 0px;" >
                    <div class="row">
                      <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                        <ul class="widget w-last-photo js-zoom-gallery">
                          @foreach($listImage as $image)
                            <li>
                              <a href="{{$image->url}}">
                                <img src="{{$image->url}}" alt="photo">
                              </a>
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              @else
                <div class="">
                  <div class="ui-block-content">

                    <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                      <a data-toggle="modal" data-target=""></a>

                      <div class="content" style="margin-top: 10px">

                        <a class="btn btn-control bg-secondary" data-toggle="modal" data-target="" style="margin: auto;">
                          <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                        </a>

                        <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Files Added</a>
                        <span class="sub-title">Add reference files to attract Alchemists!</span>

                      </div>

                    </div>
                  </div><table class="shop_table cart" style="width: 100%">
                    <thead style="background-color: white;">
                    <tr> </tr>

                    </thead>
                    <tbody class="alldownload">
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
