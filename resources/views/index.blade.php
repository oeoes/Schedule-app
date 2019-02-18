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
                        <div class="text-muted animated slideInLeft">{{ \Carbon\Carbon::now('Asia/Jakarta')->toDayDateTimeString() }}</div>
                        <div class="display-4 animated slideInLeft delay-3">Schedule</div>
                    </div>
                    <div class="col-md-4">
                        <div class="display-5 text-center p-4 mt-4 float-right">
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
                        <!-- Room -->
                        <div class="card border-0 p-2 mb-1">
                        <div class="h6">Filter : <a @click.prevent="nothing" href="" title="Filter by today" data-toggle="popover" data-placement="right" data-trigger="focus" data-content="Dengan filter today, pencarian hanya akan menghasilkan jadwal hari ini (today) dengan ruangan yang dipilih"><i class="far fa-question-circle"></i></a></div>
                            <div class="custom-control custom-checkbox">
                                <input v-model="today" type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                <label class="custom-control-label" for="customCheck">Today</label>
                            </div>
                        </div>
                        <div class="card animated slideInLeft border-0" style="a">
                            <div class="h4 card-header bg-blue white">Rooms</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item animated slideInLeft"><a @click.prevent="sortRoom(1)" href=""><i class="fa fa-map-marker-alt"></i> FIK LAB 302</a></li>
                                <li class="list-group-item animated slideInLeft delay-1"><a @click.prevent="sortRoom(2)" href=""><i class="fa fa-map-marker-alt"></i> FIK LAB 303</a></li>
                                <li class="list-group-item animated slideInLeft delay-2"><a @click.prevent="sortRoom(3)" href=""><i class="fa fa-map-marker-alt"></i> FIK LAB 304</a></li>
                                <li class="list-group-item animated slideInLeft delay-3"><a @click.prevent="sortRoom(4)" href=""><i class="fa fa-map-marker-alt"></i> FIK LAB 401</a></li>
                                <li class="list-group-item animated slideInLeft delay-4"><a @click.prevent="sortRoom(5)" href=""><i class="fa fa-map-marker-alt"></i> FIK LAB 402</a></li>
                                <li class="list-group-item animated slideInLeft delay-5"><a @click.prevent="sortRoom(6)" href=""><i class="fa fa-map-marker-alt"></i> FIK LAB 403</a></li>
                            </ul>
                        </div>
                        <!-- Room -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card border-0 p-3">
                        <div class="full-screen" id="fullscreen">
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
                            <div class="mypreload">
                                <!-- Preloader -->
                                <span v-if="myload" class="myload text-center pt-5">
                                    <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </span>
                                <!-- Preloader -->
                                <div class="row mt-4">
                                <course
                                    v-for="course in courses"
                                    v-bind="course"
                                    :key="course.id"
                                ></course>
                                </div>
                            </div>
                            <!-- List Schedule -->
                            <!-- List Schedule Full Screen -->
                            <div class="p-3 pt-5 animated zoomIn" id="full-cont">
                                <div id="close-btn" class="text-muted">
                                    <span>&times;</span>
                                </div>
                                <div class="row">
                                <course-full
                                    v-for="course in courses"
                                    v-bind="course"
                                    :key="course.id"
                                ></course-full>
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