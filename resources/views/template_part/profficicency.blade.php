<?php $rand = rand(99,999);?>
<div class="accordion" role="tablist" aria-multiselectable="true">
   <div class="card father-card">
      <div class="card-header border-top-radius" role="tab" id="headingOne-{{$rand}}" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 10px; padding-bottom: 11px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
         <h6 class="mb-0">
            <a data-toggle="collapse" data-parent="#accordion" href="#proff-{{$rand}}" aria-expanded="true" aria-controls="info">
               <img src="svg-icons/JobCard/settings-icon.svg" width="15" hspace="1">
               <span class="color-1 paddingbottom5 fontweight-400 fontsize-13 ">Profficiency</span>
               <svg class="olymp-dropdown-arrow-icon">
                  <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
               </svg>
            </a>
         </h6>
      </div>
      <div id="proff-{{$rand}}" class="collapse infomation-probid" role="tabpanel" aria-labelledby="headingOne-{{$rand}}">
         @include('template_part.information-bis', ['user'=>$bid->user])
         {{-- <div class="ui-block padding0 margintop10 border" data-mh="pie-chart">
            <div class="ui-block-content textalign-left">
               <div class="skills-item" >
                  <div class="skills-item-info">
                     <span class="skills-item-title">
                        <span class="paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">Contests (Won/Placed/Joined)</span>
                     </span>
                     <span class="skills-item-count paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">
                        <span class="units color-5">{{$user->contests_win()->count()}}/{{$user->contests_placed()->count()}}/{{$user->contests_joined()->count()}}</span>
                     </span>
                  </div>
               </div>
               <div class="skills-item" >
                  <div class="skills-item-info">
                     <span class="skills-item-title">
                        <span class="paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">Reviews (Done/Incomplete)</span>
                     </span>
                     <span class="skills-item-count paddingbottom5 paddingleft-0 fontweight-500 fontsize-13 color-2">
                        <span class="count-animate" data-speed="50" data-refresh-interval="50" data-to="{{$user->reviews()->count()}}" data-from="0"></span>
                        <span class="units color-5">{{$user->reviews()->count()}}</span> <span>/ </span>
                        <span class="units color-6">0</span>
                     </span>
                  </div>
               </div>
               <div class="skills-item total-project">
                  <div class="skills-item-info">
                     <span class="skills-item-title">
                        <span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Total Projects (3 Months)</span>
                     </span>
                     <span class="skills-item-count color-2 fontsize-13 fontweight-500">
                        <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="{{$user->projects_joined()->count()}}" data-from="0"></span>
                        <span class="units">{{$user->projects_joined()->count()}}</span>
                     </span>
                  </div>
               </div>
               <div class="skills-item">
                  <div class="skills-item-info">
                     <span class="skills-item-title">
                        <span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">On Budget</span>
                     </span>
                     <span class="skills-item-count" style="color: #525488; padding-bottom: 0px;padding-left: 0px;font-size: 13px;font-weight: 500">
                        <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="90" data-from="0"></span><span class="units">90%</span>
                     </span>
                  </div>
                  <div class="skills-item-meter margintop-10">
                     <span class="skills-item-meter-active bg-blue" style="width: 50%"></span>
                  </div>
               </div>
               <div class="skills-item">
                  <div class="skills-item-info">
                     <span class="skills-item-title">
                        <span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">On Time Delivery</span>
                     </span>
                     <span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
                        <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="87" data-from="0"></span>
                        <span class="units">87%</span>
                     </span>
                  </div>
                  <div class="skills-item-meter margintop-10">
                     <span class="skills-item-meter-active bg-blue" style="width: 87%"></span>
                  </div>
               </div>
               <div class="skills-item paddingbottom25 complete-rate">
                  <div class="skills-item-info">
                     <span class="skills-item-title">
                        <span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Completion Rate</span>
                        <span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
                           <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="98" data-from="0"></span>
                           <span class="units">98%</span>
                        </span>
                     </span>
                  </div>
                  <div class="skills-item-meter margintop-10">
                     <span class="skills-item-meter-active bg-blue" style="width: 98%"></span>
                  </div>
               </div>
               @foreach($criteria_rating as $key=>$value)
               <div class="skills-item inline-items margintop15 marginbottom15">
                  <span>
                     <img src="svg-icons/JobCard/star-icon.svg" width="18" hspace="1">
                     <span class="color-2 paddingbottom5 paddingleft5 fontsize-13 fontweight-400">{{$value}}</span>
                  </span>
                  <br>
                  <div class="counter-numbers counter h5 inline-items fontsize-12 marginbottom-0 marginleft25">
                     <span data-speed="2000" data-refresh-interval="15" data-to="260" data-from="0" class="fontweight-400 color-7">0</span>
                     <div class="units">
                        <div><font class="fontweight-400" color="#3E8BED">{{$user->point_name}} </font></div>
                     </div>
                  </div>
                  <ul class="rait-stars marginbottom-0 margintop-0">
                     <li class="numerical-rating">| {{$user->type_point($key)}}</li>
                     {{rateToStar($user->type_point($key))}}
                  </ul>
               </div>
               @endforeach
            </div>
         </div> --}}
      </div>
   </div>
</div>
