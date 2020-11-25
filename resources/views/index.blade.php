@extends('layouts.master')
@section('title')
HOMEPAGE
@endsection

{{-- @section('landingpage')
         <div class="header-spacer--standard"></div>
         <div class="content-bg-wrap bg-landing"></div>
         <div class="container">
            <div class="row display-flex">
               <div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                  <div class="landing-content">
                     <h1><strong>Welcome to the new age of freelancing!</strong> Apply for Beta testing now & earn extra badges & benefits at launch!</h1>
                     <p>Alchemunity is built based on the objective of being an ecosystem in the freelancing
                        landscape. Our mission is to build a transparent and trustless freelancing community
                        enabling the extraction of each user’s intrinsic value to better their lives both financially and
                        socially. <br><br>Essentially, we are turning qualitative skillset from every user into quantifiable
                        measurements which form the basis of skill-based cryptocurrencies usable in the
                        community. In order to achieve this goal, we need to create a decentralized trustless rating
                        and reputation system using a distributed ledger technology.
                     </p>
                     <a href="javascript:;" class="btn btn-md btn-border c-white">Apply Now & Test the platform!!</a>
                  </div>
               </div>
               <div class="col col-xl-5 ml-auto col-lg-6 col-md-12 col-sm-12 col-12">
                  <!-- Login-Registration Form  -->
                  <div class="registration-login-form">
                    @include('template_part.login_register_form')
                  </div>
                  <!-- ... end Login-Registration Form  -->
               </div>
            </div>
         </div>
         <img class="img-bottom" src="img/account-bottom.png" alt="friends">
         <img class="img-rocket" src="img/rocket.png" alt="rocket">
@endsection --}}

@section('content')

<!-- new update -->
<div class="main-header main-header-fullwidth main-header-has-header-standard" style="margin-bottom: 0px">
   <div class="header-spacer-small"></div>
   <div class="content-bg-wrap bg-landing"></div>
   <div class="container">
      <div class="row display-flex">
         <div class="col col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
            <div class="landing-content">
               <h1><strong>Welcome to the new age of freelancing!</strong> Apply for Beta testing now & earn extra badges & benefits at launch!</h1>
               <p>Alchemunity is built based on the objective of being an ecosystem in the freelancing
                  landscape. Our mission is to build a transparent and trustless freelancing community
                  enabling the extraction of each user’s intrinsic value to better their lives both financially and
                  socially. <br><br>Essentially, we are turning qualitative skillset from every user into quantifiable
                  measurements which form the basis of skill-based cryptocurrencies usable in the
                  community. In order to achieve this goal, we need to create a decentralized trustless rating
                  and reputation system using a distributed ledger technology.
               </p>
               <a href="javascript:;" class="btn btn-md btn-border c-white">Apply Now & Test the platform!!</a>
            </div>
         </div>
         <div class="col col-xl-5 ml-auto col-lg-6 col-md-12 col-sm-12 col-12">
            <!-- Login-Registration Form  -->
            <div class="registration-login-form">
              @include('template_part.login_register_form')
            </div>
            <!-- ... end Login-Registration Form  -->
         </div>
      </div>
   </div>
   <img class="img-bottom" src="img/account-bottom.png" alt="friends">
   <img class="img-rocket" src="img/rocket.png" alt="rocket">
</div>

