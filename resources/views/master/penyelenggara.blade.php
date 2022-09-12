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
            <h4 class="modal-title">Tambah Paroki </h4>
        </div>
        <form class="form-horizontal input-margin-additional" method="POST" action="{{route('paroki.store')}}">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="nama" class="bmd-label-floating">Nama Paroki</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="kevikepan" class="bmd-label-floating">Kevikepan</label>
                <input type="text" class="form-control" id="kevikepan" name="kevikepan" required>
            </div>
             <div class="form-group">
                <label for="keuskupan" class="bmd-label-floating">Keuskupan</label>
                <input type="text" class="form-control" id="keuskupan" name="keuskupan" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
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
            <h4 class="modal-title">Edit Data Paroki </h4>
        </div>
        <form class="form-horizontal input-margin-additional" method="POST" action="{{route('paroki.store')}}">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <input type="hidden" name="id">
            <div class="form-group">
                <label for="nama" class="bmd-label-floating">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="kevikepan" class="bmd-label-floating">Kevikepan</label>
                <input type="text" class="form-control" id="kevikepan" name="kevikepan" required>
            </div>
            <div class="form-group">
                <label for="keuskupan" class="bmd-label-floating">Keuskupan</label>
                <input type="text" class="form-control" id="keuskupan" name="keuskupan" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
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
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger">Ya, Hapus
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
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-warning" onclick="$('#formValidasi').trigger('submit')">Ya
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

    <div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <div class="toolbar text-right row">
                <button type="button" style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Paroki</button>
            </div>
            
            <div class="material-datatables table-responsive row">
            <table id="mytable1" class="datatable table table-striped table-no-bordered table-hover table-wrap" cellspacing="0" width="100%" style="width:100%">
                <thead>
                <tr>
                    <th hidden>id</th>
                    <th data-priority="1">Nama</th>
                    <th data-priority="2">Contact Person</th>
                    <th data-priority="2">Saldo</th>
                    <th data-priority="2" class="disabled-sorting"></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Contact Person</th>
                    <th>Saldo</th>
                    <th class="disabled-sorting"></th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($penyelenggara as $key=>$unit)
                <tr>
                    <td hidden>{{$unit->idpenyelenggara}}</td>
                    <td class="text-wrap" style="min-width: 300px;">{{$unit->nama}}</td>
                    <td>{{$unit->namaContactPerson}} ({{$unit->noTelpContactPerson}})</td>
                    <td>{{$unit->saldoPenyelenggara}}</td>
                    <td class="text-right text-wrap">
                        <a href="#" class="btn btn-warning btn-sm px-3 mb-0" key="{{$key}}" onclick="onEdit(this)"><i class="fas fa-pencil-alt me-2"></i>Edit</a>
                        <a href="#" class="btn btn-danger btn-sm px-3 mb-0" key="{{$key}}" onclick="onDelete(this)"><i class="far fa-trash-alt me-2"></i>Hapus</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
    </div>
    <!-- end row -->


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
    
    $modal=$('#modalEdit');
    
    $modal.find('[name=id]').val(j['idparoki']).change();
    $modal.find('[name=kevikepan]').val(j['kevikepan']).change();
    $modal.find('[name=keuskupan]').val(j['keuskupan']).change();
    $modal.find('[name=nama]').val(j['namaParoki']).change();
    
    $modal.find('form').attr('action', "{{url('/paroki')}}/"+j['id']);
    $modal.modal('show');
} 

//ketika klik delete
function onDelete(self) {
    var key = $(self).attr('key');
    var j = myUsers[key];
    $modal=$('#modalDelete');

    $modal.find('form').attr('action', "{{url('/paroki')}}/"+j['idParoki']);
    $modal.modal('show');
} 

$(document).ready(function() {
    
    $('#mytable1').DataTable();
    
} );
</script>
@endsection