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

@section('konfirmasiStatus')
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
              
            </select>
          </div>
          <div class="form-group">
            <label class="bmd-label force-top">Penyelenggara <small
                class="text-danger align-text-top">*wajib</small></label>
            <select id="penyelenggara" name="penyelenggara" class="selectpicker form-control" required>
              <option disabled selected value="">Pilih Penyelenggara</option>
              
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
@endsection

@section('content')
<div class="container-fluid ">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
        </div>
        <div class="card-body px-0 pt-0 pb-2" >
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Order</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Transfer
                  </th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama
                  </th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Transfer
                  </th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status
                  </th>
                   <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($konfirmasi as $key=>$kf)
                <tr>
                  <td><p>   {{$kf->idPesanan}} </p></td>
                  <td> {{date('d M Y',strtotime($kf->tgltf))}} </td>
                  <td> {{$kf->nama}} </td>
                  <td> Rp. {{number_format($kf->jumlah)}} </td>
                  <td> {{$kf->status}} </td>
                  <td><a href="kirimTiket/{{$kf->idPesanan}}"></a><button class="btn btn-primary">Terbitkan Tiket</button></td>
                  
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
@endsection