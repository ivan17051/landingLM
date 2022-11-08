<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/lg4.png">
  <link rel="icon" type="image/png" href="../assets/img/lg4.png">
  <title>
    Masuk | LEAD ME
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{asset('assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0 text-center">
    <section>
      <div class="page-header min-vh-100">
        <div class="container text-center">
         
           
              <div class="card card-plain text-center" >
                <div style="max-width: 500px; margin-right: auto; margin-left: auto;">
                <div class="card-header pb-0 text-start">
                  <a class="" href="{{url('/')}}">
                    <img src="{{asset('assets/img/lg2.png')}}" class="navbar-brand-img h-100" style="max-height:50px;" alt="main_logo">
                    <img src="{{asset('assets/img/lg1.png')}}" class="navbar-brand-img h-100" style="max-height:50px;"alt="main_logo">
                  </a><br><br>
                  <h4 class="font-weight-bolder">Masuk</h4>
                  <p class="mb-0">Silahkan Masukkan E-Mail Dan Password Anda</p>
                </div>
                <div class="card-body">
                  <form role="form" method="POST">
                     @csrf
                    <div class="mb-3">
                      <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    </div>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    <div class="mb-3">
                      <input id="password"  type="password" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Password" aria-label="Password" name="password" required>
                        @if ($errors->has('password'))
                        <label class="error" for="password" style="font-size: 0.8rem;color: #f44336;margin-top: 4px;">{{ $errors->first('password') }}</label>
                        @endif
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Belum Punya Akun ?
                    <a href="{{url('/register')}}" class="text-primary text-gradient font-weight-bold">Klik Disini Untuk Daftar</a>
                  </p>
                  <br><br>
                    <a href="{{url('/')}}" class="btn btn-lg btn-dark btn-lg w-100 mt-4 mb-0">Kembali Ke Halaman Utama</a>
                </div>
              </div>
        
      </div>
     
        </div>
      </div>
    </section>
  </main>

  
  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
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
  <script src="{{asset('assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>






