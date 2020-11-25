@extends('layouts.master')
@section('title')
Deposit
@endsection

@section('content')
<div class="container">
   <div class="container-fluid">
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success')}}
      </div>
      @endif
   <div class="row page_title">
      <div class="col-sm-6">
         <h4>Buy and Sell</h4>
      </div>
      <div class="col-sm-6">
         <!-- Breadcrumbs-->
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Buy and Sell</li>
         </ol>
      </div>
   </div>
   <div class="row">
      <div class="col-md-8">
         <div class="card mb-4">
            <div class="card-header">Buy / Sell Token</div>
            <div class="card-wrap">
               <ul role="tablist" id="pills-tab" class="nav nav_tab">
                  <li class="nav-item">
                     <a href="#tab1" data-toggle="tab" class="nav-link active">Buy</a>
                  </li>
                  <li class="nav-item">
                     <a href="#tab2" data-toggle="tab" class="nav-link">Sell</a>
                  </li>
               </ul>
               <div class="tab-content card-body">
                  <div role="tabpanel" id="tab1" class="tab-pane fade show active">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label>Cryptocurrency</label>
                           <div class="select_box">
                              <select class="custom_select">
                                 <option value="">Select Cryptocurrency</option>
                                 <option value="Bitcoin">Bitcoin</option>
                                 <option value="Ethereum">Ethereum</option>
                                 <option value="Dashcoin">Dashcoin</option>
                                 <option value="Lightcoin">Lightcoin</option>
                                 <option value="Ripple">Ripple</option>
                                 <option value="Neo">Neo</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                           <label class="col-form-label">Amount</label>
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Amount">
                              <div class="input-group-append">
                                 <span class="input-group-text p-0">
                                    <div class="select_box">
                                       <select class="custom_select">
                                          <option value="USD">USD</option>
                                          <option value="EUR">EUR</option>
                                          <option value="GBP">GBP</option>
                                       </select>
                                    </div>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                           <label class="col-form-label">Price</label>
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Price">
                              <div class="input-group-append">
                                 <span class="input-group-text p-0">
                                    <div class="select_box">
                                       <select class="custom_select">
                                          <option value="Bitcoin">Bitcoin</option>
                                          <option value="Ethereum">Ethereum</option>
                                          <option value="Dashcoin">Dashcoin</option>
                                          <option value="Lightcoin">Lightcoin</option>
                                          <option value="Ripple">Ripple</option>
                                          <option value="Neo">Neo</option>
                                       </select>
                                    </div>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group col-md-12 pt-2">
                           <h6>Payment method</h6>
                        </div>
                        <div class="form-group col-md-12 text-center mb-0">
                           <ul class="list_none p-0 payment_methods_list m-0">
                              <li class="active">
                                 <a href="javascript:void(0);" data-tag="BTC"><i class="cc BTC-alt" title="BTC"></i><span>Bitcoin</span></a>
                              </li>
                              <li>
                                 <a href="javascript:void(0);" data-tag="ETC"><i class="cc ETC" title="ETC"></i><span>Ethereum</span></a> 
                              </li>
                              <li>
                                 <a href="javascript:void(0);" data-tag="LTC"><i class="cc LTC-alt" title="LTC"></i><span>Litecoin</span></a> 
                              </li>
                              <li>
                                 <a href="javascript:void(0);" data-tag="NEO"><i class="cc NEO" title="NEO"></i><span>NEO</span></a> 
                              </li>
                              <li>
                                 <a href="javascript:void(0);" data-tag="DASH"><i class="cc DASH-alt" title="DASH"></i><span>Dash</span></a> 
                              </li>
                              <li>
                                 <a href="javascript:void(0);" data-tag="VISAMCARD"><i class="fa fa-cc-visa" title="Visa"></i><i class="fa fa-cc-mastercard" title="Master Card"></i><span>Visa/MasterCard</span></a> 
                              </li>
                           </ul>
                        </div>
                        <div class="form-group col-md-12">
                           <div id="BTC" class="payment_option d-block">
                              <h6 class="mb-2">Payment Address</h6>
                              <div class="copy-button">
                                 <input type="text" name="address" class="form-control copy_input" readonly="" value="1MLqEXppcuM57bSorDQ4s3EYBBqmqt1Lfq" placeholder="1MLqEXppcuM57bSorDQ4s3EYBBqmqt1Lfq">
                                 <span class="copy-link btn-default" data-toggle="tooltip" title="" data-original-title="Copy to Clipboard">Copy</span>
                              </div>
                           </div>
                           <div id="ETC" class="payment_option d-none">
                              <h6 class="mb-2">Payment Address</h6>
                              <div class="copy-button">
                                 <input type="text" name="address" class="form-control copy_input" readonly="" value="0xD8A2CF2Bc17F5647EC0aEcf2C737a284CdCCB776" placeholder="0xD8A2CF2Bc17F5647EC0aEcf2C737a284CdCCB776">
                                 <span class="copy-link btn-default" data-toggle="tooltip" title="" data-original-title="Copy to Clipboard">Copy</span>
                              </div>
                           </div>
                           <div id="LTC" class="payment_option d-none">
                              <h6 class="mb-2">Payment Address</h6>
                              <div class="copy-button">
                                 <input type="text" name="address" class="form-control copy_input" readonly="" value="DKJ5345FG5659F545GF576UDF234TDFDGH567REGDFH5478" placeholder="DKJ5345FG5659F545GF576UDF234TDFDGH567REGDFH5478">
                                 <span class="copy-link btn-default" data-toggle="tooltip" title="" data-original-title="Copy to Clipboard">Copy</span>
                              </div>
                           </div>
                           <div id="NEO" class="payment_option d-none">
                              <h6 class="mb-2">Payment Address</h6>
                              <div class="copy-button">
                                 <input type="text" name="address" class="form-control copy_input" readonly="" value="ERETY567TYHRT6547YG3432RDTU65UFGH54654YHGH567HT" placeholder="ERETY567TYHRT6547YG3432RDTU65UFGH54654YHGH567HT">
                                 <span class="copy-link btn-default" data-toggle="tooltip" title="" data-original-title="Copy to Clipboard"> Copy </span>
                              </div>
                           </div>
                           <div id="DASH" class="payment_option d-none">
                              <h6 class="mb-2">Payment Address</h6>
                              <div class="copy-button">
                                 <input type="text" name="address" class="form-control copy_input" readonly="" value="SDFRRDF2343FGDF6FRGDF543543FDGD45DSDFSD432" placeholder="SDFRRDF2343FGDF6FRGDF543543FDGD45DSDFSD432">
                                 <span class="copy-link btn-default" data-toggle="tooltip" title="" data-original-title="Copy to Clipboard"> Copy</span>
                              </div>
                           </div>
                           <div id="VISAMCARD" class="payment_option d-none">
                              <h6 class="mb-2">Payment Detail</h6>
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label class="col-form-label">Credit card number:</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control">
                                    </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="col-form-label">Full Name:</label>
                                    <div class="input-group">
                                       <input type="text" class="form-control">
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="col-form-label">Month:</label>
                                    <div class="input-group">
                                       <div class="select_box">
                                          <select class="custom_select">
                                             <option value="January">January</option>
                                             <option value="February">February</option>
                                             <option value="March">March</option>
                                             <option value="April">April</option>
                                             <option value="May">May</option>
                                             <option value="June">June</option>
                                             <option value="July">July</option>
                                             <option value="August">August</option>
                                             <option value="September">September</option>
                                             <option value="October">October</option>
                                             <option value="November">November</option>
                                             <option value="December">December</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="col-form-label">Year:</label>
                                    <div class="input-group">
                                       <div class="select_box">
                                          <select class="custom_select">
                                             <option value="2025">2025</option>
                                             <option value="2024">2024</option>
                                             <option value="2023">2023</option>
                                             <option value="2022">2022</option>
                                             <option value="2021">2021</option>
                                             <option value="2020">2020</option>
                                             <option value="2019">2019</option>
                                             <option value="2018">2018</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="col-form-label">CVV:</label>
                                    <div class="input-group">
                                       <input type="password" class="form-control">
                                    </div>
                                 </div>
                                 <div class="pt-2 col-md-12">
                                    <button class="btn btn-default">Buy Now</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div role="tabpanel" id="tab2" class="tab-pane fade">
                     <div class="row">
                        <div class="form-group col-md-12">
                           <label>Cryptocurrency</label>
                           <div class="select_box">
                              <select class="custom_select">
                                 <option value="">Select Cryptocurrency</option>
                                 <option value="Bitcoin">Bitcoin</option>
                                 <option value="Ethereum">Ethereum</option>
                                 <option value="Dashcoin">Dashcoin</option>
                                 <option value="Lightcoin">Lightcoin</option>
                                 <option value="Ripple">Ripple</option>
                                 <option value="Neo">Neo</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                           <label class="col-form-label">Amount</label>
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Amount">
                              <div class="input-group-append">
                                 <span class="input-group-text p-0">
                                    <div class="select_box">
                                       <select class="custom_select">
                                          <option value="USD">USD</option>
                                          <option value="EUR">EUR</option>
                                          <option value="GBP">GBP</option>
                                       </select>
                                    </div>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                           <label class="col-form-label">Price</label>
                           <div class="input-group">
                              <input type="text" class="form-control" placeholder="Price">
                              <div class="input-group-append">
                                 <span class="input-group-text p-0">
                                    <div class="select_box">
                                       <select class="custom_select">
                                          <option value="Bitcoin">Bitcoin</option>
                                          <option value="Ethereum">Ethereum</option>
                                          <option value="Dashcoin">Dashcoin</option>
                                          <option value="Lightcoin">Lightcoin</option>
                                          <option value="Ripple">Ripple</option>
                                          <option value="Neo">Neo</option>
                                       </select>
                                    </div>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="pt-2 col-md-12">
                           <button class="btn btn-default">Sell Now</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card mb-4">
            <div class="card-header text_md_center">TOKEN BALANCE</div>
            <div class="card-body">
               <div class="row align-items-center text_md_center">
                  <div class="col-xl-6 col-lg-12">
                     <h5 class="text-muted small">Total Balance</h5>
                     <h3 class="balance_text">${{$user->wallet}}</h3>
                  </div>
                  <div class="col-xl-6 col-lg-12">
                     <button class="btn btn-default">Withdraw</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="card mb-4">
            <div class="card-header text_md_center">Token Sale Proceeds</div>
            <div class="card-body">
               <div class="d-flex justify-content-between mb-1">
                  <span>Sale Raised</span>
                  <span>Soft-caps</span>
               </div>
               <div class="progressbar">
                  <div style="width:46%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="46" role="progressbar" class="progress-bar gradient"> </div>
                  <span style="left: 30%" class="progress_label"> <strong> 46,000 ICC </strong></span>
                  <span style="left: 75%" class="progress_label"> <strong> 90,000 ICC </strong></span>
               </div>
            </div>
         </div>
         <div class="card mb-4">
            <div class="card-header text_md_center">Timeline</div>
            <div class="card-body">
               <ul class="timeline_wrap list_none fc-scroll p-0 ps ps--active-y">
                  <li>
                     <div class="timeline_icon tm_complete"></div>
                     <div class="timeline_content">
                        <h6>Inotial Coin Distribution &amp; maketing</h6>
                        <span>Aprile 2018</span>
                     </div>
                  </li>
                  <li>
                     <div class="timeline_icon tm_complete"></div>
                     <div class="timeline_content">
                        <h6>Exchange BCT to Bitcoin</h6>
                        <span>February 2018</span>
                     </div>
                  </li>
                  <li>
                     <div class="timeline_icon"></div>
                     <div class="timeline_content">
                        <h6>BCT mode of payment in Crypto</h6>
                        <span>March 2018</span>
                     </div>
                  </li>
                  <li>
                     <div class="timeline_icon"></div>
                     <div class="timeline_content">
                        <h6>Send-Receive coin mobile</h6>
                        <span>June 2018</span>
                     </div>
                  </li>
                  <li>
                     <div class="timeline_icon"></div>
                     <div class="timeline_content">
                        <h6>Mobile apps for iOS &amp; Android</h6>
                        <span>October 2018</span>
                     </div>
                  </li>
                  <li>
                     <div class="timeline_icon"></div>
                     <div class="timeline_content">
                        <h6>Deposit Bitcoin from your account</h6>
                        <span>December 2018</span>
                     </div>
                  </li>
                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                     <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                  </div>
                  <div class="ps__rail-y" style="top: 0px; height: 300px; right: 0px;">
                     <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 250px;"></div>
                  </div>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card mb-3">
            <div class="card-header">Transactions List</div>
            <div class="card-body">
               <div class="table-responsive">
                  <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                     <div class="row">
                        <div class="col-sm-12 col-md-6">
                           <div class="dataTables_length" id="dataTable_length">
                              <label>
                                 Show 
                                 <select name="dataTable_length" aria-controls="dataTable" class="form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                 </select>
                                 entries
                              </label>
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                           <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <table class="table table-hover mb-0 table_s1 dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                              <thead>
                                 <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 49px;">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Currency: activate to sort column ascending" style="width: 144px;">Currency</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 112px;">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 129px;">Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 225px;">Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" style="width: 88px;">Type</th>
                                 </tr>
                              </thead>
                              <tfoot>
                                 <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Currency</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1">Amount</th>
                                    <th rowspan="1" colspan="1">Date</th>
                                    <th rowspan="1" colspan="1">Type</th>
                                 </tr>
                              </tfoot>
                              <tbody>
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">1</td>
                                    <td><i class="cc BTC-alt" title="BTC"></i>BTC</td>
                                    <td><span class="badge-success badge-pill">Completed</span></td>
                                    <td>0.46872</td>
                                    <td>2018-01-31 06:52:40</td>
                                    <td class="text-success">Buy</td>
                                 </tr>
                                 <tr role="row" class="even">
                                    <td class="sorting_1">2</td>
                                    <td><i class="cc ETH-alt" title="ETH"></i>ETH</td>
                                    <td><span class="badge-warning badge-pill">Pending</span></td>
                                    <td>0.31552</td>
                                    <td>2018-02-05 05:45:15</td>
                                    <td class="text-danger">Sell</td>
                                 </tr>
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">3</td>
                                    <td><i class="cc ETH-alt" title="ETH"></i>ETH</td>
                                    <td><span class="badge-warning badge-pill">Pending</span></td>
                                    <td>0.25421</td>
                                    <td>2018-10-08 02:30:26</td>
                                    <td class="text-success">Buy</td>
                                 </tr>
                                 <tr role="row" class="even">
                                    <td class="sorting_1">4</td>
                                    <td><i class="cc NEO" title="NEO"></i>NEO</td>
                                    <td><span class="badge-danger badge-pill">Cancelled</span></td>
                                    <td>0.87261</td>
                                    <td>2018-05-15 06:12:14</td>
                                    <td class="text-success">Buy</td>
                                 </tr>
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">5</td>
                                    <td><i class="cc LTC-alt" title="LTC"></i>LTC</td>
                                    <td><span class="badge-info badge-pill">in Process</span></td>
                                    <td>0.15612</td>
                                    <td>2018-04-24 07:10:31</td>
                                    <td class="text-danger">Sell</td>
                                 </tr>
                                 <tr role="row" class="even">
                                    <td class="sorting_1">6</td>
                                    <td><i class="cc BTC-alt" title="BTC"></i>BTC</td>
                                    <td><span class="badge-danger badge-pill">Cancelled</span></td>
                                    <td>0.65842</td>
                                    <td>2018-04-20 07:10:31</td>
                                    <td class="text-success">Buy</td>
                                 </tr>
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">7</td>
                                    <td><i class="cc BTC-alt" title="BTC"></i>BTC</td>
                                    <td><span class="badge-success badge-pill">Completed</span></td>
                                    <td>0.46872</td>
                                    <td>2018-01-31 06:52:40</td>
                                    <td class="text-success">Buy</td>
                                 </tr>
                                 <tr role="row" class="even">
                                    <td class="sorting_1">8</td>
                                    <td><i class="cc ETH-alt" title="ETH"></i>ETH</td>
                                    <td><span class="badge-warning badge-pill">Pending</span></td>
                                    <td>0.31552</td>
                                    <td>2018-02-05 05:45:15</td>
                                    <td class="text-danger">Sell</td>
                                 </tr>
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">9</td>
                                    <td><i class="cc ETH-alt" title="ETH"></i>ETH</td>
                                    <td><span class="badge-success badge-pill">Completed</span></td>
                                    <td>0.25421</td>
                                    <td>2018-10-08 02:30:26</td>
                                    <td class="text-success">Buy</td>
                                 </tr>
                                 <tr role="row" class="even">
                                    <td class="sorting_1">10</td>
                                    <td><i class="cc NEO" title="NEO"></i>NEO</td>
                                    <td><span class="badge-danger badge-pill">Cancelled</span></td>
                                    <td>0.87261</td>
                                    <td>2018-05-15 06:12:14</td>
                                    <td class="text-success">Buy</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 col-md-5">
                           <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                           <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                              <ul class="pagination">
                                 <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                 <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                 <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                 <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
   <div class="ui-block">
      <div class="container">
         <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <h2>Deposit Money</h2>
               <form data-parsley-validate class="deposit_form form-horizontal" id="depositform" method="post" action="{{route('postdeposit')}}">
                  @csrf
                  <input type="hidden" name="deposit[currency]" value="USD">
                     <div class="form-group col-md-12 label-floating">
                        <label class="col-md-3 control-label">Amount($)</label>
                        <div class="col-md-9">
                           <div class="input-group has-success">
                              <input type="number" class="display-ib form-control valid" id="amount" name="deposit[amount]" value="" data-parsley-min="5" data-parsley-max="15000" data-parsley-error-message="Enter amount in between 50 to 15000" required>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-12 space">
                           <div class="radio big-padding hr-bottom">
                              <label class="has-success">
                                 <input type="radio" disabled name="deposit[type]" value="credit" class="valid">
                                 Credit Card (available soon)
                              </label>
                           </div>
                           <div class="radio big-padding hr-bottom">
                              <label class="has-success">
                                 <input type="radio" checked="" name="deposit[type]" value="paypal" class="valid">
                                 Paypal
                              </label>
                           </div>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>


