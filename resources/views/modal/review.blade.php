
      <div id="popup-write-rewiev" class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="popup-write-rewiev" aria-hidden="true">
         <div class="modal-dialog window-popup popup-write-rewiev" role="document">
            <div class="modal-content">
               <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                  <svg class="olymp-close-icon">
                     <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                  </svg>
               </a>
               <div class="modal-header">
                  <h6 class="title">Write a Review for <span class="name_user"></span></h6>
               </div>
               <div class="modal-body">
                  <form class="form-write-rewiev" method="POST" action="#">
                     @csrf
                     <input class="user_to" type="hidden" name="user_to" value="">
                     <input class="project_id" type="hidden" name="project" value="{{$project->id ?? ''}}">
                     <div class="crumina-module crumina-heading with-title-decoration">
                        <h6 class="heading-title">Project Rating</h6>
                     </div>
                     <div class="row">
                        @foreach($criteria_rating as $key=>$value)
                        @if($key == 'recommended')
                        <div class="col col-xl-12 col-lg-12 col-md-12">
                        @else
                        <div class="col col-xl-6 col-lg-6 col-md-6">
                        @endif
                           <div class="form-group label-floating is-select">
                              <label class="control-label">{{$value}} - Select Rating</label>
                              <select name="rating[{{$key}}]" class="selectpicker form-control">
                                 <option value="5">5 Stars Rating</option>
                                 <option value="4">4 Stars Rating</option>
                                 <option value="3">3 Stars Rating</option>
                                 <option value="2">2 Stars Rating</option>
                                 <option value="1">1 Stars Rating</option>
                              </select>
                           </div>
                        </div>
                        @endforeach
                        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                           <div class="crumina-module crumina-heading with-title-decoration label_skill">
                              <h6 class="heading-title">Reccomend <span class="name_user"></span> for the below skillsets:</h6>
                           </div>
                           <div class="bid_skill ui-block-content" style="margin-top: -10px">
                              <div class="row">
                              </div>
                           </div>
                           <div class="form-group label-floating">
                              <label class="control-label">Review Title</label>
                              <input name="title" class="form-control" placeholder="" type="text" value="Sleek Web Design & Branding">
                           </div>
                           <div class="form-group label-floating">
                              <label class="control-label">Write a little description about the review</label>
                              <textarea name="content" class="form-control" placeholder="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor labore eter dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                              </textarea>
                           </div>
                           <button type="submit" class="btn btn-primary btn-lg full-width">Post your Review</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>