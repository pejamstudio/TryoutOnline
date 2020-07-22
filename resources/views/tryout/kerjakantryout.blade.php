

@extends('template')


@section('content')

    <div class="container bg-white" id="full">

        <!-- begin::page header -->
        <div class="page-header">
            <h3>{{$mapel->nama_mapel}}</h3>
        </div>
        <!-- end::page header -->
        <div class="row">
            <div class="col-md-8">
                <form action="{{url('submit', $mapel->id)}}" method="post">
                    {{ csrf_field() }}
                    @foreach($soal as $i => $s)
                    <div class="card" id="soal{{$i+1}}">
                    <div class="card-header bg-primary">Soal {{$i+1}}</div>
                    <div class="card-body">
                            <div class="form-group">
                                <p>{{$s->soal}}</p>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawab[{{$i}}]"
                                       id="gridRadios1" value="A">
                                <label class="form-check-label" for="gridRadios1">
                                    A. {{$s->jawab_a}}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jawab[{{$i}}]"
                                       id="gridRadios2" value="B">
                                <label class="form-check-label" for="gridRadios2">
                                    B. {{$s->jawab_b}}
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="jawab[{{$i}}]"
                                       id="gridRadios3" value="C">
                                <label class="form-check-label" for="gridRadios3">
                                    C. {{$s->jawab_c}}
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="jawab[{{$i}}]"
                                       id="gridRadios4" value="D">
                                <label class="form-check-label" for="gridRadios4">
                                    D. {{$s->jawab_d}}
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="jawab[{{$i}}]"
                                       id="gridRadios5" value="E">
                                <label class="form-check-label" for="gridRadios5">
                                    E. {{$s->jawab_e}}
                                </label>
                            </div>
                            <br>
                        </div>
                    </div>
                     @endforeach
                     <div class="card">
                        <div class="card-body align-self-center">
                            <button type="submit" class="btn btn-primary mr-1">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">Tryout</div>
                    <div class="card-body">

                        <div class="form-group">
                            <b>Mata Pelajaran</b>
                            <p>Tryout {{$mapel->nama_mapel}}</p>
                        </div>
                        <div class="form-group">
                            <b>Jumlah Soal</b>
                            <p>
                               {{count($soal)}}
                            </p>
                        </div>
                        <div class="form-group">
                            <b>Waktu</b>
                            <p>{{$mapel->durasi}} Menit</p>
                        </div>
                    </div>
                </div>

                <div class="card sticky">
                    <div class="card-header bg-primary">Navigasi Soal</div>
                    <div class="card-body">
                        <div><i class="ti-timer mr-2"></i>Waktu Tersisa : <span id="timer"></span></div>
                        <div class="list-group">
                            @foreach($soal as $i => $s)
                                <a href="#s{{$i+1}}" class="list-group-item list-group-item-action">Soal {{$i+1}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script>

var elem = document.getElementById("full");
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.mozRequestFullScreen) { /* Firefox */
    elem.mozRequestFullScreen();
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
  }

document.getElementById('timer').innerHTML =
  <?php echo $waktu; ?> + ":" + 0;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){
    closeFullscreen();
    window.location.replace("{{url('submit', $mapel->id)}}");
  }
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  console.log(m)
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.mozCancelFullScreen) { /* Firefox */
    document.mozCancelFullScreen();
  } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE/Edge */
    document.msExitFullscreen();
  }
}  


</script>

@stop