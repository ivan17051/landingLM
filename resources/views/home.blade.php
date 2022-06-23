@extends('layouts.landingLayouts')

@section('content')
  <section class="w3l-main-slider" id="home">
    <!-- main-slider -->
    <div class="companies20-content">

      <div class="owl-one owl-carousel owl-theme">
        <div class="item">
          <li>
            <div class="slider-info banner-view bg bg2" data-selector=".bg.bg2">
              <div class="banner-info">
                <div class="container">
                  <div class="banner-info-bg mr-auto">
                    <h5> We are industry Factory solutions</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum
                      necessitatibus blanditiis porro cum</p>
                    <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="services.html"> Pesan Sekarang</a>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </div>
        <div class="item">
          <li>
            <div class="slider-info  banner-view banner-top1 bg bg2" data-selector=".bg.bg2">
              <div class="banner-info">
                <div class="container">
                  <div class="banner-info-bg mr-auto">
                    <h5>Fast and Reliable Electrical services</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum
                      necessitatibus blanditiis porro cum</p>
                    <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="contact.html"> Contact Us</a>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </div>
        
      </div>
    </div>

    </div>


    <script src="assets/js/owl.carousel.js"></script>
    <!-- script for -->
    <script>
      $(document).ready(function () {
        $('.owl-one').owlCarousel({
          loop: true,
          margin: 0,
          nav: false,
          responsiveClass: true,
          autoplay: false,
          autoplayTimeout: 5000,
          autoplaySpeed: 1000,
          autoplayHoverPause: false,
          responsive: {
            0: {
              items: 1,
              nav: false
            },
            480: {
              items: 1,
              nav: false
            },
            667: {
              items: 1,
              nav: true
            },
            1000: {
              items: 1,
              nav: true
            }
          }
        })
      })
    </script>
    <!-- //script -->
    <!-- /main-slider -->
  </section>
  <section class="w3l-features-1">
    <!-- /features -->
    <div class="features py-5">
      <div class="container">

        <div class="fea-gd-vv row ">
          <div class="col-lg-3 col-sm-6">
            <div class="float-lt feature-gd">
              <div class="icon"> <span class="fa fa-microchip" aria-hidden="true"></span></div>
              <div class="icon-info">
                <h5>Best engineering</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 mt-sm-0 mt-4">
            <div class="float-mid feature-gd">
              <div class="icon"> <span class="fa fa-flask" aria-hidden="true"></span></div>
              <div class="icon-info">
                <h5>Chemical research</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
            <div class="float-rt feature-gd">
              <div class="icon"> <span class="fa fa-fire" aria-hidden="true"></span></div>
              <div class="icon-info">
                <h5>Rapid delivery</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur </p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 mt-lg-0 mt-4">
            <div class="float-lt feature-gd">
              <div class="icon"> <span class="fa fa-cog" aria-hidden="true"></span></div>
              <div class="icon-info">
                <h5>Call center</h5>
                <p class="mt-2">Lorem ipsum dolor sit amet, consectetur </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //features -->
  </section>
  <!--  About section -->
  <div class="w3l-about1 py-5" id="about">
    <div class="container py-lg-3">

      <div class="aboutgrids row">
        <div class="col-lg-6 aboutgrid2">
          <img src="assets/images/index-1.jpg" alt="about image" class="img-fluid" />
        </div>
        <div class="col-lg-6 aboutgrid1 mt-lg-0 mt-4 pl-lg-5">
          <h4>How we can help you?</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum necessitatibus
            blanditiis porro cum, facere qui impedit dolor doloribus quis reiciendis ullam repellendus.Lorem ipsum dolor
            sit amet consectetur adipisicing elit. Quae, velit recusandae eum </p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum necessitatibus
            blanditiis porro cum, facere qui impedit dolor doloribus quis reiciendis ullam repellendus.</p>

          <a class="btn btn-secondary btn-theme2" href="about.html"> About Us</a>
        </div>
      </div>
    </div>
  </div>
  <!--  //About section -->
  <section class="w3l-services2" id="stats">
    <div class="features-with-17_sur py-5">
      <div class="container py-md-3">

        <div class="row pt-lg-5 mt-lg-3">
          <div class="col-lg-4 features-with-17-left_sur">
            <h4 class="lft-head">We're thriving and building better products</h4>
            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla mollis
              dapibus nunc, ut rhoncus turpis sodales quis.</p>
          </div>
          <div class="col-lg-8 my-lg-0 my-5 align-self-center features-with-17-right_sur">
            <div class="features-with-17-right-tp_sur text-center">
              <div class="features-with-17-left1">
                <span class="fa fa-user s4"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>1100</h6>
                <p>HAPPY CLIENT</p>
              </div>
            </div>
            <div class="features-with-17-right-tp_sur text-center">
              <div class="features-with-17-left1">
                <span class="fa fa-handshake-o s5"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>1208</h6>
                <p>WORKERS HAND</p>
              </div>
            </div>
            <div class="features-with-17-right-tp_sur text-center">
              <div class="features-with-17-left1">
                <span class="fa fa-lock s3"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>1250</h6>
                <p>ACTIVE EXPERTS</p>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="w3l-features-8">
    <!-- /features -->
    <div class="features py-5" id="features">
      <div class="container py-md-3">

        <div class="heading text-center mx-auto">
          <h3 class="head">Industries Served</h3>
          <p class="my-3 head"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
            Nulla mollis dapibus nunc, ut rhoncus
            turpis sodales quis. Integer sit amet mattis quam.</p>

        </div>
        <div class="fea-gd-vv text-center row mt-5 pt-3">

          <div class="col-lg-4 col-md-6">
            <div class="float-top">
              <a href="services.html"><img src="assets/images/g1.jpg" class="img-responsive" alt=""></a>
              <div class="float-lt feature-gd">
                <h3><a href="services.html">Metallurgical Engineering</a> </h3>
                <p> Consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et.dolor sit amet </p>
                <a class="btn btn-secondary btn-theme4 mt-4" href="services.html"> More Details</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-md-0 mt-5">
            <div class="float-top">
              <a href="services.html"><img src="assets/images/g2.jpg" class="img-responsive" alt=""></a>
              <div class="float-lt feature-gd">
                <h3><a href="services.html">Metal Working Tools</a> </h3>
                <p> Consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et.dolor sit amet </p>
                <a class="btn btn-secondary btn-theme4 mt-4" href="services.html"> More Details</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-lg-0 mt-5">
            <div class="float-top-1 text-left pl-4 pr-4 py-5">
              <h4 class="">Jobs</h4>
              <p class="mt-2"> Consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et.dolor sit amet
              </p>
              <div class="top-right mt-4 pt-2">
                <div class="icon-left pt-1">
                  <span class="fa fa-arrow-right"></span>
                </div>
                <div class="icon-text-left">
                  <h3 class=""><a href="services.html">Metal Working Tools</a> </h3>
                  <p class="mt-2"> Consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et.dolor sit
                    amet </p>
                </div>
              </div>
              <div class="top-right mt-3">
                <div class="icon-left pt-1">
                  <span class="fa fa-arrow-right"></span>
                </div>
                <div class="icon-text-left">
                  <h3 class=""><a href="services.html">Metal Working Tools</a> </h3>
                  <p class="mt-2"> Consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et.dolor sit
                    amet </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="float-top">
              <a href="services.html"><img src="assets/images/g3.jpg" class="img-responsive" alt=""></a>
              <div class="float-lt feature-gd">
                <h3><a href="services.html">Grinding & Lapping</a> </h3>
                <p> Consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et.dolor sit amet </p>
                <a class="btn btn-secondary btn-theme4 mt-4" href="services.html"> More Details</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="float-top">
              <a href="services.html"><img src="assets/images/g7.jpg" class="img-responsive" alt=""></a>
              <div class="float-lt feature-gd">
                <h3><a href="services.html">Precision Metal Cutting</a> </h3>
                <p> Consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et.dolor sit amet </p>
                <a class="btn btn-secondary btn-theme4 mt-4" href="services.html"> More Details</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="float-top">
              <a href="services.html"><img src="assets/images/g6.jpg" class="img-responsive" alt=""></a>
              <div class="float-lt feature-gd">
                <h3><a href="services.html">Automotive Industry Line</a> </h3>
                <p> Consectetur adipisicingelit, sed do eiusmod tempor incididunt ut labore et.dolor sit amet </p>
                <a class="btn btn-secondary btn-theme4 mt-4" href="services.html"> More Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //features -->
  </section>
  <!-- customers4 block -->
  <section class="w3l-customers-4" id="testimonials">
    <div id="customers4-block" class="py-5">
      <div class="container py-md-3">


        <div id="customerhnyCarousel" class="carousel slide" data-ride="carousel">

          <ol class="carousel-indicators">
            <li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#customerhnyCarousel" data-slide-to="1"></li>
            <li data-target="#customerhnyCarousel" data-slide-to="2"></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner pb-5 mb-md-5 pt-md-5">

            <div class="carousel-item active">
              <div class="section-title">
                <div class="item-top">
                  <div class="item text-center">
                    <div class="imgTitle">
                      <img src="assets/images/c1.jpg" class="img-responsive" alt="" />
                    </div>
                    <h6 class="mt-3">Steve Smith</h6>
                    <p class="">Client</p>
                    <h5>" Magna aliqua. Ut enim ad minim veniam, quis nostrud.Lorem ipsum dolor " </h5>

                  </div>
                </div>
              </div>
            </div>
            <!--.item-->

            <div class="carousel-item">
              <div class="section-title">
                <div class="item-top">
                  <div class="item text-center">
                    <div class="imgTitle">
                      <img src="assets/images/c2.jpg" class="img-responsive" alt="" />
                    </div>
                    <h6 class="mt-3">Jessey Rider</h6>
                    <p class="">Worker</p>
                    <h5>" Magna aliqua. Ut enim ad minim veniam, quis nostrud.Lorem ipsum dolor " </h5>

                  </div>
                </div>
              </div>

            </div>
            <!--.item-->
            <div class="carousel-item">
              <div class="section-title">
                <div class="item-top">
                  <div class="item text-center">
                    <div class="imgTitle">
                      <img src="assets/images/c3.jpg" class="img-responsive" alt="" />
                    </div>
                    <h6 class="mt-3">Mark Stoins</h6>
                    <p class="">Engineer</p>
                    <h5>" Magna aliqua. Ut enim ad minim veniam, quis nostrud.Lorem ipsum dolor " </h5>

                  </div>
                </div>
              </div>
            </div>
            <!--.item-->

          </div>
          <!--.carousel-inner-->
        </div>




      </div>
    </div>


  </section>
  <!-- homepage blog grids -->
  <section class="news-1" id="blog">
    <div class="news py-5">
      <div class="container py-md-3">
        <div class="heading text-center mx-auto">
          <h3 class="head">Latest News & Events</h3>
          <p class="my-3 head"> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
            Nulla mollis dapibus nunc, ut rhoncus
            turpis sodales quis. Integer sit amet mattis quam.</p>

        </div>
        <div class="blog-grids row mt-5">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/g10.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="blog-info">
                <h3><a href="#">Seven Outrageous Ideas Industry</a> </h3>
                <p> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                  Nulla mollis dapibus nunc</p>
                <ul>
                  <li><a href="#author"><span class="fa fa-user-o mr-2"></span>Johnson smith</a></li>
                  <li><a href="#author"><span class="fa fa-calendar mr-2"></span>Jan 16, 2020</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 mt-md-0 mt-4">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/g9.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="blog-info">
                <h3><a href="#">Seven Doubts You Should Clarify About</a> </h3>
                <p> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                  Nulla mollis dapibus nunc</p>
                <ul>
                  <li><a href="#author"><span class="fa fa-user-o mr-2"></span>Alexander</a></li>
                  <li><a href="#author"><span class="fa fa-calendar mr-2"></span>Jan 16, 2020</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12 mt-lg-0 mt-4">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/g8.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="blog-info">
                <h3><a href="#">Why You Should Not Go To Industry</a> </h3>
                <p> Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                  Nulla mollis dapibus nunc</p>
                <ul>
                  <li><a href="#author"><span class="fa fa-user-o mr-2"></span>Elizabeth ker</a></li>
                  <li><a href="#author"><span class="fa fa-calendar mr-2"></span>Jan 16, 2020</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- //homepage blog grids -->
@endsection