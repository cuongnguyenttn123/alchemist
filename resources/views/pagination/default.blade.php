
@if ($paginator->lastPage() > 1)
  <?php
  $data = $paginator->toArray();
  $element = [];
  for ($i = 1; $i <=   $data['last_page']; $i++){
    if (count(app('request')->input())>0){
      $element[$i] =str_replace( 'page='.$data['current_page'], '', \Illuminate\Support\Facades\Request::fullUrl()).'&page='.$i;
    }else{
      $element[$i] =str_replace( 'page='.$data['current_page'], '', \Illuminate\Support\Facades\Request::fullUrl()).'?&page='.$i;
    }
  }
  ?>
  <ul class="pagination justify-content-center">
    <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
      <a class="page-link" href="{{ $paginator->url(1) }}">Previous</a>
    </li>

        @foreach ($element as $page => $url)
          {{--  Use three dots when current page is greater than 2.  --}}
          @if ($paginator->currentPage() > 3 && $page === 2)
            <li class="page-item disabled"><span class="page-link">...</span></li>
          @endif
          {{--  Show active page else show the first and last two pages from current page.  --}}
          @if ($page == $paginator->currentPage())
            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
          @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 1 || $page === $paginator->lastPage() || $page === 1)
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
          @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() - 1 )
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
          @elseif ($page - 2 === $paginator->currentPage()  && $paginator->currentPage()- 1  === 0 )
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
          @endif

          @if ($paginator->currentPage() <  count($element) - 1 && $page === count($element) - 2 && $paginator->currentPage()+2 < count($element))
            <li class="page-item disabled"><span class="page-link">...</span></li>
          @endif
        @endforeach
    <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
      <a class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}">Next</a>
    </li>
  </ul>
@endif
