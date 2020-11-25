
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
        <h6 class="title">Post Entry here</h6>
      </div>
      <div class="modal-body">
        <!-- biding -->
        <form class="form-post_test" method="post" action="" data-parsley-validate>
          @csrf
          <div class="row">
            <input type="hidden" id="contest_value_id" name="contest_id" value="{{$contest->id ?? ''}}" />
            <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <div class="form-group label-floating">
                <label class="control-label">Your Title</label>
                <input class="form-control" placeholder="" type="text" name="title" value="" required>
              </div>
              <div class="form-group label-floating">
                <label class="control-label">Write a description about why you're the best choice</label>
                <textarea class="form-control" placeholder="" name="description" required></textarea>
              </div>
              <div class="form-group">
                <label class="control-label">Preview files</label>
                <input class="form-control" type="file" name="files_preview[]" value="" multiple required  data-parsley-max-file="3">
                <button class="btn btn-blue reset_file" type="button" style="margin-top: 5px;">Clear File</button>
              </div>
              <div class="form-group">
                <label class="control-label">Delivery files</label>
                <input class="form-control" type="file" name="files_de[]" value="" multiple required  data-parsley-max-file="3">
                <button class="btn btn-blue reset_file" type="button" style="margin-top: 5px;">Clear File</button>
              </div>
            </div>
            <button class="btn btn-blue btn-md full-width submit-test " type="submit" >Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
