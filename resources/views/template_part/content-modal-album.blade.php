
               <div class="modal-header">
                  <h6 class="title">{{$album ? 'Edit': 'Create'}} Photo Album</h6>
               </div>
               <div class="modal-body">
                <form class="new_album" method="POST">
                  <div class="form-group label-floating">
                     <label class="control-label">Album Name</label>
                     <input class="form-control" type="text" name="album_name" placeholder="" value="{{$album->album ?? ''}}">
                  </div>
                  <div class="form-group label-floating" style="border-radius: 0px">
                    <label class="control-label">Write a little description about the page</label>
                    <textarea class="form-control" placeholder="" name="description">{{$album->description ?? ''}}</textarea>
                  </div>
                  <div class="photo-album-wrapper">
                     <div class="photo-album-item-wrap col-3-width" >
                        <div class="photo-album-item create-album" data-mh="album-item">
                           <div class="content">
                              <a href="javascript:;" class="upload_link btn btn-control bg-primary">
                                 <svg class="olymp-plus-icon">
                                    <use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
                                 </svg>
                              </a>
                              <a href="javascript:;" class="upload_link title h5">Add More Photos...</a>
                              <input id="upload" class="hidden d-none" type="file" name="file" accept="image/*" multiple/>
                           </div>
                        </div>
                     </div>
                     @if($album)
                      @foreach($album->media as $img)
                        <div class="photo-album-item-wrap col-3-width" >
                          <div class="photo-album-item" data-mh="album-item">
                             <div class="form-group">
                                <img class="img_photo" src="{{$img->url}}" alt="photo">
                                <textarea class="form-control" placeholder="Write something about this photo..." name="content[]">{{$album->data[$img->id] ?? ""}}</textarea>
                                <div class="checkbox-material" style="padding: 15px 0 0 15px">
                                  <label>
                                    <input type="checkbox" name="featured[]" value="{{$img->id}}" {{$img->is_featured ? "checked" : ""}}>
                                    Make Featured (<span class="current_fi">{{$target_user->total_featured_images}}</span>/{{$target_user->max_featuredimage}})
                                  </label>
                                </div>
                                <input class="id_media" type="hidden" name="media[]" value="{{$img->id}}">
                             </div>
                          </div>
                        </div>
                      @endforeach
                     @endif
                  </div>
                  <a href="javascript:;" class="btn btn-secondary btn-lg btn--half-width discard">Discard Everything</a>
                  <a href="javascript:;" class="btn btn-primary btn-lg btn--half-width post_album">Post Album</a>
                  @if($album)
                    <input type="hidden" name="id_album" value="{{$album->id}}">
                  @endif
                  <input type="hidden" name="action" value="{{route('ajax.newalbum')}}">
                </form>
               </div>