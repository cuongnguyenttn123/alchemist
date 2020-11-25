
  <div class="modal fade" id="edit-widget-twitter" tabindex="-1" role="dialog" aria-labelledby="edit-widget-twitter"
       aria-hidden="true">
    <div class="modal-dialog window-popup edit-widget edit-widget-twitter" role="document">
      <div class="modal-content">
        <a href="javascript:;" class="close icon-close" data-dismiss="modal" aria-label="Close">
          <svg class="olymp-close-icon">
            <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
          </svg>
        </a>
        <div class="modal-header">
          <h6 class="title">Confirm Alchemist for Project?</h6>
        </div>
        <div class="modal-body">
          <form class="form_award_bid" action="" method="post">
            @csrf

            <div class="crumina-module crumina-heading with-title-decoration">
              <h6 class="heading-title">Alchemist Estimate/Bid</h6>
            </div>
            <div class="crumina-module crumina-heading with-title-decoration">
              <h5 class="heading-title">Fiat: $<span class="bid_budget">1,400</span> USD</h5>
            </div>
            <div class="crumina-module crumina-heading with-title-decoration">
              <h5 class="heading-title">
                Total Days: <span class="bid_work_time">08</span> Days</h5>
            </div>
            <p>Are you sure you would like to confirm<a href="javascript:;" class="c-twitter"></a> as your selected Alchemist for this project?
            </p>chatbox
            <a href="javascript:;" class="btn btn-border-think btn-transparent c-grey btn-lg full-width add-shortlist-1" data>SHORTLIST The Alchemist</a>
            <a href="javascript:;" class="btn bg-primary btn-lg full-width btn-icon-left confirm_hire"><i
                class="fa fa-arrow-circle-right" aria-hidden="true"></i>Confirm & Procede to Milestones</a>
            <input class="bid_id" type="hidden" name="id" value="">
          </form>
        </div>
      </div>
    </div>
  </div>
