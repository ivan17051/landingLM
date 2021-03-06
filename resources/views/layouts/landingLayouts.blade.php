<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{asset('assets/images/lg3.png')}}">
  <title>Lead Me | Home</title>
  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/fonts/icofont/css/icofont.min.css')}}">
  <!-- //web fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style-starter.css?version=$FILE_TIME')}}">
</head>

<body>

  <section class="w3l-bootstrap-header"  >
    <nav class=" navbar navbar-expand-lg navbar-light py-lg-3 py-2 " style="position: fixed;">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/images/lg2.png')}}" style="height:40px;" alt=""></a>
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/images/lg1.png')}}" style="height:35px;margin-left:-20px;" alt=""></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/aboutus')}}">Sinopsis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/lokasi')}}">Jadwal Penayangan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/kontak')}}">Merchandise</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/kontak')}}">Dibalik Layar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/kontak')}}">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/kontak')}}">Akun</a>
            </li>
            @auth
            <li class="nav-item">
              <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
            </li>
            @endauth
          </ul>
          @guest
          <a href="{{url('/login')}}" class="btn btn-outline-light" >Login</a>
          <a href="{{url('/register')}}" class="btn btn-outline-light" style="margin-left:10px;">Register</a>
          @endguest
        </div>
      </div>
    </nav>
  </section>

  @yield('content')

  <!-- grids block 5 -->
  <section class="w3l-footer-29-main" id="footer">
    <div class="footer-29">
      <!-- <div class="grids-forms-1 pb-5">
        <div class="container">
          <div class="grids-forms">
            <div class="main-midd">
              <h4 class="title-head">Newsletter ??? Get Updates & Latest News</h4>

            </div>
            <div class="main-midd-2">
              <form action="#" method="post" class="rightside-form">
                <input type="email" name="email" placeholder="Enter your email">
                <button class="btn" type="submit">Subscribe</button>
              </form>
            </div>
          </div>
        </div>
      </div> -->
      <div class="container pt-5">

        <div class="d-grid grid-col-4 footer-top-29">
          <div class="footer-list-29 footer-1">
            <h6 class="footer-title-29">About Us</h6>
            <ul>
              <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae</p>
            </ul>
            <div class="main-social-footer-29">
              <h6 class="footer-title-29">Media Sosial</h6>
              <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
              <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
              <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
              <a href="#google-plus" class="google-plus"><span class="fa fa-google-plus"></span></a>
              <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
            </div>
          </div>
          <div class="footer-list-29 footer-2">
            <ul>
              <h6 class="footer-title-29">Useful Links</h6>
              <li><a href="contact.html">Privacy Policy</a></li>
              <li><a href="contact.html">Help Desk</a></li>
              <li><a href="services.html">Projects</a></li>
              <li><a href="contact.html">All Users</a></li>
              <li><a href="contact.html">Support</a></li>
            </ul>
          </div>
          <div class="footer-list-29 footer-3">
            <!-- <div class="properties">
              <h6 class="footer-title-29">Recent Projects</h6>
              <a href="#"><img src="assets/images/g2.jpg" class="img-responsive" alt="">
                <p>We Are Leading International Consultiing Agency</p>
              </a>
              <a href="#"><img src="assets/images/g8.jpg" class="img-responsive" alt="">
                <p>Digital Marketing Agency all the foundational tools</p>
              </a>
              <a href="#"><img src="assets/images/g6.jpg" class="img-responsive" alt="">
                <p>Doloremque velit sapien labore eius itna</p>
              </a>
            </div> -->
          </div>
          <div class="footer-list-29 footer-4">
            <ul>
              <h6 class="footer-title-29">Quick Links</h6>
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="services.html">Services</a></li>
              <li><a href="#"> Blog</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="bottom-copies text-center">
          <p class="copy-footer-29">?? 2022 Lead Me Vitara. All rights reserved | Designed by <a
              href="https://w3layouts.com">W3layouts</a></p>

        </div>
      </div>
    </div>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      <span class="fa fa-angle-up"></span>
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction()
      };

      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->
  </section>
  <!-- // grids block 5 -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <!-- //footer-28 block -->
  </section>

  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

  <!-- Smooth scrolling -->

  <script src="assets/js/owl.carousel.js"></script>

  <!-- script for -->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
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
  <script src="assets/js/smartphoto.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const sm = new SmartPhoto(".js-img-viwer", {
        showAnimation: false
      });
      // sm.destroy();
    });
  </script>
</body>

</html>
<!-- // grids block 5 -->