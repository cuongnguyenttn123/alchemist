
      <div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
         <div class="modal-dialog window-popup choose-from-my-photo" role="document">
            <div class="modal-content">
               <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                  <svg class="olymp-close-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                  </svg>
               </a>
               <div class="modal-header">
                  <h6 class="title">Choose from My Photos</h6>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
                           <svg class="olymp-photos-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use>
                           </svg>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
                           <svg class="olymp-albums-icon">
                              <use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use>
                           </svg>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="modal-body">
                  <!-- Tab panes -->
                  <div class="tab-content">
                     <div class="tab-pane active" id="homepp" role="tabpanel" aria-expanded="true">
                        @foreach($files as $file)
                           @include('template_part.content-file_checkbox')
                        @endforeach
                        <div class="clearfix"></div>
                        <a href="javascript:;" data-dismiss="modal" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
                        <a href="javascript:;" class="btn btn-primary btn-lg btn--half-width add_to_album">Confirm Photo</a>
                     </div>
                     <div class="tab-pane" id="profilepp" role="tabpanel" aria-expanded="false">
                        <a href="javascript:;" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
                        <a href="javascript:;" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>