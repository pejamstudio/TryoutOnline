
@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Detail Siswa</h3>
            </div>
        </div>
    

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-5 text-center">
                                    <figure class="avatar" style="width: 80%; height: auto;">
                                        <img src="{{url('/assets/images/foto/siswa/'.$data->foto)}}" class="rounded">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <b>Nama</b>
                                        <p>{{$data->nama}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>NISN</b>
                                        <p>{{$data->nisn}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Jenis Kelamin</b>
                                        <p>{{$data->jenis_kelamin}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Email</b>
                                        <p>{{$data->email}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Alamat</b>
                                        <p>{{$data->alamat}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>TTL</b>
                                        <p>{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Telepon</b>
                                        <p>{{$data->telp}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Username</b>
                                        <p>{{$data->username}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Jurusan</b>
                                        <p>{{$data->nama_jurusan}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Kelas</b>
                                        <p>{{$data->nama_kelas}}</p>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-danger mr-1 mt-3" href="{{route('pengguna.siswa.siswa')}}">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop