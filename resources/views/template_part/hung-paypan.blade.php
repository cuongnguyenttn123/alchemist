{{-- <div class="hp-paypan">
	<div class="row marginbottom10">

	  <div class="col col-lg-10 col-md-10 col-sm-10 col-10 no-padding">
	     <div id="accordion " role="tablist" aria-multiselectable="true">
	        <div class="card with-icon">
	           <div class="card-header " role="tab" id="headingOne">
	              <h6 class="mb-0">
	                 <img class="paddingbottom-0 marginright5" src="svg-icons/JobCard/wallet.svg" width="18" hspace="1">
	                 <span class="color-4 paddingbottom5 fontsize-13 fontweight-400 ">My Wallet | ${{$user->wallet}}</span>
	              </h6>
	           </div>
	        </div>
	     </div>
	  </div>
	</div>
	<div class="row marginbottom10">

	  <div class="col col-lg-10 col-md-10 col-sm-10 col-10 no-padding">
	     <div id="accordion " role="tablist" aria-multiselectable="true">
	        <div class="card with-icon">
	           <div class="card-header " role="tab" id="headingOne">
	              <h6 class="mb-0">
	                 <img src="svg-icons/Payment Method/brand.svg" width="18" hspace="1"class="paddingbottom-0 marginright5">
	                 <span class="color-4 paddingbottom5 fontsize-13 fontweight-500 ">PayPal</span>
	              </h6>
	           </div>
	        </div>
	     </div>
	  </div>
	</div>
</div> --}}

<div class="ui-block" class="purchase-credit">
    <!-- Your Profile  -->
    <div id="profile-panel">
       <div class="ui-block-title ui-block-title-small">
          <h6 class="title">PURCHASE CREDIT</h6>
       </div>
       <ul class="nav nav-tabs your-profile-menu main" id="myTab1" role="tablist">
          <li class="nav-item" >
             <a class="nav-link" id="wallet" data-toggle="tab" href="#wallet" role="tab" aria-controls="friend" aria-selected="false">
                <div class="ui-block-title">
                   <div class="h6 title"><img src="svg-icons/JobCard/wallet.svg" width="18" hspace="1" style=" margin-right: 10px; padding-bottom: 3px">My Wallet</div>
                </div>
             </a>
          </li>
          <li class="nav-item">
             <a class="nav-link active show" id="paypalcr" data-toggle="tab" href="#paypalcredit" role="tab" aria-controls="friend" aria-selected="false">
                <div class="ui-block-title">
                   <div class="h6 title"><img src="svg-icons/Payment Method/brand.svg" width="18" hspace="1" style=" margin-right: 10px; padding-bottom: 3px">PayPal Credit</div>
                </div>
             </a>
          </li>
         <li class="nav-item">
           <a class="nav-link active show" id="stripecr" data-toggle="tab" href="#stripecredit" role="tab" aria-controls="friend" aria-selected="false">
             <div class="ui-block-title">
               <div class="h6 title"><img src="svg-icons/Payment Method/stripe.svg" width="36" hspace="1" style=" margin-right: 10px; padding-bottom: 3px">Stripe Credit</div>
             </div>
           </a>
         </li>
         <li class="nav-item">
           <a class="nav-link active show" id="bankcr" data-toggle="tab" href="#bankcredit" role="tab" aria-controls="friend" aria-selected="false">
             <div class="ui-block-title">
               <div class="h6 title">Bank Credit</div>
             </div>
           </a>
         </li>
       </ul>
    </div>
    <!-- ... end Your Profile  -->
 </div>
