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
                        <div class="display-4 animated slideInLeft delay-4">Dosen</div>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mypreload">
                            <!-- Preloader -->
                            <span v-if="myload" class="myload text-center pt-5">
                                <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </span>
                            <!-- Preloader -->
                            <lecturer-index
                                v-for="lecturer in lecturers_index"
                                v-bind="lecturer"
                                :key="lecturer.key"
                            ></lecturer-index>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Konten -->
        </div>
    </div>
</main>

@endsection
