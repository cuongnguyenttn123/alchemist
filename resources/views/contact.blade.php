@extends('layouts.master')
@section('title')
  Contact
@endsection
@section('content')
	<div class="stunning-header bg-account">
	<!-- Header Standard Landing  -->
		<div class="header--standard header--standard-landing" id="header--standard"> </div>
		<!-- ... end Header Standard Landing  -->
		<div class="header-spacer--standard"></div>
		<div class="stunning-header-content">
		   <h1 class="stunning-header-title">Contact Us</h1>
		   <ul class="breadcrumbs">
		      <li class="breadcrumbs-item">
		         <a href="{{route('home')}}">Home</a>
		         <span class="icon breadcrumbs-custom">/</span>
		      </li>
		      <li class="breadcrumbs-item active">
		         <span>Contact Us</span>
		      </li>
		   </ul>
		</div>
		<div class="content-bg-wrap stunning-header-bg1"></div>
	</div>
	<!-- Your Account Personal Information -->
        <section class="medium-padding120">
            <div class="container">
               <div class="row">
                  <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                     <!-- Contact Item -->
                    <div class="contact-item-wrap">
                        <h3 class="contact-title">Alchemunity HQ</h3>
                        <div class="contact-item">
                           <a href="javascript:;">57 Bonham Strand, Hong Kong, China</a>
                        </div>
                        <div class="contact-item">
                           <h6 class="sub-title">General Inquiries:</h6>
                           <a href="javascript:;">hqinquiries@alchemunity.com</a>
                        </div>
                    </div>
                     <!-- ... end Contact Item -->
                  </div>
                  <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                     <!-- Contact Item -->
                     <div class="contact-item-wrap">
                        <h3 class="contact-title">Press and Media</h3>
                        <div class="contact-item">
                           <h6 class="sub-title">James Rogers:</h6>
                           <a href="javascript:;">jamesmedia@alchemunity.com</a>
                        </div>
                        <div class="contact-item">
                           <h6 class="sub-title">Skype:</h6>
                           <a href="javascript:;">James Press</a>
                        </div>
                     </div>
                     <!-- ... end Contact Item -->
                  </div>
                  <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                     <!-- Contact Item -->
                     <div class="contact-item-wrap">
                        <h3 class="contact-title">Business Chat</h3>
                        <div class="contact-item">
                           <h6 class="sub-title">Marc Jackson:</h6>
                           <a href="javascript:;">jacksonbusiness@alchemunity.com</a>
                        </div>
                        <div class="contact-item">
                           <h6 class="sub-title">Skype:</h6>
                           <a href="javascript:;">Jackson Business</a>
                        </div>
                     </div>
                     <!-- ... end Contact Item -->
                  </div>
                  <div class="col col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                     <!-- Contact Item -->
                     <div class="contact-item-wrap">
                        <h3 class="contact-title">Human Resources</h3>
                        <div class="contact-item">
                           <h6 class="sub-title">Stella Karenson:</h6>
                           <a href="javascript:;">stellahhrr@alchemunity.com</a>
                        </div>
                        <div class="contact-item">
                           <h6 class="sub-title">Skype:</h6>
                           <a href="javascript:;">Karenson HHRR</a>
                        </div>
                     </div>
                     <!-- ... end Contact Item -->
                  </div>
               </div>
            </div>
        </section>
        <section class="medium-padding120 bg-body contact-form-animation scrollme">
            <div class="container">
               <div class="row">
                  <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12  m-auto">
                     <!-- Contacts Form -->
                     <div class="contact-form-wrap">
                        <form class="contact-form" style="width: 100%;">
                           <div class="row">
                              <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                 <div class="form-group label-floating">
                                    <label class="control-label">First Name</label>
                                    <input class="form-control" placeholder="" type="text" value="">
                                 </div>
                              </div>
                              <div class="col col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                 <div class="form-group label-floating">
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" placeholder="" type="text" value="">
                                 </div>
                              </div>
                              <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                 <div class="form-group label-floating">
                                    <label class="control-label">Your Email</label>
                                    <input class="form-control" placeholder="" type="email" value="">
                                 </div>
                                 <div class="form-group label-floating is-select">
                                    <label class="control-label">Inquiry Subject</label>
                                    <select class="selectpicker form-control">
                                       <option value="AC">Alchemunity Account Inquiries</option>
                                       <option value="AC">Alchemunity Account Inquiries</option>
                                    </select>
                                 </div>
                                 <div class="form-group label-floating is-empty">
                                    <label class="control-label">Your Message</label>
                                    <textarea class="form-control" placeholder=""></textarea>
                                 </div>
                                 <button class="btn btn-purple btn-lg full-width">Send Message</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- ... end Contacts Form -->
                  </div>
               </div>
            </div>
            <div class="half-height-bg bg-white"></div>
        </section>
        <section class="mt-0">
            <div class="section">
               <div id="map" style="height: 480px"></div>
               <script>
                  var map;
                  
                  function initMap() {
                  
                    var myLatLng = {lat: -38.483, lng: 146.25};
                  
                    map = new google.maps.Map(document.getElementById('map'), {
                      center: myLatLng,
                      zoom: 10,
                  
                      styles: [
                        { "elementType": "geometry", "stylers": [ { "color": "#f5f5f5" } ] },
                        { "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] },
                        { "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] },
                        { "elementType": "labels.text.stroke", "stylers": [ { "color": "#f5f5f5" } ] },
                        { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [ { "color": "#bdbdbd" } ] },
                        { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#eeeeee" } ] },
                        { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] },
                        { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#e5e5e5" } ] },
                        { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] },
                        { "featureType": "road", "elementType": "geometry", "stylers": [ { "color": "#ffffff" } ] },
                        { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] },
                        { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#dadada" } ] },
                        { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] },
                        { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] },
                        { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "color": "#e5e5e5" } ] },
                        { "featureType": "transit.station", "elementType": "geometry", "stylers": [ { "color": "#eeeeee" } ] },
                        { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#c9c9c9" } ] },
                        { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] }
                      ],
                  
                      scrollwheel: false//set to true to enable mouse scrolling while inside the map area
                    });
                  
                    var marker = new google.maps.Marker({
                      position: myLatLng,
                      map: map,
                      icon: {
                        url: "img/map-marker.png",
                        scaledSize: new google.maps.Size(36, 54)
                      }
                  
                    });
                  
                  }
                  
                  
               </script>
               <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBESxStZOWN9aMvTdR3Nov66v6TXxpRZMM&callback=initMap"
                  async defer></script>
            </div>
        </section>
         <!-- ... end Your Account Personal Information -->

@endsection