<div class="row" style="margin-bottom: 0px">
   <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
      <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
         <div class="ui-block-title" >
            <h3 style="font-size: 17px;color: #FFFFFF;">Decision</h3>
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
         <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
            @if($dispute->is_plaintiff)
               @if(!$dispute->user_from->is_seeker())
                  @include('dispute.decision-alchemist')
               @endif
               @if($dispute->user_from->is_seeker())
                  @include('dispute.decision-seeker')
               @endif
            @endif
         </div>
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
            @if($dispute->is_defendant)
               @if(!$dispute->user_to->is_seeker())
                  @include('dispute.decision-alchemist')
               @endif
               @if($dispute->user_to->is_seeker())
                  @include('dispute.decision-seeker')
               @endif
            @endif
         </div>
      </div>
   </div>
</div>