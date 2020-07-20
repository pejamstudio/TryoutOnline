

@extends('template')


@section('content')

    <div class="container">

        <!-- to set search -->
        <input type="" id="s" name="" value="{{$id}}">

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
                @if(\Session::has('alert'))
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                @endif
                @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i =>$p)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$p->nama_kelas}}</td>
                            <td>{{$p->nama_jurusan}}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{url('master/detailkelas', $p->nama_kelas)}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Data Siswa</button></a>
                                        <a href=""><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Data Jadwal</button></a>
                                        <a href="{{route('master.kelas.edit', $p->id)}}"><button class="dropdown-item" type="button"><i class="ti-pencil mr-3"></i>Edit</button></a>
                                        <form method="post" action="{{url('master/hapuskelas', $p->id)}}">
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i class="ti-trash mr-3"></i>Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>

    </div>

@stop