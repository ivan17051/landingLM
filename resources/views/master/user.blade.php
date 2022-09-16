@extends('layouts.adminLayouts')
@extends('layouts.sidebar')

@php
$role = Auth::user()->role;
@endphp

@section('title')
Data User
@endsection

@section('masterShow')
show
@endsection

@section('userStatus')
active
@endsection

@section('modal')
<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah User </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST" action="{{route('user.store')}}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Nama <small
                class="text-danger align-text-top">*wajib</small></label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="username" class="bmd-label-floating">Email <small
                class="text-danger align-text-top">*wajib</small></label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label class="bmd-label force-top">Paroki <small class="text-danger align-text-top">*wajib</small></label>
            <select id="paroki" name="paroki" class="selectpicker form-control" required>
              <option disabled selected value="">Pilih Paroki</option>
              @foreach($data['paroki'] as $unit)
              <option value="{{$unit->idParoki}}">{{$unit->namaParoki}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="bmd-label force-top">Penyelenggara <small
                class="text-danger align-text-top">*wajib</small></label>
            <select id="penyelenggara" name="penyelenggara" class="selectpicker form-control" required>
              <option disabled selected value="">Pilih Penyelenggara</option>
              @foreach($data['penyelenggara'] as $unit)
              <option value="{{$unit->idpenyelenggara}}">{{$unit->nama}}</option>
              @endforeach
            </select>
          </div>
          <label class="bmd-label force-top">Hak Akses <small class="text-danger align-text-top">*wajib</small></label>
          <select id="hakAkses" name="hakAkses" class="selectpicker form-control" required>
            <option disabled selected>Pilih Role</option>
            <option value="admin" disabled>Admin</option>
            <option value="penyelenggara">Penyelenggara</option>
            <option value="leadme">LeadMe</option>
            <option value="guest">Guest</option>
          </select>
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
        <h5 class="modal-title">Edit Data User </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST" action="{{route('user.update',['user'=>0])}}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="form-group">
            <label for="nama" class="bmd-label-floating">Nama <small
                class="text-danger align-text-top">*wajib</small></label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <input type="hidden" id="email" name="email">
          <div class="form-group">
            <label for="username" class="bmd-label-floating">Email</label>
            <input type="email" class="form-control" id="email_show" name="email_show" readonly>
          </div>
          <div class="form-group">
            <label class="bmd-label force-top">Paroki <small class="text-danger align-text-top">*wajib</small></label>
            <select id="paroki" name="paroki" class="selectpicker form-control" required>
              <option disabled selected value="">Pilih Paroki</option>
              @foreach($data['paroki'] as $unit)
              <option value="{{$unit->idParoki}}">{{$unit->namaParoki}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="bmd-label force-top">Penyelenggara <small
                class="text-danger align-text-top">*wajib</small></label>
            <select id="penyelenggara" name="penyelenggara" class="selectpicker form-control" required>
              <option disabled selected value="">Pilih Penyelenggara</option>
              @foreach($data['penyelenggara'] as $unit)
              <option value="{{$unit->idpenyelenggara}}">{{$unit->nama}}</option>
              @endforeach
            </select>
          </div>
          <label class="bmd-label force-top">Hak Akses <small class="text-danger align-text-top">*wajib</small></label>
          <select id="hakAkses" name="hakAkses" class="selectpicker form-control" required>
            <option disabled selected>Pilih Role</option>
            <option value="admin" disabled>Admin</option>
            <option value="penyelenggara">Penyelenggara</option>
            <option value="leadme">LeadMe</option>
            <option value="guest">Guest</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm mb-0">Simpan</button>
          <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Tutup</button>
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

      <form class="" method="POST" action="{{route('user.destroy',['user'=>0])}}">
        @method('DELETE')
        @csrf
        <div class="modal-body text-center mt-3">
          <p>Yakin ingin menghapus?</p>
          <br>
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
              data-bs-target="#modalTambah">Tambah User</button>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penyelenggara
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($data['user'] as $key=>$unit)
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$unit->nama}}</h6>
                        <p class="text-xs text-secondary mb-0">{{$unit->email_show}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0">{{isset($unit->paroki) ? $unit->parokiRelation->namaParoki
                      : '-'}}</p>
                    <p class="text-xs text-secondary mb-0">{{isset($unit->penyelenggara) ?
                      $unit->penyelenggaraRelation->nama : '-'}}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">{{$unit->hakAkses}}</span>
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
  var myUsers = @json($data['user']);

  //ketika klik edit
  function onEdit(self) {
    var key = $(self).attr('key');
    var j = myUsers[key];

    $modal = $('#modalEdit');
    console.log(j);

    $modal.find('[name=email]').val(j['email_show']).change();
    $modal.find('[name=email_show]').val(j['email_show']).change();
    $modal.find('[name=nama]').val(j['nama']).change();
    $modal.find('[name=paroki]').val(j['paroki']).change().blur();
    $modal.find('[name=penyelenggara]').val(j['penyelenggara']).change().blur();
    $modal.find('[name=hakAkses]').val(j['hakAkses']).change().blur();

    $modal.find('form').attr('action', "{{url('/user')}}/" + j['id']);
    $modal.modal('show');
  }

  //ketika klik delete
  function onDelete(self) {
    var key = $(self).attr('key');
    var j = myUsers[key];
    $modal = $('#modalDelete');

    // $modal.find('[id=email]').val(j['email_show']).change();
    $modal.find('form').attr('action', "{{url('/user')}}/" + j['email_show']);
    $modal.modal('show');
  }

  $(document).ready(function () {


  });
</script>
@endsection