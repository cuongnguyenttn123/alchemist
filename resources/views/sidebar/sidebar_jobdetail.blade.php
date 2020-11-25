
   <div class="ui-block">
      <div class="ui-block-title">
         <h6 class="title">Recent Job Postings</h6>
      </div>
      <div class="ui-block-content">
         <!-- Widget Recent Jobs -->
         <ul class="widget w-featured-topics">
            @foreach($recent_jobs as $project)
            <li>
               <div class="content">
                  <a href="{{$project->permalink()}}" class="h6 title">{{$project->name}}</a>
                  <time class="entry-date updated">{{$project->posted_ago}} | {{$project->deadline_left}} Days Left</time>
                  <div class="forums">${{$project->budget}} USD | T2500 in {{$project->total_day}} Days</div>
               </div>
            </li>
            @endforeach
         </ul>
         <!-- ... end Widget Recent Jobs -->
      </div>
   </div>