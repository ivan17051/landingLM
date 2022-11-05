@extends('layouts.adminLayouts')
@extends('layouts.sidebar')

@section('title')
Pembelian Tiket
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

@section('style')
@endsection

@section('modal')
<!-- Modal Pembayaran -->
<div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ringkasan Belanja </h5>
      </div>
      <form class="form-horizontal input-margin-additional" method="POST" action="{{route('tiket.store')}}">
        @csrf
        <div class="modal-body">
          <input type="hidden" id="penayangan_submit" name="penayangan_submit">
          <input type="hidden" id="harga_submit" name="harga_submit">
          <input type="hidden" id="nama_submit" name="nama_submit">
          <input type="hidden" id="email_submit" name="email_submit">
          <input type="hidden" id="nohp_submit" name="nohp_submit">
          <table>
            <tbody>
              <tr>
                <td class="text-right" style="font-weight: bold;">Total</td>
                <td class="text-right" style="font-weight: bold;">Rp</td>
                <td id="ringkasanTotal" style="font-weight: bold;"><td>
              </tr>
            </tbody>
          </table>
            
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm mb-0">Pilih Pembayaran</button>
          <button type="button" class="btn btn-secondary btn-sm mb-0" data-bs-dismiss="modal">Tutup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--  End Modal Pembayaran-->

