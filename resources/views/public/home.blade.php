@extends('layouts.landingLayouts')

@section('content')
<?php use App\Http\Controllers\LandingController; ?>
  <section class="w3l-main-slider" id="home">
    <div class="companies20-content">

      <div class="owl-one owl-carousel owl-theme">
        <div class="item">
          <li>
            <div class="slider-info  banner-view banner-top1 bg bg2" data-selector=".bg.bg2" style="background: url({{asset('assets/img/bglm1.jpg')}}) no-repeat center !important; background-size: cover !important;">
              <div class="banner-info">
                <div class="container">
                  <div class="banner-info-bg mr-auto">
                    <h5>Selamat Datang</h5>
                    <p>LEADME Film By OMK Kevikepan Surabaya Utara</p>
                    <!-- <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="contact.html"> Contact Us</a> -->
                  </div>
                </div>
              </div>
            </div>
          </li>
        </div>
        
      </div>
    </div>

    </div>


    <script src="assets/js/owl.carousel.js"></script>
    <script>
      $(document).ready(function () {
        $('.owl-one').owlCarousel({
          loop: true,
          margin: 0,
          nav: false,
          responsiveClass: true,
          autoplay: false,
          autoplayTimeout: 5000,
          autoplaySpeed: 1000,
          autoplayHoverPause: false,
          responsive: {
            0: {
              items: 1,
              nav: false
            },
            480: {
              items: 1,
              nav: false
            },
            667: {
              items: 1,
              nav: true
            },
            1000: {
              items: 1,
              nav: true
            }
          }
        })
      })
    </script>

  </section>

<?php if(1==2){ ?>
<section class="w3l-features-1">
    <div class="features py-5">
          <div class="row text-center" style="margin-left: 100px; margin-right: 100px;">
            <div class="col">
          <img style="width: 5%" src="{{asset('assets/img/omk/kr.png')}}">
          <img style="width: 5%;" src="{{asset('assets/img/omk/ksp.png')}}">
          <img style="width: 5%;" src="{{asset('assets/img/omk/sm.png')}}">
          <img style="width: 5%;" src="{{asset('assets/img/omk/mr.png')}}">
          <img style="width: 5%;" src="{{asset('assets/img/omk/rpd.png')}}">
          <img style="width: 5%;" src="{{asset('assets/img/omk/svp.png')}}">
          <img style="width: 5%;" src="{{asset('assets/img/omk/smb.png')}}">
          </div>
        </div>
       
        
    </div>
  </section>
<?php } ?>  
  <div class="w3l-about1 py-5" id="about">
    <div class="container py-lg-3">

      <div class="aboutgrids row">
        <div class="col-lg-6 aboutgrid2">
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/a76c5EtNnwM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col-lg-6 aboutgrid1 mt-lg-0 mt-4 pl-lg-5">
          <h4>About LeadMe</h4>
          <h6>Durasi : 97 Menit</h6>
          <p>Dera, seorang remaja yang berasal dari keluarga sederhana berlatar belakang Ras, Suku, dan Agama yang berbeda. Seiring berjalannya waktu dia merasakan panggilan untuk menjadi seorang Katolik. 
            Setelah Dera dibaptis, Jonas ketua OMK Paroki menghampiri Dera. Disini Jonas mengajak Dera untuk aktif di kegiatan Orang Muda Katolik.
          Jonas memperkenalkan Dera dengan anak omk lain seperti Gracia, Anton, Tessa, Tasya, Yohanes, Jeremy. Dera makin semangat menjadi anggota omk yang aktif dan menjadi lebih dekat dengan saudara seimannya.
          Sampai tibalah di rapat acara rutin tahunan OMK Sumpah pemuda.</p>

          <p>Dalam menjalani proses persiapan Sumpah Pemuda itulah mental, Iman, Pelayanan, dan Professionalisme sebagai Orang Muda Katolik diiuji hingga menemukan arti dari Pimpinan Roh Kudus dalam setiap langkah mereka.</p>

          <p>Mari ! tonton dan temukan arti Pimpinan Roh Kudus bersama Dera, Jonas, dan kawan-kawan OMK Kevikepan Surabaya Utara. Bersama-sama.</p>
          <table>
            <!-- logo OMK 7 Paroki Link Ke ig masing2 + 1 logo vitara  -->
          <tr>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/img/omk/kr.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/img/omk/ksp.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/img/omk/sm.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/img/omk/mr.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/img/omk/rpd.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/img/omk/svp.png')}}"></td>
            <td style="padding: 5px;"><img style="width: 100%;" src="{{asset('assets/img/omk/smb.png')}}"></td>
          </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  <section class="w3l-services2" id="stats">
    <div class="features-with-17_sur py-5">
      <div class="container py-md-3">

         <div class="row  text-center ">
            <h4 class="text-center  lft-head">LeadMe Dalam Angka</h4>
          </div>
        <div class="row pt-lg-5 mt-lg-3">
         
            <div class="col-lg-6 col-md-6 features-with-17-right-tp_sur text-center">
              <div class="features-with-17-left1">
                <span class="fa fa-user s4"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>80</h6>
                <h5 class="text-white">Crew Dan Cast</h5>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 features-with-17-right-tp_sur text-center" >
              <div class="features-with-17-left1">
                <span class="fa fa-film s5"></span>
              </div>
              <div class="features-with-17-left2">
                <h6>8</h6>
                <h5 class="text-white">Lokasi Penayangan</h5>
              </div>
            </div>
         
        </div>
      </div>
    </div>
  </section>
  <section class="w3l-features-8" id="jadwal">
    <div class="features py-5" id="features">
      <div class="container py-md-3">

        <div class="heading text-center mx-auto">
          <h3 class="head">Jadwal Penayangan Part I</h3>
          <p class="my-3 head">November - Desember 2022</p>
        </div>
