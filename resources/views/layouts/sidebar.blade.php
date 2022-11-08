<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
        <img src="{{asset('assets/img/lg2.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <img src="{{asset('assets/img/lg1.png')}}" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" style="height:calc(100vh - 150px) !important;">
      <ul class="navbar-nav">
        @if(Auth::user()->hakAkses != 'guest')
        <li class="nav-item">
          <a class="nav-link @yield('dashboardStatus')" href="{{url('/dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        @if(Auth::user()->hakAkses == 'penyelengara' ||Auth::user()->hakAkses == 'admin' )
        <li class="nav-item ">
          <a class="nav-link @yield('penayanganStatus')" href="{{url('penayangan/all')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Penayangan</span>
          </a>
        </li>
        @endif
        @elseif(Auth::user()->hakAkses == 'guest' && 1==2)
        <li class="nav-item ">
          <a class="nav-link @yield('tiketkuStatus')" href="{{url('tiketku')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-email-83 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tiketku</span>
          </a>
        </li>
        @endif
        <li class="nav-item ">
          <a class="nav-link @yield('penayanganStatus')" href="{{url('penayangan/all')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Daftar Penayangan</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link " href="../pages/billing.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
          </a>
        </li> -->
        @if(Auth::user()->hakAkses=='admin')
        <a data-bs-toggle="collapse" href="#dataMaster" class="nav-link active" aria-controls="dashboardsExamples"
          role="button" aria-expanded="true">
          <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
            <i class="ni ni-shop text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Data Master</span>
        </a>
        <div class="collapse @yield('masterShow')" id="dataMaster" style="">
          <ul class="nav ms-4">
            <li class="nav-item" >
              <a class="nav-link @yield('parokiStatus')" href="{{route('paroki.index')}}">
                <span class="sidenav-normal"> Paroki </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @yield('penyelenggaraStatus')" href="{{route('penyelenggara.index')}}">
                <span class="sidenav-normal"> Penyelenggara </span>
              </a>
            </li>
          </ul>
        </div>
        
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">LeadMe Crew</h6>
        </li>

        
        <li class="nav-item" >
          <a class="nav-link @yield('userStatus')" href="{{route('user.index')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User</span>
          </a>
        </li>
         <li class="nav-item" >
          <a class="nav-link @yield('konfirmasiStatus')" href="{{url('/konfirmasi')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Konfirmasi Pembayaran</span>
          </a>
        </li>
        @endif
        <!-- <li class="nav-item">
          <a class="nav-link " href="../pages/sign-in.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-up.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> -->
      </ul>
    </div>
    <!-- <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div> -->
  </aside>