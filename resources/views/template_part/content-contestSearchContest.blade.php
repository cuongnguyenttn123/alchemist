<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 sorting-item featured urgent open private nda " style="z-index: inherit">
  {{-- @dump($contest) --}}
  <div class="ui-block">
    <div class="post-thumb" style="margin: 0px 0px 0px 0px; ">
      <?php
      $diff = abs(strtotime($contest->time_end) - strtotime($contest->time_start));
      $years = floor($diff / (365*60*60*24));
      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
      ?>
      <a href="#" class="post-category bg-smoke full-width align-center" style="padding-top: 10px;padding-bottom: 10px; margin: 0px;border-radius: 0px; font-size: 14px;color: #858AA6;background-image: linear-gradient(#FFFFFF, #FAFBFD);border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5">${{$contest->total_prize}} USD | {{$days}} DAY</a>
    </div>

      @if($contest->type_name == "Featured")
        <div class="friend-header-thumb" >
          <img src="img/featured-contest-bg-.svg" alt="friend">
        </div>
      @endif
    <article class="hentry post video">
      @include('template_part.part-infouser', ['user'=>$contest->user])
      <div class="post__author author vcard inline-items author-info" style="padding-top: 10px;padding-bottom: 10px;border-top: solid 1px #E6ECF5;border-bottom: solid 1px #E6ECF5;">
        <a data-toggle="tooltip" data-placement="top" title="POSTED JOBS" href="javascript:;" class="post-add-icon inline-items">
          <img src="svg-icons/JobCard/paper-plane.svg" class="olymp-heart-icon">
          <span>{{$contest->user->total_jobs()}}</span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="REVIEWS" href="javascript:;" class="post-add-icon inline-items icon-content">
          <img src="svg-icons/JobCard/interface.svg" class="olymp-heart-icon">
          <span>{{$contest->user->reviews->count()}}</span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="SEEKER POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items icon-content">
          <img src="svg-icons/JobCard/seo-and-web.svg" class="olymp-heart-icon" style="border-radius: 0%;width: 15px">
          <span>SP | LV {{$contest->user->level}}</span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="REPUTAION POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items icon-content">
          <img src="svg-icons/JobCard/yes.svg" class="olymp-heart-icon">
          <span>RP | LV {{$contest->user->rp_level}}</span>
        </a>
      </div>
      <div class="post__date day-post" >
        <time class="published" datetime="2004-07-24T18:18">
          Posted: {{$contest->created_at->format('H:i, Y-m-d')}}
        </time>
      </div>
      <div class="post__author author vcard   inline-items" >
        <div class="author-date">
          <a class="h6 post__author-name fn" href="{{$contest->permalink()}}" style="word-wrap: break-word; padding-right: 8px; font-weight: 500; margin-bottom: 0px; line-height: 20px">{{$contest->name_contest}}</a>
        </div>
      </div>
      {!!nl2br($contest->rules)!!}
      <div class="post__date" style="margin-bottom: 10px; margin-top: 5px">
        <div class="post__date" style="margin-bottom: 10px; margin-top: -5px; padding-bottom: 15px; border-bottom: solid 1px #E6ECF5;">
          <time data-toggle="tooltip" data-placement="top" title="DATE POSTED" class="published" datetime="2004-07-24T18:18">
            <img src="svg-icons/menu/post-it.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 9px;margin-left: 1px;">{{$contest->created_at->diffForHumans()}}
          </time>
          <a data-toggle="tooltip" data-placement="top" title="DAYS LEFT TO BID" href="#" class="post-add-icon inline-items">
            <img src="svg-icons/JobCard/timer.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: 10px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use><span style="font-weight: 400;color: #888DA8">{{$contest->day_left}} </span> <span style="font-weight: 400;color: #888DA8;">Days Left</span>
          </a>
          <div class=" inline-items" style="margin-top: 5px" >
            <a data-toggle="tooltip" data-placement="top" title="FIAT PRICE" href="#" class="post-add-icon inline-items">
              <img src="svg-icons/menu/target-square.svg" class="olymp-heart-icon" style="border-radius: 0%"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></img><span style="font-weight: 400;color: #888DA8">${{$contest->total_prize}}</span> <span style="font-weight: 400;color: #888DA8"> USD</span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="JOB DELIVERY ESTIMATE" href="#" class="post-add-icon inline-items" style="margin-left: 10px">
              <img src="svg-icons/JobCard/checked-calendar-icon-01.svg" class="olymp-heart-icon" style="border-radius: 0%"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></img><span style="font-weight: 400;color: #888DA8">{{$days}}</span> <span style="font-weight: 400;color: #888DA8">Day Project</span>
            </a>
          </div>
        </div>
        <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
          <div class="skills-item-info" style="padding-bottom: 0px;margin-bottom: 8px;"><span class="skills-item-title"><span style="color: #9a9fbf; padding-bottom: 5px;padding-right: 3px;font-size: 22px;font-weight: 500;vertical-align: sub;">●</span><span style="color: #525488; padding-bottom: 5px;padding-left: 0px; padding-right: 8px;font-size: 13px;font-weight: 500">Categories</span><span style="color: #38a9ff; padding-bottom: 5px;padding-right: 3px;font-size: 22px;font-weight: 500; vertical-align: sub;">●</span><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skills</span></span> </div>

          <div class=" inline-items"  >

            @foreach($contest->categories as $cat)
              <a class="btn btn-secondary btn-sm skill-content" href="javascript:;">{{$cat->name}}</a>
            @endforeach

            @foreach($contest->skill as $sk)
              <a class="btn btn-blue btn-sm skill-content"  href="javascript:;">{{$sk->name}}</a>
            @endforeach
          </div>
          <div class="col col-lg-3 col-md-3 col-sm-3 col-3 float-right no-padding share-job" >
            <div class="comments-shared float-right">
              <a data-toggle="modal" data-target="#create-friend-group-add-friends" data-toggle="tooltip" data-placement="TOP" title="SHARE JOB" data-toggle="modal" data-target="#create-friend-group-add-friends" href="javascript:;" class="post-add-icon inline-items">
                <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                <span>0</span>
              </a>
            </div>
          </div>

          <div class="col col-lg-5 col-md-5 col-sm-5 col-5 no-padding inline-items share-job float-left" >
            <div>
              <a data-toggle="tooltip" data-placement="top" title="Alchemist Bids" href="javascript:;" class="post-add-icon inline-items" style="margin-left: 0px; color: #888DA8 ">
                <img src="svg-icons/JobCard/profile.svg" class="olymp-heart-icon">
                <span >3</span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="AVERAGE BID" href="javascript:;" class="post-add-icon inline-items"style="color: #888DA8; margin-left: 10px">
                <img src="svg-icons/JobCard/average.svg" class="olymp-heart-icon">
                <span>12</span>
              </a>
            </div>
          </div>
        </div>
        @if( !Auth::user())
          <div class="control-block-button post-control-button">

            <?php
            $s_text = ($contest->is_saved()) ? 'SAVED' : 'SAVE';
            $bg = ($contest->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
            ?>
            <a href="javascript:;" data-toggle="modal" data-target="#registration-login-form-popup" class="btn btn-control {{$bg}}">
              <img width="10" src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="width: 18px;position: relative;padding-bottom: 9px">
            </a>
            <a  data-toggle="modal" data-target="#registration-login-form-popup" href="javascript:;" class="btn btn-control">
              <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
            </a>
            <div class="share-social">
              <ul>
                {{addSocial($contest->permalink())}}
              </ul>
            </div>
          </div>
        @else
          <div class="control-block-button post-control-button">

            <?php
            $s_text = ($contest->is_saved()) ? 'SAVED' : 'SAVE';
            $bg = ($contest->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
            ?>
            <a href="javascript:;" data-toggle="tooltip" data-id="{{$contest->id}}" class="btn btn-control {{$bg}} save_contest" title="{{$s_text}}">
              <img width="10" src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="width: 18px;position: relative;padding-bottom: 9px">
            </a>
            <a data-toggle="tooltip" data-placement="right" title="SHARE" href="javascript:;" class="btn btn-control sharesocial">
              <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
            </a>
            <div class="share-social">
              <ul>
                {{addSocial($contest->permalink())}}
              </ul>
            </div>
          </div>
        @endif


      </div>
    </article>
    <div class="comment-form-1 inline-items">
      @if( !Auth::user())
        <a href="javascript:;" data-id="{{$contest->id}}" data-toggle="modal" data-target="#registration-login-form-popup" class="btn btn-md-2 btn-blue float-right bid_now " style="background-color: #90CB1E;min-height: 44px;margin:15px 0 0">ENTER</a>
        <a href="javascript:;" data-id="{{$contest->id}}" data-toggle="modal" data-target="#registration-login-form-popup" class="btn btn-md-2 btn-primary float-right {{$bg}}" style="padding: 8px 12px 8px 12px;margin: 15px 15px 0 0; border-color: white;">
          <img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px">
        </a>
      @else
        <a href="javascript:;" data-id="{{$contest->id}}" data-toggle="modal" data-target="#popup-place-bid" class="btn btn-md-2 btn-blue float-right bid_now enter-contest-now " style="background-color: #90CB1E;min-height: 44px;margin:15px 0 0">ENTER</a>
        <a href="javascript:;" data-id="{{$contest->id}}" class="btn btn-md-2 btn-primary float-right {{$bg}} save_contest" style="padding: 8px 12px 8px 12px;margin: 15px 15px 0 0; border-color: white;">
          <img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px">
        </a>
      @endif
      <a href="{{$contest->permalink()}}"  class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color" style="margin-top: 15px; padding: 13px 25px 13px 25px;">CONTEST DETAILS</a>
    </div>
  </div>
</div>
