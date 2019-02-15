@extends('layout.master-new-version')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/schedule-new.css') }}">
@endsection

@section('content')

<div class="navbar navbar-expand-lg bg-maroon">
    <div class="container">
        <div class="h2 white">
            Today's Course
        </div>
    </div>
</div>


<div class="container-fluid">
    
    
    <div class="card border-0 p-2">
        <div class="row">
            <lab-301
                v-for="data in lab301_arr"
                v-bind="data"
                :key="data.id"
            ></lab-301>
            <lab-302
                v-for="data in lab302_arr"
                v-bind="data"
                :key="data.id"
            ></lab-302>
            <lab-303
                v-for="data in lab303_arr"
                v-bind="data"
                :key="data.id"
            ></lab-303>
        </div>
    </div>
    
</div>

@endsection