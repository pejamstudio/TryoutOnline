
@extends('admin/template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Detail Guru</h3>
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
                                        <img src="{{url('/assets/media/image/avatar.jpg')}}" class="rounded">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <b>Nama</b>
                                        <p>Iqbalul Hidayat</p>
                                    </div>
                                    <div class="form-group">
                                        <b>NIP</b>
                                        <p>17051204011</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Jenis Kelamin</b>
                                        <p>Laki - laki</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Jenis Kelamin</b>
                                        <p>Laki - laki</p>
                                    </div>
                                    <div class="form-group">
                                        <b>Email</b>
                                        <p>iqbalul.hidayat2801@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-danger mr-1 mt-3" href="{{route('admin.pengguna.guru')}}">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop