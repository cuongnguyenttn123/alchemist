
  <div class="modal fade modal-target" id="popup-place-bid" tabindex="-1" role="dialog" aria-labelledby="popup-place-bid"
       aria-hidden="true">
    <div class="modal-dialog window-popup popup-write-rewiev" role="document">
      <div class="modal-content">
        <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
          </svg>
        </a>
        <div class="modal-header">
          <h6 class="title">Bid Setup</h6>
        </div>
        <div class="modal-body">
          <!-- biding -->
          <form class="form-post_bid" method="post" action="{{$project->permalink()}}" data-parsley-validate>
            @csrf
            <div class="row">
              @include('template_part.content-modalbid', ['bid' => false, 'skills' => $skills])
            </div>
              <input type="hidden" name="_project" value={{ $project->id }}>
              <button class="btn-success btn btn-blue btn-md full-width submit-bid" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>