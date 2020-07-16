
@extends('admin/template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Detail Soal</h3>
            </div>
        </div>
    

        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header bg-primary">Data Soal</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <p>{{$soal->soal}}</p>
                            </div>
                            
                            <div class="form-check">
                                <label class="form-check-label" for="gridRadios1">
                                    A. {{$soal->jawab_a}}
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="gridRadios2">
                                    B. {{$soal->jawab_b}}
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label" for="gridRadios3">
                                    C. {{$soal->jawab_c}}
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label" for="gridRadios4">
                                    D. {{$soal->jawab_d}}
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label" for="gridRadios5">
                                    E. {{$soal->jawab_e}}
                                </label>
                            </div>
                            <br>
                            <a class="btn btn-danger mr-1" href="{{route('detail.mapel.soal', $soal->id_mapel)}}">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop