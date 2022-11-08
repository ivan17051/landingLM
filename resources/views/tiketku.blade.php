@extends('layouts.adminLayouts')
@extends('layouts.sidebar')

@section('title')
Tiketku
@endsection

@section('tiketkuStatus')
active
@endsection

@section('judul')
Tiketku
@endsection

@section('style')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4" style="min-height:70vh;">
@if(!isset($tiket))
<div class="col-md-12">
  <div class="card">
    <div class="card-body text-center">
      <img src="{{asset('assets/img/undraw_Empty.png')}}" alt="" class="w-40">
      <p>Anda Belum Punya Tiket. Segera Beli di Menu Daftar Penayangan atau <a href="{{url('/penayangan')}}">Klik Disini</a></p>
    </div>
  </div>
</div>

@else
@foreach($tiket as $unit)
<div class="col-md-4">
  <div class="card" style="padding-left: 0;padding-right: 0;">
    <div class="card-header text-center" style="background-color:#ffc600;min-height:100px;">
      <b style="color:white;font-size:13px;">{{$unit->bookingCode}}</b>
      <br>
      <img class="pt-3 pb-3" style="width:30%;" src="{{asset('public/assets/img/lg4.png')}}" alt="">
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col">
          <b style="font-size:12px;">Status</b>
          <p class="card-text" style="font-size:13px;">{{$unit->status}}</p>
        </div>
        <div class="col-5 text-right">
          <b style="font-size:12px;">Metode</b>
          <p class="card-text" style="font-size:13px;">{{$unit->metode}}</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <b style="font-size:12px;">Tempat</b>
          <p class="card-text" style="font-size:13px;">Lapangan Ratu Pecinta Damai</p>
        </div>
        <div class="col-5 text-right">
          <b style="font-size:12px;">Tanggal & Waktu</b>
          <p class="card-text" style="font-size:13px;">30 Oct 2022 10:00</p>
        </div>
      </div>
      <div class="mt-3 mb-3" style="border-top:1px solid black;"></div>
      <div class="row">
        <div class="col">
          <b style="font-size:12px;">Nama</b>
          <p class="card-text" style="font-size:13px;">{{$unit->userRelation->nama}}</p>
        </div>
        <div class="col text-right">
          <b style="font-size:12px;">Qty</b>
          <p class="card-text" style="font-size:13px;">3</p>
        </div>
        
      </div>
      <div class="text-center mt-3">
      {!! QrCode::size(200)->generate($unit->paymentLinkId) !!}
      </div>
    </div>
    <div class="card-footer">
      <button class="btn btn-primary w-100">Lihat</button>
    </div>
  </div>
</div>
@endforeach
@endif
</div>
@endsection

@section('script')
@endsection