

@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header">
            <h3>Nilai Tryout {{$nilai->nama_mapel}}</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a>Nilai</a></li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">Detail Nilai</div>
                        <div class="card-body text-center">
                            <h1>{{$nilai->nilai}}</h1>
                            <p>Nilai</p>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5><b>{{$nilai->jumlah_soal}}</b></h5>
                                    <small>Jumlah Soal</small>
                                </div>
                                <div class="col-sm-6">
                                    <h5><b>{{$jumlah_benar}}</b></h5>
                                    <p>Jumlah Soal Benar</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5><b>{{$nilai->jumlah_soal - $jumlah_benar}}</b></h5>
                                    <p>Jumlah Soal Salah</p>
                                </div>
                                <div class="col-sm-6 align-self-center">
                                    <?php 
                                        if($nilai->nilai >= $nilai->kkm)
                                        {
                                            echo '<span class="badge badge-success">Lulus</span>';
                                        }
                                        else{
                                            echo '<span class="badge badge-danger">Tidak Lulus</span>';
                                        }
                                     ?>
                                    <p>Keterangan</p>
                                </div>    
                            </div>
                            
                        </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary">Kunci Jawaban</div>
                        <div class="card-body">
                            <!-- perulangan -->
                            @foreach($soal as $i => $s)
                            <div class="card">
                                <div class="card-header bg-white">Soal {{$i+1}}</div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <p>{{$s->soal}}</p>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" 
                                                <?php 
                                                    if($s->jawab == 'A')
                                                    {
                                                        echo 'checked';
                                                    }
                                                 ?>
                                                disabled="" type="radio" name="gridRadios"
                                                       id="gridRadios1" value="option1">
                                                <label 
                                                <?php 
                                                    if($s->kunci == 'A')
                                                    {
                                                        echo 'class="form-check-label text-success"';
                                                    }
                                                    else
                                                    {
                                                        echo 'class="form-check-label"';
                                                    }
                                                 ?>
                                                for="gridRadios1">
                                                    A. {{$s->jawab_a}}
                                                </label>
                                                <?php 
                                                    if($s->kunci == 'A')
                                                    {
                                                        echo '<span class="badge badge-success"> </span>';
                                                    }
                                                 ?>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                <?php 
                                                    if($s->jawab == 'B')
                                                    {
                                                        echo 'checked';
                                                    }
                                                 ?>
                                                 disabled="" type="radio" name="gridRadios"
                                                       id="gridRadios2" value="option2">
                                                <label
                                                <?php 
                                                    if($s->kunci == 'B')
                                                    {
                                                        echo 'class="form-check-label text-success"';
                                                    }
                                                    else
                                                    {
                                                        echo 'class="form-check-label"';
                                                    }
                                                 ?>
                                                 for="gridRadios2">
                                                    B. {{$s->jawab_b}}
                                                </label>
                                                <?php 
                                                    if($s->kunci == 'B')
                                                    {
                                                        echo '<span class="badge badge-success"> </span>';
                                                    }
                                                 ?>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                <?php 
                                                    if($s->jawab == 'C')
                                                    {
                                                        echo 'checked';
                                                    }
                                                 ?>
                                                disabled="" type="radio" name="gridRadios"
                                                       id="gridRadios3" value="option3">
                                                <label 
                                                <?php 
                                                    if($s->kunci == 'C')
                                                    {
                                                        echo 'class="form-check-label text-success"';
                                                    }
                                                    else
                                                    {
                                                        echo 'class="form-check-label"';
                                                    }
                                                 ?>
                                                for="gridRadios3">
                                                    C. {{$s->jawab_c}}
                                                </label>
                                                <?php 
                                                    if($s->kunci == 'C')
                                                    {
                                                        echo '<span class="badge badge-success"> </span>';
                                                    }
                                                 ?>
                                            </div>
                                            <div class="form-check disabled">
                                                <input class="form-check-input"
                                                <?php 
                                                    if($s->jawab == 'D')
                                                    {
                                                        echo 'checked';
                                                    }
                                                 ?>
                                                disabled="" type="radio" name="gridRadios"
                                                       id="gridRadios4" value="option4">
                                                <label
                                                <?php 
                                                    if($s->kunci == 'D')
                                                    {
                                                        echo 'class="form-check-label text-success"';
                                                    }
                                                    else
                                                    {
                                                        echo 'class="form-check-label"';
                                                    }
                                                 ?>
                                                for="gridRadios4">
                                                    D. {{$s->jawab_d}}
                                                </label>
                                                <?php 
                                                    if($s->kunci == 'D')
                                                    {
                                                        echo '<span class="badge badge-success"> </span>';
                                                    }
                                                 ?>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input"
                                                <?php 
                                                    if($s->jawab == 'E')
                                                    {
                                                        echo 'checked';
                                                    }
                                                 ?>
                                                disabled="" type="radio" name="gridRadios"
                                                       id="gridRadios5" value="option5">
                                                <label
                                                <?php 
                                                    if($s->kunci == 'E')
                                                    {
                                                        echo 'class="form-check-label text-success"';
                                                    }
                                                    else
                                                    {
                                                        echo 'class="form-check-label"';
                                                    }
                                                 ?>
                                                for="gridRadios5">
                                                    E. {{$s->jawab_e}}
                                                </label>
                                                <?php 
                                                    if($s->kunci == 'E')
                                                    {
                                                        echo '<span class="badge badge-success"> </span>';
                                                    }
                                                 ?>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
        

    </div>

@stop