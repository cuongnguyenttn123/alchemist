<div class="row" style="margin-bottom: 0px">
   <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
      <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
         <div class="ui-block-title" >
            <h3 style="font-size: 17px;color: #FFFFFF;">Results</h3>
         </div>
      </div>
   </div>
</div>
<?php 
   $is_from_win = $dispute->is_from_win();
   $is_results = $dispute->is_results;
   $results_dispute = $dispute->results_dispute();
?>
<div class="row" style="margin-bottom: 10px" >
   <div class="col col-lg-6 col-md-6 col-sm-6 col-12 no-margin">
      <div class="ui-block" data-mh="pie-chart" style="margin-bottom: 8px">
         <div class="ui-block-title ui-block-title-small">
            <h6 class="h6 title" align="center">
               @if($is_results && $is_from_win)
               <span style="color: #78BF00">Case Won - </span>
               @elseif($is_results && !$is_from_win)
               <span style="color: #FF4242">Case Lost - </span>
               @endif
               Plaintiff
            </h6>
         </div>
         <div style="margin-bottom: 0px;padding: 20px">
            @include('template_part.part-infouser', ['user' => $dispute->user_from])
         </div>
      </div>
      <div class="row" style="margin-bottom: 10px">
         @if($is_results)
         <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
            @forelse ($dispute->total_arbiters_vote_from() as $arbiter)
            <?php if($arbiter->is_author()){
               $bg_color = ($is_from_win) ? 'bg-blue' : 'bg-primary';
               $text = ' (You)';
            }else {
               $bg_color = ($is_from_win) ? 'bg-green' : 'bg-primary';
               $text = '';
            }
               $percent = ($is_from_win) ? $results_dispute->percent_win : $results_dispute->percent_lose;
               $tkn = ($is_from_win) ? $results_dispute->tkn_win : $results_dispute->tkn_lose;
            ?>
            <div class="empty-area" style="margin-bottom: 10px">
               <div class="content" align="center" style="vertical-align: middle;padding: 3px">
                  <div class="ui-block {{$bg_color}}" data-mh="pie-chart">
                     <div class="ui-block-title" style="padding: 10px 0px">
                        <h4 style="font-size: 13px;color: #FFFDFD;font-weight: 500" align="center">Arbiter 0{{$arbiter->position}}{{$text}} {{$dispute->text($arbiter->vote)}} {{$percent}}% = {{$tkn}} ALC</h4>
                     </div>
                  </div>
               </div>
            </div>
            @empty
            <div class="empty-area" style="padding: 13px 0px 0px 0px">
               <div class="content"  align="center" style="vertical-align: middle">
                  <span class="sub-title">No Votes</span>
               </div>
            </div>
            @endforelse
         </div>
         @endif
      </div>
   </div>
   <div class="col col-lg-6 col-md-6 col-sm-6 col-12 no-margin">
      <div class="ui-block" data-mh="pie-chart" style="margin-bottom: 8px">
         <div class="ui-block-title ui-block-title-small">
            <h6 class="h6 title" align="center">
               @if($is_results && $dispute->is_to_win())
               <span style="color: #78BF00">Case Won - </span>
               @elseif($is_results && !$dispute->is_to_win() )
               <span style="color: #FF4242">Case Lost - </span>
               @endif
               Defendant
            </h6>
         </div>
         <div style="margin-bottom: 0px;padding: 20px">
            @include('template_part.part-infouser', ['user' => $dispute->user_to])
         </div>
      </div>
      <div class="row" style="margin-bottom: 10px">
         <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
         @if($is_results)
            @forelse ($dispute->total_arbiters_vote_to() as $arbiter)
            <?php if($arbiter->is_author()){
               $bg_color = ($is_from_win) ? 'bg-blue' : 'bg-blue';
               $text = ' (You)';
            }else {
               $bg_color = ($is_from_win) ? 'bg-primary' : 'bg-green';
               $text = '';
            }            
               $percent = (!$is_from_win) ? $results_dispute->percent_win : $results_dispute->percent_lose;
               $tkn = (!$is_from_win) ? $results_dispute->tkn_win : $results_dispute->tkn_lose;
            ?>
            <div class="empty-area" style="margin-bottom: 10px">
               <div class="content" align="center" style="vertical-align: middle;padding: 3px">
                  <div class="ui-block {{$bg_color}}" data-mh="pie-chart">
                     <div class="ui-block-title" style="padding: 10px 0px">
                        <h4 style="font-size: 13px;color: #FFFDFD;font-weight: 500" align="center">Arbiter 0{{$arbiter->position}}{{$text}} {{$dispute->text($arbiter->vote)}} {{$percent}}% = {{$tkn}} ALC</h4>
                     </div>
                  </div>
               </div>
            </div>
            @empty
            <div class="empty-area" style="padding: 13px 0px 0px 0px">
               <div class="content"  align="center" style="vertical-align: middle">
                  <span class="sub-title">No Votes</span>
               </div>
            </div>
            @endforelse
         @endif
         </div>
      </div>
   </div>
</div>
@if($is_results)
<div class="row" style="margin-bottom: 0px">
   <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
      <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
         <div class="ui-block-title" >
            <h3 style="font-size: 17px;color: #FFFFFF;">Reward Results</h3>
         </div>
      </div>
   </div>