@endsection
@section('scripts')
    <link rel="stylesheet" href="http://bestwebcreator.com/cryptocash/demo/dashboard/css/admin.css">
    <link rel="stylesheet" href="{{asset('public/admin/assets/vendor/parsleyjs/css/parsley.css')}}">
    <script src="{{asset('public/admin/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>
<script type="text/javascript">
   jQuery(document).ready(function(){

      /*$('.deposit_form').parsley().on('field:validated', function() {
         var ok = $('.parsley-error').length === 0;
         $('.bs-callout-info').toggleClass('hidden', !ok);
         $('.bs-callout-warning').toggleClass('hidden', ok);
      })
      .on('form:submit', function() {
         return false; // Don't submit form for this demo
      });*/

   });
   (function($) {
  "use strict"; // Start of use strict
  // Configure tooltips for collapsed side navigation
  $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
    template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip" style="pointer-events: none;"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
  })
  // Toggle the side navigation
  $("#sidenavToggler").click(function(e) {
    e.preventDefault();
    $("body").toggleClass("sidenav-toggled");
    $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
    $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
  });
  // Force the toggled class to be removed when a collapsible nav link is clicked
  $(".navbar-sidenav .nav-link-collapse").click(function(e) {
    e.preventDefault();
    $("body").removeClass("sidenav-toggled");
  });
  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
    var e0 = e.originalEvent,
      delta = e0.wheelDelta || -e0.detail;
    this.scrollTop += (delta < 0 ? 1 : -1) * 30;
    e.preventDefault();
  });
  // Scroll to top button appear
  $(document).scroll(function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });
  // Configure tooltips globally
  $('[data-toggle="tooltip"]').tooltip()
  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });
  $('.search_icon').on('click', function() {
   $(this).toggleClass("open");
   $('.search_input').toggleClass("open");
  });
  
  
  $(document).ready(function(){
   $('.payment_methods_list li a').click(function(){
      $('.payment_methods_list li').removeClass('active');
      $(this).parent().addClass('active');
      var tagid = $(this).data('tag');
      $('.payment_option').removeClass('d-block').addClass('d-none');
      $('#'+tagid).addClass('d-block').removeClass('d-none');
   });
  });
   
   $('.custom_select').each(function () {
    // Cache the number of options
    var $this = $(this),
        numberOfOptions = $(this).children('option').length;
    // Hides the select element
    $this.addClass('d-none');
    // Wrap the select element in a div
    $this.wrap('<div class="select_box"></div>');
    // Insert a styled div to sit over the top of the hidden select element
    $this.after('<div class="styledSelect"></div>');
    // Cache the styled div
    var $styledSelect = $this.next('div.styledSelect');
    // Show the first select option in the styled div
    $styledSelect.text($this.children('option').eq(0).text());
    // Insert an unordered list after the styled div and also cache the list
    var $list = $('<ul />', {
        'class': 'select_options'
    }).insertAfter($styledSelect);
    // Insert a list item into the unordered list for each select option
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
    // Cache the list items
    var $listItems = $list.children('li');
    // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
    $styledSelect.click(function (e) {
        e.stopPropagation();
      $('div.styledSelect.active').each(function () {
            $(this).removeClass('active').next('ul.select_options').hide();
        });
        $(this).toggleClass('active').next('ul.select_options').toggle();
    });
    // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
    // Updates the select element to have the value of the equivalent option
    $listItems.click(function (e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        /* alert($this.val()); Uncomment this for demonstration! */
    });
    // Hides the unordered list when clicking outside of it
    $(document).click(function () {
        $styledSelect.removeClass('active');
        $list.hide();
    });
});
   $('.tk_countdown_time').each(function() {
        var endTime = $(this).data('time');
        $(this).countdown(endTime, function(tm) {
            $(this).html(tm.strftime('<span class="counter_box"><span class="tk_counter days">%D </span><span class="tk_text">Days</span></span><span class="counter_box"><span class="tk_counter hours">%H</span><span class="tk_text">Hours</span></span><span class="counter_box"><span class="tk_counter minutes">%M</span><span class="tk_text">Minutes</span></span><span class="counter_box"><span class="tk_counter seconds">%S</span><span class="tk_text">Seconds</span></span>'));
        });
    });


function copyToClipboard(text, el) {
  var copyTest = document.queryCommandSupported('copy');
  var elOriginalText = el.attr('data-original-title');

  if (copyTest === true) {
    var copyTextArea = document.createElement("textarea");
    copyTextArea.value = text;
    document.body.appendChild(copyTextArea);
    copyTextArea.select();
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'Copied!' : 'Whoops, not copied!';
      el.attr('data-original-title', msg).tooltip('show');
    } catch (err) {
      console.log('Oops, unable to copy');
    }
    document.body.removeChild(copyTextArea);
    el.attr('data-original-title', elOriginalText);
  } else {
    // Fallback if browser doesn't support .execCommand('copy')
    window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
  }
}

$('.copy-link').click(function (index) {
   var text = $(this).prev(".copy_input").attr('value');
   var el = $(this);
   copyToClipboard(text, el);
});
 
})(jQuery); // End of use strict

</script>
@endsection