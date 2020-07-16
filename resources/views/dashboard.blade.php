
@extends('template')


@section('content')

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
        </div>
        @if($session != 'Siswa')
        <div class="row row-sm">
            
            <!-- Jumlah Kelas -->
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Jumlah Kelas</h6>
                                <h4 class="m-b-0">
                                    {{$kelas}}
                                </h4>
                            </div>
                            <div>
                                <i class="ti-bookmark-alt font-size-30"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumlah Mapel -->
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Jumlah Mapel</h6>
                                <h4 class="m-b-0">
                                    {{$mapel}}
                                </h4>
                            </div>
                            <div>
                                <i class="ti-book font-size-30"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumlah Guru -->
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card bg-danger">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Jumlah Guru</h6>
                                <h4 class="m-b-0">
                                    {{$guru}}
                                </h4>
                            </div>
                            <div>
                                <i class="ti-user font-size-30"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jumlah Siswa -->
            <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                <div class="card bg-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">

                            <div>
                                <h6 class="text-uppercase font-size-11 m-b-15">Jumlah Siswa</h6>
                                <h4 class="m-b-0">
                                    {{$siswa}}
                                </h4>
                            </div>
                            <div>
                                <i class="ti-user font-size-30"></i>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

@stop