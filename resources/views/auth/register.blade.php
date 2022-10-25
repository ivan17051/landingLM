<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('public/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('public/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Lead Me | Register</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('public/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
  
</head>

<body class="">
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
        
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <a class="" href="{{url('')}}">
                    <img src="{{asset('public/assets/img/lg2.png')}}" class="navbar-brand-img h-100" style="max-height:50px;" alt="main_logo">
                    <img src="{{asset('public/assets/img/lg1.png')}}" class="navbar-brand-img h-100" style="max-height:50px;"alt="main_logo">
                  </a><br><br>
                  <h4 class="font-weight-bolder">Daftar</h4>
                  <p class="mb-0">Silahkan Masukkan Data Yang Diperlukan Untuk Mendaftar</p>
                </div>
                
                <div class="card-body">
                  <form role="form" method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                      <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" aria-label="Nama Lengkap" value="{{ old('nama') }}" required>               
                    </div>
                     <div class="mb-3">
                      <input type="text" class="form-control" name="nohp" placeholder="Nomor Telepon (Opsional)" aria-label="No Telepon" value="{{ old('nohp') }}" >
                    </div>
                    <div class="mb-3">
                      <select class="form-control" name="paroki" id="paroki" value="{{ old('paroki') }}" required>
                        <option value="" selected disabled>Paroki</option>
                        @foreach($paroki as $unit)
                        <option value="{{$unit->idparoki}}">{{$unit->namaParoki}}</option>
                        @endforeach
                      </select>
                      <!-- <input type="text" class="form-control" placeholder="Asal Paroki" aria-label="Asal Paroki" required> -->
                    </div>
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email" aria-label="Email" value="{{ old('email') }}" required>
                      @error('email')
                      <label class="error" for="password" style="font-size: 0.8rem;color: #f44336;margin-top: 4px;">{{ $message }}</label>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Password" aria-label="Password" required>
                      @error('password')
                      <label class="error" for="password" style="font-size: 0.8rem;color: #f44336;margin-top: 4px;">{{ $message }}</label>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Ulangi Password" aria-label="Ulangi Password" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Daftar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Sudah Punya Akun ?
                    <a href="{{url('/login')}}" class="text-primary text-gradient font-weight-bold">Klik Disini Untuk Masuk</a>
                  </p>
                   <a href="{{url('/')}}" class="btn btn-lg btn-dark btn-lg w-100 mt-4 mb-0">Kembali Ke Halaman Utama</a>
                </div>
              </div>
        
        </div>
      </div>
    </section>
  </main>

</body>

</html>