<?php $tglsbm = ''?>        
@foreach($penayangan as $key=>$p)
        <div>
          @if(date('d m y',strtotime($p->tanggal)) != $tglsbm)
          <div class="row">
              <h4>{{date("l j F Y ",strtotime($p->tanggal))}}</h4>
          </div><br>
          @endif
          <?php 
            $tglsbm = date('d m y',strtotime($p->tanggal));
            $plgr = LandingController::penyelenggara($p->penyelenggara);
            $tkt = LandingController::tiket($p->idpenayangan);
            $foto = LandingController::foto($p->penyelenggara);
          ?>
          <div class="row">
            <div class="card col-lg-12 col-sm-12">
              <div class="card-body ">
                <div class="row">
                  <div class="col-lg-3 col-sm-12">
                    <img style="height: 100%" class="card-img" src="{{asset('assets/img/'.$p->foto[0]->namafile)}}">
                  </div>

                 <div class="col-lg-9 col-sm-12">
                    <img style="width: 50px; margin-top: 5px;" class="card-img" src="{{asset('assets/img/'.$plgr[0]->logo)}}">
                    <h5 class="card-title">{{$p->nama}} | {{$plgr[0]->nama}}</h5>
                    <h5>Paroki {{$p->parokis[0]->namaParoki}}</h5>
                    <h6>{{$p->alamat}}</h6>
                    <br>
                  <p class="card-text">{{$p->keterangan}}</p>
                  <br>
                  <div class="row" style="margin-left: 0px;">
                      <button style="margin:5px;"class="btn btn-primary" type="button" data-toggle="collapse" data-target="#c{{$p->idpenayangan}}" aria-expanded="false" aria-controls="c1">Cek Tiket</button>
                      <a href="{{$p->embedLink}}" style="margin:5px;"type="button" target="blank" class="btn btn-info">Peta Lokasi</a>
                  </div>
                 </div>
                </div>
                
              </div>

              <div class="collapse" id="c{{$p->idpenayangan}}">
                <div class="row" style="margin: 5px;">
                  @foreach($tkt as $key=>$t)
                  <div class="col-lg-4 col-md-12 col-sm-12 card card-body" >
                    <div>
                      <form method="post" action="{{url('checkout1')}}">
                        @csrf
                      <h5>{{$t->namaTiket}}</h5>
                      <h5>{{date("j F Y H:i",strtotime($p->tanggal))}}</h5>
                      <h6>{{$t->deskripsi}}</h6><br>
                      @foreach($t->fasilitas as $f)
                      <h6>- {{$f->nama}}</h6>
                      @endforeach<br>
                      <h4>Rp. {{number_format($t->harga)}}</h4><br>
                      <h6> Jumlah Tiket</h6>
                      <input type="hidden" name="idtiket" value="{{$t->idtiket}}">
                      <input id="tiket{{$t->idtiket}}" onchange="cek({{$t->idtiket}},{{$t->jumlah - $t->terjual - $t->pending}})" style="width:80%; margin-bottom: 5px;" type="number" min="0" value="0" name="jumlah"
                      max="{{$t->jumlah - $t->terjual - $t->pending}}"> / 
                      {{$t->jumlah - $t->terjual - $t->pending}}
                      @if(!Auth::check())
                      <h5 class="text-danger">Silahkan Login Terlebih Dahulu</h5>
                      @elseif($t->terjual == 0 && $t->jumlah == 0)
                      <input style="width:100%" type="submit" class="btn btn-warning" name="" value="BELUM DIJUAL">
                      @elseif($t->terjual >= $t->jumlah)
                      <input style="width:100%" type="submit" class="btn btn-danger" name="" value="HABIS">
                      @elseif($t->terjual < $t-> jumlah)
                       <input style="width:100%;"  type="submit" class="btn btn-success" name="" value="BELI">
                      @endif()
                    </div> 
                    </form>
                  </div>
                  @endforeach
                </div>
              </div>

             
            </div>
          </div>
        </div>
        <br>
