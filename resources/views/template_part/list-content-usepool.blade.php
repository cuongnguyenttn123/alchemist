
@foreach($user_row as $mem)
  <?php
  $key = $mem->id;
  ?>
  @include('template_part.content-userpool')
@endforeach
