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
                    <span>Nama</span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item @yield('dashboardStatus') ">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item @yield('strStatus') ">
                <a class="nav-link" href="{{url('/str')}}">
                    <i class="material-icons">list_alt</i>
                    <p> Data SIP </p>
                </a>
            </li>
            <li class="nav-item @yield('nakesStatus')">
                <a class="nav-link" href="{{url('/nakes')}}">
                    <i class="material-icons">people</i>
                    <p> Data Nakes </p>
                </a>
            </li>
            <li class="nav-item @yield('bioStatus')">
                <a class="nav-link" href="{{url('/bio')}}">
                    <i class="material-icons">account_box</i>
                    <p> Bio Nakes </p>
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
                        <li class="nav-item @yield('faskesStatus')">
                            <a class="nav-link" href="">
                                <span class="sidebar-mini"> F </span>
                                <span class="sidebar-normal"> Faskes </span>
                            </a>
                        </li>
                        <li class="nav-item @yield('profesiStatus')">
                            <a class="nav-link" href="">
                                <span class="sidebar-mini"> P </span>
                                <span class="sidebar-normal"> Profesi </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="sidebar-background"></div>
</div>
@endsection
