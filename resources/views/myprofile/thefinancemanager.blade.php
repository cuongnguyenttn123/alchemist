@extends('myprofile.master_pro')
@section('title')
  Finance Dashboard
@endsection
@if(Auth::id())
@section('profile_content')

  <div class="container hp-finance">
    <div class="row">
      <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="ui-block responsive-flex hp-reponsive">
          <div class="ui-block-title">
            <ul class="nav nav-tabs calendar-events-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#finances" role="tab">
                  <img src="svg-icons/menu/account.svg" width="640" class="olymp-status-icon"
                       style="margin-right: 5px;width: 25px"></svg>
                  Finances
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " data-toggle="tab" href="#depositfunds" role="tab">
                  <img src="svg-icons/menu/purse.svg" width="150" class="olymp-status-icon"
                       style="margin-right: 5px;width: 25px"></svg>
                  Deposit Funds ${{$user->wallet}}
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#withdrawals" role="tab" id="withdrawal">
                  <img src="svg-icons/menu/atm.svg" width="150" class="olymp-status-icon"
                       style="margin-right: 5px;width: 25px"></svg>
                  Withdraw Money
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tab panes -->
  <div class="tab-content finance-tab-content" style="width: 100%;">
    <div class="tab-pane active" id="finances" role="tabpanel">
      <div class="container">
        <div class="row">
          <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
              <!-- News Feed Form  -->
              <div class="news-feed-form">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active inline-items" style="width: auto" data-toggle="tab"
                       href="#request_milestone" role="tab" aria-expanded="true">

                      <svg class="olymp-add-to-conversation-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-add-to-conversation-icon"></use>
                      </svg>

                      <span>Milestone Requests</span> <span>({{$user->milestone_requests->count()}})</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link inline-items" data-toggle="tab" href="#receipts" role="tab"
                       aria-expanded="false">

                      <svg class="olymp-multimedia-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                      </svg>

                      <span>Receipts</span> <span>({{$user->payment_receipts()->count()}})</span>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link inline-items" data-toggle="tab" href="#mywithdrawals" role="tab"
                       aria-expanded="false">
                      <svg class="olymp-logout-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
                      </svg>
                      <span>My Withdrawals</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link inline-items" data-toggle="tab" href="#mydeposits" role="tab"
                       aria-expanded="false">
                      <svg class="olymp-logout-icon">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-logout-icon"></use>
                      </svg>
                      <span>My Deposits</span></a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link inline-items" data-toggle="tab" href="#AffiliateErnings" role="tab" aria-expanded="false">
                      <svg class="olymp-logout-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-logout-icon"></use></svg>
                      <span>Affiliate Earnings (Building)</span>
                    </a>
                  </li> --}}
                </ul>
                <!-- Tab panes -->
                <div class="tab-content no-padding hp-filter">
                  <div class="tab-pane active" id="request_milestone" role="tabpanel" aria-expanded="true">
                    <div class="ui-block responsive-flex1200">
                      @include('template_part.form-filter-finance')
                    </div>
                    <div class="photo-album-item create-album"
                         style="position: relative;padding-top: 100px;padding-bottom: 100px;margin-bottom: 10px">
                      <a href="javascript:;" data-toggle="modal" data-target="#"></a>
                      <div class="content" style="margin-top: 10px">
                        <a href="javascript:;" class="btn btn-control bg-secondary">
                          <svg class="olymp-close-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-close-icon"></use>
                          </svg>
                        </a>
                        <a href="javascript:;" class="title h5" data-toggle="modal" data-target="#">No Requests</a>
                        <span class="sub-title">No requests made yet</span>
                      </div>
                    </div>
                    <div class="ui-block">
                      <table width="100%" class="hp-conten-table event-item-table event-item-table-fixed-width">
                        <thead>
                        <tr>
                          <th width="25%" class="name align-center">PROJECT <img
                              src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1"></th>
                          <th width="13%">ALCHEMIST</th>
                          <th width="14%">DETAILS</th>
                          <th width="14%">STATUS <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9"
                                                      hspace="1"></th>
                          <th width="22%">ACTION</th>
                          <th width="12%">OPTIONS</th>
                        </tr>
                        </thead>
                        <tbody class="request-project">
                        @foreach($user->milestone_requests as $rq)
                          @include('template_part.content-rq')
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>


                  <div class="tab-pane hp-receipts" id="receipts" role="tabpanel" aria-expanded="true">
                    <div class="ui-block responsive-flex1200 margintop15">
                      @include('template_part.form-filter-finance')
                    </div>
                    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                      <div class="ui-block">
                        <table width="93%" class="event-item-table event-item-table-fixed-width">
                          <thead>
                          <tr>
                            <th width="26%" class="name align-center">
                              PROJECT NAME
                              <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1">
                            </th>
                            <th width="17%" class="name align-center">
                              SEEKER
                            </th>
                            <th width="13%" class="mybid align-center">
                              INVOICE REF
                            </th>
                            <th width="18%" class="description align-center">
                              INVOICE AMOUNT
                            </th>
                            <th width="10%" class="users align-center">
                              OPTIONS
                            </th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($user->payment_receipts() as $receipt)
                            @include('template_part.content-receipt')
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane hp-withdrawal" id="mywithdrawals" role="tabpanel" aria-expanded="true">
                    <div class="ui-block responsive-flex1200 margintop15">
                      @include('template_part.form-filter-finance')
                    </div>
                    <div class="ui-block">
                      <table width="93%" class="event-item-table event-item-table-fixed-width">
                        <thead>
                        <tr>
                          <th width="26%" class="name align-center">
                            REQUEST TIME <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9"
                                              hspace="1">
                          </th>
                          <th width="26%" class="name align-center">
                            AMOUNT <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1">
                          </th>
                          <th width="17%" class="name align-center">
                            DETAILS
                          </th>
                          <th width="13%" class="mybid align-center">
                            DETAILS
                          </th>
                          <th width="18%" class="description align-center">
                            STATUS
                          </th>
                          <th width="10%" class="users align-center">
                            PROCESSING DATE
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="event-item">
                          <td class="align-middle freshness inline-items" align="center">
                            <div class="margintop-5 author-freshness">
                              <a href="javascript:;" class="margintop-5 h6 title">Withdrawal Requested </a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12">30/04/2019</span>
                              </time>
                            </div>
                          </td>
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Withdrawal Amount</a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12">$2,300</span>
                              </time>
                            </div>
                          </td>
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Details </a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12">Merchant: PaypPal</span>
                              </time>
                            </div>
                          </td>
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Status</a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12" color="#FF7E00">Pending</span>
                              </time>
                            </div>
                          </td>
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Processing Date</a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12">N/A</span>
                              </time>
                            </div>
                          </td>
                          <td class="add-event align-center align-middle">
                            <a class="btn btn-purple btn-sm btn-icon-left">
                              <i class="fa fa-download" aria-hidden="true"></i>
                              Download
                            </a>
                          </td>
                        </tr>
                        <tr class="event-item">
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Request Time </a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12">30/04/2019</span>
                              </time>
                            </div>
                          </td>
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Withdrawal Amount</a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12">$2,300</span>
                              </time>
                            </div>
                          </td>
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Details </a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12">Merchant: PaypPal</span>
                              </time>
                            </div>
                          </td>
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Status</a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12" color="#51AA00">Complete</span>
                              </time>
                            </div>
                          </td>
                          <td class="freshness inline-items align-middle" align="center">
                            <div class="author-freshness margintop-5">
                              <a href="javascript:;" class="h6 title margintop-5">Processing Date</a>
                              <time class="entry-date updated" datetime="2017-06-24T18:18">
                                <span class="fontsize-12">30/03/2019</span>
                              </time>
                            </div>
                          </td>
                          <td class="add-event align-center align-middle">
                            <a class="btn btn-purple btn-sm btn-icon-left">
                              <i class="fa fa-download" aria-hidden="true"></i>
                              Download
                            </a>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>


                  </div>

                  <div class="tab-pane hp-withdrawal" id="mydeposits" role="tabpanel" aria-expanded="true">
                    <div class="ui-block responsive-flex1200 margintop15">
                      @include('template_part.form-filter-finance')
                    </div>
                    <div class="ui-block">
                      <table width="93%" class="event-item-table event-item-table-fixed-width">
                        <thead>
                        <tr>
                          <th width="26%" class="name align-center">
                            Deposit Time <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9"
                                              hspace="1">
                          </th>
                          <th width="26%" class="name align-center">
                            AMOUNT <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1">
                          </th>
                          <th width="17%" class="name align-center">
                            DETAILS
                          </th>
                          <th width="13%" class="mybid align-center">
                            DETAILS
                          </th>
                          <th width="18%" class="description align-center">
                            STATUS
                          </th>
                          <th width="10%" class="users align-center">
                            PROCESSING DATE
                          </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deposits as $deposit)
                          <tr class="event-item">
                            <td class="align-middle freshness inline-items" align="center">
                              <div class="margintop-5 author-freshness">
                                <a href="javascript:;" class="margintop-5 h6 title">Deposit Request Time </a>
                                <time class="entry-date updated" datetime="2017-06-24T18:18">
                                  <span class="fontsize-12">30/04/2019</span>
                                </time>
                              </div>
                            </td>
                            <td class="freshness inline-items align-middle" align="center">
                              <div class="author-freshness margintop-5">
                                <a href="javascript:;" class="h6 title margintop-5">Deposit Amount</a>
                                <time class="entry-date updated" datetime="2017-06-24T18:18">
                                  <span class="fontsize-12">${{ $deposit->value }}</span>
                                </time>
                              </div>
                            </td>
                            <td class="freshness inline-items align-middle" align="center">
                              <div class="author-freshness margintop-5">
                                <a href="javascript:;" class="h6 title margintop-5">Details </a>
                                <time class="entry-date updated" datetime="2017-06-24T18:18">
                                  <span class="fontsize-12">Merchant: {{ $deposit->payment_method }}</span>
                                </time>
                              </div>
                            </td>
                            <td class="freshness inline-items align-middle" align="center">
                              <div class="author-freshness margintop-5">
                                <a href="javascript:;" class="h6 title margintop-5">Status</a>
                                <time class="entry-date updated" datetime="2017-06-24T18:18">
                                  <span class="fontsize-12" color="#FF7E00">{{ $deposit->status }}</span>
                                </time>
                              </div>
                            </td>
                            <td class="freshness inline-items align-middle" align="center">
                              <div class="author-freshness margintop-5">
                                <a href="javascript:;" class="h6 title margintop-5">Processing Date</a>
                                <time class="entry-date updated" datetime="2017-06-24T18:18">
                                  <span class="fontsize-12">N/A</span>
                                </time>
                              </div>
                            </td>
                            <td class="add-event align-center align-middle">
                              <a class="btn btn-purple btn-sm btn-icon-left">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                Download
                              </a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>


                  </div>

                  <div class="tab-pane" id="upload" role="tabpanel" aria-expanded="true">
                    <form>
                      <div class="author-thumb">
                        <img src="img/author-page.jpg" alt="author">
                      </div>
                      <div class="form-group with-icon label-floating is-empty">
                        <label class="control-label">Share what you are thinking here...</label>
                        <textarea class="form-control" placeholder=""></textarea>
                      </div>
                      <div class="add-options-message">
                        <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"
                           data-original-title="ADD PHOTOS">
                          <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                          </svg>
                        </a>
                        <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"
                           data-original-title="TAG YOUR FRIENDS">
                          <svg class="olymp-computer-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                          </svg>
                        </a>
                        <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"
                           data-original-title="ADD LOCATION">
                          <svg class="olymp-small-pin-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                          </svg>
                        </a>
                        <button class="btn btn-primary btn-md-2">Post Status</button>
                        <button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="finance" role="tabpanel" aria-expanded="true">
                    <form>
                      <div class="author-thumb">
                        <img src="img/author-page.jpg" alt="author">
                      </div>
                      <div class="form-group with-icon label-floating is-empty">
                        <label class="control-label">Share what you are thinking here...</label>
                        <textarea class="form-control" placeholder=""></textarea>
                      </div>
                      <div class="add-options-message">
                        <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"
                           data-original-title="ADD PHOTOS">
                          <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-camera-icon"></use>
                          </svg>
                        </a>
                        <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"
                           data-original-title="TAG YOUR FRIENDS">
                          <svg class="olymp-computer-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-computer-icon"></use>
                          </svg>
                        </a>
                        <a href="javascript:;" class="options-message" data-toggle="tooltip" data-placement="top"
                           data-original-title="ADD LOCATION">
                          <svg class="olymp-small-pin-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-small-pin-icon"></use>
                          </svg>
                        </a>
                        <button class="btn btn-primary btn-md-2">Post Status</button>
                        <button class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="dispute" role="tabpanel" aria-expanded="true">
                    <form>
                      <div class="author-thumb">
                        <img src="img/author-page.jpg" alt="author">
                      </div>
                      <div class="form-group with-icon label-floating is-empty">
                        <label class="control-label">Share what you are thinking here...</label>
                        <textarea class="form-control" placeholder=""></textarea>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- ... end News Feed Form  -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane" id="depositfunds" role="tabpanel">
      <div class="container">
        <div class="row">
          <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
              <!-- News Feed Form  -->
              <div class="news-feed-form">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#deposit"
                       role="tab" aria-expanded="true">
                      <img src="svg-icons/Payment Method/insert-coin.svg" class="olymp-status-icon marginright10">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                      </svg>
                      <span>Deposit Funds</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link inline-items" data-toggle="tab" href="#securepayment" role="tab"
                       aria-expanded="false">
                      <img src="svg-icons/Token/3d.svg" width="20" class="olymp-multimedia-icon marginright10">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                      </svg>
                      <span>Crafting Credit</span>
                    </a>
                  </li>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content no-padding">
                  <div class="tab-pane active" id="deposit" role="tabpanel" aria-expanded="true">
                    <p></p>
                    <div class="ui-block deposit-title" data-mh="pie-chart">
                      <div class="ui-block-title">
                        <h3 class="fontsize-20">
                          <img src="svg-icons/Payment Method/insert-coin.svg" class="olymp-heart-icon">Deposit Funds
                        </h3>
                      </div>
                    </div>
                    <div class="row margintop15 deposit-pay">
                      <div
                        class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12 paypaldep">
                        <div class="row no-padding">
                          <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                            <div class="ui-block">
                              <div class="ui-block-title">
                                <h6 class="title">Make Fiat Deposit - Paypal</h6>
                              </div>
                              <form data-parsley-validate class="deposit_form form-horizontal" id="depositform"
                                    method="post" action="{{route('postdeposit')}}">
                                @csrf
                                <div class="ui-block-content">
                                  <div class="row">
                                    {{-- <div class="col col-lg-4 col-md-4 col-sm-12 col-12 marginbottom5">
                                       <hp>Currency:</hp>
                                       <div class="form-group  is-select">
                                          <select class="selectpicker form-control unit_price_select" name="currency">
                                            @foreach($currencies as $currency)
                                          <option value="{{$currency}}" @if($user->get_usermeta('currency') == $currency) selected @endif>{{$currency}}</option>
                                      @endforeach
                                          </select>
                                       </div>
                                    </div> --}}
                                    <div class="col col-lg-9 col-md-9 col-sm-12 col-12 marginbottom5">
                                      <hp>Deposit Price</hp>
                                      <div class="form-group label-floating quantity with-icon depositprice">
                                        <i class="fas fa-dollar-sign c-facebook" aria-hidden="true"></i>
                                        <label class="control-label">Enter Price - $USD</label>
                                        <a href="javascript:;" class="quantity-minus">&#8744;</a>
                                        <input data-parsley-type="number" required title="Price - $USD"
                                               class="form-control deposit_price" value="220" min="10" max="1000000"
                                               type="text" name="amount">
                                        <a href="javascript:;" class="quantity-plus">&#8743;</a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="skills-item-info border-bottom margintop15 paddingbottom15">
			                                     	<span class="skills-item-title">
			                                     		<span
                                                class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Processing Fee</span>
			                                     	</span>
                                    <span
                                      class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
			                                     		<span class="count-animate" data-speed="1000" data-refresh-interval="50"
                                                    data-to="2300" data-from="0"></span>
			                                     		<span class="units">$0.00</span> USD
			                                     	</span>
                                  </div>
                                  <div class="skills-item-info margintop15 total_price">
			                                     	<span class="skills-item-title">
			                                     		<span
                                                class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Total</span>
			                                     	</span>
                                    <span
                                      class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
			                                     		<span class="count-animate" data-speed="1000" data-refresh-interval="50"
                                                    data-to="2300" data-from="0"></span>
			                                     		$<span class="units total-deposit-price">220</span> <span
                                        class="unit_price">USD</span>
			                                     	</span>
                                  </div>
                                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding total_price">
                                    <button class="btn btn-blue btn-lg full-width ">CONFIRM $<span
                                        class="total-deposit-price">220 </span><span class="unit_price"> USD</span>
                                    </button>
                                  </div>
                                  <div class="card-body no-padding">
                                    <h6 class="fontweight-400">Paypal Method</h6>
                                    You agree to authorize the use of your PayPal account for this deposit and future
                                    payments.
                                  </div>
                                </div>
                              </form>
                            </div>

                          </div>
                          <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                            @include('template_part.hung-allBalances')
                          </div>
                        </div>
                      </div>
                      {{--                Start Stripe             --}}
                      <div
                        class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12 stripedep"> {{-- style="visibility: hidden;"--}}
                        <div class="row no-padding">
                          <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                            <div class="ui-block">
                              <div class="ui-block-title">
                                <h6 class="title">Make Fiat Deposit - Stripe</h6>
                              </div>
                              <div class="ui-block-content">
                                <form action="{{route('poststripedeposit')}}" method="POST">
                                  @csrf
                                  <div class="row">
                                    <div class="col col-lg-9 col-md-9 col-sm-12 col-12 marginbottom5">
                                      <hp>Deposit Price</hp>
                                      <div class="form-group label-floating quantity with-icon depositprice">
                                        <i class="fas fa-dollar-sign c-facebook" aria-hidden="true"></i>
                                        <label class="control-label">Enter Price - $USD</label>
                                        <a href="javascript:;" class="quantity-minus">&#8744;</a>
                                        <input data-parsley-type="number" required title="Price - $USD"
                                               class="form-control deposit_stripe_price" value="220" min="10"
                                               max="1000000" type="text" name="amount">
                                        <a href="javascript:;" class="quantity-plus">&#8743;</a>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="skills-item-info border-bottom margintop15 paddingbottom15">
			                                     	<span class="skills-item-title">
			                                     		<span
                                                class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Processing Fee</span>
			                                     	</span>
                                    <span
                                      class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
			                                     		<span class="count-animate" data-speed="1000" data-refresh-interval="50"
                                                    data-to="2300" data-from="0"></span>
			                                     		<span class="units">$0.00</span> USD
			                                     	</span>
                                  </div>
                                  <div class="skills-item-info margintop15 total_price">
			                                     	<span class="skills-item-title">
			                                     		<span
                                                class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Total</span>
			                                     	</span>
                                    <span
                                      class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
			                                     		<span class="count-animate" data-speed="1000" data-refresh-interval="50"
                                                    data-to="2300" data-from="0"></span>
			                                     		$<span class="units total-deposit-stripe-price">220</span> <span
                                        class="unit_price">USD</span>
			                                     	</span>
                                  </div>
                                  <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding total_price">
                                    <button class="btn btn-blue btn-lg full-width ">CONFIRM $<span
                                        class="total-deposit-stripe-price">220 </span><span
                                        class="unit_price"> USD</span>
                                      <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{config('services.stripe.key')}}"
                                        data-amount=$('input[name=amount]').val()
                                        data-name="Alchemunity"
                                        data-email="{{Auth::user()->email}}"
                                        data-description="Payment with Stripe"
                                        data-image=""
                                        data-locale="auto"
                                        data-currency="usd">
                                      </script>
                                    </button>
                                  </div>
                                  <div class="card-body no-padding">
                                    <h6 class="fontweight-400">Stripe Method</h6>
                                    You agree to authorize the use of your Stripe account for this deposit and future
                                    payments.
                                  </div>
                                </form>
                              </div>

                            </div>
                          </div>
                          <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                            @include('template_part.hung-allBalances')
                          </div>
                        </div>
                      </div>

                      {{--        End Stripe                     --}}
                      {{--                Start Bank Payment           --}}
                      <div
                        class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12 bankdep"> {{-- style="visibility: hidden;"--}}
                        <div class="row no-padding">
                          <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                            <div class="ui-block">
                              <div class="ui-block-title">
                                <h6 class="title">Make Fiat Deposit - Bank Payment</h6>
                              </div>
                              <div class="ui-block-content">
                                <div class="row">
                                  <div class="col col-lg-9 col-md-9 col-sm-12 col-12 marginbottom5">
                                    <hp>Deposit Price</hp>
                                    <div class="form-group label-floating quantity with-icon depositprice">
                                      <i class="fas fa-dollar-sign c-facebook" aria-hidden="true"></i>
                                      <label class="control-label">Enter Price - $USD</label>
                                      <a href="javascript:;" class="quantity-minus">&#8744;</a>
                                      <input data-parsley-type="number" required title="Price - $USD"
                                             class="form-control deposit_bank_price" value="220" min="10"
                                             max="1000000" type="text" name="amount">
                                      <a href="javascript:;" class="quantity-plus">&#8743;</a>
                                    </div>
                                  </div>
                                </div>
                                <div class="skills-item-info border-bottom margintop15 paddingbottom15">
			                                     	<span class="skills-item-title">
			                                     		<span
                                                class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Processing Fee</span>
			                                     	</span>
                                  <span
                                    class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
			                                     		<span class="count-animate" data-speed="1000" data-refresh-interval="50"
                                                    data-to="2300" data-from="0"></span>
			                                     		<span class="units">$0.00</span> USD
			                                     	</span>
                                </div>
                                <div class="skills-item-info margintop15 total_price">
			                                     	<span class="skills-item-title">
			                                     		<span
                                                class="color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">Total</span>
			                                     	</span>
                                  <span
                                    class="skills-item-count color-2 paddingbottom5 paddingleft-0 fontsize-13 fontweight-500">
			                                     		<span class="count-animate" data-speed="1000" data-refresh-interval="50"
                                                    data-to="2300" data-from="0"></span>
			                                     		$<span class="units total-deposit-bank-price">220</span> <span
                                      class="unit_price">USD</span>
			                                     	</span>
                                </div>
                                <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding total_price">
                                  <button class="btn btn-blue btn-lg full-width" id="confirm_bank_deposit">CONFIRM
                                    $<span
                                      class="total-deposit-bank-price">220 </span><span class="unit_price"> USD</span>
                                  </button>
                                </div>
                                <div class="card-body no-padding">
                                  <h6 class="fontweight-400">Bank Payment Method</h6>
                                  You agree to authorize the use of your Bank account for this deposit and future
                                  payments.
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                            @include('template_part.hung-allBalances')
                          </div>
                        </div>
                      </div>

                      {{--        End Bank Payment                    --}}
                      <div id="desktop-container-panel"
                           class="hp-depositfunds responsive-display col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 ">
                        <div class="ui-block">
                          <!-- Your Profile  -->
                          <div id="profile-panel" class="your-profile">
                            <div class="ui-block-title ui-block-title-small">
                              <h6 class="title">DEPOSIT FUNDS</h6>
                            </div>
                            <ul class="nav nav-tabs your-profile-menu main" id="myTab2" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link" id="friend-tab-paypal" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="friend" aria-selected="false">
                                  <div class="ui-block-title">
                                    <div class="h6 title"><img src="svg-icons/Payment Method/brand.svg" width="18"
                                                               hspace="1"
                                                               style=" margin-right: 10px; padding-bottom: 3px">PayPal
                                    </div>
                                  </div>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="friend-tab-stripe" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="friend" aria-selected="false">
                                  <div class="ui-block-title">
                                    <div class="h6 title"><img src="svg-icons/Payment Method/stripe.svg" width="36"
                                                               hspace="1"
                                                               style=" margin-right: 10px; padding-bottom: 3px">Stripe
                                    </div>
                                  </div>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="friend-tab-bank" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="friend" aria-selected="false">
                                  <div class="ui-block-title">
                                    <div class="h6 title">Bank Payment</div>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <!-- ... end Your Profile  -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--*************************Crafting Credit*************************888 -->
                  <div class="tab-pane hp-titletab" id="secure-credit-payment" role="tabpanel" aria-expanded="true">
                    <p></p>
                    <div class="ui-block " data-mh="pie-chart">
                      <div class="ui-block-title">
                        <h3 class="fontsize-20">
                          <img src="svg-icons/Token/3d.svg" class="olymp-heart-icon"> Crafting Credit</h3>
                      </div>
                    </div>

                    <div class="row margintop15">
                      <div
                        class="hp-craftingcredit col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display">
                        @include('template_part.hung-paypan')
                      </div>
                      <div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
                        <div class="row no-padding">
                          <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                            @include('template_part.hung-mywallet')
                          </div>
                          <div class="col col-xl-6 order-xl-2 col-lg-6 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                            @include('template_part.hung-allBalances')
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>
                  <!--*************************End Crafting Credit*************************888 -->
                </div>
              </div>
              <!-- ... end News Feed Form  -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane paypalwithdrawal" id="withdrawals" role="tabpanel">
      <div class="container">
        <div class="row">
          <div class="hp-withdrawals col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block title-tab">
              <!-- News Feed Form  -->
              <div class="news-feed-form">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#paypal"
                       role="tab" aria-expanded="true" id="paypalid">
                      <img src="svg-icons/Payment Method/brand.svg" class="olymp-status-icon marginright10">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use>
                      </svg>
                      <span>PayPal</span>
                    </a>
                    <a class="nav-link active inline-items" style="width: auto" data-toggle="tab" href="#bank"
                       role="tab" aria-expanded="true" id="bankid">
                      <span>Bank Payment</span>
                    </a>
                  </li>

                  {{-- <li class="nav-item">
                     <a class="nav-link inline-items" data-toggle="tab" href="#securepayment" role="tab" aria-expanded="false">
                        <img src="svg-icons/Payment Method/transfer.svg" width="512" class="olymp-multimedia-icon marginright10">
                        <use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use>
                        </svg>
                        <span>Wire Transfer (Building)</span>
                     </a>
                  </li> --}}
                </ul>
              {{--                </div> --}}{{--  qdewf--}}
              {{--               </div>--}}
              {{--            </div>--}}
              {{--         </div>--}}
              {{--      </div>--}}
              {{--   </div>--}}
              <!-- Tab panes -->
                <div class="tab-content no-padding">
                  <div class="tab-pane active" id="paypal" role="tabpanel" aria-expanded="true">
                    <p></p>
                    {{--	                         <div class="ui-block conten-tab" data-mh="pie-chart">--}}
                    {{--	                            <div class="ui-block-title" >--}}
                    {{--	                               <h3 class="fontsize-20">--}}
                    {{--	                               	`<img src="svg-icons/Payment Method/brand.svg" class="olymp-heart-icon">PayPal Withdrawal</h3>--}}
                    {{--	                            </div>--}}
                    {{--	                         </div>--}}
                    <div class="row margintop15">
                      <!-- s2nhomau 25/06/2019 -->

                      <div
                        class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12 paypal-withdrawal-part">
                        <div class="ui-block conten-tab" data-mh="pie-chart">
                          <div class="ui-block-title">
                            <h3 class="fontsize-20">
                              `<img src="svg-icons/Payment Method/brand.svg" class="olymp-heart-icon">PayPal Withdrawal
                            </h3>
                          </div>
                        </div>
                        <form data-parsley-validate class="deposit_form form-horizontal" id="depositform" method="post"
                              action="{{route('post_withdrawal')}}" data-parsley-validate>
                          @csrf
                          <input type="hidden" name="payment_method" value="Paypal">
                          <div class="ui-block">
                            <div class="ui-block-title">
                              <h6 class="title">Make Withdrawal - Paypal</h6>
                            </div>
                            <div class="ui-block-content">
                              <hp>PayPal Account:</hp>
                              <div class="form-group">
                                <input class="form-control payemail" type="email" name="withdraw_email"
                                       placeholder="Enter Email" required>
                              </div>
                              <p></p>
                              <div class="row">
                                {{-- <div class="marginbottom5 col col-lg-4 col-md-4 col-sm-12 col-12">
                                   <hp>Currency:</hp>
                                   <div class="form-group  is-select">
                                      <select class="selectpicker form-control" name="currency">
                                        @foreach($currencies as $currency)
                                      <option value="{{$currency}}" @if($user->get_usermeta('currency') == $currency) selected @endif>{{$currency}}</option>
                                  @endforeach
                                      </select>
                                   </div>
                                </div> --}}
                                <div class="marginbottom5 col col-lg-12 col-md-12 col-sm-12 col-12">
                                  <hp>Deposit Price</hp>
                                  <div class="form-group label-floating quantity with-icon icon$">
                                    <i class="fas fa-dollar-sign c-facebook" aria-hidden="true"></i>
                                    <label class="control-label">Enter Price</label>
                                    <a href="javascript:;" class="quantity-minus">&#8744;</a>
                                    <input data-parsley-type="number" title="Price - $USD"
                                           class="form-control deposit_price" value="30" min="30" max="10000"
                                           type="text" name="amount" required>
                                    <a href="javascript:;" class="quantity-plus">&#8743;</a>
                                  </div>
                                </div>
                              </div>
                              <div class="card-body no-padding">
                                Note: Min amount $30 USD. Max amount $10000 USD
                              </div>
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                                <button class="btn btn-blue btn-lg full-width ">WITHDRAW<br> $<span
                                    class="total-deposit-price">30</span> USD
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                        @include('template_part.hung-allBalances')
                      </div>
                      {{--                             Bank Payment Withdraw Start--}}
                      <div
                        class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12 bank-withdrawal">
                        <div class="ui-block conten-tab" data-mh="pie-chart">
                          <div class="ui-block-title">
                            <h3 class="fontsize-20">Bank Withdrawal</h3>
                          </div>
                        </div>
                        <form data-parsley-validate class="deposit_form form-horizontal" id="depositform" method="post"
                              action="{{route('post_withdrawal_bank')}}" data-parsley-validate>
                          @csrf
                          <input type="hidden" name="payment_method" value="Bank Payment">
                          <div class="ui-block">
                            <div class="ui-block-title">
                              <h6 class="title">Make Withdrawal - Bank</h6>
                            </div>
                            <div class="ui-block-content">
                              <div class="row">
                                {{-- <div class="marginbottom5 col col-lg-4 col-md-4 col-sm-12 col-12">
                                   <hp>Currency:</hp>
                                   <div class="form-group  is-select">
                                      <select class="selectpicker form-control" name="currency">
                                        @foreach($currencies as $currency)
                                      <option value="{{$currency}}" @if($user->get_usermeta('currency') == $currency) selected @endif>{{$currency}}</option>
                                  @endforeach
                                      </select>
                                   </div>
                                </div> --}}
                                <div class="marginbottom5 col col-lg-12 col-md-12 col-sm-12 col-12">
                                  <hp>Deposit Price</hp>
                                  <div class="form-group label-floating quantity with-icon icon$">
                                    <i class="fas fa-dollar-sign c-facebook" aria-hidden="true"></i>
                                    <label class="control-label">Enter Price</label>
                                    <a href="javascript:;" class="quantity-minus">&#8744;</a>
                                    <input data-parsley-type="number" title="Price - $USD"
                                           class="form-control deposit_price" value="30" min="30" max="10000"
                                           type="text" name="amount" required>
                                    <a href="javascript:;" class="quantity-plus">&#8743;</a>
                                  </div>
                                </div>
                              </div>
                              <div class="card-body no-padding">
                                Note: Min amount $30 USD. Max amount $10000 USD
                              </div>
                              <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-padding">
                                <button class="btn btn-blue btn-lg full-width ">WITHDRAW<br> $<span
                                    class="total-deposit-price">30</span> USD
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                        @include('template_part.hung-allBalances')
                      </div>
                    {{--                             Bank Payment Withdraw End--}}

                    <!--end s2nhomau 25/06/2019 -->
                      <div
                        class="content-tabright-withdrow col col-xl-8 order-xl-2 col-lg-4 order-lg-2 col-md-6 order-md-1 col-sm-12 col-12">
                        <div class="ui-block" data-mh="pie-chart">
                          <div class="ui-block-title">
                            <h3 class="fontsize-20">Withdrawal Amount</h3>
                          </div>
                        </div>
                        <div class="ui-block">
                          <table class="event-item-table event-item-table-fixed-width">
                            <thead>
                            <tr>
                              <th class="name align-center">
                                REQUEST TIME
                                <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1">
                              </th>
                              <th class="name align-center">
                                AMOUNT
                                <img src="svg-icons/Like-Dislike/down-arrow-Static-white.svg" width="9" hspace="1">
                              </th>
                              <th class="name align-center">
                                DETAILS
                              </th>
                              <th class="mybid align-center">
                                STATUS
                              </th>
                              <th class="description align-center">
                                PROCESS DATE
                              </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->withdrawals as $withdrawal)
                              <tr class="event-item">
                                <td class="freshness inline-items" align="center" style="vertical-align: middle">
                                  <div class="author-freshness" style="margin-top: -5px"><a href="javascript:;"
                                                                                            class="h6 title"
                                                                                            style="margin-top: -5px">Withdrawal
                                      Requested </a>
                                    <time class="entry-date updated"><span
                                        style="font-size: 12px;">{{$withdrawal->created_at}}</span></time>
                                  </div>
                                </td>
                                <td class="freshness inline-items" align="center" style="vertical-align: middle">
                                  <div class="author-freshness" style="margin-top: -5px"><a href="javascript:;"
                                                                                            class="h6 title"
                                                                                            style="margin-top: -5px">Withdrawal
                                      Amount</a>
                                    <time class="entry-date updated"><span
                                        style="font-size: 12px;">{{$withdrawal->amount}}</span></time>
                                  </div>
                                </td>
                                <td class="freshness inline-items" align="center" style="vertical-align: middle">
                                  <div class="author-freshness" style="margin-top: -5px"><a href="javascript:;"
                                                                                            class="h6 title"
                                                                                            style="margin-top: -5px">Details </a>
                                    <time class="entry-date updated" datetime="2017-06-24T18:18"><span
                                        style="font-size: 12px;">Merchant: {{$withdrawal->payment_method}}</span></time>
                                  </div>
                                </td>
                                <td class="freshness inline-items" align="center" style="vertical-align: middle">
                                  <div class="author-freshness" style="margin-top: -5px"><a href="javascript:;"
                                                                                            class="h6 title"
                                                                                            style="margin-top: -5px">Status</a>
                                    <time class="entry-date updated" datetime="2017-06-24T18:18"><span
                                        style="font-size: 12px;color: #FF7E00">{{$withdrawal->status}}</span></time>
                                  </div>
                                </td>
                                <td class="freshness inline-items" align="center" style="vertical-align: middle">
                                  <div class="author-freshness" style="margin-top: -5px"><a href="javascript:;"
                                                                                            class="h6 title"
                                                                                            style="margin-top: -5px">Processing
                                      Date</a>
                                    <time class="entry-date updated" datetime="2017-06-24T18:18"><span
                                        style="font-size: 12px;">N/A</span></time>
                                  </div>
                                </td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ... end News Feed Form  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Include modal here -->
  @include('modal.bankDetails')

@endsection
@endif
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/default_hung.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/hungstyle.css')}}">
@endsection
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function () {

      $(document).on('click', '#confirm_bank_deposit', function (event) {
        var target_modal = $('#bank-details');
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          url: "{{route('ajax.postbankdeposit')}}",
          data: {
            'amount': $('.deposit_bank_price').val(),
            'currency': 'USD',
          },
          success: function (data) {
              jQuery.sticky(data.message, {classList: 'success', speed: 200, autoclose: 5000});
              target_modal.modal('show');
          }
        });
      });

      $(document).on('click', '#wallet', function () {
        var a = $("#type").val('wallet');
        $(this).closest('.deposit_form').find('.craf-wallet.hidden').removeClass('hidden');
        $(this).closest('.deposit_form').find('.craf-pay').addClass('hidden');


      });
      $(document).on('click', '#paypal', function () {
        var a = $("#type").val('paypal');
        $(this).closest('.deposit_form').find('.craf-pay.hidden').removeClass('hidden');
        $(this).closest('.deposit_form').find('.craf-wallet').addClass('hidden');
      });
      $(document).on('change', '.deposit_price', function () {
        var price = $(this).val();
        if (isNaN(price)) {
          $(this).closest('.ui-block-content').find('.total-deposit-price').html('');
          $(this).closest('.ui-block-content').find('.amount_crafting').html('');
        } else {
          $(this).closest('.ui-block-content').find('.total-deposit-price').html(price);
          $(this).closest('.ui-block-content').find('.amount_crafting').html(price * 5);
        }

      });
      $(document).on('change', '.deposit_stripe_price', function () {
        var price = $(this).val();
        if (isNaN(price)) {
          $(this).closest('.ui-block-content').find('.total-deposit-stripe-price').html('');
          $(this).closest('.ui-block-content').find('.amount_crafting_stripe').html('');
        } else {
          $(this).closest('.ui-block-content').find('.total-deposit-stripe-price').html(price);
          $(this).closest('.ui-block-content').find('.amount_crafting_stripe').html(price * 5);
        }

      });
    });
    $(document).on('change', '.deposit_bank_price', function () {
      var price = $(this).val();
      if (isNaN(price)) {
        $(this).closest('.ui-block-content').find('.total-deposit-bank-price').html('');
        $(this).closest('.ui-block-content').find('.amount_crafting_bank').html('');
      } else {
        $(this).closest('.ui-block-content').find('.total-deposit-bank-price').html(price);
        $(this).closest('.ui-block-content').find('.amount_crafting_bank').html(price * 5);
      }
    });

    $('.stripedep').hide();
    $('.paypalwithdrawal').hide();
    $('.bankdep').hide();

    $('body').on('click', "[href$='depositfunds']", function () {
      $('.paypalwithdrawal').hide();
    });

    $('body').on('click', "[href$='deposit']", function () {
      $('.deposit-title').show();
      $('.hp-depositfunds').show();
      $('.paypalwithdrawal').hide();
      $('#secure-credit-payment').hide();
    });
    $('body').on('click', "[href$='securepayment']", function () {
      $('.paypaldep').hide();
      $('.stripedep').hide();
      $('.bankdep').hide();
      $('.paypalwithdrawal').hide();
      $('.bank-withdrawal').hide();
      $('.deposit-title').hide();
      $('.hp-depositfunds').hide();
      $('#secure-credit-payment').show();
      $('.purchase-credit').show();
      $('.stripecreditdiv').hide();
      $('.paypalcreditdiv').show();
      $('.bankcreditdiv').hide();
    });
    $('body').on('click', '#withdrawal', function () {
      $('.paypalwithdrawal').show();
      $('.deposit-title').hide();
      $('.bankdep').hide();
      $('.hp-titletab').hide();
      $('.hp-depositfunds').hide();
      $('.paypaldep').hide();
      $('.stripedep').hide();
      $('.stripecreditdiv').hide();
      $('.paypalcreditdiv').hide();
      $('.bank-withdrawal').hide();
      $('.paypal-withdrawal-part').hide();
      return false;
    });
    $('body').on('click', '#friend-tab-stripe', function () {
      $('.stripedep').show();
      $('.paypaldep').hide();
      $('.bankdep').hide();
      return false;
    });
    $('body').on('click', '#friend-tab-paypal', function () {
      $('.stripedep').hide();
      $('.paypaldep').show();
      $('.bankdep').hide();
      return false;
    });
    $('body').on('click', '#friend-tab-bank', function () {
      $('.stripedep').hide();
      $('.paypaldep').hide();
      $('.bankdep').show();
      return false;
    });
    $('.stripecreditdiv').hide();
    $('body').on('click', '#stripecr', function () {
      $('.stripecreditdiv').show();
      $('.paypalcreditdiv').hide();
      $('.bankcreditdiv').hide();
      return false;
    });
    $('body').on('click', '#paypalcr', function () {
      $('.stripecreditdiv').hide();
      $('.paypalcreditdiv').show();
      $('.bankcreditdiv').hide();
      return false;
    });
    $('body').on('click', '#bankcr', function () {
      $('.stripecreditdiv').hide();
      $('.paypalcreditdiv').hide();
      $('.bankcreditdiv').show();
      return false;
    });
    $(document).on('click', '#paypalid', function () {
      $('.bank-withdrawal').hide();
      $('.paypal-withdrawal-part').show();
      return false;
    });
    $(document).on('click', '#bankid', function () {
      $('.bank-withdrawal').show();
      $('.paypal-withdrawal-part').hide();
      return false;
    });

  </script>
@endsection
