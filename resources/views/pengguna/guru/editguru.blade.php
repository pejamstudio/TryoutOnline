
@extends('admin/template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Edit Guru</h3>
            </div>
        </div>
    

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{url('/admin/editguru', $data1->id_user)}}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-5 text-center">
                                    <div>
                                        <img id="image_preview_container" style="width: 80%; height: auto;" src="{{url('/assets/images/foto/guru/'.$data->foto)}}"
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
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required="" value="{{$data->nama}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">NIP</label>
                                        <input type="text" class="form-control" id="nama" name="nip" placeholder="Masukkan NIP" required="" value="{{$data1->nip}}">
                                    </div>
                                    <label for="nama">Jenis Kelamin</label>
                                    <div class="mb-2">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="       jenis_kelamin"
                                                   class="custom-control-input" value="Laki - laki" 
                                                   <?php 
                                                        if ($data->jenis_kelamin == 'Laki - laki') {
                                                            echo "checked";
                                                        }
                                                    ?>
                                                   >
                                            <label class="custom-control-label" for="customRadioInline1">Laki - laki</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="jenis_kelamin"
                                                   class="custom-control-input" value="Perempuan"
                                                   <?php 
                                                        if ($data->jenis_kelamin == 'Perempuan') {
                                                            echo "checked";
                                                        }
                                                    ?>
                                                   >
                                            <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" 
                                               aria-describedby="emailHelp" placeholder="Masukkan email" value="{{$data->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Masukkan username" name="username" value="{{$data->username}}" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="nomor">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="notelepon" placeholder="Masukkan nomor telepon" name="notelp" required="" value="{{$data->telp}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="tmplahir">Tempat Lahir</label>
                                        <input type="textarea" class="form-control" id="tmplahir" placeholder="Masukkan tempat lahir" name="temp_lahir" required="" value="{{$data->tempat_lahir}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="tanggallahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required="" value="{{$data->tanggal_lahir}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="textarea" class="form-control" id="alamat" placeholder="Masukkan alamat" name="alamat" required="" value="{{$data->alamat}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="mapel">Mata Pelajaran</label>
                                        <select class="form-control" id="matapelajaran" name="matapelajaran">
                                            <option value="Biologi" 
                                                <?php 
                                                    if ($data1->id_mapel == 'Biologi') {
                                                        echo "selected";
                                                    }
                                                 ?>
                                            >BIOLOGI</option>
                                            <option value="Fisika"
                                                <?php 
                                                    if ($data1->id_mapel == 'Fisika') {
                                                        echo "selected";
                                                    }
                                                 ?>
                                            >FISIKA</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                               placeholder="Password" name="password">
                                    </div>

                                    <div class="form-group text-right">
                                        <a class="btn btn-danger mr-1" href="{{route('admin.pengguna.guru')}}">Kembali</a>
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