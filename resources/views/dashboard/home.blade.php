@extends('layout.master')

@section('title', 'Schedule - Dashboard')

@section('content')

<main class="py-5">
    <div class="container-fluid mt-4">
        <div class="border-0">
            <!-- Title -->
            <div class="card border-0 mb-2">
                <div class="row">
                    <div class="col-md-8 p-4">
                        <div class="text-muted animated slideInLeft">{{ \Carbon\Carbon::now('Asia/Jakarta')->toDayDateTimeString() }}</div>
                        <div class="display-4 animated slideInLeft delay-4">Dashboard</div>
                    </div>
                    <div class="col-md-4">
                        <div class="display-5 text-center p-4 mt-4 float-right animated zoomIn">
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
                       
                        <!-- Add Course -->
                        <div class="card border-0 shadow-sm mt-4 p-2">
                            <div class="h3 text-center animated slideInLeft delay-10">Add Course</div>
                            <hr>
                            <form action="{{ route('add.course') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="course_name">Course Name</label>
                                    <input name="course_name" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="initial">Course Initial</label>
                                    <input name="initial" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="lecturer_id">Lecturer</label>
                                    <select name="lecturer_id" id="" class="form-control">
                                        @foreach($lecturer as $l)
                                            <option value="{{ $l->id }}">{{ $l->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="day">Day</label>
                                    <select name="day" id="" class="form-control">
                                        <option value="monday">Senin</option>
                                        <option value="tuesday">Selasa</option>
                                        <option value="wednesday">Rabu</option>
                                        <option value="thursday">Kamis</option>
                                        <option value="friday">Jum'at</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="time_begin">Mulai</label>
                                    <input name="time_begin" type="time" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="time_finish">Selesai</label>
                                    <input name="time_finish" type="time" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="course_name">SKS</label>
                                    <input name="sks" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="room_id">Place</label>
                                    <select name="room_id" id="" class="form-control">
                                        <option value="1">FIK LAB 301</option>
                                        <option value="2">FIK LAB 302</option>
                                        <option value="3">FIK LAB 303</option>
                                        <option value="4">FIK LAB 401</option>
                                        <option value="5">FIK LAB 402</option>
                                        <option value="6">FIK LAB 403</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-outline-primary" value="Add">
                                </div>
                            </form>
                        </div>
                        <!-- Add Course -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card border-0 p-3">
                        <div class="container">
                            <form action="{{ route('sort.course') }}" method="GET">
                                
                                <div class="row">
                                    <div class="col-11 animated zoomIn">
                                        <div class="form-group">
                                            <select name="hari" id="" class="form-control">
                                                <option>Pick the day</option>
                                                <option value="monday">Senin</option>
                                                <option value="tuesday">Selasa</option>
                                                <option value="wednesday">Rabu</option>
                                                <option value="thursday">Kamis</option>
                                                <option value="friday">Jum'at</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-1 animated zoomIn delay-4">
                                        <button type="submit" class="form-control btn btn-outline-secondary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            <!-- Breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('home.dashboard') }}"><i class="fa fa-home"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        @if(Route::currentRouteName() == 'home.dashboard')
                                           <i class="far fa-calendar-alt"></i> All
                                        @else
                                        <i class="far fa-calendar-alt"></i> {{ ucfirst($hari) }}
                                        @endif
                                    </li>
                                </ol>
                            </nav>
                            <!-- Breadcrumb -->
                            
                            <!-- List Schedule -->
                            <div class="row mt-4">
                            @foreach($data as $i => $d)
                                <div class="col-md-4 mb-4 list-reveal">
                                    <div class="card border-0 shadow-sm card-course card-height-d">
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
                                                    <td><div class="h5 text-muted">{{ $d->time_begin }} - {{ $d->time_finish }}</div></td>
                                                </tr>
                                            </table>
                                            
                                            <!-- Button grup -->
                                            <div class="btn-group float-right mt-3" role="group">
                                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#update{{$i}}"><i class="fa fa-cog"></i> Update</button>
                                                <a href="{{ route('delete.course', ['id' => $d->id]) }}" class="btn btn-outline-secondary"><i class="far fa-trash-alt"></i> Delete</a>
                                            </div>
                                            <!-- Button grup -->
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Update -->
                                <div class="modal fade" id="update{{$i}}" role="dialog" tab-index="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="h2 modal-title">Update Course</div>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <!-- Form Update -->
                                                <form action="{{ route('update.course') }}" method="POST">
                                                    @csrf
                                                    <!-- Hidden field -->
                                                    <input name="id" type="hidden" value="{{ $d->id }}">
                                                    <!-- Hidden field -->

                                                    <div class="form-group">
                                                        <label for="course_name">Course Name</label>
                                                        <input name="course_name" type="text" class="form-control" value="{{ $d->course_name }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="initial">Course Initial</label>
                                                        <input name="initial" type="text" class="form-control" value="{{ $d->initial }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="lecturer_id">Lecturer</label>
                                                        <!-- {{ Form::select('lecturer_id', ['1' => 'Ridwan', '2' => 'Indra', '3' => 'Ichsan'], $d->lecturer_id, ['class' => 'form-control', 'id' => 'lecturer_id']) }} -->
                                                        <select name="lecturer_id" id="" class="form-control">
                                                            @foreach($lecturer as $l)
                                                                @if($d->lecturer_id == $l->id)
                                                                    <option value="{{ $l->id }}" selected>{{ $l->name }}</option>
                                                                @else
                                                                    <option value="{{ $l->id }}">{{ $l->name }}</option>
                                                                @endif

                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="day">Day</label>
                                                        {{ Form::select('day', ['monday' => 'Senin', 'tuesday' => 'Selasa', 'wednesday' => 'Rabu', 'thursday' => 'Kamis', 'friday' => 'Jumat'], $d->day, ['class' => 'form-control']) }}
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="time_begin">Mulai</label>
                                                        <input name="time_begin" type="time" class="form-control" value="{{ $d->time_begin }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="time_finish">Selesai</label>
                                                        <input name="time_finish" type="time" class="form-control" value="{{ $d->time_finish }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="course_name">SKS</label>
                                                        <input name="sks" type="text" class="form-control" value="{{ $d->sks }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="room_id">Place</label>
                                                        {{ Form::select('room_id', ['1' => 'LAB 301', '2' => 'LAB 302', '3' => 'LAB 303', '4' => 'LAB 401', '5' => 'LAB 402', '6' => 'LAB 403'], $d->room_id, ['class' => 'form-control']) }}
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        {{ Form::select('status', ['queue' => 'Belum Dimulai', 'start' => 'Sudah Dimulai', 'end' => 'Selesai'], $d->status, ['class' => 'form-control']) }}
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="submit" class="form-control btn btn-outline-primary" value="Update">
                                                    </div>
                                                </form>
                                                <!-- Form Update -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Update-->
                            @endforeach
                            </div>
                            <!-- List Schedule -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Konten -->
        </div>
    </div>
</main>

@endsection

@section('custom-js')

<script>
    setTimeout(function(){
        $('#myalert').hide()
    }, 3000);
</script>

@endsection