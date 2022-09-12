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
            <h4 class="modal-title">Tambah User </h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
            </button>
        </div>
        <form class="form-horizontal input-margin-additional" method="POST" action="{{route('user.store')}}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="nama" class="bmd-label-floating">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="username" class="bmd-label-floating">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <label class="bmd-label force-top mt-1">Paroki User </label>
            <select id="idParoki" name="idParoki" class="selectpicker form-control" data-size="7" data-style="btn btn-primary btn-round" title="Pilih Paroki">
                <option disabled selected value="">Pilih Paroki</option>
                @foreach($data['paroki'] as $unit) 
                <option value="{{$unit->idParoki}}">{{$unit->namaParoki}}</option>
                @endforeach
            </select>
            <label class="bmd-label force-top mt-3">Role User <small class="text-danger align-text-top">*wajib</small></label>
            <select id="role" name="role" class="selectpicker form-control" data-size="7" data-style="btn btn-primary btn-round" title="Pilih Role">
                <option disabled selected>Pilih Role</option>
                <option>Penyelenggara</option>
                <option>LeadMe</option>
                <option>Guest</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-link text-primary">Simpan</button>
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Tutup</button>
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
            <h4 class="modal-title">Edit Data User </h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
            </button>
        </div>
        <form class="form-horizontal input-margin-additional" method="POST" action="{{route('user.store')}}">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <input type="hidden" name="id">
            <div class="form-group">
                <label for="nama" class="bmd-label-floating">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="username" class="bmd-label-floating">Email</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <label class="bmd-label force-top mt-1">Role User <small class="text-danger align-text-top">*wajib</small></label>
            <select id="role" name="role" class="selectpicker form-control" data-size="7" data-style="btn btn-primary btn-round" title="Pilih Role">
                <option disabled selected>Pilih Role</option>
                <option>Penyelenggara</option>
                <option>LeadMe</option>
                <option>Guest</option>
            </select>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-link text-primary">Simpan</button>
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Tutup</button>
        </div>
        </form>
        </div>
    </div>
</div>
<!-- End Modal Edit -->

<!-- Modal Hapus -->
<div class="modal fade modal-mini modal-primary" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
        </div>
        <form class="" method="POST" action="">
            @method('DELETE')
            @csrf
        <div class="modal-body text-center">
            <p>Yakin ingin menghapus?</p>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger btn-link">Ya, Hapus
                <div class="ripple-container"></div>
            </button>
        </div>
        </form>
        </div>
    </div>
</div>
<!--  end modal Hapus -->
<!-- Modal Validasi -->
<div class="modal fade modal-mini modal-primary" id="modalValidasi" tabindex="-1" role="dialog" aria-labelledby="myDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
        </div>
        <div class="modal-body text-center">
            <p id="peringatanValidasi"></p>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-warning btn-link" onclick="$('#formValidasi').trigger('submit')">Ya
                <div class="ripple-container"></div>
            </button>
        </div>
        <form id="formValidasi" method="POST" action=""></form>
        </div>
    </div>
</div>
<!--  end modal Validasi -->
@endsection

@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
            <div class="toolbar text-right row">
                <button type="button" style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah User</button>
            </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penyelenggara</th>
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
                            <p class="text-xs text-secondary mb-0">{{$unit->email}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{isset($unit->paroki) ? $unit->parokiRelation->namaParoki : '-'}}</p>
                        <p class="text-xs text-secondary mb-0">{{isset($unit->penyelenggara) ? $unit->penyelenggaraRelation->nama : '-'}}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{$unit->hakAkses}}</span>
                      </td>
                      <td class="align-right">
                        <!-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a> -->
                        <a href="#" class="btn btn-warning btn-sm px-3 mb-0" key="{{$key}}" onclick="onEdit(this)"><i class="fas fa-pencil-alt me-2"></i>Edit</a>
                        <a href="#" class="btn btn-danger btn-sm px-3 mb-0" key="{{$key}}" onclick="onDelete(this)"><i class="far fa-trash-alt me-2"></i>Hapus</a>
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
    
    $modal=$('#modalEdit');
    
    $modal.find('[name=id]').val(j['id']).change();
    $modal.find('[name=email]').val(j['email']).change();
    $modal.find('[name=nama]').val(j['nama']).change();
    $modal.find('[name=role]').val(j['role']).change().blur();
    
    $modal.find('form').attr('action', "{{url('/user')}}/"+j['id']);
    $modal.modal('show');
} 

//ketika klik delete
function onDelete(self) {
    var key = $(self).attr('key');
    var j = myUsers[key];
    $modal=$('#modalDelete');

    $modal.find('form').attr('action', "{{url('/user')}}/"+j['id']);
    $modal.modal('show');
} 

$(document).ready(function() {
    my.initFormExtendedDatetimepickers();
    if ($('.slider').length != 0) {
        md.initSliders();
    }

    table = $('#datatables').DataTable({
        responsive:{
            details: false
        },
        columnDefs: [
            {   
                class: "details-control",
                orderable: false,
                targets: 0
            }
        ]
    });

} );
</script>
@endsection