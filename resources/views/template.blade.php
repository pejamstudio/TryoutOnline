<!doctype html>
<html lang="en">

<!-- Mirrored from borderless.laborasyon.com/dark/dashboard-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:40:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tryout Online - {{$session}}</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="{{url('/assets/vendors/bundle.css')}}" type="text/css">
    <!-- end::global styles -->

    <!-- begin::vmap -->
    <link rel="stylesheet" href="{{url('/assets/vendors/vmap/jqvmap.min.css')}}">
    <!-- begin::vmap -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="{{url('/assets/css/app.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/assets/css/custom.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/assets/css/themify-icons.css')}}" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">
    <!-- end::custom styles -->

    <!-- begin::fullcalendar -->
    <link rel="stylesheet" href="{{url('/assets/vendors/fullcalendar/fullcalendar.min.css')}}" type="text/css">
    <!-- end::fullcalendar -->

    <!-- begin::clockpicker -->
    <link rel="stylesheet" href="{{url('/assets/vendors/clockpicker/bootstrap-clockpicker.min.css')}}" type="text/css">
    <!-- end::clockpicker -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="{{url('/assets/vendors/datepicker/daterangepicker.css')}}">
    <!-- begin::datepicker -->

    <style type="text/css">
        .main-content:fullscreen {
          overflow: scroll !important;
        }
        .main-content:-ms-fullscreen {
          overflow: scroll !important;
        }
        .main-content:-webkit-full-screen {
          overflow: scroll !important;
        }
        .main-content:-moz-full-screen {
          overflow: scroll !important;
        }
        div.sticky{
          position: -webkit-sticky;
          position: sticky;
          top: 10px;
        }
    </style>

</head>
<body class="">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>Loading</span>
</div>
<!-- end::page loader -->



<!-- begin::side menu -->
<div class="side-menu">
        <div class='side-menu-body'>
            <ul>
                <li class="side-menu-divider m-t-0"></li>
                <li class="{{Request::is('dashboard*') == true  ? 'open' : '' }}">
                    <a href="{{url('/dashboard')}}" >
                        <i class="icon fa fa-globe"></i>
                        <span>Dashboard</span>
                    </a>
                    
                </li>
                
                <li class="side-menu-divider m-t-10">Main Navigation</li>
                <li class="{{Request::is('master*') == true  ? 'open' : '' }}">
                    <a href="#">
                        <i class="icon ti-server"></i>
                        <span>Data Master</span>
                    </a>
                    <ul>
                        @if($session == 'Admin')
                        <li><a href="{{route('master.jurusan.jurusan')}}" class="{{Request::is('master/jurusan*') == true  ? 'active' : '' }}">Data Jurusan </a></li>
                        <li>
                            <a href="{{url('detailjurusan', 'all')}}" class="{{Request::is('master/kelas*') == true  ? 'active' : '' }}">Data Kelas</a>
                        </li>
                        @endif
                        <li><a href="{{route('master.mapel')}}" class="{{Request::is('master/mapel*') == true  ? 'active' : '' }}">Data Mata Pelajaran </a></li>
                    </ul>
                </li>
                @if($session != 'Siswa')
                <li class="{{Request::is('pengguna*') == true  ? 'open' : '' }}">
                    <a href="#">
                        <i class="icon ti-user"></i>
                        <span>Pengguna</span>
                    </a>
                    <ul>
                        @if ($session == 'Admin')
                        <li><a href="{{url('master/detailmapel', 'all')}}" class="{{Request::is('pengguna/guru*')== true  ? 'active' : '' }}">Guru </a></li>
                        @endif
                        <li><a href="{{url('master/detailkelas', 'all')}}" class="{{Request::is('pengguna/siswa*') == true  ? 'active' : '' }}">Siswa </a></li>
                    </ul>
                </li>

                @elseif($session == 'Siswa')
                <li class="{{Request::is('tryout*') == true  ? 'open' : '' }}">
                    <a href="{{route('tryout')}}">
                        <i class="icon ti-notepad"></i>
                        <span>Tryout</span> 
                    </a>
                </li>
                @endif
                
                <li class="side-menu-divider m-t-10">Report</li>
                <li class="{{Request::is('nilai*') == true  ? 'open' : '' }}">
                    <a href="{{url('ceknilai', 'all')}}">
                        <i class="icon ti-clipboard"></i>
                        <span>Nilai</span> 
                    </a>
                </li>
                
            </ul>
            
        </div>
    </div>
<!-- end::side menu -->

