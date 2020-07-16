
@extends('template')


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
                        <form method="post" action="{{url('mapel/edit', $data->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="nama">Nama Mata Pelajaran</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama mapel" name="mapel" value="{{$data->nama_mapel}}" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi" name="deskripsi" value="{{$data->deskripsi}}" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">KKM</label>
                                <input type="text" class="form-control" id="kkm" placeholder="Masukkan KKM" name="kkm" value="{{$data->kkm}}" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Waktu Pengerjaan (menit)</label>
                                <input type="text" class="form-control" id="durasi" placeholder="Masukkan waktu pengerjaan" name="durasi" value="{{$data->durasi}}" required="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Jumlah Soal</label>
                                <input type="text" class="form-control" id="jumlah_soal" placeholder="Masukkan jumlah soal" name="jumlah_soal" required="" value="{{$data->jumlah_soal}}">
                            </div>
                            <div class="form-group">
                                <label for="nama">Kelas</label>
                                <div class="mb-2">
                                    @foreach($kelas as $k)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox" value="{{$k->id}}" name="kelas[]"
                                            <?php 
                                                foreach ($mapel as $m) {
                                                    if($m->id_kelas == $k->id && $data->id_kelas != $k->id)
                                                    {
                                                        echo "disabled";
                                                    }
                                                }

                                                if($data->id_kelas == $k->id)
                                                {
                                                    echo "checked";
                                                }
                                             ?>
                                            >
                                            <label class="form-check-label" for="inlineCheckbox">{{$k->nama_kelas}}</label>
                                        </div>
                                        <!-- <div class="col-md-5">
                                                <select class="form-control" name="guru"
                                                    <?php 
                                                        foreach ($mapel as $m) {
                                                            if($m->id_kelas == $k->id && $data->id_kelas != $k->id)
                                                            {
                                                                echo "disabled";
                                                            }
                                                        }
                                                     ?>
                                                >
                                                    <option>Pilih Guru</option>
                                                    @foreach($guru as $g)
                                                        <option value="{{$g->id}}" 
                                                            <?php 
                                                                if($g->id == $data->id)
                                                                {
                                                                    echo "selected";
                                                                }
                                                             ?>
                                                            >{{$g->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div> -->
                                    @endforeach
                                </div>
                            </div>
                            <a class="btn btn-danger mr-1" href="{{route('master.mapel')}}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop