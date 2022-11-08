

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/img/lg4.png')}}">
    <link rel="icon" type="image/png" href="{{asset('public/img/lg4.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Lead Me | @yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta content="{{ csrf_token() }}"  name="csrf-token">
   
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('public/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('public/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('public/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />

    <!-- DateTimePicker Tempus Dominus -->
    <!-- <link rel="stylesheet" href="{{asset('public/vendor/datetimepicker-tempus-dominus/css/tempus-dominus.min.css')}}"> -->    

    <link href="{{asset('public/css/custom.css')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  @include('layouts.sidebar')
  @yield('modal')
  @stack('modal2')

  <div id="modal-bottom-bound"></div> <!-- batas bawah section modal -->
  <div id="loading">
    <span><progress class="pure-material-progress-circular"/></span>
  </div>
  <div class="wrapper ">
    @yield('sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">@yield('title')</a>
            <form class="navbar-form" hidden>
            </form>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Profil
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profil</a>
                  <a class="dropdown-item" href="#">Pengaturan</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
                  <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
          @yield('content')
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <!-- <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul> -->
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by Lead Me Vitara.
            <!-- <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web. -->
          </div>
        </div>
      </footer>
    </div>
  </div>
  <template id="modal-template">
    <div class="modal modal-custom-1 fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-link" data-dismiss="modal">TUTUP</button>
            </div>
            </div>
        </div>
    </div>
  </template>
  
 <!--   Core JS Files   -->
 <script src="../assets/js/core/popper.min.js"></script>
 <script src="../assets/js/core/bootstrap.min.js"></script>
 <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
 <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
 <script src="../assets/js/plugins/chartjs.min.js"></script>
 <script>
   var ctx1 = document.getElementById("chart-line").getContext("2d");

   var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

   gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
   gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
   gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
   new Chart(ctx1, {
     type: "line",
     data: {
       labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
       datasets: [{
         label: "Mobile apps",
         tension: 0.4,
         borderWidth: 0,
         pointRadius: 0,
         borderColor: "#5e72e4",
         backgroundColor: gradientStroke1,
         borderWidth: 3,
         fill: true,
         data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
         maxBarThickness: 6

       }],
     },
     options: {
       responsive: true,
       maintainAspectRatio: false,
       plugins: {
         legend: {
           display: false,
         }
       },
       interaction: {
         intersect: false,
         mode: 'index',
       },
       scales: {
         y: {
           grid: {
             drawBorder: false,
             display: true,
             drawOnChartArea: true,
             drawTicks: false,
             borderDash: [5, 5]
           },
           ticks: {
             display: true,
             padding: 10,
             color: '#fbfbfb',
             font: {
               size: 11,
               family: "Open Sans",
               style: 'normal',
               lineHeight: 2
             },
           }
         },
         x: {
           grid: {
             drawBorder: false,
             display: false,
             drawOnChartArea: false,
             drawTicks: false,
             borderDash: [5, 5]
           },
           ticks: {
             display: true,
             color: '#ccc',
             padding: 20,
             font: {
               size: 11,
               family: "Open Sans",
               style: 'normal',
               lineHeight: 2
             },
           }
         },
       },
     },
   });
 </script>
 <script>
   var win = navigator.platform.indexOf('Win') > -1;
   if (win && document.querySelector('#sidenav-scrollbar')) {
     var options = {
       damping: '0.5'
     }
     Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
   }
 </script>
 <!-- Github buttons -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

  <script src="{{asset('public/js/custom.js')}}" type="text/javascript"></script>
  
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

      md.initVectorMap();

      //input rupiah
      $('.rupiah-input').blur(my.inputToRupiah);
    });
  </script>

  <!-- Script untuk notifikasi -->
  <script>
    @if (session()->exists('alert'))
    $(document).ready(function(){
        notification = @json(session()->pull("alert"));
        md.showNotification(notification.icon, notification.status, notification.message);
        @php
        session()->forget('alert'); 
        @endphp
    });
    @endif
  </script>
  @yield('script')
  @stack('script2')
  <script>
    var LOADING;
    $(function() {
      LOADING = $('#loading');
      setTimeout(() => {
        LOADING.hide();
      }, 300);
    })
  </script>
</body>

</html>