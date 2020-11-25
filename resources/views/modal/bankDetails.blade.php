<div class="modal fade" id="bank-details" tabindex="-1" role="dialog" aria-labelledby="are-you-sure-dispute" aria-hidden="true">
  <div class="modal-dialog window-popup edit-widget edit-widget-pool" role="document">
    <div class="modal-content">
      <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
        <svg class="olymp-close-icon">
          <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
        </svg>
      </a>
      <div class="modal-header">
        <h6 class="title">Bank Deposit - Instructions</h6>
      </div>
      <div class="modal-body">
        <p>{!! config('payments.bank.instructions') !!}</p>
        <div class="form-group label-floating">
          <label class="control-label">Company name</label>
          <input type="text" value="{{ config('payments.bank.company_name') }}" readonly>
        </div>
        <div class="form-group label-floating">
          <label class="control-label">IBAN</label>
          <input type="text" value="{{ config('payments.bank.company_iban') }}" readonly>
        </div>
        <div class="form-group label-floating">
          <label class="control-label">SWIFT</label>
          <input type="text" value="{{ config('payments.bank.swift') }}" readonly>
        </div>
        <div class="form-group label-floating">
          <label class="control-label">USER ID</label>
          <input type="text" value="{{ auth()->user()->id }}" readonly>
        </div>
        <div class="row">
          <div class="col col-12">
            <a href="#" data-toggle="modal" data-target="#bank-details" class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #7C7C7C; width: 100%" ><i class="fa fa-times-circle" aria-hidden="true" ></i>EXIT PANEL</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
