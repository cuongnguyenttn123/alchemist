@extends('layouts.master')
@section('title')
  NEGOTIATION PANEL
@endsection
@if(Auth::id())
@section('content')
  <?php $your_bid = $project->your_bid();?>
  <div class="main-header">
    <div class="content-bg-wrap bg-badges"></div>
    <div class="container">
      <div class="row">
        <div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12" style="margin-top: -110px">
          <div class="main-header-content" style="margin-bottom: 60px">

            <h1>Bid Negotiation</h1>
            <p>Win more projects with your mad negotiation skills!Chat freely with the Project Seeker before commiting to your final Bid price. Edit your current bid, delivery time, files and milestone setup. </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container" style="margin-top: -110px">
    <div class="col col-xl-10 m-auto col-lg-12 col-md-12 col-sm-12 col-12 no-padding" >
       <nav aria-label="Page navigation" style="z-index: 2">
          <ul class="pagination " style="margin: 0px 0px -2px 0px">
             <li class="page-item" style="padding-left: 0px;">
                <a class="page-link" href="{{route('profile.myprojects')}}" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%; border-bottom: 0px solid;">Go Back</a>
             </li>
             <li class="page-item disabled " >
                <a class="page-link " href="javascript:;" tabindex="-1" style="border-bottom-left-radius: 0%;border-bottom-right-radius: 0%;border-bottom: 0px solid; background-color: #fafbfd;" >Negotiation Panel</a>
             </li>
          </ul>
       </nav>
       <div class="ui-block" data-mh="pie-chart" style="background-color: #fafbfd;" >
          <div class="ui-block-title">
             <h4><strong>Project Bids:</strong> {{$project->name}}</h4>
          </div>
       </div>
       <div class="ui-block" style="border: 0px solid #e6ecf5;">
          <!-- News Feed Form  -->
          <div class="news-feed-form" style="background-color: #edf2f6;padding-bottom: 50px;border: 0px solid #e6ecf5;">
             <!-- Nav tabs -->
             <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"  >
                   <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#deposit" role="tab" aria-expanded="true">
                      <svg class="olymp-chat---messages-icon" style="width: 20px">
                         <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                      </svg>
                      <span>Negotiation</span>
                   </a>
                </li>
                <li class="nav-item">
                   <a class="nav-link inline-items" data-toggle="tab" href="#securepayment" role="tab" aria-expanded="false">
                      <svg class="olymp-settings-v2-icon" style="width: 18px">
                         <use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-v2-icon"></use>
                      </svg>
                      Edit Bid / Confirm Bid  </span>
                   </a>
                </li>
                <li class="nav-item">
                   <a class="nav-link inline-items" data-toggle="tab" href="#token" role="tab" aria-expanded="false">
                      <svg class="olymp-magnifying-glass-icon" style="width: 18px">
                         <use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use>
                      </svg>
                      <span>Seekers Estimate  </span>
                   </a>
                </li>
             </ul>
             <!-- Tab panes -->
             <div class="tab-content no-padding">
                <div class="tab-pane active" id="deposit" role="tabpanel" aria-expanded="true">
                   <p></p>
                   <div class="container">
                      <div class="row">
                         <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                            <div class="ui-block">
                               <div class="ui-block-title">
                                  <div class="h6 title">Negotiation Panel</div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="row" style="margin-top: 0px">
                      <div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-1 col-md-7 order-md-1 col-sm-12 col-12 no-margin">
                         <div class="ui-block">
                            <div class="row">
                                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 wrapmessage">
                                   <!-- Chat Field -->

                                      @include('template_part.content-divbidmessage', ['bid' => $your_bid])
                                   <!-- ... end Chat Field -->
                                </div>
                            </div>
                         </div>
                         <!-- Pagination -->
                         <!-- ... end Pagination -->
                      </div>
                      <div class="col col-xl-4 order-xl-1 col-lg-4 order-lg-2 col-md-5 order-md-2 col-sm-12 col-12 no-margin">
                         <div class="ui-block">
                            <!-- Your Profile  -->
                            <div class="your-profile">
                               <div class="post-thumb" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                                  <a href="#" class="post-category  full-width align-center" style="background-image: linear-gradient(#73757e, #3f4257); padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 14px;font-weight: 500;color: #fff">My Milestones</a>
                               </div>
                               @foreach($your_bid->milestones as $key=> $ms)
                               <div id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="card">
                                     <div class="card-header" role="tab" id="headingOne">
                                        <h6 class="mb-0">
                                           <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree-{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                              <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #858AA6">Milestone 0{{$key+1}} | {{$ms->percent_payment}}%  | ${{$ms->price}} USD</span>
                                              <svg class="olymp-dropdown-arrow-icon">
                                                 <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                              </svg>
                                           </a>
                                        </h6>
                                     </div>
                                     <div id="collapseThree-{{$key}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <ul class="your-profile-menu">
                                           <ul class="order-totals-list" style="padding: 10px 0px 10px 0px;vertical-align: top">
                                              <li>{{$ms->title}}</li>
                                              <div class="comment-content comment">
                                                 {{$ms->description}}<br><br>
                                                 <img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                 <span class="ui-block-title-small" style="margin-right: 8px">${{$ms->price}}</span>
                                                 <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                                 <span class="ui-block-title-small" style="margin-right: 8px">{{$ms->workday}} Days</span>
                                              </div>
                                           </ul>
                                        </ul>
                                     </div>
                                  </div>
                               </div>
                               @endforeach
                            </div>
                            <!-- ... end Your Profile  -->
                         </div>
                         <div id="accordion"   role="tablist" aria-multiselectable="true">
                            <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;background-color: #EDF2F6;margin-bottom: 15px">
                               <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 20px; padding-bottom: 20px;">
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
                               <div id="collapseOne-40" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 15px">
                                 <?php
                                 $files = $your_bid->files();
                                 ?>
                                 @if($files != null)
                                  <div class="ui-block" style="margin-bottom: 0px">
                                        <!-- Shop Table Cart -->
                                        <table class="shop_table cart" style="width: 100%">
                                           <thead>
                                              <tr>
                                                 <th class="product-thumbnail" style="padding: 25px;color: #888da8;border-bottom: 1px solid #e6ecf5;background: #fff;">ITEM DESCRIPTION</th>
                                              </tr>
                                           </thead>
                                           <tbody class="alldownload">

                                              @foreach($files as $file)
                                              <tr class="cart_item" align="left">
                                                 <td class="product-thumbnail" style="padding-left: 25px;border-bottom: 1px solid #e6ecf5;padding-top: 25px;padding-bottom: 25px;">
                                                    <div class="forum-item">
                                                       <img src="img/{{$file->extension}}.svg" alt="forum" width="40">
                                                       <div class="content">
                                                          <a href="{{$file->link}}" data-name="{{$file->ori_name}}" class="h6 title my-files">{{$file->name}}</a>
                                                          <div class="post__date">
                                                             <time class="published" datetime="2017-03-24T18:18">{{$file->extension}} File </time>
                                                          </div>
                                                       </div>
                                                      <span class="notification-icon" style=" height:33px; width: 33px; float: right; display: block;margin-top: -33px; margin-right: 15px;">
                                                        <a href="{{$file->link}}" class="accept-request request-del" title="Download this item" download="">
                                                          <span class="">
                                                          <img src="svg-icons/sprites/download.svg" class="olymp-close-icon" style="height: 15px;
                                          width: 15px;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                                          </span>
                                                          </a>

                                                        </span>
                                                    </div>
                                                 </td>
                                              </tr>
                                              @endforeach

                                              <tr>
                                                 <td colspan="4" class="actions" style="padding: 25px;">
                                                    <a data-toggle="modal" data-target="#" href="#" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                                                 </td>
                                              </tr>
                                           </tbody>
                                        </table>
                                        <!-- ... end Shop Table Cart -->
                                  </div>
                                 @else
                                  <div class="ui-block">

                                     <div class="ui-block-content">

                                       <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                                         <a href="#" data-toggle="modal" data-target="" #=""></a>

                                         <div class="content" style="margin-top: 10px">

                                           <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="">
                                             <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                           </a>

                                           <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Files Added</a>
                                           <span class="sub-title">Add Files in Edit Bid Panel</span>

                                         </div>

                                       </div>
                                     </div>
                                   </div>
                                 @endif
                               </div>
                            </div>
                         </div>
                         <div class="ui-block" >
                            <div class="ui-block-title">
                               <h6 class="title">My Estimate</h6>
                            </div>
                            <div class="ui-block-content" style="padding-bottom: 0px">
                               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px;"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Estimated Days</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$your_bid->work_time}} Days</span></span></div>
                               <div class="skills-item-info" style="margin-top: 15px;padding-bottom: 5px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Project Total</span></span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="units">${{$your_bid->price}}</span> USD </span></div>
                            </div>
                         </div>

                      </div>
                   </div>
                </div>
                <div class="tab-pane" id="securepayment" role="tabpanel" aria-expanded="true">
                   <p></p>
                   <div class="container">
                      <div class="row">
                         <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                            <div class="ui-block">
                               <div class="ui-block-title">
                                  <div class="h6 title">Edit My Estimate</div>
                                  <div class="align-right">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                <form class="form-post_bid" method="post" action="{{$project->permalink()}}" data-parsley-validate>
                 @csrf
                    <input type="hidden" name="_project" value={{ $project->id }}>
                  <input type="hidden" id="list_array_delete_bid" name="file_attached_delete">

                  <input type="hidden" name="bid_id" value="{{$your_bid->id ?? ''}}">
                   <div class="row" style="margin-top: 0px">
                      <div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">

                         <div class="ui-block">
                            <div class="ui-block-content">
                               <a href="javascript:;" class="submit-bid btn btn-secondary btn-md-2 full-width" style="margin-bottom: 4px;"><img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon " style="width: 16px;margin-right: 5px;padding-bottom: 2px; vertical-align: middle"> UPDATE BID</a>
                            </div>
                         </div>
                         <div class="ui-block">
                            <div class="ui-block-title">
                               <h6 style="font-size: 15px">Project Budget</h6>
                            </div>
                            <div class="ui-block-content">
                               <div class="row">
                                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12" style="margin-bottom: 0px">
                                     <hp>Price Estimate ($USD) :</hp>
                                     <div class="form-group  quantity with-icon">
                                        <i class="fas fa-dollar-sign c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                                        <a href="#" class="quantity-minus">&#8744;</a>
                                         <input onkeyup="this.value=FormatNumber(this.value);" name="price" title="Price - $USD" class="replace_budget form-control work_price c-biding" min="10" max="100000" type="text" value="{{$your_bid->price ?? $project->budget}}" required>
                                         <a href="#" class="quantity-plus">&#8743;</a>
                                         <input class="hidden-price" type="hidden" name="hidden-price" data-price="{{$your_bid->price ?? $project->budget}}">
                                     </div>
                                     <p></p>
                                  </div>
                               </div>
                            </div>
                         </div>
                        <div class="ui-block hp_previewfile_bid" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
                          <div class="cart_item_bid d-none" style="border-bottom: 1px solid #cccaca; margin-bottom: 10px;">
                            <div class="ui-block" data-mh="pie-chart" style="padding: 15px;margin: 0px;border: none;">
                              <div class="forum-item">
                                <img src="img/zip.svg" alt="forum" width="40">
                                <div class="content">
                                  <a href="javascript:;" class="h6 title" style="word-break: break-word;"></a>
                                  <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18"></time>
                                  </div>
                                  <span class="notification-icon click-delete-file" data-filedelete style="margin-top: -35px; float: right; display: block;">
                                    <a href="javascript:;" data-delete_file = "" class="accept-request request-del">
                                      <span class="delete-file">
                                        <img src="img/trash.svg" class="olymp-close-icon" style="margin: auto; height: 15px; width: 15px;">
                                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                                      </span>
                                      </a>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="ui-block-title form-group">
                            <input id="sp_file" class="hp_file_upload_bid" type="file" name="files" value="" multiple data-parsley-max-file="9">
                          </div>
                        </div>
                        <div class="ui-block hp_previewfile_bid">
                          <div class="hienthi show-file-update-bid material-input"></div>
                          <div class="ui-block-content no-file-upload">

                            <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                              <a href="#" data-toggle="modal" data-target="" ></a>

                              <div class="content" style="margin-top: 10px">

                                <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="">
                                  <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                </a>

                                <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Files Added</a>
                                <span class="sub-title">Add Files in Edit Bid Panel</span>

                              </div>

                            </div>
                          </div>
                          {{--<button type="reset" class="show-display-btn-clear btn btn-purple btn-md-2 btn-icon-left click-delete-file-all" style="background-image: linear-gradient(#57596E, #3F4257);margin-right: 5px;margin-left: 20px; margin-top: 15px;"><svg class="svg-inline--fa fa-window-close fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="window-close" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-83.6 290.5c4.8 4.8 4.8 12.6 0 17.4l-40.5 40.5c-4.8 4.8-12.6 4.8-17.4 0L256 313.3l-66.5 67.1c-4.8 4.8-12.6 4.8-17.4 0l-40.5-40.5c-4.8-4.8-4.8-12.6 0-17.4l67.1-66.5-67.1-66.5c-4.8-4.8-4.8-12.6 0-17.4l40.5-40.5c4.8-4.8 12.6-4.8 17.4 0l66.5 67.1 66.5-67.1c4.8-4.8 12.6-4.8 17.4 0l40.5 40.5c4.8 4.8 4.8 12.6 0 17.4L313.3 256l67.1 66.5z"></path></svg>CLEAR ALL</button>
                        --}}
                        </div>
                      </div>
                      <div class="milestone_group col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-7 order-md-2 col-sm-12 col-12 no-margin" >
                        <div class="ui-block" data-mh="pie-chart" style=" padding: 0px 0px 10px 0px ">


                          <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">

                            <div class="crumina-module crumina-heading with-title-decoration ">
                              <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Project Description</h6>
                            </div>
                            <div class="row" style="margin-bottom: 10px;margin-top: -15px">

                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">

                                <hp>Project Title</hp>
                                <div class="form-group" style="font-size: 9px; ">
                                  <input style="padding: 10px 8px 10px 8px;font-size: 11px;" class="form-control c-biding" type="text" name="title" value="{{$your_bid->title ?? ''}}" required>

                                </div>
                              </div>
                            </div>



                            <div class="row" style="margin-bottom: 10px">

                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">

                                <hp>Project Description:</hp>
                                <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                                  <label class="control-label" style="font-size: 11px;">Describe what you need done....</label>
                                  <textarea style="font-size: 11px;" class="form-control c-biding" name="description">{{strip_tags($project->detail_description ?? '')}}</textarea>

                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="ui-block" data-mh="pie-chart" style=" padding: 10px 0px 10px 0px ">
                          <div class="col col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <hp>Enter Required Skills</hp>
                            <div class="form-group abc_hkt">
                              <select class="selectize" name="skill" multiple style="width: 100%;">
                                @if($skills)
                                  @foreach($skills as $skill)
                                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                          </div>
                        </div>

                         <div id="accordion1" class="accordion" role="tablist" aria-multiselectable="true">
                          @if($your_bid)
                            @foreach($your_bid->milestones as $key=>$ms)
                              <div class="row mile_property" style="margin-bottom: 10px;">
                                  <div class="col col-lg-2 col-md-3 col-sm-2 col-2 no-margin">
                                    <div class="checkbox" align="center" style=" background-color: #FFFFFF;height: 60px;border-radius: 4px;border: solid 1px #D8DBE6;padding: 20px 4px 0px 4px;vertical-align: middle;margin-bottom: 0px" >
                                       <a class="delpanel" href="javascript:;" style="color: #888da8;">
                                        <i class="fas fa-trash-alt" style="font-size: 15px"></i>
                                       </a>
                                    </div>
                                  </div>
                                  <div class="col col-lg-10 col-md-9 col-sm-10 col-10 no-margin" style="padding-left: 0px">

                                     <div class="card" style="background-color: #ECF1F5">
                                        <div class="card-header" role="tab" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;margin-top: 0px; padding-top: 20px; padding-bottom: 20px; ">
                                           <h6 class="mb-0">
                                              <a class="collapsepanel collapsed" data-toggle="collapse"  href="#milestone-{{$key+1}}" aria-expanded="true">
                                                 <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px">
                                                 <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">M0<span class="ms_counter">{{$key+1}}</span> | <span class="value_percent">{{$ms->percent_payment}}</span>% | $<span class="info_percent">{{$ms->price}}</span> | <span class="value_day">{{$ms->workday}}</span> Days</span>
                                                 <svg class="olymp-dropdown-arrow-icon c-white">
                                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                                 </svg>
                                              </a>
                                           </h6>
                                        </div>
                                        <div id="milestone-{{$key+1}}" class="collapse props" role="tabpanel" style="margin-left: -1px">
                                           <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 8px 0px; padding: 0px 0px 10px 0px ">
                                              <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">
                                                 <div class="crumina-module crumina-heading with-title-decoration " >
                                                    <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Setup Milestone 0<span class="ms_counter">{{$key+1}}</span></h6>
                                                 </div>
                                                 <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                                       <hp>Task Title (Alchemist Only)</hp>
                                                       <div class="form-group" style="font-size: 9px; ">
                                                          <input value="{{$ms->title}}" style="padding: 10px 15px 10px 15px;font-size: 11px;" type="text" name="mile[{{$key}}][title]" class="form-control data-change-handle ms_title" required>
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <div class="row" style="margin-bottom: 10px">
                                                    <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                                       <hp>Milestone Description:</hp>
                                                       <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                                                          <label class="control-label" style="font-size: 11px;">Describe what you expect for this milestone....</label>
                                                          <textarea class="form-control data-change-handle ms_description" name="mile[{{$key}}][description]" rows="3" cols="30" required style="border: 0;font-size: 11px;">{{$ms->description}}</textarea>
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <div class="row" style="margin-bottom: 10px">
                                                    <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 hp_work_day">
                                                       <hp>Days <span class="value_day">{{$ms->workday}}</span></hp>
                                                       <div class="form-group label-floating quantity with-icon">
                                                          <i class="far fa-calendar-check c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                                                          <label class="control-label">Days</label>
                                                            <a href="#" class="quantity-minus">∨</a>
                                                          <input title="Days" type="text" min="1" max="365" name="mile[{{$key}}][workday]" class="form-control data-change-handle ms_workday" value="{{$ms->workday}}" required>

                                                         <a href="#" class="quantity-plus">∧</a>
                                                       </div>
                                                    </div>
                                                    <div class="col col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12">
                                                       <hp><span class="value_percent">{{$ms->percent_payment}}</span>% / 100% = $<span class="units info_percent" style="color: #90CB1E">{{$ms->price}}</span></hp>
                                                       <div class="form-group is-select">
                                                          <div class="form-group is-select">
                                                             <select class="selectpicker form-control percent_payment ms_percent_payment" name="mile[{{$key}}][percent_payment]" required>
                                                               @if($key==0)
                                                                 <option value="20" selected >20% | Locked</option>
                                                               @else
                                                                @for($i=1;$i<=8;$i++)
                                                                <?php $selected = ($ms->percent_payment==$i*10) ? 'selected' : ''; ?>
                                                                <option value="{{$i*10}}" {{$selected}}>{{$i*10}}%</option>
                                                                @endfor
                                                               @endif
                                                             </select>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                              </div>
                            @endforeach
                          @endif

                           <div class="photo-album-item create-album wrap_clone_ms"  style="position: relative;padding-top: 100px;padding-bottom: 100px">

                              <div class="content" style="margin-top: 10px">
                                 <a href="javascript:;" class="btn btn-control bg-primary clone_ms" data-toggle="modal" data-target="#create-photo-album">
                                    <svg class="olymp-plus-icon">
                                       <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                    </svg>
                                 </a>
                                 <a href="javascript:;" class="title h5 clone_ms" >Add Milestone</a>
                                 <span class="sub-title">Add more milestones to your estimate!</span>
                              </div>
                           </div>
                        </div>
                      </div>
                      <div class="row mile_property d-none" style="margin-bottom: 10px;">
                            <div class="col col-lg-2 col-md-3 col-sm-2 col-2 no-margin">
                              <div class="checkbox" align="center" style=" background-color: #FFFFFF;height: 60px;border-radius: 4px;border: solid 1px #D8DBE6;padding: 20px 4px 0px 4px;vertical-align: middle;margin-bottom: 0px" >
                                 <a class="delpanel" href="javascript:;" style="color: #888da8;">
                                  <i class="fas fa-trash-alt" style="font-size: 15px"></i>
                                 </a>
                              </div>
                            </div>
                            <div class="col col-lg-10 col-md-9 col-sm-9 col-10 no-margin" style="padding-left: 0px">

                               <div class="card" style="background-color: #ECF1F5">
                                  <div class="card-header" role="tab" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;margin-top: 0px; padding-top: 20px; padding-bottom: 20px; ">
                                     <h6 class="mb-0">
                                        <a class="collapsepanel collapsed" data-toggle="collapse" data-parent="#accordion1" href="#milestone-99" aria-expanded="true">
                                           <img src="svg-icons/JobCard/white-flag-symbol.svg" width="18" hspace="1" style="PADDING-BOTTOM: 0px; margin-right: 5px">
                                           <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #8891B6">M0<span class="ms_counter">1</span> | <span class="value_percent">20</span>% | $<span class="info_percent">0.00</span> | <span class="value_day">0</span> Days</span>
                                           <svg class="olymp-dropdown-arrow-icon c-white">
                                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                           </svg>
                                        </a>
                                     </h6>
                                  </div>
                                  <div id="milestone-99" class="collapse props" data-parent="#accordion1" role="tabpanel" style="margin-left: -1px">
                                     <div class="ui-block" data-mh="pie-chart" style="margin: 8px 0px 8px 0px; padding: 0px 0px 10px 0px ">
                                        <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">
                                           <div class="crumina-module crumina-heading with-title-decoration " >
                                              <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Setup Milestone 0<span class="ms_counter">1</span></h6>
                                           </div>
                                           <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                                 <hp>Task Title (Alchemist Only)</hp>
                                                 <div class="form-group" style="font-size: 9px; ">
                                                    <input type="text" name="kt_mile[99][title]" class="form-control data-change-handle ms_title" required>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="row" style="margin-bottom: 10px">
                                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                                                 <hp>Milestone Description:</hp>
                                                 <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                                                    <label class="control-label" style="font-size: 11px;">Describe what you expect for this milestone....</label>
                                                    <textarea class="form-control data-change-handle ms_description" name="kt_mile[99][description]" rows="3" cols="30" required></textarea>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="row" style="margin-bottom: 10px">
                                              <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 hp_work_day">
                                                 <hp>Days <span class="value_day">0</span></hp>
                                                 <div class="form-group label-floating quantity with-icon">
                                                    <i class="far fa-calendar-check c-facebook" aria-hidden="true" style="border-right: #E6ECF5 solid 1px; "></i>
                                                    <label class="control-label">Days</label>
                                                    <input type="number" min="1" max="365" name="kt_mile[99][workday]" class="form-control data-change-handle ms_workday" value="" required>
                                                 </div>
                                              </div>
                                              <div class="col col-lg-6 col-md-6 col-xs-12 col-sm-12 col-12">
                                                 <hp><span class="value_percent">20</span>% / 100% = $<span class="units info_percent" style="color: #90CB1E">0.00</span></hp>
                                                 <div class="form-group is-select">
                                                    <select class="selectpicker form-control percent_payment ms_percent_payment" name="kt_mile[99][percent_payment]" required>
                                                       <option value="10">10%</option>
                                                       <option value="20">20%</option>
                                                       <option value="30">30%</option>
                                                       <option value="40">40%</option>
                                                       <option value="50">50%</option>
                                                       <option value="60">60%</option>
                                                       <option value="70">70%</option>
                                                       <option value="80">80%</option>
                                                    </select>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                      </div>
                   </div>
                </form>
                </div>
                <div class="tab-pane" id="token" role="tabpanel" aria-expanded="true">
                   <p></p>
                   <div class="container">
                      <div class="row">
                         <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                            <div class="ui-block">
                               <div class="ui-block-title">
                                  <div class="h6 title">Seekers Estimate</div>
                                  <div class="align-right">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="row" style="margin-top: 0px">
                      <div class="col col-xl-5 order-xl-1 col-lg-5 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
                         <div class="ui-block">
                            <div class="ui-block-title">
                               <h6 class="title">Project Breakdown</h6>
                            </div>
                            <div class="ui-block-content">
                               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Bidding Starts</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$project->start_bid}}</span></span></div>
                               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Bidding Ends</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$project->end_bid}}</span></span></div>
                               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Expected Project Completion</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$your_bid->work_time}}</span> Days</span></div>
                               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Project Total</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">${{$project->budget}}</span> USD</span></div>
                               <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Crafting Cost</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >265</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
                               {{-- <div class="skills-item-info" style="margin-top: 15px"><span class="skills-item-title"><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Crafting Cost</span> </span> <span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >400</span> <img src="svg-icons/Token/3d.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div> --}}
                            </div>
                         </div>
                        <?php
                        $miles = $project->my_milestone;

                        ?>
                        @if(empty($miles))
                          <div class="ui-block">
                            <!-- Your Profile  -->
                            <div class="your-profile">
                              <div class="post-thumb" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
                                <a href="#" class="post-category  full-width align-center" style="background-image: linear-gradient(#73757e, #3f4257); padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 14px;font-weight: 500;color: #fff">${{$project->budget}} (USD) | {{$project->total_day}} Days</a>
                              </div>
                              @foreach($project->my_milestone as $key => $ms)
                                <div id="accordion-{{$ms->id}}" role="tablist" aria-multiselectable="true">
                                  <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                      <h6 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne">
                                          <span style="color: #515380; padding-bottom: 5px; font-weight: 400;font-size: 13px; color: #858AA6">Milestone 0{{$key+1}} | {{$ms->percent_payment}}% | ${{$ms->price}} USD</span>
                                          <svg class="olymp-dropdown-arrow-icon">
                                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                          </svg>
                                        </a>
                                      </h6>
                                    </div>
                                    <div id="collapseOne-{{$ms->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                      <ul class="your-profile-menu">
                                        <ul class="order-totals-list" style="padding: 10px 0px 10px 0px;vertical-align: top">
                                          <li style=" margin-bottom: 15px;
                                                 padding-bottom: 10px;">
                                            <h6>{{$ms->title}}</h6>
                                          </li>
                                          <div class="comment-content comment">
                                            {{$ms->description}}
                                            <br><br>
                                            <img src="img/AlchemFiatCoin.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                            <span class="ui-block-title-small" style="margin-right: 8px">${{$ms->price}}</span>
                                            <img src="img/time-passing.svg" alt="" width="30" hspace="3" style="PADDING-BOTTOM: 3px">
                                            <span class="ui-block-title-small" style="margin-right: 8px">{{$ms->workday}} Days</span>
                                          </div>
                                        </ul>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                            <!-- ... end Your Profile  -->
                          </div>

                        @else
                          <div class="ui-block">

                            <div class="ui-block-content">

                              <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                                <a href="#" data-toggle="modal" data-target=""></a>

                                <div class="content" style="margin-top: 10px">

                                  <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="">
                                    <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                  </a>

                                  <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Milestones Added</a>
                                  <span class="sub-title">Seeker selected basic setup without milestones</span>

                                </div>

                              </div>
                            </div>
                          </div>
                        @endif


                        <div id="accordion"   role="tablist" aria-multiselectable="true">
                            <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;background-color: #EDF2F6;margin-bottom: 15px">
                               <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 20px; padding-bottom: 20px;">
                                  <h6 class="mb-0">
                                     <a data-toggle="collapse" data-parent="#accordion" href="#fileview-{{$project->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                                        <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
                                        <svg class="olymp-dropdown-arrow-icon">
                                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                                        </svg>
                                     </a>
                                  </h6>
                               </div>
                               <div id="fileview-{{$project->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EBF0F4;margin-top: 8px">
                                 <?php
                                 $files = $project->attachments()->get();
                                 ?>
                                 @if(count($files) != 0)
                                     <div class="ui-block" style="margin-bottom: 0px">
                                       <form action="#" method="post" class="cart-main">
                                         <!-- Shop Table Cart -->
                                         <table class="shop_table cart">
                                           <thead>
                                           <tr>
                                             <th class="product-thumbnail" style="padding-left: 25px; background: #fff;color: #888da8;border-bottom: 1px solid #e6ecf5;">ITEM DESCRIPTION</th>
                                           </tr>
                                           </thead>
                                           <tbody class="alldownload">
                                             @foreach($files as $file)
                                               <tr class="cart_item" align="left">
                                                 <td class="product-thumbnail" style="padding-left: 25px">
                                                   <div class="forum-item">
                                                     <img src="img/{{$file->extension}}.svg" alt="forum" width="40">
                                                     <div class="content">
                                                       <a href="{{$file->url}}" data-name="{{$file->ori_name}}" class="h6 title my-files">{{$file->name}}</a>
                                                       <div class="post__date">
                                                         <time class="published" datetime="2017-03-24T18:18">{{$file->extension}} File </time>
                                                       </div>
                                                     </div>
                                                   </div>
                                                 </td>
                                               </tr>
                                             @endforeach
                                           <tr>
                                             <td colspan="4" class="actions" style="padding-left: 25px">
                                               <a data-toggle="modal" data-target="#" href="#" class="download-all btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                                             </td>
                                           </tr>
                                           </tbody>
                                         </table>
                                         <!-- ... end Shop Table Cart -->
                                       </form>
                                     </div>

                                 @else
                                   <div class="ui-block">

                                     <div class="ui-block-content">

                                       <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                                         <a href="#" data-toggle="modal" data-target="" #=""></a>

                                         <div class="content" style="margin-top: 10px">

                                           <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="">
                                             <svg class="olymp-close-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg>
                                           </a>

                                           <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">No Files Added</a>
                                           <span class="sub-title">Add Files in Edit Bid Panel</span>

                                         </div>

                                       </div>
                                     </div>
                                   </div>
                                 @endif

                               </div>
                            </div>
                           </div>
                      </div>
                      <div class="col col-xl-7 order-xl-2 col-lg-7 order-lg-2 col-md-7 order-md-2 col-sm-12 col-12 no-margin" >
                         <div class="row" style="margin-bottom: 10px">
                            <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin noshare">
                               @include('myprofile.myprofile-bid', ['project' => $project,'jobdetail'=>'1'])
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- ... end News Feed Form  -->
       </div>
    </div>
  </div>
<!-- Bid Modal -->
 {{--  @if($project->user_bided())
    @include('modal.bidedit')
  @endif --}}
<input type="hidden" name="_project" value={{ $project->id }}>
<input type="hidden" name="bid_create" value={{ route('ajax.bidjob') }}>
<input type="hidden" name="getBids" value={{ route('project.getBids') }}>
<input type="hidden" name="changeShortlist" value={{ route('project.changeShortlist') }}>
<input type="hidden" name="previewimage" value="{{route('ajax.previewimage')}}">
<input type="hidden" name="poststatus" value="{{route('bid.postmessage')}}">

  <!-- Confirm Award -->
  @include('modal.confirm-hire')

@endsection
@endif

@section('scripts')
    <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/boss/js/jobdetail.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/newjob.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/edit-project-bid.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/chatmessage.js')}}"></script>
<script type="text/javascript">
   $(document).ready(function () {

      $(document).on('click', '.btn_acceptawardbid', function(e) {
         swal("Are you sure?")
         .then((value) => {
           if(value) {
            id = $(this).data('id');
            $.ajax({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               type:'POST',
               url: "{{route('ajax.acceptawardbid')}}",
               data: 'id='+id,
               success:function(data){
                  if (data.error == false) {
                     jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
                     if (data.redirect != ''){
                       setTimeout(function(){window.location.replace(data.redirect);} , 2000);
                     }else {
                       setTimeout(function(){window.location.reload();} , 2000);
                     }
                  }else{
                    swal(data.message);
                  }
               }
            });
           }
         });
      });

      //edit bid
      $(document).on('click', '.btn_editbid', function(e){
        id = $(this).data('id');
        form_data = 'id='+id;
        url = "{{route('ajax.getBidEdit')}}";
        var modal_target = $('#bidedit');
        // modal_target.find('input[name=_project]').val(id);
        callAjax(url,null, function(res){
            if(res.error == false){
              modal_target.find('form .row').html(res.data);
              modal_target.modal('show');
              $('select.selectize').selectize('refresh');
            }else{
              swal(res.message);
            }
        });
      });


    //add custom parsley max files
    window.Parsley.addValidator('maxFile', {
      validateString: function(_value, max, parsleyInstance) {
        if (!window.FormData) {
          alert('You are making all developpers in the world cringe. Upgrade your browser!');
          return true;
        }
        var files = parsleyInstance.$element[0].files;
        if(files.length > max)
          return false;
      },
      requirementType: 'integer',
      messages: {
        en: 'This field max %s files',
      }
    });


    window.callJs();
    window.chat_time();
    window.scrollToBottom();
   });
</script>
@endsection
