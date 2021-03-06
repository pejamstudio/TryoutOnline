
@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Edit Jurusan</h3>
            </div>
        </div>
    

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <form action="{{url('editjurusan', $data->id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Nama Jurusan</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama jurusan" name="nama" value="{{$data->nama_jurusan}}" required="">
                            </div>
                            <a class="btn btn-danger mr-1" href="{{route('master.jurusan.jurusan')}}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop