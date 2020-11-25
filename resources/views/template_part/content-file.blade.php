
<div class="choose-photo-item" data-mh="choose-item">
   <div class="radio">
        <label class="custom-radio">
            @switch($file->extension)
                @case("jpg")
                  <div class="image">
                      <img width="150" src="{{ $file->url}}" alt="img" class="img-fluid"/>
                  </div>
                  @break
                @case("png")
                  <div class="image">
                      <img width="150" src="{{ $file->url}}" alt="img" class="img-fluid"/>
                  </div>
                  @break
                @case("jpeg")
                  <div class="image">
                      <img width="150" src="{{ $file->url}}" alt="img" class="img-fluid"/>
                  </div>
                  @break
               @default
                <div class="icon">
                    <i class="fas fa-file text-dark"></i>
                </div>
            @endswitch
          @if(isset($val) && $val == 'id')
          <input type="radio" name="profile_images" value="{{$file->id}}">
          @else
          <input type="radio" name="profile_images" value="{{$file->url}}">
          @endif
          <span class="circle"></span>
          <span class="check"></span>
        </label>
        <div class="file-name">
            <p class="m-b-5 text-muted">{{ $file->name }}</p>
            <small>{{ $file->size }} mb <span class="date text-muted">{{ $file->time }}</span></small>
        </div>
   </div>
</div>