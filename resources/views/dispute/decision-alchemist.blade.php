
@if($dispute->is_notconfirm)
<div class="empty-area" style="margin-bottom: 10px">
   <div class="content" align="center" style="vertical-align: middle;padding: 3px">
      <div class="ui-block " data-mh="pie-chart">
         <div class="ui-block-title" style="padding: 10px 0px">
            <h4 style="font-size: 13px;font-weight: 500" align="center">Waiting confirm</h4>
         </div>
      </div>
   </div>
</div>
@endif
@if($dispute->is_continue)
<div class="empty-area" style="margin-bottom: 10px">
   <div class="content" align="center" style="vertical-align: middle;padding: 3px">
      <div class="ui-block bg-green" data-mh="pie-chart">
         <div class="ui-block-title" style="padding: 10px 0px">
            <a class="continue_project" data-id="{{$dispute->id}}" data-type="1" href="javascript:;" style="color: #FFFDFD;">Accept Continue</a>
         </div>
      </div>
   </div>
</div>
<div class="empty-area" style="margin-bottom: 10px">
   <div class="content" align="center" style="vertical-align: middle;padding: 3px">
      <div class="ui-block bg-primary" data-mh="pie-chart">
         <div class="ui-block-title" style="padding: 10px 0px">
            <a class="continue_project" data-id="{{$dispute->id}}" data-type="0" href="javascript:;" style="color: #FFFDFD;">Cancel Continue</a>
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