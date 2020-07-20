
@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Tambah Siswa</h3>
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
            </div>
        </div>
    

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <form action="{{url('tambahsiswa')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-5 text-center">
                                    <div>
                                        <img id="image_preview_container" style="width: 80%; height: auto;" src="{{url('/assets/media/image/avatar.jpg')}}"
                                            alt="preview image" style="max-height: 150px;">
                                    </div>
                                    <br>
                                    <div class="form-control text-left">
                                        <div>
                                            <input type="file" name="image" placeholder="Choose image" id="image">
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">NISN</label>
                                        <input type="text" class="form-control" id="nama" name="nisn" placeholder="Masukkan NISN" required="" pattern="[0-9]{10}">
                                    </div>
                                    <label for="nama">Jenis Kelamin</label>
                                    <div class="mb-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="jenis_kelamin"
                                                   class="custom-control-input" value="Laki - laki">
                                            <label class="custom-control-label" for="customRadioInline1">Laki - laki</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="jenis_kelamin"
                                                   class="custom-control-input" value="Perempuan">
                                            <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" 
                                               aria-describedby="emailHelp" placeholder="Masukkan email">
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="nomor">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="notelepon" placeholder="Masukkan nomor telepon" name="notelp" required="" pattern="[0-9]{0-2}">
                                    </div>

                                    <div class="form-group">
                                        <label for="tmplahir">Tempat Lahir</label>
                                        <input type="textarea" class="form-control" id="tmplahir" placeholder="Masukkan tempat lahir" name="temp_lahir" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggallahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="textarea" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <select class="form-control" name="jurusan">
                                            @foreach($jurusan as $j)
                                                <option value="{{$j->id}}">{{$j->nama_jurusan}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select class="form-control" name="kelas">
                                            @foreach($kelas as $k)
                                                <option value="{{$k->id}}">{{$k->nama_kelas}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                               placeholder="Password" name="password" required="">
                                    </div>

                                    <div class="form-group text-right">
                                        <a class="btn btn-danger mr-1" href="{{route('pengguna.siswa.siswa')}}">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop