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
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
          <div class="subtitle-wrapper row">
            <div class="col-md-8"> <h4 class="card-title">Jadwal Penayangan </h4></div>
            <div class="col-md-4"> <a href="" style="width: 100%;" class="btn btn-primary">Tambah Jadwal</a> </div>
           
          </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="row">
                <div class="col-md-4">
                    <h6>ini Gambar</h6>
                </div>
                <div class="col-md-8" style="padding: 40px;">
                    <h3>17 Oktober 2022 | 18.00 WIB</h3>
                    <h4>RPD Arena (nama)</h4>
                    <h5>Paroki Ratu Pencinta Damai Surabaya</h5>
                    <h5>jalan Pogot baru no 77-79 Surabaya</h5>
                    <p>ini deskripsi Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed augue semper, mattis urna laoreet, ullamcorper enim. Praesent pulvinar placerat ultrices. Integer consequat risus a quam sagittis semper. Fusce ac fermentum dui. Sed velit arcu, pulvinar id pharetra nec, viverra pellentesque justo. Suspendisse vulputate non mauris a semper. Mauris hendrerit, odio vitae tincidunt fringilla, erat enim imperdiet mi, vitae hendrerit velit dui eu magna. Nullam nec felis enim. Suspendisse imperdiet libero ligula, vitae egestas tellus dictum nec. Etiam accumsan tempus nisi, sit amet pharetra arcu semper eget.</p>
                    <div class="row">
                        <div class="col-md-12"><a href="{{url('penayangan/detail/1')}}" style="width: 100%; margin: 5px;" class="btn btn-primary">Detail</a></div>
                    </div>
                </div>
                </div>
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

@endsection