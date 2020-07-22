
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
                                    $cek_jawab = 0;
                                    $awal = date_create($d->tanggal.' '.$d->waktu);
                                    $diff = date_diff(date_create(), $awal);
                                    $tm = (((int)$diff->h*60) - 420) + $diff->i;
                                    $lewat = ($d->durasi+1) + $tm;
                                    if($tm <= 0)
                                    {  
                                        if($lewat <= 1)
                                        {
                                            $cek_jawab = 2;
                                        }
                                        else
                                        {
                                            $cek_jawab = 1;
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
                                    @if($cek_jawab == 0)
                                        <p>Ujian akan segera dimulai <br> {{$d->waktu}}</p>
                                    @elseif($cek_jawab == 1)
                                        <form method="post" action="{{route('kerjakan.tryout')}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="waktu" value="{{$lewat}}">
                                            <input type="hidden" name="id_mapel" value="{{$d->id}}">
                                            <button class="btn btn-primary justify-content-center" type="submit">Mulai Mengerjakan</button><br>
                                        <p>Sisa waktu = {{$lewat}} menit</p>
                                        </form>
                                    @else
                                        <p>Ujian berlalu</p>
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