
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Try Out</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('admin')}}/celestial/template/vendors/typicons.font/font/typicons.css">
    <link rel="stylesheet" href="{{asset('admin')}}/celestial/template/vendors/css/vendor.bundle.base.css">
    <!-- endinject --> 
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin')}}/celestial/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin')}}/celestial/template/images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  </head>
  <body>
    <div class="row" id="proBanner">
      <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
          <p>Welcome to my Website Cashier</p>
          <a href="https://www.bootstrapdash.com/product/celestial-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
          <i class="typcn typcn-delete-outline" id="bannerClose"></i>
        </span>
      </div>
    </div>
    <div class="container-scroller">
      <!-- partial -->
      
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="img/kucing.png" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
    <p class="sidebar-name" style="font-family: 'Arial', sans-serif; font-size: 18px;">
        Ratna cafee
    </p>
</div> 
  </div>
  @if (Auth::user()->level==1)
            <p class="sidebar-menu-title">Dash menu</p>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home">
            <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="/karyawan">
            <i class="fa fa-user menu-icon"></i>
                <span class="menu-title">Karyawan</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="/jenis">
            <i class="fa fa-list-ul menu-icon"></i>
                <span class="menu-title">Jenis</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/menu">
            <i class="fa fa-burger menu-icon"></i>
                <span class="menu-title">Menu</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/stok">
                <i class="typcn typcn-compass menu-icon"></i>
                <span class="menu-title">Stok</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/pelanggan">
            <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Pelanggan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/transaksi">
            <i class="fa fa-exchange menu-icon"></i>
                <span class="menu-title">Transaksi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/meja">
            <i class="fa fa-table menu-icon"></i>
                <span class="menu-title">meja</span>
            </a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="/produkTitipan">
                <i class="typcn typcn-document-text menu-icon"></i>
                <span class="menu-title">Produk Titipan</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="/contactUs">
            <i class="fa fa-book menu-icon"></i>
                <span class="menu-title">Contact Us</span>
            </a>
        </li>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="/absensi">
            <i class="fa fa-book menu-icon"></i>
                <span class="menu-title">Absensi</span>
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="/tentang">
            <i class="fa fa-info menu-icon"></i>
                <span class="menu-title">Tentang Aplikasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">
            <i class="fa fa-info menu-icon"></i>
                <span class="menu-title">Tambah Akun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">
            <i class="fa fa-power-off menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
       
        @endif

        @if (Auth::user()->level==2)
        <li class="nav-item">
            <a class="nav-link" href="/pemesanan">
            <i class="fa fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Pemesanan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">
            <i class="fa fa-power-off menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
        @endif
        @if (Auth::user()->level==3)
        <li class="nav-item">
            <a class="nav-link" href="/pemesanan">
            <i class="fa fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Pemesanan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">
            <i class="fa fa-power-off menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
        @endif
        </ul>
      </nav>

        <!-- partial -->
        <div class="main-panel">
  <div class="content-wrapper">
    <div class="content-wrapper">
      @yield('content')
    </div>
  </div>
</div>

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com</a> 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard </a>templates from Bootstrapdash.com</span>
            </div>
          </footer> -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{asset('admin')}}/celestial/template/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('admin')}}/celestial/template/js/off-canvas.js"></script>
    <script src="{{asset('admin')}}/celestial/template/js/hoverable-collapse.js"></script>
    <script src="{{asset('admin')}}/celestial/template/js/template.js"></script>
    <script src="{{asset('admin')}}/celestial/template/js/settings.js"></script>
    <script src="{{asset('admin')}}/celestial/template/js/todolist.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('admin')}}/celestial/template/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('admin')}}/celestial/template/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('admin')}}/celestial/template/js/dashboard.js"></script>
    <!-- End custom js for this page-->
    @stack('script')
  </body>
</html>
 
@include('template.footer')