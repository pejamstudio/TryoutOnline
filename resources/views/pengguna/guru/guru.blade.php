

@extends('template')


@section('content')

    <div class="container">

        <!-- to set search -->
        <input type="" id="s" value="{{$search}}">

        <!-- begin::page header -->
        <div class="page-header">
            <h3>Data Guru</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                    <li class="breadcrumb-item active">Guru</li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->

        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('pengguna.guru.tambah')}}" class="btn btn-primary">
                    <i class="fa fa-plus-square m-r-5"></i> Tambah Guru
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
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Mata Pelajaran</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $p)
                        <tr>
                            <td>{{$p->nama}}</td>
                            <td>{{$p->nip}}</td>
                            <td>{{$p->email}}</td>
                            <td>
                                <?php 
                                    $i = 0;
                                    foreach ($mapel as $m) {
                                        if($m->id_guru == $p->id)
                                        {
                                            echo ($i+1).". ".$m->nama_mapel." ".$m->nama_kelas.'<br>';
                                            $i++;
                                        }
                                    }
                                 ?>
                            </td>
                            <td>{{$p->telp}}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{route('pengguna.guru.detail', $p->id_user)}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Detail</button></a>
                                        <a href="{{route('pengguna.guru.edit', $p->id)}}"><button class="dropdown-item" type="button"><i class="ti-pencil mr-3"></i>Edit</button></a>
                                        <form method="post" action="{{url('hapusguru', $p->id)}}">
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
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>Mata Pelajaran</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>

    </div>

@stop