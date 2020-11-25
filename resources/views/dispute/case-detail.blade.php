
 <div class="col col-lg-12 col-md-12 col-sm-12 col-12 no-margin">
    <div class="ui-block" data-mh="pie-chart" style="background-image: linear-gradient(#3F4257, #4E5065);">
       <div class="ui-block-title" >
          <h3 style="font-size: 17px;color: #FFFFFF;">Review & Enter Case</h3>
       </div>
    </div>
 </div>
<div class="col col-xl-4 order-xl-2 col-lg-4 order-lg-2 col-md-5 order-md-1 col-sm-12 col-12 no-margin">
  <div class="ui-block" >
    <div class="ui-block-title">
      <h6 class="title">Dispute Stakes</h6>
    </div>
    <div class="ui-block-content" style="padding-bottom: 5px">
      <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span>Milestone</span></span> <span class="skills-item-count"><span class="units">{{$dispute->milestone->percent_payment}}% | ${{$dispute->milestone->price_bid}} </span> <img src="svg-icons/JobCard/white-flag-symbol.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
      <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span >Total Staked</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$dispute->total_credit}} ALC</span> <img src="svg-icons/JobCard/AlchemToken.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
      <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span >Your Stake</span> </span> <span class="skills-item-count" ><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$dispute->court_fee}} / {{$dispute->total_credit}} ALC</span> <img src="svg-icons/Payment Method/insert-coin.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
      <div class="skills-item-info" style="margin-top: 15px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span >Win Dispute (5%)</span></span> <span class="skills-item-count" ><span class="units">{{$dispute->credit_win}} ALC</span> <img src="svg-icons/Like-Dislike/up-arrow.svg" style="border-radius: 0%;width: 18px; vertical-align: top"></span></div>
      <div class="skills-item-info" style="margin-top: 15px;margin"><span class="skills-item-title"><span >Lose Dispute (100%)</span> </span> <span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="2300" data-from="0"></span><span class="units" >{{$dispute->court_fee}} ALC</span> <img src="svg-icons/Like-Dislike/down-arrow.svg" style="border-radius: 0%;width: 18px; vertical-align: top"> </div>
    </div>
  </div>
  <div class="ui-block" >
    <div class="ui-block-title">
      <h6 class="title">Result Criteria</h6>
      <?php $amount = $dispute->amount?>
    </div>
    <div class="ui-block-content" style="padding-bottom: 5px">
      @for($i=6;$i--;$i<1)
      <?php 
        $per = 100 - (5-$i)*20;
        $dola = $amount*$per/100;
        $txt = 'Win';
        if($user->isSeeker()) {
          $txt = 'Pay';
          $dola = $amount - $amount*$per/100;
        }
      ?>
        <div class="skills-item-info" style="margin-top: 0px;border-bottom: #E6ECF5 solid 1px;padding-bottom: 15px"><span class="skills-item-title"><span >{{$i}}/5 Votes ({{$per}}%)</span> </span><span class="skills-item-count" ><span class="count-animate"></span><span class="units" >{{$txt}} ${{$dola}}</span></span></div>
      @endfor
    </div>
  </div>
</div>
<div class="col col-xl-8 order-xl-2 col-lg-8 order-lg-2 col-md-8 order-md-2 col-sm-12 col-12 no-margin" >
  <div class="row" style="margin-bottom: 10px">
    <div class="col col-lg-12 col-md-12 col-sm-9 col-9 no-margin">
      <div class="ui-block responsive-flex1200" >
        <div class="ui-block-content">
          <div class="crumina-module crumina-heading with-title-decoration " >
             <h6 class="heading-title" style="padding-bottom: 15px;font-weight: 500">{{$dispute->my_case()->title ?? ""}}</h6>
          </div>
          <p>{{$dispute->my_case()->description ?? ""}}</p>
        </div>
      </div>
      <div id="accordion" role="tablist" aria-multiselectable="true">
        <div class="card" style="border-top-left-radius: 0px;border-top-right-radius: 0px; border-top-right-radius: 5px; border-top-left-radius: 5px;margin-bottom: 5px;background-color: #EDF2F6">
          <div class="card-header" role="tab" id="headingOne-20" style="background-image: linear-gradient(#FCFCFC, #FAFBFD);border: solid;border-color: #D8DBE6;border-width: 1px; border-radius: 5px;padding-top: 12px; padding-bottom: 12px; border-top-left-radius: 0px;border-to-right-radius: 0px; border-top-right-radius: 0px; border-top-left-radius: 0px;">
             <h6 class="mb-0">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseContest1" aria-expanded="true" aria-controls="collapseOne">
                   <img src="svg-icons/JobCard/focus-dark.svg" width="18" hspace="1" style="PADDING-BOTTOM: 3px; margin-right: 5px;">
                   <span style="color: #515380; padding-bottom: 5px; font-weight: 400; font-size: 13px; color: #858AA6">Preview Files</span>
                   <svg class="olymp-dropdown-arrow-icon">
                      <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                   </svg>
                </a>
             </h6>
          </div>
          <div id="collapseContest1" class="collapse" role="tabpanel" aria-labelledby="headingOne-20" style="background-color: #EDF2F6;margin-top: 8px">
            <div class="ui-block" style="margin-bottom: 0px">
              <table class="shop_table cart" style="width: 100%;">
                <thead>
                  <tr>
                     <th class="product-thumbnail" style="padding-left: 25px;padding-top: 10px;padding-bottom: 10px;border-bottom: 1px solid #e6ecf5;">ITEM DESCRIPTION</th>
                  </tr>
                </thead>
                <tbody class="alldownload">
                    @foreach($dispute->my_files() as $file)
                      @include('template_part.content-attachdispute')
                    @endforeach
                    <tr>
                      <td colspan="4" class="actions" style="padding-top: 10px;padding-left: 25px;padding-right: 25px;">
                         <a style="width: 100%;background-image: linear-gradient(#57596E, #3F4257);" data-toggle="modal" data-target="#" href="javascript:;" class="download-all btn btn-purple btn-md-2 btn-icon-left dowload-hp"><i class="fa fa-download" aria-hidden="true" ></i>DOWNLOAD ALL</a>                     
                      </td>
                    </tr>
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="col col-lg-12 col-md-12 col-sm-9 col-9 no-margin">
  </div>