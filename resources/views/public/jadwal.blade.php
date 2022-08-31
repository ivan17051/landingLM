@extends('layouts.landingLayouts')

@section('content')
  <section class="w3l-features-8">
    <!-- /features --><br><br><br>
    <div class="features py-5" id="features">
      <div class="container py-md-3">

        <div class="heading text-center mx-auto">
          <h3 class="head">Jadwal Penayangan</h3>
          <p class="my-3 head">Lorem Ipsum...</p>
        </div>
        <div>
          <div class="row">
            <div class="card col-lg-12 col-sm-12">
              <div class="card-body " style="margin: 5px;">
                <div class="row">
                  <div class="col-lg-3 col-sm-12">
                    <img style="height: 100%" class="card-img" src="{{asset('public/assets/img/g10.jpg')}}">
                  </div>
                 <div class="col-lg-9 col-sm-12">
                    <img style="width: 50px; margin-top: 5px;" class="card-img" src="{{asset('public/assets/img/lg2.png')}}">
                    <h5 class="card-title">17 November 2022 | 18.00 WIB<br>THE RPD THEATER | OMK RPD</h5>
                    <h6>Halaman Pasturan Paroki Ratu Pencinta Damai Surabaya <br>Jalan Pogot Baru 77-79 Surabaya</h6>
                    <br>
                  <p class="card-text">Suasana Menonton Outdoor Ditemani Cahaya Bintang Dengan Layar Raksasa 50M^2</p>
                  <br>
                  <div class="row" style="margin-left: 0px;">
                      <button style="margin:5px;"class="btn btn-info" type="button" data-toggle="collapse" data-target="#c1" aria-expanded="false" aria-controls="c1">Cek Tiket</button>
                      <a style="margin:5px;"type="button" data-toggle="collapse" data-target="#c2" aria-expanded="false" aria-controls="c2" class="btn btn-dark text-white">Peta Lokasi</a>
                  </div>
                  
                 </div>
                </div>
                
              </div>

              <div class="collapse" id="c1">
                <div class="row" style="margin: 5px;">
                  <div class="col-lg-4 col-md-12 col-sm-12 card card-body" >
                    <div>
                      <h5>TIKET BRONZE</h5><br>
                      <h6>- Tiket Menonton Leadme</h6><br>
                      <h4>Rp.15.000</h4><br>
                      <h6> Jumlah Tiket</h6>
                      <input style="width:80%; margin-bottom: 5px;" type="number" min="0" value="0" name=""> / 50
                      <input style="width:100%;"  type="submit" class="btn btn-success" name="" value="BELI">
                    </div> 
                  </div>
                  <div class="col-lg-4 col-md-12 col-sm-12 card card-body">
                    <div>
                      <h5>TIKET SILVER</h5><br>
                      <h6>- Tiket Menonton Leadme <br>- Snack</h6><br>
                      <h4>Rp.25.000</h4><br>
                      <h6> Jumlah Tiket</h6>
                      <input style="width:80%; margin-bottom: 5px;" type="number" min="0" value="0" name=""> / 0
                      <input style="width:100%" type="submit" class="btn btn-danger" name="" value="HABIS">
                    </div> 
                  </div>
                  <div class="col-lg-4 col-md-12 col-sm-12 card card-body">
                    <div>
                      <h5>TIKET VIP</h5><br>
                      <h6> - Tiket Menonton Leadme <br> - Snack <br> - Meet And Great <br> - Parkir Khusus</h6><br>
                      <h4>Rp.50.000</h4><br>
                      <h6> Jumlah Tiket</h6>
                      <input style="width:80%; margin-bottom: 5px;" type="number" min="0" value="0" name=""> / 10
                      <input style="width:100%" type="submit" class="btn btn-warning" name="" value="BELUM DIJUAL">
                    </div> 
                  </div>
                </div>
                <div style="margin: 5px;">
                	<br>
                	<button style="margin:5px; width: 100%" class="btn btn-info" type="button" data-toggle="collapse" data-target="#c1" aria-expanded="false" aria-controls="c1">Tutup</button>
                </div>
              </div>

             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- //features -->
  </section>

@endsection