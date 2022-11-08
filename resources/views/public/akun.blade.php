@extends('layouts.landingLayouts')

@section('content')
<?php use App\Http\Controllers\LandingController; ?>
@if(1==2)
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <h6>Nomor Pemesanan</h6>
        <h3 id="ido1">ERROR</h3>
        <h6>Jumlah Pembayaran</h6>
        <h3 id="jp1">ERROR</h3>
        <h5>Pembayaran dapat dilakukan melalui transfer ke <br><b>BCA 3631574503 an Stefani Desianti P </b></h5>
        <h6>Mohon menyertakan kode unik untuk mempermudah verifikasi. Terima Kasih</h6>
        <br>
        <form method="post" action="{{url('verifikasi')}}">
          @csrf
          <input type="hidden" name="idorder" id="ido2">
          <h6>Tanggal Transfer</h6>
          <input type="date" name="tgl" required style="width:100%;">
          <h6 style="margin-top: 10px;">Nama Pemilik Rekening</h6>
          <input type="text" name="nama" required style="width:100%;">
          <h6 style="margin-top: 10px;">Jumlah Transfer</h6>
          <input type="number" name="jumlah" required style="width:100%; ">
          <input type="submit" class="btn btn-success" name="sub" value="KONFIRMASI" style="width:100%; margin-top: 5px;">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endif
  <div class="w3l-about1 py-5" id="about">
    <div class="container py-lg-3"> 
      <div class="aboutgrids row">

        <div class="col-lg-12 aboutgrid2">
        
          <h1 style="margin-top:50px;">Akun Saya</h1>
          <div class="card"  style="margin-top:10px;">
            <div class="card-body ">
            <h3>Akun</h3>
            <h5>{{$users->nama}}</h5>
            <h6>{{$users->email}} | {{$users->noTelp}}</h6>
            <h6>Paroki {{$users->parokis[0]->namaParoki}}</h6>
          </div>
          </div>

<h1 style="margin-top:20px; margin-bottom: 10px;">Tiket Saya</h1>

@foreach ($penayangan2 as $p)
    <div class="card"  style="margin-top:10px;">
      <div class="card-body ">
        <h5>{{date('d M Y H:i',strtotime($p->tanggal))}}</h5>
        <h5>{{$p->nama}}</h5>
        <h6>Paroki {{$p->parokis[0]->namaParoki}}</h6>
        <h6>{{$p->alamat}}</h6>
        <a target="blank" href="{{$p->embedLink}}"><button class="btn btn-success" style="margin-top:5px; margin-bottom: 5px;">Lokasi (Google Maps) </button></a>
        <br>
        <div id="accordion{{$p->idpenayangan}}"> 

@foreach($p->tiket as $t)
          <div class="card">
            <div class="card-header" id="heading{{$t->idtiketFinal}}">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$t->idtiketFinal}}" aria-expanded="false" aria-controls="collapse{{$t->idtiketFinal}}">
                        <h5>Tiket {{$t->tiketOnline.' | '.$t->tiketOffline}}</h5>
                </button>
              </h5>
            </div>

            <div id="collapse{{$t->idtiketFinal}}" class="collapse" aria-labelledby="heading{{$t->idtiketFinal}}" data-parent="#accordion{{$p->idpenayangan}}">
              <div class="card-body text-center">
                {!! QrCode::size(250)->generate('https://leadmefilm.com/cektiket/'.$t->qrCode) !!}
                  <h6 style="margin-top:5px;">Nomor E-Tiket</h6>
                  <h5>{{$t->tiketOnline}}</h5>
                  <h6 style="margin-top:5px;">Nomor Tiket Fisik</h6>
                  <h5>@if($t->tiketOffline != '') {{$t->tiketOffline}} ({{$t->warna}}) @else - @endif</h5>
                  <h6 style="margin-top:5px;">Status Tiket</h6>
                  <h5>@if($t->tanggalKehadiran != '') Tiket Telah Digunakan Pada {{date('d M Y H:i:s', strtotime($t->tanggalKehadiran))}} @else Tiket Belum Digunakan @endif</h5>
                  <a href="{{url('cetakTiket/'.$t->idtiketFinal)}}" target="blank" class="btn btn-success" style="margin-top: 5px;">Download Tiket</a>
              </div>
            </div>
          </div>
@endforeach
        </div>

      </div>
    </div>
    
@endforeach

<h1 style="margin-top:20px; margin-bottom: 10px;">Verifikasi Pembayaran</h1>
<div class="card"  style="margin-top:10px;">
<div class="card-body ">
<div id="accordion3">
@foreach ($verifikasi as $v)
  <div class="card">
    <div class="card-header" id="headingv{{$v->idver}}">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsev{{$v->idver}}" aria-expanded="false" aria-controls="collapsev{{$v->idver}}">
                 <h5>{{date('d M Y',strtotime($v->tgl))}}</h5>
        </button>
      </h5>
    </div>

    <div id="collapsev{{$v->idver}}" class="collapse" aria-labelledby="headingv{{$v->idver}}" data-parent="#accordion3">
      <div class="card-body">
        <h5>Tanggal Transfer : {{date('d M Y',strtotime($v->tgltf))}}</h5>
        <h5>Nama Pengirim : {{$v->nama}}</h5>
        <h5>Jumlah Tranfer : {{'Rp. '.number_format($v->jumlah)}}</h5>
      </div>
    </div>
  </div>