@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4" style="min-height:70vh;">
  
  <div class="col-md-7">
    <div class="card h-100">
      <div class="card-body">
        <iframe class="w-100" src="{{$tiket->penayanganRelation->embedLink}}" style="border:0;height:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="card h-100">
      <div class="card-body">
        <div class="text-left">
          <h5 class="font-weight-bolder mb-0">Tiket {{$tiket->namaTiket}}</h5>
          <div class="text-uppercase text-sm font-weight-bold mt-2">{{$tiket->penayanganRelation->nama}}</div>
          <div class="text-uppercase text-sm font-weight-bold mb-2">{{$tiket->penayanganRelation->alamat}}</div>
          <div class="text-uppercase text-sm font-weight-bold mb-2">{{Carbon\Carbon::make($tiket->penayanganRelation->tanggal)->translatedFormat('d F Y | h:i')}}</div>
          <div class="text-sm mb-2">{{$tiket->deskripsi}}</div>
        </div>
        <div class="form-group mb-4 mt-4">
          <div class="row">
          <label for="kodePromo" class="bmd-label-floating">Atur Jumlah</label>
          <div class="col-md-6">
            
            <div class="input-group mb-3">
              <button class="btn btn-success mb-0" type="button" id="buttonMin" onclick="editQty('-')">-</button>
              <input type="text" class="form-control text-center" id="qty" value=1 disabled>
              <button class="btn btn-success mb-0" type="button" id="buttonAdd" onclick="editQty('+')">+</button>
            </div>
          </div>
          <div class="col md-6">
            <span>Sisa Stok: {{$tiket->jumlah - $tiket->terjual}} Tiket</span>
          </div>
          </div>
          
        </div>
        <div id="alert" class="alert alert-warning fade show" role="alert" hidden>
          <span id="alertmsg" class="alert-text" style="font-size:14px;color:white;"></span>
        </div>
        <div class="form-group">
          <label for="kodePromo" class="bmd-label-floating">Punya Kode Promo?</label>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Kode Promo" id="kodepromo">
            <button class="btn btn-success mb-0" type="button" onclick="usePromo(1)">Gunakan</button>
          </div>
          <table class="mt-3 w-100">
            <tbody>
              <tr>
                <td class="text-right" style="width:60%;font-size:14px;">Subtotal</td>
                <td class="text-right" style="font-size:14px;">Rp</td>
                <td id="subtotal" style="font-size:15px;">{{$tiket->harga}}</td>
              </tr>
              <tr>
                <td class="text-right" style="font-size:14px;">Potongan</td>
                <td class="text-right" style="font-size:14px;">Rp</td>
                <td id="potongan" style="font-size:15px;">0</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="text-right" style="font-weight: bold;">Total</td>
                <td class="text-right" style="font-weight: bold;">Rp</td>
                <td id="total" style="font-weight: bold;">{{$tiket->harga}}</td>
              </tr>
            </tbody>
          </table>
          
          
        </div>
        <button class="btn btn-primary w-100 mb-0" onclick="onBayar(this)" data-bs-toggle="modal" data-bs-target="#modalBayar">Lanjut</button>
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
  var myPenayangan = @json($tiket);
  
  var subtotal = document.getElementById("subtotal");
  var potongan = document.getElementById("potongan");
  var total = document.getElementById("total");
  var harga = myPenayangan['harga'];
  var diskon = 0;
  var hargaTotal = myPenayangan['harga'];
  var qty = 0;
  
  function editQty(tanda){
    var val = $('#qty').val();
    var max = myPenayangan['jumlah'] - myPenayangan['terjual'];
    harga = myPenayangan['harga'];

    val = parseInt(val);
    if(tanda == '-' && val > 0) {
      val = val - 1;
      harga = harga * val;
      usePromo();
      hargaTotal = harga-diskon;
      subtotal.innerHTML = harga;
    }
    else if(tanda == '+' && val < max) {
      val = val + 1;
      harga = harga * val;
      usePromo();
      hargaTotal = harga-diskon;
      subtotal.innerHTML = harga;
    }
    qty = val;
    document.getElementById("total").innerHTML = hargaTotal;
    $('#qty').val(val).change();
    hideAlert();
  }

  function usePromo(cek){
    // cek = flag jika tombol gunakan diklik
    var promo = document.getElementById('kodepromo').value;
    var tiket = myPenayangan['idtiket'];
    var paroki = '{{Auth::user()->paroki}}'
    // Jika kode promo tdk kosong
    if(promo.length != 0){
    $.get('../getPromo/'+promo+'ti'+tiket+'pa'+paroki, function(data, status){
      if(data != 0){
        // Cek sdh memenuhi total minimum
        if(harga > data.minimumTotal && qty >= data.minimumQuantity){
          diskon = data.potonganPersen*harga/100;
          hideAlert();
        }else{
          diskon = 0;
          if(cek==1)showAlert('Harga Subtotal atau Jumlah Tiket belum Terpenuhi');
        }
        // Cek diskon melebihi batas
        if(diskon > data.maksimumPotongan) diskon = data.maksimumPotongan;
        hargaTotal = harga-diskon;
        potongan.innerHTML = diskon;
        document.getElementById("total").innerHTML = hargaTotal;
      }else{
        diskon = 0;
        hargaTotal = harga-diskon;
        potongan.innerHTML = diskon;
        document.getElementById("total").innerHTML = hargaTotal;
        if(cek==1)showAlert('Kode Promo tidak Valid atau Sudah tidak Bisa Digunakan');
      }
    });
    }else{
      diskon = 0;
      hargaTotal = harga-diskon;
      potongan.innerHTML = diskon;
      document.getElementById("total").innerHTML = hargaTotal;
      if(cek==1)showAlert('Isi Form Kode Promo');
    }
  }

  function showAlert(msg){
    // alert(msg);
    var alert = $('#alert');
    var alertContainer = document.getElementById('alertmsg');
    alertContainer.innerHTML = msg;
    alert.attr('hidden', false);
  }

  function hideAlert(){
    var alert = $('#alert');
    alert.attr('hidden', true);
  }

  //ketika klik pembayaran
  function onBayar(self) {
    $modal = $('#modalBayar');
    var user = @json(Auth::user());
    
    $modal.find('[name=harga_submit]').val(hargaTotal).change();
    document.getElementById("ringkasanTotal").innerHTML = hargaTotal;
    $modal.find('[name=penayangan_submit]').val(myPenayangan['penayangan']).change();
    
    $modal.find('[name=nama_submit]').val(user['nama']).change();
    $modal.find('[name=email_submit]').val(user['email']).change();
    $modal.find('[name=nohp_submit]').val(user['noTelp']).change();
    $modal.find('form').attr('action', "{{route('get.token')}}");
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
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.js/1.9.3/snap.min.js" integrity="sha512-zTZogmNZ+Skq82/bQn/xBLkG9vtx28kh3FbLjW3sbhXy9Q9wiBXlgndpQm3X8Z9UFmFbyNRx1QkvU7lUzlXumQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection