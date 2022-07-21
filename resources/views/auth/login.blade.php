<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('public/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Lead Me | Login</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('public/assets/css/material-dashboard.css?v=2.2.2')}}" rel="stylesheet" />
  
</head>

<body class="off-canvas-sidebar">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/images/lg2.png')}}" style="height:40px;" alt=""></a>
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/images/lg1.png')}}" style="height:35px;margin-left:-20px;" alt=""></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
            <a href="../dashboard.html" class="nav-link">
              <i class="material-icons">dashboard</i>
              Dashboard
            </a>
          </li> -->
          <li class="nav-item ">
            <a href="{{url('/register')}}" class="nav-link">
              <i class="material-icons">person_add</i>
              Daftar
            </a>
          </li>
          <li class="nav-item  active ">
            <a href="{{url('/login')}}" class="nav-link">
              <i class="material-icons">fingerprint</i>
              Login
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a href="../pages/lock.html" class="nav-link">
              <i class="material-icons">lock_open</i>
              Lock
            </a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('https://images.pexels.com/photos/3062541/pexels-photo-3062541.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); background-size: cover; background-position: bottom center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form method="POST" action="">
              @csrf
              <div class="card card-login card-hidden">
                <div class="card-header card-header-info text-center">
                  <h4 class="card-title">Login</h4>
                  <div class="social-line">
                    <!-- <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                      <i class="fa fa-google-plus"></i>
                    </a> -->
                  </div>
                </div>
                <div class="card-body ">
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">mail_outline</i>
                        </span>
                      </div>
                      <div style="flex:1;">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email..." autofocus>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>
                  </span>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <div style="flex:1;">
                        <input id="password" type="password" class="form-control" placeholder="Password..." name="password" required>
                        @if ($errors->has('password'))
                        <label class="error" for="password" style="font-size: 0.8rem;color: #f44336;margin-top: 4px;">{{ $errors->first('password') }}</label>
                        @endif
                      </div>
                    </div>
                  </span>
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-info btn-link btn-lg">LOGIN</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <!-- <nav class="float-left">
            <ul>
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
            </ul>
          </nav> -->
          <div class="copyright">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by Lead Me Film.
            <!-- <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web. -->
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('public/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('public/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('public/assets/js/core/bootstrap-material-design.min.js')}}"></script>
  <script src="{{asset('public/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('public/assets/js/material-dashboard.js?v=2.2.2')}}" type="text/javascript"></script>
  
  <script>
    $(document).ready(function() {
      md.checkFullPageBackgroundImage();
      setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
      }, 700);
    });
  </script>
</body>

</html>