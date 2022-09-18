@extends('layouts.adminLayouts')
@extends('layouts.sidebar')

@section('title')
Data Penyelenggara
@endsection

@section('masterShow')
show
@endsection

@section('penyelenggaraStatus')
active
@endsection

@section('modal')
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Penyelenggara </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST" action="{{route('penyelenggara.store')}}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Nama Penyelenggara</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="namaContactPerson" class="bmd-label-floating">Nama Contact Person</label>
            <input type="text" class="form-control" id="namaContactPerson" name="namaContactPerson" required>
          </div>
          <div class="form-group">
            <label for="noTelpContactPerson" class="bmd-label-floating">No Telp Contact Person</label>
            <input type="text" class="form-control" id="noTelpContactPerson" name="noTelpContactPerson" required>
          </div>
          <div class="form-group">
            <label for="hpptiket" class="bmd-label-floating">HPP Tiket</label>
            <input type="text" class="form-control" id="hpptiket" name="hpptiket" required>
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
        <h5 class="modal-title">Edit Data Penyelenggara </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST"
        action="{{route('penyelenggara.update',['penyelenggara'=>0])}}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="hidden" name="idpenyelenggara">
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Nama Penyelenggara</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="namaContactPerson" class="bmd-label-floating">Nama Contact Person</label>
            <input type="text" class="form-control" id="namaContactPerson" name="namaContactPerson" required>
          </div>
          <div class="form-group">
            <label for="noTelpContactPerson" class="bmd-label-floating">No Telp Contact Person</label>
            <input type="text" class="form-control" id="noTelpContactPerson" name="noTelpContactPerson" required>
          </div>
          <div class="form-group">
            <label for="hpptiket" class="bmd-label-floating">HPP Tiket</label>
            <input type="text" class="form-control" id="hpptiket" name="hpptiket" required>
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
@endsection

@section('content')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="toolbar text-right row">
            <button type="button" style="float:right;" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#modalTambah">Tambah Penyelenggara</button>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table id="mytable1" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contact Person
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Saldo
                    Penyelenggara</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($penyelenggara as $key=>$unit)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$unit->nama}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{$unit->namaContactPerson}}</p>
                    <p class="text-xs text-secondary mb-0">{{$unit->noTelpContactPerson}}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">Rp
                      {{number_format($unit->saldoPenyelenggara)}}</span>
                    <!-- <p class="text-xs text-secondary mb-0"></p> -->
                  </td>
                  <td class="text-right">
                    <!-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a> -->
                    <a href="#" class="btn btn-warning btn-sm px-3 mb-0" key="{{$key}}" onclick="onEdit(this)"><i
                        class="fas fa-pencil-alt me-2"></i>Edit</a>
                    <a href="#" class="btn btn-danger btn-sm px-3 mb-0" key="{{$key}}" onclick="onDelete(this)"><i
                        class="far fa-trash-alt me-2"></i>Hapus</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
  var myUsers = @json($penyelenggara);

  //ketika klik edit
  function onEdit(self) {
    var key = $(self).attr('key');
    var j = myUsers[key];

    $modal = $('#modalEdit');

    $modal.find('[name=idpenyelenggara]').val(j['idpenyelenggara']).change();
    $modal.find('[name=nama]').val(j['nama']).change();
    $modal.find('[name=namaContactPerson]').val(j['namaContactPerson']).change();
    $modal.find('[name=noTelpContactPerson]').val(j['noTelpContactPerson']).change();
    $modal.find('[name=hpptiket]').val(j['hpptiket']).change();

    $modal.find('form').attr('action', "{{url('/penyelenggara')}}/" + j['idpenyelenggara']);
    $modal.modal('show');
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