</div>
<div class="ui-block">
   <table width="100%" class="event-item-table event-item-table-fixed-width">
      <thead style="background-color: #646464">
         <tr>
            <th width="22%" class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
               USER 
            </th>
            <th  class="name align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
               % ALOTTED
            </th>
            <th   class="mybid align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
               TOKENS WON
            </th>
            <th  class="description align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
               TOKENS GAINED
            </th>
            <th  class="users align-center" style="font-size: 11px; font-weight: 600;color: #FFFFFF;background-image: linear-gradient(#57596E, #3F4257)">
               TOKENS LOST 	
            </th>
         </tr>
      </thead>
      <tbody>
         <tr class="event-item">
            <td class="freshness inline-items" align="center" style="vertical-align: top">
               <div class="author-freshness" style="margin-top: -5px"> <img src="img/6-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
                  <br>
                  <a href="javascript:;" class="h6 title" style="margin-top: -5px">
                     {{($is_from_win) ? $dispute->user_from->full_name : $dispute->user_to->full_name}}
                  </a>
                  <time class="entry-date updated"><span style="font-size: 12px;">{{($is_from_win) ? 'Plaintiff' : 'Defendant'}} | <span style="color: #78BF00">Case Won</span></span></time>
               </div>
            </td>
            <td class="bids" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">Alloted %</span></span><br><span style="font-size: 12px;font-weight: 400">5%</span></button>
            </td>
            <td class="bids" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Won</span></span><br><span style="font-size: 12px;font-weight: 400">{{$dispute->credit_win}} </span></button>
            </td>
            <td class="average" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Gained</span></span><br><span style="font-size: 12px; font-weight: 400">None</span></button>
            </td>
            <td class="estimate">
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent full-width full-height" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Lost</span></span><br><span style="font-size: 12px;font-weight: 400">({{$dispute->credit_loss}} )</span></button>
            </td>
         </tr>
         <tr class="event-item">
            <td class="freshness inline-items" align="center" style="vertical-align: top">
               <div class="author-freshness" style="margin-top: -5px"> <img src="img/1-92x92-Alchemist-card.png" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
                  <br>
                  <a href="javascript:;" class="h6 title" style="margin-top: -5px">
                     {{($is_from_win) ? $dispute->user_to->full_name : $dispute->user_from->full_name}}
                  </a>
                  <time class="entry-date updated"><span style="font-size: 12px;">{{($is_from_win) ? 'Defendant' : 'Plaintiff'}} | <span style="color: #FF5E3A">Case Lost</span></span></time>
               </div>
            </td>
            <td class="bids" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">Alloted %</span></span><br><span style="font-size: 12px;font-weight: 400">0%</span></button>
            </td>
            <td class="bids" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Won</span></span><br><span style="font-size: 12px;font-weight: 400">0</span></button>
            </td>
            <td class="average" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Gained</span></span><br><span style="font-size: 12px; font-weight: 400">None</span></button>
            </td>
            <td class="estimate">
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent full-width full-height" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Lost</span></span><br><span style="font-size: 12px;font-weight: 400">({{$dispute->court_fee}})</span></button>
            </td>
         </tr>
         @foreach($dispute->arbiters_accept() as $arbiter)
         <?php 
            $text = '';
            $name = 'Anonymous';
            if($arbiter->is_author()){
               $text = ' (You) ';
               $name = $arbiter->user_arbiter->full_name;
            }
            $is_win = $dispute->is_win($arbiter->vote);
            $winlose_text = ($is_win) ? 'Winner' : 'Loser';
            $color = ($is_win) ? '#78BF00' : '#FF5E3A';
            $percent = ($is_win) ? $results_dispute->percent_win : $results_dispute->percent_lose;
            $tkn = ($is_win) ? $results_dispute->tkn_win : $results_dispute->tkn_lose;
            $tkn_gained = ($is_win) ? $results_dispute->tkn_win_gained : $results_dispute->tkn_lose_gained;
         ?>
         <tr class="event-item">
            <td class="freshness inline-items" align="center" style="vertical-align: top">
               <div class="author-freshness" style="margin-top: -5px"> <img src="img/author-main1.jpg" alt="author" style="vertical-align: top; width: 50px;height: 50px; border: solid;border-width: 3px;border-color: #E9E9E9; border-radius: 50%;margin-bottom: 10px;margin-top: -5px ">
                  <br>
                  <a href="javascript:;" class="h6 title" style="margin-top: -5px">{{$text}}{{$name}} </a>
                  <time class="entry-date updated"><span style="font-size: 12px;">Arbiter 0{{$arbiter->position}} | <span style="color: {{$color}}">{{$winlose_text}}</span></span></time>
               </div>
            </td>
            <td class="bids" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">Alloted %</span></span><br><span style="font-size: 12px;font-weight: 400">{{$percent}}%</span></button>
            </td>
            <td class="bids" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Won</span></span><br><span style="font-size: 12px;font-weight: 400">{{$tkn}}</span></button>
            </td>
            <td class="average" >
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent  full-width" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Gained</span></span><br><span style="font-size: 12px; font-weight: 400">{{$tkn_gained}}</span></button>
            </td>
            <td class="estimate">
               <button class="btn btn-md-2 btn-border-think c-grey btn-transparent full-width full-height" style=" padding: 18px 10px 18px 10px"><span><span style="color: #525488; padding-bottom: 5px;padding-left: 2px;font-size: 13px; font-weight: 500">TKN Lost</span></span><br><span style="font-size: 12px;font-weight: 400">0</span></button>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endif