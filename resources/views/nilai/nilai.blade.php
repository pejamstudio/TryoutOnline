

@extends('template')


@section('content')

    <div class="container">

        <input type="" id="s" value="{{$search}}">

        <!-- begin::page header -->
        <div class="page-header">
            <h3>Nilai</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>Nilai</a></li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->

        <div class="card">
            <div class="card-header bg-primary">Daftar Nilai</div>
            <div class="card-body">
            <div class="table-responsive">
                
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Siswa</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>{{$d->nama_mapel}}</td>
                                <td>{{$d->nip}}</td>
                                <td>{{$d->nisn}}</td>
                                <td>{{$d->nilai}}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-center">
                                            <a href="{{url('nilai/detail', $d->id)}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Detail</button></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Siswa</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>

    </div>

@stop