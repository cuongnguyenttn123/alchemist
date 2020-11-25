@if($contest->is_author() & !$contest->is_completed)
  @if($entry->rank)
    <?php

    if($entry->rank == 1){
      $col = 'linear-gradient(#A3E12A, #7CB905)';
    }else if($entry->rank == 2){
      $col = 'linear-gradient(#75CEF3, #4CB3DF)';
    }else if($entry->rank == 3){
      $col = 'linear-gradient(#FF8A8A, #F36161)';
    }else{
      $col = 'linear-gradient(#FFB33A, #F89A00)';
    }
    ?>

    <a href="javascript:;" data-id="{{$entry->id}}" class="btn btn-purple btn-sm btn-icon-left unlock_decision" style="background-image: {{$col}};font-weight: 500;padding: 14px 0px;font-size: 11px;">
      <i class="fa fa-unlock-alt" aria-hidden="true"></i>Unlock {{addOrdinalNumberSuffix($entry->rank)}} Place
    </a>
  @else
    <a href="javascript:;" data-id="{{$entry->id}}" class="btn btn-purple btn-sm btn-icon-left lock_decision" style="background-image: linear-gradient(#57596E, #3F4257);font-weight: 500;padding: 14px 0px;font-size: 11px">
      <i class="fa fa-lock" aria-hidden="true"></i>Lock Decision?
    </a>
  @endif
@endif
