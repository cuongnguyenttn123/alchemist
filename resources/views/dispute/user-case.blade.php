
 <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
       <div class="ui-block-title" >
          <h3 style="font-size: 17px;color: #FFFFFF;">Review & Enter Case</h3>
       </div>
    </div>
</div>
@if($dispute->is_pending)
  <div class="col col-sm-12 col-12 no-margin">
  @if($dispute->is_plaintiff)
    Pending Defendant acceptance
  @else
    <a href="javascript:;" data-id="{{$dispute->id}}" class="btn btn-purple btn-sm btn-icon-left bg-color-FF5E3A accept_dispute"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i>PROCEDE TO DISPUTE</a>
  @endif
  </div>
@else
@if(!$dispute->arbiter_accepted)
<div class="col col-sm-12 col-12 no-margin">
  Waiting Arbiters acceptance
</div>
@else
<div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
  <div class="ui-block responsive-flex1200">
      <div class="ui-block-title ui-block-title-small">
         <h6 class="h6 title" >Funds | result outcomes</h6>
      </div>
      <?php $amount = $dispute->amount?>
      <div class="ui-block-content" style="padding-bottom: 0px;padding-top: 15px"> <a href="" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px"><img src="svg-icons/Payment Method/coins.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Disputed Amount: ${{$amount}}</a>
      @if($user->is_seeker())
        @for($i=0; $i<=5; $i++)
          <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px">{{$i}}/5 Votes ({{$i/5*100}}%) = ${{(5-$i)/5*$dispute->amount}}</a>
        @endfor
      @else
        @for($i=0; $i<=5; $i++)
          <a href="javascript:;" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px">{{$i}}/5 Votes ({{$i/5*100}}%) = ${{$i/5*$dispute->amount}}</a>
        @endfor
      @endif
      </div>
      <div class="ui-block-title ui-block-title-small">
         <h6 class="h6 title" >Token - Result Information</h6>
      </div>
      <div class="ui-block-content" style="padding-bottom: 5px;padding-top: 20px"> <a href="" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px"><img src="svg-icons/Token/AlchemToken.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Total Staked: {{$dispute->total_credit}} ALC</a>
         <a href="" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px"><img src="svg-icons/Payment Method/insert-coin.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Your Stake: {{$dispute->court_fee}} / {{$dispute->total_credit}} ALC</a>
         <a href="" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px"><img src="svg-icons/Like-Dislike/up-arrow.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Win: 5% = {{$dispute->credit_win}} ALC</a>
         <a href="" class="btn btn-md-2 btn-border-think c-grey btn-transparent" style="padding: 10px 15px"><img src="svg-icons/Like-Dislike/down-arrow.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px">Lose: 100% = {{$dispute->court_fee}} ALC</a>
      </div>
   </div>
</div>
<div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-8 order-md-2 col-sm-12 col-12 no-margin" >
  <div class="row" style="margin-bottom: 10px">
    <div class="col col-lg-12 col-md-12 col-sm-9 col-9 no-margin">
      <form class="send_case" data-parsley-validate>
        <div class="ui-block" data-mh="pie-chart" style=" padding: 0px 0px 10px 0px ">
           <div class="ui-block-content" style=" padding: 20px 20px 5px 20px; text-align: left ">
              <div class="crumina-module crumina-heading with-title-decoration " >
                 <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">Enter Statement</h6>
              </div>
              <div class="row" style="margin-bottom: 10px;margin-top: -15px">
                 <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                    <hp>Case Title</hp>
                    <div class="form-group" style="font-size: 9px; ">
                       <input style="padding: 10px 8px 10px 8px;font-size: 11px" class="form-control" type="tel" placeholder="Dispute Title" name="case_title" required>
                    </div>
                 </div>
              </div>
              <div class="row" style="margin-bottom: 10px">
                 <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                    <hp>Case Description:</hp>
                    <div class="form-group label-floating is-empty" style="border-radius: 5px;border: #E6ECF5 1px solid;">
                       <label class="control-label" style="font-size: 11px;">State your case....</label>
                       <textarea style="font-size: 11px;margin-top: 2px" class="form-control" placeholder="" name="case_description" required></textarea>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#fff, #fff);">
           <div class="ui-block-content" >
              <div class="row">
                <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="zzFile">+Add files</label>
                    <input type="file" class="form-control-file" id="zzFile" name="files[]" multiple>
                    <button class="btn btn-secondary btn-sm align-right reset_file" type="button" style="background-image: linear-gradient(#E7E7E7, #D4D4D4);border: #B9B9B9 solid 1px;color: #6B6F83;font-weight: 500; margin-top: 10px;">Clear</button>
                  </div>
                </div>
              </div>
           </div>
        </div>
        <div class="row">
          <div class="col col-xl-12 col-lg-12 col-md-12 m-auto">
            <div class="photo-album-item create-album" style="position: relative;padding-top: 100px;padding-bottom: 60px;margin-bottom: 15px">
              <div class="content" style="margin-top: 10px">              
                  <a href="javascript:;" class="btn btn-control bg-blue" >
                    <i class="fa fa-paper-plane align-center" aria-hidden="true" style="margin-bottom: 3px;margin-right: 2px" ></i>
                  </a>
                <p>{{$dispute->user_from->full_name}} (Plaintiff) <br>Vs. <br>{{$dispute->user_to->full_name}} (Defendant)
                </p>
              </div>
            </div>
            <div class="logout-content">
                <button class="btn btn-purple btn-md-2 btn-icon-left" style="background-color: #90CB1E; width: 100%" ><i class="fa fa-paper-plane" aria-hidden="true" ></i>CONFIRM & SEND </button><br><br>
            </div>
          </div>
        </div>                          
      </form>
    </div>
  </div>
</div>

@endif
@endif