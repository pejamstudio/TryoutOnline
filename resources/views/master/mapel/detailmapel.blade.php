

@extends('template')


@section('content')

    <div class="container">

        <input type="" id="s" value="">
        <!-- begin::page header -->
        <div class="page-header">
            <h3>Data Soal</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item"><a href="{{route('master.mapel')}}">Data Mata Pelajaran</a></li>
                    <li class="breadcrumb-item active">Data Soal</li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">Detail Mata Pelajaran</div>
                    <div class="card-body">

                        <div class="form-group">
                            <b>Nama Pelajaran</b>
                            <p>{{$mapel->nama_mapel}}</p>
                        </div>
                        <div class="form-group">
                            <b>Deskripsi</b>
                            <p>{{$mapel->deskripsi}}</p>
                        </div>
                        <div class="form-group">
                            <b>Guru</b>
                            <p>{{$mapel->nama}}</p>
                        </div>
                        <div class="form-group">
                            <b>Kelas</b>
                            <p>{{$mapel->nama_kelas}}</p>
                        </div>
                        <div class="form-group">
                            <b>KKM</b>
                            <p>{{$mapel->kkm}}</p>
                        </div>
                        <div class="form-group">
                            <b>Jumlah Soal</b>
                            <p>
                                <?php 
                                    echo count($soal);
                                 ?>
                                /{{$mapel->jumlah_soal}}
                            </p>
                        </div>
                        <div class="form-group">
                            <b>Waktu</b>
                            <p>{{$mapel->durasi}} menit</p>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">Daftar Soal</div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <?php 
                            if ($mapel->jumlah_soal > 0 && count($soal) < $mapel->jumlah_soal) {
                         ?>
                         <a href="{{route('master.soal.tambah', $mapel->id)}}" class="btn btn-primary">
                            <i class="fa fa-plus-square m-r-5"></i> Tambah Soal
                        </a>
                         <?php 
                            }
                         ?>
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
                                <th>Soal</th>
                                <th>Kunci Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($soal as $i => $sl)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{$sl->soal}}</td>
                                    <td>{{$sl->kunci}}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{url('master/mapel/datasoal/detail', $sl->id)}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Detail</button></a>
                                                <a href="{{url('master/mapel/datasoal/edit', $sl->id)}}"><button class="dropdown-item" type="button"><i class="ti-pencil mr-3"></i>Edit</button></a>
                                                <form method="post" action="{{url('master/hapussoal', $sl->id)}}">
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
                                <th>Soal</th>
                                <th>Kunci Jawaban</th>
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