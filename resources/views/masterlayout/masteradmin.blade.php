<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/dist/img/favicon.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }

    .indiabox {
      width: 20%;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ URL::asset('assets/dist/img/edi-logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">EDI Global</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @if(Session()->has('data'))
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ URL::asset('/storage/')}}/{{ App\Models\Admin::where('unm',Session('data')['unm'])->first()->image }}" class="img-circle elevation-2" alt="User Image" width="100px">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{Session('data')['unm']}}</a>
          </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">



            <!-- Dashboard -->
            <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <!-- Admin -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                  Admin
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>user</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Roles</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('counsellors.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Counceler details</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Student Rating</p>
                  </a>
                </li> -->
              </ul>
            </li>

            <!-- Category -->
            <li class="nav-item">
              <a href="{{ route('categories.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Category</p>
              </a>
            </li>

            <!-- Universities -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-university"></i>
                <p>
                  Universities
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('universities.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Universities</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('universities.details') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>University Details</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>University Approvals</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('ratings.data') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Student Rating</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Programs -->
            <li class="nav-item has-treeview {{ Request::is('programs.index') ||Request::is('sub-co.index') ||  Request::is('cources.index') || Request::is('cources*') || Request::is('sub-co*') || Request::is('programs*') ? 'menu-is-opening menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                  Programs
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('programs.index') }}" class="nav-link {{ Request::is('programs.index') || Request::is('programs*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Programs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('cources.index') }}" class="nav-link {{ Request::is('cources.index') || Request::is('cources*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cources</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('sub-co.index') }}" class="nav-link {{ Request::is('sub-co.index') || Request::is('sub-co*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sub Cource</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Blogs -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bolt"></i>
                <p>
                  Blogs
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('blogcat.details') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('blogs.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blogs</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Compare Details -->
            <li class="nav-item">
              <a href="{{ route('compare_details.index') }}" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>Compare Details</p>
              </a>
            </li>

            <!-- V/S Compare -->
            <li class="nav-item">
              <a href="{{ route('vscompare_details.index') }}" class="nav-link">
                <i class="nav-icon fas fa-balance-scale"></i> <!-- Replaced with a comparison-related icon -->
                <p> V/S Compare</p>
              </a>
            </li>

            <!-- Student -->
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i> <!-- Education/student-related icon -->
                <p>
                  Student
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Registered Student</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Form lead</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Payment Details</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Faq -->
            <li class="nav-item has-treeview {{ Request::is('faq-universityes.index') ||Request::is('faq-blogs.index') ||  Request::is('faq-cources.index') || Request::is('faq-subCourse.index') || Request::is('faq-universityes*') || Request::is('faq-blogs*') || Request::is('faq-cources*') || Request::is('faq-subCourse*') ? 'menu-is-opening menu-open' : '' }}">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                  Faq
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('faq-universityes.index') }}" class="nav-link {{ Request::is('faq-universityes.index') || Request::is('faq-universityes*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Universities</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('faq-blogs.index') }}" class="nav-link {{ Request::is('faq-blogs.index') || Request::is('faq-blogs*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blogs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('faq-cources.index') }}" class="nav-link {{ Request::is('faq-cources.index') || Request::is('faq-cources*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Courses</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('faq-subCourse.index') }}" class="nav-link {{ Request::is('faq-subCourse.index') || Request::is('faq-subCourse*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sub Course</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Site setting -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i> <!-- Settings-related icon -->
                <p> Site Setting</p>
              </a>
            </li>

            <!-- Manage Profile -->
            <li class="nav-item menu {{ request()->routeIs('adminprofileupdate') || request()->routeIs('adminchagepwd') ? 'menu-open' : '' }}" >
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Manage Profile
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('adminprofileupdate') }}" class="nav-link {{ request()->routeIs('adminprofileupdate') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Edit Profile</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('adminchagepwd') }}" class="nav-link {{ request()->routeIs('adminchagepwd') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change Password</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('logout')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Logout</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        @endif
        <!-- /.sidebar-menu -->
      </div>
      


      <!-- /.sidebar -->
    </aside>

    @yield('content')

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022 EDI Global.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Developed By</b> <a href="http://jgitsolution.com/">JG IT Solution</a>
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ URL::asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ URL::asset('assets/plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ URL::asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ URL::asset('assets/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ URL::asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  <script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ URL::asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ URL::asset('assets/dist/js/adminlte.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ URL::asset('assets/dist/js/demo.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ URL::asset('assets/dist/js/pages/dashboard.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>