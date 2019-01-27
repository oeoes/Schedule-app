<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel=stylesheet href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Custom Css -->
    <style>
        .full-screen{
            position: absolute;
            top: 15px;
            right: 10px;
            font-size: 25px;
            cursor: pointer;
        }
        #full-cont{
            position: fixed;
            top: 0;
            left: 0;
            display: none;
            width: 100%;
            height: 100%;
            z-index: 100000;
            background: #fff;
            overflow: auto;
        }
        #close-btn{
            position: absolute;
            top: -9px;
            right: 15px;
            cursor: pointer;
            font-size: 35px;
        }
        .delay-1{
            animation-delay: .1s;
        }
        .delay-2{
            animation-delay: .2s;
        }
        .delay-3{
            animation-delay: .3s;
        }
        .delay-4{
            animation-delay: .4s;
        }
        .delay-5{
            animation-delay: .5s;
        }
        .delay-6{
            animation-delay: .6s;
        }
        .delay-7{
            animation-delay: .7s;
        }
        .delay-8{
            animation-delay: .8s;
        }
        .delay-9{
            animation-delay: .9s;
        }
        .delay-10{
            animation-delay: 1s;
        }

        .clock-animated{
            animation: life 1.1s ease infinite;
        }
        @keyframes life{
            0%{
                transform: scale(1)
            }
            50%{
                transform: scale(1.2)
            }
            100%{
                transform: scale(1)
            }
        }

        .card-course:{
            cursor: pointer;
        }
        .card-course:hover{
            animation: shrink .5s ease;
            animation-fill-mode: forwards;
        }

        @keyframes shrink{
            from{
                transform: scale(1)
            }
            to{
                transform: scale(1.05)
            }
        }
        .white{
            color: white;
        }

        .card-height{
            height: 415px;
        }

        .card-height-d{
            height: 490px;
        }
    </style>
</head>
<body onload="startTime()">
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

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/scrollreveal.js') }}"></script>
    @yield('custom-js')
    <script>
        $('#fullscreen').click(function(){
            $('#full-cont').show()
        });

        $('#close-btn').click(function(){
            $('#full-cont').hide()
        })
    </script>

    <script>
        window.sr = ScrollReveal({ reset: true });

        // Custom Settings

        sr.reveal('.list-reveal', {
        scale: .8,
        duration: 2000
        });
    </script>
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time-schedule').innerHTML =
            h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
</body>
</html>