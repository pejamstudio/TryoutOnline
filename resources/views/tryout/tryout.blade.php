
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
                
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>{{$data->nama_mapel}}</h3>
                            <p>
                                <i class="icon ti-timer mr-2"></i>Waktu : {{$data->durasi}} Menit
                                <br>
                                <i class="icon ti-book mr-2"></i>Jumlah Soal : {{$data->jumlah_soal}}
                                <br>
                                <i class="icon ti-check-box mr-2"></i>Nilai Kelulusan : {{$data->kkm}}
                            </p>
                        </div>
                        <div class="col-md-4 text-center align-self-center">
                            @if($cek)
                                <p>Selesai</p>
                            @else
                                <a class="btn btn-primary justify-content-center" href="{{route('kerjakan.tryout')}}">Mulai Mengerjakan</a>
                            @endif
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop