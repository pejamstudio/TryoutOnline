
@extends('template')


@section('content')

    <div class="container">

        <!-- begin::page header -->
        <div class="page-header d-md-flex align-items-center justify-content-between">
            <div>
                <h3>Tambah Soal</h3>
            </div>
        </div>
    

        <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header bg-primary">Data Soal</div>
                    <div class="card-body">
                        <form method="post" action="{{url('master/tambahsoal', $mapel->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <textarea class="form-control" name="soal" id="soal"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pila">Pilihan A</label>
                                <textarea class="form-control" name="pila" id="pila"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pilb">Pilihan B</label>
                                <textarea class="form-control" name="pilb" id="pilb"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pilc">Pilihan C</label>
                                <textarea class="form-control" name="pilc" id="pilc"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pild">Pilihan D</label>
                                <textarea class="form-control" name="pild" id="pild"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pile">Pilihan E</label>
                                <textarea class="form-control" name="pile" id="pile"></textarea>
                            </div>
                            <label for="nama">Kunci Jawaban</label>
                            <div class="mb-2">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="kunci" name="kunci"
                                           class="custom-control-input" value="A">
                                    <label class="custom-control-label" for="kunci">A</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="kunci"
                                           class="custom-control-input" value="B">
                                    <label class="custom-control-label" for="customRadioInline2">B</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline3" name="kunci"
                                           class="custom-control-input" value="C">
                                    <label class="custom-control-label" for="customRadioInline3">C</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline4" name="kunci"
                                           class="custom-control-input" value="D">
                                    <label class="custom-control-label" for="customRadioInline4">D</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline5" name="kunci"
                                           class="custom-control-input" value="E">
                                    <label class="custom-control-label" for="customRadioInline5">E</label>
                                </div>
                            </div>

                            <a class="btn btn-danger mr-1" href="{{url('master/mapel/datasoal', $mapel->id)}}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop