<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title')</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <base href="{{asset('public/frontend/')}}/">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Bootstrap/dist/css/bootstrap-grid.css">

    <!-- Main Styles CSS <link rel="stylesheet" type="text/css" href="css/main.min.css">-->
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    

</head>

<body>
<form method="get" action="{{route('search')}}">
	<div class="container">
		<div class="row">
			<div class="col col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">

				<div class="ui-block">


					<!-- News Feed Form  -->

					<div class="news-feed-form" style="overflow: none;">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">

									<svg class="olymp-status-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>

									<span>Find Jobs</span>
								</a>
							</li>
							<li class="nav-item" style="background-image: linear-gradient(#FFFFFF, #FAFBFD);">
								<a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">

									<svg class="olymp-multimedia-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-multimedia-icon"></use></svg>

									<span>Contests</span>
								</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
								
								
								<div id="accordion" role="tablist" aria-multiselectable="true">
									<div class="card">
										<div class="card-header" role="tab" id="headingOne-4" style="background-image: linear-gradient(#FFFFFF, #FAFBFD)">
											<h6 class="mb-0">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-4" aria-expanded="true" aria-controls="collapseOne-4"><img src="svg-icons/sprites/star-icon.svg" width="15" hspace="1" style="PADDING-BOTTOM: 3px; margin-left: 2px">
													<span style="color: #515380; padding-bottom: 5px; font-weight: 400; color: #858AA6"> Price Range </span>
													<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
												</a>
											</h6>
										</div>
										<div id="collapseOne-4" class="collapse " role="tabpanel" aria-labelledby="headingOne-4">
											<div class="ui-block-title">
												<div class="range-slider range-slider--blue">
													<div class="col col-lg-12 col-12 no-padding">
														<h6>Fixed Rate</h6>
													</div>
													<input type="text" class="range-slider-js" name="price_min" value="" />
												</div>
											</div>
											<div class="ui-block-title" style="border-bottom: solid; border-bottom-width: 1px;border-top-width: 0px;border-bottom-color: #E6ECF5">
												<div class="range-slider range-slider--red">
													<input type="text" class="range-slider-js" name="price_max" value="" />
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
		</div>
	</div>


</form>

<!-- JS Scripts -->
<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.mousewheel.js"></script>
<script src="js/perfect-scrollbar.js"></script>
<script src="js/jquery.matchHeight.js"></script>
<script src="js/svgxuse.js"></script>
<script src="js/imagesloaded.pkgd.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/velocity.js"></script>
<script src="js/ScrollMagic.js"></script>
<script src="js/jquery.waypoints.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/material.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/smooth-scroll.js"></script>
<script src="js/selectize.js"></script>
<script src="js/swiper.jquery.js"></script>
<script src="js/moment.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/simplecalendar.js"></script>
<script src="js/fullcalendar.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/ajax-pagination.js"></script>
<script src="js/Chart.js"></script>
<script src="js/chartjs-plugin-deferred.js"></script>
<script src="js/circle-progress.js"></script>
<script src="js/loader.js"></script>
<script src="js/run-chart.js"></script>
<script src="js/jquery.magnific-popup.js"></script>
<script src="js/jquery.gifplayer.js"></script>
<script src="js/mediaelement-and-player.js"></script>
<script src="js/mediaelement-playlist-plugin.min.js"></script>
<script src="js/ion.rangeSlider.js"></script>

<script src="js/base-init.js"></script>
<script defer src="fonts/fontawesome-all.js"></script>

<script src="Bootstrap/dist/js/bootstrap.bundle.js"></script>

</body>
</html>