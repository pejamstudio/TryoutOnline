
@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Tambah Mata Pelajaran</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{url('mapel/tambah')}}">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label for="nama">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama mapel" name="mapel" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi" name="deskripsi" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">KKM</label>
                                <input type="text" class="form-control" id="kkm" placeholder="Masukkan KKM" name="kkm" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Waktu Pengerjaan (menit)</label>
                                <input type="text" class="form-control" id="durasi" placeholder="Masukkan waktu pengerjaan" name="durasi" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Jumlah Soal</label>
                                <input type="text" class="form-control" id="jumlah_soal" placeholder="Masukkan jumlah soal" name="jumlah_soal" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Kelas</label>
                                <div class="mb-2">
                                    @foreach($kelas as $k)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="{{$k->id}}" name="kelas[]">
                                            <label class="form-check-label" for="inlineCheckbox">{{$k->nama_kelas}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <a class="btn btn-danger mr-1" href="{{route('master.mapel')}}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop