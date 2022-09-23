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

@section('modal')
<!-- Modal Tambah Tiket -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Tiket </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST" action="{{route('tiket.store')}}">
        @csrf
        <div class="modal-body">
          <input type="hidden" id="penayangan" name="penayangan" value="{{$data['penayangan']->idpenayangan}}">
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Nama Tiket</label>
            <input type="text" class="form-control" id="namaTiket" name="namaTiket" required>
          </div>
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Deskripsi</label>
            <!-- <input type="text" class="form-control" id="deskripsi" name="deskripsi" required> -->
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="3"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="harga" class="bmd-label-floating">Harga</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="harga">Rp</span>
                  <input type="text" class="form-control" id="harga" name="harga" aria-label="Harga" aria-describedby="harga" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jumlah" class="bmd-label-floating">Total Tiket</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="fasilitas" class="bmd-label-floating">Fasilitas</label>
            <select class="form-select" multiple aria-label="multiple select example" id="fasilitas" name="fasilitas" required>
              <option value="" disabled selected>Pilih Fasilitas</option>
              @foreach($data['fasilitas'] as $unit)
              <option value="{{$unit->idfasilitas}}">{{$unit->nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
          <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--  End Modal Tambah -->

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Tiket </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST"
        action="{{route('tiket.update',['idtiket'=>0])}}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" name="idtiket">
          <input type="hidden" id="penayangan" name="penayangan" value="{{$data['penayangan']->idpenayangan}}">
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Nama Tiket</label>
            <input type="text" class="form-control" id="namaTiket" name="namaTiket" required>
          </div>
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Deskripsi</label>
            <!-- <input type="text" class="form-control" id="deskripsi" name="deskripsi" required> -->
            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="3"></textarea>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="harga" class="bmd-label-floating">Harga</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="harga">Rp</span>
                  <input type="text" class="form-control" id="harga" name="harga" aria-label="Harga" aria-describedby="harga" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jumlah" class="bmd-label-floating">Total Tiket</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="fasilitas" class="bmd-label-floating">Fasilitas</label>
            <select class="form-select" multiple aria-label="multiple select example" id="fasilitas" name="fasilitas" required>
              <option value="" disabled selected>Pilih Fasilitas</option>
              @foreach($data['fasilitas'] as $unit)
              <option value="{{$unit->idfasilitas}}">{{$unit->nama}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary mb-0">Simpan</button>
          <button type="button" class="btn btn-secondary mb-0" data-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Edit -->

<!-- Modal Hapus -->
<div class="modal fade modal-mini modal-primary" id="modalDelete" tabindex="-1" role="dialog"
  aria-labelledby="myDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-small modal-dialog-centered">
    <div class="modal-content">
      <form class="" method="POST" action="">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center mt-3">
          <p>Yakin ingin menghapus?</p>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger btn-sm mb-0">Ya, Hapus
            <div class="ripple-container"></div>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--  end modal Hapus -->

<!-- Modal Tambah Promo -->
<div class="modal fade" id="modalTambahPromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Promo </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST" action="{{route('tiket.store')}}">
        @csrf
        <div class="modal-body">
          <input type="hidden" id="penayangan" name="penayangan" value="{{$data['penayangan']->idpenayangan}}">
          <div class="form-group">
            <label for="kodePromo" class="bmd-label-floating">Kode Promo</label>
            <input type="text" class="form-control" id="kodePromo" name="kodePromo" required>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kuota" class="bmd-label-floating">Kuota</label>
                <input type="text" class="form-control" id="kuota" name="kuota" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="potonganPersen" class="bmd-label-floating">Potongan Persen</label>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="potonganPersen" name="potonganPersen" aria-label="Harga" aria-describedby="harga" required>
                  <span class="input-group-text" id="harga">%</span>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="maksimumPotongan" class="bmd-label-floating">Maksimum Potongan</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="maksimumPotongan">Rp</span>
                  <input type="text" class="form-control" id="maksimumPotongan" name="maksimumPotongan" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="bisaDigabung" class="bmd-label-floating">Bisa Digabung</label>
                <select class="form-control" name="bisaDigabung" id="bisaDigabung">
                  <option value="0">Tidak Bisa</option>
                  <option value="1">Bisa</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="minimumQuantity" class="bmd-label-floating">Minimum QTY</label>
                <input type="text" class="form-control" id="minimumQuantity" name="minimumQuantity" required>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="minimumTotal" class="bmd-label-floating">Minimum Total</label>
                <div class="input-group mb-3">
                  <span class="input-group-text" id="minimumTotal">Rp</span>
                  <input type="text" class="form-control" id="minimumTotal" name="minimumTotal" required>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="maksimumPenggunaanUser" class="bmd-label-floating">Maks per User</label>
                <input type="text" class="form-control" id="maksimumPenggunaanUser" name="maksimumPenggunaanUser" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="penanggung" class="bmd-label-floating">Penanggung</label>
                <input type="text" class="form-control" id="penanggung" name="penanggung" required>
              </div>
            </div>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
          <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--  End Modal Tambah -->

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
              <div class="row">
                <div class="col-md-6">
                  <h3>Tiket</h3>
                </div>
                <div class="col-md-6">
                  <button type="button" style="float:right;" class="btn btn-primary" data-bs-toggle="modal"
                      data-bs-target="#modalTambah">Tambah Tiket</button>
                </div>
              </div>
                <div class="row">
                    <div class="col-md-12">
                      @foreach($data['tiket'] as $key=>$unit)
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
                                            <a href="#" class="btn btn-warning btn-sm" key="{{$key}}" onclick="onEdit(this)" style="width: 100%"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="fas fa-pencil-alt me-2"></i>Edit</a>
                                          </div>
                                          <div class="col">
                                            <a href="#" class="btn btn-danger btn-sm" key="{{$key}}" onclick="onDelete(this)" style="width: 100%"><i
                                                class="far fa-trash-alt me-2"></i>Hapus</a>
                                          </div>
                                          <div class="col">
                                            <a href="" class="btn btn-success btn-sm" style="width: 100%">Beli Tiket</a>
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
              <div class="row">
                <div class="col-md-6">
                  <h3>Promo</h3>
                </div>
                <div class="col-md-6">
                  <button type="button" style="float:right;" class="btn btn-primary" data-bs-toggle="modal"
                      data-bs-target="#modalTambahPromo">Tambah Promo</button>
                </div>
              </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4"><h6>Kode Promo</h6>
                                        <h4>PROMOTERUS</h4>
                                        <h6>Diskon 10% Maksimal 20.000. Minimal Transaksi 50.000 <br> Bisa Digabung, 1x per pengguna</h6>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Berlaku Untuk</h6>
                                        <div class="row">
                                            <h6>Tiket Bronze
                                            <br>Penayangan 18 Oktober 2022
                                            <br>Hanya Umat Paroki .....
                                            <br><br>Sumber : OMK Paroki</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                          <div class="row">
                                            <div class="col-md-4 col-sm-4"><h6>Total Kupon</h6><h3>50</h3></div>
                                            <div class="col-md-4 col-sm-4"><h6>Kupon Terpakai</h6><h3>50</h3></div>
                                            <div class="col-md-4 col-sm-4"><h6>Sisa Kupon</h6><h3>50</h3></div>
                                        </div>
                                        <div class="row">
                                            <h6>Total Diskon :</h6>
                                            <h3>Rp. 50.000</h3>
                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <a href="#" class="btn btn-warning btn-sm" key="{{$key}}" onclick="onEdit(this)" style="width: 100%"><i
                                                class="fas fa-pencil-alt me-2"></i>Edit</a>
                                          </div>
                                          <div class="col">
                                            <a href="#" class="btn btn-danger btn-sm" key="{{$key}}" onclick="onDelete(this)" style="width: 100%"><i
                                                class="far fa-trash-alt me-2"></i>Hapus</a>
                                          </div>
                                          <div class="col">
                                            <a href="" class="btn btn-success btn-sm" style="width: 100%">Beli Tiket</a>
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
      
    </div>

    </div>


@endsection

@section('script')
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('public/js/plugins/bootstrap-tagsinput.js')}}"></script>

<script>
  var table;
  var myUsers = @json($data['tiket']);

  //ketika klik edit
  function onEdit(self) {
    var key = $(self).attr('key');
    var j = myUsers[key];

    $modal = $('#modalEdit');
    
    $modal.find('[name=idtiket]').val(j['idtiket']).change();
    $modal.find('[name=namaTiket]').val(j['namaTiket']).change();
    $modal.find('[name=harga]').val(j['harga']).change();
    $modal.find('[name=jumlah]').val(j['jumlah']).change();
    $modal.find('[name=deskripsi]').val(j['deskripsi']).change();

    // $modal.modal('show');
  }

  //ketika klik delete
  function onDelete(self) {
    var key = $(self).attr('key');
    var j = myUsers[key];
    $modal = $('#modalDelete');

    $modal.find('form').attr('action', "{{url('/penyelenggara')}}/" + j['idpenyelenggara']);
    $modal.modal('show');
  }

  $(document).ready(function () {

    // $('#mytable1').DataTable();

  });
</script>
@endsection