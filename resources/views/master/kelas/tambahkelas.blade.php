
@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Tambah Kelas</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{url('master/tambahkelas')}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama" name="namakelas" placeholder="Masukkan nama kelas" required="">
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" name="jurusan">
                                    @foreach($data as $p)
                                        <option value="{{$p->id}}"
                                            <?php if ($id == $p->nama) {
                                                echo 'selected';
                                            } ?>
                                            >{{$p->nama_jurusan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a class="btn btn-danger mr-1" href="{{route('master.kelas.kelas')}}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
@stop