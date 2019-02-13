@extends('layout.master')

@section('title', 'Dashboard - Lecturer')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/switch-btn.css') }}">
@endsection

@section('content')

<main class="py-5">
    <div class="container-fluid mt-4">
        <div class="border-0">
            <!-- Title -->
            <div class="card border-0 mb-2">
                <div class="row">
                    <div class="col-md-8 p-4">
                        <div class="text-muted animated slideInLeft">{{ \Carbon\Carbon::now('Asia/Jakarta')->toDayDateTimeString() }}</div>
                        <div class="display-4 animated slideInLeft delay-4">Configure Dosen</div>
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
                        <div class="h3 text-center">Add Lecturer</div>
                        <form action="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input v-model="lecturer_name" id="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <div @click="addLecturer" class="btn btn-secondary form-control">Add</div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="mypreload">
                        <!-- Preloader -->
                        <span v-if="myload" class="myload text-center pt-5">
                            <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                        <!-- Preloader -->
                        <lecturer
                            v-for="(lecturer) in lecturers"
                            v-bind="lecturer"
                            :key="lecturer.key"
                            @update="update"
                        ></lecturer>
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