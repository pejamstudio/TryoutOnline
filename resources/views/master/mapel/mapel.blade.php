

@extends('template')


@section('content')

    <div class="container">

        <!-- to set search -->
        <input type="" id="s" name="" value="">

        <!-- begin::page header -->
        <div class="page-header">
            <h3>Data Mata Pelajaran</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                    <li class="breadcrumb-item active">Data Mata Pelajaran</li>
                </ol>
            </nav>
        </div>
        <!-- end::page header -->

        <div class="card">
            <div class="card-body">
            <div class="table-responsive">
                <?php 
                    if ($session == 'Admin' && $cek_kelas) {
                ?>
                    <a href="{{url('master/mapel/tambah')}}" class="btn btn-primary">
                        <i class="fa fa-plus-square m-r-5"></i> Tambah Mata Pelajaran
                    </a>
                <?php
                    }
                 ?>
                @if(\Session::has('alert'))
                    <div class="alert alert-danger">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                @endif
                @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif
                <table id="example1" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>KKM</th>
                        @if($session != 'Siswa')
                            <th>Aksi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $p)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$p->nama_mapel}}</td>
                            <td>{{$p->nama_kelas}}</td>
                            <td>{{$p->kkm}}</td>
                            @if($session != 'Siswa')
                                <td class="text-center">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-light btn-floating btn-icon btn-sm"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <?php 
                                            if ($session == 'Admin') {
                                        ?>
                                           <a href="{{url('master/detailmapel', $p->nama_mapel)}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Data Guru</button></a> 
                                        <?php
                                            }
                                         ?>
                                        <a href="{{url('master/mapel/datasoal', $p->id)}}"><button class="dropdown-item" type="button"><i class="ti-info mr-3"></i>Data Soal</button></a>
                                        <?php 
                                            if ($session == 'Admin' ) {
                                        ?>
                                        <button class="dropdown-item" type="submit" data-target="#createEventModal"><i class="ti-pencil mr-3"></i>Tentukan Jadwal</button>
                                        <a href="{{url('master/mapel/edit', $p->id)}}"><button class="dropdown-item" type="button"><i class="ti-pencil mr-3"></i>Edit</button></a>
                                        <?php
                                            }
                                        ?>
                                        <?php 
                                            if ($session == 'Admin') {
                                        ?>
                                        <form method="post" action="{{url('mapel/hapus', $p->id)}}">
                                            @csrf
                                            <button class="dropdown-item" type="submit"><i class="ti-trash mr-3"></i>Hapus</button>
                                        <?php
                                            }
                                        ?>
                                        </form>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>KKM</th>
                        @if($session != 'Siswa')
                            <th>Aksi</th>
                        @endif
                    </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>

        <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form autocomplete="off">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input id="event-title" type="text" class="form-control" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Event type</label>
                                <div class="col-sm-9">
                                    <div class="mt-2" id="event-type">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Appointment</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Meeting</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row row-sm">
                                <label class="col-sm-3 col-form-label">Start</label>
                                <div class="col-sm-5">
                                    <input id="event-start-date" type="text" class="form-control create-event-datepicker" placeholder="Date">
                                </div>
                                <div class="col-sm-4">
                                    <input id="event-start-time" type="text" class="form-control create-event-demo" placeholder="Time">
                                </div>
                            </div>
                            <div class="form-group row row-sm">
                                <label class="col-sm-3 col-form-label">End</label>
                                <div class="col-sm-5">
                                    <input id="event-end-date" type="text" class="form-control create-event-datepicker" placeholder="Date">
                                </div>
                                <div class="col-sm-4">
                                    <input id="event-end-time" type="text" class="form-control create-event-demo" placeholder="Time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Participate</label>
                                <div class="col-sm-9">
                                    <div class="avatar-group">
                                        <figure class="avatar avatar-sm">
                                            <span class="avatar-title bg-success rounded-circle">K</span>
                                        </figure>
                                        <figure class="avatar avatar-sm">
                                            <span class="avatar-title bg-danger rounded-circle">S</span>
                                        </figure>
                                        <figure class="avatar avatar-sm">
                                            <span class="avatar-title bg-primary rounded-circle">C</span>
                                        </figure>
                                        <figure class="avatar avatar-sm">
                                            <img src="../assets/media/image/avatar.jpg" class="rounded-circle">
                                        </figure>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-floating">
                                        <i class="ti-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea id="event-desc" class="form-control" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-9">
                                    <button type="submit" id="btn-save" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop