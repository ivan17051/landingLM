@extends('layouts.landingLayouts')

@section('content')
<?php use App\Http\Controllers\LandingController; ?>

<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Pembayaran dapat dilakukan melalui transfer ke <b>BCA 3631574503 an Stefani Desianti P </b></h5>
        <h6>Mohon menyertakan kode unik untuk mempermudah verifikasi</h6>
        <h6>Verifikasi manual memerlukan waktu maksimal 24 Jam</h6>
        <h6>Terima Kasih</h6>
        <br>
        <h6></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <div class="w3l-about1 py-5" id="about">
    <div class="container py-lg-3"> 
      <div class="aboutgrids row">

        <div class="col-lg-12 aboutgrid2">
        
          <h1 style="margin-top:50px;">Detail Pesanan</h1>
          <div class="card"  style="margin-top:10px;">
            <div class="card-body ">
            <h3>Pemesan</h3>
            <h5>{{$users->nama}}</h5>
            <h6>{{$users->email}} | {{$users->noTelp}}</h6>
            <h6>Paroki {{$users->parokis[0]->namaParoki}}</h6>
          </div>
          </div>

          <div class="card"  style="margin-top:10px;">
            <div class="card-body ">
            <div class="row">
              <div class="col-8">
                <h3>Pesanan</h3>
                <h3>{{$idtransaksi}}</h3>
              </div>
              <div class="col-4">
                <h3>
                  @if($tr->status=='BELUM DIBAYAR')
                  <h5 class="text-warning">Menunggu Pembayaran</h5>
                  <h6>Batas Pembayaran : {{date("d-m-Y H:i:s", strtotime($tr->batasBayar))}}</h6>
                  @else($tr->status =='SUDAH DIBAYAR')
                   <h5 class="text-success">Pembayaran Berhasil</h5>
                   <h6>Pembayaran : {{date("d-m-Y H:i:s", strtotime($tr->waktuBayar))}}</h6>
                  @endif
                </h3>
              </div>
            </div>
            
            <br>
            <table class="table table-bordered">
              <tr>
                <td>
                  <h4>{{$tiket->namaTiket}}</h4>
                  <h5>{{$tiket->penayangan[0]->nama}}</h5>
                  <h5>{{date("l j F Y H:i",strtotime($tiket->penayangan[0]->tanggal))}}</h5>
                  <h5>{{$tiket->penayangan[0]->deskripsi}}</h5>
                    <h5>{{$tiket->dibeli.' X Rp. '.number_format($tiket->harga)}}</h5>
                </td>
                <td><h5>Rp. {{number_format($tiket->dibeli * $tiket->harga)}}</h5></td>
              </tr>
              <tr><td><h5>Donasi Untuk Tim LEADME</h5></td><td><h5>Rp. {{number_format($donasi)}}</h5></td></tr>
              <tr><td><h5>Diskon</h5></td><td><h5>- Rp. 0</h5></td></tr>
              <tr><td><h5>Kode Unik</h5></td><td><h5>Rp. {{number_format($tr->kodeUnik)}}</h5></td></tr>
              <tr><td><h4>Total</h4></td><td><h4>Rp. {{number_format($tr->total)}}</h4></td></tr>
            </table>
            <br>
            <button data-toggle="modal" data-target="#bayar" class="btn btn-success" style="min-height:50px; width: 100%; margin-bottom:5px;">Bayar Pesanan (Transfer Manual)</button>
            <button data-toggle="modal" class="btn btn-primary" disabled style="min-height:50px; width: 100%;">Bayar Pesanan (Pengecekan Otomatis) - Coming Soon</button>
            <a href="{{url('akun')}}"><button class="btn btn-primary" style="min-height:50px; width: 100%; margin-top: 5px;">Kembali Ke Halaman Akun</button></a>
          </div>
          </div>
         
          </div>
        </div>

      </div>

    </div>
  </div>
  
  <script type="text/javascript">
    var harga = parseInt({{($tiket->dibeli * $tiket->harga)}});

     function set0()
     {
        if($('#donasi').val()<0){$('#donasi').val(0);}
        if($('#donasi').val()>0)
        {
          $('#total').text();
          $('#total').text(addCommas(parseInt(harga)+parseInt($('#donasi').val())));
          $('#total2').val(parseInt(harga)+parseInt($('#donasi').val()));
          $('#donasi2').val($('#donasi').val());

        }
     }

    function addCommas(nStr)
    {
      nStr += '';
      x = nStr.split('.');
      x1 = x[0];
      x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
          x1 = x1.replace(rgx, '$1' + ',' + '$2');
      }
      return x1 + x2;
    }

   </script> 

  
@endsection