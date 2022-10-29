@extends('layouts.landingLayouts')

@section('content')
<?php use App\Http\Controllers\LandingController; ?>


  <div class="w3l-about1 py-5" id="about">
    <div class="container py-lg-3"> 
      <h1 style="margin-top:50px;">Cek Tiket</h1>
      <div class="aboutgrids row">
        <div class="col-lg-12 aboutgrid2">
          <div class="card"  style="margin-top:10px;">
            <div class="card-body text-center">
              <img src="{{asset('assets/img/lg1.png')}}" style="height:60px;" alt="">
              <br><br>
              @if($jenis==1)
              <h6>Kelas Tiket</h6>
              <h4>{{$tiket->namaTiket}}</h4>
              <h6>Nomor Tiket Fisik</h6>
              <h4>{{$tiket->tiketOffline}}</h4>
              <h6>Nomor E-Tiket</h6>
              <h4>{{$tiket->tiketOnline}}</h4>
              <h6>Jenis Tiket</h6>
              <h4>E-Tiket</h4>
              <h6>Warna Tiket Fisik</h6>
              <h4>{{$tiket->warna}}</h4>
              <h6>Penayangan</h6>
              <h4>{{date('d M Y H:i', strtotime($tiket->penayangan[0]->tanggal))}}<br>
                {{$tiket->penayangan[0]->nama}}<br>{{$tiket->parokis[0]->namaParoki}}<br>{{$tiket->penayangan[0]->alamat}}</h4>
              <h6>Status</h6>
              <h4>@if($tiket->tanggalKehadiran != '') Tiket Telah Digunakan Pada {{date('d M Y H:i:s', strtotime($tiket->tanggalKehadiran))}} @else Tiket Belum Digunakan @endif</h4>

              @elseif($jenis==2)
              <h6>Kelas Tiket</h6>
              <h4>{{$tiket->namaTiket}}</h4>
              <h6>Nomor Tiket Fisik</h6>
              <h4>{{$tiket->tiketOffline}}</h4>
              <h6>Nomor E-Tiket</h6>
              <h4>{{$tiket->tiketOnline}}</h4>
              <h6>Jenis Tiket</h6>
              <h4>Tiket Fisik</h4>
              <h6>Warna Tiket Fisik</h6>
              <h4>{{$tiket->warna}}</h4>
              <h6>Penayangan</h6>
              <h4>{{date('d M Y H:i', strtotime($tiket->penayangan[0]->tanggal))}}<br>
                {{$tiket->penayangan[0]->nama}}<br>{{$tiket->parokis[0]->namaParoki}}<br>{{$tiket->penayangan[0]->alamat}}</h4>
              <h6>Status</h6>
              <h4>@if($tiket->tanggalKehadiran != '') Tiket Telah Digunakan Pada {{date('d M Y H:i:s', strtotime($tiket->tanggalKehadiran))}} @else Tiket Belum Digunakan @endif</h4>

              @elseif($jenis==3)
              <h6>Nomor Tiket Fisik</h6>
              <h4>{{$tiket->noTiket}}</h4>
              <h6>Jenis Tiket</h6>
              <h4>Tiket Fisik</h4>
              <h6>Warna</h6>
              <h4>{{$tiket->warna}}</h4>
              <h6>Penayangan</h6>
              <h4>{{date('d M Y H:i', strtotime($tiket->penayangan[0]->tanggal))}}<br>
                {{$tiket->penayangan[0]->nama}}<br>{{$tiket->parokis[0]->namaParoki}}<br>{{$tiket->penayangan[0]->alamat}}</h4>
              <h6>Status</h6>
              <h4>Tiket Belum Diaktivasi</h4>
              @else
              <h4>Tiket Tidak Ditemukan</h4>
              @endif
          </div>
          </div>

                
          </div>
        </div>
        <div class="row" style="height:500px;"></div>
      </div>

    </div>
  
  <script type="text/javascript">
   </script> 

  
@endsection