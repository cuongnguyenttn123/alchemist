
<div class="choose-photo-item" data-mh="choose-item">
  <div class="checkbox">
    <label>
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
          <input type="checkbox" name="checkbox" value="{{$file->id}}">
          @else
          <input type="checkbox" name="checkbox" value="{{$file->url}}" data-id="{{$file->id}}">
          @endif
    </label>
  </div>
</div>