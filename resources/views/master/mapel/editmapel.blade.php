
@extends('admin/template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Edit Mata Pelajaran</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="nama">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" required="">
                            </div>
                            <a class="btn btn-danger mr-1" href="{{route('admin.master.mapel')}}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop