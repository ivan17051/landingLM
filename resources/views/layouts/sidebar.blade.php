@section('sidebar')

<div class="sidebar" data-color="purple" data-background-color="black"
    data-image="{{asset('public/img/sidebar-1.jpg')}}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
        -->
    <div class="logo">
        <a class="logo-mini" href="{{url('/')}}"><img src="{{asset('assets/images/lg2.png')}}" style="height:40px;" alt=""></a>
        <a class="logo-normal" href="{{url('/')}}"><img src="{{asset('assets/images/lg1.png')}}" style="height:35px;" alt=""></a>
        <!-- <a href="{{url('/')}}" class="logo-mini">K</a> -->
        <!-- <a href="{{url('/')}}" class="simple-text logo-normal">SDMK</a> -->
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{asset('public/assets/images/logo.png')}}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>{{Auth::user()->nama}}</span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item @yield('dashboardStatus') ">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#sidebar-master">
                    <i class="material-icons">assignment</i>
                    <p> Master
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse @yield('masterShow')" id="sidebar-master">
                    <ul class="nav">
                        <li class="nav-item @yield('userStatus')">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <span class="sidebar-mini"> U </span>
                                <span class="sidebar-normal"> User </span>
                            </a>
                        </li>
                        <li class="nav-item @yield('promoStatus')">
                            <a class="nav-link" href="">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Promo </span>
                            </a>
                        </li>
                        <li class="nav-item @yield('parokiStatus')">
                            <a class="nav-link" href="">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Paroki </span>
                            </a>
                        </li>
                        <li class="nav-item @yield('penyelenggaraStatus')">
                            <a class="nav-link" href="">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Penyelenggara </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @yield('strStatus') ">
                <a class="nav-link" href="{{url('/jadwalakan')}}">
                    <i class="material-icons">schedule</i>
                    <p> Jadwalkan Penayangan </p>
                </a>
            </li>
            <li class="nav-item @yield('bioStatus')">
                <a class="nav-link" href="{{url('/laporan')}}">
                    <i class="material-icons">description</i>
                    <p> Laporan </p>
                </a>
            </li>
            
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>
@endsection
