<div class="hp-mywallet paypalcreditdiv">
  <form data-parsley-validate class="deposit_form form-horizontal"  method="post" action="{{route('HandlingCredit')}}">
    @csrf

	<div class="ui-block">
		<div class="ui-block-title">
			<h6 class="title hidden craf-wallet">My Wallet- ${{$user->wallet}} USD</h6>
			<h6 class="title craf-pay ">Make Fiat Deposit - Paypal</h6>
		</div>

		<div class="ui-block-content">
			<div class="row">
				{{-- <div class="marginbottom5 col col-lg-4 col-md-4 col-sm-12 col-12">
					<hp>Currency:</hp>
					<div class="form-group  is-select">
						<select class="selectpicker form-control">
							@foreach($currencies as $currency)
	                            <option value="{{$currency}}" @if($user->get_usermeta('currency') == $currency) selected @endif>{{$currency}}</option>
	                        @endforeach
						</select>
					</div>
				</div> --}}
				<div class="marginbottom5 col col-lg-9 col-md-9 col-sm-12 col-12">
					<hp>Deposit Price (1 USD = 5 Crafting Credit)</hp>
					<div class="form-group label-floating quantity with-icon">
						<i class="fas fa-dollar-sign c-facebook" aria-hidden="true"></i>
						<label class="control-label">Enter Price - $USD</label>
						<a href="#" class="quantity-minus">&#8744;</a>
						<input required data-parsley-type="number" title="Price - $USD" class="form-control deposit_price" name="amount" value="220" min="10" max="1000000" type="text">
						<a href="#" class="quantity-plus">&#8743;</a>
					</div>
				</div>
			</div>
				<div class="skills-item-info">
					<br>
					<span class="skills-item-title">
						<span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Crafting Credit Amount</span>
					</span>
					<span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
						<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
						<span class="units amount_crafting">{{222*5}}</span>
						<img class="align-top" src="svg-icons/Token/3d.svg">
					</span>
				</div>
				<div class="skills-item-info show">
					<span class="skills-item-title">
						<span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Total</span>
					</span>
					<span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
						<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
						$<span class="units total-deposit-price">220 </span> USD
					</span>
				</div>
				<div class="skills-item-info hidden" style="margin-top: 15px">
					<span class="skills-item-title">
						<span style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">Wallet Amount Remaining</span>
					</span>
					<span class="skills-item-count" style="color: #525488; padding-bottom: 5px;padding-left: 0px;font-size: 13px;font-weight: 500">
						<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
						<span class="units" >$2,230.00</span> USD
					</span>
				</div>
				<div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
					<button type="submit" class="btn btn-blue btn-lg full-width ">CONFIRM<br> $<span class="total-deposit-price">220 </span> USD</button>
				</div>
			<div class="card-body no-padding hidden">
				<h6 class="fontweight-400">Wallet Payment</h6>
				You agree to authorize the use of your Wallet for this deposit and future payments.
			</div>
			<div class="card-body no-padding show" style="padding-bottom: 8px;font-size: 11px">
              	<h6 style="font-weight: 400">Paypal Method</h6>
              	You agree to authorize the use of your PayPal account for this deposit and future payments.
           	</div>
		</div>
	</div>
    <input type="hidden" name="type" value="paypal" id="type">
  </form>
