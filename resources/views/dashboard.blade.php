@extends('layouts.adminLayouts')
@extends('layouts.sidebar')

@section('title')
Dashboard
@endsection

@section('dashboardStatus')
active
@endsection

@section('content')
<div class="container-fluid" style="min-height:70vh;">
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="card card-stats bg-warning">
          <div class="card-header card-header-warning card-header-icon pt-3 pb-3">
            <span class="float-left"><i class="material-icons">group</i></span>
            <p class="card-category text-white "><strong>Akan Expired</strong></p>
            <h3 class="card-title text-white font-weight-bold"><strong>184</strong></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="card card-stats bg-danger">
          <div class="card-header card-header-warning card-header-icon pt-3 pb-3">
            <span class="float-left"><i class="material-icons">group_off</i></span>
            <p class="card-category text-white "><strong>Expired</strong></p>
            <h3 class="card-title text-white font-weight-bold"><strong>184</strong></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="card card-stats bg-info">
          <div class="card-header card-header-warning card-header-icon pt-3 pb-3">
            <span class="float-left"><i class="material-icons">supervisor_account</i></span>
            <p class="card-category text-white "><strong>Belum Memiliki STR</strong></p>
            <h3 class="card-title text-white font-weight-bold"><strong>184</strong></h3>
          </div>
        </div>
      </div>
    <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>
@endsection

@section('script')
<script>
    
</script>
@endsection