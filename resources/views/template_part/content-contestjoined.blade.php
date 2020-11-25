
<tr class="event-item">
  <td class="author">
    <div class="author-freshness" align="left">
      <span><span style="color: #525488; padding-bottom: 5px;font-size: 14px; font-weight: 500; margin-right: 5px">Contest ID:</span>
        <span style="font-size: 14px;font-weight: 400;margin-right: 5px">{{$contest->id}}</span>
        <a href="#" class="h6 title" style="padding-bottom: 2px;padding-top: 5px; font-weight: 500">{{$contest->name_contest}}</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><em style="font-size: 12px;">{{$contest->catname}}</em></time>

      </span>
    </div>
  </td>
  <td class="author">
    <div class="event-author author-freshness inline-items" style="vertical-align: top;margin-top: 15px;">
      <div class="author-thumb" style="margin-bottom:0px; position: sticky;">
        <a href="{{$contest->user->permalink()}}" target="_blank">
          <img src="{{$contest->user->getAvatarImgAttributeDefault()}}" alt="author" style="vertical-align: top; width: 45px;height: 45px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%; ">


          <div class="label-avatar bg-primary" style="z-index: 4;margin-top: -2px;width: 18px;height: 18px;padding-top: 1px;font-size: 9px;margin-right: 35px;position: absolute;">{{$contest->user->level}}</div></a>
      </div>
      <div class="author-freshness">
        <a href="{{$contest->user->permalink()}}" target="_blank" class="h6 title" style="margin-top: -5px; font-size: 12px; font-weight: 600">{{$contest->user->full_name}}
          <img src="svg-icons/Flags/country-code/{{$contest->user->countryflag}}.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: -1px;margin-left: 0px;margin-top: -2px; padding: 0px;height: 16px"></a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">{{$contest->user->user_title}} | LV {{$contest->user->level}}</span></time>
      </div>
    </div>
  </td>
  <td class="upcoming">
    <div class="event-author author-freshness inline-items">
      <div class="author-freshness"><a class="h6 title" style="margin-top: -5px; font-size: 12px;color: #51537F">Prize:</a>
        <time class="entry-date updated" datetime="2017-06-24T18:18"><span style="font-size: 12px;">${{$contest->total_prize}} USD, {{$contest->totalDay()}} Days</span></time>
      </div>
    </div>
  </td>
  <td class="estimate">

    <a href="#" class="post-category btn btn-sm btn-border-think c-grey btn-transparent  full-width align-center" style=" padding-top: 10px;padding-bottom: 10px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px; font-size: 11px;font-weight: 500;color: #525488; padding: 8px 0px 9px 0px;border-bottom: solid;border-bottom-width: 0px">ENTRY PREVIEW FILES<div class="ripple-container"></div></a>

    <div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px">
        <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
          <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseContestPreview1-{{$contest->id}}" aria-expanded="false" aria-controls="collapseOne" class="collapsed"><img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
              <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
              <svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
            </a>
          </h6>
        </div>

        <div id="collapseContestPreview1-{{$contest->id}}" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: rgb(235, 240, 244); margin-top: 8px;">


          <div class="ui-block" style="margin-bottom: 0px">


            <form action="#" method="post" class="cart-main">


              <!-- Shop Table Cart -->

              <table class="shop_table cart">
                <thead>
                <tr>
                  <th class="product-thumbnail" style="background:#ffffff; color: #888da8;padding-left: 25px">ITEM DESCRIPTION</th>
                </tr>
                </thead>
                {{--<tbody>
                @forelse($contest->user_entry_alchemist()->preview_attachments() as $file)
                  @include('template_part.content-attachdispute')
                  <td colspan="4" class="actions" style="padding-left: 25px">
                    <a data-toggle="modal" data-target="javascript:;" href="javascript:;" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px " ><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>
                  </td>
                @empty
                  <td>no file</td>
                @endforelse
                </tbody>--}}
                <tbody>
                <tr class="cart_item">

                  <td class="product-thumbnail" style="padding-left: 25px">

                    <div class="forum-item">
                      <img src="img/zip.svg" alt="forum" width="40">
                      <div class="content"><a href="#" class="h6 title">Website Files.zip</a>
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
                      <div class="content"><a href="#" class="h6 title">wedidit.com.hk</a>
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
                      <div class="content"><a href="#" class="h6 title">Video Reference</a>
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
                      <div class="content"><a href="#" class="h6 title">Flow-Diagram.ppt</a>
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
                      <div class="content"><a href="#" class="h6 title">User-Guide.pdf</a>
                        <div class="post__date">
                          <time class="published" datetime="2017-03-24T18:18">PDF File</time>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan="4" class="actions" style="padding-left: 25px">
                    <a data-toggle="modal" data-target="#" href="#" class="btn btn-purple btn-md-2 btn-icon-left" style="background-image: linear-gradient(#57596E, #3F4257); margin-right: 5px "><svg class="svg-inline--fa fa-download fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="download" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><!-- <i class="fa fa-download" aria-hidden="true"></i> -->DOWNLOAD ALL</a>							</td>
                </tr>
                </tbody>
              </table>

              <!-- ... end Shop Table Cart -->
            </form>

          </div>
        </div>
      </div>
    </div></td>
   <td class="add-event align-center">
      <a href="{{$contest->permalink()}}" class="btn btn-smoke btn-sm" style="background-image: linear-gradient(#57596E, #3F4257);font-weight: 400">Details <img src="svg-icons/Like-Dislike/right-arrow-Static-white.svg" width="9" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 5px"></a>

   </td>
</tr>
