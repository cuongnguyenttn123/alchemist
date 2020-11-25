<tr class="event-item" style="">
  <td class="author">
    <div class="author-freshness" align="left">
      <span>
        <span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px; vertical-align: top">Project ID:</span>
        <span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$project->id}}</span>
        <a href="#" class="h6 title" style="font-weight: 700; padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$project->name}}</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18">
          <em style="font-size: 12px;">{{$project->catname}}</em>
        </time>
        <time class="entry-date updated" datetime="2017-06-24T18:18">
          <em style="font-size: 12px;">{{$project->skillname}}</em>
        </time>
      </span>
    </div>
  </td>
  <td class="author">
    <div class="event-author author-freshness inline-items" style="vertical-align: top;">
      <div class="author-thumb" style="position: sticky;">
        <a href="UserProfile-AboutMe.html" target="_blank">
          <img src="{{$project->user_won->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">
          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">{{$project->user_won->level}}
          </div>
        </a>
      </div>
      <div class="author-freshness"><a href="javascript:;" target="_blank" class="h6 title" style="font-weight: 700; margin-top: -5px; font-size: 12px">{{$project->user_won->full_name}}<img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;"> {{$project->user_won->user_title}} | LV {{$project->user_won->level}} </span></time>
      </div>
    </div>
  </td>



  <td class="upcoming">
    <?php
    $save_user = ($project->user_won->is_saved()) ? 'save-user-archived' : 'save-user-archived-not';
    $is_seeker = $user->isSeeker();
    $is_alchemist = $user->isAlchemist();
    $idSave = $project->user->id;
    if($is_seeker) {
      $name_user = $project->userwon->full_name;
      $user_to = $project->userwon->id;
      $is_reviewed = $project->is_reviewed($project->user->id);
      $role = 'Alchemist';
      $idSave = $project->userwon->id;
    }
    if($is_alchemist) {
      $name_user = $project->user->full_name;
      $user_to = $project->user->id;
      $is_reviewed = $project->is_reviewed($project->userwon->id);
      $role = 'Seeker';
    }
    $status_name = ($is_reviewed) ? 'Review Submitted' : 'Review Pending';
    $status_name_color = ($is_reviewed) ? 'status-color-review-sub' : 'status-color-review-pending';
    $review_alchemist = ($is_reviewed) ? 'review-alchemist-not' : 'review-alchemist btn-secondary';
    $review_alchemist_text = ($is_reviewed) ? 'Reviewed' : 'Review';
    ?>
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title apprentice-status-cn" style="font-weight: 700;">Apprentice Status:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span class="{{$status_name_color}}">{{$status_name}}</span></time>
      </div>
    </div>
  </td>

  <td class="estimate bid2-miletone">
    <a href="javascript:;" class="paddingtop7 paddingbottom7 margin0 fontsize-12 fontweight-500 post-category btn btn-sm btn-border-think c-grey btn-transparent full-width align-center">${{$project->bidwon->price}} | {{$project->bidwon->work_time}} Days</a>
    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card father-card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
        <div class="card-header" role="tab" id="headingOne-{{$project->bidwon->id}}" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
          <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$project->bidwon->id}}" aria-expanded="true" aria-controls="collapseOne">
              <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
              <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Details</span>
              <svg class="olymp-dropdown-arrow-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
              </svg>
            </a>
          </h6>
        </div>
        <div id="collapseOne-{{$project->bidwon->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$project->bidwon->id}}">
          <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
              <div class="today-events calendar">
                <ul class="order-totals-list" style="padding: 15px 15px 0px 15px;vertical-align: top">
                  <li style="padding-bottom: 15px;margin-bottom: 15px;">{{$project->bidwon->title}}</li>
                  <div class="comment-content comment">
                    {{$project->bidwon->description}}
                    <br><br>
                    <img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                    <span class="ui-block-title-small" style="margin-right: 8px">${{$project->bidwon->price}}</span>
                    <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                    <span class="ui-block-title-small" style="margin-right: 8px">{{$project->bidwon->work_time}} Days</span>
                  </div>
                </ul>
              </div>
            </div>
          </div>
          <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 8px 0px; padding: 0px 0px 10px 0px ">
              <div class="today-events calendar">
                <div class="list">
                  <div id="accordion-3" role="tablist" aria-multiselectable="true" class="day-event" style="border: none;">
                    @foreach($project->bidwon->milestones as $ms)
                      <div class="card ">
                        <div class="card-header paddingbottom10 paddingtop10" role="tab" id="headingOne-{{$ms->id}}">
                          <div class="event-time fontweight-400">
                            <time class="published color-2 paddingbottom5 fontsize-13 fontweight-500" datetime="2017-03-24T18:18">{{$ms->title}}</time>
                          </div>
                          <h5 class="mb-0 title margintop-10 paddingright20">
                            <a data-toggle="collapse" data-parent="#accordion-{{$ms->id}}" href="#collapseOne-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne" class="color-3 fontweight-400 fontsize-12">
                              {{$ms->percent_payment}}% | <span>$</span>{{$ms->price_bid}} | {{$ms->workday}} Days<i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                          </h5>
                        </div>
                        <div id="collapseOne-{{$ms->id}}" class="collapse " role="tabpanel" aria-labelledby="headingOne">
                          <div class="card-body paddingbottom10">{{$ms->description}}</div>
                          <div class="skills-item marginleft25 margintop5">
                                       <span>
                                          <img src="svg-icons/JobCard/timer.svg" width="18" hspace="1">
                                          <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-500">Duration</span>
                                       </span>
                            <span class="fontsize-12 fontweight-400">{{$ms->workday}} Days</span>
                          </div>
                          <div class="skills-item marginleft25 margintop-10">
                                       <span>
                                          <img src="svg-icons/JobCard/money-bag.svg" width="18" hspace="1">
                                          <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-500">Estimate</span>
                                       </span>
                            <span class="fontsize-12 fontweight-400">${{$ms->price_bid}} USD</span>
                          </div>
                        </div>
                      </div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="accordion-{{$project->bidwon->id}}" role="tablist" aria-multiselectable="true">
            <div class="card support-hp">
              <div class="card-header" role="tab" id="headingOne-{{$project->bidwon->id}}">
                <h6 class="mb-0">
                  <a data-toggle="collapse" data-parent="#accordion-{{$project->bidwon->id}}" href="#collapseOne--{{$project->bidwon->id}}" aria-expanded="true" aria-controls="collapseOne">
                    <img class="paddingbottom-0 marginright5" src="svg-icons/JobCard/download.svg" width="15" hspace="1">
                    <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">Support Files</span>
                    <svg class="olymp-dropdown-arrow-icon c-white">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                    </svg>
                  </a>
                </h6>
              </div>
              <div id="collapseOne--{{$project->bidwon->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-{{$project->bidwon->id}}">
                <div class="ui-block margintop10 padding0">
                  <table class="shop_table cart" style="width: 100%">
                    <thead style="background-color: white;">
                    <tr> </tr>
                    @if($files = $project->bidwon->files())
                      <tr>
                        <th class="product-thumbnail bg-img" style="background-image:none; color: #8891B6 ;">ITEM DESCRIPTION</th>
                        <th class="product-subtotal bg-img" style="background-image:none; color: #8891B6 ;">DOWNLOAD</th>
                      </tr>
                    @endif

                    </thead>
                    <tbody class="alldownload">
                    @if($files = $project->bidwon->files())
                      @foreach($files as $file)
                        <tr class="cart_item" style="border-bottom: 1px solid #e6ecf5;">
                          <td style="width: 70%;" class="product-thumbnail">
                            <div class="forum-item">
                              <div class="content">
                                <a href="{{$file->url}}" data-name="{{$file->ori_name}}" class="my-files paddingbottom5 fontsize-13 fontweight-500 h6 title" download>
                                  <span class="color-2">{{$file->name}}</span>
                                </a>
                                <div class="post__date">
                                  <time class="published">{{$file->extension}} File </time>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td style="width: 30%; text-align: center;" class="product-subtotal">
                            <a href="{{$file->url}}" class="product-del remove" title="Remove this item" download="">
                              <img src="img/inbox.svg" class="olymp-close-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                              </svg>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <td colspan="4" class="actions">
                          <a data-toggle="modal" data-target="#" href="javascript:;" class="download-all marginright10 btn btn-purple btn-md-2 btn-icon-left"><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                        </td>
                      </tr>
                    @else
                      <div class="ui-block-content">

                        <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                          <a  data-toggle="modal" data-target=""></a>

                          <div class="content" style="margin-top: 10px">

                            <a  class="btn btn-control bg-secondary" data-toggle="modal" data-target="" style="margin: auto;">
                              <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                            </a>

                            <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Files Added</a>
                            <span class="sub-title">Add reference files to attract Alchemists!</span>

                          </div>

                        </div>
                      </div>
                    @endif

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </td>
  <td class="add-event align-center coloption">
    @php
      $data_type = '';
      if(!$project->is_author()){
        $data_type = 'data-type="true"';
      }
    @endphp
    <a href="javascript:;" {{$data_type}} data-project_id="{{$project->id}}" data-bid_id="{{$project->bidwon->id}}" data-name_user="{{$name_user}}" data-user_to="{{$user_to}}" class="btn btn-sm btn-icon-left @if(!$is_reviewed) open_review_modal @endif {{$review_alchemist}}">
      @if($is_reviewed)
        <svg class="svg-inline--fa fa-check-circle fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path></svg>

      @else
        <svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
          <path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
        </svg>
      @endif
      {{$review_alchemist_text}}
        @if($review_alchemist_text == 'Review')
        {{$role}}
          @endif
    </a>
    @if(!$project->user_won->is_saved())
      <a href="javascript:;" data-toggle="modal" data-target="#job-post-seeker" class="saved_user_archi btn btn-sm btn-icon-left {{$save_user}}" data-sumuser="{{$project->user_won->followings->count()}}" data-id="{{$project->user_won->id}}" data-role="{{$role}}">
        <svg class="svg-inline--fa fa-bookmark fa-w-12" aria-hidden="true" data-prefix="fa" data-icon="bookmark" role="img"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
          <path fill="currentColor" d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z"></path></svg>
        <span>Save {{$role}}</span></a>
    @else
      <a href="javascript:;" data-toggle="modal" data-target="#hire-alchem" class="saved_user_archi btn btn-sm btn-icon-left {{$save_user}}" style="background-image: linear-gradient(#6F7CC3, #646FAB);font-weight: 500;color: #FFFFFF
									" data-sumuser="{{$project->user_won->followings->count()}}" data-id="{{$project->user_won->id}}" data-role="{{$role}}">
        <svg class="svg-inline--fa fa-bookmark fa-w-12" aria-hidden="true" data-prefix="fa" data-icon="bookmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z"></path></svg><!-- <i class="fa fa-bookmark" aria-hidden="true"></i> -->
        <span>Saved {{$project->user_won->followings->count()}}/15</span><div class="ripple-container"></div></a>
    @endif
  </td>
</tr>
