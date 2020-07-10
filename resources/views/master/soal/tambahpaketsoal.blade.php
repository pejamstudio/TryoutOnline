
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
                            <div class="form-group">
                                <label for="nama">Nama Tryout</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama tryout" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Deskripsi</label>
                                <input type="textarea" class="form-control" id="nama" placeholder="Deskripsi tryout" required="">
                            </div>
                            
                            <div class="form-group">
                                <label for="">KKM</label>
                                <input type="number" class="form-control" max="100" min="0" id=""
                                       aria-describedby="emailHelp" placeholder="Nilai kelulusan minimal">
                            </div>
                            <div class="form-group">
                                <label for="">Waktu</label>
                                <input type="number" class="form-control" min="0" id=""
                                       placeholder="Waktu tryout">
                            </div>
                                
                            <a class="btn btn-danger mr-1" href="{{route('admin.master.soal')}}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop