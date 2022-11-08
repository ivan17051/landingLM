<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{asset('assets/img/lg4.png')}}">
  <title>Lead Me</title>
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/fonts/icofont/css/icofont.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/style-starter.css?version=$FILE_TIME')}}">
</head>

<body>

  <section class="w3l-bootstrap-header"  >
    <nav class=" navbar navbar-expand-lg navbar-light py-lg-3 py-2 " style="position: fixed;">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/img/lg2.png')}}" style="height:40px;" alt=""></a>
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/img/lg1.png')}}" style="height:35px;margin-left:-20px;" alt=""></a>
        
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
              <a class="nav-link" href="{{url('/#about')}}">Sinopsis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/#jadwal')}}">Jadwal Penayangan</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/#merch')}}">Merchandise</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/#bts')}}">Dibalik Layar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{url('/#cek')}}">Cek Tiket</a>
            </li>

            @auth
            @if(Auth::user()->hakAkses =='guest')
            <li class="nav-item">
              <a class="btn btn-outline-light" href="{{url('/akun')}}">Akun</a>
            </li>
            @else
            <li class="nav-item">
              <a class="btn btn-outline-light" href="{{url('/dashboard')}}">Dashboard</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="btn btn-outline-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
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

  <section>
    @if($errors->any())

    <div class="modal" tabindex="-1" role="dialog" id="errormodal">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <br>
            <h4>{{$errors->first()}}</h4>
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>    
    @endif
  </section>

  @yield('content')

  <!-- grids block 5 -->
  <section class="w3l-footer-29-main" id="footer">
    <div class="footer-29">
      <!-- <div class="grids-forms-1 pb-5">
        <div class="container">
          <div class="grids-forms">
            <div class="main-midd">
              <h4 class="title-head">Newsletter – Get Updates & Latest News</h4>

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

        <div class="row footer-top-29">

          <div class="footer-list-29 footer-1 col-md-6">
            <h6 class="footer-title-29">About LEADME</h6>
            <ul>
              <p>LEADME adalah sebuah project film oleh OMK Kevikepan Surabaya Utara</p>
            </ul>
          </div>

            <div class="main-social-footer-29 footer-2 col-md-5" style="margin-top:0px !important">
              <h6 class="footer-title-29">Media Sosial</h6>
              <div class="row">
               <a href="https://www.instagram.com/leadme_vitara/" class="instagram">
                <span class="fa fa-instagram"></span> </a> <p class="text-white">leadme_vitara</p>
              </div>
              <div class="row">
                <a href="#" class="instagram">
                <span class="fa fa-envelope"></span> </a> <p class="text-white">pdecrew@leadmefilm.com</p>
              </div>
              <div class="row">
                <a href="https://www.tokopedia.com/leadme" class="instagram">
                <span class="fa fa-shopping-bag"></span> </a> <p class="text-white">tokopedia.com/leadme</p>
              </div>
            </div>
         
        </div>
        <div class="bottom-copies text-center">
          <p class="copy-footer-29">©2022 TIM IT LEADME Vitara. All rights reserved | Designed by <a
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
  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
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

  <script src="{{asset('assets/js/owl.carousel.js')}}"></script>

  <!-- script for -->
  <script type="text/javascript">
    $(window).on('load', function() {
        $('#errormodal').modal('show');
    });
</script>

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
  <script src="{{asset('assets/js/smartphoto.js')}}"></script>
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