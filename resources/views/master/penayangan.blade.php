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
Penayangan
@endsection

@section('modal')
@if(Auth::user()->hakAkses!='guest')
<!-- Modal Tambah Penayangan -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Penayangan </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST" action="{{route('penayangan.store')}}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Nama Penayangan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="fasilitas" class="bmd-label-floating">Penyelenggara</label>
              <select class="form-select" id="penyelenggara" name="penyelenggara" required>
                <option value="" disabled selected>Pilih Penyelenggara</option>
                @foreach($data['penyelenggara'] as $unit)
                <option value="{{$unit->idpenyelenggara}}">{{$unit->nama}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jumlah" class="bmd-label-floating">Tanggal</label>
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="paroki" class="bmd-label-floating">Paroki</label>
            <select class="form-select" id="paroki" name="paroki" required>
              <option value="" disabled selected>Pilih Paroki</option>
              @foreach($data['paroki'] as $unit)
              <option value="{{$unit->idparoki}}">{{$unit->namaParoki}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Deskripsi</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
            <!-- <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea> -->
          </div>
          <div class="form-group">
            <label for="harga" class="bmd-label-floating">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required>
          </div>
          <div class="form-group">
            <label for="harga" class="bmd-label-floating">Embed Link</label>
            <input type="text" class="form-control" id="embedLink" name="embedLink">
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
<!--  End Modal Tambah Penayangan -->

<!-- Modal Edit Penayangan -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Penayangan </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST" action="{{route('penayangan.update',['penayangan'=>'0'])}}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" id="idpenayangan" name="idpenayangan" required>
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Nama Penayangan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="fasilitas" class="bmd-label-floating">Penyelenggara</label>
              <select class="form-select" id="penyelenggara" name="penyelenggara" required>
                <option value="" disabled selected>Pilih Penyelenggara</option>
                @foreach($data['penyelenggara'] as $unit)
                <option value="{{$unit->idpenyelenggara}}">{{$unit->nama}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jumlah" class="bmd-label-floating">Tanggal</label>
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="paroki" class="bmd-label-floating">Paroki</label>
            <select class="form-select" id="paroki" name="paroki" required>
              <option value="" disabled selected>Pilih Paroki</option>
              @foreach($data['paroki'] as $unit)
              <option value="{{$unit->idparoki}}">{{$unit->namaParoki}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Deskripsi</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
            <!-- <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="3"></textarea> -->
          </div>
          <div class="form-group">
            <label for="harga" class="bmd-label-floating">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" required>
          </div>
          <div class="form-group">
            <label for="harga" class="bmd-label-floating">Embed Link</label>
            <input type="text" class="form-control" id="embedLink" name="embedLink">
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
<!--  End Modal Edit Penayangan -->

<!-- Modal Hapus Penayangan -->
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
<!--  end modal Hapus Penayangan -->

@endif
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4">
  @foreach($data['penayangan'] as $key=>$unit)
  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-5">
              <div class="position-relative">
                <div class="blur-shadow-image">
                    <img class="w-100 rounded-3 shadow-lg" src="https://images.pexels.com/photos/208277/pexels-photo-208277.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                </div>
              </div>
            </div>
            <div class="col-lg-7 my-auto">
            <div class="text-left">
                
                <h5 class="font-weight-bolder mb-0">{{$unit->nama}}</h5>
                <div class="text-uppercase text-sm font-weight-bold mb-2">{{$unit->alamat}}</div>
                <div class="text-uppercase text-sm font-weight-bold mb-2">{{Carbon\Carbon::make($unit->tanggal)->translatedFormat('d F Y | h:i')}}</div>
                <div class="text-sm mb-2">{{$unit->keterangan}}</div>
                @if(in_array(Auth::user()->hakAkses,['admin','leadme','penyelenggara']))
                <div class="row">
                  <div class="col-md-4">
                    <a href="{{route('penayangan.detail', ['id'=>$unit->idpenayangan])}}" class="btn btn-primary" 
                      style="width: 100%"><i class="fas fa-eye"></i></a>
                  </div>
                  <div class="col-md-4">
                    <a href="#" class="btn btn-warning" key="{{$key}}" onclick="onEdit(this)"
                      style="width: 100%" data-bs-toggle="modal" data-bs-target="#modalEdit"><i
                        class="fas fa-pencil-alt"></i></a>
                  </div>
                  <div class="col-md-4">
                    <a href="#" class="btn btn-danger" key="{{$key}}" onclick="onDelete(this)"
                      style="width: 100%" data-bs-toggle="modal" data-bs-target="#modalDelete"><i
                        class="far fa-trash-alt"></i></a>
                  </div>
                </div>
                @else
                <a href="{{route('penayangan.detail', ['id'=>$unit->idpenayangan])}}" class="btn btn-primary btn-sm mt-3 w-100" >Lihat Detail</a>
                @endif
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="col">
    <div class="card h-100">
      <div class="card-body" style="display: flex;justify-content: center;align-items: center;">
        <a href="{{route('penayangan.store')}}" class="btn btn-primary btn-lg" data-bs-toggle="modal"
          data-bs-target="#modalTambah">Tambah Penayangan</a>
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
  var myPenayangan = @json($data['penayangan']);

  //ketika klik edit
  function onEdit(self) {
    var key = $(self).attr('key');
    var j = myPenayangan[key];
    
    $modal = $('#modalEdit');

    $modal.find('[name=idpenayangan]').val(j['idpenayangan']).change();
    $modal.find('[name=nama]').val(j['nama']).change();
    $modal.find('[name=tanggal]').val(j['tanggal']).change();
    $modal.find('[name=alamat]').val(j['alamat']).change();
    $modal.find('[name=embedLink]').val(j['embedLink']).change();
    $modal.find('[name=keterangan]').val(j['keterangan']).change();
    $modal.find('[name=paroki]').val(j['paroki']).change().blur();
    $modal.find('[name=penyelenggara]').val(j['penyelenggara']).change().blur();

    // $modal.modal('show');
  }

  //ketika klik delete
  function onDelete(self) {
    var key = $(self).attr('key');
    var j = myPenayangan[key];
    $modal = $('#modalDelete');

    $modal.find('form').attr('action', "{{url('/penayangan')}}/" + j['idpenayangan']);
    // $modal.modal('show');
  }

</script>
@endsection