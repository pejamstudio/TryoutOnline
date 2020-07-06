<!doctype html>
<html lang="en">

<!-- Mirrored from borderless.laborasyon.com/dark/dashboard-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:40:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borderless - Admin Dashboard</title>

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
<body class="dark">

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
            <li class="open">
                <a href="#">
                    <i class="icon fa fa-globe"></i>
                    <span>Dashboard</span>
                </a>
                
            </li>
            
            <li class="side-menu-divider m-t-10">Main Navigation</li>
            <li>
                <a href="#">
                    <i class="icon ti-user"></i>
                    <span>Pengguna</span>
                </a>
                <ul>
                    <li><a href="alerts.html">Guru </a></li>
                    <li><a href="badge.html">Siswa </a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="icon ti-server"></i>
                    <span>Data Master</span>
                </a>
                <ul>
                    <li><a href="sweet-alert.html">Data Jurusan </a></li>
                    <li><a href="lightbox.html">Data Kelas </a></li>
                    <li><a href="toast.html">Data Mata Pelajaran </a></li>
                    <li><a href="tour.html">Data Soal </a></li>
                </ul>
            </li>
            
            <li class="side-menu-divider m-t-10">Report</li>
            <li>
                <a href="#">
                    <i class="icon ti-clipboard"></i> 
                    <span>Nilai</span> 
                </a>
            </li>
            
        </ul>
        
    </div>
