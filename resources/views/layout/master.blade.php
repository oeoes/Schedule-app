<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_field() }}"
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel=stylesheet href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
</head>
<body onload="startTime()">
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top">
        <a href="#" class="navbar-brand">Sekret Lab</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="mymenu">
            <ul class="navbar-nav mr-auto">
                @if(Route::currentRouteName() == 'home')
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link active"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home.dashboard') }}" class="nav-link"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home.dashboard') }}" class="nav-link active"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
                </li>
                @endif
                @if(Auth::check())
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"><i class="fa fa-sign-out-alt"></i> Logout</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center">
                    <div><small class="text-muted">Copyright &copy; 2019</small></div>
                    <span class="card-course"><a class="h1 text-muted" href="https://github.com/oeoes?tab=repositories"><i class="fab fa-github"></i></a></span>
                    <div><small class="text-muted">Schedule V1.0</small></div>
                </div>
            </div>
        </div>
    </footer>
</div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.js') }}"></script>
    @yield('custom-js')
    <script src="{{ asset('js/fullscreen.js') }}"></script>

    <script>
        window.sr = ScrollReveal({ reset: true });

        // Custom Settings

        sr.reveal('.list-reveal', {
        scale: .8,
        duration: 2000
        });
    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });

        $('.popover-dismiss').popover({
        trigger: 'focus'
        })
    </script>
    <script src="{{ asset('js/time.js') }}"></script>
</body>
</html>