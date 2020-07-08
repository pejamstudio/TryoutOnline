<!doctype html>
<html lang="en">

<!-- Mirrored from borderless.laborasyon.com/dark/dashboard-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:40:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tryout Online - Admin Dashboard</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="../assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::datepicker -->
    <link rel="stylesheet" href="../assets/vendors/datepicker/daterangepicker.css">
    <!-- begin::datepicker -->

    <!-- begin::vmap -->
    <link rel="stylesheet" href="../assets/vendors/vmap/jqvmap.min.css">
    <!-- begin::vmap -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="../assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/custom.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">
    <!-- end::custom styles -->

</head>
<body class="">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>Loading</span>
</div>
<!-- end::page loader -->



<!-- begin::side menu -->

    @yield('side_menu')
<!-- end::side menu -->

<!-- begin::navbar -->
<nav class="navbar">
    <div class="container-fluid">

        <div class="header-logo">
            <a href="#">
                <img class="d-none d-lg-block" src="../assets/media/image/dark-logo.png" alt="...">
                <img class="d-lg-none d-sm-block" src="../assets/media/image/mobile-logo.png" alt="...">
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
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                        <div class="dropdown-menu-title text-center"
                             data-backround-image="../assets/media/image/image1.png">
                            <figure class="avatar avatar-state-success avatar-sm m-b-10 bring-forward">
                                <img src="../assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                            </figure>
                            <h6 class="text-uppercase font-size-12 m-b-0">Rian Dwi Susanto</h6>
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
                                <a href="#" class="list-group-item link-2">Profile</a>
                                <a href="#" class="list-group-item link-2 sidebar-open" data-sidebar-target="#settings">Settings</a>
                                <a href="#" class="list-group-item text-danger">Logout</a>
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
<main class="main-content">

    @yield('content')

</main>
<!-- end::main content -->

<!-- begin::global scripts -->
<script src="../assets/vendors/bundle.js"></script>
<!-- end::global scripts -->

<!-- begin::chart -->
<script src="../assets/vendors/charts/chartjs/chart.min.js"></script>
<script src="../assets/vendors/charts/sparkline/sparkline.min.js"></script>
<script src="../assets/vendors/circle-progress/circle-progress.min.js"></script>
<script src="../assets/js/examples/charts.js"></script>
<!-- end::chart -->

<script src="../assets/vendors/datepicker/daterangepicker.js"></script>
<script src="../assets/js/examples/dashboard.js"></script>

<!-- begin::vamp -->
<script src="../assets/vendors/vmap/jquery.vmap.min.js"></script>
<script src="../assets/vendors/vmap/maps/jquery.vmap.usa.js"></script>
<script src="../assets/js/examples/vmap.js"></script>
<!-- end::vamp -->

<!-- begin::custom scripts -->
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/borderless.min.js"></script>
<!-- end::custom scripts -->

<script src="../assets/js/uploadimage.js"></script>

</body>

<!-- Mirrored from borderless.laborasyon.com/dark/dashboard-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:41:37 GMT -->
</html>