</div>
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
                            <h6 class="text-uppercase font-size-12 m-b-0">Kenneth Hune</h6>
                        </div>
                        <div class="dropdown-menu-body">
                            <div class="bg-light p-t-b-15 p-l-r-20">
                                <h6 class="text-uppercase font-size-11">Profile completion</h6>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <a href="#" class="list-group-item link-2">Profile</a>
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

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Dashboard</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
            <div>
                <div class="dropdown m-r-5">
                    <button id="btnGroupDrop1" type="button" class="btn btn-success btn-uppercase dropdown-toggle"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Download Report
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="#">Pdf</a>
                        <a class="dropdown-item" href="#">Excel</a>
                        <a class="dropdown-item" href="#">File</a>
                    </div>
                </div>
                <a href="#" class="btn btn-warning btn-uppercase">
                    <i class="fa fa-external-link m-r-5"></i> Export
                </a>
            </div>
        </div>
        <!-- end::page header -->

        <div class="row row-sm">
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Conversion Rate</h6>
                                <h4 class="m-b-0">
                                    0.32%
                                    <small data-toggle="tooltip" title="Than last week"
                                           class="text-success font-size-11">
                                        1.2%
                                        <i class="ti-arrow-up"></i>
                                    </small>
                                </h4>
                            </div>
                            <div>
                                <div class="sparkline-demo1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Unique Purchases</h6>
                                <h4 class="m-b-0">
                                    3,137
                                    <small data-toggle="tooltip" title="Than last week"
                                           class="text-danger font-size-11">
                                        0.2%
                                        <i class="ti-arrow-down"></i>
                                    </small>
                                </h4>
                            </div>
                            <div>
                                <div class="sparkline-demo2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Avg. Order Value</h6>
                                <h4 class="m-b-0">
                                    $306.20
                                    <small data-toggle="tooltip" title="Than last week"
                                           class="text-danger font-size-11">
                                        2.1%
                                        <i class="ti-arrow-down"></i>
                                    </small>
                                </h4>
                            </div>
                            <div>
                                <div class="sparkline-demo3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Order Quantity</h6>
                                <h4 class="m-b-0">
                                    1,650
                                    <small data-toggle="tooltip" title="Than last week"
                                           class="text-success font-size-11">
                                        1.2%
                                        <i class="ti-arrow-up"></i>
                                    </small>
                                </h4>
                            </div>
                            <div>
                                <div class="sparkline-demo4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="card-title">Sales Report</h6>
                                <h6 class="card-subtitle">Sales graph of last 7 months</h6>
                            </div>
                            <div class="reportrange btn btn-sm">
                                <i class="ti-calendar m-r-10"></i>
                                <span></span>
                                <i class="ti-angle-down m-l-10"></i>
                            </div>
                        </div>
                        <div class="row row-sm m-b-20">
                            <div class="col-md-6">
                                <h5 class="font-size-23">$560.234,076</h5>
                                <h6 class="text-uppercase font-size-11">Total Sales</h6>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-size-23">$620,076</h5>
                                <h6 class="text-uppercase font-size-11">Average</h6>
                            </div>
                        </div>
                        <canvas id="chart_demo_1"></canvas>
                    </div>
                </div>
                <div class="row row-sm">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Total Customers</div>
                            <div class="card-body text-center">
                                <h2 class="text-danger">752</h2>
                                <p class="m-b-0">
                                    <i class="fa fa-caret-up text-primary m-r-5"></i> 23% increase in Last week
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Average Order Value</div>
                            <div class="card-body text-center">
                                <h2 class="text-success">$32.52</h2>
                                <p class="m-b-0">
                                    <i class="fa fa-caret-down text-danger m-r-5"></i> 4 lead less than last week
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-body d-flex justify-content-between align-items-center flex-lg-row">
                            <span>
                                <span class="icon-block bg-success icon-block-floating icon-block-sm m-r-10">
                                    <i class="fa fa-download font-size-16"></i>
                                </span>
                                Report prepared. You can download it now
                            </span>
                            <a href="#" class="btn btn-sm btn-success btn-uppercase">Download</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="card-title">Regional Sales</h6>
                                <h6 class="card-subtitle">Graph of total sales of regions. Total and returned
                                    sales.</h6>
                            </div>
                            <div>
                                <div class="btn-group">
                                    <button class="btn btn-light btn-sm btn-uppercase active">Yearly</button>
                                    <button class="btn btn-light btn-sm btn-uppercase">Monthly</button>
                                </div>
                            </div>
                        </div>
                        <canvas id="chart_demo_9"></canvas>
                        <div class="row row-sm">
                            <div class="col-md-4 m-t-20">
                                <h5 class="font-size-23 text-primary">$134.234,076</h5>
                                <h6 class="text-uppercase font-size-11 m-b-0">Total Sales</h6>
                            </div>
                            <div class="col-md-4 m-t-20">
                                <h5 class="font-size-23 text-warning">$1.620,076</h5>
                                <h6 class="text-uppercase font-size-11 m-b-0">Average</h6>
                            </div>
                            <div class="col-md-4 m-t-20">
                                <h5 class="font-size-23 text-danger">$20,076</h5>
                                <h6 class="text-uppercase font-size-11 m-b-0">Return</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Product Sales</h6>
                        <div class="m-b-20 d-flex align-items-center">
                            <div class="icon-block icon-block-outline-success icon-block-floating m-r-10">
                                <i class="fa fa-cube font-size-18"></i>
                            </div>
                            <h2 class="m-0">65,353</h2>
                        </div>
                        <div class="row row-sm">
                            <div class="col-md-6">
                                <h3 class="m-b-10">
                                    4,324
                                    <small class="text-uppercase font-size-11 m-l-5">Total Price</small>
                                </h3>
                                <div class="progress m-b-10" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <i class="fa fa-caret-up text-success"></i> 10% decrease
                            </div>
                            <div class="col-md-6">
                                <h3 class="m-b-10">
                                    2,214
                                    <small class="text-uppercase font-size-11 m-l-5">Total Stock</small>
                                </h3>
                                <div class="progress m-b-10" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <i class="fa fa-caret-down text-danger"></i> 14% increases
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row row-sm">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Sales Channels
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="js-card-refresh link-1">
                                    <i class="fa fa-refresh"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <a href="#" class="link-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Action</a>
                                        <a href="#" class="dropdown-item">Another action</a>
                                        <a href="#" class="dropdown-item">Something else here</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="m-b-30 text-center">
                            <div class="position-relative">
                                <div id="circle-1" class="circle"></div>
                                <div class="position-absolute a-0 d-flex flex-column align-items-center justify-content-center">
                                    <h3 class="m-b-0">65%</h3>
                                    <span class="font-size-11 text-uppercase">Average</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6>Google</h6>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1" style="height: 5px">
                                    <div class="progress-bar bg-google" role="progressbar" style="width: 42%;"
                                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="small m-l-10">42%</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6>Instagram</h6>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1" style="height: 5px">
                                    <div class="progress-bar bg-instagram" role="progressbar" style="width: 34%;"
                                         aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="small m-l-10">34%</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h6>Whatsapp</h6>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1" style="height: 5px">
                                    <div class="progress-bar bg-whatsapp" role="progressbar" style="width: 60%;"
                                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="small m-l-10">60%</span>
                            </div>
                        </div>
                        <div>
                            <h6>Facebook</h6>
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1" style="height: 5px">
                                    <div class="progress-bar bg-facebook" role="progressbar" style="width: 20%;"
                                         aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="small m-l-10">20%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Purchase Status</div>
                    <div class="card-body">
                        <div class="m-b-20 d-flex justify-content-between align-items-center">
                            <ul class="list-inline m-l-5">
                                <li class="list-inline-item text-uppercase font-size-11">
                                    <i class="fa fa-circle text-success m-r-5"></i> Success
                                </li>
                                <li class="list-inline-item text-uppercase font-size-11">
                                    <i class="fa fa-circle text-danger m-r-5"></i> Return
                                </li>
                            </ul>
                            <div class="reportrange btn btn-outline-light">
                                <i class="ti-calendar m-r-10"></i>
                                <span></span>
                                <i class="ti-angle-down m-l-10"></i>
                            </div>
                        </div>
                        <canvas id="chart_demo_3"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Your Most Recent Earnings</h6>
                        <div class="row row-sm">
                            <div class="col-md-4">
                                <div class="d-flex align-items-center m-b-20">
                                    <div class="icon-block m-r-15 icon-block-lg icon-block-outline-success text-success">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-uppercase font-size-11">Gross Earnings</h6>
                                        <h4 class="m-b-0">$1,958,104</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center m-b-20">
                                    <div class="icon-block m-r-15 icon-block-lg icon-block-outline-danger  text-danger">
                                        <i class="fa fa-hand-lizard-o"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-uppercase font-size-11">Tax Withheld</h6>
                                        <h4 class="m-b-0">$234,769</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center m-b-20">
                                    <div class="icon-block m-r-15 icon-block-lg icon-block-outline-warning text-warning">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-uppercase font-size-11">Net Earnings</h6>
                                        <h4 class="m-b-0">$1,608,469</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table m-b-0">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Sales Count</th>
                                    <th>Gross Earnings</th>
                                    <th>Tax Withheld</th>
                                    <th class="text-right">Net Earnings</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>03/15/2018</td>
                                    <td>1,050</td>
                                    <td class="text-success">+ $32,580.00</td>
                                    <td class="text-danger">- $3,023.10</td>
                                    <td class="text-right">$28,670.90</td>
                                </tr>
                                <tr>
                                    <td>03/14/2018</td>
                                    <td>780</td>
                                    <td class="text-success">+ $30,065.10</td>
                                    <td class="text-danger">- $2,780.00</td>
                                    <td class="text-right">$26,930.40</td>
                                </tr>
                                <tr>
                                    <td>03/13/2018</td>
                                    <td>1.980</td>
                                    <td class="text-success">+ $30,065.10</td>
                                    <td class="text-danger">- $2,780.00</td>
                                    <td class="text-right">$26,930.40</td>
                                </tr>
                                <tr>
                                    <td>03/12/2018</td>
                                    <td>300</td>
                                    <td class="text-success">+ $30,065.10</td>
                                    <td class="text-danger">- $2,780.00</td>
                                    <td class="text-right">$26,930.40</td>
                                </tr>
                                <tr>
                                    <td>03/11/2018</td>
                                    <td>940</td>
                                    <td class="text-success">+ $30,065.10</td>
                                    <td class="text-danger">- $2,780.00</td>
                                    <td class="text-right">$26,930.40</td>
                                </tr>
                                <tr>
                                    <td>03/10/2018</td>
                                    <td>1.280</td>
                                    <td class="text-success">+ $30,065.10</td>
                                    <td class="text-danger">-$2,780.00</td>
                                    <td class="text-right">$26,930.40</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <i class="fa fa-download font-size-50 text-muted m-r-20 m-t-5"></i>
                            <div>
                                <h6>Download your earnings in CSV format</h6>
                                <div class="row row-sm">
                                    <div class="col-md-6">
                                        <p class="text-muted m-b-0">Open it in a spreadsheet and perform your own
                                            calculations, graphing etc. The
                                            CSV file contains additional details, such as the buyer location.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="reportrange btn btn-outline-primary btn-block">
                                            <i class="ti-calendar m-r-10"></i>
                                            <span></span>
                                            <i class="ti-angle-down m-l-10"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>Income Distribution</span>
                        <div class="dropdown">
                            <a class="btn btn-outline-light btn-sm" href="#" data-toggle="dropdown">
                                USA <i class="ti-angle-down m-l-5"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">USA</a>
                                <a href="#" class="dropdown-item">Germany</a>
                                <a href="#" class="dropdown-item">France</a>
                                <a href="#" class="dropdown-item">Italy</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="vmap_usa_en" style="height: 300px"></div>
                        <div class="table-responsive">
                            <table class="table table-borderless m-b-0">
                                <thead>
                                <tr>
                                    <th class="wd-40">States</th>
                                    <th class="wd-25 text-right">Orders</th>
                                    <th class="wd-35 text-right">Earnings</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="tx-medium">California</td>
                                    <td class="text-right">12,201</td>
                                    <td class="text-right text-success">$150,200.80</td>
                                </tr>
                                <tr>
                                    <td class="tx-medium">Texas</td>
                                    <td class="text-right">11,950</td>
                                    <td class="text-right text-success">$138,910.20</td>
                                </tr>
                                <tr>
                                    <td class="tx-medium">Wyoming</td>
                                    <td class="text-right">11,198</td>
                                    <td class="text-right text-success">$132,050.00</td>
                                </tr>
                                <tr>
                                    <td class="tx-medium">Florida</td>
                                    <td class="text-right">9,885</td>
                                    <td class="text-right text-success">$127,762.10</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        New Customers
                        <a href="#" class="js-card-refresh link-1">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm avatar-state-success m-r-15">
                                    <span class="avatar-title bg-primary rounded-circle">V</span>
                                </figure>
                                <div>
                                    <h6 class="m-b-0">Valentine Maton</h6>
                                    <small class="text-muted">Engineer</small>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">View</a>
                                        <a href="#" class="dropdown-item">Send Message</a>
                                        <a href="#" class="dropdown-item">Assign</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm avatar-state-success m-r-15">
                                    <img src="../assets/media/image/avatar.jpg" class="rounded-circle" alt="image">
                                </figure>
                                <div>
                                    <h6 class="m-b-0">Holmes Cherryman</h6>
                                    <small class="text-muted">Human resources</small>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">View</a>
                                        <a href="#" class="dropdown-item">Send Message</a>
                                        <a href="#" class="dropdown-item">Assign</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm avatar-state-success m-r-15">
                                    <span class="avatar-title bg-primary rounded-circle">AE</span>
                                </figure>
                                <div>
                                    <h6 class="m-b-0">Malanie Hanvey</h6>
                                    <small class="text-muted">Real estate agent</small>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">View</a>
                                        <a href="#" class="dropdown-item">Send Message</a>
                                        <a href="#" class="dropdown-item">Assign</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm avatar-state-success m-r-15">
                                    <span class="avatar-title bg-dark rounded-circle">KC</span>
                                </figure>
                                <div>
                                    <h6 class="m-b-0">Kenneth Hune</h6>
                                    <small class="text-muted">Engineer</small>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">View</a>
                                        <a href="#" class="dropdown-item">Send Message</a>
                                        <a href="#" class="dropdown-item">Assign</a>
                                    </div>
                                </div>
                            </li>
                            <a href="#" class="list-group-item text-center text-uppercase font-size-11 p-b-0">
                                View All
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Users Assigned to Me
                        <a href="#" class="js-card-refresh link-1">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <span class="avatar-title bg-success rounded-circle">E</span>
                                </figure>
                                <div>
                                    <h6 class="m-b-0">Emma Maton</h6>
                                    <small class="text-muted">Engineer</small>
                                </div>
                                <span class="badge badge-danger ml-auto">Denied</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <span class="avatar-title bg-danger rounded-circle">K</span>
                                </figure>
                                <div>
                                    <h6 class="m-b-0">Kevin Cherryman</h6>
                                    <small class="text-muted">Human resources</small>
                                </div>
                                <span class="badge badge-success ml-auto">Completed</span>
                            </li>
                            <li href="#" class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <span class="avatar-title bg-warning rounded-circle">SA</span>
                                </figure>
                                <div>
                                    <h6 class="m-b-0">Sarah Hanvey</h6>
                                    <small class="text-muted">Real estate agent</small>
                                </div>
                                <span class="badge badge-warning ml-auto">Pending</span>
                            </li>
                            <li href="#" class="list-group-item d-flex align-items-center p-l-r-0">
                                <figure class="avatar avatar-sm m-r-15">
                                    <span class="avatar-title bg-info rounded-circle">T</span>
                                </figure>
                                <div>
                                    <h6 class="m-b-0">Thomas Hune</h6>
                                    <small class="text-muted">Engineer</small>
                                </div>
                                <span class="badge badge-success ml-auto">Completed</span>
                            </li>
                            <a href="#" class="list-group-item text-center text-uppercase font-size-11 p-b-0">
                                View All
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Daily Task List
                        <a href="#" class="js-card-refresh link-1">
                            <i class="fa fa-refresh"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label d-flex justify-content-between" for="customCheck1">Talk
                                to new customers
                                <small class="text-muted font-size-11">13 May 2019</small>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox-success custom-checkbox-success custom-checkbox todo-item">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                            <label class="custom-control-label d-flex justify-content-between" for="customCheck2">Older
                                users will be deleted from
                                the system
                                <small class="text-muted font-size-11">20 Apr 2019</small>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label d-flex justify-content-between" for="customCheck3">Assignment
                                will be
                                completed
                                <small class="text-muted font-size-11">13 May 2019</small>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                            <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                            <label class="custom-control-label d-flex justify-content-between" for="customCheck4">Customer
                                notes
                                <small class="text-muted font-size-11">10 Jan 2018</small>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                            <label class="custom-control-label d-flex justify-content-between" for="customCheck5">Clear
                                old log records and backup
                                will be taken
                                <small class="text-muted font-size-11">13 May 2019</small>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox todo-item">
                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                            <label class="custom-control-label d-flex justify-content-between" for="customCheck6">Talk
                                to new customers
                                <small class="text-muted font-size-11">27 Feb 2019</small>
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox-success custom-checkbox todo-item">
                            <input type="checkbox" class="custom-control-input" id="customCheck7" checked>
                            <label class="custom-control-label d-flex justify-content-between" for="customCheck7">Older
                                users will be deleted from
                                the system
                                <small class="text-muted font-size-11">13 May 2019</small>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

</body>

<!-- Mirrored from borderless.laborasyon.com/dark/dashboard-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:41:37 GMT -->
</html>