<!-- begin::navbar -->
<nav class="navbar bg-primary">
    <div class="container-fluid ">

        <div class="header-logo">
            <a href="#">
                <img class="d-none d-lg-block" src="{{url('/assets/media/image/dark-logo.png')}}" alt="...">
                <img class="d-lg-none d-sm-block" src="{{url('/assets/media/image/mobile-logo')}}.png" alt="...">
            </a>
        </div>

        <div class="header-body">
            <form class="search">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            
                        </div>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="d-lg-none d-sm-block nav-link search-panel-open">
                        <i class="fa fa-search"></i>
                    </a>
                </li>

                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                    </a>
                    <?php 
                        $foto = Session::get('foto');
                     ?>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="dropdown-menu-title text-center"
                             data-backround-image="{{url('/assets/media/image/image1.png')}}">
                            <figure class="avatar avatar-state-success avatar-sm m-b-10 bring-forward">
                                @if($session == 'Admin')
                                    <img src="" class="rounded-circle">
                                @elseif($session == 'Guru')
                                    <img src="{{url('/assets/images/foto/guru/'.$foto)}}" class="rounded-circle">
                                @else
                                    <img src="{{url('/assets/images/foto/siswa/'.$foto)}}" class="rounded-circle">
                                @endif
                            </figure>
                            <h6 class="text-uppercase font-size-12 m-b-0">{{Session::get('nama_pengguna')}}</h6>
                        </div>
                        <div class="dropdown-menu-body">
                            <!-- <div class="bg-light p-t-b-15 p-l-r-20">
                                <h6 class="text-uppercase font-size-11">Profile completion</h6>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> -->
                            <ul class="list-group list-group-flush">
                                <a href="{{route('profil')}}" class="list-group-item link-2">Profil</a>
                                <a href="/logout" class="list-group-item text-danger">Logout</a>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-lg-none d-sm-block">
                    <a href="#" class="nav-link side-menu-open">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>
<!-- end::navbar -->

<!-- begin::main content -->
<main class="main-content bg-white" id="main-content">

    @yield('content')

</main>
<!-- end::main content -->

<!-- begin::global scripts -->

<script src="{{url('/assets/vendors/bundle.js')}}"></script>
<script src="{{url('assets/js/uploadimage.js')}}"></script>
<!-- end::global scripts -->

<!-- begin::chart -->
<script src="{{url('/assets/vendors/charts/chartjs/chart.min.js')}}"></script>
<script src="{{url('/assets/vendors/charts/sparkline/sparkline.min.js')}}"></script>
<script src="{{url('/assets/vendors/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{url('/assets/js/examples/charts.js')}}"></script>
<!-- end::chart -->

<script src="{{url('/assets/vendors/datepicker/daterangepicker.js')}}"></script>
<script src="{{url('/assets/js/examples/dashboard.js')}}"></script>

<!-- begin::vamp -->
<script src="{{url('/assets/vendors/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('/assets/vendors/vmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{url('/assets/js/examples/vmap.js')}}"></script>
<!-- end::vamp -->

<!-- begin::custom scripts -->
<script src="{{url('/assets/js/custom.js')}}"></script>
<script src="{{url('/assets/js/borderless.min.js')}}"></script>
<!-- end::custom scripts -->


<!-- begin::dataTable -->
<script src="{{url('/assets/vendors/dataTable/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/assets/vendors/dataTable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('/assets/vendors/dataTable/dataTables.responsive.min.js')}}"></script>
<script src="{{url('/assets/js/examples/datatable.js')}}"></script>
<!-- end::dataTable -->

<!-- begin::fullcalendar -->
<script src="{{url('/assets/vendors/fullcalendar/moment.min.js')}}"></script>
<script src="{{url('/assets/vendors/jquery/jquery-ui.min.js')}}"></script>
<script src="{{url('/assets/vendors/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{url('/assets/js/examples/fullcalendar.js')}}"></script>
<!-- end::fullcalendar -->

<!-- begin::clockpicker -->
<script src="../assets/vendors/clockpicker/bootstrap-clockpicker.min.js"></script>
<script src="../assets/js/examples/clockpicker.js"></script>
<!-- end::clockpicker -->

<!-- begin::datepicker -->
<script src="../assets/vendors/datepicker/daterangepicker.js"></script>
<script src="../assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->


<!-- begin::sweet alert demo -->
<script src="{{url('/assets/js/examples/sweet-alert.js')}}"></script>
<!-- begin::sweet alert demo -->
</body>

<!-- Mirrored from borderless.laborasyon.com/dark/dashboard-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:41:37 GMT -->
</html>