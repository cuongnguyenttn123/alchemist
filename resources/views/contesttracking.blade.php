@extends('layouts.master')
@section('title')
  Contesttracking
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		   <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
		      <div class="ui-block-title" style="padding-left: 0px">
		         <h3 style="font-size: 17px;color: #FFFFFF;"><img src="img/screens.svg" width="100" class="olymp-heart-icon" style=" border-radius: 0%; width: 70px;margin-left: 0px;margin-left: 6px;margin-top: -2px">Contest: Design logo for new company</h3>
		      </div>
		   </div>
		   <div class="ui-block" style="border: 0px solid #e6ecf5;">
		      <!-- News Feed Form  -->
		      <div class="news-feed-form" style="background-color: #edf2f6;padding-bottom: 50px;border: 0px solid #e6ecf5;">
		         <!-- Nav tabs -->
		         <ul class="nav nav-tabs" role="tablist">
		            <li class="nav-item"  >
		               <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#milestones" role="tab" aria-expanded="true">
		                  <img src="svg-icons/menu/podium.svg" class="olymp-status-icon" style="margin-right: 5px">
		                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
		                  </svg>
		                  <span>Entries & Podium</span>
		               </a>
		            </li>
		            <li class="nav-item">
		               <a class="nav-link inline-items" data-toggle="tab" href="#locked" role="tab" aria-expanded="false">
		                  <img src="svg-icons/menu/folder.svg" class="olymp-status-icon" style="margin-right: 5px">
		                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
		                  </svg>
		                  <span>Contest Files (Locked)</i></span>
		               </a>
		            </li>
		            <li class="nav-item">
		               <a class="nav-link inline-items" data-toggle="tab" href="#sharedfiles" role="tab" aria-expanded="false">
		                  <img src="svg-icons/menu/folder.svg" class="olymp-status-icon" style="margin-right: 5px">
		                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
		                  </svg>
		                  <span>Contest Files(Hide) </i></span>
		               </a>
		            </li>
		            <li class="nav-item">
		               <a class="nav-link inline-items" data-toggle="tab" href="#results" role="tab" aria-expanded="false">
		                  <img src="svg-icons/menu/trophy.svg" class="olymp-status-icon" style="margin-right: 5px">
		                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
		                  </svg>
		                  <span>Results(Hide)</i></span>
		               </a>
		            </li>
		         </ul>
		         <!-- Tab panes -->
		         <div class="tab-content no-padding">
		            <div class="tab-pane active" id="milestones" role="tabpanel" aria-expanded="true">
		               <div class="ui-block responsive-flex1200" style="margin-top: 15px">
		                  <div class="ui-block-title"> 
		                     <a href="/Seeker-ProjectBid-Details.html" class="btn btn-md-2 btn-border-think c-grey btn-transparent"><img src="svg-icons/Create Job/checked.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">1st | Done</a>
		                     <a href="/Seeker-ProjectBid-Details.html" class="btn btn-md-2 btn-border-think c-grey btn-transparent"><img src="svg-icons/Create Job/checked.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">2nd | Done</a>
		                     <a href="/Seeker-ProjectBid-Details.html" class="btn btn-md-2 btn-border-think c-grey btn-transparent"><img src="svg-icons/Create Job/checked.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">3rd | Done</a>
		                     <a href="/Seeker-ProjectBid-Details.html" class="btn btn-md-2 btn-border-think c-grey btn-transparent"><img src="svg-icons/Create Job/incomplete.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">4th | Please Select</a>
		                     <a href="#"  class="btn  btn-md-2 btn-icon-left" style="font-weight: 500;background-image: linear-gradient(#57596E, #3F4257)"><i class="fa fa-lock" aria-hidden="true"></i>3/4</a>
		                     <a href="#"  class="btn  btn-md-2 btn-icon-left" style="background-image: linear-gradient(#59A4FF, #2190EC);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>4/4</a>
		                     <a href="#"  class="btn  btn-md-2 btn-icon-left" style="background-image: linear-gradient(#A3E12A, #7CB905);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>CONFIRM</a>
		                  </div>
		               </div>
		               <div class="ui-block">
		                  <table width="93%" class="event-item-table event-item-table-fixed-width">
		                     <thead style="background-color: #646464">
		                        <tr>
		                           <th width="20%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              ALCHEMIST
		                           </th>
		                           <th width="21%" class="description align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              DELIVERY DATE
		                           </th>
		                           <th width="46%" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              FILE PREVIEW<img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 2px; margin-left: 5px">	
		                           </th>
		                           <th width="13%" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              ACTION
		                           </th>
		                        </tr>
		                     </thead>
		                     <tbody>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/6-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Mary Jenkins <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="average" style="vertical-align: top">
		                              <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/timer.svg" width="21" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: -5px"><strong style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Delivered</strong></span><br><span style="font-size: 12px;font-weight: 400">29/03/2019</span></button>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseContest1" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseContest1" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px;" >
		                                 <fieldset class="form-group" >
		                                    <select class="selectpicker form-control" style="">
		                                       <option value="NU">Podium Selection</option>
		                                       <option value="NU">1st (Locked)</option>
		                                       <option value="NU">2nd Place (Locked)</option>
		                                       <option value="NU">3rd Place (Locked)</option>
		                                       <option value="NU">4th Place</option>
		                                    </select>
		                                 </fieldset>
		                              </div>
		                              <a href="/Seeker-ProjectBid-Details.html" class="btn btn-sm btn-border-think c-grey btn-transparent">CANDIDATE 01</a>
		                           </td>
		                        </tr>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/2-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Mary Jenkins <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="average" style="vertical-align: top">
		                              <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/timer.svg" width="21" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: -5px"><strong style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Deadline</strong></span><br><span style="font-size: 12px;font-weight: 400">29/03/2019</span></button>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-40" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseOne-40" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px;" >
		                                 <fieldset class="form-group" >
		                                    <select class="selectpicker form-control" style="">
		                                       <option value="NU">4th Place</option>
		                                       <option value="NU">Podium Selection</option>
		                                       <option value="NU">1st Place (Locked)</option>
		                                       <option value="NU">2nd Place (Locked)</option>
		                                       <option value="NU">3rd Place (Locked)</option>
		                                    </select>
		                                 </fieldset>
		                              </div>
		                              <a href="#"  class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257);font-weight: 500"><i class="fa fa-lock" aria-hidden="true"></i>Lock Decision?</a>
		                           </td>
		                        </tr>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/3-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Mary Jenkins <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="average" style="vertical-align: top">
		                              <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/timer.svg" width="21" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: -5px"><strong style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Deadline</strong></span><br><span style="font-size: 12px;font-weight: 400">29/03/2019</span></button>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-40" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseOne-40" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px;" >
		                                 <fieldset class="form-group" >
		                                    <select class="selectpicker form-control" style="">
		                                       <option value="NU">1st Place (Locked)</option>
		                                       <option value="NU">Podium Selection</option>
		                                       <option value="NU">2nd Place (Locked)</option>
		                                       <option value="NU">3rd Place (Locked)</option>
		                                    </select>
		                                 </fieldset>
		                              </div>
		                              <a href="#"  class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#A3E12A, #7CB905);font-weight: 500"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Unlock 1st Place</a>
		                           </td>
		                        </tr>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/4-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Mary Jenkins <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="average" style="vertical-align: top">
		                              <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/timer.svg" width="21" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: -5px"><strong style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Deadline</strong></span><br><span style="font-size: 12px;font-weight: 400">29/03/2019</span></button>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-40" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseOne-40" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px;" >
		                                 <fieldset class="form-group" >
		                                    <select class="selectpicker form-control" style="">
		                                       <option value="NU">2nd Place (Locked)</option>
		                                       <option value="NU">Podium Selection</option>
		                                       <option value="NU">1st Place (Locked)</option>
		                                       <option value="NU">3rd Place (Locked)</option>
		                                       <option value="NU">4th Place (Locked)</option>
		                                    </select>
		                                 </fieldset>
		                              </div>
		                              <a href="#"  class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#75CEF3, #4CB3DF);font-weight: 500"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Unlock 2nd Place</a>
		                           </td>
		                        </tr>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/5-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Mary Jenkins <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="average" style="vertical-align: top">
		                              <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/timer.svg" width="21" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: -5px"><strong style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Deadline</strong></span><br><span style="font-size: 12px;font-weight: 400">29/03/2019</span></button>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-40" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseOne-40" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px;" >
		                                 <fieldset class="form-group" >
		                                    <select class="selectpicker form-control" style="">
		                                       <option value="NU">3rd Place (Locked)</option>
		                                       <option value="NU">Podium Selection</option>
		                                       <option value="NU">1st Place (Locked)</option>
		                                       <option value="NU">2nd Place (Locked)</option>
		                                       <option value="NU">4th Place (Locked)</option>
		                                    </select>
		                                 </fieldset>
		                              </div>
		                              <a href="#"  class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#FF8A8A, #F36161);font-weight: 500"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Unlock 2nd Place</a>
		                           </td>
		                        </tr>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/8-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Mary Jenkins <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="average" style="vertical-align: top">
		                              <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/timer.svg" width="21" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: -5px"><strong style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Deadline</strong></span><br><span style="font-size: 12px;font-weight: 400">29/03/2019</span></button>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-40" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseOne-40" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px;" >
		                                 <fieldset class="form-group" >
		                                    <select class="selectpicker form-control" style="">
		                                       <option value="NU">4th Place (Locked)</option>
		                                       <option value="NU">Podium Selection</option>
		                                       <option value="NU">1st Place (Locked)</option>
		                                       <option value="NU">2nd Place (Locked)</option>
		                                       <option value="NU">3rd Place (Locked)</option>
		                                    </select>
		                                 </fieldset>
		                              </div>
		                              <a href="#"  class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#FFB33A, #F89A00);font-weight: 500"><i class="fa fa-unlock-alt" aria-hidden="true"></i>Unlock 4th Place</a>
		                           </td>
		                        </tr>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/3-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Mary Jenkins <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="average" style="vertical-align: top">
		                              <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><img src="svg-icons/JobCard/timer.svg" width="21" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: -5px"><strong style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px;font-weight: 500"> Delivered</strong></span><br><span style="font-size: 12px;font-weight: 400">29/03/2019</span></button>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseContest1" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseContest1" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <div class="w-select" style="padding-right: 0px; margin-bottom: 8px;" >
		                                 <fieldset class="form-group" >
		                                    <select class="selectpicker form-control" style="">
		                                       <option value="NU">Podium Selection</option>
		                                       <option value="NU">1st (Locked)</option>
		                                       <option value="NU">2nd Place (Locked)</option>
		                                       <option value="NU">3rd Place (Locked)</option>
		                                       <option value="NU">4th Place</option>
		                                    </select>
		                                 </fieldset>
		                              </div>
		                              <a href="/Seeker-ProjectBid-Details.html" class="btn btn-sm btn-border-think c-grey btn-transparent">CANDIDATE 05</a>
		                           </td>
		                        </tr>/
		                     </tbody>
		                  </table>
		               </div>
		            </div>
		            <div class="tab-pane" id="locked" role="tabpanel" aria-expanded="true">
		               <div class="container no-padding" style="margin-top: 15px">
		                  <div class="row">
		                     <div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-1 col-sm-12 col-12">
		                        <div class="photo-album-item create-album"  style="position: relative;padding-top: 100px;padding-bottom: 100px">
		                           <a href="#"  data-toggle="modal" data-target="#create-photo-album"#
		                              ></a>
		                           <div class="content" style="margin-top: 10px">
		                              <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="#create-photo-album">
		                                 <img src="svg-icons/JobCard/padlock.svg" class="olymp-plus-icon" style="margin-top: -14px">
		                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
		                                 </img>
		                              </a>
		                              <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Files Locked</a>
		                              <span class="sub-title">File Upload / Payment Incomplete</span>
		                           </div>
		                        </div>
		                        <!-- Pagination -->
		                        <!-- ... end Pagination -->
		                     </div>
		                  </div>
		               </div>
		            </div>
		            <div class="tab-pane " id="sharedfiles" role="tabpanel" aria-expanded="true">
		               <div class="ui-block"> </div>
		               <div class="ui-block" style="margin-bottom: 0px">
		                  <form action="#" method="post" class="cart-main">
		                     <!-- Shop Table Cart -->
		                     <table class="shop_table cart">
		                        <thead>
		                           <tr>
		                              <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                              <th class="product-quantity">DATE UPLOADED</th>
		                              <th class="product-subtotal">DOWNLOAD</th>
		                           </tr>
		                        </thead>
		                        <tbody>
		                           <tr class="cart_item">
		                              <td class="product-thumbnail" style="padding-left: 25px">
		                                 <div class="forum-item">
		                                    <img src="img/zip.svg" alt="forum" width="40">
		                                    <div class="content">
		                                       <a href="#" class="h6 title">Website Files.zip</a>
		                                       <div class="post__date">
		                                          <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </td>
		                              <td class="product-quantity">
		                                 <P class="price amount">28/11/2018</P>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
		                              </td>
		                              <td class="product-subtotal">
		                                 <a href="#" class="product-del remove" title="Remove this item">
		                                    <img src="img/inbox.svg" class="olymp-close-icon">
		                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
		                                    </svg>
		                                 </a>
		                              </td>
		                           </tr>
		                           <tr class="cart_item">
		                              <td class="product-thumbnail" style="padding-left: 25px">
		                                 <div class="forum-item">
		                                    <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                    <div class="content">
		                                       <a href="#" class="h6 title">wedidit.com.hk</a>
		                                       <div class="post__date">
		                                          <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </td>
		                              <td class="product-quantity">
		                                 <P class="price amount">28/11/2018</P>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
		                              </td>
		                              <td class="product-subtotal">
		                                 <a href="#" class="product-del remove" title="Remove this item">
		                                    <img src="img/inbox.svg" class="olymp-close-icon">
		                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
		                                    </svg>
		                                 </a>
		                              </td>
		                           </tr>
		                           <tr class="cart_item">
		                              <td class="product-thumbnail" style="padding-left: 25px">
		                                 <div class="forum-item">
		                                    <img src="img/video-player.svg" alt="forum" width="40">
		                                    <div class="content">
		                                       <a href="#" class="h6 title">Video Reference</a>
		                                       <div class="post__date">
		                                          <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </td>
		                              <td class="product-quantity">
		                                 <P class="price amount">28/11/2018</P>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
		                              </td>
		                              <td class="product-subtotal">
		                                 <a href="#" class="product-del remove" title="Remove this item">
		                                    <img src="img/inbox.svg" class="olymp-close-icon">
		                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
		                                    </svg>
		                                 </a>
		                              </td>
		                           </tr>
		                           <tr class="cart_item">
		                              <td class="product-thumbnail" style="padding-left: 25px">
		                                 <div class="forum-item">
		                                    <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                    <div class="content">
		                                       <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                       <div class="post__date">
		                                          <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </td>
		                              <td class="product-quantity">
		                                 <P class="price amount">28/11/2018</P>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
		                              </td>
		                              <td class="product-subtotal">
		                                 <a href="#" class="product-del remove" title="Remove this item">
		                                    <img src="img/inbox.svg" class="olymp-close-icon">
		                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
		                                    </svg>
		                                 </a>
		                              </td>
		                           </tr>
		                           <tr class="cart_item">
		                              <td class="product-thumbnail" style="padding-left: 25px">
		                                 <div class="forum-item">
		                                    <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                    <div class="content">
		                                       <a href="#" class="h6 title">User-Guide.pdf</a>
		                                       <div class="post__date">
		                                          <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </td>
		                              <td class="product-quantity">
		                                 <P class="price amount">28/11/2018</P>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18">13 Days, 58 mins ago</time>
		                              </td>
		                              <td class="product-subtotal">
		                                 <a href="#" class="product-del remove" title="Remove this item">
		                                    <img src="img/inbox.svg" class="olymp-close-icon">
		                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
		                                    </svg>
		                                 </a>
		                              </td>
		                           </tr>
		                           <tr>
		                              <td colspan="4" class="actions" style="padding-left: 25px">
		                                 <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                              </td>
		                           </tr>
		                        </tbody>
		                     </table>
		                     <!-- ... end Shop Table Cart -->
		                  </form>
		               </div>
		            </div>
		            <div class="tab-pane" id="results" role="tabpanel" aria-expanded="true">
		               <div class="ui-block" style="margin-top: 15px">
		                  <table width="93%" class="event-item-table event-item-table-fixed-width">
		                     <thead style="background-color: #646464">
		                        <tr>
		                           <th width="9%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              POSITION
		                           </th>
		                           <th width="18%" class="description align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              ALCHEMIST
		                           </th>
		                           <th width="28%" class="description align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              DETAILS
		                           </th>
		                           <th  class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              FILE PREVIEW<img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 2px; margin-left: 5px">	
		                           </th>
		                           <th width="10%" class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
		                              ACTION
		                           </th>
		                        </tr>
		                     </thead>
		                     <tbody>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -10px"> <img src="svg-icons/Competition/1st.svg" alt="author" style="vertical-align: top; width: 50px;">
		                                 <br>
		                                 <a class="h6 title" style="margin-top: 5px">Winner</a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">1st / 512</span></time>
		                              </div>
		                           </td>
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/6-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Mary Jenkins <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">13 Days | $2500 USD | 400 CC | 20 SBP </a>
		                              <div id="accordion" role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseReward" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/menu/trophy.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Reward Details</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseReward" class="collapse" role="tabpanel" aria-labelledby="headingOne-20">
		                                       <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
		                                          <div class="ui-block-content">
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Position</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >1st/512</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Completed</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >10/04/2019</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Prize Awarded</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">$2,400.68</span> HKD </span></div>
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skill Points Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >20 SBP</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Token Value</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">240.68</span> ALC <img src="svg-icons/JobCard/AlchemToken.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
		                                             <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Craft Credit Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >400</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseContestPreview1" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseContestPreview1" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <a  href="#"  class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E;font-weight: 500;color: #FFFFFF"><i class="fa fa-eye" aria-hidden="true" ></i>VIEW PROFILE</a>
		                              <a href="Seeker-CreateDirectProject.html" class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#FF5E3A, #FF5E3A);font-weight: 500;color: #FFFFFF
		                                 "><i class="fa fa-bookmark" aria-hidden="true"></i>HIRE</a>
		                           </td>
		                        </tr>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -10px"> <img src="svg-icons/Competition/2nd.svg" alt="author" style="vertical-align: top; width: 50px;">
		                                 <br>
		                                 <a class="h6 title" style="margin-top: 5px">Runner Up</a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">2nd / 512</span></time>
		                              </div>
		                           </td>
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/1-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Jane Does <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">13 Days | 10 CC | 20 SBP  </a>
		                              <div id="accordion" role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseRunner" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/menu/trophy.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Reward Details</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseRunner" class="collapse" role="tabpanel" aria-labelledby="headingOne-20">
		                                       <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
		                                          <div class="ui-block-content">
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Position</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >1st/512</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Completed</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >10/04/2019</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skill Points Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >20 SBP</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Craft Credit Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >400</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseContestPreview2" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseContestPreview2" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <a  href="#"  class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E;font-weight: 500;color: #FFFFFF"><i class="fa fa-eye" aria-hidden="true" ></i>VIEW PROFILE</a>
		                              <a href="Seeker-CreateDirectProject.html" class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#FF5E3A, #FF5E3A);font-weight: 500;color: #FFFFFF
		                                 "><i class="fa fa-bookmark" aria-hidden="true"></i>HIRE</a>
		                           </td>
		                        </tr>
		                        <tr class="event-item">
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -10px"> <img src="svg-icons/Competition/3rd.svg" alt="author" style="vertical-align: top; width: 50px;">
		                                 <br>
		                                 <a class="h6 title" style="margin-top: 5px">Third Place</a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">3rd / 512</span></time>
		                              </div>
		                           </td>
		                           <td class="freshness inline-items" align="center" style="vertical-align: top">
		                              <div class="author-freshness" style="margin-top: -5px"> <img src="img/4-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
		                                 <br>
		                                 <a href="#" class="h6 title" style="margin-top: -5px">Todd James <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
		                                 <time class="entry-date updated" datetime="2017-06-24T18:18" ><span style="font-size: 12px;">Apprentice | LV 13<img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 15px;margin-left: -1px;margin-left: 6px;margin-top: -2px"></span></time>
		                              </div>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">16 Days | 400 CC | 20 SBP </a>
		                              <div id="accordion" role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThird" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/menu/trophy.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Reward Details</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseThird" class="collapse" role="tabpanel" aria-labelledby="headingOne-20">
		                                       <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 0px 0px; padding: 0px 0px 0px 0px ">
		                                          <div class="ui-block-content">
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Position</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >1st/512</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Completed</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >10/04/2019</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skill Points Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >20 SBP</span></span></div>
		                                             <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Craft Credit Reward</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >400</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
		                                          </div>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="estimate" style="vertical-align: top">
		                              <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES</a>
		                              <div id="accordion"   role="tablist" aria-multiselectable="true">
		                                 <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
		                                    <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 11px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
		                                       <h6 class="mb-0">
		                                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseContestPreview3" aria-expanded="true" aria-controls="collapseOne">
		                                             <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
		                                             <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
		                                             <svg class="olymp-dropdown-arrow-icon">
		                                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
		                                             </svg>
		                                          </a>
		                                       </h6>
		                                    </div>
		                                    <div id="collapseContestPreview3" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
		                                       <div class="ui-block" style="margin-bottom: 0px">
		                                          <form action="#" method="post" class="cart-main">
		                                             <!-- Shop Table Cart -->
		                                             <table class="shop_table cart">
		                                                <thead>
		                                                   <tr>
		                                                      <th class="product-thumbnail" style="padding-left: 25px">ITEM DESCRIPTION</th>
		                                                   </tr>
		                                                </thead>
		                                                <tbody>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/zip.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Website Files.zip</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/lnk-file-variant.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">wedidit.com.hk</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Zip File </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/video-player.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Video Reference</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">Word Doc </time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/powerpointFile.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">Flow-Diagram.ppt</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PowerPoint</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr class="cart_item">
		                                                      <td class="product-thumbnail" style="padding-left: 25px">
		                                                         <div class="forum-item">
		                                                            <img src="img/pdfFILE.svg" alt="forum" width="40">
		                                                            <div class="content">
		                                                               <a href="#" class="h6 title">User-Guide.pdf</a>
		                                                               <div class="post__date">
		                                                                  <time class="published" datetime="2017-03-24T18:18">PDF File</time>
		                                                               </div>
		                                                            </div>
		                                                         </div>
		                                                      </td>
		                                                   </tr>
		                                                   <tr>
		                                                      <td colspan="4" class="actions" style="padding-left: 25px">
		                                                         <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>							
		                                                      </td>
		                                                   </tr>
		                                                </tbody>
		                                             </table>
		                                             <!-- ... end Shop Table Cart -->
		                                          </form>
		                                       </div>
		                                    </div>
		                                 </div>
		                              </div>
		                           </td>
		                           <td class="add-event align-center" style="vertical-align: top">
		                              <a  href="#"  class="btn btn-purple btn-sm btn-icon-left" style="background-color: #90CB1E;font-weight: 500;color: #FFFFFF"><i class="fa fa-eye" aria-hidden="true" ></i>VIEW PROFILE</a>
		                              <a href="Seeker-CreateDirectProject.html" class="btn btn-purple btn-sm btn-icon-left" style="background-image: linear-gradient(#FF5E3A, #FF5E3A);font-weight: 500;color: #FFFFFF
		                                 "><i class="fa fa-bookmark" aria-hidden="true"></i>HIRE</a>
		                           </td>
		                        </tr>
		                     </tbody>
		                  </table>
		               </div>
		            </div>
		         </div>
		      </div>
		      <!-- ... end News Feed Form  -->
		   </div>
		</div>
	</div>
</div>

@endsection