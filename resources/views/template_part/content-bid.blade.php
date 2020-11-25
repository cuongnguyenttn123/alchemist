<div class="ui-block content-job content-bid">
   <!-- Bid -->
   <div class="post-thumb">
      <div class="post-category full-width align-center">${{$bid->price}} (USD) | {{$bid->work_time}} Days</div>
   </div>
   <article class="hentry post">
      @include('template_part.part-infouser', ['user' => $bid->user] )
      <div class="post__author author vcard inline-items author-info">
        <a data-toggle="tooltip" data-placement="top" title="POSTED JOBS" href="javascript:;" class="post-add-icon inline-items">
          <img src="svg-icons/JobCard/paper-plane.svg" class="olymp-heart-icon">
          <span>{{$bid->user->total_jobs()}}</span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="REVIEWS" href="javascript:;" class="post-add-icon inline-items">
          <img src="svg-icons/JobCard/interface.svg" class="olymp-heart-icon">
          <span>{{$bid->user->reviews->count()}}</span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="SEEKER POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
          <img src="svg-icons/JobCard/seo-and-web.svg" class="olymp-heart-icon" style="border-radius: 0%;width: 15px">
          <span>SP | LV {{$bid->user->level}}</span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="REPUTAION POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
          <img src="svg-icons/JobCard/yes.svg" class="olymp-heart-icon">
          <span>RP | LV 80</span>
        </a>
      </div>

     <div class="description-project-more">
       <p class="friend-about" data-swiper-parallax="-500">
         <span style="font-size: 14px;">{{$bid->description}}</span>
       </p>
     </div>
      <div class="control-block-button post-control-button">
         {{-- <a data-toggle="tooltip" data-placement="left" title="SAVE"  href="javascript:;" class="btn btn-control active">
            <img src="svg-icons/JobCard/save-file-option-white.svg" width="10" class="olymp-like-post-icon" style="width: 18px;position: relative;padding-bottom: 9px">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
            </svg>
         </a> --}}
         <a data-toggle="tooltip" data-placement="left" title="CHAT" href="javascript:;" class="btn btn-control">
            <svg class="olymp-comments-post-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-comments-post-icon"></use>
            </svg>
         </a>
      </div>
   </article>
   <div class="col col-xl-12 order-xl-1 col-lg-12 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 no-margin no-padding">
      <div class="ui-block" style="margin: -1px 0px 0px 0px;">
          @include('template_part.information', ['user'=>$bid->user])

      </div>
   </div>
   <!-- .. end Bid -->
</div>
