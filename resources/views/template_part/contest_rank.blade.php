
@for($i=1; $i<=$contest->max_rank; $i++)
  <?php $vitri = $contest->vitri($i);
  ?>

  <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent rank-check-done-{{$i}}" style="<?php if($i>$contest->max_rank) echo 'display:none'?>">
    <img src="svg-icons/Create Job/{{($vitri) ? 'checked' : 'incomplete'}}.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">
    {{addOrdinalNumberSuffix($i)}} | {{($vitri) ? 'Done' : 'Please Select'}}</a>
@endfor
@if($contest->hasrank()>0 && $contest->hasrank()>=$contest->max_rank)
  <a href="javascript:;" class="btn  btn-md-2 btn-icon-left has-rank" style="background-image: linear-gradient(#59A4FF, #2190EC);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>{{$contest->hasrank()}}/{{$contest->max_rank}}</a>
  <a href="javascript:;" class="btn  btn-md-2 btn-icon-left confirm_contest commit-rank" style="background-image: linear-gradient(#A3E12A, #7CB905);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>CONFIRM</a>
@else
  <a href="javascript:;" class="btn  btn-md-2 btn-icon-left has-rank" style="font-weight: 500;background-image: linear-gradient(#57596E, #3F4257)"><i class="fa fa-lock" aria-hidden="true"></i>{{$contest->hasrank()}}/{{$contest->max_rank ?? 0}}</a>
  <a href="javascript:;" class="btn  btn-md-2 btn-icon-left confirm_contest commit-rank" style="display:none;background-image: linear-gradient(#A3E12A, #7CB905);font-weight: 500"><i class="fa fa-check-circle" aria-hidden="true"></i>CONFIRM</a>
@endif