@endforeach
<br>
        <div class="heading text-center mx-auto">
          <h3 class="head">Jadwal Penayangan Part 2</h3>
          <p class="my-3 head">Januari - Maret 2023</p>
        </div>
      </div>
    </div>
    <!-- //features -->
  </section>
  <!-- customers4 block -->
  <section class="w3l-customers-4" id="testimonials">
    <div id="customers4-block" class="py-5">
      <div class="container py-md-3">


        <div id="customerhnyCarousel" class="carousel slide" data-ride="carousel">

          <ol class="carousel-indicators">
            <li data-target="#customerhnyCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#customerhnyCarousel" data-slide-to="1"></li>
            <li data-target="#customerhnyCarousel" data-slide-to="2"></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner pb-5 mb-md-5 pt-md-5">

            <div class="carousel-item active">
              <div class="section-title">
                <div class="item-top">
                  <div class="item text-center">
                    <div class="imgTitle">
                      <img src="assets/images/c1.jpg" class="img-responsive" alt="" />
                    </div>
                    <h6 class="mt-3">TIM LEADME</h6>
                    <p class=""></p>
                    <h5>"Film Leadme Sangat Menarik Jangan Lupa Ditonton" </h5>

                  </div>
                </div>
              </div>
            </div>
           
          </div>
          <!--.carousel-inner-->
        </div>




      </div>
    </div>


  </section>

  <section class="news-1" id="merch">
    <div class="news py-5">
      <div class="container py-md-3">
        <div class="heading text-center mx-auto">
          <h3 class="head">LeadMe Merchandise</h3>
        </div>
          <br>
        <div class="text-center">  
         <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style="padding: 20px; width: 100%;">Dapatkan Di Tokopedia</button></a>
         <div class="blog-grids row ">

          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/ts2.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Kaos LEADME Desain 1</a> </h3>
                <p>Rp. 90.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>
          
            <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/tss1.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Kaos LEADME Desain 2</a> </h3>
                <p>Rp. 90.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>
          
            <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/kc1.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Gantungan Kunci LEADME</a> </h3>
                <p>Rp. 15.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/kc2.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Gantungan Kunci LEADME</a> </h3>
                <p>Rp. 25.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/st1.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Sticker LEADME 1</a> </h3>
                <p>Rp. 25.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/st2.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Sticker LEADME 2</a> </h3>
                <p>Rp. 8.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/st3.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Sticker LEADME 3</a> </h3>
                <p>Rp. 10.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/tt1.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Tote Bag LEADME 1</a> </h3>
                <p>Rp. 35.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/tb2.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Tote Bag LEADME 2</a> </h3>
                <p>Rp. 3.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

           <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/mg.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">Mug LEADME</a> </h3>
                <p>Rp. 25.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog-grid" id="zoomIn">
              <a href="#">
                <figure><img src="{{asset('assets/img/sk.jpg')}}" class="img-fluid" alt=""></figure>
              </a>
              <div class="text-center blog-info">
                <h3><a href="#">LEADME Stationary Kit</a> </h3>
                <p>Rp. 17.000</p>
                <a href="https://Tokopedia.com/leadme" target="blank"><button class="btn btn-success" style=" width: 100%;">Dapatkan Di Tokopedia</button></a>
              </div>
            </div>
          </div>

       
        </div>
        </div>
      </div>
    </div>
  </section>

    <section class="news-1" id="cek">
    <div class="news py-5">
      <div class="container py-md-3">
        <div class="heading text-center mx-auto">
          <h3 class="head">Cek Tiket</h3>
          <h6>Gunakan Fitur Ini Untuk Mengetahui Keaslian Tiket</h6>
        </div>
          <div class="aboutgrids row">
        <div class="col-lg-12 aboutgrid2">
          <div class="card"  style="margin-top:10px;">
            <div class="card-body ">
              <h5>Nomor Tiket</h5>
              <input type="text" name="text" id="notiket" value="" style="width:100%; min-height: 50px; margin-top:5px;">
              <button class="btn btn-success" style="width:100%;margin-top:5px;" onclick="cek2();">Cek Tiket</button>
          </div>
          </div>

                
          </div>
        </div>
        
      </div>
    </div>
  </section>

   <script type="text/javascript">
    function cek2()
    {
        window.location.href = "{{url('cektiket')}}"+"/"+$('#notiket').val();
    }

     function cek(a,b)
     {
        if($('#tiket'+a).val()<0){$('#tiket'+a).val(0);}
        if($('#tiket'+a).val()>b){$('#tiket'+a).val(b);}
     }
   </script>     

@endsection