@endforeach
</div>
</div></div>

<h1 id="myps" style="margin-top:20px; margin-bottom: 10px;">Pesanan Saya</h1>
 <div class="card"  style="margin-top:10px;">
      <div class="card-body ">
<div id="accordion2">
@foreach ($pesanan as $key => $p)
  <div class="card">
    <div class="card-header" id="tr1{{$p->idtransaksi}}">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#tr{{$p->idtransaksi}}" aria-expanded="false" aria-controls="collapse{{$p->idtransaksi}}">
                  @if($p->status=='BELUM DIBAYAR')
                  <h5 class="text-warning">{{$p->idtransaksi}} |  Menunggu Pembayaran</h5>
                  @elseif($p->status =='SUDAH DIBAYAR')
                   <h5 class="text-success">{{$p->idtransaksi}} |  Pembayaran Berhasil </h5>
                   @else($p->status =='BATAL')
                   <h5 class="text-danger">{{$p->idtransaksi}} |  Transaksi Dibatalkan</h5> 
                  @endif
        </button>
      </h5>
    </div>

    <div id="tr{{$p->idtransaksi}}" class="collapse @if($key==0)show @endif" aria-labelledby="tr1{{$p->idtransaksi}}" data-parent="#accordion2">
      <div class="card-body">
        <table class="table table-bordered">
              <tr>
                <td>
                  <h4>{{$p->tikets[0]->namaTiket}}</h4>
                  <h5>{{$p->tikets[0]->penayangan[0]->nama}}</h5>
                  <h5>{{date("l j F Y H:i",strtotime($p->tikets[0]->penayangan[0]->tanggal))}}</h5>
                  <h5>{{$p->tikets[0]->penayangan[0]->deskripsi}}</h5>
                    <h5>{{$p->jumlah.' X Rp. '.number_format($p->harga)}}</h5>
                </td>
                <td><h5>Rp. {{number_format($p->jumlah * $p->harga)}}</h5></td>
              </tr>
              <tr><td><h5>Donasi Untuk Tim LEADME</h5></td><td><h5>Rp. {{number_format($p->donasi)}}</h5></td></tr>
              <tr><td><h5>Diskon</h5></td><td><h5>- Rp. {{number_format($p->diskon)}}</h5></td></tr>
              <tr><td><h5>Kode Unik</h5></td><td><h5>Rp. {{number_format($p->kodeUnik)}}</h5></td></tr>
              <tr><td><h4>Total</h4></td><td><h4>Rp. {{number_format($p->total)}}</h4></td></tr>
              @if($p->status=='BELUM DIBAYAR')
              <tr><td><h5>Batas Waktu Pembayaran</h5></td><td><h5>{{date('d M Y h:i:s',strtotime($p->batasBayar))}}</h5></td></tr>
              @endif
              @if($p->status=='SUDAH DIBAYAR')
              <tr><td><h5>Waktu Pembayaran</h5></td><td><h5>{{date('d M Y h:i:s',strtotime($p->waktuBayar))}}</h5></td></tr>
              @endif
            </table>
            <br>
            @if($p->status=='BELUM DIBAYAR')
            @if(1==2)
            <button onclick="bayars('Rp. {{number_format($p->total)}}','{{$p->idtransaksi}}');" class="btn btn-success" style="min-height:50px; width: 100%; margin-bottom:5px;">Bayar Pesanan (Transfer Manual)</button> @endif
            <button class="btn btn-success" style="min-height:50px; width: 100%;"
               data-toggle="modal" data-target="#bayars{{$p->idtransaksi}}" >Bayar Pesanan (Pengecekan Otomatis)</button>

            <div class="modal fade" id="bayars{{$p->idtransaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <div>
                    <h5>Pembayaran</h5>
                    <h6>Refresh Halaman Ini Setelah Melakukan Pembayaran</h6>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-center" id="obpay" style="height: 800px;">
                      <object data="https://pay-stg.oyindonesia.com/{{$p->paymentLinkId}}" width="100%" height="95%"></object>
                  </div>
                </div>
              </div>
            </div>


            @endif
      </div>
    </div>
  </div>
@endforeach
</div>
</div></div>
         
          </div>
        </div>

      </div>

    </div>
  </div>
  
<script type="text/javascript">
  function bayars(a,b)
  {
    $('#ido1').text(b);
    $('#ido2').val(b);
    $('#jp1').text(a);
    $('#bayar').modal('show');
  }
</script>

  
@endsection