<!-- end new update -->
      <!-- Clients Block -->
      <section class="medium-padding120">

         <div class="container">
            <div class="row">
               <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <div class="video-player" style="border-radius: 20px ">
                     <img src="img/vid-HOME.jpg" alt="photo">
                     <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">
                        <svg class="olymp-play-icon">
                           <use xlink:href="svg-icons/sprites/icons.svg#olymp-play-icon"></use>
                        </svg>
                     </a>
                     <div class="video-content">
                        <div class="h4 title">Alchemunity Explained - Part 01</div>
                        <time class="published" datetime="2017-03-24T18:18">12:06</time>
                     </div>
                     <div class="overlay"></div>
                  </div>
               </div>
               <div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading">
                     <h2 class="heading-title">Why Join <span class="c-primary">Alchemunity Freelance Platform</span>?</h2>
                     <p class="heading-text">
                        There is only a handful of freelancing projects incorporating blockchain technology that
                        have emerged to date. It is evident that there is a gap in this ever-increasing market for a
                        project that makes use of blockchain technology to create solutions benefiting all parties. <br></br>
                        This is where Alchemunity fills the gap. With the tremendous growth of cryptocurrencies
                        and dissemination of blockchain technology in recent years, it creates an opportunity for us
                        to build a decentralized trustless freelancing community with a distributed ledge-based
                        solution. This will allow us to address a number of inefficiencies and offer unique
                        advantages over conventional freelance platforms, whose features have remained virtually
                        unchanged over time.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- ... end Clients Block -->
      <!-- Section Img Scale Animation -->
      <section class="align-center pt80 section-move-bg-top img-scale-animation scrollme">
         <div class="container">
            <div class="row">
               <div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
                  <img class="main-img" src="img/scale1.png" alt="screen">
               </div>
            </div>
            <img class="first-img1" alt="img" src="img/scale2.png">
            <img class="second-img1" alt="img" src="img/scale3.png">
            <img class="third-img1" alt="img" src="img/scale4.png">
         </div>
         <div class="content-bg-wrap bg-section1"></div>
      </section>
      <!-- ... end Section Img Scale Animation -->
      <section class="medium-padding120">
         <div class="container">
            <div class="row">
               <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <img src="img/icon-fly.png" alt="screen" width="663">
               </div>
               <div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading">
                     <h2 class="heading-title">Why Join <span class="c-primary">The Alchemunity Network</span>?</h2>
                     <p class="heading-text">Alchemunity is built based on the objective of being an ecosystem in the freelancing landscape. Our mission is to build a transparent and trustless freelancing community enabling the extraction of each user’s intrinsic value to better their lives both financially and socially.
                        <br><br>
                        Essentially, we are turning qualitative skillset from every user into quantifiable measurements which form the basis of skill-based cryptocurrencies usable in the community. In order to achieve this goal, we need to create a decentralized trustless rating and reputation system using a distributed ledger technology. 
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="medium-padding120 " style="background-color: #FCFCFC" >
         <div class="container">
            <div class="row">
               <div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading">
                     <h2 class="heading-title">Meet New Talent <span class="c-primary">from all over the World</span></h2>
                     <p class="heading-text">Alchemunity is built based on the objective of being an ecosystem in the freelancing landscape. Our mission is to build a transparent and trustless freelancing community enabling the extraction of each user’s intrinsic value to better their lives both financially and socially.
                        <br><br>
                        Essentially, we are turning qualitative skillset from every user into quantifiable measurements which form the basis of skill-based cryptocurrencies usable in the community. In order to achieve this goal, we need to create a decentralized trustless rating and reputation system using a distributed ledger technology. 
                     </p>
                  </div>
               </div>
               <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <img src="img/image1.png" alt="screen">
               </div>
            </div>
         </div>
      </section>
      <section class="medium-padding120 ">
         <div class="container">
            <div class="row">
               <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <img src="img/alchemist-level.png" alt="screen">
               </div>
               <div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading">
                     <h2 class="heading-title">Level up <span class="c-primary"> and unlock better opportunities!</span></h2>
                     <p class="heading-text">Alchemunity is built based on the objective of being an ecosystem in the freelancing landscape. Our mission is to build a transparent and trustless freelancing community enabling the extraction of each user’s intrinsic value to better their lives both financially and socially.
                     </p>
                     <ul class="list--styled">
                        <li>
                           <i class="far fa-check-circle" aria-hidden="true"></i>
                           Earn Reputation points with projects, contests, articles & much more to level up!
                        </li>
                        <li>
                           <i class="far fa-check-circle" aria-hidden="true"></i>
                           Unlock access to more lucrative opportunites with higher levels. Prove your the right candididate for the job! 
                        </li>
                        <li>
                           <i class="far fa-check-circle" aria-hidden="true"></i>
                           Points are sent to the blockcahin!
                        </li>
                        <li>
                           <i class="far fa-check-circle" aria-hidden="true"></i>
                           Be a part of the community and earn your way to the top! 
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="medium-padding120" style="background-color: #FCFCFC" >
         <div class="container">
            <div class="row">
               <div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading">
                     <h2 class="heading-title">Earn Tokens  <span class="c-primary">across multiple touchpoints</span></h2>
                     <p class="heading-text">Alchemunity is built based on the objective of being an ecosystem in the freelancing landscape. Our mission is to build a transparent and trustless freelancing community enabling the extraction of each user’s intrinsic value to better their lives both financially and socially.
                        <br><br>
                        Essentially, we are turning qualitative skillset from every user into quantifiable measurements which form the basis of skill-based cryptocurrencies usable in the community. In order to achieve this goal, we need to create a decentralized trustless rating and reputation system using a distributed ledger technology. 
                     </p>
                  </div>
               </div>
               <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <img src="img/icon-fly2.png" alt="screen">
               </div>
            </div>
         </div>
      </section>
      <section class="medium-padding120 bg-section3 background-cover">
         <div class="container">
            <div class="row mb60">
               <div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading align-center">
                     <div class="heading-sup-title">ALCHEMUNITY NETWORK</div>
                     <h2 class="h1 heading-title">Latest News</h2>
                     <p class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="swiper-container pagination-bottom" data-show-items="3">
                  <div class="swiper-wrapper">
                     <div class="ui-block swiper-slide">
                        <!-- Testimonial Item -->
                        <article class="hentry blog-post">
                           <div class="post-thumb">
                              <img src="img/post12.png" alt="photo">
                           </div>
                           <div class="post-content">
                              <a href="javascript:;" class="post-category bg-blue-light">THE COMMUNITY</a>
                              <a href="javascript:;" class="h4 post-title">Why we're a semi-decentralised &amp; not a fully decentralised platform.</a>
                              <p>Find out why we have developed the perfect balance between centralised & decentalised freelancing.</p>
                              <div class="author-date">
                                 by
                                 <a class="h6 post__author-name fn" href="javascript:;">Albert Chiu</a>
                                 <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                    - 7 hours ago
                                    </time>
                                 </div>
                              </div>
                              <div class="post-additional-info inline-items">
                                 <ul class="friends-harmonic">
                                    <li>
                                       <a href="javascript:;">
                                       <img src="img/icon-chat27.png" alt="icon">
                                       </a>
                                    </li>
                                    <li>
                                       <a href="javascript:;">
                                       <img src="img/icon-chat2.png" alt="icon">
                                       </a>
                                    </li>
                                 </ul>
                                 <div class="names-people-likes">
                                    26
                                 </div>
                                 <div class="comments-shared">
                                    <a href="javascript:;" class="post-add-icon inline-items">
                                       <svg class="olymp-speech-balloon-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                       </svg>
                                       <span>0</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </article>
                        <!-- ... end Testimonial Item -->
                     </div>
                     <div class="ui-block swiper-slide">
                        <!-- Testimonial Item -->
                        <article class="hentry blog-post">
                           <div class="post-thumb">
                              <img src="img/post10.png" alt="photo">
                           </div>
                           <div class="post-content">
                              <a href="javascript:;" class="post-category bg-primary">alchemunity NEWS</a>
                              <a href="javascript:;" class="h4 post-title">Development Phase 02 Complete! Become an Aprentice!</a>
                              <p>See our latest developments and launch information. We're discussing what you would like in our next update. </p>
                              <div class="author-date">
                                 by
                                 <a class="h6 post__author-name fn" href="javascript:;">James Rogers</a>
                                 <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                    - 12 hours ago
                                    </time>
                                 </div>
                              </div>
                              <div class="post-additional-info inline-items">
                                 <ul class="friends-harmonic">
                                    <li>
                                       <a href="javascript:;">
                                       <img src="img/icon-chat4.png" alt="icon">
                                       </a>
                                    </li>
                                    <li>
                                       <a href="javascript:;">
                                       <img src="img/icon-chat26.png" alt="icon">
                                       </a>
                                    </li>
                                    <li>
                                       <a href="javascript:;">
                                       <img src="img/icon-chat16.png" alt="icon">
                                       </a>
                                    </li>
                                 </ul>
                                 <div class="names-people-likes">
                                    82
                                 </div>
                                 <div class="comments-shared">
                                    <a href="javascript:;" class="post-add-icon inline-items">
                                       <svg class="olymp-speech-balloon-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                       </svg>
                                       <span>14</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </article>
                        <!-- ... end Testimonial Item -->
                     </div>
                     <div class="ui-block swiper-slide">
                        <!-- Testimonial Item -->
                        <article class="hentry blog-post">
                           <div class="post-thumb">
                              <img src="img/post11.png" alt="photo">
                           </div>
                           <div class="post-content">
                              <a href="javascript:;" class="post-category bg-purple">INSPIRATION</a>
                              <a href="javascript:;" class="h4 post-title">Take a look at these Alchemists truly awesome Work</a>
                              <p>Here’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.</p>
                              <div class="author-date">
                                 by
                                 <a class="h6 post__author-name fn" href="javascript:;">Maddy Simmons</a>
                                 <div class="post__date">
                                    <time class="published" datetime="2017-03-24T18:18">
                                    - 2 days ago
                                    </time>
                                 </div>
                              </div>
                              <div class="post-additional-info inline-items">
                                 <ul class="friends-harmonic">
                                    <li>
                                       <a href="javascript:;">
                                       <img src="img/icon-chat28.png" alt="icon">
                                       </a>
                                    </li>
                                 </ul>
                                 <div class="names-people-likes">
                                    0
                                 </div>
                                 <div class="comments-shared">
                                    <a href="javascript:;" class="post-add-icon inline-items">
                                       <svg class="olymp-speech-balloon-icon">
                                          <use xlink:href="svg-icons/sprites/icons.svg#olymp-speech-balloon-icon"></use>
                                       </svg>
                                       <span>22</span>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </article>
                        <!-- ... end Testimonial Item -->
                     </div>
                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
         </div>
      </section>
      <!-- Planer Animation -->
      <!-- ... end Section Planer Animation -->
      <section class="medium-padding120">
         <div class="container">
            <div class="row">
               <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <img src="img/image4.png" alt="screen">
               </div>
               <div class="col col-xl-5 col-lg-5 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading">
                     <h2 class="h1 heading-title">Release all the Power with the <span class="c-primary">Alchemunity App!</span></h2>
                     <p class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
                  <ul class="list--styled">
                     <li>
                        <i class="far fa-check-circle" aria-hidden="true"></i>
                        Build your profile in just minutes, it’s that simple!
                     </li>
                     <li>
                        <i class="far fa-check-circle" aria-hidden="true"></i>
                        Unlimited messaging with the best interface.
                     </li>
                  </ul>
                  <a href="javascript:;" class="btn btn-market">
                     <img class="icon" src="svg-icons/apple-logotype.svg" alt="app store">
                     <div class="text">
                        <span class="sup-title">AVAILABLE ON THE</span>
                        <span class="title">App Store</span>
                     </div>
                  </a>
                  <a href="javascript:;" class="btn btn-market">
                     <img class="icon" src="svg-icons/google-play.svg" alt="google">
                     <div class="text">
                        <span class="sup-title">ANDROID APP ON</span>
                        <span class="title">Google Play</span>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </section>
      <!-- Section Subscribe Animation -->
      <section class="medium-padding100 subscribe-animation scrollme bg-users">
         <div class="container">
            <div class="row">
               <div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading c-white custom-color">
                     <h2 class="h1 heading-title">Alchemunity Newsletter</h2>
                     <p class="heading-text">Subscribe to be the first one to know about updates, new features and much more!
                     </p>
                  </div>
                  <!-- Subscribe Form  -->
                  <form class="form-inline subscribe-form" method="post">
                     <div class="form-group label-floating is-empty">
                        <label class="control-label">Enter your email</label>
                        <input class="form-control bg-white" placeholder="" type="email">
                     </div>
                     <button class="btn btn-blue btn-lg">Send</button>
                  </form>
                  <!-- ... end Subscribe Form  -->
               </div>
            </div>
            <img src="img/paper-plane.png" alt="plane" class="plane">
         </div>
      </section>
      <!-- ... end Section Subscribe Animation -->
      <section class="medium-padding120 bg-section3 background-cover">
         <div class="container">
            <div class="row mb60">
               <div class="col col-xl-4 col-lg-4 m-auto col-md-12 col-sm-12 col-12">
                  <div class="crumina-module crumina-heading align-center">
                     <div class="heading-sup-title">ALCHEMUNITY NETWORK</div>
                     <h2 class="h1 heading-title">Beta Testing Reviews</h2>
                     <p class="heading-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="swiper-container pagination-bottom" data-show-items="3">
                  <div class="swiper-wrapper">
                     <div class="ui-block swiper-slide">
                        <!-- Testimonial Item -->
                        <div class="crumina-module crumina-testimonial-item">
                           <div class="testimonial-header-thumb"></div>
                           <div class="testimonial-item-content">
                              <div class="author-thumb">
                                 <img src="img/6-92x92-Alchemist-card.png" alt="author">
                              </div>
                              <h3 class="testimonial-title">Amazing Freelance Community</h3>
                              <ul class="rait-stars">
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="far fa-star star-icon"></i>
                                 </li>
                              </ul>
                              <p class="testimonial-message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                 incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                 exercitation ullamco.
                              </p>
                              <div class="author-content">
                                 <a href="javascript:;" class="h6 author-name">Mathilda Brinker</a>
                                 <div class="country">Seeker, Data Analyst</div>
                              </div>
                           </div>
                        </div>
                        <!-- ... end Testimonial Item -->
                     </div>
                     <div class="ui-block swiper-slide">
                        <!-- Testimonial Item -->
                        <div class="crumina-module crumina-testimonial-item">
                           <div class="testimonial-header-thumb"></div>
                           <div class="testimonial-item-content">
                              <div class="author-thumb">
                                 <img src="img/14-92x92-Alchemist-card.png" alt="author">
                              </div>
                              <h3 class="testimonial-title">This is the Best freelancing platform ever!</h3>
                              <ul class="rait-stars">
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                              </ul>
                              <p class="testimonial-message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                 incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                 exercitation ullamco.
                              </p>
                              <div class="author-content">
                                 <a href="javascript:;" class="h6 author-name">Marina Wong</a>
                                 <div class="country">Alchemist, Architect</div>
                              </div>
                           </div>
                        </div>
                        <!-- ... end Testimonial Item -->
                     </div>
                     <div class="ui-block swiper-slide">
                        <!-- Testimonial Item -->
                        <div class="crumina-module crumina-testimonial-item">
                           <div class="testimonial-header-thumb"></div>
                           <div class="testimonial-item-content">
                              <div class="author-thumb">
                                 <img src="img/15-92x92-Alchemist-card.png" alt="author">
                              </div>
                              <h3 class="testimonial-title">Incredible Leveling Up Concept!</h3>
                              <ul class="rait-stars">
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="fa fa-star star-icon"></i>
                                 </li>
                                 <li>
                                    <i class="far fa-star star-icon"></i>
                                 </li>
                              </ul>
                              <p class="testimonial-message">Sed ut perspiciatis unde omnis iste natus error sit
                                 voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                 illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                              </p>
                              <div class="author-content">
                                 <a href="javascript:;" class="h6 author-name">Nicholas Grissom</a>
                                 <div class="country">Seeker, Creative Director</div>
                              </div>
                           </div>
                        </div>
                        <!-- ... end Testimonial Item -->
                     </div>
                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
         </div>
      </section>
      <!-- Section Call To Action Animation -->
      <section class="align-right pt160 pb80 section-move-bg call-to-action-animation scrollme">
         <div class="container">
            <div class="row">
               <div class="col col-xl-10 m-auto col-lg-10 col-md-12 col-sm-12 col-12">
                  <a href="javascript:;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registration-login-form-popup">Start Making Friends Now!</a>
               </div>
            </div>
         </div>
         <img class="first-img" alt="guy" src="img/guy.png">
         <img class="second-img" alt="rocket" src="img/rocket.png">
         <div class="content-bg-wrap bg-section3"></div>
      </section>
@endsection
