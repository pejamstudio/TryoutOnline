
@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Tryout</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Tryout</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach($data as $i => $d)
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>{{$d->nama_mapel}}</h3>
                                <p>
                                    <i class="icon ti-timer mr-2"></i>Waktu : {{$d->durasi}} Menit
                                    <br>
                                    <i class="icon ti-book mr-2"></i>Jumlah Soal : {{$d->jumlah_soal}}
                                    <br>
                                    <i class="icon ti-check-box mr-2"></i>Nilai Kelulusan : {{$d->kkm}}
                                </p>
                            </div>
                            <div class="col-md-4 text-center align-self-center">
                                <?php 
                                    $cek_nilai = false;
                                    $cek_jawab = true;
                                    $awal = date_create($d->tanggal.' '.$d->waktu);
                                    $diff = date_diff(date_create(), $awal);
                                    if(((int)$diff->h - 7) == 0)
                                    {
                                        if($diff->i <= 5)
                                        {
                                            $cek_jawab = false;
                                        }
                                    }
                                    foreach ($cek as $c) {
                                        if ($c->id_mapel == $d->id) {
                                            $cek_nilai = true;
                                        }
                                    }
                                 ?>
                                @if($cek_nilai)
                                    <p>Selesai</p>
                                @else
                                    @if($cek_jawab)
                                        <p>Ujian akan segera dimulai <br> {{$d->waktu}}</p>
                                    @else
                                        <a class="btn btn-primary justify-content-center" href="{{route('kerjakan.tryout')}}">Mulai Mengerjakan</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                        
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@stop