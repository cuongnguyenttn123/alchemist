
@if($dispute->is_notconfirm)
<div class="empty-area" style="margin-bottom: 10px">
   <div class="content" align="center" style="vertical-align: middle;padding: 3px">
      <div class="ui-block bg-green" data-mh="pie-chart">
         <div class="ui-block-title" style="padding: 10px 0px">
            <a class="dispute_payment" data-id="{{$dispute->id}}" data-type="2" href="javascript:;" style="color: #FFFDFD;">Continue & pay ${{$dispute->amount_payment}}</a>
         </div>
      </div>
   </div>
</div>
<div class="empty-area" style="margin-bottom: 10px">
   <div class="content" align="center" style="vertical-align: middle;padding: 3px">
      <div class="ui-block bg-primary" data-mh="pie-chart">
         <div class="ui-block-title" style="padding: 10px 0px">
            <a class="dispute_payment" data-id="{{$dispute->id}}" data-type="1" href="javascript:;" style="color: #FFFDFD;">Cancel & pay ${{$dispute->amount_payment}}</a>
         </div>
      </div>
   </div>
</div>
@endif
@if($dispute->is_continue)
<div class="empty-area" style="margin-bottom: 10px">
   <div class="content" align="center" style="vertical-align: middle;padding: 3px">
      <div class="ui-block" data-mh="pie-chart">
         <div class="ui-block-title" style="padding: 10px 0px">
            <a class="" href="javascript:;" style="">Waiting Alchemist confirm</a>
         </div>
      </div>
   </div>
</div>
@endif
@if($dispute->is_cancel)
<div class="empty-area" style="margin-bottom: 10px">
   <div class="content" align="center" style="vertical-align: middle;padding: 3px">
      <div class="ui-block bg-primary" data-mh="pie-chart">
         <div class="ui-block-title" style="padding: 10px 0px">
            <a class="" href="javascript:;" style="color: #FFFDFD;">Cancelled</a>
         </div>
      </div>
   </div>
</div>
@endif
