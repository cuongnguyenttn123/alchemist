<div class="ui-block">
     <!-- Your Profile  -->
     <div id="profile-panel" class="your-profile">
        <ul class="nav nav-tabs your-profile-menu main" id="myTab1" role="tablist">
            <li class="nav-item">
             <div class="ui-block-title ui-block-title-small">
                <h6 class="title">PROFILE INFORMATION</h6>
             </div>
            </li>
            <li class="nav-item" >
               <a class="nav-link" id="" data-toggle="tab" href="#profile" role="tab" aria-controls="friend" aria-selected="false">
                  <div class="ui-block-title">
                     <div class="h6 title"><img src="svg-icons/sprites/profile.svg" width="18" hspace="1" style=" margin-right: 10px; padding-bottom: 3px">{{$target_user->fullname}} Info</div>
                  </div>
               </a>
            </li>
            <li class="nav-item">
              <div class="ui-block-title ui-block-title-small">
                 <h6 class="title">STATISTICS & REVIEWS</h6>
              </div>
            </li>
             @if($target_user->is_seeker())
             <?php 
             		$img_stats = 'svg-icons/menu/focus.svg';
             		$img_review = 'svg-icons/menu/file.svg';
             ?>
             @else
  	        <?php 
  	        	$img_stats = 'svg-icons/menu/flask.svg';
             		$img_review = 'svg-icons/menu/talent.svg';
  	       	?>
  	       	@endif
           	<li class="nav-item">
              <a class="nav-link" id="" data-toggle="tab" href="#notifications" role="tab" aria-controls="friend" aria-selected="false">
                 <div class="ui-block-title">
                    <div class="h6 title"><img src="{{$img_stats}}" width="18" hspace="1" style=" margin-right: 10px; padding-bottom: 3px"> Stats</div>
                 </div>
              </a>
           	</li>
           	@if($target_user->isAlchemist())
           	<li class="nav-item" >
              <a class="nav-link" id="" data-toggle="tab" href="#skills" role="tab" aria-controls="friend" aria-selected="false">
                 <div class="ui-block-title">
                    <div class="h6 title"><img src="svg-icons/sprites/trophy.svg" width="18" hspace="1" style=" margin-right: 10px; padding-bottom: 3px"> Skill Activity</div>
                 </div>
              </a>
            </li>
           	@endif
           	<li class="nav-item">
              <a class="nav-link" id="" data-toggle="tab" href="#friend" role="tab" aria-controls="friend" aria-selected="false">
                 <div class="ui-block-title">
                    <div class="h6 title"><img src="{{$img_review}}" width="18" hspace="1" style=" margin-right: 10px; padding-bottom: 3px"> Reviews</div>
                 </div>
              </a>
            </li>
        </ul>
        <div class="ui-block-title">
          <a href="javascript:;" class="btn btn-primary btn-md full-width">HIRE / CHAT</a>
        </div>
     </div>
     <!-- ... end Your Profile  -->
</div>
