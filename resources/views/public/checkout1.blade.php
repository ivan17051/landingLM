@extends('layouts.landingLayouts')

@section('content')
<?php use App\Http\Controllers\LandingController; ?>

  
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
            <h3>Tiket</h3>
            <h5>{{$tiket->penayangan[0]->nama}}</h5>
            <h5>{{date("l j F Y H:i",strtotime($tiket->penayangan[0]->tanggal))}}</h5>
            <h5>{{$tiket->penayangan[0]->deskripsi}}</h5>
            <br>
            @foreach($tiket->fasilitas as $f)
              <h6>- {{$f->nama}}</h6>
            @endforeach<br>
            <h4>{{$tiket->namaTiket}}</h4>
            <h5>{{$tiket->dibeli.' X Rp. '.number_format($tiket->harga)}}</h5>
          </div>
          </div>
          @if(1==2)
           <div class="card"  style="margin-top:10px;">
            <div class="card-body ">
            <h3>Kode Promo</h3><br>
            <input id="promo" type="text" name="promo" class="form-control">
            <button class="btn btn-warning" style="margin-top: 5px; margin-bottom: 10px;">Apply Promo Code</button>
            <h3 class="text-danger">LEADME123 <br>- Rp. 20000</h3>
              <br>
          </div>
          </div>
          @endif
          <div class="card"  style="margin-top:10px;">
            <div class="card-body ">
            <h3>Donasi Untuk Tim LEADME (Opsional)</h3><br>
            <input onchange="set0();" id="donasi" type="number" name="donasi" class="form-control" min="0" value="{{0}}">
              <br>
          </div>
          </div>
          
          <div>
            <br>
            <h2>Total</h2>
            <h1 id="total" style="font-size: 3em;">Rp. {{number_format($tiket->dibeli * $tiket->harga)}}</h1>
          </div>
          <div>
            <br>
        <form method="post" action="{{url('checkout2')}}">
          @csrf
            <input type="hidden" name="tiket" value="{{$tiket->idtiket}}">
            <input type="hidden" name="jumlah" value="{{$tiket->dibeli}}">
            <input type="hidden" id="donasi2" name="donasi" value="0">
            <input type="hidden" name="total2" id="total2" value="{{number_format($tiket->dibeli * $tiket->harga)}}">    
            <input type="submit" value="CHECKOUT" name="sub" class="btn btn-success" style="width:100%; min-height: 50px;">
        </form>
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