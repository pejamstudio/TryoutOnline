

@extends('template')


@section('content')

    <div class="container">

        <!-- to set search -->
        <input type="" id="s" name="" value="">

        <!-- begin::page header -->
        <div class="page-header">
            <h3>Data Mata Pelajaran</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active">Data Mata Pelajaran</li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->

        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                @if($session != 'Siswa')
                    <a  
                        <?php 
                            if ($session == 'Admin') {
                        ?>
                                href="{{url('master/mapel/tambah')}}";
                        <?php
                            }
                            else if($session == 'Guru')
                            {
                                echo 'href="" data-target="#pilihmapel" 
                                            data-toggle="modal"';
                            }
                         ?>
                        class="btn btn-primary">
                        <i class="fa fa-plus-square m-r-5"></i> Tambah Mata Pelajaran
                    </a>
                @endif
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
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>KKM</th>
                        @if($session != 'Siswa')
                            <th>Aksi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $p)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$p->nama_mapel}}</td>
                            <td>
                            <?php 
                                if($session != 'Siswa')
                                {
                                    foreach ($mapel as $d) {
                                        if($d->nama_mapel == $p->nama_mapel)
                                        {
                                            echo $d->nama_kelas."<br>";
                                        }
                                    }
                                }
                                else
                                {
                                    echo $p->nama_kelas;
                                }
                             ?>
                            </td>
                            <td>{{$p->kkm}}</td>
                            @if($session != 'Siswa')
                                <td class="text-center">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <?php 
                                            if ($session == 'Admin') {
                                        ?>
                                           <a href="{{url('master/detailmapel', $p->nama_mapel)}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Data Guru</button></a> 
                                        <?php
                                            }
                                         ?>
                                         <a href="#"
                                        data-target="#data_soal" 
                                        data-toggle="modal"
                                        data-id="{{ $p->nama_mapel}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Data Soal</button></a>
                                        <!-- <a href="{{url('master/mapel/datasoal', $p->id)}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Data Soal</button></a> -->
                                        <?php 
                                            if ($session == 'Admin' ) {
                                        ?>
                                        <a href="#setjadwal" 
                                        data-target="#setjadwal" 
                                        data-toggle="modal" 
                                        data-id="{{$p->nama_mapel}}"><button class="dropdown-item"><i class="ti-pencil mr-3"></i>Tentukan Jadwal</button></a>
                                        <a href="{{url('master/mapel/edit', $p->id)}}"><button class="dropdown-item" type="button"><i class="ti-pencil mr-3"></i>Edit</button></a>
                                        <?php
                                            }
                                        ?>
                                        <?php 
                                            if ($session == 'Admin') {
                                        ?>
                                        <form method="post" action="{{url('mapel/hapus', $p->id)}}">
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i class="ti-trash mr-3"></i>Hapus</button>
                                        <?php
                                            }
                                        ?>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>KKM</th>
                        @if($session != 'Siswa')
                            <th>Aksi</th>
                        @endif
                    </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>

        <div class="modal fade" id="setjadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tentukan jadwal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Kelas</label>
                            <div class="mb-2">
                                <p id="sx">
                                    <p id="tx"></p>
                                </p>
                                <!-- @foreach($mapel as $i => $d)
                                    @if($d->nama_mapel == $p->nama_mapel)
                                        <a href="#jadwal{{$d->id}}"
                                        data-target="#jadwal{{$d->id}}" 
                                        data-toggle="modal" 
                                        data-id="{{$d->id}}"><button class="form-control">{{$d->nama_kelas}}</button></a><br>
                                    @endif
                                @endforeach -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($mapel as $i => $p)
        <div class="modal fade" id="jadwal{{$p->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tentukan Jadwal Tryout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form autocomplete="off" method="post" action="{{url('mapel/setjadwal', $p->id)}}">
                            {{ csrf_field()}}
                            <div class="form-group text-center">
                                <label class="col-sm-3 col-form-label">{{$p->nama_mapel}} {{$p->nama_kelas}}</label>
                            </div>
                            <div class="form-group row row-sm">
                                <label class="col-sm-3 col-form-label">Jadwal</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" placeholder="Tanggal" name="tanggal"
                                    value="{{$p->tanggal}}" 
                                    >
                                </div>
                                <div class="col-sm-4">
                                    <input type="time" class="form-control" placeholder="Waktu" name="waktu" value="{{$p->waktu}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-9">
                                    <button type="submit" id="btn-save" class="btn btn-primary">Buat</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="modal fade" id="data_soal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Data Soal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Kelas</label>
                            <div class="mb-2">
                                <p id="x">
                                    <p id="y"></p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- guru -->
        <div class="modal fade" id="pilihmapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mata Pelajaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('tambahmapelguru')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Pilih Mata Pelajaran Yang Akan Diampu</label>
                                <div class="mb-2">
                                    @foreach($mapel_guru as $k)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="{{$k->id}}" name="mapelguru[]">
                                            <label class="form-check-label" for="inlineCheckbox">  
                                            {{$k->nama_mapel}} {{$k->nama_kelas}} <br></label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center">
                                    @if(count($mapel_guru) == 0)
                                        <p>Data mata pelajaran masih kosong. Hubungi admin untuk menambahkan</p>
                                    @else
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('script')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
            $(document).ready(function () {
                $("#data_soal").on("show.bs.modal", function (e) {
                    var nama = $(e.relatedTarget).data('id');
                    var data = <?php echo json_encode($mapel) ?>;
                    $.each(data, function() {
                        if (this.nama_mapel == nama) {
                            var url = '{{ url("master/mapel/datasoal") }}';
                            $('#y').append(
                                '<a href="'+url+'/'+this.id+'"><button class="form-control">'+this.nama_kelas+'</button></a><br>'
                            );
                        }
                    });
                });
            });
            $(document).ready(function () {
                $("#data_soal").on("hide.bs.modal", function (e) {
                    $('#y').remove();
                    $('#x').append('<p id="y"></p>');
                });
            });

            $(document).ready(function () {
                $("#setjadwal").on("show.bs.modal", function (e) {
                    var nama = $(e.relatedTarget).data('id');
                    var data = <?php echo json_encode($mapel) ?>;
                    console.log(data);
                    $.each(data, function() {
                        if (this.nama_mapel == nama) {
                            $('#tx').append(
                                '<a href="#jadwal'+this.id+'" data-target="#jadwal'+this.id+'" data-toggle="modal" data-id="'+this.id+'"><button class="form-control">'+this.nama_kelas+'</button></a><br>'
                            );
                        }
                    });
                });
            });
            $(document).ready(function () {
                $("#setjadwal").on("hide.bs.modal", function (e) {
                    $('#tx').remove();
                    $('#sx').append('<p id="tx"></p>');
                });
            });
    </script>
@stop