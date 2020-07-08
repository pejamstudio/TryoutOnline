
@extends('admin/template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Tambah Guru</h3>
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
                                        <div class="custom-file mt-3">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Pilih Foto</label>
                                        </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">NIP</label>
                                        <input type="text" class="form-control" id="nama" pattern="[0-9]" placeholder="Masukkan NIP" required="">
                                    </div>
                                    <label for="nama">Jenis Kelamin</label>
                                    <div class="mb-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="customRadioInline1"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Laki - laki</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="customRadioInline1"
                                                   class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" placeholder="Masukkan email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                               placeholder="Password">
                                    </div>
                                </div>
                                
                            </div>
                            
                            <a class="btn btn-danger mr-1" href="{{route('admin.pengguna.guru')}}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop