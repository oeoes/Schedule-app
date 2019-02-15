<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <meta name="csrf-token" content="{{ csrf_field() }}"> -->
    <meta name="csrf-token" content="csrf_field()">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
    @yield('custom-css')
    <style>
        .room-label{
            background-image: url('{{ asset('images/room.gif') }}');
            background-size: cover;
        }
    </style>
</head>
<body>
<div id="app">
<!-- Flash message -->
    @if(Session::has('message'))
    <div class="row fixed-top mt-4" style="z-index: 10000" id="myalert">
        <div class="col-6 offset-3">
            <div class="alert alert-success animated tada">
                <h2>Hooray!</h2>
                <hr>
                <div class="h3 text-center">{{ session()->get('message') }}</div>
            </div>
        </div>
    </div>
    @endif
<!-- Flash message -->

    @yield('content')

</div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('custom-js')
    <script src="{{ asset('js/fullscreen.js') }}"></script>

    <script src="{{ asset('js/time.js') }}"></script>
</body>
</html>