</div>
<div class="hp-mywallet stripecreditdiv">
  <div class="ui-block">
    <div class="ui-block-title">
      <h6 class="title hidden craf-wallet">My Wallet- ${{$user->wallet}} USD</h6>
      <h6 class="title craf-pay ">Make Fiat Deposit - Stripe</h6>
    </div>

    <div class="ui-block-content">
        {{-- <div class="marginbottom5 col col-lg-4 col-md-4 col-sm-12 col-12">
          <hp>Currency:</hp>
          <div class="form-group  is-select">
            <select class="selectpicker form-control">
              @foreach($currencies as $currency)
                              <option value="{{$currency}}" @if($user->get_usermeta('currency') == $currency) selected @endif>{{$currency}}</option>
                          @endforeach
            </select>
          </div>
        </div> --}}
      <form action="{{route('poststripecreditdeposit')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col col-lg-9 col-md-9 col-sm-12 col-12 marginbottom5">
        <hp>Deposit Price (1 USD = 5 Crafting Credit)</hp>
        <div class="form-group label-floating quantity with-icon depositprice">
          <i class="fas fa-dollar-sign c-facebook" aria-hidden="true"></i>
          <label class="control-label">Enter Price - $USD</label>
          <a href="javascript:;" class="quantity-minus">&#8744;</a>
          <input data-parsley-type="number" required title="Price - $USD" class="form-control deposit_stripe_price" value="220" min="10" max="1000000"  type="text" name="credit_amount">
          <a href="javascript:;" class="quantity-plus">&#8743;</a>
        </div>
        </div>
        </div>
      <div class="skills-item-info">
        <br>
        <span class="skills-item-title">
						<span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Crafting Credit Amount</span>
					</span>
        <span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
						<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
						<span class="units amount_crafting_stripe">{{222*5}}</span>
						<img class="align-top" src="svg-icons/Token/3d.svg">
					</span>
      </div>
      <div class="skills-item-info show">
					<span class="skills-item-title">
						<span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Total</span>
					</span>
        <span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
						<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
						$<span class="units total-deposit-stripe-price">220 </span> USD
					</span>
      </div>
      <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding total_price">
        <button class="btn btn-blue btn-lg full-width ">CONFIRM $<span class="total-deposit-stripe-price">220 </span><span class="unit_price"> USD</span>
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{config('services.stripe.key')}}"
            data-amount=$("input[name=credit_amount]").val();
            data-name="Alchemunity"
            data-email="{{Auth::user()->email}}"
            data-description="Payment with Stripe"
            data-locale="auto"
            data-currency="usd">
          </script>
        </button>
      </div>

        </form>
      <div class="card-body no-padding hidden">
        <h6 class="fontweight-400">Wallet Payment</h6>
        You agree to authorize the use of your Wallet for this deposit and future payments.
      </div>
      <div class="card-body no-padding show" style="padding-bottom: 8px;font-size: 11px">
        <h6 style="font-weight: 400">Stripe Method</h6>
        You agree to authorize the use of your Stripe account for this deposit and future payments.
      </div>
    </div>
  </div>
</div>
<div class="hp-mywallet bankcreditdiv">
  <div class="ui-block">
    <div class="ui-block-title">
      <h6 class="title hidden craf-wallet">My Wallet- ${{$user->wallet}} USD</h6>
      <h6 class="title craf-pay ">Make Fiat Deposit - Bank</h6>
    </div>

    <div class="ui-block-content">
      {{-- <div class="marginbottom5 col col-lg-4 col-md-4 col-sm-12 col-12">
        <hp>Currency:</hp>
        <div class="form-group  is-select">
          <select class="selectpicker form-control">
            @foreach($currencies as $currency)
                            <option value="{{$currency}}" @if($user->get_usermeta('currency') == $currency) selected @endif>{{$currency}}</option>
                        @endforeach
          </select>
        </div>
      </div> --}}
      <form action="{{route('postbankcreditdeposit')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col col-lg-9 col-md-9 col-sm-12 col-12 marginbottom5">
            <hp>Deposit Price (1 USD = 5 Crafting Credit)</hp>
            <div class="form-group label-floating quantity with-icon depositprice">
              <i class="fas fa-dollar-sign c-facebook" aria-hidden="true"></i>
              <label class="control-label">Enter Price - $USD</label>
              <a href="javascript:;" class="quantity-minus">&#8744;</a>
              <input data-parsley-type="number" required title="Price - $USD" class="form-control deposit_bank_price" value="220" min="10" max="1000000"  type="text" name="credit_amount">
              <a href="javascript:;" class="quantity-plus">&#8743;</a>
            </div>
          </div>
        </div>
        <div class="skills-item-info">
          <br>
          <span class="skills-item-title">
						<span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Crafting Credit Amount</span>
					</span>
          <span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
						<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
						<span class="units amount_crafting_bank">{{222*5}}</span>
						<img class="align-top" src="svg-icons/Token/3d.svg">
					</span>
        </div>
        <div class="skills-item-info show">
					<span class="skills-item-title">
						<span class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Total</span>
					</span>
          <span class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
						<span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span>
						$<span class="units total-deposit-bank-price">220 </span> USD
					</span>
        </div>
        <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding total_price">
          <button class="btn btn-blue btn-lg full-width ">CONFIRM $<span class="total-deposit-bank-price">220 </span><span class="unit_price"> USD</span>
          </button>
        </div>

      </form>
      <div class="card-body no-padding hidden">
        <h6 class="fontweight-400">Wallet Payment</h6>
        You agree to authorize the use of your Wallet for this deposit and future payments.
      </div>
      <div class="card-body no-padding show" style="padding-bottom: 8px;font-size: 11px">
        <h6 style="font-weight: 400">Bank Payment Method</h6>
        You agree to authorize the use of your Bank account for this deposit and future payments.
      </div>
    </div>
  </div>
</div>

