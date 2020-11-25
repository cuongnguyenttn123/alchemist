
<div class="ui-block-title" style="padding-left: 20px;padding-right: 20px;border-bottom: solid; border-bottom-width: 1px;border-bottom-color: #E6ECF5" >

      <div class="col col-lg-12 col-12 no-padding">
         <div class="skills-item" >
            <div class="skills-item-info"><span class="skills-item-title"><span >Reviews (Done/Incomplete)</span> </span>
               <span class="skills-item-count" >
                  <span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
                  <span class="units" style="color: #90CB1E">{{$mem->reviews()->count()}}</span>
                  <span>/ </span>
                  <span class="units" style="color: #FF5E3A">0</span>
               </span>
            </div>
         </div>
      @if($mem->rolename == 'Seeker')
         <div class="skills-item" style="margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Total Projects Posted</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->projects()->count()}}</span></span></div>
         </div>
         <div class="skills-item" style="margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Total Contests Posted</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->contests()->count()}}</span></span></div>
         </div>
      @else
         <div class="skills-item" style="margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Projects Completed</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->projects_joined()->count()}}</span></span></div>
         </div>
         <div class="skills-item" style="margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Contests Entered</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->contests_joined()->count()}}</span></span></div>
         </div>
         <div class="skills-item" style="margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Contests Won (1st)</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->contests_win()->count()}}</span></span></div>
         </div>
         <div class="skills-item" style="margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Contests Placed (2nd, 3rd, 4th)</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->contests_placed()->count()}}</span></span></div>
         </div>
      @endif

         <div class="skills-item" style="margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Total Disputes</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->total_disputes}}</span></span></div>
         </div>
         <div class="skills-item" style="margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Disputes Won</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->disputes_win}}</span></span></div>
         </div>
         <div class="skills-item" style="border-bottom: solid 1px #E6ECF5;margin-top: -5px">
            <div class="skills-item-info"><span class="skills-item-title"><span>Disputes Lost</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units">{{$mem->disputes_lose}}</span></span></div>
         </div>

      @if($mem->rolename == 'Seeker')

         <div class="skills-item">
            <div class="skills-item-info"><span class="skills-item-title"><span >On Time Payments</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="90" data-from="0"></span><span class="units">90%</span></span></div>
            <div class="skills-item-meter" style="margin-top: -10px">
               <span class="skills-item-meter-active bg-blue" style="width: 50%;opacity: 1"></span>
            </div>
         </div>
      @else
         <div class="skills-item">
            <div class="skills-item-info"><span class="skills-item-title"><span >On Budget</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="90" data-from="0"></span><span class="units">90%</span></span></div>
            <div class="skills-item-meter" style="margin-top: -10px">
               <span class="skills-item-meter-active bg-blue" style="width: 50%;opacity: 1"></span>
            </div>
         </div>
         <div class="skills-item">
            <div class="skills-item-info"><span class="skills-item-title"><span >On Time Delivery</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="87" data-from="0"></span><span class="units">87%</span></span></div>
            <div class="skills-item-meter" style="margin-top: -10px">
               <span class="skills-item-meter-active bg-blue" style="width: 87%;opacity: 1"></span>
            </div>
         </div>
      @endif

         <div class="skills-item">
            <div class="skills-item-info"><span class="skills-item-title"><span >Completion Rate</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="87" data-from="0"></span><span class="units">87%</span></span></div>
            <div class="skills-item-meter" style="margin-top: -10px">
               <span class="skills-item-meter-active bg-blue" style="width: 87%;opacity: 1"></span>
            </div>
         </div>
      </div>
</div>
