

@extends('admin/template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header">
            <h3>Data Soal</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active">Data Soal</li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">Detail Tryout</div>
                    <div class="card-body">

                        <div class="form-group">
                            <b>Nama Tryout</b>
                            <p>Tryout Kimia</p>
                        </div>
                        <div class="form-group">
                            <b>Deskripsi</b>
                            <p>Ini Tryout Kimia</p>
                        </div>
                        <div class="form-group">
                            <b>KKM</b>
                            <p>70</p>
                        </div>
                        <div class="form-group">
                            <b>Waktu</b>
                            <p>60 Menit</p>
                        </div>
                        <a class="btn btn-primary mr-1 mt-3" href="{{route('master.soal.edit')}}">Ubah Paket Soal</a>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{route('master.soal.tambah')}}" class="btn btn-primary">
                            <i class="fa fa-plus-square m-r-5"></i> Tambah Paket Soal
                        </a>
                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID Soal</th>
                                <th>Nama Tryout</th>
                                <th>Deskripsi</th>
                                <th>KKM</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tryout Kimia</td>
                                <td>Ini Tryout Kimia</td>
                                <td>70</td>
                                <td>60</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('master.soal.detail')}}" class="dropdown-item"><i class="ti-info mr-3"></i>Detail</a>
                                            <a href="{{route('master.soal.edit')}}" class="dropdown-item"><i class="ti-pencil mr-3"></i>Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tryout Biologi</td>
                                <td>Ini Tryout Biologi</td>
                                <td>70</td>
                                <td>60</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('pengguna.guru.detail')}}" class="dropdown-item"><i class="ti-info mr-3"></i>Detail</a>
                                            <a href="{{route('pengguna.guru.edit')}}" class="dropdown-item"><i class="ti-pencil mr-3"></i>Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tryout Sosiologi</td>
                                <td>Ini Tryout Sosiologi</td>
                                <td>70</td>
                                <td>60</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{route('pengguna.guru.detail')}}" class="dropdown-item"><i class="ti-info mr-3"></i>Detail</a>
                                            <a href="{{route('pengguna.guru.edit')}}" class="dropdown-item"><i class="ti-pencil mr-3"></i>Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID Soal</th>
                                <th>Nama Tryout</th>
                                <th>KKM</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>

@stop