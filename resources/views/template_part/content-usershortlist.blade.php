<li class="shortlist_message" data-id={{$bid->id}}>
   <div class="author-thumb">
      {!!$bid->user->getAvatarImgAttribute(36)!!}
   </div>
   <div class="notification-event">
      <span>
         <a href="javascript:;" class="h6 notification-friend">{{$bid->user->full_name}}</a>
         <img src="svg-icons/Flags/226-united-states.svg" class="olymp-heart-icon olymp-heart-icon-left">
      </span>
      <time class="entry-date updated" datetime="2017-06-24T18:18" >
         <span>{{$bid->user->user_title}} | LV {{$bid->user->level}}
            <img src="svg-icons/JobCard/emeral-test.svg" class="olymp-heart-icon olymp-heart-icon-right">
         </span>
      </time>
      <br>
      <div class="post__author author vcard   inline-items">
         <a data-toggle="tooltip" data-placement="top" title="ALCHEMIST POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items sbp-lv">
            <img src="svg-icons/JobCard/trophy.svg" class="olymp-heart-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
            <span>SBP | LV {{$bid->user->level}}</span>
         </a>
         <a data-toggle="tooltip" data-placement="top" title="REPUTAION POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items rp-lv">
            <img src="svg-icons/JobCard/loudspeaker.svg" class="olymp-heart-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
            <span>RP | LV 80</span>
         </a>
      </div>
      {{-- <span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
      <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span> --}}
   </div>
   {{-- <span class="notification-icon">
      <img src="svg-icons/JobCard/medal.svg" data-toggle="modal" data-target="#awardproject" class="olymp-chat---messages-icon" data-toggle="tooltip" data-placement="left" title="AWARD PROJECT">
      <use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
      </svg>
   </span>
   <div class="more">
      <svg class="olymp-three-dots-icon">
         <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
      </svg>
   </div> --}}
</li>
