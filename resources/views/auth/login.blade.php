@extends('layout.master')

@section('content')

<main class="py-4 mt-5">
    <div class="container mt-4">
        <div class="p-5">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card border-0 shadow p-3 animated bounceInDown">
                        <form action="{{ route('login.auth') }}" method="POST">
                            @csrf
                            <div class="h3 text-center mb-4">Sign In</div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input name="username" id="username" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-unlock-alt"></i></span>
                                    </div>
                                    <input name="password" id="password" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success form-control">Ok <i class="fa fa-check"></i></button>
                            </div>
                        </form>
                        @if(count($errors))
                        <div class="alert alert-danger">
                            <div class="h5">Aww Snap!</div>
                            <hr>
                            @foreach($errors->all() as $e)
                            <div class="text-center">{{ $e }}</div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection