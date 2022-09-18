@extends('layouts.adminLayouts')
@extends('layouts.sidebar')

@section('title')
Penayangan
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

@section('content')

    

<div class="row">
  @foreach($penayangan as $unit)
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <div class="row">
            <div class="col-lg-5">
              <div class="position-relative">
                <div class="blur-shadow-image">
                    <img class="w-100 rounded-3 shadow-lg" src="https://images.pexels.com/photos/208277/pexels-photo-208277.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
                </div>
              </div>
            </div>
            <div class="col-lg-7 my-auto">
            <div class="text-left">
                
                <h5 class="font-weight-bolder mb-0">{{$unit->nama}}</h5>
                <div class="text-uppercase text-sm font-weight-bold mb-2">{{$unit->alamat}}</div>
                <div class="text-uppercase text-sm font-weight-bold mb-2">{{Carbon\Carbon::make($unit->tanggal)->translatedFormat('d F Y | h:i')}}</div>
                <div class="text-sm mb-2">{{$unit->keterangan}}</div>
                
                <a href="{{route('penayangan.detail', ['id'=>$unit->idpenayangan])}}" class="btn btn-primary btn-sm mt-3 w-100" >Lihat Detail</a>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>


</div>

@endsection

@section('script')
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{asset('public/js/plugins/bootstrap-tagsinput.js')}}"></script>

@endsection