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
        <div class="row text-center" style="margin-left: 100px; margin-right: 100px;">
          <div class="col-1"> <h5 class="text-center text-white">Sponsor LeadMe</h5></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
          <div class="col-1"><img style="width: 100%;" src="{{asset('assets/images/lg1.png')}}"></div>
        </div>
        
    </div>
    <!-- //features -->
  </section>
  
  <div class="w3l-about1 py-5" id="about">
    <div class="container py-lg-3">

      <div class="aboutgrids row">
        <div class="col-lg-6 aboutgrid2">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/vfsAk9avjK8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 aboutgrid1 mt-lg-0 mt-4 pl-lg-5">
          <h4>About LeadMe</h4>
          <h6>Durasi : 180 Menit</h6>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum necessitatibus
            blanditiis porro cum, facere qui impedit dolor doloribus quis reiciendis ullam repellendus.Lorem ipsum dolor
            sit amet consectetur adipisicing elit. Quae, velit recusandae eum </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, velit recusandae eum necessitatibus
            blanditiis porro cum, facere qui impedit dolor doloribus quis reiciendis ullam repellendus.Lorem ipsum dolor
            sit amet consectetur adipisicing elit. Quae, velit recusandae eum </p>
          <table>
            <!-- logo OMK 7 Paroki Link Ke ig masing2 + 1 logo vitara  -->
            <tr><td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/images/lg2.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/images/lg2.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/images/lg2.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/images/lg2.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/images/lg2.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/images/lg2.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/images/lg2.png')}}"></td>
           <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/images/lg2.png')}}"></td></tr>
          </table>

        </div>
      </div>
    </div>
  </div>
  
  <section class="w3l-services2" id="stats">
    <div class="features-with-17_sur py-5">
      <div class="container py-md-3">

         <div class="row  text-center ">
            <h4 class="text-center  lft-head">LeadMe Dalam Angka</h4>
          </div>
        <div class="row pt-lg-5 mt-lg-3">
         
            <div class="col-lg-3 col-md-6 features-with-17-right-tp_sur text-center">
              <div class="features-with-17-left1">
                <span class="fa fa-user s4"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>80</h6>
                <h5 class="text-white">Crew Dan Cast</h5>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 features-with-17-right-tp_sur text-center" >
              <div class="features-with-17-left1">
                <span class="fa fa-film s5"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>134</h6>
                <h5 class="text-white">Penayangan</h5>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 features-with-17-right-tp_sur text-center" >
              <div class="features-with-17-left1">
                <span class="fa fa-users s3"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>10000</h6>
                <h5 class="text-white">Orang Telah<br>Menonton LeadMe</h5>
              </div>
            </div>
             <div class="col-lg-3 col-md-6 features-with-17-right-tp_sur text-center">
              <div class="features-with-17-left1">
                <span class="fa fa-lock s3"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>10000</h6>
                <h5 class="text-white">Penonton</h5>
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
          <h3 class="head">Jadwal Penayangan</h3>
          <p class="my-3 head">Lorem Ipsum...</p>
        </div>
        <div>
          //search bar
          <input type="text" name="">
        </div>
        <div>
          <div class="row">
              <h4>Minggu 10 Oktober 2023</h4>
          </div><br>
          <div class="row">
            <div class="card col-lg-12 col-sm-12">
              <div class="card-body ">
                <div class="row">
                  <div class="col-lg-3 col-sm-12">
                    <img style="height: 100%" class="card-img" src="{{asset('assets/images/g10.jpg')}}">
                  </div>
                 <div class="col-lg-9 col-sm-12">
                    <img style="width: 50px; margin-top: 5px;" class="card-img" src="{{asset('assets/images/lg2.png')}}">
                    <h5 class="card-title">THE RPD THEATER | OMK RPD</h5>
                    <h6>Halaman Pasturan Paroki Ratu Pencinta Damai Surabaya <br>Jalan Pogot Baru 77-79 Surabaya</h6>
                    <br>
                  <p class="card-text">Suasana Menonton Outdoor Ditemani Cahaya Bintang Dengan Layar Raksasa 50M^2</p>
                  <br>
                  <div class="row" style="margin-left: 0px;">
                      <button style="margin:5px;"class="btn btn-info" type="button" data-toggle="collapse" data-target="#c1" aria-expanded="false" aria-controls="c1">Cek Tiket</button>
                      <a style="margin:5px;"type="button" data-toggle="collapse" data-target="#c2" aria-expanded="false" aria-controls="c2" class="btn btn-dark">Peta Lokasi</a>
                  </div>
                  
                 </div>
                </div>
                
              </div>

              <div class="collapse" id="c1">
                <div class="row" style="margin: 5px;">
                  <div class="col-lg-3 col-md-12 col-sm-12 card card-body" >
                    <div>
                      <h5>Minggu 1 Oktober 2023</h5>
                      <h5>TIKET BRONZE</h5><br>
                      <h6>- Tiket Menonton Leadme</h6><br>
                      <h4>Rp.15.000</h4><br>
                      <h6> Jumlah Tiket</h6>
                      <input style="width:80%; margin-bottom: 5px;" type="number" min="0" value="0" name=""> / 50
                      <input style="width:100%;"  type="submit" class="btn btn-success" name="" value="BELI">
                    </div> 
                  </div>
                  <div class="col-lg-3 col-md-12 col-sm-12 card card-body">
                    <div>
                      <h5>Minggu 1 Oktober 2023</h5>
                      <h5>TIKET SILVER</h5><br>
                      <h6>- Tiket Menonton Leadme <br>- Snack</h6><br>
                      <h4>Rp.25.000</h4><br>
                      <h6> Jumlah Tiket</h6>
                      <input style="width:80%; margin-bottom: 5px;" type="number" min="0" value="0" name=""> / 0
                      <input style="width:100%" type="submit" class="btn btn-danger" name="" value="HABIS">
                    </div> 
                  </div>
                  <div class="col-lg-3 col-md-12 col-sm-12 card card-body">
                    <div>
                      <h5>Minggu 1 Oktober 2023</h5>
                      <h5>TIKET VIP</h5><br>
                      <h6> - Tiket Menonton Leadme <br> - Snack <br> - Meet And Great <br> - Parkir Khusus</h6><br>
                      <h4>Rp.50.000</h4><br>
                      <h6> Jumlah Tiket</h6>
                      <input style="width:80%; margin-bottom: 5px;" type="number" min="0" value="0" name=""> / 10
                      <input style="width:100%" type="submit" class="btn btn-warning" name="" value="BELUM DIJUAL">
                    </div> 
                  </div>
                </div>
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
                    <p class="">Romo Paroki St Marinus Yohanes Surabaya</p>
                    <h5>"Film Leadme Sangat Menarik Jangan Lupa Ditonton" </h5>

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
                    <p class="">OMK Paroki Yesus Diangkat Ke Surga Madura</p>
                    <h5>"Jangan Lupa Saksikan Penampilanku Di Leadme Season 2" </h5>

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

  <section class="news-1" id="blog">
    <div class="news py-5">
      <div class="container py-md-3">
        <div class="heading text-center mx-auto">
          <h3 class="head">LeadMe Merchandise</h3>
        </div>
          <br>
        <div class="text-center">  
         <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style="padding: 20px; width: 100%;">Dapatkan Di Tokopedia</button></a>
         <div class="blog-grids row ">

          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Kaos Leadme Desain 1</a> </h3>
                <p>Rp. 90.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>
          
            <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Kaos Leadme Desain 2</a> </h3>
                <p>Rp. 90.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>
          
            <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Gantungan Kunci LeadMe</a> </h3>
                <p>Rp. 10.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>
       
        </div>
        </div>
      </div>
    </div>
  </section>
        
  <section class="news-1" id="blog">
    <div class="news py-5">
      <div class="container py-md-3">
        <div class="heading text-center mx-auto">
          <h3 class="head">Crew And Cast</h3>
          <p class="my-3 head">Leadme Crew And Cast</p>

        </div>
        <h4 class="head text-center">Cast</h4>
        <div class="blog-grids row ">

          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Nama Asli</a> </h3>
                <p>Dera</p>
              </div>
            </div>
          </div>
           <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Nama Asli</a> </h3>
                <p>Sebagai Apa</p>
              </div>
            </div>
          </div>
           <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Nama Asli</a> </h3>
                <p>Sebagai Apa</p>
              </div>
            </div>
          </div>
       
        </div>

        <h4 class="head text-center">Director</h4>
        <div class="blog-grids row ">

          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Nama Asli</a> </h3>
                <p>Director Of Photography</p>
              </div>
            </div>
          </div>
           <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Nama Asli</a> </h3>
                <p>Art Director</p>
              </div>
            </div>
          </div>
           <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="assets/images/t5.jpg" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Nama Asli</a> </h3>
                <p>Sebagai Apa</p>
              </div>
            </div>
          </div>
       
        </div>

      </div>
    </div>
  </section>

@endsection