@extends('myprofile.master')
@section('title')
My Wallet
@endsection
@if(Auth::id())
@section('profile_content')

    <div class="row">
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
          <div class="ui-block bg_primary">
              <div class="ui-block-content d-flex align-items-center justify-content-between">
                  <h2><b>2.25142</b></h2>
                  <i class="cc BTC-alt" title="BTC"></i>
              </div>
              <span>Bitcoin Balance</span>
         </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
          <div class="ui-block bg_info">
              <div class="ui-block-content d-flex align-items-center justify-content-between">
                  <h2><b>4.54125</b></h2>
                  <i title="ETC" class="cc ETC"></i>
              </div>
                <span>Ethereum Balance</span>
         </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
          <div class="ui-block bg_secondary">
              <div class="ui-block-content d-flex align-items-center justify-content-between">
                  <h2><b>6.15152</b></h2>
                  <i title="LTC" class="cc LTC-alt"></i>
              </div>
                <span>Litecoin Balance</span>
         </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
          <div class="ui-block bg_success">
              <div class="ui-block-content d-flex align-items-center justify-content-between">
                  <h2><b>8.54362</b></h2>
                  <i title="NEO" class="cc NEO"></i>
              </div>
                <span>NEO Balance</span>
         </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
          <div class="ui-block bg_blue">
              <div class="ui-block-content d-flex align-items-center justify-content-between">
                  <h2><b>2.1556</b></h2>
                  <i title="DASH" class="cc DASH-alt"></i>
              </div>
                <span>DASH Balance</span>
         </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
          <div class="ui-block bg_orange">
              <div class="ui-block-content d-flex align-items-center justify-content-between">
                  <h2><b>9.45568</b></h2>
                  <i class="cc XMR" title="XMR"></i>
              </div>
                <span>XMR Balance</span>
         </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
          <div class="ui-block bg_light_blue">
              <div class="ui-block-content d-flex align-items-center justify-content-between">
                  <h2><b>12.36425</b></h2>
                  <i class="cc XRP-alt" title="XRP"></i>
              </div>
                <span>XRP Balance</span>
         </div>
        </div>
      </div>

@endsection
@endif

