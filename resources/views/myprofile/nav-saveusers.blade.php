<div class="ui-block">
   <!-- Your Profile  -->
   <div id="profile-panel" class="your-profile">
      <div class="ui-block-title ui-block-title-small">
         <h6 class="title">USER TYPE</h6>
      </div>
      <ul class="nav nav-tabs your-profile-menu main" id="myTab1" role="tablist">
         <li class="nav-item" >
             <a class="nav-link active show check-tag-alche" id="friend-tab" data-toggle="tab" href="#alchemist-tab" role="tab" aria-controls="friend" aria-selected="false">
                <div class="ui-block-title">
                   <div class="h6 title"><img src="svg-icons/menu/flask.svg" width="18" hspace="1" style=" margin-right: 10px; padding-bottom: 3px">Saved Alchemist's</div>
                </div>
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link check-tag-seeker" id="friend-tab" data-toggle="tab" href="#seeker-tab" role="tab" aria-controls="friend" aria-selected="false">
                <div class="ui-block-title">
                   <div class="h6 title"><img src="svg-icons/menu/focus.svg" width="18" hspace="1" style=" margin-right: 10px; padding-bottom: 3px">Saved Seeker's</div>
                </div>
             </a>
          </li>
      </ul>

     <div class="ui-block-title "><a href="{{route('find_seeker')}}" class="btn btn-primary btn-md full-width" style="color: #ffffff;padding-left: 10px;padding-right: 10px;">SEARCH MERCHANTS</a></div>
     <div class="ui-block-title " style="border-top: 0px;"><a href="{{route('find_alchemist')}}" class="btn btn-green btn-md full-width" style="color: #ffffff;padding-left: 10px;padding-right: 10px;">FIND TALENT</a></div>
   </div>
   <!-- ... end Your Profile  -->
</div>
