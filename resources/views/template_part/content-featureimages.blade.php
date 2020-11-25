
<div class="ui-block-content">
   <!-- W-Latest-Photo -->
   @if($featureimages = $user->featureimages)
   <ul class="widget w-last-photo js-zoom-gallery">
      @foreach($featureimages as $img)
      <li>
         <a href="{{$img->url}}">
         <img src="{{$img->url}}" alt="photo">
         </a>
      </li>
      @endforeach
   </ul>
   @endif
   <!-- .. end W-Latest-Photo -->
</div>