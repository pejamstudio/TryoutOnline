<!doctype html>
<html lang="en">

<!-- Mirrored from borderless.laborasyon.com/dark/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:43:22 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borderless - Admin Dashboard</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="../assets/vendors/bundle.css" type="text/css">
    <!-- end::global styles -->

    <!-- begin::dataTable -->
    <link rel="stylesheet" href="../assets/vendors/dataTable/responsive.bootstrap.min.css" type="text/css">
    <!-- end::dataTable -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="../assets/css/app.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/custom.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">

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
            <li >
                <a href="/guru">
                    <i class="icon fa fa-globe"></i>
                    <span>Dashboard</span>
                </a>
                
            </li>
            
            <li class="side-menu-divider m-t-10">Main Navigation</li>
            <li class="open">
                <a href="/guru/datasiswa">
                    <i class="icon ti-user"></i>
                    <span>Siswa</span>
                </a>
            </li>
            <li>
                <a href="/guru/datasoal">
                    <i class="icon ti-server"></i>
                    <span>Data Soal</span>
                </a>
                
            </li>
            
            <li class="side-menu-divider m-t-10">Report</li>
            <li>
                <a href="/guru/laporannilai">
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
        <div class="page-header">
            <h3>Data Soal</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Soal</a></li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->

        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                <a href="#" class="btn btn-primary">
                    <i class="fa fa-plus-square m-r-5"></i> Tambah Soal
                </a>
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Detail</button>
                                    <button class="dropdown-item" type="button"><i class="ti-pencil mr-3"></i>Edit</button>
                                    <button class="dropdown-item" type="button"><i class="ti-trash mr-3"></i>Hapus</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Detail</button>
                                    <button class="dropdown-item" type="button"><i class="ti-pencil mr-3"></i>Edit</button>
                                    <button class="dropdown-item" type="button"><i class="ti-trash mr-3"></i>Hapus</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Detail</button>
                                    <button class="dropdown-item" type="button"><i class="ti-pencil mr-3"></i>Edit</button>
                                    <button class="dropdown-item" type="button"><i class="ti-trash mr-3"></i>Hapus</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>


    </div>

</main>
<!-- end::main content -->

<!-- begin::global scripts -->
<script src="../assets/vendors/bundle.js"></script>
<!-- end::global scripts -->

<!-- begin::dataTable -->
<script src="../assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="../assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="../assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="../assets/js/examples/datatable.js"></script>
<!-- end::dataTable -->

<!-- begin::custom scripts -->
<script src="../assets/js/custom.js"></script>
<script src="../assets/js/borderless.min.js"></script>
<!-- end::custom scripts -->

</body>

<!-- Mirrored from borderless.laborasyon.com/dark/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:43:24 GMT -->
</html>