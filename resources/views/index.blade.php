@extends('layout.master')

@section('title', 'Schedule - Home Page')

@section('content')

<main class="py-5">
    <div class="container-fluid mt-4">
        <div class="border-0">
            <!-- Title -->
            <div class="card border-0 mb-2">
                <div class="row">
                    <div class="col-md-8 p-4">
                        <div class="text-muted animated slideInLeft">{{ \Carbon\Carbon::now()->toDayDateTimeString() }}</div>
                        <div class="display-3 animated slideInLeft delay-3">Schedule</div>
                    </div>
                    <div class="col-md-4">
                        <div class="display-4 text-center p-4 mt-4 float-right">
                           <i class="far fa-clock clock-animated"></i> <span id="time-schedule"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Title -->
            <!-- Konten -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-0 p-3">
                        <div class="card animated slideInLeft" style="a">
                            <div class="h4 card-header bg-blue silver">Rooms</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item animated slideInLeft"><a href="{{ route('sort.room', ['id' => 1]) }}"><i class="fa fa-map-marker-alt"></i> FIK LAB 301</a></li>
                                <li class="list-group-item animated slideInLeft delay-1"><a href="{{ route('sort.room', ['id' => 2]) }}"><i class="fa fa-map-marker-alt"></i> FIK LAB 302</a></li>
                                <li class="list-group-item animated slideInLeft delay-2"><a href="{{ route('sort.room', ['id' => 3]) }}"><i class="fa fa-map-marker-alt"></i> FIK LAB 303</a></li>
                                <li class="list-group-item animated slideInLeft delay-3"><a href="{{ route('sort.room', ['id' => 4]) }}"><i class="fa fa-map-marker-alt"></i> FIK LAB 401</a></li>
                                <li class="list-group-item animated slideInLeft delay-4"><a href="{{ route('sort.room', ['id' => 5]) }}"><i class="fa fa-map-marker-alt"></i> FIK LAB 402</a></li>
                                <li class="list-group-item animated slideInLeft delay-5"><a href="{{ route('sort.room', ['id' => 6]) }}"><i class="fa fa-map-marker-alt"></i> FIK LAB 403</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card border-0 p-3">
                        <div class="full-screen animated zoomInDown" id="fullscreen">
                            <span class="fa fa-compress-arrows-alt text-muted"></span>
                        </div>
                        <div class="container">
                        <div class="display-4 mb-4" style="font-size: 2rem">Today's Course</div>
                            <!-- Breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @if(Route::currentRouteName() == 'home')
                                           <i class="far fa-calendar-alt"></i> {{ ucfirst($day_course) }}
                                        @else
                                           <i class="fa fa-map-marker-alt"></i> {{ $myroom->room->room }}
                                        @endif
                                    </li>
                                </ol>
                            </nav>
                            <!-- Breadcrumb -->
                            
                            <!-- List Schedule -->
                            <div class="row mt-4">
                            @foreach($data as $d)
                                <div class="col-md-4 mb-4 list-reveal">
                                    <div class="card border-0 shadow-sm card-course card-height">
                                        <div class="text-center {{ $colors[rand(0, count($colors)-1)] }} pt-3" style="width: 100%; height: 115px">
                                            <div class="display-3 white">{{ $d->initial }}</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="h2 card-title">{{ $d->course_name }}</div>
                                            

                                            <table class="table table-sm table-borderless">
                                                <tr>
                                                    <th><i class="h3 fa fa-user-tie"></i></th>
                                                    <td><div class="h5 text-muted">{{ $d->lecturer->name }}</div></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="h3 fa fa-chalkboard-teacher"></i></th>
                                                    <td><div class="h5 text-muted">{{ $d->sks }} SKS</div></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="h3 fa fa-map-marker-alt"></i></th>
                                                    <td><div class="h5 text-muted">{{ $d->room->room }}</div></td>
                                                </tr>
                                                <tr>
                                                    <th><i class=" h3 far fa-calendar"></i></th>
                                                    <td><div class="h5 text-muted">{{ ucfirst($d->day) }}</div></td>
                                                </tr>
                                                <tr>
                                                    <th><i class="h3 far fa-clock"></i></th>
                                                    <td><div class="h5 text-muted">{{ $d->time }}</div></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                            <!-- List Schedule -->
                            <!-- List Schedule Full Screen -->
                            <div class="p-3 pt-5 animated fadeInUp" id="full-cont">
                                <div id="close-btn" class="text-muted">
                                    <span>&times;</span>
                                </div>
                                <div class="row">
                                @foreach($data as $d)
                                    <div class="col-md-3 mb-4">
                                        <div class="card border-0 shadow-sm card-course">
                                            <div class="text-center {{ $colors[rand(0, count($colors)-1)] }} pt-3" style="width: 100%; height: 115px">
                                                <div class="display-3 white">{{ $d->initial }}</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="h2 card-title">{{ $d->course_name }}</div>
                                                

                                                <table class="table table-sm table-borderless">
                                                    <tr>
                                                        <th><i class="h3 fa fa-user-tie"></i></th>
                                                        <td><div class="h5 text-muted">{{ $d->lecturer->name }}</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th><i class="h3 fa fa-chalkboard-teacher"></i></th>
                                                        <td><div class="h5 text-muted">{{ $d->sks }} SKS</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th><i class="h3 fa fa-map-marker-alt"></i></th>
                                                        <td><div class="h5 text-muted">{{ $d->room->room }}</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th><i class=" h3 far fa-calendar"></i></th>
                                                        <td><div class="h5 text-muted">{{ ucfirst($d->day) }}</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th><i class="h3 far fa-clock"></i></th>
                                                        <td><div class="h5 text-muted">{{ $d->time }}</div></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            <!-- List Schedule Full Screen -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Konten -->
        </div>
    </div>
</main>

@endsection