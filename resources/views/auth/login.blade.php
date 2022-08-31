<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Masuk | LEAD ME
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('public/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('public/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('public/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('public/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <a class="" href="../pages/dashboard.html">
                    <img src="{{asset('public/assets/img/lg2.png')}}" class="navbar-brand-img h-100" style="max-height:50px;" alt="main_logo">
                    <img src="{{asset('public/assets/img/lg1.png')}}" class="navbar-brand-img h-100" style="max-height:50px;"alt="main_logo">
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
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Klik Disini Untuk Daftar</a>
                  </p>
                  <br><br>
                    <button type="button" class="btn btn-lg btn-dark btn-lg w-100 mt-4 mb-0">Kembali Ke Halaman Utama</button>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

    <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <a class="" href="../pages/dashboard.html">
                    <img src="{{asset('public/assets/img/lg2.png')}}" class="navbar-brand-img h-100" style="max-height:50px;" alt="main_logo">
                    <img src="{{asset('public/assets/img/lg1.png')}}" class="navbar-brand-img h-100" style="max-height:50px;"alt="main_logo">
                  </a><br><br>
                  <h4 class="font-weight-bolder">Daftar</h4>
                  <p class="mb-0">Silahkan Masukkan Data Yang Diperlukan Untuk Mendaftar</p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" placeholder="Nama Lengkap" aria-label="Nama Langkap" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" placeholder="Nomor Telepon" aria-label="Nomor Telepon" required>
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" placeholder="Asal Paroki" aria-label="Asal Paroki" required>
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Ulangi Password" required>
                    </div>
                    <div class="text-center">
                      <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Sudah Punya Akun ?
                    <a href="javascript:;" class="text-primary text-gradient font-weight-bold">Klik Disini Untuk Masuk</a>
                  </p>
                  <br><br>
                  <button type="button" class="btn btn-lg btn-dark btn-lg w-100 mt-4 mb-0">Kembali Ke Halaman Utama</button>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!--   Core JS Files   -->
  <script src="{{asset('public/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('public/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('public/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
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
  <script src="{{asset('public/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>






