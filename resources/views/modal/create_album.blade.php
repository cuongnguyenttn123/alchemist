
<div class="modal fade" id="create-photo-album" tabindex="-1" role="dialog" aria-labelledby="create-photo-album">
   <div class="modal-dialog window-popup create-photo-album" role="document">
      <div class="modal-content">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
          </svg>
        </a>
        <div class="content">
          @include('template_part.content-modal-album', ['album' => false])
        </div>
      </div>
   </div>
</div>

<div class="modal fade" id="edit-photo-album" tabindex="-1" role="dialog" aria-labelledby="edit-photo-album">
   <div class="modal-dialog window-popup create-photo-album" role="document">
      <div class="modal-content">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon">
               <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
          </svg>
        </a>
        <div class="content">
        </div>
      </div>
   </div>
</div>

<div class="d-none photo_pattern photo-album-item-wrap col-3-width" >
  <div class="photo-album-item" data-mh="album-item">
     <div class="form-group">
        <img class="img_photo" src="img/photo-album6.jpg" alt="photo" style="height: 250px;">
        <textarea class="form-control" placeholder="Write something about this photo..." name="content[]"></textarea>
        <div class="checkbox-material" style="padding: 15px 0 0 15px">
          <label>
            <input type="checkbox" name="featured" value="">
            Make Featured (0/9)
          </label>
        </div>
        <input class="id_media" type="hidden" name="media[]">
     </div>
  </div>
</div>
