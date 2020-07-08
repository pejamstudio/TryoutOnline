

@extends('admin/template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header">
            <h3>Data Kelas</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active">Data Kelas</li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->

        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('master.kelas.tambah')}}" class="btn btn-primary">
                    <i class="fa fa-plus-square m-r-5"></i> Tambah Kelas
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
                                    <a href="{{route('master.kelas.edit')}}" class="dropdown-item"><i class="ti-pencil mr-3"></i>Edit</a>
                                    <a class="dropdown-item sweet-multiple"><i class="ti-trash mr-3"></i>Hapus</a>
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
                                    <a href="{{route('master.kelas.edit')}}" class="dropdown-item"><i class="ti-pencil mr-3"></i>Edit</a>
                                    <a class="dropdown-item sweet-multiple"><i class="ti-trash mr-3"></i>Hapus</a>
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
                                    <a href="{{route('master.kelas.edit')}}" class="dropdown-item"><i class="ti-pencil mr-3"></i>Edit</a>
                                    <a class="dropdown-item sweet-multiple"><i class="ti-trash mr-3"></i>Hapus</a><a href="{{route('master.kelas.edit')}}" class="dropdown-item"><i class="ti-pencil mr-3"></i>Edit</a>
                                    <a class="dropdown-item sweet-multiple"><i class="ti-trash mr-3"></i>Hapus</a>
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

@stop