@extends('layout.master-new-version')

@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-blue">
    <a href="#" class="navbar-brand">Schedule</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="mymenu">
        <ul class="navbar-nav ml-auto">
            @if(Auth::check())
            <li class="nav-item">
                <div class="rounded-circle d-inline-block" style="height: 40px; width: 40px; overflow: hidden">
                    <img class="img-fluid" src="{{ asset('images/\/').auth()->user()->lecturer->photo }}" alt="">
                </div>
            </li>
            <li class="nav-item active">
                <a href="#" class="nav-link d-inline-block">{{ auth()->user()->lecturer->name }}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">Logout <i class="fa fa-sign-out-alt"></i></a>
            </li>
            @endif
        </ul>
    </div>
</nav>

<main class="py-4">
    <div class="container">
        <div class="card border-0">
            <!-- Jumbotron -->
            <div class="jumbotron jumbotron-fluid" style="padding-top: 1rem!important; background: #6574cd">
            <div class="display-4 white ml-4 mb-5">Kelas Sekarang <i class="fas fa-play-circle" style="font-size: 75%"></i></div>
                <div class="container">
                @if($data != NULL)
                    <div class="row">
                        <div class="col-md-5 offset-md-2">
                        <div class="card border-0 shadow-sm card-course">
                            <div class="card-body">
                                <div class="display-5 card-title">{{ $data->course_name }}</div>
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <th><i class="h2 fa fa-chalkboard-teacher"></i></th>
                                        <td><div class="h3">{{ $data->sks }} SKS</div></td>
                                    </tr>
                                    <tr>
                                        <th><i class="h2 fa fa-map-marker-alt"></i></th>
                                        <td><div class="h3">{{ $data->room->room }}</div></td>
                                    </tr>
                                    <tr>
                                        <th><i class=" h2 far fa-calendar"></i></th>
                                        <td><div class="h3">{{ ucfirst($data->day) }}</div></td>
                                    </tr>
                                    <tr>
                                        <th><i class="h2 far fa-clock"></i></th>
                                        <td>
                                            <div class="h3">{{ $data->time_begin }} - {{ $data->time_finish }} </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><i class=" h2 fa fa-info-circle"></i></th>
                                        <td><div class="h3">Sesi {{ $data->sesi }}</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            @if($data->status == 'queue')
                                                <div class="btn btn-secondary status-class">Belum Dimulai</div>
                                            @elseif($data->status == 'start')
                                                <div class="btn btn-success status-class">Sudah Dimulai</div>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3 text-center">
                            @if($data->status == 'queue')
                                <div class="h1 white">Click to Start</div>
                                <a href="{{ route('start', ['id' => $data->id]) }}" class="btnstart">
                                    <i class="fas fa-play-circle"></i>
                                </a>
                            @elseif($data->status == 'start')
                                <div class="h1 white">Click to Finish</div>
                                <a href="{{ route('stop', ['id' => $data->id]) }}" class="btnstart">
                                    <i class="fas fa-stop-circle"></i>
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="display-2 text-center" style="color: #2c387d99;">Tidak Ada...</div>
                    @endif
                    </div>
                </div>
            </div>
            <!-- Jumbotron -->
            @if(count($list) < 1)
            @else
            <div class="jumbotron jumbotron-fluid bg-white">
            <div class="display-5 pl-3 pb-4">Kelas Berikutnya <i class="fas fa-fast-forward" style="font-size: 75%"></i></div>
            <hr>
                <div class="container">
                    <div class="row">
                        @foreach($list as $k => $l)
                            @if(count($list) > 1)
                                @if($k == 0)
                                @else
                                    <div class="col-md-3">
                                    <div class="card p-3 shadow-sm card-course" style="border-top: 5px solid #3490dc; border-right: 0; border-left: 0; border-bottom: 0;">
                                        <div class="h3 card-title">{{ $l->course_name }}</div>
                                        <hr>
                                            <table class="table table-sm table-borderless">
                                                <tr>
                                                    <th><i class="h4 fa fa-chalkboard-teacher"></i></th>
                                                    <td><div class="h5 text-muted">{{ $l->sks }} SKS</div></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="h4 fa fa-map-marker-alt"></i></th>
                                                    <td><div class="h5 text-muted">{{ $l->room->room }}</div></td>
                                                </tr>
                                                <tr>
                                                    <th><i class=" h4 far fa-calendar"></i></th>
                                                    <td><div class="h5 text-muted">{{ $l->day }}</div></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="h4 far fa-clock"></i></th>
                                                    <td>
                                                        <div class="h5 text-muted">{{ $l->time_begin }} - {{ $l->time_finish }} </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><i class=" h2 fa fa-info-circle"></i></th>
                                                    <td><div class="h3">Sesi {{ $data->sesi }}</div></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="display-2 m-auto text-muted">Tidak Ada</div>
                            @endif
                        @endforeach
            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('custom-js')

<script>
    var countdownDate = new Date('Jan 5, 2020 10:00:00').getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();

        var selisih = countdownDate - now;

        var hours = Math.floor((selisih % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((selisih % (1000 * 60)) / 1000);

        document.getElementById('count-down').innerHTML = hours + " jam " + minutes + " mnt " + seconds + " det";

        if(selisih < 0)
        {
            clearInterval(x);
            document.getElementById('count-down').innerHTML = "Selesai";
        }
    }, 1000)
</script>

@endsection