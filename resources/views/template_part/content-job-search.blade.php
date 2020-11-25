<?php
	$pj_listtype = $project->listtype;
	$class = [];
	foreach($project->listtype as $listtype){
		$class[] = str_slug($listtype->type_name);
	}
?>
@if(!isset($jobdetail))
<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 sorting-item {{implode(' ', $class)}}" style="z-index: inherit">
@endif
	<div class="ui-block content-job">
    <?php
    $diff = abs(strtotime($project->bid_end) - strtotime($project->bid_start));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
    if ($days == 0){
      $days = 1;
    }

    ?>
		<div class="post-thumb">
			<a class="post-category bg-smoke full-width align-center">${{$project->budget}} USD | {{$days}} Days</a>
		</div>
		@foreach($project->listtype as $listtype)
			@if($listtype->type_name == "Featured")
			<div class="friend-header-thumb" >
	      		<img src="img/featured-bg.svg" alt="friend">
	      	</div>
	      	@elseif($listtype->type_name == "Urgent")
	      	<div class="post-thumb" style="margin: 0px 0px 0px 0px; border-top-left-radius: 0px;border-top-right-radius: 0px; border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; ">
	      		<a href="javascript:;" class="post-category  full-width align-center" style="background-image: linear-gradient(#FFCC7F, #FFBA50); padding-top: 5px;padding-bottom: 5px; margin: 0px;border-bottom-left-radius: 0px;border-bottom-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px; font-size: 11px;font-weight: 500;color: #fff">Urgent project</a>
	     	</div>
			@endif
		@endforeach
		<article class="hentry post video" style="padding-bottom: 25px;">
			@include('template_part.part-infouser', ['user'=>$project->user])
				<div class="post__author author vcard inline-items author-info">
					<a data-toggle="tooltip" data-placement="top" title="POSTED JOBS" href="javascript:;" class="post-add-icon inline-items">
						<img src="svg-icons/JobCard/paper-plane.svg" class="olymp-heart-icon">
						<span>{{$project->user->total_jobs()}}</span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="REVIEWS" href="javascript:;" class="post-add-icon inline-items">
						<img src="svg-icons/JobCard/interface.svg" class="olymp-heart-icon">
						<span>{{$project->user->reviews->count()}}</span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="SEEKER POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
						<img src="svg-icons/JobCard/seo-and-web.svg" class="olymp-heart-icon" style="border-radius: 0%;width: 15px">
						<span>SP | LV {{$project->user->level}}</span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="REPUTAION POINTS/LEVEL" href="javascript:;" class="post-add-icon inline-items">
						<img src="svg-icons/JobCard/yes.svg" class="olymp-heart-icon">
						<span>RP | LV {{$project->user->rp_level}}</span>
					</a>
				</div>
      <div class="post__date" style="color: #9A9FBF; margin-top: 20px" >
        <time class="published" datetime="2004-07-24T18:18">
          Posted: {{$project->created_at->format('H:i, Y-m-d')}}
        </time>
      </div>
				<div class="post__author author vcard inline-items" >
					<div class="author-date">
						<a class="h6 post__author-name fn" href="{{$project->permalink()}}" style="margin-top:20px">{{$project->name}}</a>
					</div>
				</div>


      <div class="description-project-more">
        <p class="friend-about" data-swiper-parallax="-500">
          <span style="font-size: 14px;">{{$project->detail_description}}</span>
        </p>
      </div>

        <div class="post__date" style="margin-bottom: 25px; margin-top: -5px; margin-bottom: 10px; margin-top: -5px; padding-bottom: 15px; border-bottom: solid 1px #E6ECF5;">
        <time data-toggle="tooltip" data-placement="top" title="DATE POSTED" class="published" datetime="2004-07-24T18:18">
          <img src="svg-icons/menu/post-it.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 9px;margin-left: 1px;">{{$project->created_at->diffForHumans()}}
        </time>
        <a data-toggle="tooltip" data-placement="top" title="DAYS LEFT TO BID" href="#" class="post-add-icon inline-items">
          <img src="svg-icons/JobCard/timer.svg" class="olymp-heart-icon" style="border-radius: 0%;margin-left: 10px"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use><span style="font-weight: 400;color: #888DA8">{{$project->day_left}}</span> <span style="font-weight: 400;color: #888DA8;">Days Left</span>
        </a>
        <div class=" inline-items" style="margin-top: 5px" >
          <a data-toggle="tooltip" data-placement="top" title="FIAT PRICE" href="#" class="post-add-icon inline-items">
            <img src="svg-icons/menu/target-square.svg" class="olymp-heart-icon" style="border-radius: 0%"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></img><span style="font-weight: 400;color: #888DA8">${{$project->budget}}</span> <span style="font-weight: 400;color: #888DA8"> USD</span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="JOB DELIVERY ESTIMATE" href="#" class="post-add-icon inline-items" style="margin-left: 10px">
            <img src="svg-icons/JobCard/checked-calendar-icon-01.svg" class="olymp-heart-icon" style="border-radius: 0%"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></img><span style="font-weight: 400;color: #888DA8">{{$days}}</span> <span style="font-weight: 400;color: #888DA8">Day Project</span>
          </a>
        </div>
      </div>
				<div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding cats-project">
          <div class="skills-item-info" style="padding-bottom: 0px;margin-bottom: 8px;"><span class="skills-item-title"><span style="color: #9a9fbf; padding-bottom: 5px;padding-right: 3px;font-size: 22px;font-weight: 500;vertical-align: sub;">●</span><span style="color: #525488; padding-bottom: 5px;padding-left: 0px; padding-right: 8px;font-size: 13px;font-weight: 500">Categories</span><span style="color: #38a9ff; padding-bottom: 5px;padding-right: 3px;font-size: 22px;font-weight: 500; vertical-align: sub;">●</span><span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Skills</span></span> </div>

					@foreach($project->categoriesProject as $cat)
						<a href="{{$cat->permalink()}}" class="btn btn-secondary btn-sm">{{$cat->name}}</a>
					@endforeach
					@foreach($project->skills as $skil)
						<a href="javascript:;" class="btn btn-blue btn-sm">{{$skil->name}}</a>
					@endforeach

				</div>
				<div class="col col-lg-3 col-md-3 col-sm-3 col-3 float-right no-padding" style="margin-top: -10px">
					<div class="comments-shared float-right">
						<a data-toggle="modal" data-target="#create-friend-group-add-friends" data-toggle="tooltip" data-placement="TOP" title="SHARE JOB" data-toggle="modal" data-target="#create-friend-group-add-friends" href="javascript:;" class="post-add-icon inline-items">
							<svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
						<span>0</span>
						</a>
					</div>
				</div>

				<div class="col col-lg-5 col-md-5 col-sm-5 col-5 no-padding inline-items float-left" style="margin-top: -10px">
					<div>
						<a data-toggle="tooltip" data-placement="top" title="Alchemist Bids" href="javascript:;" class="post-add-icon inline-items" style="margin-left: 0px; color: #888DA8 ">
						<img src="svg-icons/JobCard/profile.svg" class="olymp-heart-icon">
						<span >{{$project->bids->count()}}</span>
					</a>
					<a data-toggle="tooltip" data-placement="top" title="AVERAGE BID" href="javascript:;" class="post-add-icon inline-items"style="color: #888DA8; margin-left: 10px">
						<img src="svg-icons/JobCard/average.svg" class="olymp-heart-icon">
						<span>{{$project->average_bidprice}}</span>
					</a>
				</div>
			</div>
      @if( !Auth::user())
        <div class="control-block-button post-control-button">
          <?php
          $s_text = ($project->is_saved()) ? 'SAVED' : 'SAVE';
          $bg = ($project->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
          ?>
          <a href="javascript:;" data-toggle="modal" data-target="#registration-login-form-popup" class="btn btn-control {{$bg}}">
            <img width="10" src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="width: 18px;position: relative;padding-bottom: 9px">
          </a>
          <a  data-toggle="modal" data-target="#registration-login-form-popup" href="javascript:;" class="btn btn-control">
            <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
          </a>
          <div class="share-social">
            <ul>
              {{addSocial($project->permalink())}}
            </ul>
          </div>
        </div>
      @else
			  <div class="control-block-button post-control-button">
	            <?php
	              $s_text = ($project->is_saved()) ? 'SAVED' : 'SAVE';
	              $bg = ($project->is_saved()) ? 'bg-primary' : 'bg-gradient-gray';
	            ?>
          <a href="javascript:;" data-toggle="tooltip" data-id="{{$project->id}}" class="btn btn-control {{$bg}} save_project" title="{{$s_text}}">
            <img width="10" src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="width: 18px;position: relative;padding-bottom: 9px">
          </a>
          <a data-toggle="tooltip" data-placement="right" title="SHARE" href="javascript:;" class="btn btn-control sharesocial">
            <svg class="olymp-share-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
          </a>
          <div class="share-social">
            <ul>
              {{addSocial($project->permalink())}}
            </ul>
          </div>
        </div>
      @endif
		</article>
      @if($user != null && !$project->user_bided() && $user->id != $project->user->id && $project->bid_end>time() && (($project->status() == 'created') || ($project->status() == 'Waiting Accept')))
        <div class="comment-form inline-items" style="width: 100%">
          <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-md-2 btn-blue float-right bid_now " style="background-color: #90CB1E;min-height: 44px;margin:15px 0 0">BID NOW</a>
          <a href="javascript:;" data-id="{{$project->id}}" class="btn btn-md-2 btn-primary float-right {{$bg}} save_project" style="padding: 8px 12px 8px 12px;margin: 15px 15px 0 0; border-color: white;">
            <img src="svg-icons/JobCard/save-file-option-white.svg" class="olymp-heart-icon" style="border-radius: 0%; width: 18px;margin-right: 0px;margin-left: 0px">
          </a>
          <a href="{{$project->permalink()}}" class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color float-left" style="margin:15px 0 0;padding: 13px 25px 13px 25px;">PROJECT DETAILS</a>
        </div>
      @endif
	</div>
@if(!isset($jobdetail))
</div>
@endif
