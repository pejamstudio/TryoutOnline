
@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Profil</h3>
            </div>
        </div>
    

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">Data Diri {{$session}}</div>
                    <div class="card-body">
                        <form>
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
                            <div class="row">
                                <div class="col-md-5 text-center">
                                    <figure class="avatar" style="width: 80%; height: auto;">
                                        @if($session == 'Admin')
                                            <img src="{{url('/assets/images/logo/logo.png')}}" class="rounded">
                                        @elseif($session == 'Guru')
                                            <img src="{{url('/assets/images/foto/guru/'.$data->foto)}}" class="rounded">
                                        @else
                                            <img src="{{url('/assets/images/foto/siswa/'.$data->foto)}}" class="rounded">
                                        @endif
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <b>Nama</b>
                                        <p>{{$data->nama}}</p>
                                    </div>
                                    @if($session == 'Siswa')
                                    <div class="form-group">
                                        <b>NISN</b>
                                        <p>{{$data->nisn}}</p>
                                    </div>
                                    @elseif($session == 'Guru')
                                    <div class="form-group">
                                        <b>NIP</b>
                                        <p>{{$data->nip}}</p>
                                    </div>
                                    @endif
                                    @if($session != 'Admin')
                                    <div class="form-group">
                                        <b>Jenis Kelamin</b>
                                        <p>{{$data->jenis_kelamin}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Alamat</b>
                                        <p>{{$data->alamat}}</p>
                                    </div>
                                    <div class="form-group">
                                        <b>TTL</b>
                                        <p>{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</p>
                                    </div>
                                    @endif
                                    @if($session == 'Siswa')
                                    <div class="form-group">
                                        <b>Kelas</b>
                                        <p>{{$data->nama_kelas}}</p>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <b>Email</b>
                                        <p>{{$data->email}}</p>
                                    </div>
                                    @if($session != 'Admin')
                                    <div class="form-group">
                                        <b>Telepon</b>
                                        <p>{{$data->telp}}</p>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <b>Username</b>
                                        <p>{{$data->username}}</p>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-danger mr-1 mt-3" href="{{url('/dashboard')}}">Kembali</a>
                            @if($session != 'Admin')
                                <a class="btn btn-primary mr-1 mt-3" href="{{route('profil.edit')}}">Ubah Profil</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop