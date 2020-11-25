<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
  <?php
  $show_key = 0;
  $checkFile = $ms->files_delivery();
  $status = $ms->status_name;
  $color_class = '';
  $bg_class = '';
  switch ($status){
    case 'Completed':
      $color_class = '';
      $bg_class = 'milestone-color-gree-bg';
      break;
    case 'waiting':
      $color_class = '';
      $bg_class = 'milestone-color-waiting-bg';
      break;
    case 'Block':
      $color_class = '';
      $bg_class = 'milestone-color-block-bg';
      break;
    case 'Underway':
      $color_class = '';
      $bg_class = 'milestone-color-troi-bg';
      break;
    case 'Payment Due':
      $color_class = '';
      $bg_class = 'milestone-color-hong-bg';
      break;
    case 'created':
      $color_class = '';
      $bg_class = 'milestone-color-waiting-bg';
      break;
    case 'Early Release':
      $color_class = '';
      $bg_class = 'milestone-color-yellow-bg';
      break;
    default:
      $color_class = '';
      $bg_class = 'milestone-color-defaut-bg';
      break;
  }
  ?>
  <div class="ui-block responsive-flex1200 margintop15 marginbottom5">
    <div class="ui-block-title {{$bg_class}}">
      <h6 class="title color-fff fontweight-500">Milestone 0{{$key+1}} | <span class="color-fff">{{$status}}</span></h6>
    </div>
  </div>
    @if($status == "Locked")
      <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

        <a href="#" data-toggle="modal" data-target="#create-photo-album"></a>

        <div class="content" style="margin-top: 10px">

          <a href="#" class="btn btn-control bg-secondary" data-toggle="modal" data-target="#create-photo-album">
            <img src="svg-icons/JobCard/padlock.svg" class="olymp-plus-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
          </a>

          <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Files Locked</a>
          <span class="sub-title">File Upload / Milestone Incomplete</span>

        </div>

      </div>
    @else
      <div>
        <div class="accordion" role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne-20">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#preview-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne">
                  <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1">
                  <span class="paddingbottom5 fontsize-13 fontweight-400 color-1">Preview Files</span>
                  <svg class="olymp-dropdown-arrow-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
                </a>
              </h6>
            </div>
            <div id="preview-{{$ms->id}}" class="collapse bg-color-EBF0F4 margintop10" role="tabpanel" aria-labelledby="headingOne-20">

                @if(!$project->is_author() && $status != 'Completed')
                  <div class="ui-block marginbottom-0 hp_previewfile">
                  <form action="#" method="post" class="upload_files">
                    <div class="ui-block-1 ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
                      <div class="ui-block-title form-group">
                        <input type="hidden" id="list_array_delete_bid_0_{{$key}}" name="file_attached_delete">
                        <input type="hidden" id="list_array_delete_bid_cosan_0_{{$key}}" name="file_attached_delete_cosan">
                        <input type="hidden" type="text" id="list_id_file_drag" name="list_id_file_drag">
                        <fieldset style="margin-top: 0px;">
                          <div>
                            <label for="fileselect"></label>
                            <input type="hidden" id="fileselect" name="fileselect[]" multiple="multiple" />
                            <div id="filedrag">
                              <div class="ui-block-content" style="padding-top: 5px;padding-bottom: 10px;"><div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 15px">
                                  <input style="width: 100%; opacity: 0;position: absolute;z-index: 1;top: 0px; " data-show_key = "{{$key}}" data-show_check = "0" id="hp_file" class="hp_file hp_file_upload abcsd photo-album-item create-album get_list_file_{{$key}}" type="file" name="files[]" value="" multiple="" data-parsley-group="block-0" data-parsley-id="36">

                                  <div class="content" style="margin-top: 15px">
                                    <a class="btn btn-control bg-primary abcs" style=" z-index: 2;">
                                      <svg class="olymp-plus-icon" style="cursor: pointer;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                    </a>

                                    <a  class="title h5" data-toggle="modal" data-target="#create-photo-album">Add or Drag &amp; Drop</a>
                                    <span class="sub-title">Add reference files to attract Alchemists!</span>

                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </fieldset>

                        <button type="reset" class="btn btn-secondary btn-sm align-right resetfile  " style="background-image: linear-gradient(#E7E7E7, #D4D4D4);border: #B9B9B9 solid 1px;color: #6B6F83;font-weight: 500; margin-bottom: 20px; margin-top: 20px;margin-left: 10px">Clear</button>
                      </div>
                    </div>

                    <div class="ui-block">

                    </div>
                    <div class="hienthi show-file-update-{{$key}} material-input">

                    </div>
                    <div class="cart-main">
                      @if($ms->files_preview())
                        <table class="shop_table cart">
                          <tbody class="alldownload">
                          @foreach($ms->files_preview() as $file)
                            @include('template_part.content-attachdeliveryAlchemist', [$show_key])
                          @endforeach
                          </tbody>
                        </table>
                      @endif

                    </div>
                    <div class="form-group">
                      <input type="hidden" name="ms_id" value="{{$ms->id}}">
                      <input type="hidden" name="type" value="preview">
                    </div>
                    <div class="ui-block-1">
                      <button type="reset" data-show-all = "{{$key}}" class="btn btn-purple btn-md-2 btn-icon-left click-delete-file-all" style="background-image: linear-gradient(#57596E, #3F4257);margin-right: 5px;margin-left: 20px; margin-top: 15px;">
                        <svg class="svg-inline--fa fa-window-close fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="window-close" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                          <path fill="currentColor" d="M464 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-83.6 290.5c4.8 4.8 4.8 12.6 0 17.4l-40.5 40.5c-4.8 4.8-12.6 4.8-17.4 0L256 313.3l-66.5 67.1c-4.8 4.8-12.6 4.8-17.4 0l-40.5-40.5c-4.8-4.8-4.8-12.6 0-17.4l67.1-66.5-67.1-66.5c-4.8-4.8-4.8-12.6 0-17.4l40.5-40.5c4.8-4.8 12.6-4.8 17.4 0l66.5 67.1 66.5-67.1c4.8-4.8 12.6-4.8 17.4 0l40.5 40.5c4.8 4.8 4.8 12.6 0 17.4L313.3 256l67.1 66.5z"></path></svg>CLEAR ALL</button>

                      <button type="submit" data-key = "{{$key}}" data-show_key = "{{$show_key}}" class="get-value-update btn btn-blue btn-md-2 btn-icon-left" style="margin-right: 5px;margin-left: 20px; margin-top: 15px;"><svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                          <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>UPDATE</button>

                    </div>
                  </form>
                </div>
                @else
                  <div class="ui-block marginbottom-0 hp_previewfile">
                    <div class="cart-main">
                    @if($ms->files_preview())
                      <table class="shop_table cart">
                        <thead class="bg-table-tracking-thead">
                        <tr>
                          <th class="product-thumbnail paddingleft25 bg-table-tracking">ITEM DESCRIPTION</th>
                          <th class="product-quantity bg-table-tracking">DATE UPLOADED</th>
                          <th class="product-subtotal bg-table-tracking">DOWNLOAD</th>
                        </tr>
                        </thead>
                        <tbody class="alldownload">
                        @foreach($ms->files_preview() as $file)
                          @include('template_part.content-attachdelivery')
                        @endforeach
                        <td colspan="4" class="actions paddingleft25">
                          <a href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left download_all" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " >
                            <i class="fa fa-download" aria-hidden="true" ></i>
                            DOWNLOAD ALL
                          </a>
                        </td>

                        </tbody>
                      </table>
                    @else
                      @if($status == "Underway")
                        <div class="ui-block" style="margin-bottom: 0px;">
                          <div class="ui-block-content">
                            <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                              <a href="#" data-toggle="modal" data-target="#create-photo-album"></a>

                              <div class="content" style="margin-top: 10px">

                                <a href="#" class="btn btn-control bg-blue" data-toggle="modal" data-target="#create-photo-album">
                                  <img src="svg-icons/JobCard/timer-white-01.svg" class="olymp-plus-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                  <div class="ripple-container"></div></a>

                                <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Pending Upload</a>
                                <span class="sub-title">No Files Uploaded by Alchemist</span>

                              </div>

                            </div>
                          </div>
                        </div>
                      @else
                        <div class="ui-block" style="margin-bottom: 0px;">
                          <div class="ui-block-content">
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
                        </div>
                      @endif
                    @endif

                  </div>
                  </div>
                @endif

            </div>
          </div>
        </div>

        <div class="accordion"  role="tablist" aria-multiselectable="true">
          <div class="card">
            <div class="card-header" role="tab" id="headingOne-20">
              <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#delivery-{{$ms->id}}" aria-expanded="true" aria-controls="collapseOne">
                  <img src="svg-icons/JobCard/open-folder-outline.svg" width="18" hspace="1">
                  <span class="paddingbottom5 fontsize-13 fontweight-400 color-1">Project Deliverables</span>
                  <svg class="olymp-dropdown-arrow-icon">
                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                  </svg>
                </a>
              </h6>
            </div>
            <div id="delivery-{{$ms->id}}" class="collapse bg-color-EBF0F4 margintop10" role="tabpanel" aria-labelledby="headingOne-20">
              @if(!$project->is_author() && $status != 'Completed')
                <div class="marginbottom-0 hp_previewfile">
                  <form action="#" method="post" class="upload_files">
                    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
                      <div class="ui-block-title form-group">
{{--                        <input style="width: 70%;" id="hp_file" data-show_key = "{{$key}}" data-show_check = "1" class="hp_file hp_file_upload  get_list_file_0_{{$key}}" type="file" name="files[]" value="" multiple="" data-parsley-group="block-0" data-parsley-id="36">--}}
                        <input type="hidden" id="list_array_delete_bid_1_{{$key}}" name="file_attached_delete">
                        <input type="hidden" id="list_array_delete_bid_cosan_1_{{$key}}" name="file_attached_delete_cosan">
                        <fieldset style="margin-top: 0px;">
                          <div>
                            <label for="fileselect"></label>
                            <input type="hidden" id="fileselect" name="fileselect[]" multiple="multiple" />
                            <div id="filedrag">
                              <div class="ui-block-content" style="padding-top: 5px;padding-bottom: 10px;"><div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px; margin-bottom: 15px">
                                  <input style="width: 100%;opacity: 0;position: absolute;z-index: 1;top: 0px; " id="hp_file" data-show_key = "{{$key}}" data-show_check = "1" class="hp_file hp_file_upload photo-album-item create-album abcsddd get_list_file_0_{{$key}}" type="file" name="files[]" value="" multiple="" data-parsley-group="block-0" data-parsley-id="36">
                                  <div class="content" style="margin-top: 15px">
                                    <a class="btn btn-control bg-primary abcss">
                                      <svg class="olymp-plus-icon" style="cursor: pointer; z-index: 2;"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
                                    </a>

                                    <a  class="title h5" data-toggle="modal" data-target="#create-photo-album">Add or Drag &amp; Drop</a>
                                    <span class="sub-title">Add reference files to attract Alchemists!</span>

                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <button type="reset"  class="btn btn-secondary btn-sm align-right resetfile  " style="background-image: linear-gradient(#E7E7E7, #D4D4D4);border: #B9B9B9 solid 1px;color: #6B6F83;font-weight: 500; margin-bottom: 20px; margin-top: 20px;margin-left: 10px">Clear</button>
                      </div>
                    </div>
                    <div class="ui-block">
                      <div class="hienthi show-file-update-0-{{$key}} material-input"></div>
                      <div class="cart-main">
                        @if($ms->files_delivery())
                          <table class="shop_table cart">
                            <tbody class="alldownload">
                            @foreach($ms->files_delivery() as $file)
                              <?php
                              $show_key = 1;
                              ?>
                              @include('template_part.content-attachdeliveryAlchemist', [$show_key])
                            @endforeach
                            </tbody>
                          </table>
                        @endif

                      </div>

                    <div class="form-group">
                      <input type="hidden" name="ms_id" value="{{$ms->id}}">
                      <input type="hidden" name="type" value="delivery">
                    </div>

                    <div class="ui-block-1">
                      <button type="reset" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257);margin-right: 5px;margin-left: 20px; margin-top: 15px;"><svg class="svg-inline--fa fa-window-close fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="window-close" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                          <path fill="currentColor" d="M464 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-83.6 290.5c4.8 4.8 4.8 12.6 0 17.4l-40.5 40.5c-4.8 4.8-12.6 4.8-17.4 0L256 313.3l-66.5 67.1c-4.8 4.8-12.6 4.8-17.4 0l-40.5-40.5c-4.8-4.8-4.8-12.6 0-17.4l67.1-66.5-67.1-66.5c-4.8-4.8-4.8-12.6 0-17.4l40.5-40.5c4.8-4.8 12.6-4.8 17.4 0l66.5 67.1 66.5-67.1c4.8-4.8 12.6-4.8 17.4 0l40.5 40.5c4.8 4.8 4.8 12.6 0 17.4L313.3 256l67.1 66.5z"></path></svg>CLEAR ALL</button>

                      <button type="submit" data-key = "{{$key}}" data-show_key = "{{$show_key}}" class="btn btn-blue btn-md-2 btn-icon-left get-value-update" style="margin-right: 5px;margin-left: 20px; margin-top: 15px;"><svg class="svg-inline--fa fa-check fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                          <path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>UPDATE</button>
                    </div>
                    </div>
                  </form>

                </div>
              @else
                @if($status == 'Completed')
                <div class="ui-block marginbottom-0 hp_previewfile">
                  <div class="cart-main">
                    @if($ms->files_delivery())
                      <table class="shop_table cart">
                        <thead class="bg-table-tracking-thead">
                        <tr>
                          <th class="product-thumbnail paddingleft25 bg-table-tracking">ITEM DESCRIPTION</th>
                          <th class="product-quantity bg-table-tracking">DATE UPLOADED</th>
                          <th class="product-subtotal bg-table-tracking">DOWNLOAD</th>
                        </tr>
                        </thead>
                        <tbody class="alldownload">
                        @foreach($ms->files_delivery() as $file)
                          @include('template_part.content-attachdelivery')
                        @endforeach
                        <td colspan="4" class="actions paddingleft25">
                          <a href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left download_all" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " >
                            <i class="fa fa-download" aria-hidden="true" ></i>
                            DOWNLOAD ALL
                          </a>
                        </td>

                        </tbody>
                      </table>
                    @else
                      @if($status == "Underway")
                        <div class="ui-block" style="margin-bottom: 0px;">
                          <div class="ui-block-content">
                            <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                              <a href="#" data-toggle="modal" data-target="#create-photo-album"></a>

                              <div class="content" style="margin-top: 10px">

                                <a href="#" class="btn btn-control bg-blue" data-toggle="modal" data-target="#create-photo-album">
                                  <img src="svg-icons/JobCard/timer-white-01.svg" class="olymp-plus-icon" style="margin-top: -14px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                  <div class="ripple-container"></div></a>

                                <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Pending Upload</a>
                                <span class="sub-title">No Files Uploaded by Alchemist</span>

                              </div>

                            </div>
                          </div>
                        </div>
                      @else
                        <div class="ui-block" style="margin-bottom: 0px;">
                          <div class="ui-block-content">
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
                        </div>
                      @endif
                    @endif

                  </div>
                </div>
                  @else
                  <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 100px">

                    <a href="#" data-toggle="modal" data-target="#create-photo-album"></a>

                    <div class="content" style="margin-top: 10px">

                      <a href="#" class="btn btn-control bg-primary" data-toggle="modal" data-target="#create-photo-album">
                        <img src="svg-icons/JobCard/banknote.svg" class="olymp-plus-icon" style="margin-top: -11px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                      </a>

                      <a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Pay to Release</a>
                      <span class="sub-title">All files released upon payment.</span>

                    </div>

                  </div>
                  @endif
              @endif
            </div>
            </div>
        </div>
      </div>
    @endif
</div>
