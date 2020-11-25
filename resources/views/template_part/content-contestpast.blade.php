
<tr class="event-item">
  <td class="author">
    <div class="author-freshness" align="left">
      <span><span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px">Contest ID:</span>
        <span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$contest->id}}</span>
        <a href="#" class="h6 title" style="padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$contest->id}}</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><em style="font-size: 12px;">{{$contest->catname}}</em></time>

      </span>
    </div>
  </td>
  <td class="author">
    <div class="event-author author-freshness inline-items" style="vertical-align: top;">
      <div class="author-thumb" style="position: sticky;">
        <a href="UserProfile-AboutMe.html" target="_blank">
          <img src="{{$contest->entry_win()->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">


          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">08</div></a>
      </div>
      <div class="author-freshness">
        <a href="" target="_blank" class="h6 title" style="margin-top: -5px; font-size: 12px">{{$contest->entry_win()->user->full_name}} <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$contest->entry_win()->user->user_title}} | LV {{$contest->entry_win()->user->level}}</span></time>

      </div>



    </div>
  </td>

  <td class="estimate">
     <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">3 DAYS | ${{$contest->total_prize}} USD | 400 CC | 20 SBP </a>

           <div id="accordion" role="tablist" aria-multiselectable="true">
              <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
                <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
                    <h6 class="mb-0">
                       <a data-toggle="collapse" data-parent="#accordion" href="#collapseReward-{{$contest->id}}" aria-expanded="true" aria-controls="collapseOne"><img src="svg-icons/menu/trophy.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
                          <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Reward Details</span>
                          <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                       </a>
                    </h6>
                </div>

                <div id="collapseReward-{{$contest->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20">


              <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
              <div class="ui-block-content">



              <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Position</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >1st/512</span></span></div>

               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Completed</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >10/04/2019</span></span></div>




              <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Prize Awarded</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">$2,400.68</span> HKD </span></div>

                   <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skill Points Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >20 SBP</span></span></div>

              <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Craft Credit Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >400</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>

              </div>

                   </div>
              </div>
              </div>
           </div>
  </td>


  <td class="estimate">

               <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">Contest Files</a>

               <div id="accordion"   role="tablist" aria-multiselectable="true">
              <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
                        <h6 class="mb-0">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseContestPreview11-{{$contest->id}}" aria-expanded="true" aria-controls="collapseOne"><img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                              <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
                              <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
                           </a>
                        </h6>
                    </div>

                    <div id="collapseContestPreview11-{{$contest->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
                        <div class="ui-block" style="margin-bottom: 0px">
                           <form action="#" method="post" class="cart-main">

                              <table class="shop_table cart">
                                 <thead style="background: white !important;">
                                    <tr>
                                       <th class="product-thumbnail" style="background:#ffffff; color: #888da8; padding-left: 25px">ITEM DESCRIPTION</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     @forelse($contest->entry_win()->preview_attachments() as $file)
                                       @include('template_part.content-attachdispute')
                                         <td colspan="4" class="actions" style="padding-left: 25px">
                                            <a data-toggle="modal" data-target="javascript:;" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                                         </td>
                                     @empty
                                       <td>no file</td>
                                     @endforelse
                                 </tbody>
                              </table>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </td>
  <td class="add-event">
    <a target="_blank" href="{{$contest->permalink()}}" class="btn btn-smoke btn-sm" style="background-image: linear-gradient(#57596E, #3F4257);font-weight: 400">View Contest <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px"></a>
  </td>
</tr>
