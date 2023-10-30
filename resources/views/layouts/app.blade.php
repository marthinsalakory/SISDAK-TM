@php $template = DB::table('pengaturan')->where('id', 1)->first(); @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ env('APP_NAME') }}</title>
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- jQuery -->
  <script src="{{ url('assets/backend') }}/plugins/jquery/jquery.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/toastr/toastr.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('assets/backend') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/backend') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition @if($template->k7) sidebar-mini @endif @if($template->k8) sidebar-mini-md @endif @if($template->k9) sidebar-mini-xs @endif @if($template->k2) layout-navbar-fixed @endif @if($template->k6) layout-fixed @endif @if($template->k1) dark-mode @endif @if($template->k5) sidebar-collapse @endif @if($template->k16) layout-footer-fixed @endif @if($template->k17) text-sm @endif {{ $template->k23 }}">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light {{ $template->k22 }} @if($template->k3) dropdown-legacy @endif @if($template->k4) border-bottom-0 @endif @if($template->k18) text-sm @endif">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" title="Logout">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @auth
  <aside class="main-sidebar elevation-4 @if($template->k15) sidebar-no-expand @endif {{ $template->k24 }}-{{ $template->k25 }}">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link @if($template->k19) text-sm @endif {{ $template->k26 }}">
      <img src="{{ url('assets/') }}/img/mesin.jpg" alt="AdminLTE Logo" class="brand-image rounded" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('assets/') }}/img/default.png" class="" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('user.profile', Auth::user()->id) }}" class="d-block">{{ Auth::user()->nama }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column @if($template->k10) nav-flat @endif @if($template->k11) nav-legacy @endif @if($template->k12) nav-compact @endif @if($template->k13) nav-child-intent @endif @if($template->k14) nav-collapse-hide-child @endif @if($template->k20) text-sm @endif" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (Auth::user()->role_id == 2)
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pen"></i>
              <p>
                Input Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>
                    Profil Dosen
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('input.A', Auth::user()->id) }}" class="nav-link">
                      <p>Dosen Tetap Perguruan Tinggi</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>
                    Kinerja Dosen
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>Penelitia DTPS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>Pengabdian Kepada Masyarakat (PKM) DTPS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>Publikasi Ilmiah DTPS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <p>Karya Ilmiah DTPS</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('input.A', Auth::user()->id) }}" class="nav-link {{ Request::routeIs('input.A') ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Input Data
              </p>
            </a>
          </li>
          @endif
          @if (Auth::user()->role_id == 1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Standar 4
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>
                    Profil Dosen
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('data.A') }}" class="nav-link">
                      <p>Dosen Tetap Perguruan Tinggi</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>
                    Kinerja Dosen
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('data.B') }}" class="nav-link">
                      <p>Penelitia DTPS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('data.C') }}" class="nav-link">
                      <p>Pengabdian Kepada Masyarakat (PKM) DTPS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('data.D') }}" class="nav-link">
                      <p>Publikasi Ilmiah DTPS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('data.E') }}" class="nav-link">
                      <p>Karya Ilmiah DTPS</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('user') }}" class="nav-link {{ Request::routeIs('user') ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Kelola Pengguna
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">            
            <a href="{{ route('pengaturan') }}" class="nav-link {{ Request::routeIs('pengaturan') ? 'active' : '' }}">
              <i class="nav-icon fa fa-computer"></i>
              <p>
                Pengaturan Aplikasi
              </p>
            </a>
          </li> --}}
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @endauth

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header @guest container @endguest">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-capitalize">{{ strtr( Request::route()->getName(), ".", " " ) }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">{{ strtr( Request::route()->getName(), ".", " " ) }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content @guest container @endguest">


        @include('layouts.message')
        @yield('content')
  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer @if($template->k21) text-sm @endif">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Font Awesome -->
<script src="{{ url('assets/backend') }}/plugins/fontawesome-free/js/all.min.css"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{ url('assets/backend') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ url('assets/backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ url('assets/backend') }}/plugins/toastr/toastr.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ url('assets/backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('assets/backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- BS-Stepper -->
<script src="{{ url('assets/backend') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/backend') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('assets/backend') }}/dist/js/demo.js"></script>
{{-- <script src="{{ url('/assets') }}/js/input.js"></script> --}}
<script src="{{ url('/assets') }}/js/custom.js"></script>
<!-- jQuery Knob -->
<script src="{{ url('/assets/backend/') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('/assets/backend/') }}/plugins/sparklines/sparkline.js"></script>

<script>

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  $(function () {
    // Tooltip Bootstrap
    $('[data-toggle="tooltip"]').tooltip();

    //Initialize Select2 Elements
    $('.select2').select2()
    
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    
    // Page specific script
    $('#table-search').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
</body>
</html>
