@extends('layout.master-new-version')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/schedule-new.css') }}">
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<style>
    /* body{
        background-image: url({{ asset('images/bg.png') }});
        background-size: repeat
    } */
    .info-kuliah{
        position: fixed;
        top: 10px;
        left: -270px;
        background: #6cb2eb;
        z-index: 100;
        color: white;
        animation: muncul 10s ease-in-out infinite;
    }

    .time{
        position: fixed;
        top: 0;
        right: 0;
        font-family: 'Orbitron', sans-serif;
        padding: 10px;
        background: #6cb2eb;
        font-size: 20px;
        z-index: 100;
    }
    @keyframes muncul{
        5%{
            left: 30px;
        }
        7%{
            left: 0;
        }
        40%{
            left: 0;
        }
        42%{
            left: 70px;
        }
        45%{
            left: -270px
        }
        60%{
            left: -270px
        }
        100%{
            left: -270px
        }
    }
</style>
@endsection

@section('content')

<!-- <div class="navbar navbar-expand-lg bg-room">
    <div class="container">
        <div class="h2 white ml-auto">
            Kuliah Hari Ini...
        </div>
    </div>
</div> -->

<div class="info-kuliah p-2 pl-3">
    <div class="h1">Kuliah hari ini...</div>
</div>

<div class="time white">
    <div id="time-schedule"></div>
</div>

<div class="container-fluid pt-4">
    
    <div class="p-2 py-5 mt-4">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#carouselExampleSlidesOnly" data-slides-to="0"></li>
                <li data-target="#carouselExampleSlidesOnly" data-slides-to="1"></li>
            </ol>
            <div class="carousel-inner">
            <!-- Satu -->
                <div class="carousel-item active">
                    <div class="row">
                        <lab-302-kosong v-if="lab303_arr == ''">

                        </lab-302-kosong>
                        <lab-302
                            v-else
                            v-for="data in lab302_arr"
                            v-bind="data"
                            :key="data.id"
                        ></lab-302>

                        <lab-303-kosong v-if="lab303_arr == ''">

                        </lab-303-kosong>
                        <lab-303
                            v-else
                            v-for="data in lab303_arr"
                            v-bind="data"
                            :key="data.id"
                        ></lab-303>

                        <lab-304-kosong v-if="lab304_arr == ''">

                        </lab-304-kosong>
                        <lab-304
                            v-else
                            v-for="data in lab304_arr"
                            v-bind="data"
                            :key="data.id"
                        ></lab-304>
                    </div>
                </div>
                <!-- Dua -->
                <div class="carousel-item">
                    <div class="row">
                        <lab-401-kosong v-if="lab401_arr == ''">

                        </lab-401-kosong>
                        <lab-401
                            v-else
                            v-for="data in lab401_arr"
                            v-bind="data"
                            :key="data.id"
                        ></lab-401>

                        <lab-402-kosong v-if="lab402_arr == ''">

                        </lab-402-kosong>
                        <lab-402
                            v-else
                            v-for="data in lab402_arr"
                            v-bind="data"
                            :key="data.id"
                        ></lab-402>

                        <lab-403-kosong v-if="lab403_arr == ''">

                        </lab-403-kosong>
                        <lab-403
                            v-else
                            v-for="data in lab403_arr"
                            v-bind="data"
                            :key="data.id"
                        ></lab-403>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection