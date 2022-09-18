@extends('layouts.adminLayouts')
@extends('layouts.sidebar')

@section('title')
Penayangan
@endsection

@section('masterShow')
show
@endsection

@section('penayanganStatus')
active
@endsection

@section('judul')
Detail Penayangan
@endsection

@section('content')

    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
          <h3>{{$data['penayangan']->nama}}</h3>  
          <h3>{{Carbon\Carbon::make($data['penayangan']->tanggal)->translatedFormat('d F Y | h:i')}}</h3>
          <h5>{{$data['penayangan']->alamat}}</h5>
          <p>{{$data['penayangan']->keterangan}}</p>
        </div>
        <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
    </div>
    <!-- end row -->
    <br>
    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
        <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                    <h5 class="font-weight-bolder">
                      $53,000
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                    <h5 class="font-weight-bolder">
                      2,300
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+3%</span>
                      since last week
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                    <h5 class="font-weight-bolder">
                      +3,462
                    </h5>
                    <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                    <h5 class="font-weight-bolder">
                      $103,430
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
    </div></div>
<br>
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3>Tiket</h3><br>
                <div class="row">
                    <div class="col-md-12">
                      @foreach($data['tiket'] as $unit)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4"><h4>{{$unit->namaTiket}}</h4>
                                        <h6>{{$unit->deskripsi}}</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Fasilitas</h6>
                                        <div class="row">
                                            <div class="col">
                                                <p>- Kolam Renang <br>- AC <br>- Tempat Duduk</p>
                                            </div>
                                            <div class="col">
                                                <p>- Snack <br>- Toilet <br>- Proyektor</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                          <div class="row">
                                            <div class="col-md-4 col-sm-4"><h6>Total Tiket</h6><h3>{{$unit->jumlah}}</h3></div>
                                            <div class="col-md-4 col-sm-4"><h6>Terjual</h6><h3>{{$unit->terjual}}</h3></div>
                                            <div class="col-md-4 col-sm-4"><h6>Sisa</h6><h3>{{$unit->jumlah - $unit->terjual}}</h3></div>
                                        </div>
                                        <div class="row">
                                            <h6>Harga :</h6>
                                            <h3>Rp. {{number_format($unit->harga)}}</h3>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                          <a href="" class="btn btn-success" style="width: 100%">Beli Tiket</a>
                                          </div>
                                          <div class="col">
                                          <a href="" class="btn btn-primary" style="width: 100%">Edit</a>
                                          </div>
                                        </div>
                                    </div>
                                  
                                    <!-- <div class="col-md-1 ">
                                        <br>
                                        <a href="" class="btn btn-success" style="width: 100%">Beli Tiket</a>
                                        <a href="" class="btn btn-primary" style="width: 100%">Edit</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
      
    </div>

    </div>

    <br>
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3>Promo</h3><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><h6>Kode Promo</h6>
                                        <h4>PROMOTERUS</h4>
                                        <h6>Diskon 10% Maksimal 20.000. Minimal Transaksi 50.000 <br> Bisa Digabung, 1x per pengguna</h6>
                                    </div>
                                    <div class="col-md-3">
                                        <h6>Berlaku Untuk</h6>
                                        <div class="row">
                                            <h6>Tiket Bronze
                                            <br>Penayangan 18 Oktober 2022
                                            <br>Hanya Umat Paroki .....
                                            <br><br>Sumber : OMK Paroki</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-12">
                                          <div class="row">
                                            <div class="col-md-4 col-sm-4"><h6>Total Kupon</h6><h3>50</h3></div>
                                            <div class="col-md-4 col-sm-4"><h6>Kupon Terpakai</h6><h3>50</h3></div>
                                            <div class="col-md-4 col-sm-4"><h6>Sisa Kupon</h6><h3>50</h3></div>
                                        </div>
                                        <div class="row">
                                            <h6>Total Diskon :</h6>
                                            <h3>Rp. 50.000</h3>
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-1 ">
                                        <br>
                                        <a href="" class="btn btn-primary" style="width: 100%">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
      
    </div>

    </div>


@endsection

@section('script')
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('public/js/plugins/bootstrap-tagsinput.js')}}"></script>

@endsection